<template>
  <div class="col-auto col-md-2 col-xl-2 px-sm-0 px-0">
    <div
      class="d-flex flex-column align-items-center align-items-sm-start px-3 pdark min-vh-100 position-fixed sidebar"
      style="background-color: #54983c; width: 200px"
    >
      <ul
        class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
        id="menu"
      >
        <li class="nav-item mt-3">
          <router-link to="/user" class="nav-link align-middle px-0">
            <i class="fs-4 text-white align-middle material-icons">person</i>
            <span class="ms-2 d-none d-sm-inline text-white siemreap">ប្រវត្តិរូប</span>
          </router-link>
        </li>
        <li class="nav-item mt-2">
          <router-link to="/user/save" class="nav-link px-0 align-middle">
            <i class="fs-4 text-white align-middle material-icons">bookmark</i>
            <span class="ms-1 d-none d-sm-inline text-white siemreap">រក្សាទុក</span>
          </router-link>
        </li>

        <li class="nav-item mt-2">
          <router-link to="" class="nav-link px-0 align-middle mb-4">
            <i class="fs-4 text-white align-middle material-icons">schedule</i>
            <span class="ms-1 d-none d-sm-inline text-white siemreap">បានមើលថ្មីៗ</span>
          </router-link>
        </li>
        <li>
          <i class="fs-5 material-icons"
            ><span class="folder ms-1 d-none d-sm-inline text-white siemreap"
              >ថតឯកសាររបស់អ្នក</span
            ></i
          >
        </li>

        <li data-bs-toggle="modal" data-bs-target="#exampleModal">
          <a href="#" class="link-folder nav-link align-middle px-3 mt-3">
            <i class="fs-4 text-white align-middle material-icons">add</i>
            <span class="ms-1 d-none d-sm-inline text-white siemreap">ថតឯកសារថ្មី</span>
          </a>
        </li>

        <ul
          class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start ms-1"
          id="menu"
        >
          <li v-for="folder in folders" :key="folder.id" class="nav-item" style="display: flex">
            <router-link
              :to="{ name: 'folder-list', params: { id: folder.id } }"
              @click="selectFolder(folder.id)"
              class="link-folder nav-link px-3 align-middle d-flex justify-content-between align-items-center"
            >
              <div>
                <i class="fs-4 text-white align-middle material-icons">folder</i>
                <span class="d-none d-sm-inline text-white siemreap">{{ folder.folder_name }}</span>
              </div>
            </router-link>
            <a
              class="btn"
              @click.stop="toggleOptions(folder.id)"
              role="button"
              style="border: none"
            >
              <i class="bi bi-three-dots-vertical"></i>
            </a>
            <div v-show="folder.id === showOptionsFor" class="card card-body mt-1 small-card">
              <div>
                <button
                  @click="deleteFolder(folder.id)"
                  class="btn btn-danger btn-sm"
                  style="width: 70%"
                >
                  លុប
                </button>
                <button
                  @click="showRenameForm(folder)"
                  class="btn btn-primary btn-sm"
                  data-bs-toggle="modal"
                  data-bs-target="#renameModal"
                >
                  កែសម្រួល
                </button>
              </div>
            </div>
          </li>
        </ul>
      </ul>
    </div>
  </div>

  <!-- Popup form update folder -->
  <div
    class="modal fade rounded"
    id="renameModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog rounded">
      <div class="modal-content rounded">
        <div class="div0 d-flex justify-content-between">
          <div class="div1 w-50 p-3 py-4">
            <h2 class="text-center pt-5 text-bold text-white siemreap">សូមស្វាគមន៍</h2>
            <p class="text-center text-white siemreap">
              បង្កើតថតឯកសារផ្ទាល់ខ្លួនរបស់អ្នក ដើម្បីងាយស្រួលគ្រប់គ្រងអាហារដែលអ្នកបានរក្សាទុក
            </p>
          </div>
          <div class="div2 py-4 w-50" style="background-color: rgba(255, 255, 255, 0.5)">
            <div class="px-3 pt-3">
              <h3 class="text-center text-dark siemreap" id="exampleModalLabel">កែសម្រួលថតឯកសារ</h3>
            </div>
            <div class="modal-body">
              <form @submit.prevent="renameFolder">
                <div class="form-group">
                  <label class="text-dark siemreap">ឈ្មោះថតឯកសារ</label>
                  <input
                    type="text"
                    class="form-control my-3 px-3 siemreap"
                    id="name"
                    aria-describedby="name"
                    placeholder="បញ្ចូលឈ្មោះថតឯកសារ"
                    v-model="renamingFolderName"
                  />
                </div>
                <div class="px-3 pb-3 d-flex justify-content-end">
                  <button type="button" class="btn btn-danger siemreap" data-bs-dismiss="modal">
                    បោះបង់
                  </button>
                  <button
                    type="submit"
                    class="btn ms-2 text-bold siemreap"
                    style="background-color: #238400"
                  >
                    កែសម្រួល
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Popup form  -->
  <div
    class="modal fade rounded"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog rounded">
      <div class="modal-content rounded">
        <div class="div0 d-flex justify-content-between">
          <div class="div1 w-50 p-3 py-4">
            <h2 class="text-center pt-5 text-bold text-white siemreap">សូមស្វាគមន៍</h2>
            <p class="text-center text-white siemreap">
              បង្កើតថតឯកសារផ្ទាល់ខ្លួនរបស់អ្នក ដើម្បីងាយស្រួលគ្រប់គ្រងអាហារដែលអ្នកបានរក្សាទុក
            </p>
          </div>
          <div class="div2 py-4 w-50" style="background-color: rgba(255, 255, 255, 0.5)">
            <div class="px-3 pt-3">
              <h3 class="text-center text-dark siemreap" id="exampleModalLabel">បង្កើតថតឯកសារ</h3>
            </div>
            <div class="modal-body">
              <form @submit.prevent="createFolder">
                <div class="form-group">
                  <label class="text-dark siemreap">ឈ្មោះថតឯកសារ</label>
                  <input
                    type="text"
                    class="form-control my-3 px-3 siemreap"
                    id="name"
                    aria-describedby="name"
                    placeholder="បញ្ចូលឈ្មោះថតឯកសារ"
                    v-model="folder_name"
                  />
                </div>
                <div class="px-3 pb-3 d-flex justify-content-end">
                  <button type="button" class="btn btn-danger siemreap" data-bs-dismiss="modal">
                    បោះបង់
                  </button>
                  <button
                    type="submit"
                    class="btn ms-2 text-bold siemreap"
                    style="background-color: #238400"
                  >
                    បង្កើត
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'
import { useAuthStore } from '../../stores/auth-store'
import { useUserStore } from '../../stores/userStore'
import { METHODS } from 'http'

const useAuth = useAuthStore()
const folder_name = ref('')
const folders = ref<any[]>([])
const showOptionsFor = ref<number | null>(null)
const renamingFolderId = ref<number | null>(null)
const renamingFolderName = ref<string>('')
const isRenaming = ref(false)
const router = useRouter()

const toggleOptions = (folderId: number) => {
  showOptionsFor.value = showOptionsFor.value === folderId ? null : folderId
  renamingFolderId.value = null // Reset renaming state when toggling options
  isRenaming.value = false // Reset renaming state when toggling options
}

const deleteFolder = async (folderId: number) => {
  try {
   const userStore = useUserStore()
   
    const response = await axios.delete(`http://127.0.0.1:8000/api/folder/delete/${folderId}`, {
      headers: {
            Authorization: `Bearer ${userStore.user.remember_token}`,
            'Content-Type': 'application/json'
          }
    })

    if (response.data.success) {
      
      folders.value = folders.value.filter((folder) => folder.id !== folderId)
    } else {
      alert('Failed to delete folder')
    }
  } catch (error) {
    console.error('Error deleting folder:', error)
    alert('An error occurred while deleting the folder')
  }
}

const createFolder = async () => {
  try {
    const userStore = useUserStore()

    const response = await axios.post(
      'http://127.0.0.1:8000/api/folder/create',
      { folder_name: folder_name.value },
      {
        headers: {
            Authorization: `Bearer ${userStore.user.remember_token}`,
            'Content-Type': 'application/json'
          }
      }
    )

    if (response.data.success) {
      folders.value.push(response.data.folder)
      folder_name.value = ''
    } else {
      alert('Failed to create folder')
    }
  } catch (error) {
    console.error('Error creating folder:', error)
    alert('An error occurred while creating the folder')
  }
}

const showRenameForm = (folder: any) => {
  renamingFolderId.value = folder.id
  renamingFolderName.value = folder.folder_name
}

const renameFolder = async () => {
  try {
    const userStore = useUserStore()

    const response = await axios.put(
      `http://127.0.0.1:8000/api/folder/update/${renamingFolderId.value}`,
      { folder_name: renamingFolderName.value },
      {
        headers: {
            Authorization: `Bearer ${userStore.user.remember_token}`,
            'Content-Type': 'application/json'
          }

      }
    )

    if (response.data.success) {
      const folder = folders.value.find((f) => f.id === renamingFolderId.value)
      if (folder) {
        folder.folder_name = renamingFolderName.value
      }
      renamingFolderId.value = null
    } else {
      alert('Failed to rename folder')
    }
  } catch (error) {
    console.error('Error renaming folder:', error)
    alert('An error occurred while renaming the folder')
  }
}

const fetchFolders = async () => {
  try {
    const userStore = useUserStore()
    const response = await axios.get('http://127.0.0.1:8000/api/folder/list', {
       headers: {
            Authorization: `Bearer ${userStore.user.remember_token}`,
            'Content-Type': 'application/json'
          }
    })
      folders.value = response.data.data
  } catch (error) {
    console.error('Error fetching folders:', error)
    alert('An error occurred while fetching folders')
  }
}

onMounted(() => {
  fetchFolders()
})

const methods = {
  selectFolder(folderId) {
    this.$emit('folderSelected', folderId)
  }
}
</script>

<style scoped>
.card-body {
  background-color: #f8f9fa;
  border-radius: 0.25rem;
}

.btn-link {
  color: #007bff;
  text-decoration: none;
}

.btn-link:hover {
  text-decoration: underline;
}
</style>
<style scoped>
@import url('https://fonts.googleapis.com/icon?family=Material+Icons');

/* Style the dropdown toggle button */
.nav-link.dropdown-toggle {
  font-size: 16px;
  font-weight: bold;
  color: #fff;
}

/* Style the dropdown menu */
.dropdown-menu {
  background-color: #54983c;
  border: none;
  border-radius: 0;
  min-width: 100px;
  max-width: 100px;
  width: auto;
}

.dropdown-item:hover,
.dropdown-item:focus {
  background-color: #3e7329;
  color: #fff;
}

.folder {
  font-weight: bold;
}

/* Hover effect for bottom line of nav-link */
.sidebar .nav-item .nav-link {
  position: relative;
  display: inline-block;
  padding: 5px 15px;
  transition: color 0.3s ease-in-out;
}

.sidebar .nav-item .nav-link::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 0;
  height: 2px;
  background-color: #fff;
  transition: width 0.3s ease-in-out;
}

.sidebar .nav-item .nav-link:hover {
  color: #fff;
}

.sidebar .nav-item .nav-link:hover::after {
  width: 100%;
}

/* Hover effect for sidebar elements */
.link-folder {
  position: relative;
  overflow: hidden;
  padding: 10px 20px;
  transition: background-color 0.3s ease-in-out;
}

.link-folder::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(255, 255, 255, 0.4);
  transform: translateX(-100%);
  transition: transform 0.3s ease-in-out;
}

.link-folder:hover {
  background-color: #3e7329;
}

.link-folder:hover::before {
  transform: translateX(0);
}

.modal-content {
  background-color: rgb(0, 0, 0, 0);
}

.form-control {
  border-radius: 50px;
  background-color: rgb(255, 255, 255, 0.5);
}

.div1 {
  border-radius: 5px 0px 0px 5px;
  background-color: #238400;
}

.div2 {
  border-radius: 0px 5px 5px 0px;
}

.siemreap {
  font-family: 'Siemreap', cursive;
}

.card-body {
  background-color: rgba(250, 244, 244, 0);
  display: flex;
}

.small-card {
  background-color: none;
  border-radius: 5px;
  display: flex;
  border: none;
  padding: 0.15rem;
  /* Smaller padding */
  width: 130px;
  /* Fixed width */
  height: auto;
  /* Automatic height */
}

.small-card .btn {
  padding: 0.25rem 0.5rem;
  /* Smaller button padding */
  font-size: 0.875rem;
  /* Smaller font size */
}

.btn-link {
  color: #007bff;
  text-decoration: none;
}

.btn-link:hover {
  text-decoration: underline;
}
</style>
