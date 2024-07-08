<template>
  <div class="formAddFood">
    <div class="container shadow w-100">
      <div class="col-8 m-auto p-3">
        <div class="card mb-3">
          <img
            :src="imagePreview || '../../../assets/FoodDetail/food3.jpg'"
            class="card-img-top"
            alt="Food Image"
            style="height: 40vh; object-fit: cover"
          />
          <form class="card-body" @submit="createFood">
            <h3 class="card-title text-success m-2 siemreap">បន្ថែមម្ហូប</h3>
            <div class="addFood" id="addForm" style="margin-left: 13px; margin-right: 13px">
              <div class="food-name row g-5" style="margin-bottom: 3px">
                <div class="col-md-6">
                  <label for="inputName" class="form-label siemreap">ឈ្មោះមុខម្ហូប</label>
                  <input
                    type="text"
                    class="form-control"
                    id="inputName"
                    v-model="food.name"
                    required
                    aria-label="Food Name"
                  />
                </div>
                <div class="col-md-6">
                  <label for="inputCookingTime" class="form-label siemreap">រយះពេលចំអិន</label>
                  <input
                    type="text"
                    class="form-control"
                    id="inputCookingTime"
                    v-model="food.cooking_time"
                    required
                    aria-label="Cooking Time"
                  />
                </div>
              </div>
              <div class="food-image row g-5" style="margin-bottom: 5px">
                <div class="col-md-6">
                  <label for="formFile" class="form-label siemreap">បញ្ចូលរូបម្ហូប</label>
                  <input
                    class="form-control"
                    type="file"
                    id="formFile"
                    @change="handleFileUpload"
                    aria-label="Food Image"
                  />
                </div>
                <div class="col-md-6">
                  <label for="videoUrl" class="form-label siemreap">វីដេអូលីង</label>
                  <input
                    class="form-control"
                    type="url"
                    id="videoUrl"
                    v-model="food.video_url"
                    required
                    aria-label="Video URL"
                  />
                </div>
              </div>
              <div class="row g-5 "  >
                <div class="w-50 align-items-center">
                  <label for="category" class="form-label mb-0  fw-bold text-center siemreap"
                    >ប្រភេទ</label
                  >
                  <select id="category" class=" mt-3 py-2 form-control form-select-sm  text-center">
                    <option class="siemreap" value="" selected>ជ្រើសប្រភេទម្ហូប</option>
                    <option class="siemreap" value="">ពេលព្រឹក</option>
                    
                  </select>
                </div>

                <div class="howToCook col-md-6 w-50 " >
                  <label for="ingredients" class="fw-bold siemreap ">គ្រឿងផ្សំ</label>
                  <input
                    type="text"
                    class="form-control ms-0 mt-3"
                    id="ingredients"
                    style="margin-left: 10px"
                    v-model="food.ingredients"
                    required
                    aria-label="Ingredients"
                  />
                </div>
              </div>

              <div class="buttonAdd">
                <button
                  type="button"
                  id="btn_cancel"
                  class="btn btn-danger my-3 w-24"
                  title="Cancel"
                  @click="resetForm"
                >
                  Cancel
                </button>
                <button
                  type="submit"
                  id="btn_create"
                  class="btn btn-success my-3"
                  title="Create Food"
                >
                  Create Food
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axiosInstance from '@/plugins/axios'

export default {
  name: 'create-food',
  data() {
    return {
      food: {
        category_id: '1',
        name: '',
        image: null,
        video_url: '',
        cooking_time: '',
        ingredients: ''
      },
      imagePreview: null
    }
  },
  methods: {
    handleFileUpload(event) {
      this.food.image = event.target.files[0]
      this.imagePreview = URL.createObjectURL(event.target.files[0])
    },
    async createFood(event) {
      event.preventDefault()

      const formData = new FormData()
      formData.append('category_id', this.food.category_id)
      formData.append('name', this.food.name)
      formData.append('image', this.food.image)
      formData.append('video_url', this.food.video_url)
      formData.append('cooking_time', this.food.cooking_time)
      formData.append('ingredients', this.food.ingredients)

      try {
        await axiosInstance.post('/food/create', formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        })
        this.resetForm()
        this.$router.push('/')
      } catch (error) {
        console.error('Error creating food:', error)
        alert('Failed to create food. Please try again.')
      }
    },
    resetForm() {
      this.food = {
        category_id: '1',
        name: '',
        image: null,
        video_url: '',
        cooking_time: '',
        ingredients: ''
      }
      this.imagePreview = null
    }
  }
}
</script>

<style scoped>
.formAddFood {
  background-color: white;
}
.formAddFood > h4 {
  color: #256c0b;
  position: relative;
  left: 20px;
}
.container {
  background: rgba(227, 227, 227, 0.74);
  width: 100%;
}
.image-food img {
  margin: 0;
  display: block;
  width: 100%;
  height: 400px;
}

.card {
  background-color: #f8f9fa;
  border: 1px solid #dee2e6;
  border-radius: 0.25rem;
  margin-bottom: 1px;
}
.form-control {
  margin-top: 5px;
}

#btn_create {
  margin: 20px;
}
.buttonAdd {
  display: flex;
  justify-content: end;
}
.siemreap {
  font-family: 'Siemreap', cursive;
}
</style>