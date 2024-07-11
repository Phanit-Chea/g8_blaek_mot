<template>
    <div class="formContainer">
      <NavbarView></NavbarView>
      <div class="container d-flex justify-content-center align-items-center mt-40 siemreap">
        <section class="aboutUsUpdate">
          <header class="fw-bold text-success fs-3">ផ្លាស់ប្ដូរព័ត៍មានរបស់អ្នក</header>
          <form class="form" @submit.prevent="submitForm" enctype="multipart/form-data">
            <div class="input-box">
              <label>រូបភាពរបស់ស្លាយ</label>
              <input type="file" @change="handleFileUpload($event, 'imageSlide')" />
            </div>
            <button class="submit" type="submit">បង្កើតថ្មី</button>
            <button class="cancel" type="button" @click="cancel">ចាកចេញ</button>
          </form>
        </section>
      </div>
  
      <FooterView></FooterView>
    </div>
  </template>
  
  <script lang="ts">
  import { defineComponent } from 'vue'
  import NavbarView from '../../../Web/Navbar/NavbarView.vue'
  import FooterView from '../../../Web/Footer/FooterView.vue'
  import axiosInstance from '@/plugins/axios'
  
  export default defineComponent({
    components: {
      NavbarView,
      FooterView
    },
    data() {
      return {
        form: {
          imageSlide: null,
        }
      }
    },
    methods: {
      handleFileUpload(event: any, type: string) {
        const file = event.target.files[0]
        
        if (type === 'imageSlide') {
          this.form.imageSlide = file      
        }
      },
      async submitForm() {
        try {
          const formData = new FormData()
          formData.append('imageSlide', this.form.imageSlide)
          console.log(formData);
          
  
          const response = await axiosInstance.post('/aboutUsSlide/create', formData, {
            headers: {
              'Content-Type': 'multipart/form-data'
            }
          })
          console.log('Response:', response)
  
          // Navigate to the About Us page
          this.$router.push('/aboutUs')
        } catch (error) {
          console.error('Error:', error.response || error)
          alert('Form submission failed. Please try again.')
        }
      },
      cancel() {
        this.$router.push('/admin/dashboard')
      }
    }
  })
  </script>
  
  <style scoped>
  .siemreap {
    font-family: 'Siemreap', cursive;
  }
  .container {
    padding-top: 15px;
    height: 100%;
    background-color: rgb(255, 255, 255);
    display: flex;
  }
  .formContainer {
    background-color: rgb(255, 255, 255);
  }
  .form {
    margin-top: 20px;
    padding: 4px;
  }
  .aboutUsUpdate {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: relative;
    width: 50%;
    background-color: white;
    padding: 25px;
    border-radius: 8px;
    margin-top: 5%;
    margin: 5px;
    box-shadow: 0 0 45px rgba(10, 84, 36, 0.537);
  }
  
  .input-box input {
    position: relative;
    height: 40px;
    width: 100%;
    outline: none;
    font-size: 1rem;
    color: #808080;
    border: 1px solid green;
    border-radius: 6px;
    padding: 5px;
    margin: 5px 0px 10px 0px;
    background: white;
  }
  .submit,
  .cancel {
    height: 40px;
    width: 100%;
    color: #000;
    font-size: 1rem;
    font-weight: 400;
    margin-top: 15px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.2s ease;
    background: white;
  }
  
  .submit:hover {
    background-color: green;
    color: white;
  }
  .submit {
    border: 2px solid green;
  }
  .cancel {
    border: 2px solid red;
  }
  
  .cancel:hover {
    background-color: red;
    color: white;
  }
  </style>
  