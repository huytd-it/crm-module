<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
  </style>

<body>
  <div class="container-fluid" style="background-color:gray">

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

  </div>

  <script src="pages/internal/quan_li_file/view/publish/plugin/jquery-3.5.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.all.min.js"></script>
  <script>
    $(document).ready(function() {
      var origin = window.location.origin + "/" + window.location.pathname.split('/')[1] + "/pages/internal/quan_li_file";
     

      $('.close, #close').click(function() {

        $('#hoa_don').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
      });



      function deleteData(id) {
        $.ajax({
          method: "GET",
          url: origin + "/Route.php?action=delete&page=hoc-bong",
          success: function(response) {
            console.log(response);
            let result = JSON.parse(response);
            $('.card').prepend("<p class='alert alert-danger text-center'>" + result.msg + "</p>")


          },
          error: function(response) {
            $('.alert h3').text("Errors");
            $('.alert').css("color", "red");
            $('.alert i').removeClass('far fa-check-circle').addClass('fas fa-exclamation-circle');
            $('.alert').toggleClass("hide");
          }
        });
      }
      getBill(window.localStorage.getItem('_student_id'));
      function getBill(id) {

        $.ajax({
          method: "GET",
          url: origin + "/Route.php?page=uniform&action=getBill&id=" + id,
          success: function(response) {

            var result = JSON.parse(response).data;
            addBill(result);


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

            console.log($('select[name="size"]'));
            $('select[name="size"]').each(function(num, el) {

              console.log($(el).attr('data-value'));
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

      function addBill(data) {
       
        var total = 0;
        $('#hoa_don_tbody').empty();
        $('#total').empty();
        if (data) {
          let out = "";
          for (var i = 0; i < data.length; i++) {
            total += calculateAmount(data[i].quantity, data[i].price);
            out += ' <tr id="uniform-' + data[i].id + '" ><th scope="row">' + (i + 1) + '</th>' +
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
              'id': $(this).attr('data-id')
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




      $("#search_table").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#table tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
