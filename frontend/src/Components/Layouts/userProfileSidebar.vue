<template> 
<div class="col-auto col-md-2 col-xl-2 px-sm-2 px-0" style="background-color: #54983c; width: 200px"> 
  <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 sticky-top sidebar"> 
    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
      <li class="nav-item mt-3"> <router-link to="/user" class="nav-link align-middle px-0"> 
        <i class="fs-4 text-white align-middle material-icons">person</i> 
        <span class="ms-2 d-none d-sm-inline text-white">Profile</span> 
        </router-link> </li>
      <li class="nav-item mt-2">
        <router-link to="/user/save" class="nav-link px-0 align-middle">
          <i class="fs-4 text-white align-middle material-icons">bookmark</i>
          <span class="ms-1 d-none d-sm-inline text-white">Saved Recipes</span>
        </router-link>
      </li>

      <li class="nav-item mt-2">
        <a href="#" data-bs-toggle="collapse" class="nav-link px-0 align-middle mb-4">
          <i class="fs-4 text-white align-middle material-icons">schedule</i>
          <span class="ms-1 d-none d-sm-inline text-white">Recently Viewed</span>
        </a>
      </li>
      <li>
        <i class="fs-5 material-icons"><span class="folder ms-1 d-none d-sm-inline text-white">YOUR FOLDERS</span></i>
        <li>
          <a href="#" data-bs-toggle="collapse" class=" link-folder nav-link align-middle px-3 mt-3">
            <i class="fs-4 text-white align-middle material-icons">add</i>
            <span class="ms-1 d-none d-sm-inline text-white">New Folder</span>
          </a>
        </li>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start ms-1" id="menu">
          <li>
            <a href="#" data-bs-toggle="collapse" class=" link-folder nav-link px-3 align-middle">
              <i class="fs-4 text-white align-middle material-icons">folder</i>
              <span class="ms-1 d-none d-sm-inline text-white">Folder 1</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>
</template>

<script>
import 'bootstrap/dist/js/bootstrap.bundle.min.js'

export default {

}

</script>

<style>
@import url('https://fonts.googleapis.com/icon?family=Material+Icons');

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

.folder {
  font-weight: bold;
}

/* Hover effect for bottom line of nav-link */
.sidebar .nav-item .nav-link {
  position: relative;
  display: inline-block;
  padding: 5px 15px;
  transition: color 0.3s ease-in-out;
}

.sidebar .nav-item .nav-link::after {
  content: '';
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

/* Hover effect for sidebar elements */
.link-folder {
  position: relative;
  overflow: hidden;
  padding: 10px 20px;
  transition: background-color 0.3s ease-in-out;
}

.link-folder::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(255, 255, 255, 0.5);
  transform: translateX(-100%);
  transition: transform 0.3s ease-in-out;
}

.link-folder:hover {
  background-color: #3e7329;
}

.link-folder:hover::before {
  transform: translateX(0);
}
</style>