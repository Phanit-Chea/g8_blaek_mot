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
          <el-button size="large" class="mt-3 w-full" :disabled="isSubmitting" type="primary"
            native-type="submit">Submit</el-button>
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
import { useAuthStore } from '@/stores/auth-store'
import { useUserStore } from '@/stores/userStore'

const router = useRouter()
const authStore = useAuthStore()
const userStore = useUserStore()

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

const { value: email, errorMessage: emailError } = useField('email')
const { value: password, errorMessage: passwordError } = useField('password')

const onSubmit = handleSubmit(async (values) => {
  loginError.value = '' // Clear previous errors
  try {
    // Ensure CSRF token is set
    await axiosInstance.get('/sanctum/csrf-cookie')

    const response = await axiosInstance.post('/login', values)
    const { user, remember_token } = response.data

    // Set user data in stores
    authStore.login({ ...user, token: remember_token })
    userStore.setUser(user)

    // Store token in localStorage if necessary
    localStorage.setItem('token', remember_token)

    // Check email and password for admin access
    if (values.email === 'admin@gmail.com' && values.password === 'password') {
      router.push('/admin/dashboard')
    } else {
      router.push('/')
    }
  } catch (error) {
    if (error.response) {
      loginError.value = error.response.data.message
    } else {
      loginError.value = error.message
    }
    console.error('Login failed:', loginError.value)
  }
})
</script>

<style scoped>
.min-h-screen {
  min-height: 100vh;
}
</style>
