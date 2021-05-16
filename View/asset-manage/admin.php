<!DOCTYPE html>
<html lang="en">

<head>


  <title>Đồng phục</title>
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
    table.dataTable thead th, table.dataTable thead td {
      padding: 10px 18px !important;
    }
    table td, table th {
      text-align: center;
    }
    
    
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row bg-secondary justify-content-center">
      <div class="col-sm-12 ">
        <div class="card">

          <div class="card-header">
            <h3 class="text-center text-uppercase"></h3>
            <button class="btn btn-outline-secondary " id="btn_excel"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
                <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z" />
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
              </svg> Export Excel</button>
            <button type="button" class="btn btn-success" id="btn-10">Lớp 10 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
              </svg></button>
            <button type="button" class="btn btn-success" id="btn-6">Lớp 6 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
              </svg></button>

          </div>
          <div class="card-body table-responsive-lg">

            <br>
            <div class="table-responsive " style="overflow-x: scroll;min-width:800px; width:100%">
              <table class="table table-hover table-bordered" id="table" style="overflow:scroll;height:100px">
                <thead class="text-center">
                  <tr>
                    <th scope="col">#</th>
                   
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Giới tính</th>        
                    <th scope="col">Lớp</th>
                    <th scope="col">Edit - Print - Delete</th>


                  </tr>
                </thead>
                <tbody id="row-id" >

                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->
  <script>
    $(document).ready(function() {
      var origin = window.location.origin + "/" + window.location.pathname.split('/')[1] + "/pages/internal/quan_li_file";
      fetchAll();

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

      function fetchAll() {
        $.ajax({
          method: "GET",
          url: origin + "/Route.php?controller=HocBongController&action=getAll&page=uniform",
          success: function(response) {
           
            let result = JSON.parse(response);

            let data = result.data;
            let config = result.config;
            showList(data, config);

            $('.btn-primary').click(function() {
              window.open('?p=internal.quan_li_file.view.asset-manage.form-print/0/view&mode=view&id=' + $(this).attr('id'), 'width:1000',
                'height:1000')
            });

            $('.btn-warning').click(function() {
              window.open('?p=internal.quan_li_file.view.asset-manage.form-print/0/view&mode=edit&id=' + $(this).attr('id'), 'width:1000',
                'height:1000')
            });
            $('.btn-danger').click(function() {
              deleteData($(this).attr('id'));
              $(this).parent().parent().remove();
            });
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

      function showList(data, config) {

        if (data) {
          let out = "";
          for (var i = 0; i < data.length; i++) {
            out += ' <tr ><th scope="row">' + (i + 1) + '</th>' +
              ' <td> ' + data[i].student_fullname +'</td>' +
              ' <td>' + data[i].number_phone + ' </td>' + ' <td>' + data[i].student_sex + '</td>' +
              // ' <td>' + data[i].dia_chi_cu_tru_hs + '</td>' +
              // ' <td>' + data[i].nam_sinh_hs + ' </td>' + ' <td>' + data[i].ho_ten_cha + '<br>' + data[i]
              // .nam_sinh_cha + '</td>' +
              // ' <td>' + data[i].ho_ten_me + '<br>' + data[i].nam_sinh_me + ' </td>' +
              ' <td>' + data[i].class_id + '</td>';

            // out += ' <td><a href="javascript:void(0)" id="' + data[i].dinh_kem_giay_khen + '">1. Giấy khen</a></br>' +
            //   ' <a href="javascript:void(0)" id="' + data[i].dinh_kem_tieng_anh + '">2. Chứng chỉ tiếng anh</a></br>' +
            //   ' <a href="javascript:void(0)" id="' + data[i].dinh_kem_khuyet_tat +
            //   '">3. Chứng nhận khuyết tật</a></br>' +
            //   ' <a href="javascript:void(0)" id="' + data[i].dinh_kem_thcs + '">4. Học bạ</a></br>' +
            //   ' <a href="javascript:void(0)" id="' + data[i].dinh_kem_ho_ngheo + '">5. Chứng nhận hộ nghèo</a></br>' +
            //   ' <a href="javascript:void(0)" id="' + data[i].dinh_kem_ho_so_cm_thu_nhap +
            //   '">6. Chứng nhận thu nhập</a></br>';
      

            out += '</td>';

            out += ' <td class="text-center"> <button type="button" class="btn btn-warning"  id="' + data[i].id +
              '"><svg ' +
              'xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"' +
              ' class="bi bi-pencil-square" viewBox="0 0 16 16">' +
              ' <path' +
              ' d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />' +
              '  <path fill-rule="evenodd"' +
              ' d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />' +
              ' </svg> </button> ' +
              '  <button type="button" class="btn btn-primary" style="margin:5px" id="' + data[i].id +
              '"> <svg xmlns="http://www.w3.org/2000/svg"' +
              'width="16" height="16" fill="currentColor"class="bi bi-arrows-fullscreen" viewBox="0 0 16 16"><path fill-rule="evenodd"' +
              'd="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707zm0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707zm-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707z" /> </svg>'
            '</button> ';
            out += ' <button type="button" class="btn btn-danger" id="' + data[i].id +
              '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">' +
              '<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>' +
              '<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>' +
              '</svg> </button> </td>';
            out += "</tr>";



          }
          $('#row-id').append(out);
          $('#table').DataTable();
          // $('select').select2();

        }
        $('#btn-6').click(function() {
          window.open('?p=internal.quan_li_file.view.asset-manage.form/0/view&mode=create&lop=6', 'width:1000', 'height:1000')
        });
        $('#btn-10').click(function() {
          window.open('?p=internal.quan_li_file.view.asset-manage.form-print/0/student_id=100004', 'width:1000', 'height:1000')
        });
      };



      $('#btn_excel').click(function() {

        $.ajax({
          method: "POST",
          url: origin + "/Route.php?page=hoc-bong&action=export",
          data: {},

          success: function(response) {
            // console.log(response);
            window.open(origin + "/Route.php?page=hoc-bong&action=export", '_blank');

          },
          error: function(response) {
            console.log(response);
          }
        });
      });
      $("#search_table").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#table tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>

</body>

</html>