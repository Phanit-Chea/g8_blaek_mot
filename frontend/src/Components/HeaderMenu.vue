<!-- src/components/HeaderMenu.vue -->
<template>
    <div class="col-auto col-md-2 col-xl-2 px-sm-2 px-0 " style="background-color:	#1d243c; width: 200px">
    <div
      class="d-flex flex-column align-items-center align-items-sm-start px-3 pdark min-vh-100 sticky-top sidebar">
    
      <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
        <li class="h3 siemreap mb-5 text-white mt-4 font-weight-bold">អ្នកគ្រប់គ្រង</li>
        <li class="nav-item mt-3">
          <router-link to="" class="nav-link align-middle px-0">
            <i class="fs-4 text-white align-middle material-icons">person</i>
            <span class="ms-2 d-none d-sm-inline text-white siemreap">អ្នកប្រើ</span>
          </router-link> </li>
        <li class="nav-item mt-2">
            <router-link to="" class="nav-link px-0 align-middle">
            <i class="fs-4 text-white align-middle material-icons">fastfood</i>
            <span class="ms-1 d-none d-sm-inline text-white siemreap">ម្ហូប</span>
            </router-link>
        </li>
        <li class="nav-item mt-2">
            <router-link to="" class="nav-link px-0 align-middle">
            <i class="fs-4 text-white align-middle material-icons">swap_horiz</i>
            <span class="ms-1 d-none d-sm-inline text-white siemreap">ដៃគូ</span>
            </router-link>
        </li>
        <li class="nav-item mt-2">
          <router-link to="" class="nav-link px-0 align-middle">
            <i class="fs-4 text-white align-middle material-icons">settings</i>
            <span class="ms-1 d-none d-sm-inline text-white siemreap">ការកំណត់</span>
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
</style>
