<!-- src/components/Login.vue -->
<template>
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <el-card class="w-full max-w-md shadow-lg">
      <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
      <el-form @submit.prevent="onSubmit">
        <el-form-item :error="emailError">
          <el-input placeholder="Email Address" v-model="email" size="large" />
        </el-form-item>

        <el-form-item :error="nameError" class="mt-8">
          <el-input placeholder="Password" v-model="password" size="large" type="password" />
        </el-form-item>

        <div>
          <el-button
            size="large"
            class="mt-3 w-full"
            :disabled="isSubmitting"
            type="primary"
            native-type="submit"
          >Submit</el-button>
        </div>
      </el-form>
      <div v-if="loginError" class="mt-4 text-red-500 text-center">{{ loginError }}</div>
    </el-card>
  </div>
</template>

<script setup lang="ts">
import axiosInstance from '@/plugins/axios'
import { useField, useForm } from 'vee-validate'
import * as yup from 'yup'
import { useRouter } from 'vue-router'
import { ref } from 'vue'

const router = useRouter()

const formSchema = yup.object({
  password: yup.string().required().label('Password'),
  email: yup.string().required().email().label('Email address')
})

const { handleSubmit, isSubmitting } = useForm({
  initialValues: {
    password: '',
    email: ''
  },
  validationSchema: formSchema
})

const loginError = ref('')

const onSubmit = handleSubmit(async (values) => {
  loginError.value = '' // Clear previous errors
  try {
    // Ensure CSRF token is set
    await axiosInstance.get('/sanctum/csrf-cookie')

        const profileImage = response.data.user.profile;
        const remember_token = response.data.user.remember_token;
        const isAuthenticated = true;
        useAuth.login(profileImage, remember_token, isAuthenticated);
        userStore.setUser(response.data.user);

        // Store token in localStorage if necessary
        localStorage.setItem('token', remember_token);

        if (this.formData.email === 'blaek.mot@admin.com' && this.formData.password === 'blaek_motG8') {
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
      }
    }
  },
  
});
</script>

<style scoped>
.min-h-screen {
  min-height: 100vh;
}
</style>
