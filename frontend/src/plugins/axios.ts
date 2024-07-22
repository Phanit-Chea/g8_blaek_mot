import { useUserStore } from '@/stores/userStore';
import axios from 'axios';

// Create an Axios instance for API requests
const axiosInstance = axios.create({
  baseURL: 'http://127.0.0.1:8000/api',
  headers: {
    'Content-Type': 'application/json',
  }
});

// Create an Axios instance for image requests
const getImage = axios.create({
  baseURL: 'http://127.0.0.1:8000/',
  headers: {
    'Content-Type': 'multipart/form-data',
  }
});

// Retrieve CSRF cookie
axiosInstance.get('http://127.0.0.1:8000/sanctum/csrf-cookie');

// Add a request interceptor to inject the token into the headers
axiosInstance.interceptors.request.use(config => {
  const userStore = useUserStore();
  const token = userStore.user?.remember_token || localStorage.getItem('token');

  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  }

  return config;
}, error => {
  return Promise.reject(error);
});

// Add a response interceptor to handle errors
axiosInstance.interceptors.response.use(
  response => response,
  error => {
    if (error.response && error.response.status === 401) {
      // Handle unauthorized access
      console.log('Unauthorized access - redirecting to login');
      // Example: window.location.href = '/login';
    }
    return Promise.reject(error);
  }
);

export default axiosInstance;
export { getImage };