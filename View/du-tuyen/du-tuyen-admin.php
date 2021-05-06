<!DOCTYPE html>
<html lang="en">

<head>

  <style>
    .card {
      margin-top: 50px;
      margin-bottom: 50px;

    }

    * {
      font-size: 15px;
    }
  </style>
</head>

<body>
  <!-- Modal -->


  <div class="container-fluid">

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Email</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="email" name="email" class="form-control" id="email">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" id="setEmail">Save</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row bg-secondary justify-content-center">
      <div class="col-sm-12">
        <div class="card">

          <div class="card-header">
          
            <h3 class="text-center text-uppercase"></h3>
            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" id="btn-mail" data-target="#exampleModal">
              Email: yukihuy99yuki@gmail.com
            </button>
            <button class="btn btn-outline-secondary " id="btn_excel"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
                <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z" />
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
              </svg> Export Excel</button>
            <button type="button" class="btn btn-success" id="btn-10">Giáo viên cơ hữu<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
              </svg></button>
            <button type="button" class="btn btn-success" id="btn-tiem-nang">Giáo viên nòng cốt<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
              </svg></button>


          </div>
          <div class="card-body table-responsive-lg">
            <div class="form-group">
              <label for="search_table">Search</label>
              <input class="form-control" id="search_table">
            </div>
            <br>
            <table class="table table-hover table-bordered table-responsive-lg" id="table">
              <thead class="text-center">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Ảnh</th>
                  <th scope="col">Họ và tên</th>
                  <th scope="col">Giới tính</th>
                  <th scope="col">Nơi sinh</th>
                  <th scope="col">Năm sinh</th>
                  <th scope="col">Bộ môn</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Print</th>
                  <th scope="col">Zip</th>
                  <th scope="col">Delete</th>
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

 
  <script>
    $(document).ready(function() {

      var origin = window.location.origin + "/" + window.location.pathname.split('/')[1] + "/pages/internal/quan_li_file" ;
      fetchAll();
      
      function deleteData(id) {
       
        $.ajax({
          method: "GET",
          url: origin + "/Route.php?action=delete&controller=DuTuyenController&page=du-tuyen&id=" +id,
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

      function setMail() {
        $.ajax({
          method: "POST",
          url: origin + "/Route.php?action=setMail&page=du-tuyen",
          data: {
            'email': $('#email').val()
          },
          success: function(response) {
            console.log(response);
            let result = JSON.parse(response);
            $('.modal-body').children('.alert').remove();
            console.log($('#btn-mail').text('Email: ' + result.data));
            if (result.status != 200)
              $('.modal-body').append("<p class='alert alert-danger text-center'>" + result.msg + "</p>")
            else
              $('.modal-body').append("<p class='alert alert-success text-center'>" + result.msg + "</p>")



          },
          error: function(response) {
            $('.alert h3').text("Errors");
            $('.alert').css("color", "red");
            $('.alert i').removeClass('far fa-check-circle').addClass('fas fa-exclamation-circle');
            $('.alert').toggleClass("hide");
          }
        });
      }
      getMail();
      function getMail() {
        $.ajax({
          method: "POST",
          url: origin + "/Route.php?controller=DuTuyenController&page=du-tuyen&action=getMail",
          data: {
            'email': $('#email').val()
          },
          success: function(response) {
            console.log(response);
            let result = JSON.parse(response);
            console.log($('#btn-mail').text('Email: ' + result.data));
           


          },
          error: function(response) {
            $('.alert h3').text("Errors");
            $('.alert').css("color", "red");
            $('.alert i').removeClass('far fa-check-circle').addClass('fas fa-exclamation-circle');
            $('.alert').toggleClass("hide");
          }
        });
      }

      function downloadFiles(id) {
       
        $.ajax({
          method: "POST",
          url: origin + "/Route.php?page=du-tuyen&action=archive&controller=DuTuyenController" + id,
          data: {},
          success: function(response) {

            window.open( origin + "/Route.php?page=du-tuyen&action=archive&controller=DuTuyenController" + id, '_blank');



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
          url: origin + "/Route.php?controller=DuTuyenController&action=getAll&page=du-tuyen",
          success: function(response) {
          
            let result = JSON.parse(response);

            let data = result.data;
            let config = result.config;



            showList(data, config);

            $('.btn-primary').click(function() {
              window.open('?p=internal.quan_li_file.view.du-tuyen.du-tuyen-form/0/guest&mode=view&type=1&id=' + $(this).attr('id'), 'width:1000',
                'height:1000')
            });

            $('.btn-warning').click(function() {

              window.open('?p=internal.quan_li_file.view.du-tuyen.du-tuyen-form/0/guest&mode=edit&type=1&id=' + $(this).attr('id'), 'width:1000',
                'height:1000')
            });

            $('.btn-danger').click(function() {
              deleteData($(this).attr('id'));
              $(this).parent().parent().remove();
            });
            $('.btn-outline-info').click(function() {
              console.log($(this).attr('id'));
              downloadFiles($(this).attr('id'));
            });
            $('table a').click(function() {
              if ($(this).attr('id') != " ")
                window.open("../" + $(this).attr('id'), 'width:1000', 'height:1000');
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
            out += ' <tr><th scope="row">' + (i + 1) + '</th>' +
              ' <td><img src="' + config.origin + "/" + data[i].avatar + ' " width="50" height="50"></td>' +
              ' <td>' + data[i].ho_ten + ' </td>' + ' <td>' + data[i].gioi_tinh + '</td>' +
              ' <td>' + data[i].noi_o_hien_tai + '</td>' +
              ' <td>' + data[i].ngay_sinh + '</td>' +

              ' <td>' + data[i].bo_mon + ' </td>';



            out += ' <td class="text-center"><button type="button" class="btn btn-warning" id="' + data[i].id +
              '"><svg ' +
              'xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"' +
              ' class="bi bi-pencil-square" viewBox="0 0 16 16">' +
              ' <path' +
              ' d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />' +
              '  <path fill-rule="evenodd"' +
              ' d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />' +
              ' </svg> </button> </td>' +
              ' <td class="text-center"><button type="button" class="btn btn-primary"  id="' + data[i].id +
              '"> <svg xmlns="http://www.w3.org/2000/svg"' +
              'width="16" height="16" fill="currentColor"class="bi bi-arrows-fullscreen" viewBox="0 0 16 16"><path fill-rule="evenodd"' +
              'd="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707zm0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707zm-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707z" /> </svg>'
            '</button></td>';
            out += ' <td class="text-center"><button type="button" class="btn btn-outline-info" id="' + data[i].id +
              '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/></svg> </button> </td>';
            out += ' <td class="text-center"><button type="button" class="btn btn-danger" id="' + data[i].id +
              '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">' +
              '<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>' +
              '<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>' +
              '</svg> </button> </td>';
            out += "</tr>";



          }
          $('#row-id').append(out);



          $('#btn-10').click(function() {
            var link = '?p=internal.quan_li_file.view.du-tuyen.du-tuyen-form/0/guest&mode=create&type=1';
            window.open(link, 'width:1000', 'height:1000');
           
          });
          $('#btn-tiem-nang').click(function() {
            window.open('?p=internal.quan_li_file.view.du-tuyen.du-tuyen-form/0/guest&mode=create&type=0', 'width:1000', 'height:1000')
          });

        }

      };
      $('#setEmail').click(function() {
        setMail();
      });

      $('#btn_excel').click(function() {

        $.ajax({
          method: "POST",
          url: origin + "/Route.php?action=export&page=du-tuyen",
          data: {},

          success: function(response) {
            // console.log(response);
            window.open(origin + "/Route.php?action=export&page=du-tuyen", '_blank');

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