import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap/dist/js/bootstrap.bundle.js';


import 'bootstrap/dist/js/bootstrap.bundle';
import './assets/css/main.css'
import './assets/css/bootstrap-icons.css'
import './assets/css/bootstrap.min.css'
import './assets/css/tooplate-crispy-kitchen.css'


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
import piniaPersist from 'pinia-plugin-persistedstate';

// import DataTable from 'datatables.net-vue3';
// import DataTablesCore from 'datatables.net';

// DataTable.use(DataTablesCore);

const app = createApp(App)
const pinia = createPinia();
pinia.use(piniaPersist);


configure({
  validateOnInput: true
})

app.use(createPinia())
app.use(router.router)
app.use(ElementPlus)
app.use(router.simpleAcl)
app.use(pinia);

app.config.globalProperties.$axios = axios

app.mount('#app')
export default pinia;