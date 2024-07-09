<template>
  <NavbarViewVue/>
  <div class="container-fluid" style="margin-top:11.75%;">
    <div class="row flex-nowrap">
      <side-bar-vue @categorySelected="onCategorySelected" />
      <food-card-vue :foods="foods" />
    </div>
  </div>
  <!-- <FooterViewVue></FooterViewVue> -->
</template>

<script>
import axios from 'axios'
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
  },
  data() {
    return {
      foods: [],
      selectedCategoryId: null
    }
  },
  mounted() {
    this.fetchFood()
  },
  methods: {
    onCategorySelected(categoryId) {
      this.selectedCategoryId = categoryId
      this.fetchFood()
    },
    async fetchFood() {
      if(this.selectedCategoryId == null){
        try {
          const response = await axios.get(
            'http://127.0.0.1:8000/api/food/list'
          )
          this.foods = response.data.data
          console.log('Fetched foods:', this.foods)
  
        } catch (error) {
          console.error('Error fetching food:', error)
        }
      }else{
        try {
          const response = await axios.get(
            `http://127.0.0.1:8000/api/food/bycategory/${this.selectedCategoryId}`
          )
          this.foods = response.data
          console.log('Fetched foods:', this.foods)
  
        } catch (error) {
          console.error('Error fetching food:', error)
        }
      }
    }
  }
}
</script>

<style>
.container-fluid{
  background-color: whitesmoke;
}
</style>