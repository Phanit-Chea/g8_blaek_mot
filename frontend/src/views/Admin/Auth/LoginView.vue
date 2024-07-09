<template>

  <div class="container">

    <div class="login-card">
      <div class="card-header">
        <div class="log">Login</div>
      </div>
      <form class="form" @submit.prevent="login">
        <div class="form-group">
          <label for="email">Email</label>
          <input name="email" id="email" type="text" v-model="formData.email">
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input name="password" id="password" type="password" v-model="formData.password">
        </div>
        <div class="form-group">
          <button type="submit" class="submit">Sign in</button>
        </div>
        <p class="signup-link">
          No account?
          <a href="/register">Register your account?</a> <br>
          <a href="/register">Forgot password?</a>
        </p>
        <p v-if="errorMessage" class="error-message">{{ formData.email }} |{{ formData.password }}</p>
      </form>
    </div>
  </div>

</template>
<script lang="ts">
import { defineComponent, onMounted } from 'vue';
import axios from 'axios';
import { useAuthStore } from '../../../stores/auth-store';
import { useUserStore } from '../../../stores/userStore';

export default defineComponent({
  data() {
    return {
      formData: {
        email: '',
        password: ''
      },
      errorMessage: '' // To hold error message
    };
  },
  methods: {
    async login() {
      const authStore = useAuthStore();
      const userStore = useUserStore();

      // Check if email and password are provided
      if (!this.formData.email || !this.formData.password) {
        this.errorMessage = 'Please enter both email and password.';
        return;
      }

      try {
        const response = await axios.post('http://127.0.0.1:8000/api/login', {
          email: this.formData.email,
          password: this.formData.password
        });

        console.log(response.data.user);

        const profileImage = response.data.user.profile;
        const rememberToken = response.data.user.remember_token;

        authStore.isAuthenticated = true;
        authStore.user.profileImage = profileImage;
        authStore.login(profileImage, rememberToken);
        userStore.setUser(response.data.user);

        // Store data in localStorage
        localStorage.setItem('isAuthenticated', 'true');
        localStorage.setItem('profileImage', profileImage);
        localStorage.setItem('rememberToken', rememberToken);
        localStorage.setItem('user', JSON.stringify(response.data.user));

        this.$router.push('/');
      } catch (error) {
        if (error.response) {
          this.errorMessage = error.response.data.message;
        } else {
          this.errorMessage = error.message;
        }
        console.error('Login failed:', this.errorMessage);
      }
    }
  },
  mounted() {
    // Check if the user is already authenticated
    const isAuthenticated = localStorage.getItem('isAuthenticated');
    if (isAuthenticated === 'true') {
      const authStore = useAuthStore();
      const userStore = useUserStore();

      authStore.isAuthenticated = true;
      authStore.user.profileImage = localStorage.getItem('profileImage');
      authStore.login(localStorage.getItem('profileImage'), localStorage.getItem('rememberToken'));
      userStore.setUser(JSON.parse(localStorage.getItem('user')));

      this.$router.push('/');
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
  /* Light gray background for contrast */
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
  margin-bottom: 20px
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

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 12px 20px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  transition: 0.5s;
}

button[type="submit"] {
  width: 100%;
  background-color: #333;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #ccc;
  color: black;
}
</style>
