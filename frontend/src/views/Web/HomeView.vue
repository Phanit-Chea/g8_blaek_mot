<template> 
  <div class="container h-100">
    <main class="container" style="margin-top: 14%">
      <!--========================= banner image ============================ -->
      <div class="containerTop">
        <img src="../../assets/ContainerImages/homePoster.png" alt="homeImage" width="100%" height="600px" />
      </div>
      <!-- =========================categories ========================================= -->
      <div class="row categories mt-5">
        <div class="col-md-3 col-lg w-100 cardCategory">
          <div class="card shadow" style="height: auto">
            <img src="../../assets/CategoryImages/breakfast.png" width="100%" height="180px" class="card-img-top"
              alt="Breakfast" />
            <div class="card-body text-center">
              <a href="#" class="text-green text-decoration-none d-block fs-4">អាហារពេលព្រឹក</a>
              <p class="d-flex justify-content-start">
                អាហារពេលព្រឹក ជាអារហារដ៏សំខាន់បំផុតដែលគ្រប់គ្នាមិនគួរមើលរំលង។
              </p>
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
              <p class="d-flex justify-content-start">
                រីករាយជាមួយអាហារថ្ងៃត្រង់បន្ទាប់ពីការចំណាយពេលមួយព្រឹកមកនេះ។
              </p>
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
              <p class="d-flex justify-content-start">
                អាហារពេលល្ងាច ដ៏ល្អបំផុតសម្រាប់លោកអ្នកនៅទីនេះ។
              </p>
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
              <p class="d-flex justify-content-start">
                បង្អែម ច្រើនមុខមានសម្រាប់លោកអ្នកទាំងអស់គ្នាក៏មានដែរនៅទីនេះ។
              </p>
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
              <p class="d-flex justify-content-start">
                លោកអ្នកក៏អាចស្វែងរកភេសជ្ជផ្សេងៗនៅទីនេះបានផងដែរ។
              </p>
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
            <p>
              មុីនុយពិសេសសម្រាប់ថ្ងៃនេះនុយដ៏ពិសេសជាប់ចិត្តក្នុងព្រឹកនេះកាន់តែពិសេសបែបស្រស់ស្រាយ
              ជាមួយអាហារដ៏មានរសជាតិឈ្ងុយ ឆ្ងាញ៉ជាប់ចិត្ត
            </p>
          </div>
        </div>
        <div class="col-md-3 d-flex align-items-center">
          <img src="../../../src/assets/CategoryImages/dessert.png" alt="Dessert Image" class="responsive-img">
        </div>
        <div
          class="col-md-3 bg-success card border rounded text-center d-flex flex-column justify-content-center align-items-center text-white">
          <div class="card-content">
            <h2>អាហារថ្ងៃត្រង់</h2>
            <p>
              មុីនុយពិសេសសម្រាប់ថ្ងៃរសៀលនេះកាន់តែពិសេសបែបលំហែរពេលចេញពីការងារ
              ជាមួយអាហារដ៏មានឩជារសឈ្ងុយ ឆ្ងាញ៉ជាប់ចិត្ត
            </p>
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
            <p>
              មុីនុយពិសេសសម្រាប់ថ្ងៃនេះពេលកាន់តែពិសេសបែបធម្មជាតិ
              ជាមួយអាហារដ៏មានឩជារសឈ្ងុយ ឆ្ងាញ៉ជាប់ចិត្ត
            </p>
          </div>
        </div>
        <div class="col-md-3 d-flex align-items-center">
          <img src="../../../src/assets/CategoryImages/dessert.png" alt="Dessert Image" class="responsive-img">
        </div>
        <div
          class="col-md-3 bg-success card border rounded text-center d-flex flex-column justify-content-center align-items-center text-white">
          <div class="card-content">
            <h2>បង្អែម</h2>
            <p>
              មុីនុយពិសេសសម្រាប់ថ្ងៃនេះមានបង្អែមកាន់តែពិសេសបែបអ៊ឺរ៉ុប
              ជាមួយអាហារដ៏មានឩជារសឈ្ងុយ ឆ្ងាញ៉ជាប់ចិត្ត
            </p>
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
                  <a href="#" class=" d-flex text-decoration-none ml-3">
                    <span class="d-flex justify-content-center text-dark rateCount">100k</span>
                    <i class="material-icons text-primary d-flex" style="margin-left: 10%">favoturned_in_not</i>
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
                  <a href="#" class=" d-flex text-decoration-none ml-3">
                    <span class="d-flex justify-content-center text-dark rateCount">100k</span>
                    <i class="material-icons text-primary d-flex" style="margin-left: 10%">favoturned_in_not</i>
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
                  <a href="#" class=" d-flex text-decoration-none ml-3">
                    <span class="d-flex justify-content-center text-dark rateCount">100k</span>
                    <i class="material-icons text-primary d-flex" style="margin-left: 10%">favoturned_in_not</i>
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
                  <a href="#" class=" d-flex text-decoration-none ml-3">
                    <span class="d-flex justify-content-center text-dark rateCount">100k</span>
                    <i class="material-icons text-primary d-flex" style="margin-left: 10%">favoturned_in_not</i>
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
                  <a href="#" class=" d-flex text-decoration-none ml-3">
                    <span class="d-flex justify-content-center text-dark rateCount">100k</span>
                    <i class="material-icons text-primary d-flex" style="margin-left: 10%">favoturned_in_not</i>
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
                  <a href="#" class=" d-flex text-decoration-none ml-3">
                    <span class="d-flex justify-content-center text-dark rateCount">100k</span>
                    <i class="material-icons text-primary d-flex" style="margin-left: 10%">favoturned_in_not</i>
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
                  <a href="#" class=" d-flex text-decoration-none ml-3">
                    <span class="d-flex justify-content-center text-dark rateCount">100k</span>
                    <i class="material-icons text-primary d-flex" style="margin-left: 10%">favoturned_in_not</i>
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
                  <a href="#" class=" d-flex text-decoration-none ml-3">
                    <span class="d-flex justify-content-center text-dark rateCount">100k</span>
                    <i class="material-icons text-primary d-flex" style="margin-left: 10%">favoturned_in_not</i>
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
                  <a href="#" class=" d-flex text-decoration-none ml-3">
                    <span class="d-flex justify-content-center text-dark rateCount">100k</span>
                    <i class="material-icons text-primary d-flex" style="margin-left: 10%">favoturned_in_not</i>
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
                  <a href="#" class=" d-flex text-decoration-none ml-3">
                    <span class="d-flex justify-content-center text-dark rateCount">100k</span>
                    <i class="material-icons text-primary d-flex" style="margin-left: 10%">favoturned_in_not</i>
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
                  <a href="#" class=" d-flex text-decoration-none ml-3">
                    <span class="d-flex justify-content-center text-dark rateCount">100k</span>
                    <i class="material-icons text-primary d-flex" style="margin-left: 10%">favoturned_in_not</i>
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
                  <a href="#" class=" d-flex text-decoration-none ml-3">
                    <span class="d-flex justify-content-center text-dark rateCount">100k</span>
                    <i class="material-icons text-primary d-flex" style="margin-left: 10%">favoturned_in_not</i>
                  </a>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <a href="/chat"><i class="bi bi-chat-dots-fill chat"><span class="position-absolute top-5 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2"><span class="visually-hidden">unread messages</span></span></i></a>
    </main>

  </div>
</template>
<script setup lang="ts">

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
  height: 50vh;
}

.chat {
    font-size: 3rem;
    position: fixed;
    bottom: 20px;
    right: 40px;
    color: #66B64A;
    cursor: pointer;
    transition: transform 0.5s;
  }
  .chat:hover{
    transform: scale(1.05) rotate(-5deg);
    color: #62cd3c;
  }
</style>
