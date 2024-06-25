<script setup lang="ts">
import HeaderMenu from '../../../../src/Components/HeaderMenu.vue'
</script>
<template>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <header-menu />
      <div class="container">
        <div class="row mt-4" style="width: 86.8%">
          <div class="col-md-12">
            <h2 class="mb-3 siemreap">បញ្ចីអ្នកប្រើប្រាស់ទាំងអស់</h2>
            <div class="table-responsive">
              <table id="mytable" class="table table-bordred table-striped">
                <thead >
                  <th></th>
                  <th class="siemreap">ឈ្មោះពេញ</th>
                  <th class="siemreap">អ៊ីមែល</th>
                  <th class="siemreap">លេខទូរស័ព្ទ</th>
                  <th class="siemreap">ភេទ</th>
                  <th class="siemreap">ទីកន្លែង</th>
                  <th class="siemreap">លុប</th>
                </thead>
                <tbody>
                  <tr>
                    <td><input type="checkbox" class="checkthis" /></td>
                    <td class="siemreap">Mohsin</td>
                    <td>isometric.mohsin@gmail.com</td>
                    <td>+923335586757</td>
                    <th class="siemreap">ប្រុស</th>
                    <td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
                    
                    <td>
                      <p data-placement="top" data-toggle="tooltip" title="Delete">
                        <button
                          class="btn btn-danger btn-xs "
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
                    <td>+923335586757</td>
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
                    <td>+923335586757</td>
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

              <div class="clearfix"></div>
              <ul class="pagination pull-right">
                <li class="disabled">
                  <a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a>
                </li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                  <a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div
        class="modal fade"
        id="edit"
        tabindex="-1"
        role="dialog"
        aria-labelledby="edit"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
              </button>
              <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Mohsin" />
              </div>
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Irshad" />
              </div>
              <div class="form-group">
                <textarea
                  rows="2"
                  class="form-control"
                  placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"
                ></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning btn-lg" style="width: 100%">
                <span class="glyphicon glyphicon-ok-sign"></span> Update
              </button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div
        class="modal fade"
        id="delete"
        tabindex="-1"
        role="dialog"
        aria-labelledby="edit"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
              </button>
              <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
            </div>
            <div class="modal-body">
              <div class="alert alert-danger">
                <span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to
                delete this Record?
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success">
                <span class="glyphicon glyphicon-ok-sign"></span> Yes
              </button>
              <button type="button" class="btn btn-default" data-dismiss="modal">
                <span class="glyphicon glyphicon-remove"></span> No
              </button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>
  </div>
</template>
<style scoped>
.siemreap {
  font-family: 'Siemreap', cursive;
}
</style>
