<template>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <side-bar-vue/>
      <food-card-vue/>
    </div>
  </div>
</template>

<script>
import FoodCardVue from '../../../Components/FoodCard.vue'
import SideBarVue from '../../../Components/Layouts/SideBar.vue'


export default {
  name:'category-view',
  components: {
    SideBarVue,
    FoodCardVue
  }
}
</script>

<style></style>