<template>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <side-bar-vue/>
      <div class="col py-3">
        Content area...
        </div>
    </div>
  </div>
</template>

<script>
import SideBarVue from '../../../Components/Layouts/SideBar.vue'

export default {
    components:{
        SideBarVue
    }
}
</script>

<style>
</style>