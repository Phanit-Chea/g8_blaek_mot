<template>
  <div>
    <transition-group name="fade" tag="div">
      <div v-for="(img, index) in images" :key="index" v-show="index === currentIndex">
        <img :src="img" />
      </div>
    </transition-group>
    <a class="prev" @click="prevImage" href="#">&#10094; Previous</a>
    <a class="next" @click="nextImage" href="#">Next &#10095; </a>
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
      timer: null,
      currentIndex: 0
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
.fade-enter-active,
.fade-leave-active {
  transition: all 0.9s ease;
  overflow: hidden;
  visibility: visible;
  position: absolute;
  width: 100%;
  opacity: 1;
}

.fade-enter,
.fade-leave-to {
  visibility: hidden;
  width: 100%;
  opacity: 0;
}

img {
  height: 500px;
  width: 100%;
}

.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.7s ease;
  border-radius: 0 4px 4px 0;
  text-decoration: none;
  user-select: none;
}

.next {
  right: 0;
}

.prev {
  left: 0;
}

.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.9);
}
</style>