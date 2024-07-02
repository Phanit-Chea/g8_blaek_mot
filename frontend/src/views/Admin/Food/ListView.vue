<script setup lang="ts">
import HeaderMenu from '../../../../src/Components/HeaderMenu.vue'
</script>
<template>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <header-menu />
      <!-- Table  -->
      <div class="container h-100" style="width: 86.8%">
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
                <p class="card-text siemreap text-white">ចំនួនមុខម្ហូបពេលព្រឹកទាំងអស់</p>
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
                <p class="card-text siemreap text-white">ចំនួនមុខម្ហូបពេលថ្ងៃទាំងអស់</p>
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
                <p class="card-text siemreap text-white">ចំនួនមុខម្ហូបពេលយប់ទាំងអស់</p>
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
        <div class="table-container px-4  mt-4 ">
          <!-- Search Bar -->
          <div class=" bg-light d-flex justify-content-between shadow">
            <div class="d-flex w-50 py-2 lign-items-center" >
              <p class=" ms-5 me-3 p-0 fw-bold text-center siemreap ">បង្ហាញ</p>
              <select id="number" class="w-25 form-control py-2 text-center">
                <option class="siemreap" value="" selected>ទាំងអស់</option>
                <option class="siemreap" value="10-20">10-20</option>
                <option class="siemreap" value="20-30">20-30</option>
                <option class="siemreap" value="20-30">30-40</option>
                <option class="siemreap" value="20-30">40-50</option>
                <option class="siemreap" value="20-30">50-60</option>
                <option class="siemreap" value="20-30">50-60</option>
                <option class="siemreap" value="20-30">60-70</option>
                <option class="siemreap" value="20-30">70-80</option>
                <option class="siemreap" value="20-30">80-90</option>
                <option class="siemreap" value="20-30">90-100</option>
              </select>
            </div>
            <form class="form-inline d-flex justify-content-end pe-4 w-50 align-items-center" style="margin-left:20%">
              <input class="form-control mr-sm-2 w-50 py-2" type="search" placeholder="ស្វែងរក" aria-label="Search">
              <button class="btn bg-primary py-1 px-2" type="submit">
                <i class="material-icons text-white">search</i>
              </button>
            </form>
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
              <tr>
                <td class="siemreap text-center">ឆាពងទា</td>
                <td class="siemreap text-center">ពេលព្រឹក</td>
                <td class="siemreap">ឆាពងទា គឺជាមុខម្ហួបដ៏ពេញនិយមបំផុតសម្រាប់យុវវ័យសម័យថ្មី</td>
                <th class="siemreap text-center">20</th>

                <td class="d-flex justify-content-evenly">
                  <p data-placement="top" data-toggle="tooltip" title="detail">
                    <button
                      class="btn btn-primary btn-xs"
                      data-title="Detail"
                      data-toggle="modal"
                      data-target="#detail"
                    >
                      <span class="glyphicon glyphicon-trash siemreap">លំអិត</span>
                    </button>
                  </p>
                  <p data-placement="top" data-toggle="tooltip" title="edit">
                    <button
                      class="btn btn-primary btn-xs"
                      data-title="Edit"
                      data-toggle="modal"
                      data-target="#edit"
                    >
                      <span class="glyphicon glyphicon-trash siemreap">កែសម្រួល</span>
                    </button>
                  </p>
                  <p data-placement="top" data-toggle="tooltip" title="Delete">
                    <button
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
              <tr>
                <td class="siemreap text-center">ឆាពងទា</td>
                <td class="siemreap text-center">ពេលព្រឹក</td>
                <td class="siemreap">ឆាពងទា គឺជាមុខម្ហួបដ៏ពេញនិយមបំផុតសម្រាប់យុវវ័យសម័យថ្មី</td>
                <th class="siemreap text-center">20</th>

                <td class="d-flex justify-content-evenly">
                  <p data-placement="top" data-toggle="tooltip" title="detail">
                    <button
                      class="btn btn-primary btn-xs"
                      data-title="Detail"
                      data-toggle="modal"
                      data-target="#detail"
                    >
                      <span class="glyphicon glyphicon-trash siemreap">លំអិត</span>
                    </button>
                  </p>
                  <p data-placement="top" data-toggle="tooltip" title="edit">
                    <button
                      class="btn btn-primary btn-xs"
                      data-title="Edit"
                      data-toggle="modal"
                      data-target="#edit"
                    >
                      <span class="glyphicon glyphicon-trash siemreap">កែសម្រួល</span>
                    </button>
                  </p>
                  <p data-placement="top" data-toggle="tooltip" title="Delete">
                    <button
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
              <tr>
                <td class="siemreap text-center">ឆាពងទា</td>
                <td class="siemreap text-center">ពេលព្រឹក</td>
                <td class="siemreap">ឆាពងទា គឺជាមុខម្ហួបដ៏ពេញនិយមបំផុតសម្រាប់យុវវ័យសម័យថ្មី</td>
                <th class="siemreap text-center">20</th>

                <td class="d-flex justify-content-evenly">
                  <p data-placement="top" data-toggle="tooltip" title="detail">
                    <button
                      class="btn btn-primary btn-xs"
                      data-title="Detail"
                      data-toggle="modal"
                      data-target="#detail"
                    >
                      <span class="glyphicon glyphicon-trash siemreap">លំអិត</span>
                    </button>
                  </p>
                  <p data-placement="top" data-toggle="tooltip" title="edit">
                    <button
                      class="btn btn-primary btn-xs"
                      data-title="Edit"
                      data-toggle="modal"
                      data-target="#edit"
                    >
                      <span class="glyphicon glyphicon-trash siemreap">កែសម្រួល</span>
                    </button>
                  </p>
                  <p data-placement="top" data-toggle="tooltip" title="Delete">
                    <button
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
              <tr>
                <td class="siemreap text-center">ឆាពងទា</td>
                <td class="siemreap text-center">ពេលព្រឹក</td>
                <td class="siemreap">ឆាពងទា គឺជាមុខម្ហួបដ៏ពេញនិយមបំផុតសម្រាប់យុវវ័យសម័យថ្មី</td>
                <th class="siemreap text-center">20</th>

                <td class="d-flex justify-content-evenly">
                  <p data-placement="top" data-toggle="tooltip" title="detail">
                    <button
                      class="btn btn-primary btn-xs"
                      data-title="Detail"
                      data-toggle="modal"
                      data-target="#detail"
                    >
                      <span class="glyphicon glyphicon-trash siemreap">លំអិត</span>
                    </button>
                  </p>
                  <p data-placement="top" data-toggle="tooltip" title="edit">
                    <button
                      class="btn btn-primary btn-xs"
                      data-title="Edit"
                      data-toggle="modal"
                      data-target="#edit"
                    >
                      <span class="glyphicon glyphicon-trash siemreap">កែសម្រួល</span>
                    </button>
                  </p>
                  <p data-placement="top" data-toggle="tooltip" title="Delete">
                    <button
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
