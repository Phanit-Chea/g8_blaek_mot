<<<<<<< HEAD
<script setup lang="ts">

// import FoodDetail from './views/Web/FoodDetail/FoodDetail.vue';
</script>

<template>
  <RouterView />

=======
<template>
  <RouterView />
  <NavbarView></NavbarView>
  <FooterView></FooterView>
>>>>>>> ecaf23b82163045c2a15ec070014612b1cd0b6e9
</template>
<script>
import NavbarView from "./views/Web/Navbar/NavbarView.vue"
import FooterView from "./views/Web/Footer/FooterView.vue"

export default {
  name: "App",
  components: {
    NavbarView,
    FooterView,
  },
}
</script>
