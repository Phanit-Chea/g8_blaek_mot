<script>
import NavbarView from '@/views/Web/Navbar/NavbarView.vue'
import FooterView from '@/views/Web/Footer/FooterView.vue'
import { useUserStore } from '@/stores/userStore.ts'
import axiosInstance from '@/plugins/axios'

export default {
  name: 'HomePage',
  props: {
    show: Boolean
  },
  components: {
    NavbarView,
    FooterView
  },
  data() {
    return {
      foods: [],
      randomFoods: [],
      folders: [],
      saves: [],
      categoryID: null,
      selectedRandomNumber: 6,
      selectedFoodId: null,
      selectedFolderId: null
    }
  },
  watch: {
    categoryID(newValue) {
      this.fetchRandomfood()
    },
    selectedRandomNumber(newValue) {
      this.fetchRandomfood()
    }
  },
  mounted() {
    this.fetchFood()
    this.fetchRandomfood()
    this.fetchFolder()
      $(function() {
      $('#modal').modal('toggle');
    })
  },
  methods: {
    async fetchFood() {
      try {
        const response = await axiosInstance.get('/food/list')
        if (response.data.success) {
          this.foods = response.data.data
        }
      } catch (error) {
        console.error('Error fetching foods:', error)
      }
    },
    async fetchRandomfood() {
      try {
        console.log('Fetching random food...')
        const response = await axiosInstance.get(
          `/food/random/${this.categoryID}?count=${this.selectedRandomNumber}`
        )
        this.randomFoods = response.data.suitable_food
      } catch (error) {
        console.error('Error fetching random food:', error)
      }
    },
    async fetchFolder() {
      try {
        const userStore = useUserStore()
        const response = await axiosInstance.get('/folder/list', {
          headers: {
            Authorization: `Bearer ${userStore.user.remember_token}`,
            'Content-Type': 'application/json'
          }
        })
        if (response.data.success) {
          this.folders = response.data.data
        }
      } catch (error) {
        console.error('Error fetching folders:', error)
      }
    },
     hideModal() {
      $('#modal').modal('hide');
      $('body').removeClass('modal-open');
      $('.modal-backdrop').remove();
      $('body').css('overflow', 'auto'); 
    },
    async saveFood() {
      try {
        const userStore = useUserStore()
        const response = await axiosInstance.post(
          `/save/create/${this.selectedFoodId}`,
          {
            folder_id: this.selectedFolderId
          },
          {
            headers: {
              Authorization: `Bearer ${userStore.user.remember_token}`,
              'Content-Type': 'application/json'
            }
          }
        )
        if (response.data.success) {
          this.$router.push('/user/save')
          this.selectedFoodId = null
          this.selectedFolderId = null
          this.hideModal();
        }
      } catch (error) {
        console.error('Error saving food:', error)
      }
    },
    selectFood(foodID) {
      this.selectedFoodId = foodID
    }
  }
}
</script>

<template>
  <NavbarView></NavbarView>
  <div class="contain-home" style="padding-top: 120px">
    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">
      <div class="container">
        <div class="row gy-4 justify-content-center justify-content-lg-between">
          <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">Blaek Mouth<br />Food Welcome</h1>
            <p data-aos="fade-up" data-aos-delay="100">
              We are team of talented designers making websites with Bootstrap
            </p>
            <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
              <a href="#book-a-table" class="btn-get-started">Booka a Table</a>
              <a
                href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                class="glightbox btn-watch-video d-flex align-items-center"
                ><i class="bi bi-play-circle"></i><span>Watch Video</span></a
              >
            </div>
          </div>
          <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img
              src="../../assets/CategoryImages/mirk.jpg"
              class="img-fluid animated"
              alt=""
              style="max-width: 50rem; position: relative; left: -150px"
            />
          </div>
        </div>
      </div>
    </section>
    <!-- /Hero Section -->

    <section class="news section-padding">
      <div class="container">
        <div class="row">
          <h2 class="text-center mb-lg-5 mb-4">News &amp; Foods</h2>

          <div class="col-lg-6 col-md-6 col-12">
            <div class="news-thumb mb-4">
              <a href="news-detail.html">
                <img
                  src="../../assets/CategoryImages/dessert.png"
                  class="img-fluid news-image"
                  alt=""
                />
              </a>

              <div class="news-text-info news-text-info-large">
                <span class="category-tag bg-danger">Featured</span>

                <h5 class="news-title mt-2">
                  <a href="news-detail.html" class="news-title-link"
                    >Healthy Lifestyle and happy living tips</a
                  >
                </h5>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 col-12">
            <div class="news-thumb mb-4">
              <a href="news-detail.html">
                <img
                  src="../../assets/CategoryImages/dessert.png"
                  class="img-fluid news-image"
                  alt=""
                />
              </a>

              <div class="news-text-info news-text-info-large">
                <span class="category-tag bg-danger">Featured</span>

                <h5 class="news-title mt-2">
                  <a href="news-detail.html" class="news-title-link">How to make a healthy meal</a>
                </h5>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12">
            <div class="news-thumb mb-4">
              <a href="news-detail.html">
                <img
                  src="../../assets/CategoryImages/lunch.png"
                  class="img-fluid news-image"
                  alt=""
                />
              </a>

              <div class="news-text-info">
                <span class="category-tag me-3 bg-info">Meeting</span>

                <strong>30 April 2022</strong>

                <h5 class="news-title mt-2">
                  <a href="news-detail.html" class="news-title-link">Making a healthy salad</a>
                </h5>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12">
            <div class="news-thumb mb-4">
              <a href="news-detail.html">
                <img
                  src="../../assets/CategoryImages/lunch.png"
                  class="img-fluid news-image"
                  alt=""
                />
              </a>

              <div class="news-text-info">
                <span class="category-tag me-3 bg-info">Meeting</span>

                <strong>30 April 2022</strong>

                <h5 class="news-title mt-2">
                  <a href="news-detail.html" class="news-title-link">Making a healthy salad</a>
                </h5>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12">
            <div class="news-thumb mb-4">
              <a href="news-detail.html">
                <img
                  src="../../assets/CategoryImages/lunch.png"
                  class="img-fluid news-image"
                  alt=""
                />
              </a>

              <div class="news-text-info">
                <span class="category-tag me-3 bg-info">Meeting</span>

                <strong>30 April 2022</strong>

                <h5 class="news-title mt-2">
                  <a href="news-detail.html" class="news-title-link">Making a healthy salad</a>
                </h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a href="/chat"
        ><i class="bi bi-chat-dots-fill chat"
          ><span
            class="position-absolute top-5 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2"
            ><span class="visually-hidden">unread messages</span></span
          ></i
        ></a
      >
    </section>

    <section id="menu" class="menu section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Menu Today</h2>
        <p><span>Today Food</span> <span class="description-title">Recomment</span></p>
      </div>
      <!-- End Section Title -->

      <div class="container">
        <ul
          class="nav nav-link d-flex justify-content-center"
          data-aos="fade-up"
          data-aos-delay="100"
        >
          

          <li class="nav-item">
            <a
              class="nav-link active show"
              href="#"
              data-bs-toggle="tab"
              data-bs-target="#menu-breakfast"
              v-on:click="categoryID = 1"
            >
              <h4>Breakfast</h4>
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              href="#"
              data-bs-toggle="tab"
              data-bs-target="#menu-lunch"
              v-on:click="categoryID = 2"
            >
              <h4>Lunch</h4>
            </a>
          </li>
          <!-- End tab nav item -->

          <li class="nav-item">
            <a
              class="nav-link"
              data-bs-toggle="tab"
              data-bs-target="#menu-dinner"
              v-on:click="categoryID = 3"
            >
              <h4>Dinner</h4>
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              data-bs-toggle="tab"
              data-bs-target="#menu-starters"
              v-on:click="categoryID = 4"
            >
              <h4>Bakeries</h4>
            </a>
          </li>
          <!-- End tab nav item -->
          <li class="nav-item">
            <select
              id="category"
              class="mt-2 form-control form-select-sm text-center"
              v-model.number="selectedRandomNumber"
            >
              <option class="siemreap" value="6" selected>ចំនួនម្ហូប</option>
              <option class="siemreap" value="1">១</option>
              <option class="siemreap" value="2">២</option>
              <option class="siemreap" value="4">៤</option>
              <option class="siemreap" value="6">៦</option>
              <option class="siemreap" value="8">៨</option>
              <option class="siemreap" value="10">១០</option>
            </select>
          </li>

          <!-- End tab nav item -->
        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
          <div class="tab-pane fade active show" id="menu-starters">
            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Starters</h3>
            </div>

            <div class="row gy-5">
              <div class="col-lg-4 menu-item" v-for="food in randomFoods" :key="food.id">
                <router-link
                  :to="{ name: 'food-detail', params: { id: food.id } }"
                  class="glightbox"
                  ><img
                    :src="`http://127.0.0.1:8000/${food.image}`"
                    class="menu-img img-fluid"
                    alt=""
                /></router-link>
                <h4>{{ food.name }}</h4>
                <p class="ingredients">Lorem, deren, trataro, filede, nerada</p>
              </div>
              <!-- Menu Item -->

              <!-- Menu Item ------------------------------------------------------------------>
            </div>
          </div>
          <!-- End Starter Menu Content -->

          <div class="tab-pane fade" id="menu-breakfast">
            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Breakfast</h3>
            </div>

            <div class="row gy-5">
              <div class="col-lg-4 menu-item" v-for="food in randomFoods" :key="food.id">
                <router-link
                  :to="{ name: 'food-detail', params: { id: food.id } }"
                  class="glightbox"
                  ><img
                    :src="`http://127.0.0.1:8000/${food.image}`"
                    class="menu-img img-fluid"
                    alt=""
                /></router-link>
                <h4>{{ food.name }}</h4>
                <p class="ingredients">Lorem, deren, trataro, filede, nerada</p>
              </div>
              <!-- Menu Item -->
            </div>
          </div>
          <!-- End Breakfast Menu Content -->

          <div class="tab-pane fade" id="menu-lunch">
            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Lunch</h3>
            </div>

            <div class="row gy-5">
              <div class="col-lg-4 menu-item" v-for="food in randomFoods" :key="food.id">
                <router-link
                  :to="{ name: 'food-detail', params: { id: food.id } }"
                  class="glightbox"
                  ><img
                    :src="`http://127.0.0.1:8000/${food.image}`"
                    class="menu-img img-fluid"
                    alt=""
                /></router-link>
                <h4>{{ food.name }}</h4>
                <p class="ingredients">Lorem, deren, trataro, filede, nerada</p>
              </div>
            </div>
          </div>
          <!-- End Lunch Menu Content -->

          <div class="tab-pane fade" id="menu-dinner">
            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Dinner</h3>
            </div>

            <div class="row gy-5">
              <div class="col-lg-4 menu-item" v-for="food in randomFoods" :key="food.id">
                <router-link
                  :to="{ name: 'food-detail', params: { id: food.id } }"
                  class="glightbox"
                  ><img
                    :src="`http://127.0.0.1:8000/${food.image}`"
                    class="menu-img img-fluid"
                    alt=""
                /></router-link>
                <h4>{{ food.name }}</h4>
                <p class="ingredients">Lorem, deren, trataro, filede, nerada</p>
              </div>
              <!-- Menu Item -->
            </div>
          </div>
          <!-- End Dinner Menu Content -->
        </div>
      </div>
    </section>

    <section class="menu section-padding">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="text-center mb-lg-5 mb-4">Popular Food This Month</h2>
          </div>

          <!-- First Menu Item____________________________________________________________________ -->
          <div class="col-lg-4 col-md-6 col-12" v-for="food in foods" :key="food.id">
            <div class="menu-thumb">
              <router-link
                :to="{ name: 'food-detail', params: { id: food.id } }"
                class="menu-image-wrap"
              >
                <img
                  :src="`http://127.0.0.1:8000/${food.image}`"
                  class="img-fluid menu-image"
                  alt="Food image"
                />
                <!-- <span class="menu-tag">Breakfast</span> -->
              </router-link>
              <div class="menu-info d-flex flex-wrap align-items-center">
                <h4 class="mb-0">{{ food.name }}</h4>
                <button
                  class="price-tag bg-white shadow-lg ms-4 text-dark cursor-pointer open-button"
                  data-bs-toggle="modal"
                  data-bs-target="#exampleModal"
                  :value="food.id"
                  @click="selectFood(food.id)"
                >
                  <small>Add</small>+
                </button>
                <div class="d-flex flex-wrap align-items-center w-100 mt-2">
                  <h6 class="reviews-text mb-0 me-3">4.3/5</h6>
                  <div class="rating">
                    <input value="5" name="rating1" id="star1-5" type="radio" />
                    <label for="star1-5"></label>
                    <input value="4" name="rating1" id="star1-4" type="radio" />
                    <label for="star1-4"></label>
                    <input value="3" name="rating1" id="star1-3" type="radio" />
                    <label for="star1-3"></label>
                    <input value="2" name="rating1" id="star1-2" type="radio" />
                    <label for="star1-2"></label>
                    <input value="1" name="rating1" id="star1-1" type="radio" />
                    <label for="star1-1"></label>
                  </div>
                  <p class="reviews-text mb-0 ms-4">102 Reviews</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Why Us Section -->
    <section id="why-us" class="why-us section light-background">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="why-box" style="height: 50vh">
              <h3>Why Choose Blaek Mouth</h3>
              <p class="text-light">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel
                necessitatibus optio ad corporis.
              </p>
              <div class="text-center">
                <a href="#" class="more-btn"
                  ><span>Learn More</span> <i class="bi bi-chevron-right"></i
                ></a>
              </div>
            </div>
          </div>
          <!-- End Why Box -->

          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">
              <div class="col-xl-4">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-clipboard-data"></i>
                  <h4>Corporis voluptates officia eiusmod</h4>
                  <p>
                    Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut
                    aliquip
                  </p>
                </div>
              </div>
              <!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-gem"></i>
                  <h4>Ullamco laboris ladore lore pan</h4>
                  <p>
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt
                  </p>
                </div>
              </div>
              <!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-inboxes"></i>
                  <h4>Labore consequatur incidid dolore</h4>
                  <p>
                    Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere
                  </p>
                </div>
              </div>
              <!-- End Icon Box -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Why Us Section -->

    <section id="book-a-table" class="book-a-table section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact us now</h2>
        <p>
          <span>Contact</span> <span class="description-title">Us With This Form<br /></span>
        </p>
      </div>
      <!-- End Section Title -->
      <div class="container">
        <div class="row g-0" data-aos="fade-up" data-aos-delay="100">
          <div class="contain-img d-flex justify-between">
            <img src="../../assets/ContainerImages/buggur.png" style="width: 500px" alt="" />
            <div
              class="col-lg-8 d-flex align-items-center reservation-form-bg"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <form
                action="forms/book-a-table.php"
                method="post"
                role="form"
                class="php-email-form"
              >
                <div class="row gy-4">
                  <div class="col-lg-4 col-md-6">
                    <input
                      type="text"
                      name="name"
                      class="form-control"
                      id="name"
                      placeholder="Your Name"
                      required
                    />
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <input
                      type="email"
                      class="form-control"
                      name="email"
                      id="email"
                      placeholder="Your Email"
                      required
                    />
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <input
                      type="text"
                      class="form-control"
                      name="phone"
                      id="phone"
                      placeholder="Your Phone"
                      required
                    />
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <input
                      type="date"
                      name="date"
                      class="form-control"
                      id="date"
                      placeholder="Date"
                      required
                    />
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <input
                      type="time"
                      name="time"
                      class="form-control"
                      id="time"
                      placeholder="Time"
                      required
                    />
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <input
                      type="text"
                      class="form-control"
                      name="address"
                      id="people"
                      placeholder="Enter Address"
                      required
                    />
                  </div>
                </div>

                <div class="form-group mt-3">
                  <textarea
                    class="form-control"
                    name="message"
                    rows="5"
                    placeholder="Message"
                  ></textarea>
                </div>

                <div class="text-center mt-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">
                    Your booking request was sent. We will call back or send an Email to confirm
                    your reservation. Thank you!
                  </div>
                  <button type="submit">Contact Now</button>
                </div>
              </form>
            </div>
            <!-- End Reservation Form -->
          </div>
        </div>
      </div>
    </section>
    <!-- /Book A Table Section -->
    <!-- Popup form -->
    <div>
      <div id="myForm" v-if="formVisible" style="display: none">
        <!-- Form content goes here -->
        <form action="" class="form-container">
          <h1>Login</h1>

          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" required />

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required />

          <button type="submit" class="btn">Login</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Popup form -->
  <div
    class="modal fade rounded"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog rounded">
      <div class="modal-content rounded">
        <div class="div0">
          <div class="div2 py-4 w-50" style="background-color: rgba(255, 255, 255, 0.5)">
            <div class="px-3 pt-3">
              <h3 class="text-dark siemreap" id="exampleModalLabel">Save Food</h3>
            </div>
            <div class="modal-body">
              <form @submit.prevent="saveFood()">
                <div class="form-group">
                  <label class="text-dark siemreap">Select Folder</label>
                  <select
                    id="category"
                    class="mt-3 py-2 form-control form-select-sm text-center"
                    v-model="selectedFolderId"
                  >
                    <option class="siemreap" value="" selected>Select Folder</option>
                    <option
                      class="siemreap"
                      v-for="folder in folders"
                      :key="folder.id"
                      :value="folder.id"
                    >
                      {{ folder.folder_name }}
                    </option>
                  </select>
                </div>
                <div class="px-3 pb-3 d-flex justify-content-end mt-3">
                  <button type="button" class="btn btn-danger siemreap" data-bs-dismiss="modal">
                    Cancel
                  </button>
                  <button
                    type="submit"
                    class="btn ms-2 text-bold siemreap"
                    style="background-color: #238400"
                  >
                    Save
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <FooterView></FooterView>

  <!-- Button trigger modal -->
</template>




<style scoped>
.cardCategory,
.col-md-4 {
  transition: transform 0.3s ease;
}

.cardCategory:hover,
.col-md-4:hover {
  transform: scale(1.05);
  z-index: 10;
}

.responsive-img {
  width: 100%;
  height: 50vh;
}

.chat {
  font-size: 3rem;
  position: fixed;
  bottom: 20px;
  right: 40px;
  color: #66b64a;
  cursor: pointer;
  transition: transform 0.5s;
}

.chat:hover {
  transform: scale(1.05) rotate(-5deg);
  color: #62cd3c;
}

.cardFooter {
  width: 80%;
  display: flex;
  justify-content: start;
  margin-left: -15px;
  padding-left: 0px;
}

.cardFooterRight {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-left: 10px;
  margin-right: -15px;
  gap: 0;
  width: 40%;
}

.cardFooterRight > i {
  display: flex;
  margin-right: 3%;
  color: #66b64a;
}

.popup-form {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 999;
}

.popup-content {
  background-color: white;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

.siemreap {
  font-family: 'Siemreap', cursive;
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
</style>
