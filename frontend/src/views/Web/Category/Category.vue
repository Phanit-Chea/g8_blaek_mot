<template>
  <div class="container-fluid">
    <div class="row flex-nowrap">
<<<<<<< HEAD:frontend/src/views/Web/Category/Category.vue
      <side-bar-vue />
      <food-card-vue />

=======
      <side-bar-vue/>
      <food-card-vue/>
>>>>>>> userProfile:frontend/src/views/Web/Category/ListView.vue
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