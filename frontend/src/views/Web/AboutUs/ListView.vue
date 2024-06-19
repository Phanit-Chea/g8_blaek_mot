<template>
  <about-us-slide-vue/>
  <!-- About us -->
  <div class="about-container d-flex mt-4 p-5">
    <div class="w-50">
      <h1 style="font-size: 140px; color: #54983c;">ABOUT</h1>
      <h4 style="font-size: 80px; color: #54983c;">BLAEK MOT</h4>
    </div>
    <div class="w-50 mt-4">
      <p class="text-justify ps-5" style="border-left: 5px solid gray;">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum.</p>
    </div>
  </div>
  <!-- Datial about us -->

  <div class="detail-container mt-3 px-5 d-flex">
    <div class="w-50 pe-5">
      <h2 class="mb-5">These are details about our website</h2>
      <div class="d-flex mb-3">
        <button class="about-btn" @click="RecommentFood()">Recomment Food</button>
        <button class="about-btn" @click="Mission()">Our Mission</button>
        <button class="about-btn" @click="Vision()">Our Vision</button>
      </div>
      <p class="text-justify">{{result}}</p>
    </div>
    <div class="w-50 ps-5">
      <img src="https://www.theinternationalkitchen.com/wp-content/uploads/2018/09/TIK_CambodiaVacations_amok.jpg" alt="food img" style="height: 300px; width: 100%;">
    </div>
  </div>
</template>

<script>
import AboutUsSlideVue from '../../../Components/AboutUsSlide.vue'
export default {
  components: {
    AboutUsSlideVue
  },
  data() {
    return {
      result: "Click on the buttons above to see more details about our website."
    }
  },
  methods: {
    RecommentFood() {
      this.result = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum";
    },
    Mission() {
      this.result = "Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum";
    },
    Vision() {
      this.result = "simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum";
    }
  }
};
</script>

<style>
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