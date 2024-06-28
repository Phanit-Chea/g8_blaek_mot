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
        <button class="text-light input-group-text border border-success border-start-0" style="background-color: rgba(62, 160, 9, 0.942); width: 90px; justify-content: center;"> 
          Search
        </button>
      </div>
    </div>
    <div class="navRight col-md d-flex justify-content-end align-items-center gap-4 m-2">
      <a
        href="#"
        class="favoriteIcon me-3 rounded-circle d-flex p-0.5 justify-content-center align-items-center bg-white text-decoration-none"
      >
        <i class="material-icons fs-1">turned_in</i>
      </a>
      <a
        href="#"
        class="notification me-3 rounded-circle d-flex p-0.5 justify-content-center align-items-center bg-white text-decoration-none"
      >
        <i class="material-icons fs-1">notifications</i>
      </a>
      <a
        href="#"
        class="account me-3 rounded-circle d-flex p-0.5 justify-content-center align-items-center bg-white text-decoration-none"
      >
        <img
          src="../../../assets/login.png"
          alt="login"
          width="36px"
          data-bs-toggle="modal"
          data-bs-target="#loginForm"
        />
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
  <div
    class="modal fade"
    id="loginForm"
    tabindex="-1"
    role="dialog"
    aria-labelledby="loginFormLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-green">Login</h5>
          <button
            type="button"
            class="btn-close text-danger"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password" />
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
              <a href="#" data-bs-toggle="modal" data-bs-target="#registerForm">
                Register now
              </a>
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
  <div
    class="modal fade"
    id="registerForm"
    tabindex="-1"
    role="dialog"
    aria-labelledby="registerFormLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-body">
          <div class="d-flex justify-content-between align-items-center border-b p-2">
            <h3 class="text-success m-0">Registration</h3>
            <button
              type="button"
              class="btn btn-link text-success"
              data-bs-toggle="modal"
              data-bs-target="#loginForm"
            >
              Login now
            </button>
          </div>
          <div class="p-3">
            <form>
              <div class="mb-2">
                <label for="fullName" class="block text-sm font-medium text-success">Full Name</label>
                <input type="text" id="fullName" class="form-control" />
              </div>
              <div class="mb-2">
                <label for="email" class="block text-sm font-medium text-success">Email address</label>
                <input type="email" id="email" class="form-control" />
              </div>
              <div class="mb-2">
                <label for="password" class="block text-sm font-medium text-success">Password</label>
                <input type="password" id="password" class="form-control" />
              </div>
              <div class="mb-2">
                <label for="phone" class="block text-sm font-medium text-success">Phone</label>
                <input type="number" id="phone" class="form-control" />
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
                <input type="number" id="age" class="form-control" />
              </div>
              <div class="mb-2">
                <label for="province" class="block text-sm font-medium text-success">Province</label>
                <select id="province" class="form-control">
                  <option value="" selected disabled>Select Province</option>
                  <option value="banteayMeanchey">Banteay Meanchey</option>
                  <option value="battambang">Battambang</option>
                  <option value="kampongCham">Kampong cham</option>
                  <option value="kampongChhnamg">Kampong Chhnamg</option>
                  <option value="kampongSpeu">Kampong Speu</option>
                  <option value="kampongThom">Kampong Thom</option>
                  <option value="kampot">Kampot</option>
                  <option value="kandal">Kandal</option>
                  <option value="kep">Kep</option>
                  <option value="kohKong">Koh Kong</option>
                  <option value="kratie">Kratie</option>
                  <option value="mondulkiri">Mondulkiri</option>
                  <option value="oddarMeanchey">Oddar Meanchey</option>
                  <option value="pailin">Pailin</option>
                  <option value="phnomPenh">Phnom Penh</option>
                  <option value="preahSihanouk">Preah Sihanouk</option>
                  <option value="preahVihear">Preah Vihear</option>
                  <option value="preyVeng">Prey Veng</option>
                  <option value="pursat">Pursat</option>
                  <option value="ratanakiri">Ratanakiri</option>
                  <option value="siemReap">Siem Reap</option>
                  <option value="stungTreng">Stung Treng</option>
                  <option value="svayRieng">Svay Rieng</option>
                  <option value="takeo">Takeo</option>
                  <option value="tboungKhmum">Tboung Khmum</option>
                </select>
              </div>
              <div class="mb-2 form-check">
                <input type="checkbox" id="terms" class="form-check-input" />
                <label for="terms" class="form-check-label text-sm">
                  Accept all terms & conditions
                </label>
              </div>
              <button type="submit" class="btn btn-success">Sign Up</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Reset Password Modal -->
  <div
    class="modal fade"
    id="resetForm"
    tabindex="-1"
    role="dialog"
    aria-labelledby="resetFormLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-green">Reset Password</h5>
          <button
            type="button"
            class="btn-close text-danger"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="newPassword" class="form-label">New Password</label>
              <input type="password" class="form-control" id="newPassword" />
            </div>
            <div class="mb-3">
              <label for="confirmPassword" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="confirmPassword" />
            </div>
            <div class="d-flex gap-3">
              <button type="submit" class="btn btn-success">Reset Password</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'NavbarView'
}
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
  transform: scale(1.1);
  z-index: 10;
  border-color: rgba(62, 160, 9, 0.942);
}
</style>
