<!-- src/components/HeaderMenu.vue -->
<template>
    <div class="col-auto col-md-2 col-xl-2 px-sm-2 px-0 " style="background-color:	#1d243c; width: 200px">
    <div
      class="d-flex flex-column align-items-center align-items-sm-start px-3 pdark min-vh-100 sticky-top sidebar">
    
      <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
        <li class="my-3">
          <router-link to="/admin/dashboard" class="nav-link align-middle px-0">
            <span class="h3 siemreap mb-5 text-white mt-4 font-weight-bold">អ្នកគ្រប់គ្រង</span>
          </router-link> 
        </li>
        <li class="nav-item mt-4 pe-5">
          <router-link to="/admin/user" class="nav-link align-middle px-0">
            <i class="fs-4 text-white align-middle material-icons">person</i>
            <span class="ms-2 d-none d-sm-inline text-white siemreap ">អ្នកប្រើ</span>
          </router-link> </li>
        <li class="nav-item mt-2">
            <router-link to="/admin/food" class="nav-link px-0 align-middle">
            <i class="fs-4 text-white align-middle material-icons">fastfood</i>
            <span class="ms-1 d-none d-sm-inline text-white siemreap pe-5">បញ្ចីម្ហូប</span>
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

        
      </ul>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { Icon } from '@iconify/vue'

const isMenuOpen = ref(false)
const menu = [
  {
    title: 'User',
    meta: {
      permission: 'view_users'
    },
    link: '/users'
  },
  {
    title: 'Role',
    meta: {
      permission: 'view_roles'
    },
    link: '/roles'
  },
  {
    title: 'Permission',
    meta: {
      permission: 'view_permissions'
    },
    link: '/permissions'
  }
]

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value
}
</script>
<style scoped>
.siemreap {
  font-family: 'Siemreap', cursive;
}
.nav-item:hover{
  text-shadow: 0 0 5px cyan,0 0 25px cyan,0 0 50px cyan,0 0 100px cyan,0 0 200px cyan;

}
</style>
