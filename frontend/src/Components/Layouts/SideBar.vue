<template>
  <div
    class="col-auto col-md-2 col-xl-2 px-sm-0 px-0 "
    
  >
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 position-fixed  sidebar" style="background-color: #54983c; width: 160px">
      <a
        href=""
        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none"
      >
        <h3 class="d-none d-sm-inline mt-3 siemreap">ប្រភេទម្ហូប</h3>
      </a>
      <ul
        class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
        id="menu"
      >
        <li class="nav-item" v-for="category in categories" :key="category.id" @click="selectCategory(category.id)">
          <router-link 
            :to="{ name: 'category-list', params: { id: category.id } }"
            class="nav-link align-middle px-0">
            
            <span class="ms-1 d-none d-sm-inline text-white">{{category.name}}</span>
          </router-link>
        </li>

      </ul>
      <hr />
    </div>
  </div>
</template>

<script>
import 'bootstrap/dist/js/bootstrap.bundle.min.js'
import axiosInstance from '@/plugins/axios'

export default {
  name: 'side-bar',
  data() {
    return {
      categories: [],
    }
  },
  mounted() {
    this.fetchCategories()
  },
  methods: {
    async fetchCategories() {
      try {
        const response = await axiosInstance.get('/category/list')
        if (response.data.success) {
          this.categories = response.data.data
        }
      } catch (error) {
        console.error('Error fetching categories:', error)
      }
    },
    selectCategory(categoryId) {
    this.$emit('categorySelected', categoryId);
    
  },
  }
}
</script>

<style scoped>
/* Style the dropdown toggle button */
.nav-link.dropdown-toggle {
  font-size: 16px;
  font-weight: bold;
  color: #fff;
}

/* Style the dropdown menu */
.dropdown-menu {
  background-color: #54983c;
  border: none;
  border-radius: 0;
  min-width: 100px;
  max-width: 100px;
  width: auto;
}

.dropdown-item:hover,
.dropdown-item:focus {
  background-color: #3e7329;
  color: #fff;
}
/* Hover effect for bottom line of nav-link */
.sidebar .nav-item .nav-link {
  position: relative;
  display: inline-block;
  padding: 5px 15px;
  transition: color 0.3s ease-in-out;
}

.sidebar .nav-item .nav-link::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 0;
  height: 2px;
  background-color: #fff;
  transition: width 0.3s ease-in-out;
}

.sidebar .nav-item .nav-link:hover {
  color: #fff;
}

.sidebar .nav-item .nav-link:hover::after {
  width: 100%;
}
.siemreap {
  font-family: 'Siemreap', cursive;
}
</style>