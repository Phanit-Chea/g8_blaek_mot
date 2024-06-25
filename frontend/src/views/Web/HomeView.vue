<script setup lang="ts">
import WebHeaderMenu from '@/Components/WebHeaderMenu.vue';
</script>
<template>
   <WebHeaderMenu/>
  <WebLayout
  ><div
  class="max-w-2xl mt-2 rounded px-4 py-10 m-auto bg-white sm:px-8 dark:bg-gray-800 ring-1 ring-gray-200 dark:ring-gray-700"
  >
      <div class="text-center">
        <p class="text-lg md:text-2xl mb-8">Your journey to excellence starts here.</p>
        <p>Hello</p>
      </div>
    </div>
  </WebLayout>
  <a href="/chat"><i class="bi bi-chat-dots chat"><span class="position-absolute top-5 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2"><span class="visually-hidden">unread messages</span></span></i></a>
</template>
<style>
  .chat {
    font-size: 3rem;
    position: fixed;
    bottom: 20px;
    right: 40px;
    color: #66B64A;
    cursor: pointer;
    transition: transform 0.5s;
  }
  .chat:hover{
    transform: scale(1.05) rotate(-5deg);
    color: #62cd3c;
  }
</style>
