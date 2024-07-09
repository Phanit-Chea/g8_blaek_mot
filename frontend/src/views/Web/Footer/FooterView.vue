<template>
  <div class="container" style="background-color: #2a581a; margin-top: 20px; width: 100%;">
    <footer class="text-light">
      <div class="pt-3">
        <img
          src="../../../assets/FooterImages/logo.png"
          alt="homeImage"
          width="16%"
          height="80px"
        />
      </div>
      <hr />
      <div class="container mt-3">
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
              placeholder="What would you like to eat?"
              aria-label="Search"
            />
            <ul class="list-unstyled d-flex justify-content-md-start mt-3 gap-2">
              <li class="ms-3">
                <a href="https://www.facebook.com/yourpage" class="socialIcon"
                  ><img
                    src="../../../assets/FooterImages/facebook.png"
                    alt="Facebook"
                    class="img-fluid"
                    style="width: 35px; height: 35px; border-radius: 100%"
                /></a>
              </li>
              <li class="ms-3">
                <a href="https://x.com/home" class="socialIcon"
                  ><img
                    src="../../../assets/FooterImages/twitter.png"
                    alt="Twitter"
                    class="img-fluid"
                    style="width: 35px; height: 35px; border-radius: 100%"
                /></a>
              </li>
              <li class="ms-3">
                <a href="https://www.instagram.com" class="socialIcon"
                  ><img
                    src="../../../assets/FooterImages/instagram.png"
                    alt="Instagram"
                    class="img-fluid"
                    style="width: 35px; height: 35px; border-radius: 100%"
                /></a>
              </li>
              <li class="ms-3">
                <a href="https://www.linkedin.com/feed/" class="socialIcon"
                  ><img
                    src="../../../assets/FooterImages/linkedIn.png"
                    alt="LinkedIn"
                    class="img-fluid"
                    style="width: 35px; height: 35px; border-radius: 100%"
                /></a>
              </li>
              <li class="ms-3">
                <a href="https://www.youtube.com" class="socialIcon"
                  ><img
                    src="../../../assets/FooterImages/youtube.png"
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
</template>
<script>
export default {
  name: 'FooterView'
}
</script>
<style scoped>
  p{
    color: white;
  }
</style>
