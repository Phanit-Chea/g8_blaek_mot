<template>
    <div>
      <!-- Button trigger modal -->
      <button class="btn-primary" @click="isModalOpen = true">Reset Password</button>
  
      <!-- Modal -->
      <div v-if="isModalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white rounded-lg overflow-hidden shadow-xl max-w-xl w-full">
          <div class="header" style="display: flex; justify-content: end;">
            <button class="text-gray-400 hover:text-gray-900 border-none" @click="isModalOpen = false">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M10 8.586l4.95-4.95a1 1 0 111.414 1.414L11.414 10l4.95 4.95a1 1 0 01-1.414 1.414L10 11.414l-4.95 4.95a1 1 0 01-1.414-1.414L8.586 10 3.636 5.05a1 1 0 111.414-1.414L10 8.586z"
                  clip-rule="evenodd"></path>
              </svg>
            </button>
          </div>
          <div class="flex items-center justify-between p-2 border-b" style="margin-left: 15px; margin-right: 15px; justify-content: center;">
            <h3 class="text-success">Reset Password</h3>
          </div>
          <div class="p-3" style="margin-left: 15px; margin-right: 15px;">
            <form @submit.prevent="handleSubmit">
              <fieldset class="flex flex-col gap-2">
                <div class="mb-3 w-full">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control w-full" id="password">
                </div>
                <div class="mb-3 w-full">
                  <label for="confirmPassword" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control w-full" id="confirmPassword">
                </div>
                <div class="flex flex-col items-center mb-2 gap-4">
                  <button type="submit" class="hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    style="background-color: seagreen; border: none; margin-top: 15px; height: 6vh; margin-bottom: 12px;">Reset Password</button>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        isModalOpen: false
      };
    },
    methods: {
      handleSubmit() {
        this.isModalOpen = false;
        // Handle the form submission here
      }
    }
  };
  </script>
  
  <style scoped>
  /* Add any additional styles here */
  </style>
  