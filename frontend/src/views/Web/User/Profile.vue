<template>
  <div class="container-fluid" style="margin-top:11.05%">
    <div class="row flex-nowrap">
      <user-profile-sidebar-vue />
      <div class="col ">
        <div class="container mx-auto mt-4">
          <div style="background-color: #eee">
            <div class="container py-2">
              <div class="row">
                <div class="col-lg-4 ">
                  <div class="card mb-4 shadow rounded py-5">
                    <div class="card-body text-center">
                      <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUUxO6ABH3xaw4UibQhS3A0wYRyq7w7a4Vgg&s"
                        alt="avatar" class="rounded-circle img-fluid" style="width: 170px; height:170px" />
                      <h5 class="text-muted my-3">John Smith</h5>
                      <p class="text-muted mb-1">example@example.com</p>
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
                          <p class="text-muted mb-0 siemreap">Johnatan Smith</p>
                        </div>
                      </div>
                      <hr />
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="text-muted mb-0 siemreap">អ៊ីមែល</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">example@example.com</p>
                        </div>
                      </div>
                      <hr />
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="text-muted mb-0 siemreap">លេខទូរស័ព្ទ</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">(097) 234-5678</p>
                        </div>
                      </div>
                      <hr />
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="text-muted mb-0 siemreap">ភេទ</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0 siemreap">ប្រុស</p>
                        </div>
                      </div>
                      <hr />
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="text-muted mb-0 siemreap">ទីកន្លែង</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
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