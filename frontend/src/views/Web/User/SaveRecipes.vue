<template>
  <navbar-view-vue />
  <div class="container-fluid" style="margin-top: 10.8%">
    <div class="row flex-nowrap">
      <user-profile-sidebar-vue />
      <div class="col py-3">
        <div class="container mx-auto mt-4">
          <div class="row d-flex">
            <div class="card ms-4" style="width: 22.5%" v-for="save in saves" :key="save.save_food_id">
              <router-link :to="{ name: 'food-detail', params: { id: save.save_food_id } }" class="nav-link">

              <img :src="`http://127.0.0.1:8000/${save.image}`" class="card-img" alt="..." />
              </router-link>
              <div class="card-body d-flex justify-content-between px-0">
                <h4 class="card-title text-dark">{{ save.name }}</h4>
                <button
                  class="btn text-white"
                  style="background-color: #54983c"
                  data-target="#delete"
                  @click="deleteSavefood(save.save_food_id)"
                >
                  unsave
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import userProfileSidebarVue from '../../../Components/Layouts/userProfileSidebar.vue'
import NavbarViewVue from '../Navbar/NavbarView.vue'
import { useUserStore } from '@/stores/userStore.ts'
import axiosInstance from '@/plugins/axios'

export default {
  components: {
    userProfileSidebarVue,
    NavbarViewVue
  },
  data() {
    return {
      saves: []
    }
  },
  mounted() {
    this.fetchSaves()
  },
  methods: {
    async fetchSaves() {
      try {
        const userStore = useUserStore()
        const response = await axiosInstance.get('/save/list', {
          headers: {
            Authorization: `Bearer ${userStore.user.remember_token}`,
            'Content-Type': 'application/json'
          }
        })

        this.saves = response.data.data
        console.log(this.saves)
      } catch (error) {
        console.error('Error fetching foods:', error)
      }
    },
    async deleteSavefood(foodId) {
      try {
        const response = await axiosInstance.delete(`/save/delete/${foodId}`)
        if (response.data.success) {
          this.fetchSaves()
        }
      } catch (error) {
        console.error('Error deleting food:', error)
      }
    }
  }
}
</script>

<style scoped>
.card {
  background: white;
  /* border: 1px solid white; */
  color: rgba(250, 250, 250, 0.8);
  margin-bottom: 2rem;
}
img {
  height: 220px;
  padding-top: 10px;
}

.card {
  transition: box-shadow 0.3s ease-in-out;
}

.card:hover {
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
}

.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 300px;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter-from {
  opacity: 0;
}

.modal-leave-to {
  opacity: 0;
}

.modal-enter-from .modal-container,
.modal-leave-to .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
.nav-link{
  text-decoration: none;
}
</style>