<script setup lang="ts">
import { ref, computed, onMounted } from 'vue';
import HeaderMenu from '../../../../src/Components/HeaderMenu.vue';
import NavbarAdmin from '@/Components/NavbarAdmin.vue';

// Define the type for table data
interface Partner {
  id: number;
  name: string;
  business: string;
  requestDate: string;
  status: string;
}

// Sample data for the table
const partners = ref<Partner[]>([
  {
    id: 1,
    name: 'Maersk Cambodia',
    business: 'video ads',
    requestDate: '27/6/2024',
    status: 'unaccept'
  },
  {
    id: 2,
    name: 'Maersk Cambodia',
    business: 'video ads',
    requestDate: '27/6/2024',
    status: 'accept'
  },
  {
    id: 3,
    name: 'Maersk Cambodia',
    business: 'video ads',
    requestDate: '27/6/2024',
    status: 'accept'
  }
]);

// Search query reactive reference
const searchQuery = ref('');

// Computed property to filter partners based on search query
const filteredPartners = computed(() => {
  return partners.value.filter(partner => 
    partner.name.toLowerCase().includes(searchQuery.value.toLowerCase())
  );
});
</script>

<template>
  <navbar-admin></navbar-admin>
  <div class="container-fluid" style="margin-top: 6%;">
    <div class="row flex-nowrap">
      <header-menu />
      <div class="container h-100" style="width: 86.8%">
        <div class="table-container px-4 mt-5">
          <h2 class="mb-3 siemreap">បញ្ចីសុំណើរសុំសហការនិងដៃគូសហការទាំងអស់</h2>
          <!-- Search Bar -->
          <div class="bg-light d-flex justify-content-between shadow">
            <div class="d-flex w-50 py-2 align-items-center">
              <p class="ms-5 me-3 p-0 fw-bold text-center siemreap">បង្ហាញ</p>
              <select id="number" class="w-25 form-control py-2 text-center">
                <option class="siemreap" value="" selected>ទាំងអស់</option>
                <option class="siemreap text-primary" value="accept">បានទទួល</option>
                <option class="siemreap text-danger" value="unaccept">មិនបានទទួល</option>
              </select>
            </div>
            <form class="form-inline d-flex justify-content-end pe-4 w-50 align-items-center" style="margin-left:20%">
              <input
                class="form-control mr-sm-2 w-50 py-2"
                type="search"
                placeholder="ស្វែងរក"
                aria-label="Search"
                v-model="searchQuery"
              />
              <button class="btn bg-primary py-1 px-2" type="submit">
                <i class="material-icons text-white">search</i>
              </button>
            </form>
          </div>
          <!-- End Search Bar -->
          <table id="example" class="table table-striped table-bordered shadow" style="width: 100%">
            <thead>
              <tr>
                <th class="siemreap text-center fw-bold">ឈ្មោះសមាជិក</th>
                <th class="siemreap text-center fw-bold">ពាណិជ្ជកម្ម</th>
                <th class="siemreap text-center fw-bold">កាលបរិច្ឆេទស្នើសុំ</th>
                <th class="siemreap text-center fw-bold">ស្ថានភាព</th>
                <th class="siemreap text-center fw-bold">សកម្មភាព</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="partner in filteredPartners" :key="partner.id">
                <td class="siemreap text-center">{{ partner.name }}</td>
                <td class="siemreap text-center">
                  <a :href="partner.business" target="_blank">video ads</a>
                </td>
                <td class="siemreap text-center">{{ partner.requestDate }}</td>
                <td class="text-center position-relative">
                  <span
                    :class="{'bg-success': partner.status === 'accept', 'bg-danger': partner.status === 'unaccept'}"
                    class="text-white siemreap py-2 rounded position-absolute top-50 start-50 translate-middle w-75"
                  >
                    {{ partner.status === 'accept' ? 'បានទទួល' : 'មិនទាន់ទទួល' }}
                  </span>
                </td>
                <td class="d-flex justify-content-evenly">
                  <p data-placement="top" data-toggle="tooltip" title="stop">
                    <button
                      class="btn btn-danger btn-xs"
                      data-title="Stop"
                      data-toggle="modal"
                      data-target="#stop"
                    >
                      <span class="glyphicon glyphicon-trash siemreap">ឈប់សហការ</span>
                    </button>
                  </p>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th class="siemreap text-center">ឈ្មោះសមាជិក</th>
                <th class="siemreap text-center">ពាណិជ្ជកម្ម</th>
                <th class="siemreap text-center">កាលបរិច្ឆេទស្នើសុំ</th>
                <th class="siemreap text-center">ស្ថានភាព</th>
                <th class="siemreap text-center">សកម្មភាព</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped>
.siemreap {
  font-family: 'Siemreap', cursive;
}

.card:hover {
  box-shadow: 0 0 5px #7166da, 0 0 25px #7166da, 0 0 50px #7166da;
  text-shadow: 0 0 5px #7166da;
  cursor: pointer;
}
</style>
