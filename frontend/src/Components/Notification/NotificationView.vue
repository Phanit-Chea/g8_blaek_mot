<template>
  <div>
    <!-- Button trigger modal -->
    <button class="btn-primary" @click="openModal()">Notification</button>

    <!-- Modal -->
    <div v-if="isModalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
      <div class="bg-white rounded-lg overflow-hidden shadow-xl max-w-xl w-full">
        <!-- Modal header -->
        <div class="header flex p-2 border-b justify-between">
          <h4 class="text-success" style="margin-left: 10px; margin-top: 10px;">Notification</h4>
          <button class="bg-white border-none" @click="closeModal()">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 8.586l4.95-4.95a1 1 0 111.414 1.414L11.414 10l4.95 4.95a1 1 0 01-1.414 1.414L10 11.414l-4.95 4.95a1 1 0 01-1.414-1.414L8.586 10 3.636 5.05a1 1 0 111.414-1.414L10 8.586z"
                clip-rule="evenodd"></path>
            </svg>
          </button>
        </div>

        <!-- View All and News section -->
        <div class="p-2 flex justify-around items-center border-b border-gray-300">
          <h6 class="hover:underline">View All</h6>
          <h6 class="hover:underline">News</h6>
        </div>

        <!-- Modal content -->
        <div v-for="notification in notifications" :key="notification.id" class="notification-card flex items-center border border-gray-300 px-4 py-2">
          <!-- Card with image, title, and category -->
          <div class="flex-shrink-0">
            <img :src="notification.foodImage" alt="Food Image" class="w-16 h-16 object-cover">
          </div>
          <div class="flex flex-col px-2">
            <h3 class="text-lg font-semibold">{{ notification.foodTitle }}</h3>
            <p class="text-sm text-gray-600">{{ notification.foodCategory }}</p>
          </div>
          <div class="ml-auto px-2">
            <p class="text-sm text-gray-500">{{ notification.time }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isModalOpen: false,
      notifications: [
        { id: 1, foodImage: 'src/assets/images/food1.jpg', foodTitle: 'Food Name 1', foodCategory: 'Category 1', time: '10 minutes' },
        { id: 2, foodImage: 'src/assets/images/food2.jpg', foodTitle: 'Food Name 2', foodCategory: 'Category 2', time: '20 minutes' },
        { id: 3, foodImage: 'src/assets/images/food3.jpg', foodTitle: 'Food Name 3', foodCategory: 'Category 3', time: '30 minutes' }
      ]
    };
  },
  methods: {
    openModal() {
      this.isModalOpen = true;
    },
    closeModal() {
      this.isModalOpen = false;
    }
  }
};
</script>

<style scoped>
.notification-card {
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
.notification-card{
  transition: transform 0.3s ease;
}

.notification-card:hover {
  transform: scale(1.05);
  z-index: 10;
}
</style>
