<template>
  <NavbarView></NavbarView>
  <div class="d-flex" style="margin-top: 158px">
    <div class="col-2">
      <SideBar style="width: 240px; height: 100%" />
    </div>
    <div class="col-10">
      <div class="d-flex align-center pt-2">
        <a href="" class="list-unstyled text-decoration-none text-danger">Back to list</a>
        <span class="material-symbols-outlined fs-3 text-danger"> keyboard_arrow_right </span>
        <a href="" class="list-unstyled text-decoration-none text-danger">food name</a>
      </div>

      <h1 class="text-success mt-2 mb-3">{{ food.name }}</h1>
      <div class="col col-lg-2 d-flex mt-3 mb-3">
        <div class="small-ratings d-flex">
          <i class="fa fa-star rating-color mx-1"></i>
          <i class="fa fa-star rating-color mx-1"></i>
          <i class="fa fa-star rating-color mx-1"></i>
          <i class="fa fa-star mx-1"></i>
          <i class="fa fa-star mx-1"></i>
        </div>
      </div>
      <hr />
      <!-- ===================icon action share ,save,print,========================== -->
      <div class="mt-3 mb-3">
        <div class="btn btn rounded border border-success mr-2" id="bookmard">
          <span class="material-symbols-outlined"> bookmark_added </span>
        </div>
        <div class="btn btn rounded border border-success mr-2" id="download">
          <span class="material-symbols-outlined"> download </span>
        </div>
        <div class="btn btn rounded border border-success mr-2" id="print">
          <span class="material-symbols-outlined"> print </span>
        </div>
        <div class="btn btn rounded border border-success mr-2" id="share">
          <span class="material-symbols-outlined"> share </span>
        </div>
      </div>
      <!--======================video and image of food ===========================-->
      <div class="jumbotron jumbotron-fluid p-0 m-0 d-flex">
        <div class="col-8">
          <iframe
            src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"
            style="width: 100%; height: 100%; border: none"
          >
          </iframe>
        </div>

        <div class="col-4">
          <div class="card mb-3" id="foodImage1">
            <img src="../../../assets/FoodDetail/image.png" alt="" width="100%" height="195px" />
          </div>
          <div class="card" id="foodImage2">
            <img src="../../../assets/FoodDetail/image.png" alt="" width="100%" height="195px" />
          </div>
        </div>
      </div>
      <!--=====================spending time,nutritions,ingredients =================-->

      <div class="row d-flex justify-content-evenly text-white mt-3 m-0">
        <div
          class="d-flex align-items-center justify-content-center rounded"
          id="timer"
          style="width: 380px; height: 100px"
        >
          <span class="material-symbols-outlined mt-1"> timer </span>
          <p class="mx-2 fs-5 mb-0">Time Spending:</p>
          <span class="fw-bold fs-5 mb-0">2h</span>
        </div>
        <div
          class="d-flex align-items-center justify-content-center rounded"
          id="ingredient"
          style="width: 380px; height: 100px"
        >
          <span class="material-symbols-outlined mt-1"> grocery </span>
          <p class="mx-2 fs-5 mb-0">Number of Ingredient:</p>
          <span class="fw-bold fs-5 mb-0">(20)</span>
        </div>
        <div
          class="d-flex align-items-center justify-content-center rounded"
          id="nutrition"
          style="width: 380px; height: 100px"
        >
          <p
            class="m-0 fs-5"
            data-toggle="collapse"
            data-target="#nutritions"
            aria-expanded="false"
            aria-controls="nutritions"
          >
            Nutritions
          </p>
        </div>
      </div>
      <!--=====================nutrtitions ================================= -->
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
            <div class="col d-flex">
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
          </div>
        </form>
      </div>
      <hr />
      <!--======================ingredients and how to cook ================================================ -->
      <div class="row mt-4">
        <div class="col-md-7">
          <div class="card">
            <h3 class="card-header fw-bold text-success">How to Cook?</h3>
            <div class="card-body">
              <ol class="list-group list-group-flush">
                <li class="list-group-item">
                  <h5 class="fw-bold text-success">Step 1</h5>
                  <p class="text-dark">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus fuga
                    debitis officiis assumenda vel mollitia ut ex facilis! Voluptate totam quia ex
                    pariatur porro nam error distinctio molestiae assumenda expedita.
                  </p>
                </li>
                <li class="list-group-item">
                  <h5 class="fw-bold text-success">Step 2</h5>
                  <p class="text-dark">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus fuga
                    debitis officiis assumenda vel mollitia ut ex facilis! Voluptate totam quia ex
                    pariatur porro nam error distinctio molestiae assumenda expedita.
                  </p>
                </li>
                <li class="list-group-item">
                  <h5 class="fw-bold text-success">Step 3</h5>
                  <p class="text-dark">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus fuga
                    debitis officiis assumenda vel mollitia ut ex facilis! Voluptate totam quia ex
                    pariatur porro nam error distinctio molestiae assumenda expedita.
                  </p>
                </li>
              </ol>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <div class="card">
            <div class="card-header bg-success text-white fw-bold text-center">Ingredients</div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">សាច់ជ្រួក</li>
                    <li class="list-group-item">សាច់ជ្រួក</li>
                    <li class="list-group-item">សាច់ជ្រួក</li>
                    <li class="list-group-item">សាច់ជ្រួក</li>
                  </ul>
                </div>
                <div class="col">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">5kg</li>
                    <li class="list-group-item">5kg</li>
                    <li class="list-group-item">5kg</li>
                    <li class="list-group-item">5kg</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr />
      <!--======================where can you buy this food ================================================ -->
      <div class="row">
        <div class="col">
          <div>
            <h3 class="fw-bold m-0 text-success">Where you can buy this food?</h3>
          </div>
          <div>
            <!-- <div class="col"> -->
            <div class="mt-3">
              <div class="col">
                <button
                  class="btn btn-dark d-flex align-items-center"
                  type="button"
                  data-toggle="collapse"
                  data-target="#addressForm"
                  aria-expanded="false"
                  aria-controls="addressForm"
                >
                  Give us your address
                  <span class="material-symbols-outlined ms-2">location_on</span>
                </button>
              </div>
              <div class="collapse mt-3" id="addressForm">
                <form>
                  <div class="input-group mb-3">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="input your address"
                      aria-label="address"
                      aria-describedby="basic-addon1"
                    />
                    <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon1">
                        <span class="material-symbols-outlined"> search </span>
                      </span>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-3" style="width: 100%">
              <MapView />
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div>
          <h3 class="card-header fw-bold text-success">Other you might love</h3>
        </div>
        <div class="row d-flex" style="margin-top: 98px">
          <div class="col-3 col-md-3 mb-3">
            <div class="card position-relative d-flex card1 zoom-card">
              <div
                class="border border-3 border-success rounded-circle w-50 position-absolute start-50 translate-middle-x"
                style="z-index: 1; top: -85px"
              >
                <img
                  src="../../../assets/FoodDetail/image.png"
                  alt=""
                  class="img-fluid rounded-circle"
                />
              </div>

              <div class="pt-5 mt-4 d-flex justify-content-between">
                <div class="col">
                  <div class="small-ratings d-flex m-2">
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star mx-1"></i>
                    <i class="fa fa-star mx-1"></i>
                  </div>
                  <h4 class="m-2">food name</h4>
                  <div class="m-2 w-auto text-success rounded" id="category">category</div>
                </div>
                <div class="col d-flex align-items-end">
                  <div class="m-2 btn btn-success">details</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3 col-md-3 mb-3">
            <div class="card position-relative d-flex card1 zoom-card">
              <div
                class="border border-3 border-success rounded-circle w-50 position-absolute start-50 translate-middle-x"
                style="z-index: 1; top: -85px"
              >
                <img
                  src="../../../assets/FoodDetail/image.png"
                  alt=""
                  class="img-fluid rounded-circle"
                />
              </div>

              <div class="pt-5 mt-4 d-flex justify-content-between">
                <div class="col">
                  <div class="small-ratings d-flex m-2">
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star mx-1"></i>
                    <i class="fa fa-star mx-1"></i>
                  </div>
                  <h4 class="m-2">food name</h4>
                  <div class="m-2 w-auto text-success rounded" id="category">category</div>
                </div>
                <div class="col d-flex align-items-end">
                  <div class="m-2 btn btn-success">details</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3 col-md-3 mb-3">
            <div class="card position-relative d-flex card1 zoom-card">
              <div
                class="border border-3 border-success rounded-circle w-50 position-absolute start-50 translate-middle-x"
                style="z-index: 1; top: -85px"
              >
                <img
                  src="../../../assets/FoodDetail/image.png"
                  alt=""
                  class="img-fluid rounded-circle"
                />
              </div>

              <div class="pt-5 mt-4 d-flex justify-content-between">
                <div class="col">
                  <div class="small-ratings d-flex m-2">
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star mx-1"></i>
                    <i class="fa fa-star mx-1"></i>
                  </div>
                  <h4 class="m-2">food name</h4>
                  <div class="m-2 w-auto text-success rounded" id="category">category</div>
                </div>
                <div class="col d-flex align-items-end">
                  <div class="m-2 btn btn-success">details</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3 col-md-3 mb-3">
            <div class="card position-relative d-flex card1 zoom-card">
              <div
                class="border border-3 border-success rounded-circle w-50 position-absolute start-50 translate-middle-x"
                style="z-index: 1; top: -85px"
              >
                <img
                  src="../../../assets/FoodDetail/image.png"
                  alt=""
                  class="img-fluid rounded-circle"
                />
              </div>

              <div class="pt-5 mt-4 d-flex justify-content-between">
                <div class="col">
                  <div class="small-ratings d-flex m-2">
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star rating-color mx-1"></i>
                    <i class="fa fa-star mx-1"></i>
                    <i class="fa fa-star mx-1"></i>
                  </div>
                  <h4 class="m-2">food name</h4>
                  <div class="m-2 w-auto text-success rounded" id="category">category</div>
                </div>
                <div class="col d-flex align-items-end">
                  <div class="m-2 btn btn-success">details</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- </div> -->
      <!-- </div> -->
    </div>
  </div>
  <FooterView></FooterView>
</template>
<script>
import axios from 'axios'
import NavbarView from '../Navbar/NavbarView.vue'
import FooterView from '../Footer/FooterView.vue'
import SideBar from '@/Components/Layouts/SideBar.vue'

export default {
  name: 'show-food',
  props: ['id'],
  components: {
    NavbarView,
    FooterView,
    SideBar
  },
  data() {
    return {
      food: null
    }
  },
  mounted() {
    this.fetchFoodDetails()
  },
  methods: {
    async fetchFoodDetails() {
      try {
        const response = await axios.get(`http://127.0.0.1:8000/api/food/detail/${this.id}`)
        if (response.data.success) {
          this.food = response.data.data
        }
      } catch (error) {
        console.error('Error fetching food details:', error)
      }
    }
  }
}
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
  background-color: #8a9a5b;
}

#timer {
  background-color: #bcb88b;
}

#nutrition,
#timer,
#ingredient {
  box-shadow: 2px 4px 5px 0px green;
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
