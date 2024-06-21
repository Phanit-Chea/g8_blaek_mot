<template>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <user-profile-sidebar-vue />
      <div class="row d-flex my-5">
        <div class="card ms-4" style="width: 300px; height: 290px;">
          <img
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRiXr8dJVZ4N_-7d5cwXGGLXWzs_esjltt0Dw&s"
            class="card-img"
            alt="..."
          />
          <div class="card-body d-flex justify-content-between">
            <h4 class="card-title text-dark mt-1">Card title</h4>
            <a href="#" class="btn mt-1" style="background-color: #54983c"
              ><i class="fas fa-link"></i> Detail</a
            >
          </div>
        </div>
        <div class="card ms-4" style="width: 300px; height: 290px;">
          <img
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRiXr8dJVZ4N_-7d5cwXGGLXWzs_esjltt0Dw&s"
            class="card-img"
            alt="..."
          />
          <div class="card-body d-flex justify-content-between">
            <h4 class="card-title text-dark mt-1">Card title</h4>
            <a href="#" class="btn mt-1" style="background-color: #54983c"
              ><i class="fas fa-link"></i> Detail</a
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import userProfileSidebarVue from '../../../Components/Layouts/userProfileSidebar.vue'

export default {
  components: {
    userProfileSidebarVue
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

</style>