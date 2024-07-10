<template>
    <div class="col-auto col-md-2 col-xl-2 px-sm-2 px-0 " style="background-color:	#1d243c; width: 170px">
    <div
      class="d-flex flex-column align-items-center align-items-sm-start ps-2 pdark min-vh-100 sticky-top sidebar">
    
      <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
        <li class="my-3">
          <router-link to="/admin/dashboard" class="nav-link align-middle px-0">
            <span class="h3 siemreap mb-5 text-white mt-4 font-weight-bold">អ្នកគ្រប់គ្រង</span>
          </router-link> 
        </li>
        <li class="nav-item mt-4 pe-5">
          <router-link to="/admin/user" class="nav-link align-middle px-0">
            <i class="fs-4 text-white align-middle material-icons">person</i>
            <span class="ms-2 d-none d-sm-inline text-white siemreap">អ្នកប្រើ</span>
          </router-link> 
        </li>
        <li class="nav-item mt-2">
            <router-link to="/admin/food" class="nav-link px-0 align-middle">
            <i class="fs-4 text-white align-middle material-icons">fastfood</i>
            <span class="ms-1 d-none d-sm-inline text-white siemreap pe-5">បញ្ចីម្ហូប</span>
            </router-link>
        </li>
        <li class="nav-item mt-2">
            <router-link to="/admin/category" class="nav-link px-0 align-middle">
            <i class="fs-4 text-white align-middle material-icons">category</i>
            <span class="ms-1 d-none d-sm-inline text-white siemreap pe-5">ប្រភេទម្ហូប</span>
            </router-link>
        </li>
        <li class="nav-item mt-2">
            <router-link to="/admin/partnership" class="nav-link px-0 align-middle">
            <i class="fs-4 text-white align-middle material-icons">swap_horiz</i>
            <span class="ms-1 d-none d-sm-inline text-white siemreap pe-5">ដៃគូសហការ</span>
          </router-link>
        </li>
        <li class="nav-item mt-2">
          <router-link to="/admin/setting" class="nav-link px-0 align-middle">
            <i class="fs-4 text-white align-middle material-icons">settings</i>
            <span class="ms-1 d-none d-sm-inline text-white siemreap pe-5">ការកំណត់</span>
          </router-link>
        </li>
        <li class="nav-item mt-2">
          <a @click="toggleDropdown" class="nav-link px-0 align-middle" href="#">
            <i class="fs-4 text-white align-middle material-icons">contact_mail</i>
            <span class="ms-1 d-none d-sm-inline text-white siemreap pe-5"> អំពីពួកយើង</span>
          </a>
        </li>
        <div v-if="isDropdownVisible" class="slideShow" style="display: flex; flex-direction: column;">
          <router-link to="/aboutUsSlideForm" class="text-light nav-item" style="text-decoration: none; margin-top: 15px; margin-left: 20px;">ស្លាយរូបភាព</router-link>
          <router-link to="/aboutUsUpdateForm" class="text-light nav-item" style="text-decoration: none; margin-top: 15px; margin-left: 20px;">កែប្រែទាំងអស់</router-link>
        </div>
      </ul>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const isDropdownVisible = ref(false)

const toggleDropdown = () => {
  isDropdownVisible.value = !isDropdownVisible.value
}
</script>

<style scoped>
.siemreap {
  font-family: 'Siemreap', cursive;
}
.nav-item:hover {
  text-shadow: 0 0 5px cyan, 0 0 25px cyan, 0 0 50px cyan, 0 0 100px cyan, 0 0 200px cyan;
}
.nav-item {
  cursor: pointer;
}
.slideShow a {
  cursor: pointer;
}
</style>
