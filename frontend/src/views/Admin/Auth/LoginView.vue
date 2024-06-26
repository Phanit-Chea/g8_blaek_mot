<!-- src/components/Login.vue -->
<template>
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <el-card class="w-full max-w-md shadow-lg">
   <span class="material-symbols-outlined">cancel</span>
      <h3>Login </h3>
      <el-form @submit="onSubmit">
        <el-form-item :error="emailError">
          <el-input placeholder="Email Address" v-model="email" size="large" />
        </el-form-item>
        <el-form-item :error="nameError" class="mt-8">
          <el-input placeholder="Password" v-model="password" size="large" type="password" />
        </el-form-item>
        <div>
       <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
          <el-button
            size="large"
            class="mt-3 w-full"
            :disabled="islogin"
            type="success"
            native-type="Sing in"
            >Sign in→</el-button >
         
        </div>
        <div class="text-center">
        <span>Don't have an account?<a href="#">Register now</a></span>
        </div>
      </el-form>
    </el-card>
  </div>
</template>
<script setup lang="ts">
import axiosInstance from '@/plugins/axios'
import { useField, useForm } from 'vee-validate'
import * as yup from 'yup'
import { useRouter } from 'vue-router'

const router = useRouter()

const formSchema = yup.object({
  password: yup.string().required().label('Password'),
  email: yup.string().required().email().label('Email address')
})

const { handleSubmit, islogin} = useForm({
  initialValues: {
    password: '',
    email: ''
  },
  validationSchema: formSchema
})

const onSubmit = handleSubmit(async (values) => {
  try {
    const { data } = await axiosInstance.post('/login', values)
    localStorage.setItem('access_token', data.access_token)
    router.push('/')
  } catch (error) {
    console.warn('Error')
  }
})
const { value: password, errorMessage: nameError } = useField('password')
const { value: email, errorMessage: emailError } = useField('email')
</script>
<style scoped>
h3{
  color:rgb(65, 123, 7);
}
.min-h-screen {
  min-height: 100vh;
}
span a {
 color: rgb(65, 123, 7);
  justify-content: center;
  text-align: center;
}
button{
  background-color: rgb(65, 123, 7);
  color: white;
  border-radius: 30px;
  width: 30%;
}
.material-symbols-outlined {
  margin-left: 95%;
  color:red;
  font-variation-settings:
  'opsz'100
}
</style>

