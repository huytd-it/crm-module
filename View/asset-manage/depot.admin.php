<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="pages/MVC/view/publish/plugin/switchery/dist/switchery.css" />
  <style>
    .card {
      margin-top: 50px;
      margin-bottom: 50px;

    }

    * {
      font-size: 15px;
    }

    /* On screens that are 992px or less, set the background color to blue */
    @media screen and (max-width: 992px) {}

    /* On screens that are 600px or less, set the background color to olive */
    @media screen and (max-width: 600px) {
      * {
        font-size: 11px;
      }
    }

    select,
    input {
      border: 1px solid gainsboro !important;
      padding: 5px !important;
      min-width: 50px;
      font-size: 15px !important;
    }

    table.dataTable thead th,
    table.dataTable thead td {
      padding: 10px 18px !important;
    }

    table td,
    table th {
      text-align: center;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
      padding: 0 !important;
    }

    .dataTables_length select {
      height: 30px !important;
    }

    .select2-container {
      width: 100% !important;
    }
  </style>


  <div class="modal fade" id="types_modal">

    <div class="modal-dialog">
      <div class="modal-content ">
        <div class="modal-header">
          <h3 class="modal-title" id="staticBackdropLabel">Loại đồng phục</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form id="type_create_form">
            <hr>
            <div class="row">

              <div class="col-lg-12 ">
                <div class="form-group">
                  <label for="pwd">Item</label>
                  <select type="text" style="width:100%" name="uniform_type_id">

                  </select>
                </div>
                <div class="form-group">
                  <label for="pwd">Size</label>
                  <select type="text" style="width:100%" name="uniform_size_id">

                  </select>
                </div>

                <div class="form-group">
                  <label for="pwd">Quantity :</label>
                  <input type="text" class="form-control" name="quantity">
                </div>

              </div>
            </div>
          </form>

        </div>
        <div class="modal-footer">


          <div class="form-group text-center">
            <button type="button" class="btn btn-primary" id="type-create-btn">Lưu</button>

          </div>


        </div>
      </div>
    </div>

  </div>
  <div class="modal fade" id="types_edit_modal" tabindex="-1">

    <div class="modal-dialog ">
      <div class="modal-content ">
        <div class="modal-header">
          <h3 class="modal-title" id="staticBackdropLabel">Loại đồng phục</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form id="type_edit_form">
            <hr>
            <div class="row">

              <div class="col-lg-12 ">
                <div class="form-group">
                  <label for="pwd">Item</label>
                  <select type="text" style="width:100%" name="uniform_type_id">

                  </select>
                </div>
                <div class="form-group">
                  <label for="pwd">Size</label>
                  <select type="text" style="width:100%" name="uniform_size_id">

                  </select>
                </div>

                <div class="form-group">
                  <label for="pwd">Quantity :</label>
                  <input type="text" class="form-control" name="quantity">
                </div>
                <div class="form-group" hidden>
                  <input type="text" class="form-control" name="id">
                </div>
              </div>
            </div>
          </form>

        </div>
        <div class="modal-footer">


          <div class="form-group text-center">
            <button type="button" class="btn btn-primary" id="type-edit-btn">Lưu</button>

          </div>


        </div>
      </div>
    </div>

  </div>


  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-sm-12 ">

        <div class="card">

          <div class="card-header">
            <h3 class="text-center text-uppercase"></h3>
            <button class="btn btn-outline-secondary " id="btn_excel"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
                <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z" />
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
              </svg> Export Excel</button>


            <button class="btn btn-success" data-toggle="modal" data-target="#types_modal">Item</button>

          </div>
          <div class="card-body table-responsive-lg">




            <div class="col-lg-12">
              <div class="table-responsive " style="overflow-x: scroll;min-width:800px; width:100%">
                <table class="table table-hover table-bordered" id="uniform-type" style="overflow:scroll;height:100px">
                  <tfoot class="text-center">
                    <tr>
                      <th scope="col" style="visibility:hidden;">#</th>
                      <th scope="col">Họ và tên</th>
                      <th scope="col">Số điện thoại</th>
                      <th scope="col">Giá</th>
                      <th scope="col">Số lượng</th>
                      <th scope="col">Số lượng</th>
                      <th scope="col" style="visibility:hidden;">Edit</th>
                    </tr>

                  </tfoot>
                  <thead class="text-center">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Tên hàng hóa</th>
                      <th scope="col">Size</th>
                      <th scope="col">Số lượng</th>
                      <th scope="col">Giá</th>
                      <th scope="col">Ngày tạo</th>
                      <th scope="col">Tính năng</th>
                    </tr>
                  </thead>
                  <tbody id="uniform-type-id">
                  </tbody>
                </table>
              </div>
            </div>




          </div>
        </div>
      </div>

    </div>
  </div>



  <script src="pages/MVC/view/publish/plugin/jquery-3.5.1.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.all.min.js"></script>

  <script src="https://unpkg.com/read-excel-file@4.x/bundle/read-excel-file.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="pages/MVC/view/publish/plugin/switchery/dist/switchery.js"></script>
  <script src="pages/MVC/View/publish/js/jquery.controller.js"></script>
  <script>
    $(document).ready(function() {
      const origin = window.location.origin + "/" + window.location.pathname.split('/')[1] + "pages/MVC";
      $.fn.modal.Constructor.prototype._enforceFocus = function() {};
      $('.nav-tabs a').click(function() {
        $(this).tab('show');
        $('.tab-pane').removeClass('active show in');
      })
      $('.close, #close').click(function() {

        $('#hoa_don').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
      });

      initType();


      $('#type-create-btn').click(function() {
        var data = new FormData($('#type_create_form')[0]);
        console.log(window.localStorage);
        data.append('create_by', window.localStorage.getItem('_staff_id'));
        data.append('created_at', (new Date()).toISOString());
        const url = origin + '/Route.php?page=depot&action=create';
        save(url, data, initType);

      })
      $('#type-edit-btn').click(function() {
        var data = new FormData($('#type_edit_form')[0]);
        data.append('update_by', window.localStorage.getItem('_staff_id'));
        data.append('updated_at', (new Date()).toISOString());
        const url = origin + '/Route.php?page=depot&action=update';
        save(url, data, initType)
      })






      function initType() {
        var uniformTypesUrl = origin + '/Route.php?page=depot&action=getAll';
        window.onload = getData(uniformTypesUrl, function(response) {
          var data = JSON.parse(response).data;
          showUniformType(data);
        });
        var printSelectTag = function(result) {
          var out = '';
          result.forEach(el => {
            out += '<option value="' + el.id + '">' + el.name + '</option>';
          })
          return out;
        }
        var uniformTypesUrl = origin + '/Route.php?page=uniform&action=getSize';
        window.onload = getData(uniformTypesUrl, function(response) {

          var data = JSON.parse(response).data;


          $('select[name="uniform_size_id"]').each(function(num, el) {
            // $(el).empty();
            $(el).append(printSelectTag(data));
            // $(el).val($(el).attr('data-value'));
          })
        });
        var uniformTypesUrl = origin + '/Route.php?page=uniform&action=getUniformType';
        window.onload = getData(uniformTypesUrl, function(response) {

          var data = JSON.parse(response).data;
          $('select[name="uniform_type_id"]').each(function(num, el) {
            // $(el).empty();
            $(el).append(printSelectTag(data));
            // $(el).val($(el).attr('data-value'));
          })

        });

      }

      function showUniformType(data) {
        if (data) {
          let out = "";
          for (var i = 0; i < data.length; i++) {
            out += '<tr>'
            out += '<td>' + (i + 1) + '</td>';
            out += '<td>' + data[i].type_name + '</td>';
            out += '<td>' + data[i].size_name + '</td>';
            out += '<td>' + data[i].quantity + '</td>';
            out += '<td>' + formatPrice(data[i].price) + '</td>';
            out += '<td>' + data[i].created_at + '</td>';
            out += '<td><button type="button"  data-toggle="modal" data-target="#types_edit_modal" class="btn btn-warning btn-edit-type" ' +
              'data-price="' +
              data[i].price + '" data-type="' + data[i].uniform_type_id + '" data-size="' + data[i].uniform_size_id + '" data-quantity="' + data[i].quantity +
              '" data-id="' + data[i].id +
              '" data-short_name="' + data[i].short_name + '">Edit</button><button type="button"' +
              ' data-id="' + data[i].id + '" class="btn btn-danger btn-delete-type" >Delete</button></td>';

            out += '</tr>'
          }
          $(document).on('click', '.btn-edit-type', function() {
            var data = {
              type_id: $(this).attr('data-type'),
              size_id: $(this).attr('data-size'),
              id: $(this).attr('data-id'),
              quantity: $(this).attr('data-quantity')
            }
          
            const inputs = $('#type_edit_form :input ');
    
            const values = this;

            inputs.each(function() {
            
              $(this).val($(values).attr('data-' + $(this).attr('name')));
            })
            $('#type_edit_form select[name=uniform_size_id]').val(data.size_id);
            $('#type_edit_form select[name=uniform_type_id]').val(data.type_id);
          });
          $(document).on('click', '.btn-delete-type', function() {

            var data = new FormData();
            data.append('id', $(this).attr('data-id'));
            data.append('deleted_at', (new Date()).toISOString());
            const url = origin + '/Route.php?page=depot&action=update';
            deleteModel(url, data, initType);
            
          });
          setUpDataTable(out, '#uniform-type-id', '#uniform-type');
        }
      }

      function formatPrice(price) {
        return Intl.NumberFormat('vn-VN').format(price);
      }


      function setUpDataTable(out, tbody_id = '#row-id', table_id = '#table') {

        $(table_id).DataTable().clear().destroy();
        $(tbody_id).append(out);
        $(table_id).DataTable({
          retrieve: true,
          "pageLength": 25,
          initComplete: function() {
            this.api().columns().every(function() {
              var column = this;
              var select = $('<select><option value="">All</option></select>')
                .appendTo($(column.footer()).empty())
                .on('change', function() {
                  var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                  );

                  column
                    .search(val ? '^' + val + '$' : '', true, false)
                    .draw();
                });

              column.data().unique().sort().each(function(d, j) {

                select.append('<option value="' + d + '">' + d +
                  '</option>')
              });
            });
          }
        });

        $('th > select').select2();
      }
    });
  </script>