<template>
  <nav class="row bg-white p-2 fixed-top">
    <div class="navLeft col-md-auto d-flex align-items-center text-green">
      <img src="../../../assets/ContainerImages/logo.png" alt="homeImage" width="100%" height="100px" />
    </div>
    <div class="navCenter col-md d-flex align-items-center"
      style="width: 100%; margin-left: 3%; margin-top: 10px; margin-bottom: 10px">
      <div class="input-group w-240">
        <button class="input-group-text border border-success border-end-0">
          <i class="material-icons">search</i>
        </button>
        <input type="text" class="form-control p-3 border border-success border-end-0 shadow-none"
          placeholder="What would you like to eat?" aria-label="Search" />
        <button class="text-light input-group-text border border-success border-start-0"
          style="background-color: rgba(62, 160, 9, 0.942); width: 90px; justify-content: center;">
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
    <div class="navPages row text-warning mt-3">
      <div class="pages col d-flex" style="gap: 20px; margin-left: 20px">
        <a href="#" class="pagesLink text-green fs-4 text-decoration-none nav-link">Home</a>
        <a href="#" class="pagesLink text-green fs-4 text-decoration-none nav-link">Category</a>
        <a href="#" class="pagesLink text-green fs-4 text-decoration-none nav-link">About Us</a>
        <a href="#" class="pagesLink text-green fs-4 text-decoration-none nav-link">Join With Us</a>
      </div>
    </div>
  </nav>

  <!-- Login Form Modal -->
  <div class="modal fade" id="loginForm" tabindex="-1" aria-labelledby="loginFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-green" id="loginFormLabel">Login</h5>
          <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" placeholder="Enter email" />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" placeholder="Password" />
            </div>
          </form>
          <div class="text-center">
            <span>
              Forgot
              <a href="#" data-bs-toggle="modal" data-bs-target="#resetForm">
                reset password now
              </a>
            </span>
          </div>
          <div class="text-center">
            <span>
              Don’t have an account?
              <router-link class="nav-link" to="/register">register now</router-link>
            </span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Login</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Register Form Modal -->
  <!-- <div class="modal fade" id="registerForm" tabindex="-1" aria-labelledby="registerFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-body">
          <div class="d-flex justify-content-between align-items-center border-b p-2">
            <h3 class="text-success m-0">Registration</h3>
            <button type="button" class="btn btn-link text-success" data-bs-toggle="modal"
              data-bs-target="#loginForm">Login now</button>
          </div>
          <div class="p-3">
            <form @submit.prevent="userRegister">
              <div class="mb-2">
                <label for="fullName" class="block text-sm font-medium text-success">Full Name</label>
                <input type="text" class="form-control" v-model="user.name" />
              </div>
              <div class="mb-2">
                <label for="email" class="block text-sm font-medium text-success">Email address</label>
                <input type="email" class="form-control" v-model="user.email" />
              </div>
              <div class="mb-2">
                <label for="password" class="block text-sm font-medium text-success">Password</label>
                <input type="password" class="form-control" v-model="user.password" />
              </div>
              <div class="mb-2">
                <label for="phone" class="block text-sm font-medium text-success">Phone</label>
                <input type="text" class="form-control" v-model="user.phone_number" />
              </div>
              <div class="mb-2">
                <label for="gender" class="block text-sm font-medium text-success">Gender</label>
                <select id="gender" class="form-control" v-model="user.gender">
                  <option value="">Select Gender</option>
                  <option value="female">Female</option>
                  <option value="male">Male</option>
                </select>
              </div>
              <div class="mb-2">
                <label for="profile" class="block text-sm font-medium text-success">Profile</label>
                <input type="file" class="form-control" @change="handleFileUpload" />
              </div>
              <div class="mb-2">
                <label for="province" class="block text-sm font-medium text-success">Address</label>
                <input type="text" class="form-control" v-model="user.address" />
              </div>
              <div class="mb-2 form-check">
                <input type="checkbox" id="terms" class="form-check-input" v-model="user.terms" />
                <label for="terms" class="form-check-label text-sm">
                  Accept all terms & conditions
                </label>
              </div>
              <button type="button" class="btn btn-danger mr-2" data-bs-dismiss="modal"
                aria-label="Close">Cancel</button>
              <button type="submit" class="btn btn-success">Sign Up</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <!-- Reset Password Modal -->
  <div class="modal fade" id="resetForm" tabindex="-1" role="dialog" aria-labelledby="resetFormLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-green">Reset Password</h5>
          <!-- <button type="button" class="btn-close text-danger" data-bs-dismiss="modal" aria-label="Close"></button> -->
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="newPassword" class="form-label">New Password</label>
              <input type="password" class="form-control" />
            </div>
            <div class="mb-3">
              <label for="confirmPassword" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" />
            </div>
            <div class="d-flex gap-3">
              <button type="submit" class="btn btn-success">Reset Password</button>
              <button type="submit" class="btn btn-danger mr-2" data-bs-dismiss="modal"
                aria-label="Close">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Navbar_view',
  data() {
    return {
      user: {
        name: '',
        email: '',
        password: '',
        phone_number: '',
        gender: '',
        profile: null,
        address: '',
        terms: false
      }
    };
  },
  methods: {
    goToRegister() {
      this.$router.push({ path: '/register' });
    }
    ,
    handleFileUpload(event) {
      const files = event.target.files;
      if (files.length > 0) {
        this.user.profile = files[0];
      } else {
        this.user.profile = null;
      }
    },
    async userRegister() {
      if (!this.user.terms) {
        // alert('You must accept the terms and conditions.');
        // <div class="alert alert-primary" role="alert">
        //   Register successful<a href="#" class="alert-link">an example link</a>. Give it a click if you like.
        // </div>
        return;
      }

      const formData = new FormData();
      formData.append('name', this.user.name);
      formData.append('email', this.user.email);
      formData.append('password', this.user.password);
      formData.append('phone_number', this.user.phone_number);
      formData.append('gender', this.user.gender);
      if (this.user.profile) {
        formData.append('profile', this.user.profile);
      }
      formData.append('address', this.user.address);

      try {
        const response = await axios.post('http://127.0.0.1:8000/api/register', formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        });
        console.log(response.data);
        alert('Registration successful');
      } catch (error) {
        console.error(error);
        alert('An error occurred. Please try again.');
      }
    }
  }
};
</script>

<style scoped>
.favoriteIcon,
.notification,
.account {
  transition: transform 0.3s ease, border 0.3s ease;
  border: 3px solid rgba(62, 160, 9, 0.942);
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
  transform: scale(1.1);
  z-index: 10;
  border-color: rgba(62, 160, 9, 0.942);
}
</style>
