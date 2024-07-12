<template>
  <NavbarAdmin />
  <div class="container siemreap">
    <div class="sideBar">
      <HeaderMenu class="headerMenu"></HeaderMenu>
    </div>
    <section class="aboutUsUpdate">
      <header class="fw-bold text-success fs-3">ផ្លាស់ប្ដូរព័ត៍មានរបស់អ្នក</header>
      <form class="form" @submit.prevent="submitForm" enctype="multipart/form-data" method="post">
        <div class="input-box">
          <label>រូបភាពរបស់ស្លាយ</label>
          <input type="file" @change="handleFileUpload($event, 'imageSlide')" />
        </div>
        <button class="submit" type="submit">បង្កើតថ្មី</button>
        <button class="cancel" type="button" @click="cancel">ចាកចេញ</button>
      </form>
    </section>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import HeaderMenu from '../../../../Components/HeaderMenu.vue'
import NavbarAdmin from '@/Components/NavbarAdmin.vue'
import axiosInstance from '@/plugins/axios'

export default defineComponent({
  components: {
    NavbarAdmin,
    HeaderMenu
  },
  data() {
    return {
      form: {
        imageSlide: null
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
        if (this.form.imageSlide) {
          formData.append('imageSlide', this.form.imageSlide)
        } else {
          alert('Please select an image file.')
          return
        }

        const response = await axiosInstance.post('/aboutUsSlide/create', formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        })
        console.log('Response1:', response)

        // Navigate to the About Us page
        this.$router.push('/aboutus')
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
  padding-top: 7%;
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: rgb(255, 255, 255);
  margin: 0;
  gap: 20px;
}
.sideBar {
  display: flex;
  width: 20%;
  padding-left: 0;
  margin-left: -15px;
}
.aboutUsUpdate {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  position: relative;
  width: 50%;
  margin-right: 220px;
  background-color: white;
  border-radius: 8px;
  box-shadow: 0 0 45px rgba(10, 84, 36, 0.537);
}
.form {
  padding: 4px;
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
