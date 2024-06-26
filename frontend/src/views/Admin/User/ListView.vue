<script setup lang="ts">
import HeaderMenu from '../../../../src/Components/HeaderMenu.vue'
</script>
<template>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <header-menu />
      <div class="container px-4" style="width: 86.8%">
        <div class="row mt-4">
          <div class="col-md-12">
            <h2 class="mb-3 siemreap">បញ្ចីអ្នកប្រើប្រាស់ទាំងអស់</h2>
            <div class="table-responsive">
              <!-- Search Bar -->
              <div class="bg-light d-flex justify-content-between shadow">
                <div class="d-flex w-50 py-2 lign-items-center">
                  <p class="ms-5 me-3 p-0 fw-bold text-center siemreap">បង្ហាញ</p>
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
                <form
                  class="form-inline d-flex justify-content-end pe-4 w-50 align-items-center"
                  style="margin-left: 20%"
                >
                  <input
                    class="form-control mr-sm-2 w-50 py-2"
                    type="search"
                    placeholder="ស្វែងរក"
                    aria-label="Search"
                  />
                  <button class="btn bg-primary py-1 px-2" type="submit">
                    <i class="material-icons text-white">search</i>
                  </button>
                </form>
              </div>
              <!-- End Search Bar -->
              <hr class="p-0 m-0" />
              <table id="mytable" class="table table-bordred table-striped shadow">
                <thead>
                  <th class="pt-5"></th>
                  <th class="siemreap fw-bold text-center">ឈ្មោះពេញ</th>
                  <th class="siemreap fw-bold text-center">អ៊ីមែល</th>
                  <th class="siemreap fw-bold text-center">លេខទូរស័ព្ទ</th>
                  <th class="siemreap fw-bold text-center">ភេទ</th>
                  <th class="siemreap fw-bold text-center">ទីកន្លែង</th>
                  <th class="siemreap fw-bold text-center">លុប</th>
                </thead>
                <tbody>
                  <tr>
                    <td><input type="checkbox" class="checkthis" /></td>
                    <td class="siemreap">Mohsin</td>
                    <td>isometric.mohsin@gmail.com</td>
                    <td class="text-center">+923335586757</td>
                    <th class="siemreap">ប្រុស</th>
                    <td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>

                    <td>
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
                    <td><input type="checkbox" class="checkthis" /></td>
                    <td>Mohsin</td>
                    <td>isometric.mohsin@gmail.com</td>
                    <td class="text-center">+923335586757</td>
                    <th>ប្រុស</th>
                    <td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>

                    <td>
                      <p data-placement="top" data-toggle="tooltip" title="Delete">
                        <button
                          class="btn btn-danger btn-xs"
                          data-title="Delete"
                          data-toggle="modal"
                          data-target="#delete"
                        >
                          <span class="glyphicon glyphicon-trash">លុប</span>
                        </button>
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td><input type="checkbox" class="checkthis" /></td>
                    <td>Mohsin</td>
                    <td>isometric.mohsin@gmail.com</td>
                    <td class="text-center">+923335586757</td>
                    <th>ប្រុស</th>
                    <td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>

                    <td>
                      <p data-placement="top" data-toggle="tooltip" title="Delete">
                        <button
                          class="btn btn-danger btn-xs"
                          data-title="Delete"
                          data-toggle="modal"
                          data-target="#delete"
                        >
                          <span class="glyphicon glyphicon-trash">លុប</span>
                        </button>
                      </p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped>
.siemreap {
  font-family: 'Siemreap', cursive;
}
</style>
