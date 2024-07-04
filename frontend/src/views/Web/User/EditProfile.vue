<template>
  <NavbarView></NavbarView>
  <div class="container d-flex justify-content-center align-items-center" style="height: 100vh; margin-top: 6%">
    <div class="registration-form bg-white shadow" style="width: 65%; border-radius: 20px">
      <form @submit.prevent="submitForm" class="d-flex justify-content-between" enctype="multipart/form-data">
        <div class="card w-50" style="background-color: #66b64a">
          <div class="card p-4" style="background-color: #66b64a">
            <div>
              <div class="card-body">
                <div class="">
                  <img :src="previewImage || '../assets/default-avatar.png'" @click="selectImage" alt="avatar"
                    class="rounded-circle img-fluid border border-5  border-white"
                    style="width: 130px; height: 130px; margin-left:16%" />
                </div>
                <div class="d-flex mt-4">
                  <i class="fs-4 text-dark mb-0 align-middle material-icons">person</i>
                  <p class="text-white ms-2 mb-0 siemreap">{{ useAuth.user.user.name }}</p>
                </div>

                <div class="d-flex mt-3">
                  <i class="fs-4 text-dark mb-0 align-middle material-icons">mail</i>
                  <p class="text-white ms-2 mb-0">{{ useAuth.user.user.email }}</p>
                </div>

                <div class="d-flex mt-3">
                  <i class="fs-4 text-dark mb-0 align-middle material-icons">phone</i>
                  <p class="text-white ms-2 mb-0">(+855) {{ useAuth.user.user.phoneNumber }}</p>
                </div>

                <div class="d-flex mt-3">
                  <i class="fs-4 text-dark mb-0 align-middle material-icons">male</i>
                  <p class="text-white ms-2 mb-0 siemreap">{{ useAuth.user.user.gender }}</p>
                </div>

                <div class="d-flex mt-3">
                  <i class="fs-4 text-dark mb-0 align-middle material-icons">location_on</i>
                  <p class="text-white ms-2 mb-0">{{ useAuth.user.user.address }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="p-4 w-100">
          <div class="form-group">
            <label for="file-input" class="file-input-label">
              <i class="fs-4 text-dark align-middle material-icons">add</i>
            </label>
            <input type="file" id="file-input" class="file-input" accept="image/*" @change="pickFile" />
          </div>
          <div class="form-group mt-2">
            <input type="text" class="form-control siemreap" v-model="useAuth.user.user.name" id="username"
              placeholder="ឈ្មោះពេញ" />
          </div>
          <div class="form-group mt-2">
            <input type="email" class="form-control siemreap" id="email" v-model="useAuth.user.user.email"
              placeholder="អ៊ីមែល" />
          </div>
          <div class="form-group mt-2">
            <input type="tel" class="form-control siemreap" id="phone-number" v-model="useAuth.user.user.phoneNumber"
              placeholder="លេខទូរស័ព្ទ" />
          </div>
          <div class="form-group mt-2">
            <select v-model="useAuth.user.user.gender" id="sex" class="form-control">
              <option class="siemreap" value="" :selected="useAuth.user.gender === ''">សូមជ្រើសរើសភេទរបស់អ្នក</option>
              <option class="siemreap" value="male" :selected="useAuth.user.gender === 'male'">ប្រុស</option>
              <option class="siemreap" value="female" :selected="useAuth.user.gender === 'female'">ស្រី</option>
            </select>
          </div>
          <div class="form-group mt-2">
            <input type="text" class="form-control siemreap" id="address" v-model="useAuth.user.user.address"
              placeholder="ទីកន្លែង" />
          </div>
          <div class="px-3 mt-4 d-flex justify-content-end">
            <a href="/user"><button type="button" class="btn btn-danger siemreap">
                បោះបង់
              </button></a>
            <button type="submit" class="btn text-white ms-2 text-bold siemreap" style="background-color: #238400">
              ផ្លាស់ប្ដូរ
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup lang="ts">
import NavbarView from '../Navbar/NavbarView.vue';
import { ref, watch } from 'vue';
import { useUserStore } from '@/stores/userStore';
import axios from 'axios';

const useAuth = useUserStore();
const profileImageUrl = ref(`http://127.0.0.1:8000/${useAuth.user.user.profile}`);
const previewImage = ref(profileImageUrl.value);

const file = ref(null);
const success = ref(false);

watch(() => useAuth.user.user.profile, (newValue) => {
  profileImageUrl.value = `http://127.0.0.1:8000/${newValue}`;
  previewImage.value = profileImageUrl.value;
});

const selectImage = () => {
  const fileInput = document.getElementById('file-input');
  fileInput.click();
};

const pickFile = (e) => {
  const selectedFile = e.target.files[0];
  if (selectedFile) {
    const reader = new FileReader();
    reader.onload = (event) => {
      previewImage.value = event.target.result;
    };
    reader.readAsDataURL(selectedFile);
    file.value = selectedFile;
  }
};

const submitForm = () => {
  const config = {
    headers: {
      'content-type': 'multipart/form-data',
    },
  };
  let data = new FormData();
  data.append('file', file.value);
  axios.post('storage/images/', data, config)
  axios.post('/user/update/{id}', data, config)
    .then((res) => {
      if (res.data.success) {
        success.value = true;
        useAuth.user.user.profile = res.data.profileUrl;
      }
    })
    .catch((err) => {
      console.log(err);
    });

};

</script>

<style>
.siemreap {
  font-family: 'Siemreap', cursive;
}

.card {
  border: none;
  border-radius: 20px 0px 0px 20px;
}

.form-control {
  height: 20%;
  border: none;
  background-color: rgba(73, 73, 73, 0.066);
}

.file-input-label {
  display: inline-block;
  padding: 18px 32px;
  border: 1px solid rgba(55, 55, 55, 0.477);
  border-radius: 50%;
  background-color: rgba(61, 61, 61, 0.136);
  text-align: center;
  line-height: 50px;
  cursor: pointer;
  margin-left: 40%;
}

.file-input {
  display: none;
}
</style>
