
<script>
import HeaderMenu from '../../../../src/Components/HeaderMenu.vue'
import axiosInstance from '@/plugins/axios'

export default {
  name: 'list-food',
  components: {
    HeaderMenu
  },
  data() {
    return {
      foods: []
    }
  },
  mounted() {
    this.fetchFood()
  },
  methods: {
    async fetchFood() {
      try {
        const response = await axiosInstance.get('/food/list')
        if (response.data.success) {
          this.foods = response.data.data
          console.log(this.foods)
        }
      } catch (error) {
        console.error('Error fetching food:', error)
      }
    },
    async deleteFood(foodId) {
      try {
        const response = await axiosInstance.delete(`/food/delete/${foodId}`)
        if (response.data.success) {
          this.fetchFood()
        }
      } catch (error) {
        console.error('Error deleting food:', error)
      }
    }
  }
};
</script>
<template>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <header-menu />
      <!-- Table  -->
      <div class="container h-100" style="width: 85.8%">
        <div class="card-container d-flex justify-content-between mt-4 px-4" style="height: 11%">
          <div class="card px-2" style="background-color: #402e9d; width: 18%">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between pt-3 align-items-center">
                <h3 class="card-title siemreap text-white">ពេលព្រឹក</h3>
                <i class="material-icons text-white">light_mode</i>
              </div>
            </div>
            <div class="card-body px-3 pt-0">
              <div class="d-flex flex-column">
                <p class="card-text siemreap text-white">121 មុខ</p>
                <p class="card-text siemreap text-white">ចំនួនមុខម្ហូបពេលព្រឹក</p>
              </div>
            </div>
          </div>
          <div class="card px-2" style="background-color: #402e9d; width: 18%">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between pt-3 align-items-center">
                <h3 class="card-title siemreap text-white">ពេលថ្ងៃ</h3>
                <i class="material-icons text-white">lunch_dining</i>
              </div>
            </div>
            <div class="card-body px-3 pt-0">
              <div class="d-flex flex-column">
                <p class="card-text siemreap text-white">121 មុខ</p>
                <p class="card-text siemreap text-white">ចំនួនមុខម្ហូបពេលថ្ងៃ</p>
              </div>
            </div>
          </div>
          <div class="card px-2" style="background-color: #402e9d; width: 18%">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between pt-3 align-items-center">
                <h3 class="card-title siemreap text-white">ពេលយប់</h3>
                <i class="material-icons text-white">dark_mode</i>
              </div>
            </div>
            <div class="card-body px-3 pt-0">
              <div class="d-flex flex-column">
                <p class="card-text siemreap text-white">121 មុខ</p>
                <p class="card-text siemreap text-white">ចំនួនមុខម្ហូបពេលយប់</p>
              </div>
            </div>
          </div>
          <div class="card px-2" style="background-color: #402e9d; width: 18%">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between pt-3 align-items-center">
                <h3 class="card-title siemreap text-white">នំ</h3>
                <i class="material-icons text-white">bakery_dining</i>
              </div>
            </div>
            <div class="card-body px-3 pt-0">
              <div class="d-flex flex-column">
                <p class="card-text siemreap text-white">121 មុខ</p>
                <p class="card-text siemreap text-white">ចំនួននំទាំងអស់</p>
              </div>
            </div>
          </div>
          <div class="card px-2" style="background-color: #402e9d; width: 18%">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between pt-3 align-items-center">
                <h3 class="card-title siemreap text-white">ភេសជ្ជះ</h3>
                <i class="material-icons text-white">local_drink</i>
              </div>
            </div>
            <div class="card-body px-3 pt-0">
              <div class="d-flex flex-column">
                <p class="card-text siemreap text-white">121 មុខ</p>
                <p class="card-text siemreap text-white">ចំនួនភេសជ្ជះទាំងអស់</p>
              </div>
            </div>
          </div>
        </div>
        <div class="table-container px-4 mt-4">
          <!-- Search Bar -->
          <div class="bg-light d-flex justify-content-between align-items-center shadow py-3">
            <div class="d-flex align-items-center">
              <label for="number" class="ms-4 me-3 p-0 fw-bold text-center siemreap mb-0"
                >បង្ហាញ</label
              >
              <select id="number" class="form-control form-select-sm w-50 text-center">
                <option class="siemreap" value="" selected>ទាំងអស់</option>
                <option class="siemreap" value="10-20">10-20</option>
                <option class="siemreap" value="20-30">20-30</option>
                <option class="siemreap" value="30-40">30-40</option>
                <option class="siemreap" value="40-50">40-50</option>
                <option class="siemreap" value="50-60">50-60</option>
                <option class="siemreap" value="60-70">60-70</option>
                <option class="siemreap" value="70-80">70-80</option>
                <option class="siemreap" value="80-90">80-90</option>
                <option class="siemreap" value="90-100">90-100</option>
              </select>
            </div>
            <form
              class="form-inline d-flex justify-content-end px-4 align-items-center flex-grow-1"
            >
              <div class="input-group">
                <input
                  class="form-control form-control-sm"
                  type="search"
                  placeholder="ស្វែងរក"
                  aria-label="Search"
                />
                <button class="btn btn-primary btn-sm" type="submit">
                  <i class="material-icons text-white">search</i>
                </button>
              </div>
            </form>
            <div>
              <router-link to="/create/food" class="btn btn-primary btn-sm siemreap px-3 py-2 me-3">
                បន្ថែមម្ហូប
              </router-link>
            </div>
          </div>
          <!-- End Search Bar -->
          <table id="example" class="table table-striped table-bordered shadow" style="width: 100%">
            <thead>
              <tr>
                <th class="siemreap text-center fw-bold">ឈ្មោះមុខម្ហូប</th>
                <th class="siemreap text-center fw-bold">ប្រភេទ</th>
                <th class="siemreap text-center fw-bold">ព័ណ៌មានលំអិត</th>
                <th class="siemreap text-center fw-bold">ចំនួនរក្សារទុក</th>
                <th class="siemreap text-center fw-bold">សកម្មភាព</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="food in foods" :key="food.id">
                <td class="siemreap text-center">{{ food.name }}</td>
                <td class="siemreap text-center">{{ food.category_id }}</td>
                <td class="siemreap">{{ food.ingredients }}</td>
                <th class="siemreap text-center">20</th>

                <td class="d-flex justify-content-evenly">
                  <p data-placement="top" data-toggle="tooltip" title="detail">
                    <router-link
                      :to="{ name: 'food-detail', params: { id: food.id } }"
                      class="btn btn-primary btn-xs"
                      data-title="Detail"
                      data-toggle="modal"
                      data-target="#detail"
                    >
                      <span class="glyphicon glyphicon-trash siemreap">លំអិត</span>
                    </router-link>
                  </p>
                  <p data-placement="top" data-toggle="tooltip" title="edit">
                    <router-link 
                       :to="{ name: 'edit-food', params: { id: food.id } }"
                      class="btn btn-primary btn-xs"
                      data-title="Edit"
                      data-toggle="modal"
                      data-target="#edit"
                    >
                      <span class="glyphicon glyphicon-trash siemreap">កែសម្រួល</span>
                    </router-link >
                  </p>
                  <p data-placement="top" data-toggle="tooltip" title="Delete">
                    <button
                      @click="deleteFood(food.id)"
                      class="btn btn-danger btn-xs"
                      data-title="Delete"
                      data-toggle="modal"
                      data-target="#delete"
                    >
                      <span class="glyphicon glyphicon-trash siemreap">លុប</span>
                    </button>
                  </p>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th class="siemreap text-center">ឈ្មោះមុខម្ហូប</th>
                <th class="siemreap text-center">ប្រភេទ</th>
                <th class="siemreap text-center">ព័ណ៌មានលំអិត</th>
                <th class="siemreap text-center">ចំនួនរក្សារទុក</th>
                <th class="siemreap text-center">សកម្មភាព</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped>
.siemreap {
  font-family: 'Siemreap', cursive;
}

.card:hover {
  box-shadow: 0 0 5px #7166da, 0 0 25px #7166da, 0 0 50px #7166da;
  text-shadow: 0 0 5px #7166da;
  cursor: pointer;
}
</style>
