<template>
  <nav class="row bg-white p-2 fixed-top">
    <div class="navLeft col-md-auto d-flex align-items-center text-green">
      <img
        src="../../../assets/ContainerImages/logo.png"
        alt="homeImage"
        width="100%"
        height="100px"
      />
      <!-- <h1 class="logo" style="font-family: 'Moul', serif; margin-left: 20px">ប្លែកមាត់</h1> -->
    </div>
    <div
      class="navCenter col-md d-flex align-items-center"
      style="width: 100%; margin-left: 3%; margin-top: 10px; margin-bottom: 10px"
    >
      <div class="input-group w-240">
        <button class="input-group-text border border-success border-end-0">
          <i class="material-icons">search</i>
        </button>
        <input
          type="text"
          class="form-control p-3 border border-success border-end-0 shadow-none"
          placeholder="What would like to eat?"
          aria-label="Search"
        />
        <button class="text-light input-group-text border border-success bg-green border-start-0">
          Search
        </button>
      </div>
    </div>
    <div class="navRight col-md d-flex justify-content-end align-items-center gap-4 m-2">
      <a
        href="#"
        class="btnLogin me-3 d-flex p-2 justify-content-center align-items-center bg-green text-decoration-none"
      >
        <button class="login">Login</button>
      </a>
      <a
        href="#"
        class="notification me-3 rounded-circle d-flex p-1 justify-content-center align-items-center bg-white text-decoration-none"
        style="border: 3px solid rgb(43, 212, 145)"
      >
        <i class="material-icons text-green fs-1">notifications</i>
      </a>
      <a
        href="#"
        class="account me-3 rounded-circle d-flex p-1 justify-content-center align-items-center bg-white text-decoration-none"
        style="border: 3px solid rgb(43, 212, 145)"
      >
        <i class="material-icons text-green fs-1">account_circle</i>
      </a>
    </div>
    <div class="navPages row text-warning mt-3">
      <div class="pages col d-flex" style="gap: 20px; margin-left: 20px">
        <a href="#" class="pagesLink text-green fs-4 text-decoration-none nav-link">Home</a>
        <a href="#" class="pagesLink text-green fs-4 text-decoration-none nav-link">Category</a>
        <a href="#" class="pagesLink text-green fs-4 text-decoration-none nav-link">About Us</a>
        <a href="#" class="pagesLink text-green fs-4 text-decoration-none nav-link">Join With Us</a>
      </div>
    </div>
  </nav>
</template>
<script>
export default {
  name: 'NavbarView'
}
</script>
<style scoped>
.btnLogin,
.notification,
.account {
  transition: transform 0.3s ease;
  border-radius:5px;
}
.login {
  display: flex;
  color: white;
  background: none;
  border: none;
}
.btnLogin:hover,
.notification:hover,
.account:hover {
  transform: scale(1.1);
  z-index: 10;
}
</style>
