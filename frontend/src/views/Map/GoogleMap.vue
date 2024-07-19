<template>
  <div>
    <div ref="mapContainer" class="map"></div>
    <div class="sidebar">
      <h3>Nearby Restaurants</h3>
      <ul v-if="restaurants.length > 0">
        <li
          v-for="restaurant in restaurants"
          :key="restaurant.id"
          @click="drawPathToRestaurant(restaurant)"
        >
          <strong>{{ restaurant.text }}</strong> - {{ restaurant.distance.toFixed(2) }} km
        </li>
      </ul>
      <p v-else>Restaurants not found.</p>
    </div>
  </div>
</template>

<<script setup lang="ts">
import { ref, onMounted } from 'vue'
import axios from 'axios'
import mapboxgl from 'mapbox-gl'
import 'mapbox-gl/dist/mapbox-gl.css'
import MapboxGeocoder from '@mapbox/mapbox-gl-geocoder'
import '@mapbox/mapbox-gl-geocoder/dist/mapbox-gl-geocoder.css'
import MapboxDirections from '@mapbox/mapbox-gl-directions/dist/mapbox-gl-directions'
import '@mapbox/mapbox-gl-directions/dist/mapbox-gl-directions.css'

const accessToken = 'pk.eyJ1IjoidmVhc25hY2h1b24iLCJhIjoiY2x5Z3ZlZHZ4MGZyYzJub3RlMW8yZWhzdiJ9.Djy2BP-ysXAcH2mxJItgYg'
const lat = ref(0)
const lng = ref(0)
const mapContainer = ref(null)
const map = ref<mapboxgl.Map | null>(null)
const geolocateControl = ref<mapboxgl.GeolocateControl | null>(null)
const restaurants = ref<any[]>([])
let restaurantMarkers: mapboxgl.Marker[] = []
let userMarker: mapboxgl.Marker | null = null

onMounted(async () => {
  mapboxgl.accessToken = accessToken

  map.value = new mapboxgl.Map({
    container: mapContainer.value!,
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [104.991, 12.5657],
    zoom: 13
  })

  map.value.addControl(new mapboxgl.NavigationControl())

  geolocateControl.value = new mapboxgl.GeolocateControl({
    positionOptions: { enableHighAccuracy: true },
    trackUserLocation: true
  })
  map.value.addControl(geolocateControl.value)

  restaurantMarkers = []

  const directions = new MapboxDirections({
    accessToken: accessToken,
    unit: 'metric',
    profile: 'mapbox/driving'
  })
  map.value.addControl(directions, 'top-left')

  getLocation()

  const geocoder = new MapboxGeocoder({
    accessToken: accessToken,
    mapboxgl: mapboxgl,
    marker: false,
    collapsed: true,
    clearAndBlurOnEsc: true
  })
  map.value.addControl(geocoder)

  geocoder.on('result', (e: any) => {
    const coords = e.result.geometry.coordinates
    lat.value = coords[1]
    lng.value = coords[0]
    setUserMarker(coords)
    map.value!.flyTo({ center: coords })
    getRestaurants(coords[1], coords[0])
  })

  // Fetch customer's address from the database
  const customerAddress = await fetchCustomerAddress()
  if (customerAddress) {
    const coords = await geocodeAddress(customerAddress)
    if (coords) {
      setUserMarker(coords)
      map.value!.flyTo({ center: coords })
      getRestaurants(coords[1], coords[0])
    }
  }
})

async function fetchCustomerAddress() {
  try {
    const response = await axios.get('/api/customer/address')
    return response.data.address
  } catch (error) {
    console.error('Error fetching customer address:', error)
    return null
  }
}

async function geocodeAddress(address: string) {
  const url = `https://api.mapbox.com/geocoding/v5/mapbox.places/${encodeURIComponent(address)}.json?access_token=${accessToken}`
  try {
    const response = await axios.get(url)
    if (response.data.features.length > 0) {
      return response.data.features[0].geometry.coordinates
    } else {
      console.error('Address not found')
      return null
    }
  } catch (error) {
    console.error('Error geocoding address:', error)
    return null
  }
}

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(
      (position) => {
        lat.value = position.coords.latitude
        lng.value = position.coords.longitude
        setUserMarker([lng.value, lat.value])
        map.value!.setCenter([lng.value, lat.value])
        map.value!.setZoom(13)
        getRestaurants(lat.value, lng.value)
      },
      (error) => { console.error('Geolocation error:', error) },
      { enableHighAccuracy: true }
    )
  } else {
    console.error('Geolocation is not supported by this browser.')
  }
}

async function getRestaurants(lat: number, lng: number) {
  clearMarkers()

  const url = `https://api.mapbox.com/geocoding/v5/mapbox.places/restaurant.json?proximity=${lng},${lat}&access_token=${accessToken}`
  try {
    const response = await axios.get(url)
    restaurants.value = response.data.features
      .map((feature: any) => {
        const coords = feature.geometry.coordinates
        const distance = getDistance(lat, lng, coords[1], coords[0])
        return {
          id: feature.id,
          text: feature.text,
          coords: coords,
          distance: distance
        }
      })
      .filter((restaurant: any) => restaurant.distance <= 2)

    restaurants.value.forEach((restaurant: any) => {
      addRestaurantMarker(restaurant.coords, restaurant.text, restaurant.distance)
    })
  } catch (error) {
    console.error('Error fetching restaurants:', error)
  }
}

function setUserMarker(coords: number[]) {
  if (!userMarker) {
    const popup = new mapboxgl.Popup().setHTML('<strong>Your Location</strong>')
    userMarker = new mapboxgl.Marker({ color: 'red', draggable: true })
      .setLngLat(coords)
      .setPopup(popup)
      .addTo(map.value!)
      .on('dragend', (event) => {
        const newCoords = event.target.getLngLat()
        lat.value = newCoords.lat
        lng.value = newCoords.lng
        getRestaurants(newCoords.lat, newCoords.lng)
      })
  } else {
    userMarker.setLngLat(coords)
  }
}

function addRestaurantMarker(coords: number[], name: string, distance: number) {
  const popup = new mapboxgl.Popup().setHTML(`<strong>${name}</strong><br>Distance: ${distance.toFixed(2)} km`)
  const marker = new mapboxgl.Marker().setLngLat(coords).setPopup(popup).addTo(map.value!)
  restaurantMarkers.push(marker)
}

function clearMarkers() {
  restaurantMarkers.forEach((marker) => marker.remove())
  restaurantMarkers = []
}

function getDistance(lat1: number, lon1: number, lat2: number, lon2: number) {
  const R = 6371
  const dLat = deg2rad(lat2 - lat1)
  const dLon = deg2rad(lon1 - lon2)
  const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) + Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * Math.sin(dLon / 2) * Math.sin(dLon / 2)
  const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a))
  const distance = R * c
  return distance
}

function deg2rad(deg: number) {
  return deg * (Math.PI / 180)
}
</script>


<style scoped>
.map {
  height: 400px;
}
</style>
