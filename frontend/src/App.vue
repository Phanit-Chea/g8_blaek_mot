<template>
  <RouterView />
  <!-- <NavbarView></NavbarView> -->
  <!-- <FooterView></FooterView> -->
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