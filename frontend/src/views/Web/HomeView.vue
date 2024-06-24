<template>
  <div class="container h-100">
<<<<<<< HEAD
    <NavbarView></NavbarView>
=======
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
        <router-link to="/user" class="me-3 rounded-circle d-flex p-1 justify-content-center align-items-center bg-white text-decoration-none" style="border: 3px solid rgb(43, 212, 145)">
          <i class="material-icons text-green fs-1">account_circle</i>
        </router-link>
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
          <router-link to="/category" class="text-green text-decoration-none nav-link">Category</router-link>
          <router-link to="/aboutus" class="text-green text-decoration-none nav-link">About Us</router-link>
          <a href="#" class="text-green text-decoration-none nav-link">Join With Us</a>
        </div>
      </nav>
    </header>
>>>>>>> userProfile
    <main class="container" style="margin-top: 14%">
      <div class="containerTop">
        <img src="../../assets/ContainerImages/homePoster.png" alt="homeImage" width="100%" height="600px" />
      </div>
      <div class="row categories mt-5">
        <div class="col-md-3 col-lg w-100 cardCategory">
          <div class="card shadow" style="height: auto">
            <img src="../../assets/CategoryImages/breakfast.png" width="100%" height="180px" class="card-img-top"
              alt="Breakfast" />
            <div class="card-body text-center">
              <a href="#" class="text-green text-decoration-none d-block fs-4">អាហារពេលព្រឹក</a>
              <p class="d-flex justify-content-start">អាហារពេលព្រឹក ជាអារហារដ៏សំខាន់បំផុតដែលគ្រប់គ្នាមិនគួរមើលរំលង។</p>
              <div class="text-warning timeSuggest d-flex justify-content-between">
                <p>7:00AM - 9:00AM</p>
                <i class="material-icons">access_time</i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-lg w-100 cardCategory">
          <div class="card shadow" style="height: auto">
            <img src="../../assets/CategoryImages/lunch.png" width="100%" height="180px" class="card-img-top"
              alt="Lunch" />
            <div class="card-body text-center">
              <a href="#" class="text-green text-decoration-none d-block fs-4">អាហារថ្ងៃត្រង់</a>
              <p class="d-flex justify-content-start">រីករាយជាមួយអាហារថ្ងៃត្រង់បន្ទាប់ពីការចំណាយពេលមួយព្រឹកមកនេះ។</p>
              <div class="text-warning timeSuggest d-flex justify-content-between">
                <p>11:00AM - 12:00PM</p>
                <i class="material-icons">access_time</i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-lg w-100 cardCategory">
          <div class="card shadow" style="height: auto">
            <img src="../../assets/CategoryImages/dinner.png" width="100%" height="180px" class="card-img-top"
              alt="Dinner" />
            <div class="card-body text-center">
              <a href="#" class="text-green text-decoration-none d-block fs-4">អាហារពេលល្ងាច</a>
              <p class="d-flex justify-content-start">អាហារពេលល្ងាច ដ៏ល្អបំផុតសម្រាប់លោកអ្នកនៅទីនេះ។</p>
              <div class="text-warning timeSuggest d-flex justify-content-between">
                <p>5:00PM - 7:00PM</p>
                <i class="material-icons">access_time</i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-lg w-100 cardCategory">
          <div class="card shadow" style="height: auto">
            <img src="../../assets/CategoryImages/dessert.png" width="100%" height="180px" class="card-img-top"
              alt="Dessert" />
            <div class="card-body text-center">
              <a href="#" class="text-green text-decoration-none d-block fs-4">បង្អែម</a>
              <p class="d-flex justify-content-start">បង្អែម ច្រើនមុខមានសម្រាប់លោកអ្នកទាំងអស់គ្នាក៏មានដែរនៅទីនេះ។</p>
              <div class="text-warning timeSuggest d-flex justify-content-between">
                <p>7:00PM - 9:00PM</p>
                <i class="material-icons">access_time</i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-lg w-100 cardCategory">
          <div class="card shadow" style="height: auto">
            <img src="../../assets/CategoryImages/drink.png" width="100%" height="180px" class="card-img-top"
              alt="Drinks" />
            <div class="card-body text-center">
              <a href="#" class="text-green text-decoration-none d-block fs-4">ភេសជ្ជៈកំប៉ុង</a>
              <p class="d-flex justify-content-start">លោកអ្នកក៏អាចស្វែងរកភេសជ្ជផ្សេងៗនៅទីនេះបានផងដែរ។</p>
              <div class="text-warning timeSuggest d-flex justify-content-between">
                <p>7:00PM - 9:00PM</p>
                <i class="material-icons">access_time</i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--======================= specia menu for today ================= -->
      <div class="container">
        <h1 class="text-green mt-5 text-align-center">មុីនុយពិសេសសម្រាប់ថ្ងៃនេះ</h1>
      </div>
      <div class="row">
        <div
          class="col-md-3 bg-green card border rounded text-center d-flex flex-column justify-content-center align-items-center">
          <div class="card-content">
            <h2>អាហារពេលព្រឹក</h2>
            <p>មុីនុយដ៏ពិសេស​សម្រាប់ព្រឹកនេះកាន់តែពិសេសបែបស្រស់ស្រាយ ជាមួយអាហារដ៏មានរសជាតិឈ្ងុយ ឆ្ងាញ៉ជាប់ចិត្ត</p>
          </div>
        </div>
        <div class="col-md-3 d-flex align-items-center">
          <img src="../../../src/assets/CategoryImages/dessert.png" alt="Dessert Image" class="responsive-img">
        </div>
        <div
          class="col-md-3 bg-success card border rounded text-center d-flex flex-column justify-content-center align-items-center text-white">
          <div class="card-content">
            <h2>អាហារថ្ងៃត្រង់</h2>
            <p>មុីនុយដ៏ពិសស​សម្រាប់ព្រឹកនេះកាន់តែពិសេសបែបស្រស់ស្រាយ ជាមួយអាហារដ៏មានឩជារសឈ្ងុយ ឆ្ងាញ៉ជាប់ចិត្ត</p>
          </div>
        </div>
        <div class="col-md-3 d-flex align-items-center">
          <img src="../../../src/assets/CategoryImages/dessert.png" alt="Dessert Image" class="responsive-img">
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-3 d-flex align-items-center">
          <img src="../../../src/assets/CategoryImages/dessert.png" alt="Dessert Image" class="responsive-img">
        </div>
        <div
          class="col-md-3 bg-green card border rounded text-center d-flex flex-column justify-content-center align-items-center">
          <div class="card-content">
            <h2>អាហារពេលល្ងាច</h2>
            <p>មុីនុយដ៏េពិសេស​សម្រាប់ព្រឹកនេះកាន់តែពិសេសបែបស្រស់ស្រាយ ជាមួយអាហារដ៏មានឩជារសឈ្ងុយ ឆ្ងាញ៉ជាប់ចិត្ត</p>
          </div>
        </div>
        <div class="col-md-3 d-flex align-items-center">
          <img src="../../../src/assets/CategoryImages/dessert.png" alt="Dessert Image" class="responsive-img">
        </div>
        <div
          class="col-md-3 bg-success card border rounded text-center d-flex flex-column justify-content-center align-items-center text-white">
          <div class="card-content">
            <h2>បង្អែម</h2>
            <p>មុីនុយដ៏េពិសេស​សម្រាប់ព្រឹកនេះកាន់តែពិសេសបែបស្រស់ស្រាយ ជាមួយអាហារដ៏មានឩជារសឈ្ងុយ ឆ្ងាញ៉ជាប់ចិត្ត</p>
          </div>
        </div>
      </div>
      <!--======================= list all foods ================= -->
      <div class="containerMid text-center my-5 text-green" style="
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
        ">
        <h1>បញ្ជីមុខម្ហូបសម្រាប់អ្នកទាំងអស់គ្នា</h1>
      </div>
      <div class="containerBottom row overflow-auto" style="height: 60vh">
        <div class="col-md-4 col-lg-3 mb-4">
          <a href="/detail" class="nav-link">
            <div class="card shadow" style="height: 100%">
              <img src="../../assets/ContainerImages/beefSoup.png" width="100%" height="200px" class="card-img-top"
                alt="#" />
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
                    <i class="material-icons text-primary d-flex" style="margin-left: 20px">favoturned_in_not</i>
                  </a>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <a href="/detail" class="nav-link">
            <div class="card shadow" style="height: 100%;">
              <img src="../../assets/ContainerImages/buggur.png" width="100%" height="200px" class="card-img-top"
                alt="Card image" />
              <div class="card-body text-center">
                <h5 class="card-title">Card </h5>
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
                  <a href="#" class="text-decoration-none ml-auto">
                    <i class="material-icons text-primary">turned_in_not</i>
                  </a>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <a href="/detail" class="nav-link">
            <div class="card shadow" style="height: 100%">
              <img src="../../assets/ContainerImages/fryChicken.png" width="100%" height="200px" class="card-img-top"
                alt="#" />
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
                    <i class="material-icons text-primary d-flex" style="margin-left: 20px">favoturned_in_not</i>
                  </a>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <a href="/detail" class="nav-link">
            <div class="card shadow" style="height: 100%">
              <img src="../../assets/ContainerImages/fryFish.png" width="100%" height="200px" class="card-img-top"
                alt="#" />
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
                    <i class="material-icons text-primary d-flex" style="margin-left: 20px">favoturned_in_not</i>
                  </a>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <a href="/detail" class="nav-link">
            <div class="card shadow" style="height: 100%">
              <img src="../../assets/ContainerImages/nhom.png" width="100%" height="200px" class="card-img-top"
                alt="#" />
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
                    <i class="material-icons text-primary d-flex" style="margin-left: 20px">favoturned_in_not</i>
                  </a>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <a href="/detail" class="nav-link">
            <div class="card shadow" style="height: 100%">
              <img src="../../assets/ContainerImages/noodle.png" width="100%" height="200px" class="card-img-top"
                alt="#" />
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
                    <i class="material-icons text-primary d-flex" style="margin-left: 20px">favoturned_in_not</i>
                  </a>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <a href="/detail" class="nav-link">
            <div class="card shadow" style="height: 100%">
              <img src="../../assets/ContainerImages/pizza.png" width="100%" height="200px" class="card-img-top"
                alt="#" />
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
                    <i class="material-icons text-primary d-flex" style="margin-left: 20px">favoturned_in_not</i>
                  </a>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <a href="/detail" class="nav-link">
            <div class="card shadow" style="height: 100%">
              <img src="../../assets/ContainerImages/pork.png" width="100%" height="200px" class="card-img-top"
                alt="#" />
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
                    <i class="material-icons text-primary d-flex" style="margin-left: 20px">favoturned_in_not</i>
                  </a>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <a href="/detail" class="nav-link">
            <div class="card shadow" style="height: 100%">
              <img src="../../assets/ContainerImages/salmon.png" width="100%" height="200px" class="card-img-top"
                alt="#" />
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
                    <i class="material-icons text-primary d-flex" style="margin-left: 20px">favoturned_in_not</i>
                  </a>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <a href="/detail" class="nav-link">
            <div class="card shadow" style="height: 100%">
              <img src="../../assets/ContainerImages/rice.png" width="100%" height="200px" class="card-img-top"
                alt="#" />
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
                    <i class="material-icons text-primary d-flex" style="margin-left: 20px">favoturned_in_not</i>
                  </a>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <a href="/detail" class="nav-link">
            <div class="card shadow" style="height: 100%">
              <img src="../../assets/ContainerImages/buggur.png" width="100%" height="200px" class="card-img-top"
                alt="#" />
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
                    <i class="material-icons text-primary d-flex" style="margin-left: 20px">favoturned_in_not</i>
                  </a>
                </div>
              </div>
            </div>
         </a>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
          <a href="/detail" class="nav-link">
            <div class="card shadow" style="height: 100%">
              <img src="../../assets/ContainerImages/fryChicken.png" width="100%" height="200px" class="card-img-top"
                alt="#" />
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
                    <i class="material-icons text-primary d-flex" style="margin-left: 20px">favoturned_in_not</i>
                  </a>
                </div>
              </div>
            </div>
          </a>
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
  /* Make the image take up the full width of its parent */
  height: 50vh;
}
</style>