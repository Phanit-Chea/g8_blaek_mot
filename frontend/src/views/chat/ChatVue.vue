<template>
  <NavbarView :countUnread="countUnread" />

  <div class="container d-flex justify-content-between" style="margin-top: 13%;">
    <div class="card card-l">
      <div class="card-header">
        <div class="search w-100 my-3 d-flex justify-content-between" style="gap: 20px">
          <div class="input-icons position-relative">
            <i class="bi bi-search position-absolute translate-middle-y ms-2 ps-1 text-secondary"></i>
            <input class="form-control" id="search" placeholder="Search" type="text" />
          </div>

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

      <div class="card_left card-body c-body overflow-y-scroll">
        <ul class="nav nav-link d-flex justify-content-center​​" data-aos="fade-up" data-aos-delay="100">
          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters"
              style="display: flex; justify-content: center;align-items: center">
              <h6 class="d-flex align-item-center">សារ</h6>
              <span style="position:relative; left: 5px; bottom: 6px; " class="bg bg-success text-white">2</span>
            </a>
          </li>
          <!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast"
              style="display: flex; justify-content: center;align-items: center">
              <h6 class="d-flex align-item-center">ក្រុម</h6>
              <span style="position:relative; left: 5px; bottom: 6px; " class="bg bg-success text-white">2</span>
            </a>
          </li>
        </ul>
        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
          <div class="tab-pane fade active show" id="menu-starters">
            <div class="tab-header">
              <blockquote class="blockquote mb-0">
                <div>
                  <div v-for="user in listUser.users" :key="user.id" class="container">
                    <div class="container_user" @click="handleUserClick(user)">
                      <div class="user d-flex justify-content-between">
                        <div class="c_user d-flex align-items-center">
                          <img
                            :src="user.profile ? `http://127.0.0.1:8000/${user.profile}` : 'default_profile_image_url'"
                            alt="user" class="rounded-circle" width="50px" height="50px" />
                          <div class="name d-flex flex-column ms-2">
                            <span class="text-15px fw-bold">{{ user.name }}</span>
                            <p class="text-11px mb-0 text-dark" v-if="user.latest_chat && user.latest_chat.description">
                              {{ user.latest_chat.from_user === currentUserId ? 'You: ' + user.latest_chat.description :
                                user.latest_chat.description }}
                            </p>
                            <p class="text-11px mb-0 text-dark" v-else-if="user.latest_chat && user.latest_chat.video">
                              {{ user.latest_chat.from_user === currentUserId ? 'You: video' : 'video' }}
                            </p>
                            <p class="text-11px mb-0 text-dark" v-else-if="user.latest_chat && user.latest_chat.image">
                              {{ user.latest_chat.from_user === currentUserId ? 'You: image' : 'image' }}
                            </p>
                            <p class="text-11px mb-0 text-dark" v-else>
                              No recent chats
                            </p>
                          </div>
                        </div>
                        <div class="c_p d-flex align-items-center justify-content-between align-item-center pr-2">
                          <p class="text-11px mb-0 text-secondary" style="margin-right: 10px;" v-if="user.latest_chat">
                            {{ user.latest_chat.created_at.time }}
                          </p>
                          <span class="rounded-circle" :class="{
                            'bg-success': (user.latest_chat && user.latest_chat.active === 0 && user.latest_chat.from_user != currentUserId),
                            'bg-white': (user.latest_chat && (user.latest_chat.active !== 0 || user.latest_chat.from_user === currentUserId)),
                          }" style="font-size: 13px; color: white; padding: 0.3rem; text-align: center;">
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </blockquote>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="menu-breakfast">
          <div class="tab-header text-center">
            <p>បញ្ជីក្រុម</p>
            <div>
                  <div v-for="user in fetchGroupList" :key="user.id" class="container">
                   
                    <div class="container_user" @click="handleUserClick(user)">
                      <div class="user d-flex justify-content-between">
                        <div class="c_user d-flex align-items-center">
                          <img
                            :src="user.image ? `http://127.0.0.1:8000/${user.image}` : 'default_profile_image_url'"
                            alt="user" class="rounded-circle" width="50px" height="50px" />
                          <div class="name d-flex flex-column ms-2">
                            <span class="text-15px fw-bold">{{ user.name }}</span>
                            <p class="text-11px mb-0 text-dark" v-if="user.messages && user.messages.description">
                              {{ user.messages.from_user === currentUserId ? 'You: ' + user.messages.description :
                                user.messages.description }}
                            </p>
                            <p class="text-11px mb-0 text-dark" v-else-if="user.messages && user.messages.video">
                              {{ user.messages.from_user === currentUserId ? 'You: video' : 'video' }}
                            </p>
                            <p class="text-11px mb-0 text-dark" v-else-if="user.messages && user.messages.image">
                              {{ user.messages.from_user === currentUserId ? 'You: image' : 'image' }}
                            </p>
                            <p class="text-11px mb-0 text-dark" v-else>
                              No recent chats
                            </p>
                          </div>
                        </div>
                        <div class="c_p d-flex align-items-center justify-content-between align-item-center pr-2">
                          <p class="text-11px mb-0 text-secondary" style="margin-right: 10px;" v-if="user.latest_chat">
                            {{ user.latest_chat.created_at.time }}
                          </p>
                          <span class="rounded-circle" :class="{
                            'bg-success': (user.latest_chat && user.latest_chat.active === 0 && user.latest_chat.from_user != currentUserId),
                            'bg-white': (user.latest_chat && (user.latest_chat.active !== 0 || user.latest_chat.from_user === currentUserId)),
                          }" style="font-size: 13px; color: white; padding: 0.3rem; text-align: center;">
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
        </div>


      </div>
    </div>
    <div class="card card-r">
      <div v-if="selectedUser != null" class="full-height" style="height: 100vh;">
{{selectedUser}}
        <div class="card-header bg-light d-flex align-items-center p-2 border-bottom"
          style="position: fixed; width: 61.4%; z-index: 1;">
          <div class="d-flex align-items-center">
            <img type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
              :src="selectedUser.profile ? `http://127.0.0.1:8000/${selectedUser.profile}` : 'default_profile_image_url'"
              alt="user" class="rounded-circle" width="40px" height="40px" />
            <div class="ms-2">
              <span class="text-15px fw-bold">{{ selectedUser.name }}</span>
              <p class="text-11px mb-0 text-secondary">{{ selectedUser.email }}</p>
            </div>
          </div>
        </div>
        <div class="card-body" style="height: 40vh; overflow-y: auto; margin-top: 60px; margin-bottom: 60px;">

          <div v-for="chat in allChats" :key="chat">

            <div v-if="chat.from_user !== currentUserId" class="d-flex align-items-start mb-1">
              <img :src="`http://127.0.0.1:8000/${selectedUser.profile}`" alt="user" class="rounded-circle me-2"
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
                <div v-if="chat.image != null" class="position-relative" style="width: 200px; height: 200px;">
                  <img :src="`http://127.0.0.1:8000/${chat.image}`" alt="" width="100%" height="100%"
                    class="rounded-3" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="foot p-3 border-top"
          style="position: fixed; bottom: 18px; width: 61.4%; z-index: 1; border-radius: 10px;">
          <div class="d-flex align-items-center justify-content-between">
            <i class="bi bi-plus-circle-fill fs-3 text-success" style="cursor: pointer;" @click="openFileInput"></i>
            <input type="file" ref="fileInput" style="display: none;" @change="handleFileUpload">
            <div class="input-icons position-relative flex-grow-1 mx-3">
              <input class="form-control ps-4" id="search" placeholder="Message" type="text" v-model="description"
                @keyup.enter="sendMessage" />
            </div>
            <form @submit.prevent="sendMessage">
              <button type="submit" class="btn btn-link p-0">
                <i class="bi bi-arrow-up-circle-fill fs-3 text-success" style="cursor: pointer;"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
      <div v-else style="display: flex; justify-content: center; align-items: center; height: 100%;">
        <img src="../../assets/ContainerImages/chatWelcome.png" alt="" style="max-width: 100%; max-height: 100%;">
      </div>
    </div>


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
              <img :src="`http://127.0.0.1:8000/${selectedUser.profile}`" alt="user" class="rounded-circle me-3"
                width="70" height="70" />
              <div>
                <h6 class="mb-0">{{ selectedUser.name }}</h6>
                <small class="text-muted">{{ selectedUser.email }}</small>
              </div>
            </div>
            <div class="p-4 border rounded">
              <div class="mb-3">
                <div class="d-flex align-items-center gap-2">
                  <i class="bi bi-journals text-success"></i>
                  <div>
                    <p class="mb-0"> {{ selectedUser.dateOfBirth }}</p>
                    <small class="text-muted">Date of birth</small>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <div class="d-flex align-items-center gap-2">
                  <i class="bi bi-exclamation-circle text-danger"></i>
                  <div>
                    <p class="mb-0">{{ selectedUser.phoneNumber }}</p>
                    <small class="text-muted">Mobile</small>
                  </div>
                </div>
              </div>
              <div class="d-flex align-items-center gap-2">
                <i class="bi bi-person-circle text-info"></i>
                <div>
                  <a href="#" class="text-decoration-none">{{ selectedUser.address }}</a>
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


    <div class="modal fade rounded" id="renameModal" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded">
          <div v-if="!groupCreated">
            <div class="modal-header">

              <h5 class="modal-title text-center text-bold text-success siemreap">បង្កើតក្រុម</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form @submit.prevent="createGroup">
                <div>
                  <div class="form-group">
                    <label for="name" class="text-dark siemreap">ឈ្មោះក្រុម</label>
                    <input type="text" class="form-control my-3 px-3 siemreap" id="name" placeholder="បញ្ចូលឈ្មោះក្រុម"
                      v-model="form.name">
                  </div>
                  <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-danger siemreap" data-bs-dismiss="modal">បោះបង់</button>
                    <button type="submit" class="btn ms-2 text-bold siemreap"
                      style="background-color: #238400">បង្កើត</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
          <div v-else style="background-color: #ebecf0;">
            <div class="container ">
              <p class="text-light siemreap btn" style="background-color: green;padding: 5px; width: auto;">{{
                createdGroupName }}</p>
              <div>
                <div style="font-weight: bold;margin-bottom: 5px;">បញ្ចូលអ្នកដទៃទៅក្នុងក្រុមរបស់អ្នក</div>
                <div class="d-flex" v-for="user in listUser.users " :key="user">
                  <div class="card bg-light p-1" style="width: 100%; border: none;margin-bottom: 5px">
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="d-flex align-items-center gap-3">
                        <img :src="`http://127.0.0.1:8000/${user.profile}`" alt=""
                          class="rounded-circle border border-rounded border-success border-2" width="50" height="50">
                        <p class="mb-0 text-dark siemreap" style="font-weight: bold;">{{ user.name }}</p>
                      </div>
                      <button class="btn btn-success ms-auto">បញ្ជូល</button>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="d-flex justify-content-end">
              <button type="button" class="btn btn-danger siemreap" @click="resetForm"
                data-bs-dismiss="modal">បិទ</button>
            </div>
          </div>

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
import { useChatStore } from '@/stores/chatStore';
import Swal from 'sweetalert2';

export default defineComponent({
  components: {
    NavbarView,
  },

  data() {
    return {
      groupData: [] as Array<{
        name: string,

      }>
      ,
      groupCreated: false,
      createdGroupName: '',
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
      fetchGroupList: null,
      countUnread: null,
      userActive: null,
      userClicked: null as number | null,
      currentUserId: null as number | null,
      allChats: [],

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
      form: {
        name: '',
      },
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
    async fetchGroup() {
      const userAuth = useAuthStore();
      const userStore = useUserStore();
 
      try {
        const response = await axiosInstance.get('/group/fetch/messages', {
          headers: {
            Authorization: `Bearer ${userAuth.accessToken}`,
          },
        });
        if (response.status === 200) {
          this.fetchGroupList = response.data; // Ensure listUser is reactive if using Composition API
          console.log('Fetched group list:', this.fetchGroupList);
          this.currentUserId = userStore.user.id
        }
      } catch (error) {
        console.error('Failed to fetch user list:', error);
      }
    },


    async fetchUsers() {
      const userAuth = useAuthStore();
      const userStore = useUserStore();
      const chatStore = useChatStore();

      try {
        const response = await axiosInstance.get('/chat/allUser/Chat', {
          headers: {
            Authorization: `Bearer ${userAuth.accessToken}`,
          },
        });

        if (response.status === 200) {
          this.listUser = response.data;
          console.log('Fetched user list:', this.listUser);


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
    async fetchChats(receiverId) {
      try {
        const userAuth = useAuthStore();
        const userStore = useUserStore();

        const response = await axiosInstance.get(`/chat/list/chat/${receiverId}`, {
          headers: {
            Authorization: `Bearer ${userAuth.accessToken}`,
          },
        });

        if (response.status === 200) {
          this.allChats = response.data.allChats;
          console.log('Fetched chats:', this.allChats);
          this.currentUserId = userStore.user.id;
          console.log('Current user ID:', this.currentUserId);
        } else {
          console.error('Failed to fetch chats - Status:', response.status);
        }
      } catch (error) {
        console.error('Error fetching chats:', error);
      }
    },
    async handleUserClick(user) {
      this.selectedUser = user;
      console.log(this.selectedUser);

      try {
        const chatId = this.selectedUser.latest_chat.id; // Ensure chatId is set correctly
        const response = await axiosInstance.post(`/chats/${chatId}/update-active`, {
          active: 1,
        });

        this.fetchUsers();
        console.log('Chat updated:', response.data);

        // Call fetchChats with selectedUser.id
        this.fetchChats(this.selectedUser.id);
        this.fetchUnreadChats();
      } catch (error) {
        console.error('Error updating chat:', error);
      }
    }
    ,

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
      const userStore = useUserStore();
      const userAuth = useAuthStore();

      if (!this.selectedUser) {
        alert('No user selected.');
        return;
      }

      const to_user = this.selectedUser.id;
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
        this.currentUserId = userStore.user.id;


        this.fetchChats(this.selectedUser.id);
      } catch (error) {
        console.error('Message sending failed:', error);
        alert('Message sending failed. Please try again.');
      }


    }
    ,
    async createGroup() {
      const userStore = useUserStore();
      const userAuth = useAuthStore();

      const formData = new FormData();
      formData.append('name', this.form.name);
      try {
        const response = await axiosInstance.post('/group/create', formData, {
          headers: {
            Authorization: `Bearer ${userAuth.accessToken}`,
            'Content-Type': 'multipart/form-data',
          },
        });

        if (response.status === 201) {
          console.log('Group created successfully:', response.data);
          this.createdGroupName = this.form.name;
          this.groupCreated = true;
          Swal.fire({
            title: 'Group Created Successfully!',
            text: 'Do you want to add users to your group?',
            icon: 'success',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
          }).then((result) => {
            if (result.isConfirmed) {
              // Handle the action for adding users
              console.log('Add users to group');
            } else {
              // Handle the action when no is selected
              console.log('No users added');
            }
          });
          this.fetchUsers();
        }
      }
      catch (error) {
        console.error(error);
        alert('Registration failed. Please try again.');
        console.log(this.form.name);

      }




    },
    async fetchUnreadChats() {

      const userAuth = useAuthStore();

      try {
        const response = await axiosInstance.get('/chat/count/unread', {
          headers: {
            Authorization: `Bearer ${userAuth.accessToken}`,
          },
        });

        if (response.status === 200) {
          // Assuming the response data contains an array of objects with total_chats property
          this.countUnread = response.data.reduce((acc, chat) => acc + chat.total_chats, 0);
          console.log(this.countUnread);
        }
      } catch (error) {
        console.error('Error fetching unread chats:', error);
      }
    }
    // closeChat() {
    //   this.selectedUser = null;
    // },
  },
  mounted() {
    this.fetchUsers();
    this.fetchUnreadChats();
    this.fetchGroup();
  },
});

</script>



<style scoped>
/* @import "../node_modules/@syncfusion/ej2-vue-popups/styles/material.css"; */
@import "../../../node_modules/@syncfusion/ej2-popups/styles/material.css";

.button-container {
  display: flex;
  /* background-color: black; */
  width: 250px;
  height: 40px;
  align-items: center;
  justify-content: space-around;
  border-radius: 10px;
}

.button {
  outline: 0 !important;
  border: 0 !important;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background-color: transparent;
  display: flex;
  align-items: center;
  justify-content: center;
  color: black;
  transition: all ease-in-out 0.3s;
  cursor: pointer;
}

.button:hover {
  transform: translateY(-3px);
}

.icon {
  font-size: 20px;
}

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

.c-body {
  height: 10vh;
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
  margin-bottom: 3px;
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
