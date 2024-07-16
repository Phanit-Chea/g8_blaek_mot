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
            <h3>សេវាកម្ម</h3>
            <p>ផ្តល់ជូនមុខម្ហូប</p>
            <p>រៀបចំកាលវិភាគ</p>
            <p>បង្កើតម្ហូប</p>
           
          </div>
          <div class="col-md mb-5">
            <h4>ទំនាក់ទំ​នង</h4>
            <p>អុីមែល: admin@gmail.com</p>
            <p>លេខទូរស៍ព្ទ: +855 97 631 5667</p>
            <p>LinkedIn: PHANIT CHEA</p>
          </div>
          <div class="col-md mb-5">
            <h4>គុណតម្លែ</h4>
            <p>បញ្ជីមុខម្ហូបអស្ចារ្</p>
            <p>ការណែនាំលម្អិត</p>
            <p>ចំណេញពេលវេលា</p>
            <p>សមាជិកភាពគ្រួសារ</p>
            <p>ការណែនាំផ្ទាល់ខ្លួន</p>
          </div>
          <div class="col-md">
            <h4>តាមដាន ពួកយើងតាមរយះ</h4>
            <input
              type="text"
              class="form-control p-1 w-80"
              placeholder="តើអ្នកចង់ដានពួកយើងតាមរយះអ្វី?"
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
