<template>
  <div class="container h-100">
    <NavbarView></NavbarView>
    <main class="container" style="margin-top: 14%">
      <div class="containerTop">
        <img
          src="../../assets/ContainerImages/homePoster.png"
          alt="homeImage"
          width="100%"
          height="600px"
        />
      </div>
      <div class="row categories mt-5">
        <div class="col-md-3 col-lg w-100">
          <div class="card shadow" style="height: 300px">
            <img
              src="../../assets/CategoryImages/breakfast.png"
              width="100%"
              height="180px"
              class="card-img-top"
              alt="Breakfast"
            />
            <div class="card-body text-center">
              <a href="#" class="text-green text-decoration-none d-block fs-4">អាហារពេលព្រឹក</a>
              <p class="d-flex justify-content-start">Breakfast is the most important</p>
              <div class="text-warning timeSuggest d-flex justify-content-between">
                <p>7:00AM - 9:00AM</p>
                <i class="material-icons">access_time</i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-lg w-100">
          <div class="card shadow" style="height: 300px">
            <img
              src="../../assets/CategoryImages/lunch.png"
              width="100%"
              height="180px"
              class="card-img-top"
              alt="Lunch"
            />
            <div class="card-body text-center">
              <a href="#" class="text-green text-decoration-none d-block fs-4">អាហារថ្ងៃត្រង់</a>
              <p class="d-flex justify-content-start">Lunch is the best food</p>
              <div class="text-warning timeSuggest d-flex justify-content-between">
                <p>11:00AM - 12:00PM</p>
                <i class="material-icons">access_time</i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-lg w-100">
          <div class="card shadow" style="height: 300px">
            <img
              src="../../assets/CategoryImages/dinner.png"
              width="100%"
              height="180px"
              class="card-img-top"
              alt="Dinner"
            />
            <div class="card-body text-center">
              <a href="#" class="text-green text-decoration-none d-block fs-4">អាហារពេលល្ងាច</a>
              <p class="d-flex justify-content-start">Dinner is the best</p>
              <div class="text-warning timeSuggest d-flex justify-content-between">
                <p>5:00PM - 7:00PM</p>
                <i class="material-icons">access_time</i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-lg w-100">
          <div class="card shadow" style="height: 300px">
            <img
              src="../../assets/CategoryImages/dessert.png"
              width="100%"
              height="180px"
              class="card-img-top"
              alt="Dessert"
            />
            <div class="card-body text-center">
              <a href="#" class="text-green text-decoration-none d-block fs-4">បង្អែម</a>
              <p class="d-flex justify-content-start">Dessert is not important too much</p>
              <div class="text-warning timeSuggest d-flex justify-content-between">
                <p>7:00PM - 9:00PM</p>
                <i class="material-icons">access_time</i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-lg w-100">
          <div class="card shadow" style="height: 300px">
            <img
              src="../../assets/CategoryImages/drink.png"
              width="100%"
              height="180px"
              class="card-img-top"
              alt="Drinks"
            />
            <div class="card-body text-center">
              <a href="#" class="text-green text-decoration-none d-block fs-4">ភេសជ្ជៈកំប៉ុង</a>
              <p class="d-flex justify-content-start">Drinks is not important</p>
              <div class="text-warning timeSuggest d-flex justify-content-between">
                <p>7:00PM - 9:00PM</p>
                <i class="material-icons">access_time</i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div
        class="containerMid text-center my-5 text-green"
        style="
          font-family:
            system-ui,
            -apple-system,
            BlinkMacSystemFont,
            'Segoe UI',
            Roboto,
            Oxygen,
            Ubuntu,
            Cantarell,
            'Open Sans',
            'Helvetica Neue',
            sans-serif;
        "
      >
        <h1>FOODS LIST</h1>
      </div>
      <div class="containerBottom row overflow-auto" style="height: 60vh">
        <div class="col-md-4 col-lg-3 mb-4">
          <div class="card shadow" style="height: 100%">
            <img
              src="../../assets/ContainerImages/beefSoup.png"
              width="100%"
              height="200px"
              class="card-img-top"
              alt="#"
            />
            <div class="card-body text-center">
              <h5 class="card-title">Card title</h5>
              <p class="card-text d-flex justify-content-start text-left">
                Some quick example text to build on the card title and make up the bulk of the
                card's content.
              </p>
              <div class="cardFooter d-flex">
                <div class="iconStar text-warning">
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                </div>
                <span class="d-flex justify-content-center ml-3 mt-0.5">100k</span>
                <a href="#" class="text-decoration-none">
                  <i class="material-icons text-primary d-flex" style="margin-left: 20px"
                    >favoturned_in_not</i
                  >
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <div class="card shadow" style="height: 100%">
            <img
              src="../../assets/ContainerImages/buggur.png"
              width="100%"
              height="200px"
              class="card-img-top"
              alt="#"
            />
            <div class="card-body text-center">
              <h5 class="card-title">Card title</h5>
              <p class="card-text d-flex justify-content-start text-left">
                Some quick example text to build on the card title and make up the bulk of the
                card's content.
              </p>
              <div class="cardFooter d-flex">
                <div class="iconStar text-warning">
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                </div>
                <span class="d-flex justify-content-center ml-3 mt-0.5">100k</span>
                <a href="#" class="text-decoration-none">
                  <i class="material-icons text-primary d-flex" style="margin-left: 20px"
                    >favoturned_in_not</i
                  >
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <div class="card shadow" style="height: 100%">
            <img
              src="../../assets/ContainerImages/fryChicken.png"
              width="100%"
              height="200px"
              class="card-img-top"
              alt="#"
            />
            <div class="card-body text-center">
              <h5 class="card-title">Card title</h5>
              <p class="card-text d-flex justify-content-start text-left">
                Some quick example text to build on the card title and make up the bulk of the
                card's content.
              </p>
              <div class="cardFooter d-flex">
                <div class="iconStar text-warning">
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                </div>
                <span class="d-flex justify-content-center ml-3 mt-0.5">100k</span>
                <a href="#" class="text-decoration-none">
                  <i class="material-icons text-primary d-flex" style="margin-left: 20px"
                    >favoturned_in_not</i
                  >
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <div class="card shadow" style="height: 100%">
            <img
              src="../../assets/ContainerImages/fryFish.png"
              width="100%"
              height="200px"
              class="card-img-top"
              alt="#"
            />
            <div class="card-body text-center">
              <h5 class="card-title">Card title</h5>
              <p class="card-text d-flex justify-content-start text-left">
                Some quick example text to build on the card title and make up the bulk of the
                card's content.
              </p>
              <div class="cardFooter d-flex">
                <div class="iconStar text-warning">
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                </div>
                <span class="d-flex justify-content-center ml-3 mt-0.5">100k</span>
                <a href="#" class="text-decoration-none">
                  <i class="material-icons text-primary d-flex" style="margin-left: 20px"
                    >favoturned_in_not</i
                  >
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <div class="card shadow" style="height: 100%">
            <img
              src="../../assets/ContainerImages/nhom.png"
              width="100%"
              height="200px"
              class="card-img-top"
              alt="#"
            />
            <div class="card-body text-center">
              <h5 class="card-title">Card title</h5>
              <p class="card-text d-flex justify-content-start text-left">
                Some quick example text to build on the card title and make up the bulk of the
                card's content.
              </p>
              <div class="cardFooter d-flex">
                <div class="iconStar text-warning">
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                </div>
                <span class="d-flex justify-content-center ml-3 mt-0.5">100k</span>
                <a href="#" class="text-decoration-none">
                  <i class="material-icons text-primary d-flex" style="margin-left: 20px"
                    >favoturned_in_not</i
                  >
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <div class="card shadow" style="height: 100%">
            <img
              src="../../assets/ContainerImages/noodle.png"
              width="100%"
              height="200px"
              class="card-img-top"
              alt="#"
            />
            <div class="card-body text-center">
              <h5 class="card-title">Card title</h5>
              <p class="card-text d-flex justify-content-start text-left">
                Some quick example text to build on the card title and make up the bulk of the
                card's content.
              </p>
              <div class="cardFooter d-flex">
                <div class="iconStar text-warning">
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                </div>
                <span class="d-flex justify-content-center ml-3 mt-0.5">100k</span>
                <a href="#" class="text-decoration-none">
                  <i class="material-icons text-primary d-flex" style="margin-left: 20px"
                    >favoturned_in_not</i
                  >
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <div class="card shadow" style="height: 100%">
            <img
              src="../../assets/ContainerImages/pizza.png"
              width="100%"
              height="200px"
              class="card-img-top"
              alt="#"
            />
            <div class="card-body text-center">
              <h5 class="card-title">Card title</h5>
              <p class="card-text d-flex justify-content-start text-left">
                Some quick example text to build on the card title and make up the bulk of the
                card's content.
              </p>
              <div class="cardFooter d-flex">
                <div class="iconStar text-warning">
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                </div>
                <span class="d-flex justify-content-center ml-3 mt-0.5">100k</span>
                <a href="#" class="text-decoration-none">
                  <i class="material-icons text-primary d-flex" style="margin-left: 20px"
                    >favoturned_in_not</i
                  >
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <div class="card shadow" style="height: 100%">
            <img
              src="../../assets/ContainerImages/pork.png"
              width="100%"
              height="200px"
              class="card-img-top"
              alt="#"
            />
            <div class="card-body text-center">
              <h5 class="card-title">Card title</h5>
              <p class="card-text d-flex justify-content-start text-left">
                Some quick example text to build on the card title and make up the bulk of the
                card's content.
              </p>
              <div class="cardFooter d-flex">
                <div class="iconStar text-warning">
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                </div>
                <span class="d-flex justify-content-center ml-3 mt-0.5">100k</span>
                <a href="#" class="text-decoration-none">
                  <i class="material-icons text-primary d-flex" style="margin-left: 20px"
                    >favoturned_in_not</i
                  >
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <div class="card shadow" style="height: 100%">
            <img
              src="../../assets/ContainerImages/salmon.png"
              width="100%"
              height="200px"
              class="card-img-top"
              alt="#"
            />
            <div class="card-body text-center">
              <h5 class="card-title">Card title</h5>
              <p class="card-text d-flex justify-content-start text-left">
                Some quick example text to build on the card title and make up the bulk of the
                card's content.
              </p>
              <div class="cardFooter d-flex">
                <div class="iconStar text-warning">
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                </div>
                <span class="d-flex justify-content-center ml-3 mt-0.5">100k</span>
                <a href="#" class="text-decoration-none">
                  <i class="material-icons text-primary d-flex" style="margin-left: 20px"
                    >favoturned_in_not</i
                  >
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <div class="card shadow" style="height: 100%">
            <img
              src="../../assets/ContainerImages/rice.png"
              width="100%"
              height="200px"
              class="card-img-top"
              alt="#"
            />
            <div class="card-body text-center">
              <h5 class="card-title">Card title</h5>
              <p class="card-text d-flex justify-content-start text-left">
                Some quick example text to build on the card title and make up the bulk of the
                card's content.
              </p>
              <div class="cardFooter d-flex">
                <div class="iconStar text-warning">
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                </div>
                <span class="d-flex justify-content-center ml-3 mt-0.5">100k</span>
                <a href="#" class="text-decoration-none">
                  <i class="material-icons text-primary d-flex" style="margin-left: 20px"
                    >favoturned_in_not</i
                  >
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <div class="card shadow" style="height: 100%">
            <img
              src="../../assets/ContainerImages/buggur.png"
              width="100%"
              height="200px"
              class="card-img-top"
              alt="#"
            />
            <div class="card-body text-center">
              <h5 class="card-title">Card title</h5>
              <p class="card-text d-flex justify-content-start text-left">
                Some quick example text to build on the card title and make up the bulk of the
                card's content.
              </p>
              <div class="cardFooter d-flex">
                <div class="iconStar text-warning">
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                </div>
                <span class="d-flex justify-content-center ml-3 mt-0.5">100k</span>
                <a href="#" class="text-decoration-none">
                  <i class="material-icons text-primary d-flex" style="margin-left: 20px"
                    >favoturned_in_not</i
                  >
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <div class="card shadow" style="height: 100%">
            <img
              src="../../assets/ContainerImages/fryChicken.png"
              width="100%"
              height="200px"
              class="card-img-top"
              alt="#"
            />
            <div class="card-body text-center">
              <h5 class="card-title">Card title</h5>
              <p class="card-text d-flex justify-content-start text-left">
                Some quick example text to build on the card title and make up the bulk of the
                card's content.
              </p>
              <div class="cardFooter d-flex">
                <div class="iconStar text-warning">
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                  <i class="material-icons">star</i>
                </div>
                <span class="d-flex justify-content-center ml-3 mt-0.5">100k</span>
                <a href="#" class="text-decoration-none">
                  <i class="material-icons text-primary d-flex" style="margin-left: 20px"
                    >favoturned_in_not</i
                  >
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <FooterView></FooterView>
  </div>
</template>

<script>
import NavbarView from './Navbar/NavbarView.vue'
import FooterView from './Footer/FooterView.vue'
export default {
  components: {
    NavbarView,
    FooterView,
  }
}
</script>
