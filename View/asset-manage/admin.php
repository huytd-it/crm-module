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
      min-height: 30px;
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

    .select2-container {
      width: 100% !important;
    }
  </style>

  <div class="modal fade" id="hoa_don" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">
      <div class="modal-content ">
        <div class="modal-header">
          <h3 class="modal-title" id="staticBackdropLabel">UNIFORM</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <table class="table table-border">
            <thead>
              <tr>
                <th>Số thứ tự <br> No. </th>
                <th>Tên hàng <br> Items</th>
                <th>Số lượng <br> Quantity</th>
                <th>Đơn giá <br> Unit price</th>
                <th>Thành tiền<br> Amount</th>
                <th>Size <br> Kích cỡ</th>
              </tr>
            </thead>
            <tbody id="hoa_don_tbody">

            </tbody>
            <tfoot>
              <tr>
                <td colspan="4" id="total"></td>
                <td colspan="2"></td>
              </tr>
            </tfoot>
          </table>
          <form id="student_bills">
            <hr>
            <div class="row">
              <div class="col-lg-6" style="margin:0 auto" id="student_bills_hell">

                <div class="form-group">
                  <label for="usr">From Deliver:</label>
                  <input type="text" class="form-control" name="from_deliver">
                </div>
                <div class="form-group">
                  <label for="usr">Deliver:</label>
                  <input type="text" class="form-control" name="deliver">
                </div>
                <div class="form-group">
                  <label for="pwd">Receiver:</label>
                  <input type="text" class="form-control" name="receiver">
                </div>
                <div class="form-group">
                  <label>Payment: </label>
                  <span for="pwd">Cash</span>
                  <input type="checkbox" class="form-control" name="payment" id="payment">
                  <span for="pwd">Bank</span>
                </div>
                <div class="form-group" hidden>
                  <label for="pwd">ID:</label>
                  <input type="text" class="form-control" name="id">
                </div>
                <div class="form-group text-center">
                  <button type="button" class="btn btn-primary" id="duyet-btn">Duyệt</button>

                </div>

              </div>

            </div>
          </form>

        </div>
        <div class="modal-footer">


          <div class="row">

            <div class="col-lg-12">

              <button type="button" class="btn btn-secondary " data-dismiss="modal " id="close">Close</button>
            </div>
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
            <!-- <button class="btn btn-outline-info " id="import_excel"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
                <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z" />
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
              </svg> Import Excel</button> -->
            <!-- <input type="file" id="input_excel" style="width:100%"> -->
            <!-- <form id="student_bills_main">
              <div class="row">
                <div class="form-group col-sm-3">
                  <label for="usr">From Deliver:</label>
                  <input type="text" class="form-control" name="from_deliver">
                </div>
                <div class="form-group col-sm-3">
                  <label for="usr">Deliver:</label>
                  <input type="text" class="form-control" name="deliver">
                </div>

              </div>

            </form>
 -->

          </div>
          <div class="card-body table-responsive-lg">

            <br>
            <div class="table-responsive " style="overflow-x: scroll;min-width:800px; width:100%">
              <table class="table table-hover table-bordered" id="table" style="overflow:scroll;height:100px">
                <tfoot class="text-center">
                  <tr>
                    <th scope="col" style="visibility:hidden;">#</th>
                    <th scope="col" style="visibility:hidden; width:100px">Họ và tên</th>

                    <th scope="col" style="visibility:hidden;">Số điện thoại</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Lớp</th>
                    <th scope="col">Thanh toán</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col" style="visibility:hidden;">Edit - Print - Delete</th>
                    <th scope="col" style="visibility:hidden;">Xác nhận</th>


                  </tr>

                </tfoot>
                <thead class="text-center">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Họ và tên</th>

                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Lớp</th>
                    <th scope="col">Thanh toán</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Edit - Print - Delete</th>
                    <th scope="col">Xác nhận</th>


                  </tr>

                </thead>

                <tbody id="row-id">

                </tbody>
              </table>
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
  <script src="pages/MVC/view/publish/plugin/switchery/dist/switchery.js"></script>
  <script src="https://unpkg.com/read-excel-file@4.x/bundle/read-excel-file.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
      $.fn.modal.Constructor.prototype._enforceFocus = function() {};
      var origin = window.location.origin + "/" + window.location.pathname.split('/')[1] + "/pages/MVC";
      fetchAll();
      var elem = document.querySelector('input[type=checkbox]');

      var init = new Switchery(elem, {
        size: 'small',
        color: '#007bff',
        secondaryColor: '#e83e8c'
      });
      $('.close, #close').click(function() {

        $('#hoa_don').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
      });
      var input = document.getElementById('input_excel')

      // input.addEventListener('change', function() {

      //   readXlsxFile(input.files[0]).then(function(rows) {
      //     const data = Object.assign({}, rows);


      //     $.ajax({
      //       method: "POST",
      //       url: origin + "/Route.php?page=uniform&action=import",
      //       data: {
      //         h: 1222
      //       },
      //       contentType: false,
      //       mimeType: "multipart/form-data",
      //       processData: false,
      //       cache: false,
      //       success: function(response) {

      //         var data = JSON.parse(response);
      //         if (data.status == 200)
      //           Swal.fire({
      //             position: 'center',
      //             icon: 'success',
      //             title: data.msg,
      //             showConfirmButton: false,
      //             timer: 3000
      //           });
      //         else {
      //           Swal.fire({
      //             position: 'center',
      //             icon: 'error',
      //             title: data.msg,
      //             showConfirmButton: false,
      //             timer: 3000
      //           });
      //         }

      //       },
      //       error: function(response) {

      //       }
      //     });
      //   })
      // })


      $('#duyet-btn').click(function() {

        var data = new FormData($('#student_bills')[0]);
        data.append('payment', $('#payment').prop('checked') ? 1 : 0);

        updateData(data);

      });

      function deleteData(data) {
        var id = data.id;
        $.ajax({
          method: "POST",
          url: origin + "/Route.php?page=uniform&action=delete",
          data: data,
          success: function(response) {

            var data = JSON.parse(response);
            if (data.status == 200) {
              Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Đã xóa',
                text: data.msg,
                showConfirmButton: false,
                timer: 3000
              });
              $("#student-" + id).remove();
            } else {
              Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Lỗi',
                text: data.msg,
                showConfirmButton: false,
                timer: 3000
              });
            }

          },
          error: function(response) {

          }
        });

      }

      function updateData(data) {

        $.ajax({
          type: "POST",
          url: origin + "/Route.php?page=uniform&action=updateStudentBill",
          data: data,
          processData: false,
          contentType: false,
          success: function(response) {
           
            var data = JSON.parse(response);
            if (data.status == 200) {
              Swal.fire({
                position: 'center',
                icon: 'success',
                title: data.msg,
                showConfirmButton: false,
                timer: 3000
              });
              fetchAll();
            } else {
              Swal.fire({
                position: 'center',
                icon: 'error',
                title: data.msg,
                showConfirmButton: false,
                timer: 3000
              });
            }

          },
          error: function(response) {
            console.log(response);
          }
        });
      }
      function updateDataStatus(data) {

        $.ajax({
          type: "POST",
          url: origin + "/Route.php?page=uniform&action=updateStudentBill",
          data: data,

          success: function(response) {
           
          
              fetchAll();
         

          },
          error: function(response) {
            console.log(response);
          }
        });
      }

      function fetchAll() {
        $.ajax({
          method: "GET",
          url: origin + "/Route.php?controller=HocBongController&action=getAll&page=uniform",
          success: function(response) {
            let result = JSON.parse(response);
            let data = result.data;
            let config = result.config;
            showList(data, config);

            $(document).on('click', '.btn-print', function() {
              window.open('pages/MVC/View/asset-manage/form-print.php?view&mode=view&id=' + $(this).attr('id'), 'width:1000',
                'height:1000')
            });

            $(document).on('click', '.btn-warning', function() {


              $('#hoa_don').modal('show');
              getBill($(this).attr('id'), $(this).attr('data-id'))


            });
            $(document).on('click', '.btn-delete', function() {

              Swal.fire({
                title: 'Bạn chắc chứ?',
                text: "Khi bạn xóa sẽ ko khôi phục lại được dữ liệu",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý, xóa đi!'
              }).then((result) => {
                if (result.isConfirmed) {
                  var data = {
                    'id': $(this).attr('data-id'),
                    'update_by': window.localStorage.getItem('_user_name'),
                    'deleted_at': (new Date()).toISOString(),
                  };
                  deleteData(data);
                }
              })


            });
            $(document).on('change', '.btn-status', function() {
              if ($(this).val() > -1) {
                const data = {
                  id: $(this).attr('data-id'),
                  status: $(this).val(),
                  update_by: window.localStorage.getItem('_user_name'),
                  updated_at: (new Date()).toISOString(),

                }
             
                updateDataStatus(data);
              }


            })
            $('table a').click(function() {
              if ($(this).attr('id') != " ")
                window.open(config.origin + "/" + $(this).attr('id'), 'width:1000', 'height:1000');
              else {
                alert('File không tồn tại');
              }

            })


          },
          error: function(response) {
            $('.alert h3').text("Errors");
            $('.alert').css("color", "red");
            $('.alert i').removeClass('far fa-check-circle').addClass('fas fa-exclamation-circle');
            $('.alert').toggleClass("hide");
          }
        });
      }

      function getBill(student_id, id) {

        $.ajax({
          method: "GET",
          url: origin + "/Route.php?page=uniform&action=getBill&id=" + student_id,
          success: function(response) {

            var result = JSON.parse(response).data;

            addBill(result, id);


          },
          error: function(response) {

          }


        });

      }

      function getSize() {

        $.ajax({
          method: "GET",
          url: origin + "/Route.php?page=uniform&action=getSize",
          success: function(response) {

            var result = JSON.parse(response).data;
         
            var out = '';
           
            result.forEach(el => {
              out += '<option value="' + el.id + '">' + el.name + '</option>';
            })
           
            $('select[name="size"]').append(out);


            $('select[name="size"]').each(function(num, el) {
              $(el).val($(el).attr('data-value'));
            })


          },
          error: function(response) {

          }


        });

      }

      function formatPrice(price) {
        return Intl.NumberFormat('vn-VN').format(price);
      }

      function calculateAmount(quantity, price) {
        return quantity * price;
      }
      $('#student_bills_main input[name=from_deliver]').val(window.localStorage.getItem('_user_name'))
      $('#student_bills_main input[name=deliver]').val(window.localStorage.getItem('_user_name'))

      function addBill(data, id) {

        var total = 0;
        var button_data = $('button[data-id=' + id + ']');
        var payment = button_data.attr('data-payment');

        if (payment == 1) {
          $('#payment').trigger('click');
        } else {
          if ($('#payment').is(':checked')) {
            $('#payment').trigger('click');
          }
        }
        $('#hoa_don_tbody').empty();
        $('#total').empty();
        $('#student_bills_hell input[name=from_deliver]').val(button_data.attr('data-from-deliver'));
        $('#student_bills_hell input[name=deliver]').val(button_data.attr('data-deliver'));
        $('#student_bills_hell input[name=receiver]').val(button_data.attr('data-receiver'));
        $('#student_bills_hell input[name=id]').val(id);



        // $('#payment')

        if (data) {
          let out = "";
          for (var i = 0; i < data.length; i++) {
            total += calculateAmount(data[i].quantity, data[i].price);
            out += ' <tr id="uniform-' + data[i].id + '"><th scope="row">' + (i + 1) + '</th>' +
              ' <td> ' + data[i].name + '<br>' + data[i].en_name + '</td>' +
              ' <td><input type="number" name="quantity" value="' + data[i].quantity + '"></td>' + ' <td class="price">' + formatPrice(data[i].price) + '</td>' +
              ' <td class="amount">' + formatPrice(calculateAmount(data[i].quantity, data[i].price)) + '</td>';


            out += '<td><select data-value="' + data[i].size + '" name="size"></select></td>';
            out += '<td><button class="btn btn-primary uniform-save" type="button"  data-id="' + data[i].id + '">Save</button></td>'

            out += "</tr>";



          }
          getSize();

          $('#total').append('Tổng cộng/Total: ' + formatPrice(total));
          $('#hoa_don_tbody').append(out);




          $('.uniform-save').click(function() {
            var uniform = $("#uniform-" + $(this).attr('data-id')).children('td');

            var data = {
              'quantity': uniform.children('input[name="quantity"]').val(),
              'size': uniform.children('select').val(),
              'id': $(this).attr('data-id'),
              'update_by': window.localStorage.getItem('_user_name'),
              'updated_at': (new Date()).toISOString(),
            };

            $.ajax({
              method: "POST",
              url: origin + "/Route.php?page=uniform&action=updateUniform",
              data: data,
              success: function(response) {
                var data = JSON.parse(response);
                if (data.status == 200)
                  Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: data.msg,
                    showConfirmButton: false,
                    timer: 3000
                  });
                else {
                  Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: data.msg,
                    showConfirmButton: false,
                    timer: 3000
                  });
                }

              },
              error: function(response) {

              }
            });
          });



        }
      }

      function showList(data, config) {

        if (data) {
          let out = "";
          for (var i = 0; i < data.length; i++) {
            out += ' <tr id="student-' + data[i].id + '"><th scope="row">' + (i + 1) + '</th>' +
              ' <td> ' + data[i].student_fullname + '<br>' + data[i].student_id + '<br>' + printStatusSpan(data[i].status) + '</td>' +
              ' <td>' + data[i].number_phone + ' </td>' + ' <td>' + data[i].student_sex + '</td>' +
              ' <td>' + data[i].class_id + '</td>';


            var payment = data[i].payment == 1 ? "Cash" : "Bank";
            out += '<td>' + payment + '</td>';
            out += '<td >' + printStatusText(data[i].status) + '</td>';

            out += ' <td class="text-center"> <button type="button"  data-payment="' +
              data[i].payment + '" class="btn btn-warning" data-receiver="' + data[i].receiver +
              '" data-from-deliver="' + data[i].from_deliver +
              '" data-deliver="' + data[i].deliver +
              '" data-id="' + data[i].id +
              '" data-toggle="modal" data-target="#hoa_don"   id="' + data[i].student_id + '"><svg ' +
              'xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"' +
              ' class="bi bi-pencil-square" viewBox="0 0 16 16">' +
              ' <path' +
              ' d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />' +
              '  <path fill-rule="evenodd"' +
              ' d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />' +
              ' </svg> </button> ' +
              '  <button type="button" class="btn btn-primary btn-print" style="margin:5px" id="' + data[i].id +
              '"> <svg xmlns="http://www.w3.org/2000/svg"' +
              'width="16" height="16" fill="currentColor"class="bi bi-arrows-fullscreen" viewBox="0 0 16 16"><path fill-rule="evenodd"' +
              'd="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707zm0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707zm-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707z" /> </svg>'
            '</button> ';
            out += ' <button type="button" class="btn btn-danger btn-delete" data-id="' + data[i].id +
              '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">' +
              '<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>' +
              '<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>' +
              '</svg> </button> </td>';

            out += '<td>';
            // if (data[i].status < 2)
            //   out += '<button type="button" class="btn ' + btnStatusClass(data[i].status) + ' btn-status" data-id="' + data[i].id +
            //   '"  data-status="' + data[i].status + '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">' +
            //   '<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>' +
            //   '<path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>' +
            //   '</svg> <br>' + btnStatus(data[i].status) + '</button> ';
            out += '<select class="btn-status" data-id="' + data[i].id +
              '"  data-status="' + data[i].status + '"><option value="-1"> -- Chọn --</option><option value="0">Đăng ký</option><option value="1">Thanh toán</option><option value="2">Giao đồng phục</option></select>'
            out += '</td>';
            out += "</tr>";



          }
          $('#table').DataTable().clear().destroy();
          $('#row-id').append(out);
          $('#table').DataTable({
            retrieve: true,
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

      };

      function printStatusSpan(status) {
        if (status == 0) {
          return '<span class="badge badge-secondary">Đã đăng ký</span>';
        } else if (status == 1) {
          return '<span class="badge badge-info">Đã thanh toán</span>';
        } else {
          return '<span class="badge badge-success">Đã nhận đồng phục</span>';
        }
      }

      function printStatusText(status) {
        if (status == 0) {
          return 'Đã đăng ký';
        } else if (status == 1) {
          return 'Đã thanh toán';
        } else {
          return 'Đã nhận đồng phục';
        }
      }

      function btnStatus(status) {
        if (status == 0) {
          return 'Thanh toán';
        } else if (status == 1) {
          return 'Giao';
        } else {
          return 'Đã nhận đồng phục';
        }
      }

      function btnStatusClass(status) {
        if (status == 0) {
          return 'btn-info';
        } else if (status == 1) {
          return 'btn-success';
        } else {
          return 'Đã nhận đồng phục';
        }
      }


      $('#btn_excel').click(function() {

        $.ajax({
          method: "POST",
          url: origin + "/Route.php?page=uniform&action=export",
          data: {},

          success: function(response) {

            window.open(origin + "/Route.php?page=uniform&action=export", '_blank');

          },
          error: function(response) {

          }
        });
      });
      // $("#search_table").on("keyup", function() {
      //   var value = $(this).val().toLowerCase();
      //   $("#table tr").filter(function() {
      //     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      //   });
      // });
    });
  </script>