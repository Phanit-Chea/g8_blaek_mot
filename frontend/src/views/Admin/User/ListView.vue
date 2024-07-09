<template>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <header-menu />
      <div class="container" style="width: 86.8%">
        <div class="row mt-4 px-4">
          <div class="col-md-12">
            <h2 class="mb-3 siemreap">បញ្ចីអ្នកប្រើប្រាស់ទាំងអស់</h2>
            <div class="table-responsive">
              <!-- Search Bar -->
              <div class="bg-light d-flex justify-content-between shadow">
                <!-- Number Range Selector -->
                <div class="d-flex w-50 py-2 align-items-center">
                  <p class="ms-5 me-3 p-0 fw-bold text-center siemreap">បង្ហាញ</p>
                  <select v-model="numberRange" class="w-25 form-control py-2 text-center">
                    <option class="siemreap" value="">ទាំងអស់</option>
                    <option class="siemreap" value="10-20">10-20</option>
                    <option class="siemreap" value="20-30">20-30</option>
                    <option class="siemreap" value="30-40">30-40</option>
                    <option class="siemreap" value="40-50">40-50</option>
                    <option class="siemreap" value="50-60">50-60</option>
                    <option class="siemreap" value="60-70">60-70</option>
                    <option class="siemreap" value="70-80">70-80</option>
                    <option class="siemreap" value="80-90">80-90</option>
                    <option class="siemreap" value="90-100">90-100</option>
                  </select>
                </div>
                <!-- Search Form -->
                <form @submit.prevent="searchUsers" class="form-inline d-flex justify-content-end pe-4 w-50 align-items-center">
                  <input v-model="searchTerm" class="form-control mr-sm-2 w-50 py-2" type="search" placeholder="ស្វែងរក" aria-label="Search" />
                  <button class="btn bg-primary py-1 px-2" type="submit">
                    <i class="material-icons text-white">search</i>
                  </button>
                </form>
              </div>
              <!-- End Search Bar -->
              <hr class="p-0 m-0" />
              <!-- User Table -->
              <table id="mytable" class="table table-bordered table-striped shadow">
                <thead>
                  <tr>
                    <th class="pt-5"></th>
                    <th class="siemreap fw-bold text-center">ឈ្មោះពេញ</th>
                    <th class="siemreap fw-bold text-center">អ៊ីមែល</th>
                    <th class="siemreap fw-bold text-center">លេខទូរស័ព្ទ</th>
                    <th class="siemreap fw-bold text-center">ភេទ</th>
                    <th class="siemreap fw-bold text-center">ការស្នើសុំ</th>
                    <th class="siemreap fw-bold text-center">ទីកន្លែង</th>
                    <th class="siemreap fw-bold text-center">លុប</th>
                  </tr>
                </thead>
                <tbody v-if="filteredUsers.length > 0">
                  <UserList v-for="user in filteredUsers" :key="user.id" :user="user" @deleteUser="handleDeleteUser(user.id)" />
                </tbody>
                <tbody v-else>
                  <tr>
                    <td colspan="8" class="text-center siemreap">គ្មានអ្នកប្រើប្រាស់ដែលផ្គុំជូននូវលទ្ធផលនោះ</td>
                  </tr>
                </tbody>
              </table>
              <!-- End User Table -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted, computed } from 'vue';
import HeaderMenu from '../../../../src/Components/HeaderMenu.vue';
import UserList from '../../../../src/Components/UserList.vue';
import Swal from 'sweetalert2';

// Reference for users, search term, and number range
const users = ref([]);
const searchTerm = ref('');
const numberRange = ref('');

// Function to fetch users
const fetchUsers = async () => {
  try {
    const response = await fetch('http://127.0.0.1:8000/api/customers/list');
    if (!response.ok) {
      throw new Error('Failed to fetch users');
    }
    const data = await response.json();
    users.value = data;
  } catch (error) {
    console.error('Failed to fetch users', error);
    // Handle error if needed
  }
};

// Function to handle user deletion
const handleDeleteUser = async (userId: number) => {
  try {
    const response = await fetch(`http://127.0.0.1:8000/api/customers/delete/${userId}`, {
      method: 'DELETE',
    });

    if (response.ok) {
      // Remove the deleted user from the list
      users.value = users.value.filter(user => user.id !== userId);

      // Show SweetAlert message
      Swal.fire({
        icon: 'success',
        title: 'User deleted successfully',
        text: 'This user has been deleted!',
        confirmButtonText: 'OK'
      });
    } else {
      throw new Error('Failed to delete user');
    }
  } catch (error) {
    console.error('Failed to delete user', error);

    // Optionally show SweetAlert message for error
    Swal.fire({
      icon: 'error',
      title: 'Delete Failed',
      text: 'Cannot delete this user.',
      confirmButtonText: 'OK'
    });
  }
};

// Computed property for filtered users based on search term and number range
const filteredUsers = computed(() => {
  let filtered = users.value;

  // Filter by search term
  if (searchTerm.value.trim()) {
    const term = searchTerm.value.toLowerCase().trim();
    filtered = filtered.filter(user =>
      user.name.toLowerCase().includes(term) ||
      user.email.toLowerCase().includes(term) ||
      user.address.toLowerCase().includes(term)
    );
  }

  // Filter by number range if selected
  if (numberRange.value) {
    const [minAge, maxAge] = numberRange.value.split('-').map(Number);
    filtered = filtered.filter(user =>
      user.age >= minAge && user.age <= maxAge
    );
  }

  return filtered;
});

// Fetch users on component mount
onMounted(fetchUsers);
</script>

<style scoped>
.siemreap {
  font-family: 'Siemreap', cursive;
}
</style>
