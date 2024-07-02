<template>
  <NavbarViewVue/>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <side-bar-vue />
      <food-card-vue />
    </div>
  </div>
 <FooterViewVue></FooterViewVue>
</template>

<script>
import FoodCardVue from '../../../Components/FoodCard.vue'
import SideBarVue from '../../../Components/Layouts/SideBar.vue'
import FooterViewVue from '../Footer/FooterView.vue'
import NavbarViewVue from '../Navbar/NavbarView.vue'



export default {
  name: 'category-view',
  components: {
    SideBarVue,
    FoodCardVue,
    FooterViewVue,
    NavbarViewVue
  }
}
</script>

<style></style>