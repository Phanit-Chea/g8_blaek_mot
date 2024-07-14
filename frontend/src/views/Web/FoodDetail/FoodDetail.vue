<script setup lang="ts">
import axiosInstance from '@/plugins/axios'
import NavbarView from '../Navbar/NavbarView.vue'
import FooterView from '../Footer/FooterView.vue'
import SideBar from '@/Components/Layouts/SideBar.vue'
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

const food = ref({})

const fetchFoodDetail = async () => {
  try {
    const response = await axiosInstance.get(`/food/show/${$route.params.id}`)
    food.value = response.data
  } catch (error) {
    console.error('Error fetching food details:', error)
    alert(error)
  }
}

onMounted(async () => {
  await fetchFoodDetail()
  // Additional logic for fetching nearby restaurants can go here if needed
})

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
<template>
  <NavbarView></NavbarView>
  <div class="d-flex" style="margin-top: 158px">
    <div class="col-2">
      <SideBar style="width: 240px; height: 100%" />
    </div>
    <div class="col-10">
      <div class="d-flex align-center pt-2">
        <a href="" class="list-unstyled text-decoration-none text-danger">Back to list</a>
        <span class="material-symbols-outlined fs-3 text-danger"> keyboard_arrow_right </span>
        <a href="" class="list-unstyled text-decoration-none text-danger">food name</a>
      </div>

      <div>
        <h1 v-if="food.name" class="text-success mt-2 mb-3">{{ food.name }}</h1>
        <p v-else>Loading...</p>
      </div>
      <div class="col col-lg-2 d-flex mt-3 mb-3">
        <div class="small-ratings d-flex">
          <i class="fa fa-star rating-color mx-1"></i>
          <i class="fa fa-star rating-color mx-1"></i>
          <i class="fa fa-star rating-color mx-1"></i>
          <i class="fa fa-star mx-1"></i>
          <i class="fa fa-star mx-1"></i>
        </div>
      </div>
      <hr />
      <!-- ===================icon action share ,save,print,========================== -->
      <div class="mt-3 mb-3">
        <div class="btn btn rounded border border-success mr-2" id="bookmard">
          <span class="material-symbols-outlined"> bookmark_added </span>
        </div>
        <div class="btn btn rounded border border-success mr-2" id="download">
          <span class="material-symbols-outlined"> download </span>
        </div>
        <div class="btn btn rounded border border-success mr-2" id="print">
          <span class="material-symbols-outlined"> print </span>
        </div>
        <div class="btn btn rounded border border-success mr-2" id="share">
          <span class="material-symbols-outlined"> share </span>
        </div>
      </div>
      <!--======================video and image of food ===========================-->
      <div class="jumbotron jumbotron-fluid p-0 m-0 d-flex">
        <div class="col-8">
          <iframe
            src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"
            style="width: 100%; height: 100%; border: none"
          >
          </iframe>
        </div>

        <div class="col-4">
          <div class="card mb-3" id="foodImage1">
            <img src="../../../assets/FoodDetail/image.png" alt="" width="100%" height="195px" />
          </div>
          <div class="card" id="foodImage2">
            <img src="../../../assets/FoodDetail/image.png" alt="" width="100%" height="195px" />
          </div>
        </div>
      </div>
      <!--=====================spending time,nutritions,ingredients =================-->

      <div class="row d-flex justify-content-evenly text-white mt-3 m-0">
        <div
          class="d-flex align-items-center justify-content-center rounded"
          id="timer"
          style="width: 380px; height: 100px"
        >
          <span class="material-symbols-outlined mt-1"> timer </span>
          <p class="mx-2 fs-5 mb-0">Time Spending:</p>
          <span class="fw-bold fs-5 mb-0">{{ food.cooking_time }}</span>
        </div>
        <div
          class="d-flex align-items-center justify-content-center rounded"
          id="ingredient"
          style="width: 380px; height: 100px"
        >
          <span class="material-symbols-outlined mt-1"> grocery </span>
          <p class="mx-2 fs-5 mb-0">Number of Ingredient:</p>
          <span class="fw-bold fs-5 mb-0">(20)</span>
        </div>
      </div>
      <!--=====================nutrtitions ================================= -->
      <div class="collapse mt-3 m-0" id="nutritions">
        <form>
          <div class="input-group mb-3">
            <div class="col d-flex border-end border-success">
              <div class="col">
                <ul>
                  <li>សាច់ជ្រួក</li>
                </ul>
              </div>
              <div class="col">
                <ul class="list-unstyled">
                  <li>:</li>
                </ul>
              </div>
              <div class="col">
                <ul class="list-inline">
                  <li>5kg</li>
                </ul>
              </div>
            </div>
          </div>
        </form>
      </div>
      <hr />
      <!--======================ingredients and how to cook ================================================ -->
      <div class="row mt-4">
        <div class="col-md-7">
          <div class="card">
            <h3 class="card-header fw-bold text-success">How to Cook?</h3>
            <div class="card-body">
              <ol class="list-group list-group-flush">
                <li class="list-group-item">
                  <h5 class="fw-bold text-success">Step 1</h5>
                  <p class="text-dark">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus fuga
                    debitis officiis assumenda vel mollitia ut ex facilis! Voluptate totam quia ex
                    pariatur porro nam error distinctio molestiae assumenda expedita.
                  </p>
                </li>
                <li class="list-group-item">
                  <h5 class="fw-bold text-success">Step 2</h5>
                  <p class="text-dark">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus fuga
                    debitis officiis assumenda vel mollitia ut ex facilis! Voluptate totam quia ex
                    pariatur porro nam error distinctio molestiae assumenda expedita.
                  </p>
                </li>
                <li class="list-group-item">
                  <h5 class="fw-bold text-success">Step 3</h5>
                  <p class="text-dark">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus fuga
                    debitis officiis assumenda vel mollitia ut ex facilis! Voluptate totam quia ex
                    pariatur porro nam error distinctio molestiae assumenda expedita.
                  </p>
                </li>
              </ol>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <div class="card">
            <div class="card-header bg-success text-white fw-bold text-center">Ingredients</div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <ul class="list-group list-group-flush">
                    <li
                      class="list-group-item"
                      v-for="ingredient in food.ingredients"
                      :key="ingredient"
                    >
                      {{ ingredient }}
                    </li>
                  </ul>
                </div>
                <div class="col">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">5kg</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr />
      <!--======================where can you buy this food ================================================ -->
      <div class="row">
        <div class="col">
          <div>
            <h3 class="fw-bold m-0 text-success">Where you can buy this food?</h3>
          </div>
          <div>
            <!-- <div class="col"> -->
            <div class="mt-3">
              <div class="col">
                <div ref="mapContainer" class="map"></div>
                <div class="sidebar">
                  <h3 class="text-success">Restaurant near you</h3>
                  <ul v-if="restaurants.length > 0">
                    <li
                      v-for="restaurant in restaurants"
                      :key="restaurant.id"
                      @click="drawPathToRestaurant(restaurant)"
                    >
                      <strong>{{ restaurant.text }}</strong> -
                      {{ restaurant.distance.toFixed(2) }} km
                    </li>
                  </ul>
                  <p v-else>Restaurants not found.</p>
                </div>
              </div>
              <div class="collapse mt-3" id="addressForm">
                <form>
                  <div class="input-group mb-3">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="input your address"
                      aria-label="address"
                      aria-describedby="basic-addon1"
                    />
                    <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon1">
                        <span class="material-symbols-outlined"> search </span>
                      </span>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-3" style="width: 100%">
              <MapView />
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div>
          <h3 class="card-header fw-bold text-success">Other you might love</h3>
        </div>
        <div class="row d-flex" style="margin-top: 98px">
          <div class="col-3 col-md-3 mb-3">
            <div class="card position-relative d-flex card1 zoom-card">
              <div
                class="border border-3 border-success rounded-circle w-50 position-absolute start-50 translate-middle-x"
                style="z-index: 1; top: -85px"
              >
                <img
                  src="../../../assets/FoodDetail/image.png"
                  alt=""
                  class="img-fluid rounded-circle"
                />
              </div>

              <div class="pt-5 mt-4 d-flex justify-content-between">
                <div class="col">
                  <div class="small-ratings d-flex m-2">
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star mx-1"></i>
                    <i class="fa fa-star mx-1"></i>
                  </div>
                  <h4 class="m-2">food name</h4>
                  <div class="m-2 w-auto text-success rounded" id="category">category</div>
                </div>
                <div class="col d-flex align-items-end">
                  <div class="m-2 btn btn-success">details</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3 col-md-3 mb-3">
            <div class="card position-relative d-flex card1 zoom-card">
              <div
                class="border border-3 border-success rounded-circle w-50 position-absolute start-50 translate-middle-x"
                style="z-index: 1; top: -85px"
              >
                <img
                  src="../../../assets/FoodDetail/image.png"
                  alt=""
                  class="img-fluid rounded-circle"
                />
              </div>

              <div class="pt-5 mt-4 d-flex justify-content-between">
                <div class="col">
                  <div class="small-ratings d-flex m-2">
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star mx-1"></i>
                    <i class="fa fa-star mx-1"></i>
                  </div>
                  <h4 class="m-2">food name</h4>
                  <div class="m-2 w-auto text-success rounded" id="category">category</div>
                </div>
                <div class="col d-flex align-items-end">
                  <div class="m-2 btn btn-success">details</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3 col-md-3 mb-3">
            <div class="card position-relative d-flex card1 zoom-card">
              <div
                class="border border-3 border-success rounded-circle w-50 position-absolute start-50 translate-middle-x"
                style="z-index: 1; top: -85px"
              >
                <img
                  src="../../../assets/FoodDetail/image.png"
                  alt=""
                  class="img-fluid rounded-circle"
                />
              </div>

              <div class="pt-5 mt-4 d-flex justify-content-between">
                <div class="col">
                  <div class="small-ratings d-flex m-2">
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star mx-1"></i>
                    <i class="fa fa-star mx-1"></i>
                  </div>
                  <h4 class="m-2">food name</h4>
                  <div class="m-2 w-auto text-success rounded" id="category">category</div>
                </div>
                <div class="col d-flex align-items-end">
                  <div class="m-2 btn btn-success">details</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3 col-md-3 mb-3">
            <div class="card position-relative d-flex card1 zoom-card">
              <div
                class="border border-3 border-success rounded-circle w-50 position-absolute start-50 translate-middle-x"
                style="z-index: 1; top: -85px"
              >
                <img
                  src="../../../assets/FoodDetail/image.png"
                  alt=""
                  class="img-fluid rounded-circle"
                />
              </div>

              <div class="pt-5 mt-4 d-flex justify-content-between">
                <div class="col">
                  <div class="small-ratings d-flex m-2">
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star mx-1"></i>
                    <i class="fa fa-star mx-1"></i>
                  </div>
                  <h4 class="m-2">food name</h4>
                  <div class="m-2 w-auto text-success rounded" id="category">category</div>
                </div>
                <div class="col d-flex align-items-end">
                  <div class="m-2 btn btn-success">details</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- </div> -->
      <!-- </div> -->
    </div>
  </div>
  <FooterView></FooterView>
</template>


<style scoped>
#nutrition {
  background-color: #355e2b;
  color: white;
}

#nutrition button {
  color: white;
}

#ingredient {
  background-color: #8a9a5b;
}

#timer {
  background-color: #bcb88b;
}

#nutrition,
#timer,
#ingredient {
  box-shadow: 2px 4px 5px 0px green;
}

#nutrition:hover,
#timer:hover,
#ingredient:hover,
#category {
  background-color: white;
  border-color: green;
  color: green;
}

.banner-image {
  width: 100%;
  height: 100vh;
  /* Adjust as needed */
  object-fit: fill;
}

.input-group-prepend .input-group-text {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}

.input-group .form-control {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}

.form-outline i {
  position: absolute;
  top: 78%;
  /* left: 70%; */
  transform: translateY(-50%);
  pointer-events: none;
}

.card1:hover {
  box-shadow: 3px 3px 1px 1px green;
  border-color: green;
}

.zoom-card,
#bookmard,
#share,
#print,
#download,
#foodImage1,
#foodImage2,
.list-group-item {
  transition: transform 0.3s ease;
}

.zoom-card:hover,
#bookmard:hover,
#share:hover,
#print:hover,
#download:hover,
#foodImage1:hover,
#foodImage2:hover,
.list-group-item:hover {
  transform: scale(1.05);
  z-index: 10;
}

.map-container {
  display: flex;
}

.map {
  flex: 1;
  height: 400px; /* Adjust height as needed */
}

.sidebar {
  width: 300px;
}

.sidebar h3 {
  padding-top: 25px;
  font-weight: 700;
}

</style>
