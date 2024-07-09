<template>
  <div class="pt-1">
    <navbar-view-vue />
    <about-us-slide-vue />

    <!-- About us -->
    <div class="about-container d-flex p-5">
      <div class="w-50">
        <h1 style="font-size: 140px; color: #54983c">ABOUT</h1>
        <h4 style="font-size: 80px; color: #54983c">BLAEK MOT</h4>
      </div>
      <div class="w-50 mt-4">
        <p class="text-justify ps-5" style="border-left: 5px solid gray">{{ description }}</p>
      </div>
    </div>

    <!-- Detail about us -->
    <div class="detail-container mt-3 px-5 d-flex">
      <div class="w-50 pe-5">
        <h2 class="mb-5">These are details about our website</h2>
        <div class="d-flex mb-3">
          <button class="about-btn" @click="showRecommentFood">Recomment Food</button>
          <button class="about-btn" @click="showMission">Our Mission</button>
          <button class="about-btn" @click="showVision">Our Vision</button>
        </div>
        <p class="text-justify">{{ result }}</p>
      </div>
      <div class="w-50 ps-5">
        <img :src="imageDetail" alt="food img" style="height: 400px; width: 100%" />
      </div>
    </div>

    <footer-view-vue />
  </div>
</template>

<script>
import AboutUsSlideVue from '../../../Components/AboutUsSlide.vue'
import FooterViewVue from '../Footer/FooterView.vue'
import NavbarViewVue from '../Navbar/NavbarView.vue'
import axios from 'axios'

export default {
  components: {
    AboutUsSlideVue,
    NavbarViewVue,
    FooterViewVue
  },
  data() {
    return {
      imageDetail: '',
      result: 'Click on the buttons above to see more details about our website.',
      description: '',
      recommentFood: '',
      ourMission: '',
      ourVision: ''
    }
  },
  created() {
    this.fetchData()
  },
  methods: {
    async fetchData() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/aboutus/latest')
        console.log('API Response:', response.data)

        const data = response.data
        this.description = data.description
        this.recommentFood = data.recommentFood
        this.ourMission = data.ourMission
        this.ourVision = data.ourVision
        this.imageDetail = data.imageDetail
      } catch (error) {
        console.error('Error fetching data:', error)
      }
    },
    showRecommentFood() {
      this.result = this.recommentFood
    },
    showMission() {
      this.result = this.ourMission
    },
    showVision() {
      this.result = this.ourVision
    }
  }
}
</script>

<style scoped>
.about-btn {
  border: none;
  background-color: transparent;
  color: #000;
  font-weight: bold;
  padding: 0.5rem 1rem;
  transition: all 0.3s ease-in-out;
}

.about-btn:hover {
  color: #54983c;
  border-bottom: 2px solid #54983c;
}
</style>
