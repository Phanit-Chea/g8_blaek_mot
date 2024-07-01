<template>
  <RouterView />
  <!-- <NavbarView></NavbarView>
  <FooterView></FooterView> -->
 
</template>
<FormFood />
<script>
import NavbarView from "./views/Web/Navbar/NavbarView.vue"
import FooterView from "./views/Web/Footer/FooterView.vue"
import FormFood from './views/Admin/Food/FormAddFoodView.vue'

export default {
  name: "App",
  components: {
    NavbarView,
    FooterView,
    FormFood
  },
}
</script>

