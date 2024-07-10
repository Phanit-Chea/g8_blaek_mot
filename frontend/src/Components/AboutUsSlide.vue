<template>
  <div class="container">
    <el-carousel :interval="3000" type="card" height="350px">
      <el-carousel-item
        v-for="(image, index) in images"
        :key="index"
        :class="['slide-item', { active: index === currentIndex }]"
      >
        <img :src="image.imageSlide" class="slide-image" />
      </el-carousel-item>
    </el-carousel>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      images: [],
      currentIndex: 0,
      timer: null
    }
  },
  async mounted() {
    await this.fetchImages()
    this.startSlide()
  },
  methods: {
    async fetchImages() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/imageSlide/lists')

        if (Array.isArray(response.data.data)) {
          this.images = response.data.data
          console.log(this.images)
        } else {
          console.error('Invalid response format - expected an array:', response.data)
        }
      } catch (error) {
        console.error('Error fetching images:', error)
      }
    },
    startSlide() {
      this.timer = setInterval(this.nextImage, 4000)
    },
    nextImage() {
      this.currentIndex = (this.currentIndex + 1) % this.images.length
    },
    prevImage() {
      this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length
    }
  },
  beforeDestroy() {
    clearInterval(this.timer)
  }
}
</script>

<style scoped>
.container {
  margin-top: 15%;
  width: 100%;
  height: 350px;
}
.slide-image {
  opacity: 0.75;
  line-height: 100%;
  height: 100%;
  width: 100%;
  border-radius: 10px;
  text-align: center;
}

.el-carousel__item:nth-child(2n) {
  background-color: #99a9bf;
  border-radius: 10px;
}

.el-carousel__item:nth-child(2n + 1) {
  background-color: #d3dce6;
  border-radius: 10px;
}
</style>
