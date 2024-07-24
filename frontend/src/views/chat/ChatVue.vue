<template>
  <NavbarView :countUnread="countUnread" />

  <div class="container d-flex justify-content-between" style="margin-top: 13%; position: fixed; z-index: 1;">
    <div class="card card-l" style="height: 390px;">
      <div class="card-header" style="position: fixed; width: 34%;">
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

      <div class="card_left card-body c-body" style="position: fixed;">
        <ul class="nav nav-link d-flex justify-content-center ​" data-aos="fade-up" data-aos-delay="100"
          style="position: fixed; margin-top: 6%;z-index: 1; width: 20%;">
          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters"
              style="display: flex; justify-content: start; align-items: center; margin-left: -70px;">
              <h6 class="d-flex align-item-center">សារ</h6>
              <span style="position:relative; left: 5px; bottom: 6px; " class="bg bg-success text-white">{{ countUnread }}</span>
            </a>
          </li>
          <!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast"
              style="display: flex; justify-content: center;align-items: center">
              <h6 class="d-flex align-item-center">ក្រុម</h6>
              <!-- <span style="position:relative; left: 5px; bottom: 6px; " class="bg bg-success text-white">2</span> -->
            </a>
          </li>
        </ul>
        <div class="tab-content " data-aos="fade-up" data-aos-delay="10">
          <div class="tab-pane fade active show" id="menu-starters">
            <div class="tab-header" style="margin-top: 11.6%;">
              <blockquote class="blockquote ">
                <div class="scrollable-container" style="height: 230px; width: 32.8%;overflow-y: auto;">
                  <div v-for="user in listUser" :key="user.id" class="container">

                    <div class="container_user" @click="handleUserClick(user)">
                      <div class="user d-flex justify-content-between">
                        <div class="c_user d-flex align-items-center">
                          <img
                            :src="user.user.profile ? `http://127.0.0.1:8000/${user.user.profile}` : 'default_profile_image_url'"
                            alt="user" class="rounded-circle" width="50px" height="50px" />
                          <div class="name d-flex flex-column ms-2">
                            <span class="text-15px fw-bold">{{ user.user.name }}</span>
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
          <div class="tab-header text-center" style="margin-top: 11.6%;">
            <p>បញ្ជីក្រុម</p>
            <div class="scrollable-container" style="height: 230px; width: 32.8%;overflow-y: auto;">
              <div v-for="user in fetchGroupList" :key="user.id" class="container">
                <div class="container_user" @click="handleUserClick(user)">
                  <div class="user d-flex justify-content-between">
                    <div class="c_user d-flex align-items-center">
                      <img
                        :src="user.group.image ? `http://127.0.0.1:8000/${user.group.image}` : 'default_profile_image_url'"
                        alt="user" class="rounded-circle" width="50px" height="50px" />
                      <div class="name d-flex flex-column ms-2">
                        <span class="text-15px fw-bold">{{ user.group.name }}</span>
                        <p class="text-11px mb-0 text-dark"
                          v-if="user.latest_message && user.latest_message.description">
                          {{ user.latest_message.from_user === currentUserId ? 'You: ' + user.latest_message.description
                            : user.latest_message.from_user.name + " : " +
                            user.latest_message.description }}
                        </p>
                        <p class="text-11px mb-0 text-dark"
                          v-else-if="user.latest_message && user.latest_message.video">
                          {{ user.latest_message.from_user === currentUserId ? 'You: video' :
                            user.latest_message.from_user.name + " : " + 'video' }}
                        </p>
                        <p class="text-11px mb-0 text-dark"
                          v-else-if="user.latest_message && user.latest_message.image">
                          {{ user.latest_message.from_user === currentUserId ? 'You: image' :
                            user.latest_message.from_user.name + " : " + 'image' }}
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

    <!-- Right side: Message input and chat -->
    <div class="card card-r">
      <div v-if="selectedUser != null" class="full-height" style="height: 100vh;">

        <div class="card-header bg-light d-flex align-items-center p-2 border-bottom">
          <div class="d-flex align-items-center">
            <img type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" :src="profileImageUrl"
              alt="profile" class="rounded-circle" width="40px" height="40px" />
            <div class="ms-2">
              <span class="text-15px fw-bold">{{ displayName }}</span>
              <p class="text-11px mb-0 text-secondary">{{ displayEmail }}</p>
            </div>
          </div>
        </div>
        <div class="card-body " style="height: 40vh; overflow-y: auto; margin-top: 18px; margin-bottom: 60px;">

          <div v-for="chat in allChats" :key="chat">

            <div v-if="chat.group_id">
              <div v-if="chat.group_id && chat.from_user_id !== currentUserId" class="d-flex align-items-start mb-1">
                <img :src="`http://127.0.0.1:8000/${chat.user.profile}`" alt="user" class="rounded-circle me-2"
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


            <div v-if="chat.from_user">

              <div v-if="chat.from_user.id != currentUserId" class="d-flex align-items-start mb-1">
                <img :src="`http://127.0.0.1:8000/${chat.from_user.profile}`" alt="user" class="rounded-circle me-2"
                  width="30px" height="30px" />
                <div class="d-flex flex-column">
                  <div v-if="chat.description != null" class="bg-primary text-white p-2 rounded-3 mb-1"
                    style="width: auto; max-width: 300px; word-wrap: break-word;">
                    {{ chat.description }}
                  </div>
                  <div v-if="chat.to_user.image != null" class="position-relative" style="width: 200px; height: 200px;">
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
        </div>
        <div class="foot p-3 border-top"
          style="position: fixed; bottom: 18px; width: 61.4%; z-index: 1; border-radius: 10px;">
          <div class="d-flex align-items-center justify-content-between">
            <i class="bi bi-plus-circle-fill fs-3 text-success" style="cursor: pointer;" @click="openFileInput"></i>
            <input type="file" ref="fileInput" style="display: none;" @change="handleFileUpload">
            <div class="input-icons position-relative flex-grow-1 mx-3">
              <input class="form-control ps-4" id="search" placeholder="Message" type="text"
                v-model="formData.description" />
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
      groupData: [] as Array<{ name: string }>,
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
      chatList: [],
      fetchGroupList: null,
      countUnread: 0,
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
        description: null as File | null,
      },
    };
  },

  computed: {
    filteredUsers() {
      return this.listUser.filter(user =>
        user.name.toLowerCase().includes(this.searchQuery.toLowerCase())
      );
    },
    profileImageUrl() {
      if (this.selectedUser.user) {
        // User profile
        return this.selectedUser.user.profile
          ? `http://127.0.0.1:8000/${this.selectedUser.user.profile}`
          : 'default_profile_image_url';
      } else if (this.selectedUser.group) {
        // Group profile
        return this.selectedUser.group.image
          ? `http://127.0.0.1:8000/${this.selectedUser.group.image}`
          : 'default_profile_image_url';
      }
      return 'default_profile_image_url';
    },
    displayName() {
      return this.selectedUser.user
        ? this.selectedUser.user.name
        : this.selectedUser.group
          ? this.selectedUser.group.name
          : 'Unknown';
    },
    displayEmail() {
      return this.selectedUser.user
        ? this.selectedUser.user.email
        : this.selectedUser.group.user_count + ' members';
    },

  },

  methods: {
    async fetchUsers() {
      try {
        const response = await axiosInstance.get('/chat/users/chatList');
        this.listUser = response.data.data;
      } catch (error) {
        console.error('Failed to fetch users:', error);
      }
    },

    async fetchGroups() {
      try {
        const response = await axiosInstance.get('/group/fetch/listGroup');
        this.fetchGroupList = response.data.data;
        console.log('group: ', this.fetchGroupList);

      } catch (error) {
        console.error('Failed to fetch groups:', error);
      }
    },

    async handleUserClick(user) {
      this.selectedUser = user;
      this.fetchChats(user.id);
      const chatId = user.latest_chat.id;
      const userActive = user.latest_chat.active;

      console.log(chatId);

      try {

        const response = await axiosInstance.post(`/chats/${chatId}/update-active`, {
          active: 1
        });

        console.log(response.data);
        this.fetchUsers();
      } catch (error) {

        console.error('Error updating chat active status:', error);
      }
    }
    ,
    async fetchChats() {
      const userAuth = useAuthStore();
      const userStore = useUserStore();

      if (this.selectedUser.user) {
        // const userAccount = userStore.user.id;
        const receiver = this.selectedUser.user.id;
        this.currentUserId = userStore.user.id;
        const response = await axiosInstance.get(`/chat/allUser/Chat/${receiver}`, {
          headers: {
            Authorization: `Bearer ${userAuth.acccessToken}`
          }

        })
        this.allChats = response.data;




      }
      if (this.selectedUser.group) {
        const to_group = this.selectedUser.group.id;
        this.currentUserId = userStore.user.id;
        const response = await axiosInstance.get(`/group/${to_group}/messages`, {
          headers: {
            Authorization: `Bearer ${userAuth.acccessToken}`
          }
        })
        this.allChats = response.data;
      }
    },
    async sendMessage() {
      const userAuth = useAuthStore();
      const formData = new FormData();
      const userStore = useStoreStore();

      if (this.selectedUser.user) {
        const to_user = this.selectedUser.user.id;
        if (this.formData.description) {
          formData.append('description', this.formData.description);
        }
        if (this.form.image) {
          formData.append('image', this.formData.image);
        }
        if (this.form.video) {
          formData.append('video', this.formData.video);
        }

        try {
          const response = await axiosInstance.post(`/chat/create/${to_user}`, formData, {
            headers: {
              Authorization: `Bearer ${userAuth.acccessToken}`
            }
          });
          this.form.description = '';
          this.fetchChats();
          this.currentUserId = userStore.user.id;

          console.log(response);
        } catch (error) {
          console.error(error);
        }
      }
      if (this.selectedUser.group) {
        const to_group = this.selectedUser.group.id;
        if (this.formData.description) {
          formData.append('description', this.formData.description);
        }
        if (this.form.image) {
          formData.append('image', this.formData.image);
        }
        if (this.form.video) {
          formData.append('video', this.formData.video);
        }

        try {
          const response = await axiosInstance.post(`/group/${to_group}/messages`, formData, {
            headers: {
              Authorization: `Bearer ${userAuth.acccessToken}`
            }
          });
          this.form.description = '';
          this.fetchChats();
          this.currentUserId = userStore.user.id;

          console.log(response);
        } catch (error) {
          console.error(error);
        }
      }





    }
    ,
    openFileInput() {
      this.$refs.fileInput.click();
    },

    handleFileUpload(event) {
      this.formData.image = event.target.files[0];
    },

    async createGroup() {
      if (!this.form.name.trim()) return;

      try {
        const response = await axiosInstance.post('/createGroup', { name: this.form.name });
        this.groupCreated = true;
        this.createdGroupName = response.data.group.name;
        this.resetForm();
      } catch (error) {
        console.error('Failed to create group:', error);
      }
    },

    resetForm() {
      this.groupCreated = false;
      this.createdGroupName = '';
      this.form.name = '';
    },
    async fetchUnread() {
      const userAuth = useAuthStore();

      try {
        const response = await axiosInstance.get(`/chat/count/unread`, {
          headers: {
            Authorization: `Bearer ${userAuth.accessToken}`
          }
        });

        // Sum up the total number of unread messages
        const totalUnread = response.data.reduce((acc, chat) => acc + chat.total_chats, 0);
        this.countUnread = totalUnread;
        console.log('unread: ', this.countUnread);
      } catch (error) {
        console.error('Failed to fetch unread messages:', error);
      }
    }
  },

  mounted() {
    this.fetchUsers();
    this.fetchGroups();
    this.fetchChats();
    this.fetchUnread();
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
  background-color: white;
  transition: background-color 0.3s;
  position: relative;
  padding: 5px;
  margin-left: 5px;
  box-shadow: 3px 0px 1px 1px white;
  border: 1px solid white;
  border-radius: 10px;
  margin-top: -16%;

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

.scrollable-container {
  /* height:2px; Set the desired height */
  position: relative;
  overflow-y: auto;
  /* Enable vertical scrolling */
  scroll-snap-type: y mandatory;
  /* Enable vertical scroll snapping */
}

.container_user {
  scroll-snap-align: start;
  /* Align each card at the start of the container when scrolling */
  margin-bottom: 2px;
  /* Add some margin between cards if needed */
}

/* Optional: Customize the scrollbar */
/* .scrollable-container::-webkit-scrollbar {
    width: 10px;
  }

  .scrollable-container::-webkit-scrollbar-thumb {
    background-color: darkgrey;
    border-radius: 10px;
  }

  .scrollable-container::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
  } */
</style>
