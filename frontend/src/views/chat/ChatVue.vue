<template>
  <WebHeaderMenu />
  <div class="container d-flex justify-content-between">
    <div class="card card-l">
      <div class="card-header">
        <div class="search w-100 my-3 d-flex justify-content-between" style="gap: 20px">
          <div class="input-icons position-relative">
            <i
              class="bi bi-search position-absolute translate-middle-y ms-2 ps-1 text-secondary"
            ></i>
            <input class="form-control" id="search" placeholder="Search" type="text" />
          </div>
          <i class="bi bi-plus-circle-fill align-content-center fs-3 my-1"></i>
        </div>
      </div>
      <div class="card_left card-body c-body overflow-y-scroll">
        <blockquote class="blockquote mb-0">
          <div class="container_user">
            <div class="user d-flex justify-content-between">
              <div class="c_user d-flex align-items-center">
                <img
                  src="@/assets/photo_2024-03-23_12-52-34.jpg"
                  alt="user"
                  class="rounded-circle"
                  width="50px"
                  height="50px"
                />
                <div class="name d-flex flex-column ms-2">
                  <span class="text-15px fw-bold">John Doe</span>
                  <p class="text-11px mb-0 text-secondary">Tos Date</p>
                </div>
              </div>
              <div class="c_p d-flex align-items-center">
                <p class="text-11px mb-0 text-secondary">Today/24/2024</p>
              </div>
            </div>
          </div>
        </blockquote>
      </div>
    </div>
    <div class="card card-r">
      <div class="card-header">
        <div>
          <div class="contain_pr d-flex align-items-center">
            <i class="bi bi-arrow-bar-left fs-4 me-3"></i>
            <div class="pr_text d-flex align-items-center">
              <img
                type="button"
                data-bs-toggle="modal"
                data-bs-target="#staticBackdrop"
                src="@/assets/photo_2024-03-23_12-52-34.jpg"
                alt="user"
                class="rounded-circle"
                width="40px"
                height="40px"
              />
              <div class="name d-flex flex-column ms-2">
                <span class="text-15px fw-bold">John Doe</span>
                <p class="text-11px mb-0 text-secondary">2 hours ago</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body overflow-y-scroll">
        <blockquote class="blockquote mb-0">
          <div class="page_dash page_dash_l d-flex justify-content-start my-2">
            <div class="c_mess d-flex align-items-center justify-content-between w-20">
              <img
                src="@/assets/photo_2024-03-23_12-52-34.jpg"
                alt="user"
                class="rounded-circle"
                width="20px"
                height="20px"
              />
              <p class="text-13px mb-0">Hi np</p>
            </div>
          </div>
        </blockquote>
      </div>
      <div class="foot mt-auto">
        <div class="c_foot">
          <div class="search w-100 my-3 d-flex justify-content-between" style="gap: 20px">
            <i class="bi bi-image-fill align-content-center fs-3"></i>
            <i class="bi bi-plus-circle-fill align-content-center fs-3"></i>
            <div class="input-icons position-relative">
              <i
                class="bi bi-cursor-fill position-absolute translate-middle-y ms-2 ps-1 text-secondary"
              ></i>
              <input class="form-control" id="search" placeholder="Message" type="text" />
            </div>
            <i class="bi bi-arrow-up-circle-fill align-content-center fs-3"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div
  class="modal fade"
  id="staticBackdrop"
  data-bs-backdrop="static"
  data-bs-keyboard="false"
  tabindex="-1"
  aria-labelledby="staticBackdropLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">User Info</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <div class="d-flex align-items-center mb-3">
          <img
            src="@/assets/photo_2024-03-23_12-52-34.jpg"
            alt="user"
            class="rounded-circle me-3"
            width="70"
            height="70"
          />
          <div>
            <h6 class="mb-0">John Doe</h6>
            <small class="text-muted">john.doe@example.com</small>
          </div>
        </div>
        <div class="p-4 border rounded">
          <div class="mb-3">
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-journals text-success"></i>
              <div>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <small class="text-muted">Bio</small>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-exclamation-circle text-danger"></i>
              <div>
                <p class="mb-0">+855 718 911 019</p>
                <small class="text-muted">Mobile</small>
              </div>
            </div>
          </div>
          <div class="d-flex align-items-center gap-2">
            <i class="bi bi-person-circle text-info"></i>
            <div>
              <a href="#" class="text-decoration-none">@jonhdea_fat_cat</a>
              <small class="text-muted d-block">Username</small>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-primary btn-sm">SEND MESSAGE</a>
      </div>
    </div>
  </div>
</div>

</template>

<script setup lang="ts">
import WebHeaderMenu from '@/Components/WebHeaderMenu.vue'
</script>

<style scoped>
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
  width: 100%;
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
  border-bottom: 1px solid #ccc;
  transition: background-color 0.3s;
  position: relative;
  left: 15px;
  padding: 10px;
}

.container_user:hover {
  border-bottom: 1px solid rgba(217, 217, 217, 0.628);
  cursor: pointer;
}

.user {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  padding: 0px;
  box-sizing: border-box; /* Ensures padding and border are included in the element's total width and height */
}
.c_user {
  display: flex;
  align-items: center;
}

.name {
  display: flex;
  flex-direction: column;
  margin-left: 10px; /* Space between image and text */
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
}
.card_left > .blockquote {
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
</style>
