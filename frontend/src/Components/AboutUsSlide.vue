<template>
  <div class="slide-carousel">
    <div class="slide-container">
      <div
        v-for="(item, index) in slides"
        :key="index"
        :class="['slide-item', { 'active': index === currentIndex }]"
      >
        <template v-if="item.type === 'image'">
          <img :src="item.content" class="slide-image" />
        </template>
        <template v-else-if="item.type === 'map'">
          <iframe
            :src="item.content"
            width="100%"
            height="100%"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
          ></iframe>
        </template>
      </div>
    </div>

    <div class="controls">
      <button class="prev" @click="prevSlide">
        &#10094; 
      </button>
      <button class="next" @click="nextSlide">
        &#10095; 
      </button>
    </div>

    <div class="pagination">
      <button
        v-for="(item, index) in slides"
        :key="index"
        :class="['pagination-item', { 'active': index === currentIndex }]"
        @click="goToSlide(index)"
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
      slides: [
        {
          type: 'image',
          content: "https://www.theinternationalkitchen.com/wp-content/uploads/2018/09/TIK_CambodiaVacations_amok.jpg",
        },
        {
          type: 'image',
          content: "https://media.cnn.com/api/v1/images/stellar/prod/191122151358-4-bai-sach-chrouk-lina-goldberg.jpg?q=w_1110,c_fill",
        },
        {
          type: 'map',
          content: "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2072142.8891111037!2d104.49797514186897!3d12.565679435349416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095137e50f30b1%3A0x8c46a30fd8f40a27!2sCambodia!5e0!3m2!1sen!2sus!4v1624942392507!5m2!1sen!2sus",
        },
        {
          type: 'image',
          content: "https://grantourismotravels.com/wp-content/uploads/2021/02/Authentic-Nom-Banh-Chok-Recipe-Cambodian-Khmer-Noodles-Copyright-2021-Terence-Carter-Grantourismo.jpg",
        },
        {
          type: 'image',
          content: "https://hilltopcambodia.com/wp-content/uploads/2020/09/FRIED-MIXED-VEGETABLE.webp",
        },
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
      this.timer = setInterval(this.nextSlide, 4000);
    },
    nextSlide() {
      this.currentIndex = (this.currentIndex + 1) % this.slides.length;
    },
    prevSlide() {
      this.currentIndex = (this.currentIndex - 1 + this.slides.length) % this.slides.length;
    },
    goToSlide(index) {
      this.currentIndex = index;
    }
  }
};
</script>

<style scoped>
/* Add scoped styles here */
</style>
