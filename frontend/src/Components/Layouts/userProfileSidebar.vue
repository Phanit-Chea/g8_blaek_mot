<template>
  <div
    class="col-auto col-md-2 col-xl-2 px-sm-0 px-0" 
    
  >
    <div
      class="d-flex flex-column align-items-center align-items-sm-start px-3 pdark min-vh-100 position-fixed  sidebar" style="background-color: #54983c; width:200px "
    >
      <ul
        class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
        id="menu"
      >
        <li class="nav-item mt-3">
          <router-link to="/user" class="nav-link align-middle px-0">
            <i class="fs-4 text-white align-middle material-icons">person</i>
            <span class="ms-2 d-none d-sm-inline text-white siemreap">ប្រវត្តិរូប</span>
          </router-link>
        </li>
        <li class="nav-item mt-2">
          <router-link to="/user/save" class="nav-link px-0 align-middle">
            <i class="fs-4 text-white align-middle material-icons">bookmark</i>
            <span class="ms-1 d-none d-sm-inline text-white siemreap">រក្សាទុក</span>
          </router-link>
        </li>

        <li class="nav-item mt-2">
          <router-link to="" class="nav-link px-0 align-middle mb-4">
            <i class="fs-4 text-white align-middle material-icons">schedule</i>
            <span class="ms-1 d-none d-sm-inline text-white siemreap">បានមើលថ្មីៗ</span>
          </router-link>
        </li>
        <li>
          <i class="fs-5 material-icons"
            ><span class="folder ms-1 d-none d-sm-inline text-white siemreap"
              >ថតឯកសាររបស់អ្នក</span
            ></i
          >
        </li>

        <li data-bs-toggle="modal" data-bs-target="#exampleModal">
          <a href="#" data-bs-toggle="collapse" class="link-folder nav-link align-middle px-3 mt-3">
            <i class="fs-4 text-white align-middle material-icons">add</i>
            <span class="ms-1 d-none d-sm-inline text-white siemreap">ថតឯកសារថ្មី</span>
          </a>
        </li>
        <ul
          class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start ms-1"
          id="menu"
        >
          <li>
            <router-link to="/user/folder" class="link-folder nav-link px-3 align-middle">
              <i class="fs-4 text-white align-middle material-icons">folder</i>
              <span class="d-none d-sm-inline text-white siemreap">ថតឯកសារទី១</span>
            </router-link>
          </li>
        </ul>
      </ul>
    </div>
  </div>
  <!-- Popup form  -->
  <div
    class="modal fade rounded"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog rounded">
      <div class="modal-content rounded">
        <div class="div0 d-flex justify-content-between">
          <div class="div1 w-50 p-3 py-4">
            <h2 class="text-center pt-5 text-bold text-white siemreap">សូមស្វាគមន៍</h2>
            <p class="text-center text-white siemreap">
              បង្កើតថតឯកសារផ្ទាល់ខ្លួនរបស់អ្នក ដើម្បីងាយស្រួលគ្រប់គ្រងអាហារដែលអ្នកបានរក្សាទុក
            </p>
          </div>
          <div class="div2 py-4 w-50" style="background-color: rgba(255, 255, 255, 0.5)">
            <div class="px-3 pt-3">
              <h3 class="text-center text-dark siemreap" id="exampleModalLabel">បង្កើតថតឯកសារ</h3>
            </div>
            <div class="modal-body">
              <form action="">
                <div class="form-group">
                  <label class="text-dark siemreap">ឈ្មោះថតឯកសារ*</label>
                  <input
                    type="text"
                    class="form-control my-3 px-3 siemreap"
                    id="name"
                    aria-describedby="name"
                    placeholder="បញ្ចូលឈ្មោះថតឯកសារ"
                  />
                </div>
              </form>
            </div>
            <div class="px-3 pb-3 d-flex justify-content-end">
              <button type="button" class="btn btn-danger siemreap" data-bs-dismiss="modal">
                បោះបង់
              </button>
              <button
                type="button"
                class="btn ms-2 text-bold siemreap"
                style="background-color: #238400"
              >
                បង្កើត
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import 'bootstrap/dist/js/bootstrap.bundle.min.js'

export default {}
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
  background-color: rgba(255, 255, 255, 0.4);
  transform: translateX(-100%);
  transition: transform 0.3s ease-in-out;
}

.link-folder:hover {
  background-color: #3e7329;
}

.link-folder:hover::before {
  transform: translateX(0);
}
.modal-content {
  background-color: rgb(0, 0, 0, 0);
}
.form-control {
  border-radius: 50px;
  background-color: rgb(255, 255, 255, 0.5);
}
.div1 {
  border-radius: 5px 0px 0px 5px;
  background-color: #238400;
}
.div2 {
  border-radius: 0px 5px 5px 0px;
}
.siemreap {
  font-family: 'Siemreap', cursive;
}
</style>
