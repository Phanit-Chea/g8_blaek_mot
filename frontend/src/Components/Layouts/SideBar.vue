<template>
  <div
    class="col-auto col-md-2 col-xl-2 px-sm-0 px-0 "
    
  >
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 position-fixed  sidebar" style="background-color: #54983c; width: 160px">
      <a
        href=""
        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none"
      >
        <h3 class="d-none d-sm-inline mt-3">Category</h3>
      </a>
      <ul
        class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
        id="menu"
      >
        <li class="nav-item">
          <a href="#" class="nav-link align-middle px-0">
            
            <span class="ms-1 d-none d-sm-inline text-white">Breakfast</span>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class=" nav-link px-0 align-middle">
       
            <span class="ms-1 d-none d-sm-inline text-white">Lunch</span></a
          >
        </li>

        <li class="nav-item">
          <a href="#" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
          
            <span class="ms-1 d-none d-sm-inline text-white">Dinner</span>
          </a>
        </li>
        <li class=" dropdown">
          <a
            class="nav-link dropdown-toggle px-0 align-middle text-white"
            href="#"
            id="navbarDropdown"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            <span class="ms-1 d-none d-sm-inline">Others</span>
          </a>
          <ul
            class="dropdown-menu dropdown-menu-dark dropdown-menu-end p-0"
            aria-labelledby="navbarDropdown"
          >
            <li><a class="dropdown-item w-30 text-white" href="#">Dessert</a></li>
            <li><a class="dropdown-item w-30 text-white" href="#">Snacks</a></li>
            <li><a class="dropdown-item w-30 text-white" href="#">Drinks</a></li>
          </ul>
        </li>
      </ul>
      <hr />
    </div>
  </div>
</template>

<script>
import 'bootstrap/dist/js/bootstrap.bundle.min.js'

export default {}
</script>

<style>
/* Style the dropdown toggle button */
.nav-link.dropdown-toggle {
  font-size: 16px;
  font-weight: bold;
  color: #fff;
}

/* Style the dropdown menu */
.dropdown-menu {
  background-color: #54983c;
  border: none;
  border-radius: 0;
  min-width: 100px;
  max-width: 100px;
  width: auto;
}

.dropdown-item:hover,
.dropdown-item:focus {
  background-color: #3e7329;
  color: #fff;
}
/* Hover effect for bottom line of nav-link */
.sidebar .nav-item .nav-link {
  position: relative;
  display: inline-block;
  padding: 5px 15px;
  transition: color 0.3s ease-in-out;
}

.sidebar .nav-item .nav-link::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 0;
  height: 2px;
  background-color: #fff;
  transition: width 0.3s ease-in-out;
}

.sidebar .nav-item .nav-link:hover {
  color: #fff;
}

.sidebar .nav-item .nav-link:hover::after {
  width: 100%;
}
</style>