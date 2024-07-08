import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap/dist/js/bootstrap.bundle.js';

import './assets/main.css'


import 'bootstrap/dist/css/bootstrap.min.css' // Import Bootstrap CSS
import 'bootstrap/dist/js/bootstrap.js'
import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
import axios from './plugins/axios'
import 'uno.css'
import { configure } from 'vee-validate'
import 'leaflet/dist/leaflet.css'; 
import { useAuthStore } from './stores/auth-store';
import { useUserStore } from './stores/userStore';


const app = createApp(App)
const pinia = createPinia();


configure({
  validateOnInput: true
})

app.use(createPinia())
app.use(router.router)
app.use(ElementPlus)
app.use(router.simpleAcl)
app.use(pinia);

const authStore = useAuthStore();
const userStore = useUserStore();
authStore.loadAuthState();
userStore.loadUserState();

app.config.globalProperties.$axios = axios

app.mount('#app')