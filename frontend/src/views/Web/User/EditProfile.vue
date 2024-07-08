<template>
  <NavbarView></NavbarView>
  <div class="container d-flex justify-content-center align-items-center" style="height: 100vh; margin-top: 6%">
    <div class="registration-form bg-white shadow" style="width: 65%; border-radius: 20px">
      <form @submit.prevent="updateProfile" class="d-flex justify-content-between" enctype="multipart/form-data">
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
                  <p class="text-white ms-2 mb-0 siemreap">{{ userStore.user.name }}</p>
                </div>

                <div class="d-flex mt-3">
                  <i class="fs-4 text-dark mb-0 align-middle material-icons">mail</i>
                  <p class="text-white ms-2 mb-0">{{ userStore.user.email }}</p>
                </div>

                <div class="d-flex mt-3">
                  <i class="fs-4 text-dark mb-0 align-middle material-icons">phone</i>
                  <p class="text-white ms-2 mb-0">(+855) {{ userStore.user.phoneNumber }}</p>
                </div>

                <div class="d-flex mt-3">
                  <i class="fs-4 text-dark mb-0 align-middle material-icons">male</i>
                  <p class="text-white ms-2 mb-0 siemreap">{{ userStore.user.gender }}</p>
                </div>

                <div class="d-flex mt-3">
                  <i class="fs-4 text-dark mb-0 align-middle material-icons">location_on</i>
                  <p class="text-white ms-2 mb-0">{{ userStore.user.address }}</p>
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
            <input type="text" class="form-control siemreap" v-model="form.name" id="username"
              :placeholder="userStore.user.name" />
          </div>
          <div class="form-group mt-2">
            <input type="email" class="form-control siemreap" id="email" v-model="form.email"
              :placeholder="userStore.user.email" />
          </div>
          <div class="form-group mt-2">
            <input type="tel" class="form-control siemreap" id="phone-number" v-model="form.phoneNumber"
              :placeholder="userStore.user.phoneNumber" />
          </div>
          <div class="form-group mt-2">
            <select v-model="userStore.user.gender" id="sex" class="form-control custom-select">
              <option value="">សូមជ្រើសរើសភេទរបស់អ្នក</option>
              <option value="Male">ប្រុស</option>
              <option value="Female">ស្រី</option>
            </select>
          </div>
          <div class="form-group mt-2">
            <input type="text" class="form-control siemreap" id="address" v-model="form.address"
              :placeholder="userStore.user.address" />
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
  <FooterView></FooterView>
</template>

<script setup lang="ts">
import NavbarView from '../Navbar/NavbarView.vue';
import FooterView from '../Footer/FooterView.vue';
import { ref, watch } from 'vue';
import { useUserStore } from '@/stores/userStore';
import axiosInstance from '@/plugins/axios';
import Swal from 'sweetalert2';


const userStore = useUserStore();


const profileImageUrl = ref(`http://127.0.0.1:8000/${userStore.user.profile}`);
const previewImage = ref(profileImageUrl.value);
const file = ref<File | null>(null);
const success = ref(false);

// Reactive form data
const form = ref({
  name: userStore.user.name,
  email: userStore.user.email,
  phoneNumber: userStore.user.phoneNumber,
  gender: userStore.user.gender || '', 
  address: userStore.user.address,
  dateOfBirth: userStore.user.dateOfBirth,
  password: '',
  confirmPassword: '',
  profile: userStore.user.profile,
});
watch(() => userStore.user.profile, (newValue) => {
  profileImageUrl.value = `http://127.0.0.1:8000/${newValue}`;
  previewImage.value = profileImageUrl.value;
});
watch(() => userStore.user.gender, (newValue) => {
  form.value.gender = newValue;
});
const selectImage = () => {
  const fileInput = document.getElementById('file-input') as HTMLInputElement;
  fileInput.click();
};

// Function to handle file selection
const pickFile = (e: Event) => {
  const selectedFile = (e.target as HTMLInputElement).files?.[0];
  if (selectedFile) {
    const reader = new FileReader();
    reader.onload = (event) => {
      previewImage.value = event.target?.result as string;
    };
    reader.readAsDataURL(selectedFile);
    file.value = selectedFile;
  }
};



const updateProfile = async () => {
  try {
    const formData = new FormData();
    formData.append('name', form.value.name);
    formData.append('email', form.value.email);
    formData.append('phoneNumber', form.value.phoneNumber);
    formData.append('gender', form.value.gender);
    formData.append('address', form.value.address);
    formData.append('dateOfBirth', form.value.dateOfBirth);
    if (file.value) {
      formData.append('profile', file.value);
    }

    const token = userStore.user.remember_token;


    const headers = {
      'Content-Type': 'multipart/form-data',
      'Authorization': `Bearer ${token}`
    };

    console.log('Headers being sent:', headers);


    const response = await axiosInstance.post('/updateProfile', formData, { headers });

    console.log('Response received:', response);

    if (response.data.success) {
      userStore.user.profile = response.data.data.profile;

      success.value = true;


      Swal.fire({
        icon: 'success',
        title: 'Profile Updated',
        text: 'Your profile has been updated successfully!',
        confirmButtonText: 'OK'
      });


      userStore.setUser(response.data.data);
    } else {
      throw new Error('Profile update failed');
    }
  } catch (error) {
    console.error('Profile update error:', error);
    success.value = false;

    Swal.fire({
      icon: 'error',
      title: 'Update Failed',
      text: 'There was an error updating your profile. Please try again.',
      confirmButtonText: 'OK'
    });
  }
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
