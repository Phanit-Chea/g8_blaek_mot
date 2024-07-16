<template>
  <NavbarView />
  <div class="container d-flex justify-content-between" style="margin-top: 13%;">
    <div class="card card-l">
      <div class="card-header">
        <div class="search w-100 my-3 d-flex justify-content-between" style="gap: 20px">
          <div class="input-icons position-relative">
            <i class="bi bi-search position-absolute translate-middle-y ms-2 ps-1 text-secondary"></i>
            <input class="form-control" id="search" placeholder="Search" type="text" />
          </div>
          <!-- <i class="bi bi-plus-circle-fill align-content-center fs-3 my-1"></i> -->
          <button class="button" data-bs-toggle="modal" data-bs-target="#renameModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20" fill="none"
              class="svg-icon">
              <g stroke-width="1.5" stroke-linecap="round" stroke="#de8a2a">
                <circle r="7.5" cy="10" cx="10"></circle>
                <path d="m9.99998 7.5v5"></path>
                <path d="m7.5 9.99998h5"></path>
              </g>
            </svg>
            <span class="label">Add</span>
          </button>
        </div>
      </div>

      <div class="card_left card-body c-body overflow-y-scroll ">
        <blockquote class="blockquote mb-0">
          <div v-for="user in listUser" :key="user.id">
            <div class="container_user" @click="handleUserClick(user)">
              <div class="user d-flex justify-content-between">
                <div class="c_user d-flex align-items-center">
                  <!-- Assuming user.user.profile is the correct path to the profile image -->
                  <img :src="`http://127.0.0.1:8000/${user.user.profile}`" alt="user" class="rounded-circle"
                    width="50px" height="50px" />
                  <div class="name d-flex flex-column ms-2">
                    <span class="text-15px fw-bold">{{ user.user.name }}</span>
                    <p class="text-11px mb-0 text-dark" v-if="user.latest_chat.description != null">
                      {{ user.latest_chat.from_user === currentUserId ? 'You: ' + user.latest_chat.description :
                        user.latest_chat.description }}
                    </p>
                    <p class="text-11px mb-0 text-dark" v-else-if="user.latest_chat.video != null">
                      {{ user.latest_chat.from_user === currentUserId ? 'You: ' + 'video' :
                        'video' }}
                    </p>
                    <p class="text-11px mb-0 text-dark" v-else>
                      {{ user.latest_chat.from_user === currentUserId ? 'You: ' + 'image' :
                        'image' }}
                    </p>

                  </div>
                </div>
                <div class="c_p d-flex align-items-center justify-content-between align-item-center pr-2">
                  <!-- Assuming user.latest_chat.created_at.time is the correct property -->
                  <p class="text-11px mb-0 text-secondary" style="margin-right: 10px;">
                    {{ user.latest_chat.created_at.time }}
                  </p>
                  <!-- Assuming userStore.user represents status -->
                  <span class="rounded-circle" :class="{
                    'bg-success': user.latest_chat.active === 0,
                    'bg-white': user.latest_chat.active === 1,
                  }" style="font-size: 13px; color: white; padding: 0.3rem; text-align: center;">
                    <!-- Content here -->
                  </span>
                </div>
              </div>
            </div>
          </div>
        </blockquote>
      </div>
    </div>

    <!-- Right side: Message input and chat -->
    <div class="card card-r">
      <div v-if="selectedUser != null" class="full-height" style="height: 100vh;">
        <div class="card-header bg-light d-flex align-items-center p-2 border-bottom"
          style="position: fixed; width: 61.4%; z-index: 1;">
          <!-- <i class="bi bi-arrow-bar-left fs-4 me-3" style="cursor: pointer;" @click="goBack"></i> -->
          <div class="d-flex align-items-center">
            <img type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
              :src="`http://127.0.0.1:8000/${selectedUser.user.profile}`" alt="user" class="rounded-circle" width="40px"
              height="40px" />
            <div class="ms-2">
              <span class="text-15px fw-bold">{{ selectedUser.user.name }}</span>
              <p class="text-11px mb-0 text-secondary">{{ selectedUser.user.email }}</p>
            </div>
          </div>
        </div>

        <div class="card-body" style="height: 40vh; overflow-y: auto; margin-top: 60px; margin-bottom: 60px;">

          <div v-for="chat in selectedUser.all_chats" :key="chat.id">
            <div v-if="chat.from_user !== currentUserId" class="d-flex align-items-start mb-1">
              <img :src="`http://127.0.0.1:8000/${selectedUser.user.profile}`" alt="user" class="rounded-circle me-2"
                width="30px" height="30px" />
              <div class="d-flex flex-column">
                <div v-if="chat.description != null" class="bg-primary text-white p-2 rounded-3 mb-1"
                  style="width: auto; max-width: 300px; word-wrap: break-word;">
                  {{ chat.description }}
                </div>
                <div v-if="chat.image != null" class="position-relative" style="width: 200px; height: 200px;">
                  <img :src="`http://127.0.0.1:8000/${chat.image}`" alt="" width="100%" height="100%"
                    class="rounded-3" />
                </div>
              </div>
            </div>
            <div v-else class="d-flex align-items-end justify-content-end mb-1 " style="width: auto;">
              <div class="d-flex flex-column " style="width: auto;">
                <div v-if="chat.description != null"
                  class="bg-primary text-white p-2 rounded-3 mb-1 ml-auto d-inline-block chat-message"
                  style="max-width: 300px; word-wrap: break-word;">
                  {{ chat.description }}
                </div>
                <!-- <img :src="`http://127.0.0.1:8000/${selectedUser.user.profile}`" alt="user" class="rounded-circle ms-2"
                width="20px" height="20px"  /> -->
                <div v-if="chat.image != null" class="position-relative" style="width: 200px; height: 200px;">
                  <img :src="`http://127.0.0.1:8000/${chat.image}`" alt="" width="100%" height="100%"
                    class="rounded-3" />
                </div>
              </div>

            </div>

          </div>

        </div>

        <div class="foot  p-3 border-top"
          style="position: fixed; bottom: 18px; width: 61.4%; z-index: 1; border-radius: 10px;">
          <div class="d-flex align-items-center justify-content-between">
            <i class="bi bi-plus-circle-fill fs-3 text-success" style="cursor: pointer;" @click="openFileInput"></i>

            <input type="file" ref="fileInput" style="display: none;" @change="handleFileUpload">

            <div class="input-icons position-relative flex-grow-1 mx-3">
              <input class="form-control ps-4" id="search" placeholder="Message" type="text" v-model="description"
                @keyup.enter="sendMessage" />
            </div>
            <i class="bi bi-arrow-up-circle-fill fs-3 text-success" style="cursor: pointer;" @click="sendMessage"></i>
          </div>
        </div>
      </div>

      <div v-else style="display: flex; justify-content: center; align-items: center; height: 100%;">
        <img src="../../assets/ContainerImages/chatWelcome.png" alt="" style="max-width: 100%; max-height: 100%;">
      </div>
    </div>

  </div>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" v-if="selectedUser != null">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">User Info</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="d-flex align-items-center mb-3">
            <img :src="`http://127.0.0.1:8000/${selectedUser.user.profile}`" alt="user" class="rounded-circle me-3"
              width="70" height="70" />
            <div>
              <h6 class="mb-0">{{ selectedUser.user.name }}</h6>
              <small class="text-muted">{{ selectedUser.user.email }}</small>
            </div>
          </div>
          <div class="p-4 border rounded">
            <div class="mb-3">
              <div class="d-flex align-items-center gap-2">
                <i class="bi bi-journals text-success"></i>
                <div>
                  <p class="mb-0"> {{ selectedUser.user.dateOfBirth }}</p>
                  <small class="text-muted">Date of birth</small>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <div class="d-flex align-items-center gap-2">
                <i class="bi bi-exclamation-circle text-danger"></i>
                <div>
                  <p class="mb-0">{{ selectedUser.user.phoneNumber }}</p>
                  <small class="text-muted">Mobile</small>
                </div>
              </div>
            </div>
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-person-circle text-info"></i>
              <div>
                <a href="#" class="text-decoration-none">{{ selectedUser.user.address }}</a>
                <small class="text-muted d-block">Address</small>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
        </div>
      </div>
    </div>
  </div>


  <!-- modal create group -->
  <div class="modal fade" id="firstModal" tabindex="-1" role="dialog" aria-labelledby="firstModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="firstModalLabel">First Modal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>This is the content of the first modal.</p>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#secondModal">
            Open Second Modal
          </button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Second Modal -->
  <div class="modal fade rounded" id="renameModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded">
        <div class="modal-header">
          <h5 class="modal-title text-center text-bold text-success siemreap">បង្កើតក្រុម</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="text-center text-success siemreap">
            បង្កើតថតឯកសារផ្ទាល់ខ្លួនរបស់អ្នក ដើម្បីងាយស្រួលគ្រប់គ្រងអាហារដែលអ្នកបានរក្សាទុក
          </p>
          <form>
            <div class="form-group">
              <label for="name" class="text-dark siemreap">ឈ្មោះថតឯកសារ</label>
              <input type="text" class="form-control my-3 px-3 siemreap" id="name" placeholder="បញ្ចូលឈ្មោះថតឯកសារ" />
            </div>
            <div class="d-flex justify-content-end">
              <button type="button" class="btn btn-danger siemreap" data-bs-dismiss="modal">បោះបង់</button>
              <button type="submit" class="btn ms-2 text-bold siemreap"
                style="background-color: #238400">កែសម្រួល</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



</template>



<script lang="ts">
import { defineComponent } from 'vue';
import NavbarView from '../Web/Navbar/NavbarView.vue';
import axiosInstance from '@/plugins/axios';
import { useAuthStore } from '@/stores/auth-store';
import { useUserStore } from '@/stores/userStore';
import { chatStore } from '../../stores/chatStore';

export default defineComponent({
  components: {
    NavbarView,
  },
  data() {
    return {
      listUser: [] as Array<{
        id: number;
        name: string;
        email: string;
        profile: string;
        gender: string;
        address: string;
        phoneNumber: string;
        dateOfBirth: Date;
        lastActive: string;
        latest_chat: {
          description: string | null;
          from_user: number;
          created_at: {
            date: string;
            time: string;
          };
        };
      }>,
      userClicked: null as number | null,
      currentUserId: null as number | null,
      selectedUser: null as {
        id: number;
        name: string;
        email: string;
        profile: string;
        gender: string;
        address: string;
        phoneNumber: string;
        dateOfBirth: Date;
        lastActive: string;
        latest_chat: {
          description: string | null;
          from_user: number;
          created_at: {
            date: string;
            time: string;
          };
        };
      } | null,
      userAccountSender: null as {
        description: string | null;
        image: string | null;
        video: string | null;
      } | null,
      description: '',
      searchQuery: '',
      formData: {
        image: null as File | null,
        video: null as File | null,
        description: null as string | null,
      },
    };
  },
  computed: {
    filteredUsers() {
      return this.listUser.filter(user =>
        user.name.toLowerCase().includes(this.searchQuery.toLowerCase())
      );
    },
  },
  methods: {
    async fetchUsers() {
      const userAuth = useAuthStore();
      const userStore = useUserStore();

      try {
        const response = await axiosInstance.get('/chat/users/chatList', {
          headers: {
            Authorization: `Bearer ${userAuth.accessToken}`,
          },
        });

        if (response.status === 200) {
          this.listUser = response.data.data; // Ensure you access the correct structure of the response
          console.log('Fetched user list:', this.listUser);
          console.log(userAuth.accessToken);

          // Ensure currentUserId is set correctly
          if (userStore.user && userStore.user.id) {
            this.currentUserId = userStore.user.id;
          } else {
            console.error('Current user ID is not available in userStore.');
          }
        } else {
          console.error('Failed to fetch user list:', response.statusText);
        }
      } catch (error) {
        console.error('Failed to fetch user list:', error);
      }
    },
    handleUserClick(user: {
      id: number;
      name: string;
      email: string;
      profile: string;
      gender: string;
      address: string;
      phoneNumber: string;
      dateOfBirth: Date;
      lastActive: string;
      latest_chat: {
        description: string | null;
        from_user: number;
        created_at: {
          date: string;
          time: string;
        };
      };
    }) {
      this.selectedUser = user; // Assuming this.selectedUser is a property of your component
      // this.currentUserId = user.id; // Ensure you want to store the current user's ID
      const chatActive = chatStore();
      const userAuth = useUserStore();
      this.currentUserId = userAuth.user.id;
      // Set the latest chat's active status
      if (this.selectedUser.user.latest_chat) {
        this.selectedUser.latest_chat.active = 0; // Set active to false when clicked
        this.userClicked = user.id; // Mark the clicked user
      }
    },
    openFileInput() {
      const input = this.$refs.fileInput as HTMLInputElement;
      if (input) {
        input.click();
      }
    },
    handleFileUpload() {
      const input = this.$refs.fileInput as HTMLInputElement;
      if (input.files && input.files.length > 0) {
        const file = input.files[0];
        this.formData.image = file;
        console.log(this.formData.image);
      }
    },
    async sendMessage() {
      if (!this.selectedUser) {
        alert('No user selected.');
        return;
      }

      const userAuth = useAuthStore();
      const to_user = this.selectedUser.user.id;
      const formData = new FormData();
      formData.append('description', this.description);
      if (this.formData.image) {
        formData.append('image', this.formData.image);
      }
      if (this.formData.video) {
        formData.append('video', this.formData.video);
      }

      try {
        const response = await axiosInstance.post(`/chat/create/${to_user}`, formData, {
          headers: {
            Authorization: `Bearer ${userAuth.accessToken}`,
            'Content-Type': 'multipart/form-data',
          },
        });

        console.log('Message sent successfully', response.data);
        this.userAccountSender = response.data;
        this.description = '';
        this.formData.image = null;
        this.formData.video = null;
      } catch (error) {
        console.error('Message sending failed:', error);
        alert('Message sending failed. Please try again.');
      }
    }
    ,
    closeChat() {
      this.selectedUser = null;
    },
  },
  mounted() {
    this.fetchUsers();
  },
});
</script>



<style scoped>
/* @import "../node_modules/@syncfusion/ej2-vue-popups/styles/material.css"; */
@import "../../../node_modules/@syncfusion/ej2-popups/styles/material.css";

.chat-message {
  max-width: auto;
  /* Adjust as necessary */

  white-space: normal;
  /* Ensure text wraps within the container */
  word-break: break-word;
  /* Break words only if necessary */
  /* Ensures long words or URLs break to fit within the block */
}

::-webkit-scrollbar {
  width: 15px;
}

::-webkit-scrollbar-track {
  background: none;
}

::-webkit-scrollbar-thumb {
  background: none;
}

.container {
  margin-top: 20%;
  padding: 20px;
  gap: 20px;
}

.card-l,
.card-r {
  box-shadow: 0px 0px 2px 0px;
  border-radius: 15px;
}

.search {
  gap: 20px;
}

.card-l {
  width: 50%;
}

.c-body {
  padding: 20px;
}

.card-r {
  width: 90%;
  right: 0;
  height: 66vh;
}

.input-icons {
  width: 70%;
}

.input-icons i {
  position: absolute;
  top: 50%;
  left: 10px;
  transform: translateY(-50%);
  pointer-events: none;
}

#search {
  border-radius: 100px;
  border: 1px solid rgba(104, 104, 104, 0.703);
  padding-left: 50px;
}

.bi-plus-circle-fill,
.bi-arrow-up-circle-fill,
.bi-image-fill {
  cursor: pointer;
  transition: transform 0.5s;
}

.bi-plus-circle-fill:hover,
.bi-arrow-up-circle-fill:hover,
.bi-image-fill:hover {
  transform: scale(1.05) rotate(-5deg);
  color: #62cd3c;
}

.container {
  margin-top: 10%;
}

.container_user {
  width: 100%;
  background-color: #fff;
  transition: background-color 0.3s;
  position: relative;
  left: 15px;
  padding: 10px;
  /* background-color:rgb(233, 109, 109); */
  box-shadow: 3px 0px 1px 1px white;
  border: 1px solid white;
  border-radius: 10px;
  margin-bottom: 8px;
}

.container_user:hover {
  cursor: pointer;
}

.user {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  padding: 0px;
  box-sizing: border-box;
  /* Ensures padding and border are included in the element's total width and height */
}

.c_user {
  display: flex;
  align-items: center;
}

.name {
  display: flex;
  flex-direction: column;
  margin-left: 10px;
  /* Space between image and text */
}

.c_p {
  display: flex;
  align-items: center;
}

.card-r {
  color: #000;
  display: flex;
  flex-direction: column;
}

.contain_pr {
  display: flex;
  align-items: center;
}

.contain_pr i {
  cursor: pointer;
  margin-right: 10px;
  color: rgb(156, 156, 156);
}

.contain_pr i:hover {
  transform: scale(1) rotate(-0.1deg);
  color: #62cd3c;
}

.contain_pr img {
  border-radius: 50%;
  cursor: pointer;
}

.page_dash {
  padding: 10px;
}

.page_dash p {
  background: #01a131;
  color: white;
  padding: 5px;
  border-radius: 10%;
}

/* Footer Card right */
.c_foot {
  display: flex;
  align-items: center;
  padding: 10px;
  width: 100%;
  background: #e9e9e96a;
  border-bottom-right-radius: 15px;
  border-bottom-left-radius: 15px;
}

.c_foot .form-control {
  flex-grow: 1;
  margin: 0 10px;
}

/* Card Left */
.card_left {
  width: 100%;
  margin-left: 0px;
  background-color: rgba(235, 233, 233, 0.432)
}

.card_left>.blockquote {
  margin-left: -15px;
  width: auto;
}

/* Modal pop up  */
.modal-header {
  border-bottom: 1px solid rgba(225, 225, 225, 0.6);
}

.modal-footer {
  border-top: none;
}

.modal-body img {
  border: 2px solid #f8f9fa;
}

.modal-body h6 {
  font-size: 1.25rem;
}

.modal-body p {
  font-size: 0.875rem;
}

.modal-body small {
  font-size: 0.75rem;
}

.modal-body .border {
  border-color: #e9ecef !important;
}

.modal-footer .btn {
  font-size: 0.75rem;
}

.c_mess {
  margin-right: -15px;
}

.c_mess p {
  background-color: green;
  width: auto;

}

.c_mess_sender {
  width: auto;
  margin-left: -10px;
}

.c_mess_sender p {
  width: auto;

}

.blockquote_sender,
.blockquote_receiver {
  width: 50%;
}

.card-body {
  overflow-y: auto;
  display: flex;
  flex-direction: column;
  padding: 0.5rem;
  /* height: 42vh; */
}

.d-flex {
  display: flex;
}

.c_mess {
  display: flex;
  align-items: center;
  padding: 0.5rem;
  border-radius: 10px;
  margin-bottom: 0.5rem;
}

.text-white {
  color: white;
}

.rounded {
  border-radius: 10px;
}

.rounded-circle {
  border-radius: 50%;
}

.me-2 {
  margin-right: 0.5rem;
}

.ms-2 {
  margin-left: 0.5rem;
}

.bg-success {
  background-color: #28a745;
  padding: 0.5rem;
  border-radius: 10px;
  margin-bottom: 0;
  max-width: 70%;
  word-wrap: break-word;
}

.bg-primary {
  background-color: #007bff;
  padding: 0.5rem;
  border-radius: 10px;
  margin-bottom: 0;
  max-width: 70%;
  word-wrap: break-word;
}

.justify-content-end {
  justify-content: flex-end;
}

.justify-content-start {
  justify-content: flex-start;
}

.my-2 {
  margin: 0.5rem 0;
}

.w-100 {
  width: 100%;
}

.button {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 6px 12px;
  gap: 4px;
  height: 32px;
  width: 81px;
  border: none;
  background: #f9f9fad0;
  border-radius: 20px;
  cursor: pointer;
}

.lable {
  line-height: 22px;
  font-size: 17px;
  color: #447516;
  font-family: sans-serif;
  letter-spacing: 1px;
}

.lable:hover {
  color: white;
}

.button:hover {
  background: green;
  color: white;
}

.button:hover .svg-icon {
  animation: rotate 1.3s linear infinite;
}

@keyframes rotate {
  0% {
    transform: rotate(0deg);
  }

  25% {
    transform: rotate(10deg);
  }

  50% {
    transform: rotate(0deg);
  }

  75% {
    transform: rotate(-10deg);
  }

  100% {
    transform: rotate(0deg);
  }
}
</style>
