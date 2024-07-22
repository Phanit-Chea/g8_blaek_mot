<template>
  <div class="container">
    <div class="login-card">
      <div class="card-header">
        <div class="log">Login</div>
      </div>
      <form class="form" @submit.prevent="login">
        <div class="form-group">
          <label for="email">Email</label>
          <input required name="email" id="email" type="text" v-model="formData.email" />
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <div class="password-input-container">
            <input
              required
              name="password"
              id="password"
              :type="showPassword ? 'text' : 'password'"
              v-model="formData.password"
            />
            <button type="button" class="toggle-password-btn" @click="togglePassword">
              <i class="material-icons">{{ showPassword ? 'visibility_off' : 'visibility' }}</i>
            </button>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="submit" :disabled="loading">Sign in</button>
        </div>
        <p class="signup-link">
          No account?
          <a href="/register">Register your account?</a> <br />
          <a @click="showForgotPasswordModal" class="forget_password text-primary">Forgot password?</a>
        </p>
        <p v-if="errorMessage" class="error-message text-danger">{{ errorMessage }}</p>
      </form>
    </div>

    <transition name="modal-fade">
      <div v-if="showModal" class="modal">
        <div class="modal-content">
          <span class="close" @click="closeModal">&times;</span>
          <h2 v-if="!showResetForm">Forgot Password</h2>
          <h2 v-else>Reset Password</h2>
          <form v-if="!showResetForm" @submit.prevent="sendResetLink">
            <div class="form-group">
              <label for="reset-email">Email</label>
              <input
                required
                name="reset-email"
                id="reset-email"
                type="text"
                v-model="resetEmail"
              />
            </div>
            <div class="form-group">
              <button type="submit" class="submit" :disabled="loading">
                <span v-if="loading">Sending...</span>
                <span v-else>Send Link Reset</span>
              </button>
            </div>
          </form>
          <form v-else @submit.prevent="resetPassword">
            <div class="form-group">
              <label for="reset-email">Email</label>
              <input
                required
                name="reset-email"
                id="reset-email"
                type="text"
                v-model="resetEmail"
              />
            </div>
            <div class="form-group">
              <label for="reset-token">Reset Token</label>
              <input
                required
                name="reset-token"
                id="reset-token"
                type="text"
                v-model="resetToken"
              />
            </div>
            <div class="form-group">
              <label for="new-password">New Password</label>
              <div class="password-input-container">
                <input
                  required
                  name="new-password"
                  id="new-password"
                  :type="showNewPassword ? 'text' : 'password'"
                  v-model="newPassword"
                />
                <button type="button" class="toggle-password-btn" @click="toggleNewPassword">
                  <i class="material-icons">{{ showNewPassword ? 'visibility_off' : 'visibility' }}</i>
                </button>
              </div>
            </div>
            <div class="form-group">
              <label for="confirm-password">Confirm Password</label>
              <div class="password-input-container">
                <input
                  required
                  name="confirm-password"
                  id="confirm-password"
                  :type="showConfirmPassword ? 'text' : 'password'"
                  v-model="confirmPassword"
                />
                <button type="button" class="toggle-password-btn" @click="toggleConfirmPassword">
                  <i class="material-icons">{{ showConfirmPassword ? 'visibility_off' : 'visibility' }}</i>
                </button>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="submit" :disabled="loading">
                <span v-if="loading">Resetting...</span>
                <span v-else>Reset Password</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </transition>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue';
import axiosInstance from '@/plugins/axios';
import { useAuthStore } from '../../../stores/auth-store';
import { useUserStore } from '../../../stores/userStore';

export default defineComponent({
  data() {
    return {
      formData: {
        email: '',
        password: ''
      },
      resetEmail: '',
      resetToken: '',
      newPassword: '',
      confirmPassword: '',
      errorMessage: '',
      showModal: false,
      showResetForm: false,
      loading: false,
      showPassword: false,
      showNewPassword: false,
      showConfirmPassword: false,
    };
  },
  methods: {
    togglePassword() {
      this.showPassword = !this.showPassword;
    },
    toggleNewPassword() {
      this.showNewPassword = !this.showNewPassword;
    },
    toggleConfirmPassword() {
      this.showConfirmPassword = !this.showConfirmPassword;
    },
    async login() {
      const useAuth = useAuthStore();
      const userStore = useUserStore();

      if (!this.formData.email || !this.formData.password) {
        this.errorMessage = 'Please enter both email and password.';
        return;
      }

      this.loading = true;

      try {
        const response = await axiosInstance.post('/login', {
          email: this.formData.email,
          password: this.formData.password
        });

        const { profile, remember_token } = response.data.user;
        const isAuthenticated = true;

        useAuth.login(profile, remember_token, isAuthenticated);
        userStore.setUser(response.data.user);

        // Store token in localStorage
        localStorage.setItem('token', remember_token);
        axiosInstance.defaults.headers.common['Authorization'] = `Bearer ${remember_token}`;

        if (this.formData.email === 'admin@gmail.com' && this.formData.password === 'password') {
          this.$router.push('/admin/dashboard');
        } else {
          this.$router.push('/');
        }

        this.formData.email = '';
        this.formData.password = '';
        this.errorMessage = '';
      } catch (error) {
        if (error.response) {
          this.errorMessage = error.response.data.message;
        } else {
          this.errorMessage = error.message;
        }
        console.error('Login failed:', this.errorMessage);
      } finally {
        this.loading = false;
      }
    },
    showForgotPasswordModal() {
      this.showModal = true;
      this.showResetForm = false;
    },
    closeModal() {
      this.showModal = false;
      this.resetEmail = '';
      this.resetToken = '';
      this.newPassword = '';
      this.confirmPassword = '';
      this.errorMessage = '';
    },
    async sendResetLink() {
      this.loading = true;
      try {
        await axiosInstance.post('/forgotPassword', {
          email: this.resetEmail
        });
        this.showResetForm = true;
      } catch (error) {
        alert('Error sending reset link. Please check your email again.');
      } finally {
        this.loading = false;
      }
    },
    async resetPassword() {
      if (this.newPassword !== this.confirmPassword) {
        alert('Passwords do not match.');
        return;
      }

      this.loading = true;

      try {
        await axiosInstance.post('/resetPassword', {
          email: this.resetEmail,
          token: this.resetToken,
          password: this.newPassword,
          password_confirmation: this.confirmPassword
        });
        this.closeModal();
      } catch (error) {
        if (error.response) {
          alert(error.response.data.message);
        } else {
          alert('Error resetting password. Please try again.');
        }
      } finally {
        this.loading = false;
      }
    }
  }
});
</script>




<style scoped>
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #f9fafb;
}

.login-card {
  width: 500px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
  background-color: #e8e8e8;
  box-shadow: 2px 2px 10px #ccc;
}

.card-header {
  text-align: center;
  margin-bottom: 20px;
}

.card-header .log {
  margin: 0;
  font-size: 24px;
  color: black;
}

.form-group {
  margin-bottom: 15px;
}

label {
  font-size: 18px;
  margin-bottom: 5px;
}

input[type='text'],
input[type='password'] {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  transition: 0.5s;
}

button[type='submit'] {
  width: 100%;
  background-color: #333;
  color: white;
  padding: 10px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type='submit']:hover {
  background-color: #ccc;
  color: black;
}
.modal-fade-enter-active, .modal-fade-leave-active {
  transition: opacity 0.5s;
}
.modal-fade-enter, .modal-fade-leave-to {
  opacity: 0;
}
.modal {
  display: block;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0, 0, 0);
  background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 5% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  display: flex;
  justify-content: end;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
.forget_password{
  cursor: pointer;
}
.password-input-container {
  position: relative;
}

.password-input-container input {
  width: calc(100% - 40px); /* Adjust based on the button size */
  padding-right: 40px; /* Adjust based on the button size */
}

.toggle-password-btn {
  position: absolute;
  right: 0;
  top: 0;
  height: 100%;
  border: none;
  background: transparent;
  cursor: pointer;
  padding: 0 10px;
}

.toggle-password-btn i {
  font-size: 1.2rem;
  color: #000; /* Adjust color as needed */
}
</style>
