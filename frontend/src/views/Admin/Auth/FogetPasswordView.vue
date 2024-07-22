<template>
  <div class="container">
    <div class="forget-password-card">
      <div class="card-header">
        <div class="log">Forgot Password</div>
      </div>
      <form class="form" @submit.prevent="submitEmail">
        <div class="form-group">
          <label for="email">Email</label>
          <input required name="email" id="email" type="text" v-model="formData.email" />
        </div>
        <div class="form-group">
          <button type="submit" class="submit">Send Reset Link</button>
        </div>
        <p v-if="message" class="message">{{ message }}</p>
      </form>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue'
import axios from 'axios'

export default defineComponent({
  setup() {
    const formData = ref({
      email: ''
    })

    const message = ref('')

    const submitEmail = async () => {
      try {
        const response = await axios.post('http://127.0.0.1:8000/api/forgotPassword', {
          email: formData.value.email
        })

        message.value = response.data.message
        formData.value.email = ''
      } catch (error) {
        if (error.response) {
          message.value = error.response.data.message
        } else {
          message.value = 'An error occurred while sending the reset email.'
        }
      }
    }

    return {
      formData,
      submitEmail,
      message
    }
  }
})
</script>

<style scoped>
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}
.forget-password-card {
  border: 1px solid #ddd;
  padding: 20px;
  width: 300px;
  border-radius: 8px;
}
.card-header .log {
  font-size: 24px;
  text-align: center;
  margin-bottom: 20px;
}
.form-group {
  margin-bottom: 15px;
}
.form-group label {
  display: block;
  margin-bottom: 5px;
}
.form-group input {
  width: 100%;
  padding: 8px;
  border: 1px solid #ddd;
  border-radius: 4px;
}
.submit {
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 4px;
}
.message {
  margin-top: 15px;
  color: green;
  text-align: center;
}
.siemreap {
    font-family: 'Siemreap', cursive;
    color: green;
}
</style>
