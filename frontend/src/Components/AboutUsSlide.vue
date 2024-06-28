<template>
  <div class="slide-carousel" style="margin-top:11.05%">
    <div class="slide-container">
      <div
        v-for="(img, index) in images"
        :key="index"
        :class="['slide-item', { 'active': index === currentIndex }]"
      >
        <img :src="img" class="slide-image" />
      </div>
    </div>
    <div class="controls">
      <button class="prev" @click="prevImage">
        &#10094; 
      </button>
      <button class="next" @click="nextImage">
        &#10095; 
      </button>
    </div>
    <div class="pagination">
      <button
        v-for="(_, index) in images"
        :key="index"
        :class="['pagination-item', { 'active': index === currentIndex }]"
        @click="currentIndex = index"
      >
        {{ index + 1 }}
      </button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      images: [
        "https://www.theinternationalkitchen.com/wp-content/uploads/2018/09/TIK_CambodiaVacations_amok.jpg",
        "https://media.cnn.com/api/v1/images/stellar/prod/191122151358-4-bai-sach-chrouk-lina-goldberg.jpg?q=w_1110,c_fill",
        "https://grantourismotravels.com/wp-content/uploads/2021/02/Authentic-Nom-Banh-Chok-Recipe-Cambodian-Khmer-Noodles-Copyright-2021-Terence-Carter-Grantourismo.jpg",
        "https://hilltopcambodia.com/wp-content/uploads/2020/09/FRIED-MIXED-VEGETABLE.webp"
      ],
      currentIndex: 0,
      timer: null
    };
  },
  mounted() {
    this.startSlide();
  },
  methods: {
    startSlide() {
      this.timer = setInterval(this.nextImage, 4000);
    },
    nextImage() {
      this.currentIndex = (this.currentIndex + 1) % this.images.length;
    },
    prevImage() {
      this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
    }
  }
};
</script>

<style>
.slide-carousel {
  position: relative;
  width: 100%;
  height: 450px;
  overflow: hidden;
}

.slide-container {
  position: relative;
  width: 100%;
  height: 100%;
}

.slide-item {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  transition: opacity 0.9s ease;
}

.slide-item.active {
  opacity: 1;
}

.slide-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.controls {
  position: absolute;
  top: 40%;
  transform: translateY(-50%);
  width: 100%;
  display: flex;
  justify-content: space-between;
  z-index: 1;
}

.controls button {
  padding: 5px 15px;
  background: none;
  color: #000;
  border: none;

  font-size: 18px;
  cursor: pointer;
}

.pagination {
  position: absolute;
  bottom: 10px;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  gap: 5px;
  z-index: 1;
}

.pagination-item {
  background: none;
  color: #fff;
  border: none;
  padding: 5px 10px;
  font-size: 14px;
  cursor: pointer;
}

.pagination-item.active {
  background-color: rgba(0, 0, 0, 0.5);
  color: #000;
}
</style>