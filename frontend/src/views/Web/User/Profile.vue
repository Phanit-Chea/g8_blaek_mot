<!-- src/components/HeaderMenu.vue -->
<template>
  <NavbarView></NavbarView>
    <div class="container-fluid " style="padding-top:9.73%">
    <div class="row flex-nowrap">
      <user-profile-sidebar-vue />
      <div class="col py-5">
        <div class="container mx-auto mt-4">
          <div style="background-color: #eee">
            <div class="container py-2">
              <div class="row">
                <div class="col-lg-4 ">
                  <div class="card mb-4 shadow rounded py-5">
                    <div class="card-body text-center">
                      <img
                        :src="`http://127.0.0.1:8000${useAuth.user.profile}`"
                        alt="avatar" class="rounded-circle img-fluid" style="width: 170px; height:170px" />
                      <h5 class="text-muted my-3">{{ useAuth.user.name }}</h5>
                      <p class="text-muted mb-1">{{ useAuth.user.email }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="card mb-4 p-3 shadow rounded">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="text-muted mb-0 siemreap" >ឈ្មោះពេញ</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0 siemreap">{{useAuth.user.name}}</p>
                        </div>
                      </div>
                      <hr />
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="text-muted mb-0 siemreap">អ៊ីមែល</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{useAuth.user.email}}</p>
                        </div>
                      </div>
                      <hr />
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="text-muted mb-0 siemreap">លេខទូរស័ព្ទ</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">(+855) {{ useAuth.user.phone_number }}</p>
                        </div>
                      </div>
                      <hr />
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="text-muted mb-0 siemreap">ភេទ</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0 siemreap">{{ useAuth.user.gender }}</p>
                        </div>
                      </div>
                      <hr />
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="text-muted mb-0 siemreap">ទីកន្លែង</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{useAuth.user.name}}</p>
                        </div>
                      </div>
                      <hr />
                      <div class="row">
                        <div class="col-sm-9">
                          <router-link to="/user/edit" class="edit-btn px-3 border-0 rounded siemreap">កែសម្រួល</router-link>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- {{ useAuth }} -->
  </div>
</template>

<script setup lang="ts">
import NavbarView from '../Navbar/NavbarView.vue';
import userProfileSidebarVue from '../../../Components/Layouts/userProfileSidebar.vue'
import { useAuthStore } from '@/stores/auth-store';

const useAuth = useAuthStore();

// Components are automatically registered when imported in <script setup>
</script>

<style scoped>

.edit-btn {
  background-color: #66b64a;
}

.card {
  transition: border 0.3s ease-in-out;
}

.card:hover {
  border: 2px solid #66b64a;
}

.edit-btn {
  background-color: #66b64a;
  border: 1px solid #66b64a;
  color: white;
  text-decoration: none;
  transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
}

.edit-btn:hover {
  background-color: white;
  color: #66b64a;
  cursor: pointer;
}
.siemreap {
  font-family: 'Siemreap', cursive;
}
</style>