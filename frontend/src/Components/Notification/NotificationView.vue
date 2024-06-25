<template>
  <div>
    <!-- Button trigger modal -->
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#notificationModal">
      Notification
    </button>

    <!-- Modal -->
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal header -->
          <div class="modal-header flex-column p-3">
            <div class="top d-flex justify-content-between w-100">
              <h5 class="modal-title">Notification</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="boot">
              <p class="c-p1">View all</p>
              <p class="c-p2">News</p>
            </div>
          </div>

          <!-- Modal body -->
          <div class="modal-body d-flex">
            <!-- Example content -->
            <div class="left d-flex gap-3">
              <img src="../../assets/images/food1.jpg" alt="Food Image" class="img-fluid" style="height: 70px; width: 70px;">
              <div class="title d-flex align-items-center flex-column">
                <h6>Name Food</h6>
                <p>Category</p>
              </div>
            </div>
            <div class="right d-flex ms-auto align-items-start">
              <p>10 minutes</p>
            </div>
          </div>
          <div class="modal-body d-flex">
            <!-- Example content -->
            <div class="left d-flex gap-3">
              <img src="../../assets/images/food2.jpg" alt="Food Image" class="img-fluid" style="height: 70px; width: 70px;">
              <div class="title d-flex align-items-center flex-column">
                <h6>Name Food</h6>
                <p>Category</p>
              </div>
            </div>
            <div class="right d-flex ms-auto align-items-start">
              <p>10 minutes</p>
            </div>
          </div>
          <div class="modal-body d-flex">
            <!-- Example content -->
            <div class="left d-flex gap-3">
              <img src="../../assets/images/food3.jpg" alt="Food Image" class="img-fluid" style="height: 70px; width: 70px;">
              <div class="title d-flex align-items-center flex-column">
                <h6>Name Food</h6>
                <p>Category</p>
              </div>
            </div>
            <div class="right d-flex ms-auto align-items-start">
              <p>10 minutes</p>
            </div>
          </div>

          <!-- Modal footer (optional) -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  // Your Vue component options
};
</script>

<style scoped>
.modal-body{
  border-bottom: 1px solid rgba(128, 128, 128, 0.189);
  transition: transform 0.3s ease;
}
.modal-body:hover {
  background: #d3d3d342;
  cursor: pointer;
  /* transition: background-color 0.3s; */
  transform: scale(1.01);
  z-index: 10;
}

.boot {
  width: 100%;
  display: flex;
  justify-content: space-around;
  margin-top: 15px;
  margin-bottom: -15px;
}

.boot p {
  position: relative;
  color: #535353;
  transition: color 0.3s, border-bottom 0.3s;
  margin: 0;
  padding: 0;
}

.boot p::after {
  content: '';
  display: block;
  width: 0;
  height: 2px;
  background: #66b64a;
  transition: width 0.3s;
  position: absolute;
  bottom: 0;
  left: -100px;
}

.boot p:hover::after {
  width: 500%;
}

.boot p:hover {
  color: #66b64a;
  cursor: pointer;
}
.boot .c-p2{
  width:10.7%;
}
</style>
