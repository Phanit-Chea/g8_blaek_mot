<template>
  <div class="container h-100">
    <header class="row bg-white p-2 fixed-top">
      <div class="col-md-auto d-flex align-items-center text-green">
        <img
          src="../../assets/ContainerImages/logo.png"
          alt="homeImage"
          width="100%"
          height="100px"
        />
        <!-- <h1 class="logo" style="font-family: 'Moul', serif; margin-left: 20px">ប្លែកមាត់</h1> -->
      </div>
      <div
        class="col-md d-flex align-items-center"
        style="width: 100%; margin-left: 3%; margin-top: 10px; margin-bottom: 10px"
      >
        <div class="input-group w-250">
          <button class="input-group-text border border-success border-end-0">
            <i class="material-icons">search</i>
          </button>
          <input
            type="text"
            class="form-control p-3 border border-success border-end-0 shadow-none"
            placeholder="What would like to eat?"
            aria-label="Search"
          />
          <button class="text-light input-group-text border border-success bg-green border-start-0">
            Search
          </button>
        </div>
      </div>
      <div class="col-md d-flex justify-content-end align-items-center gap-4 m-2">
        <a
          href="#"
          class="me-3 rounded-circle d-flex p-1 justify-content-center align-items-center bg-white text-decoration-none" style="border: 3px solid rgb(43, 212, 145)"
        >
          <i class="material-icons text-green fs-1">account_circle</i>
        </a>
        <a
          href="#"
          class="me-3 rounded-circle d-flex p-1 justify-content-center align-items-center bg-white text-decoration-none" style="border: 3px solid rgb(43, 212, 145)"
        >
          <i class="material-icons text-green fs-1">notifications</i>
        </a>
        <a
          href="#"
          class="me-3 rounded-circle d-flex p-1 justify-content-center align-items-center bg-white text-decoration-none" style="border: 3px solid rgb(43, 212, 145)"
        >
          <i class="material-icons text-green fs-1">turned_in_not</i>
        </a>
      </div>
      <nav class="row text-warning mt-3">
        <div class="col d-flex" style="gap: 20px; margin-left: 20px">
          <a href="#" class="text-green text-decoration-none nav-link">Home</a>
          <a href="#" class="text-green text-decoration-none nav-link">Category</a>
          <a href="#" class="text-green text-decoration-none nav-link">About Us</a>
          <a href="#" class="text-green text-decoration-none nav-link">Join With Us</a>
        </div>
      </nav>
    </header>
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
    <div class="container m-2.8" style="background-color: #2a581a">
      <footer class="text-light py-5">
        <div class="col-md-auto d-flex align-items-center text-green">
          <img
            src="../../assets/FooterImages/logo.png"
            alt="homeImage"
            width="16%"
            height="100px"
          />
          <!-- <h1 class="logo" style="font-family: 'Moul', serif; margin-left: 20px">ប្លែកមាត់</h1> -->
        </div>
        <hr />
        <div class="container mt-3" style="margin-left: 20px">
          <div class="row text-center text-md-start">
            <div class="col-md mb-5">
              <h3>About Us</h3>
              <p>កកូរ</p>
              <p>ស៊ុបគោ</p>
              <p>ស៊ុបពពែរ</p>
              <p>ស៊ុបត្រីឆ្លាម</p>
              <p>ស៊ុមស៊ីឆាន់</p>
            </div>
            <div class="col-md mb-5">
              <h4>Contact Us</h4>
              <p>Email: blaekmot@gmail.com</p>
              <p>Phone: +855 96 272 8396</p>
              <p>LinkedIn: RATANAKKHOEURN</p>
            </div>
            <div class="col-md mb-5">
              <h4>Service</h4>
              <p>Email: blaekmot@gmail.com</p>
              <p>Phone: +855 96 272 8396</p>
              <p>LinkedIn: RATANAKKHOEURN</p>
            </div>
            <div class="col-md">
              <h4>Follow Us</h4>
              <input
                type="text"
                class="form-control p-1 w-80"
                placeholder="What would like to eat?"
                aria-label="Search"
              />
              <ul class="list-unstyled d-flex justify-content-md-start mt-3 gap-2">
                <li class="ms-3">
                  <a href="#" class="socialIcon"
                    ><img
                      src="../../assets/FooterImages/facebook.png"
                      alt="Facebook"
                      class="img-fluid"
                      style="width: 35px; height: 35px; border-radius: 100%"
                  /></a>
                </li>
                <li class="ms-3">
                  <a href="#" class="socialIcon"
                    ><img
                      src="../../assets/FooterImages/twitter.png"
                      alt="Twitter"
                      class="img-fluid"
                      style="width: 35px; height: 35px; border-radius: 100%"
                  /></a>
                </li>
                <li class="ms-3">
                  <a href="#" class="socialIcon"
                    ><img
                      src="../../assets/FooterImages/instagram.png"
                      alt="Instagram"
                      class="img-fluid"
                      style="width: 35px; height: 35px; border-radius: 100%"
                  /></a>
                </li>
                <li class="ms-3">
                  <a href="#" class="socialIcon"
                    ><img
                      src="../../assets/FooterImages/linkedIn.png"
                      alt="LinkedIn"
                      class="img-fluid"
                      style="width: 35px; height: 35px; border-radius: 100%"
                  /></a>
                </li>
                <li class="ms-3">
                  <a href="#" class="socialIcon"
                    ><img
                      src="../../assets/FooterImages/youtube.png"
                      alt="YouTube"
                      class="img-fluid"
                      style="width: 35px; height: 35px; border-radius: 100%"
                  /></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
</template>