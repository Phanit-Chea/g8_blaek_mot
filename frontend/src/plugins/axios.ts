// src/plugins/axios.js
// import { useUserStore } from '@/stores/userStore';
import { useAuthStore } from '@/stores/auth-store'
import axios from 'axios'

const axiosInstance = axios.create({
  baseURL: 'http://127.0.0.1:8000/api', // Replace with your API base URL
  headers: {
    'Content-Type': 'application/json'
  }
})
const getImage = axios.create({
  baseURL: 'http://127.0.0.1:8000/',
  headers: {
    'Content-Type': 'multipart/form-data'
  }
})
axiosInstance.get('http://127.0.0.1:8000/sanctum/csrf-cookie')

// Add a request interceptor
// axiosInstance.interceptors.request.use(config => {
//   const token = useAuthStore.user.remember_token;
//   if (token) {
//     config.headers.Authorization = `Bearer ${token}`;
//   }
//   return config;
// }, error => {
//   return Promise.reject(error);
// });

// Add a response interceptor
// axiosInstance.interceptors.response.use(
//   (response) => response,
//   (error) => {
//     // Handle error
//     if (error.response.status === 401) {
//       // Handle unauthorized access, e.g., redirect to login
//     }
//     return Promise.reject(error)
//   }
// )

export default axiosInstance
