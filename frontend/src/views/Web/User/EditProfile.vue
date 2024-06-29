<template>
  <div
    class="container d-flex justify-content-center align-items-center"
    style="height: 100vh; margin-top: 2%"
  >
    <div class="registration-form bg-white shadow" style="width: 65%; border-radius: 20px">
      <form class="d-flex justify-content-between">
        <div class="card w-50" style="background-color: #66b64a">
          <div class="card p-4" style="background-color: #66b64a">
            <div>
              <div class="card-body">
                <div >
                  <img
                    :src="`http://127.0.0.1:8000${useAuth.user.profile}`"
                    alt="avatar"
                    class="rounded-circle img-fluid"
                    style="width: 130px; height: 130px; margin-left:22.5%"
                  />
                </div>
                <div class="d-flex mt-4">
                  <i class="fs-4 text-dark mb-0 align-middle material-icons">person</i>

                  <p class="text-muted ms-2 mb-0 siemreap">{{ useAuth.user.name }}</p>
                </div>

                <div class="d-flex mt-3">
                  <i class="fs-4 text-dark mb-0 align-middle material-icons">mail</i>

                  <p class="text-muted ms-2 mb-0">{{ useAuth.user.email }}</p>
                </div>

                <div class="d-flex mt-3">
                  <i class="fs-4 text-dark mb-0 align-middle material-icons">phone</i>

                  <p class="text-muted ms-2 mb-0">(+855) {{ useAuth.user.phone_number }}</p>
                </div>

                <div class="d-flex mt-3">
                  <i class="fs-4 text-dark mb-0 align-middle material-icons">male</i>

                  <p class="text-muted ms-2 mb-0 siemreap">{{ useAuth.user.gender }}</p>
                </div>

                <div class="d-flex mt-3">
                  <i class="fs-4 text-dark mb-0 align-middle material-icons">location_on</i>

                  <p class="text-muted ms-2 mb-0">{{ useAuth.user.address }}</p>
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
            <input type="file" id="file-input" class="file-input" accept="image/*" />
          </div>
          <div class="form-group mt-2">
            <input type="text" class="form-control siemreap" v-model="useAuth.user.name" id="username" placeholder="ឈ្មោះពេញ" />
          </div>
          <div class="form-group mt-2">
            <input type="email" class="form-control siemreap" id="email" v-model="useAuth.user.email" placeholder="អ៊ីមែល" />
          </div>
          <div class="form-group mt-2">
            <input
              type="tel"
              class="form-control siemreap"
              id="phone-number"
              v-model="useAuth.user.phone_number"
              placeholder="លេខទូរស័ព្ទ"
            />
          </div>
          <div class="form-group mt-2">
            <select v-model="useAuth.user.gender" id="sex" class="form-control">
              <option class="siemreap" value="" selected>សូមជ្រើសរើសភេទរបស់អ្នក</option>
              <option class="siemreap" value="Male">ប្រុស</option>
              <option class="siemreap" value="Femal">ស្រី</option>
            </select>
          </div>
          <div class="form-group mt-2">
            <input type="text" class="form-control siemreap" id="address" v-model="useAuth.user.address" placeholder="ទីកន្លែង" />
          </div>
          <div class="px-3 mt-4 d-flex justify-content-end">
            <button type="button" class="btn btn-danger siemreap" data-bs-dismiss="modal">
              បោះបង់
            </button>
            <button
              type="submit"
              class="btn text-white ms-2 text-bold siemreap"
              style="background-color: #238400"
            >
              ផ្លាស់ប្ដូរ
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup lang="ts">
import { useAuthStore } from '@/stores/auth-store';

const useAuth = useAuthStore();

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