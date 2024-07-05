<template>
  <div>
    <NavbarView></NavbarView>
    <div class="d-flex" style="margin-top: 158px;">
      <div class="col-2">
        <SideBar style="width: 240px; height: 100%;" />
      </div>
      <div class="col-10">
        <!-- Navigation links -->
        <div class="d-flex align-center pt-2">
          <a href="#" class="list-unstyled text-decoration-none text-danger">Back to list</a>
          <span class="material-symbols-outlined fs-3 text-danger">
            keyboard_arrow_right
          </span>
          <a href="#" class="list-unstyled text-decoration-none text-danger">Food name</a>
        </div>

        <h1 class="text-success mt-2 mb-3">Food Name</h1>

        <!-- Rating stars -->
        <div class="col col-lg-2 d-flex mt-3 mb-3">
          <div class="small-ratings d-flex">
            <i class="fa fa-star rating-color mx-1"></i>
            <i class="fa fa-star rating-color mx-1"></i>
            <i class="fa fa-star rating-color mx-1"></i>
            <i class="fa fa-star mx-1"></i>
            <i class="fa fa-star mx-1"></i>
          </div>
        </div>

        <hr>

        <!-- Action buttons: bookmark, download, print, share -->
        <div class="mt-3 mb-3">
          <div class="btn btn rounded border border-success mr-2" id="bookmard">
            <span class="material-symbols-outlined">
              bookmark_added
            </span>
          </div>
          <div class="btn btn rounded border border-success mr-2" id="download">
            <span class="material-symbols-outlined">
              download
            </span>
          </div>
          <div class="btn btn rounded border border-success mr-2" id="print">
            <span class="material-symbols-outlined">
              print
            </span>
          </div>
          <div class="btn btn rounded border border-success mr-2" id="share">
            <span class="material-symbols-outlined">
              share
            </span>
          </div>
        </div>

        <!-- Video and images -->
        <div class="jumbotron jumbotron-fluid p-0 m-0 d-flex">
          <div class="col-8">
            <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"
              style="width: 100%; height: 100%; border: none;"></iframe>
          </div>
          <div class="col-4">
            <div class="card mb-3" id="foodImage1">
              <img src="../../../assets/FoodDetail/image.png" alt="" width="100%" height="195px">
            </div>
            <div class="card" id="foodImage2">
              <img src="../../../assets/FoodDetail/image.png" alt="" width="100%" height="195px">
            </div>
          </div>
        </div>

        <hr>

        <!-- Time spending, number of ingredients, nutrition -->
        <div class="row d-flex justify-content-evenly text-white mt-3 m-0">
          <div class="d-flex align-items-center justify-content-center rounded" id="timer">
            <span class="material-symbols-outlined mt-1">timer</span>
            <p class="mx-2 fs-5 mb-0">Time Spending:</p>
            <span class="fw-bold fs-5 mb-0">2h</span>
          </div>
          <div class="d-flex align-items-center justify-content-center rounded" id="ingredient">
            <span class="material-symbols-outlined mt-1">grocery</span>
            <p class="mx-2 fs-5 mb-0">Number of Ingredient:</p>
            <span class="fw-bold fs-5 mb-0">(20)</span>
          </div>
          <div class="d-flex align-items-center justify-content-center rounded" id="nutrition">
            <p class="m-0 fs-5" data-toggle="collapse" data-target="#nutritions" aria-expanded="false"
              aria-controls="nutritions">
              Nutritions
            </p>
          </div>
        </div>

        <!-- Nutritional information -->
        <div class="collapse mt-3 m-0" id="nutritions">
          <form>
            <div class="input-group mb-3">
              <div class="col d-flex border-end border-success">
                <div class="col">
                  <ul>
                    <li>សាច់ជ្រួក</li>
                  </ul>
                </div>
                <div class="col">
                  <ul class="list-unstyled">
                    <li>:</li>
                  </ul>
                </div>
                <div class="col">
                  <ul class="list-inline">
                    <li>5kg</li>
                  </ul>
                </div>
              </div>
              <!-- Repeat structure for other nutritional items -->
            </div>
          </form>
        </div>

        <hr>

        <!-- Ingredients and cooking instructions -->
        <div class="row mt-4">
          <div class="col-md-7">
            <div class="card">
              <h3 class="card-header fw-bold text-success">How to Cook?</h3>
              <div class="card-body">
                <ol class="list-group list-group-flush">
                  <li class="list-group-item">
                    <h5 class="fw-bold text-success">Step 1</h5>
                    <p class="text-dark">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                      Voluptatibus fuga debitis officiis assumenda vel mollitia ut ex facilis! Voluptate
                      totam quia ex pariatur porro nam error distinctio molestiae assumenda expedita.
                    </p>
                  </li>
                  <!-- Repeat for other steps -->
                </ol>
              </div>
            </div>
          </div>

          <!-- Ingredients list -->
          <div class="col-md-5">
            <div class="card">
              <div class="card-header bg-success text-white fw-bold text-center">Ingredients</div>
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">សាច់ជ្រួក</li>
                      <!-- Repeat for other ingredients -->
                    </ul>
                  </div>
                  <div class="col">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">5kg</li>
                      <!-- Repeat for other ingredient amounts -->
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <hr>

        <!-- Where to buy section -->
        <div class="row">
          <div class="col">
            <h3 class="fw-bold m-0 text-success">Where you can buy this food?</h3>

            <!-- Address input form -->
            <div class="mt-3">
              <button class="btn btn-dark d-flex align-items-center" type="button" data-bs-toggle="collapse"
                data-bs-target="#addressForm" aria-expanded="false" aria-controls="addressForm">
                Give us your address <span class="material-symbols-outlined ms-2">location_on</span>
              </button>
              <div class="collapse mt-3" id="addressForm">
                <form @submit.prevent="searchAddress">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Your address" aria-label="Your address"
                      aria-describedby="button-addon2" >
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                  </div>
                </form>
              </div>
            </div>

            <!-- Map view -->
            <div class="mt-3 mb-3">
              <MapView ></MapView>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import NavbarView from '../Navbar/NavbarView.vue';
import SideBar from '../../../Components/Layouts/SideBar.vue';
import MapView from '../../../Components/Map/GoogleMapVue.vue';

export default {
  components: {
    NavbarView,
    SideBar,
    MapView
  },
  data() {
    return {
      selectedAddress: ''
    };

  },
  methods: {
    searchAddress() {
      console.log(this.selectedAddress);
    }
  }
};
</script>

<style scoped>
#nutrition {
  background-color: #355e2b;
  color: white;
}

#nutrition button {
  color: white;
}

#ingredient {
  background-color: #8A9A5B;
}

#timer {
  background-color: #bcb88b;
}

#nutrition,
#timer,
#ingredient {
  box-shadow: 2px 4px 5px 0px green
}

#nutrition:hover,
#timer:hover,
#ingredient:hover,
#category {
  background-color: white;
  border-color: green;
  color: green;
}

.banner-image {
  width: 100%;
  height: 100vh;
  /* Adjust as needed */
  object-fit: fill;
}

.input-group-prepend .input-group-text {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}

.input-group .form-control {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}

.form-outline i {
  position: absolute;
  top: 78%;
  /* left: 70%; */
  transform: translateY(-50%);
  pointer-events: none;
}

.card1:hover {
  box-shadow: 3px 3px 1px 1px green;
  border-color: green;
}

.zoom-card,
#bookmard,
#share,
#print,
#download,
#foodImage1,
#foodImage2,
.list-group-item {
  transition: transform 0.3s ease;
}

.zoom-card:hover,
#bookmard:hover,
#share:hover,
#print:hover,
#download:hover,
#foodImage1:hover,
#foodImage2:hover,
.list-group-item:hover {
  transform: scale(1.05);
  z-index: 10;

}
</style>
