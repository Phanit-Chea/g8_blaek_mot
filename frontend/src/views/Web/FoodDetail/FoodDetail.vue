<script lang="ts">
import axiosInstance from '@/plugins/axios'
import NavbarView from '../Navbar/NavbarView.vue'
import FooterView from '../Footer/FooterView.vue'
import SideBar from '@/Components/Layouts/SideBar.vue'
import { ref, onMounted } from 'vue'
import { useAuthStore } from '../../../stores/auth-store'
import { useUserStore } from '@/stores/userStore'
import { Modal } from 'bootstrap'
import axios from 'axios'
import mapboxgl from 'mapbox-gl'
import 'mapbox-gl/dist/mapbox-gl.css'
import MapboxGeocoder from '@mapbox/mapbox-gl-geocoder'
import '@mapbox/mapbox-gl-geocoder/dist/mapbox-gl-geocoder.css'
import MapboxDirections from '@mapbox/mapbox-gl-directions'
import '@mapbox/mapbox-gl-directions/dist/mapbox-gl-directions.css'
import { useRoute } from 'vue-router'

// Constants
const accessToken = 'pk.eyJ1IjoidmVhc25hY2h1b24iLCJhIjoiY2x5Z3ZlZHZ4MGZyYzJub3RlMW8yZWhzdiJ9.Djy2BP-ysXAcH2mxJItgYg'

// Reactive References
const lat = ref(0)
const lng = ref(0)
const mapContainer = ref<HTMLElement | null>(null)
const map = ref<mapboxgl.Map | null>(null)
const geolocateControl = ref<mapboxgl.GeolocateControl | null>(null)
const restaurants = ref<any[]>([])
let restaurantMarkers: mapboxgl.Marker[] = []
let userMarker: mapboxgl.Marker | null = null

const food = ref<any>({})
const rating = ref({ stars_rating: 0, feedback: '' })
const isLoading = ref(false)
const averageRating = ref(0)
const feedbacks = ref<any[]>([])

// Composables
const route = useRoute()
const userStore = useUserStore()

// Fetch Food Detail
const fetchFoodDetail = async () => {
  try {
    const response = await axiosInstance.get(`/food/show/${route.params.id}`, {
      headers: {
        Authorization: `Bearer ${userStore.accessToken}`,
        'Content-Type': 'application/json'
      }
    })
    console.log('Food detail response:', response.data)
    if (response.data && response.data.id) {
      food.value = response.data
    } else {
      console.error('Food ID not found in API response')
    }
  } catch (error) {
    console.error('Error fetching food details:', error)
    alert('Error fetching food details. Please try again later.')
  }
}

// Submit Rating
const submitRating = async () => {
  try {
    if (!food.value || !food.value.id) {
      console.error('Food ID is undefined or null')
      return
    }

    const user = JSON.parse(localStorage.getItem('user') || '{}')
    const ratingData = {
      stars_rating: rating.value.stars_rating,
      feedback: rating.value.feedback,
      user_id: user['user']?.id,
      food_id: food.value.id
    }

    isLoading.value = true

    const response = await axiosInstance.post('/ratings/create', ratingData)
    console.log('Rating submitted successfully:', response.data)

    rating.value.stars_rating = 0
    rating.value.feedback = ''
    await fetchFeedback()
  } catch (error) {
    console.error('Error submitting rating:', error)
    alert('Error submitting rating. Please try again later.')
  } finally {
    isLoading.value = false
    if (!isLoading.value) {
      window.location.reload()
    }
  }
}

// Fetch Average Rating
const fetchAverageRating = async () => {
  try {
    const response = await axiosInstance.get(`/ratings/averages/${route.params.id}`)
    averageRating.value = response.data.average_rating
  } catch (error) {
    console.error('Error fetching average rating:', error)
    alert('Error fetching average rating. Please try again later.')
  }
}

// Fetch Feedback
const fetchFeedback = async () => {
  try {
    const response = await axiosInstance.get(`/ratings/list/feedback/${route.params.id}`)
    feedbacks.value = response.data.data
    console.log('Feedbacks:', feedbacks.value)
  } catch (error) {
    console.error('Error fetching feedback:', error)
    alert('Error fetching feedback. Please try again later.')
  }
}

// Initialize Map
const initializeMap = async () => {
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

  const directions = new MapboxDirections({
    accessToken: accessToken,
    unit: 'metric',
    profile: 'mapbox/driving'
  })
  map.value.addControl(directions, 'top-left')

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

  const customerAddress = await fetchCustomerAddress()
  if (customerAddress) {
    const coords = await geocodeAddress(customerAddress)
    if (coords) {
      setUserMarker(coords)
      map.value!.flyTo({ center: coords })
      getRestaurants(coords[1], coords[0])
    }
  }
}

// Fetch Customer Address
const fetchCustomerAddress = async () => {
  try {
    const response = await axios.get('/api/customer/address')
    return response.data.address
  } catch (error) {
    console.error('Error fetching customer address:', error)
    return null
  }
}

// Geocode Address
const geocodeAddress = async (address: string) => {
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

// Get Location
const getLocation = () => {
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
      (error) => {
        console.error('Geolocation error:', error)
      },
      { enableHighAccuracy: true }
    )
  } else {
    console.error('Geolocation is not supported by this browser.')
  }
}

// Get Restaurants
const getRestaurants = async (lat: number, lng: number) => {
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

// Set User Marker
const setUserMarker = (coords: number[]) => {
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

// Add Restaurant Marker
const addRestaurantMarker = (coords: number[], name: string, distance: number) => {
  const popup = new mapboxgl.Popup().setHTML(
    `<strong>${name}</strong><br>Distance: ${distance.toFixed(2)} km`
  )
  const marker = new mapboxgl.Marker().setLngLat(coords).setPopup(popup).addTo(map.value!)
  restaurantMarkers.push(marker)
}

// Clear Markers
const clearMarkers = () => {
  restaurantMarkers.forEach((marker) => marker.remove())
  restaurantMarkers = []
}

// Get Distance
const getDistance = (lat1: number, lon1: number, lat2: number, lon2: number) => {
  const R = 6371
  const dLat = deg2rad(lat2 - lat1)
  const dLon = deg2rad(lon1 - lon2)
  const a =
    Math.sin(dLat / 2) * Math.sin(dLat / 2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * Math.sin(dLon / 2) * Math.sin(dLon / 2)
  const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a))
  return R * c
}

const deg2rad = (deg: number) => deg * (Math.PI / 180)

// Event Handlers
const toggleDropdown = (comment: any, event: Event) => {
  selectedComment.value = selectedComment.value === comment ? null : comment
  event.stopPropagation()
}

const confirmDelete = (comment: any) => {
  selectedComment.value = comment
  new Modal(document.getElementById('deleteConfirmModal')!).show()
}

const deleteComment = async () => {
  if (selectedComment.value) {
    try {
      await axiosInstance.delete(`/ratings/feedback/${selectedComment.value.id}`)
      feedbacks.value = feedbacks.value.filter((f: any) => f.id !== selectedComment.value.id)
      const deleteConfirmModal = document.getElementById('deleteConfirmModal')
      const modalInstance = Modal.getInstance(deleteConfirmModal!)
      if (modalInstance) {
        modalInstance.hide()
      }
      selectedComment.value = null
    } catch (error) {
      console.error('Error deleting comment:', error)
      alert('Error deleting comment. Please try again later.')
    }
  }
}

// Lifecycle Hooks
onMounted(() => {
  fetchFoodDetail()
  fetchAverageRating()
  fetchFeedback()
  initializeMap()
})

export default {
  name: 'food-detail',
  components: {
    NavbarView,
    FooterView,
    SideBar
  }
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
        <a href="" class="list-unstyled text-decoration-none text-danger">ត្រឡប់ក្រោយ</a>
        <span class="material-symbols-outlined fs-3 text-danger"> keyboard_arrow_right </span>
        <a href="" class="list-unstyled text-decoration-none text-danger">ឈ្មោះអាហារ</a>
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
      <!-- {{ userStore }} -->
      <hr />
      /* <!-- ===================icon action share ,save,print,========================== --> */
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
          <p class="mx-2 fs-5 mb-0">រយះពេល:</p>
          <span class="fw-bold fs-5 mb-0">{{ food.cooking_time }}</span>
        </div>
        <div
          class="d-flex align-items-center justify-content-center rounded"
          id="ingredient"
          style="width: 380px; height: 100px"
        >
          <span class="material-symbols-outlined mt-1"> grocery </span>
          <p class="mx-2 fs-5 mb-0">គ្រឿងផ្សំសរុប:</p>
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
            <h3 class="card-header bg-success fw-bold text-white">ការបញ្ចេញមតិពីអ្នកប្រើប្រាស់</h3>
            <div class="card-body overflow-y-scroll" style="height: 40vh">
              <!-- Check if feedbacks array exists and has items -->
              <div v-if="feedbacks && feedbacks.length > 0" class="style-user">
                <div
                  class="d-flex align-items-center mb-3"
                  v-for="comment in feedbacks"
                  :key="comment.id"
                >
                  <img
                    :src="`http://127.0.0.1:8000/${comment.profile}`"
                    alt="Avatar"
                    class="me-3 rounded-circle"
                    style="width: 45px; height: 45px; object-fit: cover"
                  />
                  <div class="d-flex flex-column justify-content-center position-relative top-4">
                    <label class="fs-5 fw-bold">{{ comment.name }}</label>
                    <p class="mb-0">{{ comment.feedback }}</p>
                    <p class="mb-0">
                      <span v-for="star in 5" :key="star">
                        <i v-if="star <= comment.stars_rating" class="fas fa-star text-warning"></i>
                        <i v-else class="far fa-star text-warning"></i>
                      </span>
                    </p>
                  </div>
                  <div class="ms-auto position-relative">
                    <i
                      class="bi bi-three-dots-vertical fs-5"
                      @click="toggleDropdown(comment, $event)"
                    ></i>
                    <div
                      v-if="selectedComment === comment"
                      class="dropdown-menu dropdown-menu-end show"
                      style="position: absolute; z-index: 1; right: 0"
                    >
                      <a class="dropdown-item" href="#" @click.prevent="confirmDelete(comment)"
                        >លុប</a
                      >
                    </div>
                  </div>
                </div>
              </div>
              <!-- Show message if no feedbacks are present -->
              <div v-else class="text-feed">មិនទាន់មាន</div>
            </div>
          </div>

          <!-- Delete Confirmation Modal -->
          <div
            class="modal fade"
            id="deleteConfirmModal"
            tabindex="-1"
            aria-labelledby="deleteConfirmModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteConfirmModalLabel">លុបមតិជាអចិន្ត្រៃ</h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
                </div>
                <div class="modal-body">តើអ្នកចង់លុបមិតិរបស់អ្នកមែនទេ?</div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    បោះបង់
                  </button>
                  <button type="button" class="btn btn-danger" @click="deleteComment">
                    លុប
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <div class="card">
            <div class="card-header bg-success text-white fw-bold text-center">គ្រឿងផ្សំ</div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item" v-for="ingredient in food.ingredients" :key="ingredient">{{ingredient}}</li>
                    
                  </ul>
                </div>
                <div class="col">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">5គីឡូក្រាម</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <button
        type="button"
        class="btn btn-success mt-5"
        style="width: 58%"
        data-bs-toggle="modal"
        data-bs-target="#exampleModal"
        data-bs-whatever="@mdo"
      >
        ផ្តល់មតិអីឡូវនេះ
      </button>
      <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header d-flex justify-between">
              <h5 class="modal-title" id="exampleModalLabel">សូមផ្តល់មតិអីឡូវនេះ</h5>
              <div v-if="isLoading" class="spinner"></div>
            </div>
            <div class="modal-body">
              <form @submit.prevent="submitRating">
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label"
                    >តើអ្នករីករាយនិងអាហារទាំងនេះទេ?</label
                  >
                  <div class="row">
                    <div class="col col-lg-2 d-flex">
                      <div class="rating">
                        <input
                          v-model="rating.stars_rating"
                          type="radio"
                          id="star5"
                          name="rating"
                          value="5"
                        />
                        <label for="star5" title="5 stars"></label>

                        <input
                          v-model="rating.stars_rating"
                          type="radio"
                          id="star4"
                          name="rating"
                          value="4"
                        />
                        <label for="star4" title="4 stars"></label>

                        <input
                          v-model="rating.stars_rating"
                          type="radio"
                          id="star3"
                          name="rating"
                          value="3"
                        />
                        <label for="star3" title="3 stars"></label>

                        <input
                          v-model="rating.stars_rating"
                          type="radio"
                          id="star2"
                          name="rating"
                          value="2"
                        />
                        <label for="star2" title="2 stars"></label>

                        <input
                          v-model="rating.stars_rating"
                          type="radio"
                          id="star1"
                          name="rating"
                          value="1"
                        />
                        <label for="star1" title="1 star"></label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">ផ្តល់មតិមកពួកយើង</label>
                  <textarea class="form-control" id="message-text" v-model="feedback"></textarea>
                </div>
                <div class="d-flex gap-3">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    បោះបង់
                  </button>
                  <button type="submit" :disabled="isLoading" class="btn btn-primary">
                    ផ្ញើអីឡូវនេះ
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <hr />
      <!--======================where can you buy this food ================================================ -->
      <div class="row">
        <div class="col">
          <div>
            <h3 class="fw-bold m-0 text-success">តើអ្នកចង់ទៅទីកន្លែងមួយណា?</h3>
          </div>
          <div>
            <!-- <div class="col"> -->
            <div class="mt-3">
              <div class="col">
                <div ref="mapContainer" class="map"></div>
                <div class="sidebar">
                  <h3 class="text-success">ហាងដែលនៅជិតអ្នកបំផុត</h3>
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
                  <p v-else>មិនមានហាងនៅទីនេះទេ</p>
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
                        <span class="material-symbols-outlined"> ស្វែងរក </span>
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
          <h3 class="card-header fw-bold text-success">អាហារដែលមានភាពស្រដៀងគ្នា</h3>
        </div>
        <div class="row d-flex" style="margin-top: 98px">
          <div class="col-3 col-md-3 mb-3">
            <div class="card position-relative d-flex card1 zoom-card">
              <div
                class="border border-3 border-success rounded-circle w-50 position-absolute start-50 translate-middle-x"
                style="z-index: 1; top: -85px"
              >
                <img
                  :src="`http://127.0.0.1:8000/${food.image}`"
                  alt=""
                  class="img-fluid rounded-circle"
                />
              </div>

              <div class="pt-5 mt-4 d-flex justify-content-between">
                <div class="col">
                  <h4 class="m-2">{{ food.name }}</h4>
                  <div class="star-rating position-relative left-2">
                    <span
                      v-for="star in 5"
                      :key="star"
                      :class="['star', { filled: star <= averageRating }]"
                      >★</span
                    >
                  </div>
                  <div class="m-2 w-auto text-success rounded" id="category">ប្រភេទអាហារ</div>
                </div>
                <div class="col d-flex align-items-end position-relative left-15">
                  <div class="m-2 btn btn-success">មើល</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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

.style-user {
  border: none;
  padding: 10px 0;
}

.avatar {
  width: 45px;
  height: 45px;
  object-fit: cover;
  border-radius: 50%;
}

.style-user .d-flex {
  margin-bottom: 1rem;
}

.zoom-card:hover,
#bookmard:hover,
#share:hover,
#print:hover,
#download:hover,
#foodImage1:hover,
#foodImage2:hover,
.list-group-item:hover {
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
  width: 500px;
}

.sidebar h3 {
  padding-top: 25px;
  font-weight: 700;
}

.text-feed {
  color: #d2d2d269;
  font-size: 5rem;
  position:absolute;
  bottom: 110px;
  left: 160px;
  text-align: center; /* Horizontally center text */
  display: flex; /* Use flexbox to center text vertically */
  align-items: center;
  justify-content: center; /* Center text horizontally within the container */
}

.rating {
  display: flex;
  flex-direction: row-reverse;
  justify-content: flex-start;
  font-size: 2rem;
  align-items: center;
}

.rating input {
  display: none;
}

.rating label {
  cursor: pointer;
  color: #d3d3d3; /* Default star color */
  font-size: 2rem; /* Adjust as needed */
  padding: 0 0.1rem; /* Adjust spacing as needed */
}

.rating label::before {
  content: '★';
}

.rating label:hover,
.rating label:hover ~ label {
  color: #ffc107; /* Hover star color */
}

.rating input:checked ~ label {
  color: #d3d3d3; /* Reset color for subsequent stars */
}

.rating input:checked + label,
.rating input:checked + label ~ label {
  color: #ffc107; /* Selected star color */
}

.star-rating {
  display: flex;
  align-items: center;
}

.star {
  font-size: 1.5em;
  color: #d3d3d3; /* Default star color */
}

.star.filled {
  color: #f39c12; /* Filled star color */
}

.spinner {
  border: 4px solid #f3f3f3; /* Light grey */
  border-top: 4px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 20px;
  height: 20px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

.loader {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  display: block;
  position: relative;
  color: #cacaca;
  box-sizing: border-box;
  animation: animloader 2s linear infinite;
}

@keyframes animloader {
  0% {
    box-shadow: 14px 0 0 -2px, 38px 0 0 -2px, -14px 0 0 -2px, -38px 0 0 -2px;
  }
  25% {
    box-shadow: 14px 0 0 -2px, 38px 0 0 -2px, -14px 0 0 -2px, -38px 0 0 2px;
  }
  50% {
    box-shadow: 14px 0 0 -2px, 38px 0 0 -2px, -14px 0 0 2px, -38px 0 0 -2px;
  }
  75% {
    box-shadow: 14px 0 0 2px, 38px 0 0 -2px, -14px 0 0 -2px, -38px 0 0 -2px;
  }
  100% {
    box-shadow: 14px 0 0 -2px, 38px 0 0 2px, -14px 0 0 -2px, -38px 0 0 -2px;
  }
}

.style-user img {
  width: 45px;
  height: 45px;
  object-fit: cover;
}

.style-user .fa-star,
.style-user .fa-star-half,
.style-user .far.fa-star {
  color: #ffc107;
}

.style-user label {
  font-weight: bold;
}

.style-user .bi-three-dots-vertical {
  cursor: pointer;
}
</style>
