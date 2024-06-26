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
        <button class="text-light input-group-text border border-success bg-green border-start-0">Search</button>
      </div>
    </div>
    <div class="navRight col-md d-flex justify-content-end align-items-center gap-4 m-2">
      <button
        class="btnLogin me-3 d-flex p-2 justify-content-center align-items-center bg-green text-decoration-none border-none"
        data-bs-toggle="modal" data-bs-target="#loginForm">
        Login
      </button>
      <a href="#"
        class="notification me-3 rounded-circle d-flex p-1 justify-content-center align-items-center bg-white text-decoration-none"
        style="border: 3px solid rgb(43, 212, 145)">
        <i class="material-icons text-green fs-1">notifications</i>
      </a>
      <a href="#"
        class="account me-3 rounded-circle d-flex p-1 justify-content-center align-items-center bg-white text-decoration-none"
        style="border: 3px solid rgb(43, 212, 145)">
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

  <!-- Login Form Modal -->
  <div class="modal fade" id="loginForm" tabindex="-1" aria-labelledby="loginFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-green" id="loginFormLabel">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
          </form>
          <div class="text-center">
            <span>Forgot <a href="#" data-bs-toggle="modal" data-bs-target="#resetForm" data-bs-dismiss="modal">reset
                password now</a></span>
          </div>
          <div class="text-center">
            <span>Don't have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#registerForm"
                data-bs-dismiss="modal">Register now</a></span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Login</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Register Form Modal -->
  <div class="modal fade" id="registerForm" tabindex="-1" aria-labelledby="registerFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-body">
          <div class="d-flex justify-content-between align-items-center border-b p-2">
            <h3 class="text-success m-0">Registration</h3>
            <button type="button" class="btn btn-link text-success" data-bs-toggle="modal" data-bs-target="#loginForm">Login now</button>
          </div>
          <div class="p-3">
            <form>
              <div class="mb-2">
                <label for="fullName" class="block text-sm font-medium text-success">Full Name</label>
                <input type="text" id="fullName" class="form-control">
              </div>
              <div class="mb-2">
                <label for="registerEmail" class="block text-sm font-medium text-success">Email address</label>
                <input type="email" id="registerEmail" class="form-control">
              </div>
              <div class="mb-2">
                <label for="registerPassword" class="block text-sm font-medium text-success">Password</label>
                <input type="password" id="registerPassword" class="form-control">
              </div>
              <div class="mb-2">
                <label for="phone" class="block text-sm font-medium text-success">Phone</label>
                <input type="number" id="phone" class="form-control">
              </div>
              <div class="mb-2">
                <label for="gender" class="block text-sm font-medium text-success">Gender</label>
                <select id="gender" class="form-control">
                  <option value="">Select Gender</option>
                  <option value="female">Female</option>
                  <option value="male">Male</option>
                </select>
              </div>
              <div class="mb-2">
                <label for="age" class="block text-sm font-medium text-success">Age</label>
                <input type="number" id="age" class="form-control">
              </div>
              <div class="mb-2">
                <label for="address" class="block text-sm font-medium text-success">Address</label>
                <input type="text" id="address" class="form-control">
              </div>
              <div class="mb-2">
                <input type="checkbox" id="terms" class="form-check-input">
                <label for="terms" class="form-check-label text-sm">Accept all terms & conditions</label>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Sign Up</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Reset Password Modal -->
  <div class="modal fade" id="resetForm" tabindex="-1" aria-labelledby="resetFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-success" id="resetFormLabel">Reset Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="newPassword" class="form-label">New Password</label>
              <input type="password" class="form-control" id="newPassword">
            </div>
            <div class="mb-3">
              <label for="confirmPassword" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="confirmPassword">
            </div>
            <button type="submit" class="btn btn-success">Reset Password</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'NavbarView',
  mounted() {
    this.registerModalEventListeners();
  },
  methods: {
    registerModalEventListeners() {
      const modals = ['loginForm', 'registerForm', 'resetForm'];
      modals.forEach(modalId => {
        const modalElement = document.getElementById(modalId);
        modalElement.addEventListener('hidden.bs.modal', this.handleModalClose);
      });
    },
    handleModalClose() {
      document.body.classList.remove('modal-open');
      const modalBackdrop = document.querySelector('.modal-backdrop');
      if (modalBackdrop) {
        modalBackdrop.parentNode.removeChild(modalBackdrop);
      }
    }
  }
}
</script>

<style scoped>
.btnLogin,
.notification,
.account {
  transition: transform 0.3s ease;
}
</style>
