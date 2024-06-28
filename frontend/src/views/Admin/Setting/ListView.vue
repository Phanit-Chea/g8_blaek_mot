<script setup lang="ts">
import HeaderMenu from '../../../../src/Components/HeaderMenu.vue'
</script>
<template>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <header-menu />
      <!-- Table  -->
      <div class="container h-100 px-5" style="width: 86.8%">
        <p class="text-success mt-4">Mail update!!</p>
        <form class="w-100 mt-5 bg-white shadow rounded ">
          <h3 class="ps-5 py-4 fw-bold">Mail Setting</h3>
          <div class="main-div d-flex justify-content-between">
            <div class="form-group w-50 px-5 pb-5">
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form6Example3">Mail Transport</label>
                <input type="input" id="form6Example3" class="form-control" />
              </div>

              <!-- Text input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form6Example4">Mail Port</label>
                <input type="input" id="form6Example4" class="form-control" />
              </div>

              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form6Example5">Mail Password</label>
                <input type="input" id="form6Example5" class="form-control" />
              </div>

              <!-- Number input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form6Example6">Mail From</label>
                <input type="input" id="form6Example6" class="form-control" />
              </div>
            </div>
            <div class="form-group w-50 px-5 pb-5">
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form6Example3">Mail Host </label>
                <input type="input" id="form6Example3" class="form-control" />
              </div>

              <!-- Text input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form6Example4">Mail Username</label>
                <input type="input" id="form6Example4" class="form-control" />
              </div>

              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form6Example5">Mail Encryption</label>
                <input type="input" id="form6Example5" class="form-control" />
              </div>

              
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<style scoped>
.siemreap {
  font-family: 'Siemreap', cursive;
}
</style>
