<template>
  <nav class="row bg-white p-2 fixed-top">
    <div class="navLeft col-md-auto d-flex align-items-center text-green">
      <img
        src="../../../assets/ContainerImages/logo.png"
        alt="homeImage"
        width="90%"
        height="90px"
      />
    </div>
    <div
      class="navCenter col-md d-flex align-items-center"
      style="width:55%; margin-left: 3%; margin-top: 10px; margin-bottom: 10px"
       >
      <div class="input-group w-240">
        <button class="input-group-text border border-success border-end-0">
          <i class="material-icons">search</i>
        </button>
        <input
          type="text"
          class="form-control p-2 border border-success border-end-0 shadow-none"
          placeholder="What would you like to eat?"
          aria-label="Search"
        />
        <button
          class="text-light input-group-text border border-success border-start-0"
          style="background-color: rgba(62, 160, 9, 0.942); width: 90px; justify-content: center"
        >
          Search
        </button>
      </div>
    </div>
    <div class="navRight col-md d-flex justify-content-end align-items-center gap-4 m-2">
      <a href="#"
        class="favoriteIcon me-3 rounded-circle d-flex p-1 justify-content-center align-items-center bg-white text-decoration-none">
        <i class="material-icons fs-1">turned_in</i>
      </a>
      <a href="#"
        class="notification me-3 rounded-circle d-flex p-1 justify-content-center align-items-center bg-white text-decoration-none">
        <i class="material-icons fs-1">notifications</i>
      </a>
      <a href="#"
        class="account me-3 rounded-circle d-flex p-1 justify-content-center align-items-center bg-white text-decoration-none">
        <img src="../../../assets/login.png" alt="login" width="38px" data-bs-toggle="modal"
          data-bs-target="#loginForm" />
      </a>
    </div>
    <div class="navPages row text-red mt-3">
      <div class="pages col d-flex" style="gap: 20px; margin-left: 20px">
        <a href="#" class="pagesLink text-green-700 fs-5 text-decoration-none nav-link">Home</a>
        <a href="#" class="pagesLink text-green-700 fs-5 text-decoration-none nav-link">Category</a>
        <a href="#" class="pagesLink text-green-700 fs-5 text-decoration-none nav-link">About Us</a>
        <a href="#" class="pagesLink text-green-700 fs-5 text-decoration-none nav-link">Join With Us</a>
      </div>
    </div>
  </nav>

</template>

<script setup lang="ts">
import { useAuthStore } from '@/stores/auth-store.ts';

const useAuth = useAuthStore();
</script>

<style scoped>
.favoriteIcon,
.notification,
.account {
  transition: transform 0.3s ease, border 0.3s ease;
  border: 2px solid rgba(62, 160, 9, 0.942);
  color: rgba(62, 160, 9, 0.942);
}

.login {
  display: flex;
  color: white;
  background: none;
  border: none;
}

.favoriteIcon:hover,
.notification:hover,
.account:hover {
  z-index: 10;
  border-color: rgba(62, 160, 9, 0.942);
}
</style>
