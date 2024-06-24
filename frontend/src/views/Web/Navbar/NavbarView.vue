<template>
  <nav class="row bg-white p-3 fixed-top">
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
      style="width: 100%; margin-left:2%; margin-top: 10px; margin-bottom: 10px"
    >
      <div class="input-group w-250">
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
        class="me-3 rounded-circle d-flex p-1 justify-content-center align-items-center bg-white text-decoration-none"
        style="border: 3px solid rgb(43, 212, 145)"
      >
        <i class="material-icons text-green fs-1">account_circle</i>
      </a>
      <a
        href="#"
        class="me-3 rounded-circle d-flex p-1 justify-content-center align-items-center bg-white text-decoration-none"
        style="border: 3px solid rgb(43, 212, 145)"
      >
        <i class="material-icons text-green fs-1">notifications</i>
      </a>
      <a
        href="#"
        class="me-3 rounded-circle d-flex p-1 justify-content-center align-items-center bg-white text-decoration-none"
        style="border: 3px solid rgb(43, 212, 145)"
      >
        <i class="material-icons text-green fs-1">turned_in_not</i>
      </a>
    </div>
    <div class="navPages row text-warning mt-3">
      <div class="col d-flex" style="gap: 20px; margin-left: 20px;">
        <a href="#" class="text-green fs-4 text-decoration-none nav-link">Home</a>
        <a href="#" class="text-green fs-4 text-decoration-none nav-link">Category</a>
        <a href="#" class="text-green fs-4 text-decoration-none nav-link">About Us</a>
        <a href="#" class="text-green fs-4 text-decoration-none nav-link">Join With Us</a>
      </div>
    </div>
  </nav>
</template>
<script>
    export default{
        name: 'NavbarView',
    }
</script>
