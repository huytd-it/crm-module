<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Phiếu nhận đồng phục và vở bài tập</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="pages/internal/quan_li_file/view/publish/plugin/switchery/dist/switchery.css" />
  <style>
    /* body {
      background-color: #e9ecef;
    } */
  </style>
</head>


<body>
  <div class="container-fluid" style="background-color:gray">
    <form id="form">
      <div class="row" style="display:flex;justify-content:center; margin-top:40px">

        <div class="col-lg-5" style="margin-bottom:15px;">
          <div class="card">

            <div class="card-header text-center">
              <h5>PHIẾU NHẬN ĐỒNG PHỤC VÀ VỞ TẬP <br>
                UNIFORM AND NOTERBOOK RECEIPT FORM </h5>
            </div>
            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-lg-12">
                  <label for="inputEmail4">Họ và tên/Full name</label>
                  <input type="text" class="form-control" id="full_name" name="full_name" placeholder="">
                </div>
                <div class="form-group col-lg-12">
                  <label for="inputPassword4">Mã học sinh/Std. Code</label>
                  <input type="text" class="form-control" id="std_code" name="student_id" placeholder="">
                </div>

                <div class="form-group col-lg-12">
                  <label for="inputAddress">Lớp/Class</label>
                  <input type="text" class="form-control" id="class" name="class" placeholder="">
                </div>
                <div class="form-group col-lg-12">
                  <label for="inputAddress">Số điện thoại liên lạc/Number phone</label>
                  <input type="tel" class="form-control" id="number_phone" name="number_phone" placeholder="">
                </div>
                <div class="form-group col-lg-12">
                  <label> Giới tính: </label><br>
                  Nữ
                  <input type="checkbox" id="switch1" name="gender">
                  Nam
                </div>
                <div class="form-group col-lg-12 ">
                  <hr>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="buy_check" name="dong_y_mua">
                    <label class="custom-control-label" for="buy_check"><b> Đồng ý mua đồng phục cho năm học mới ?</b></label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5" id="uniform_card" style="display: none;">
          <div class="card">

            <div class="card-body">

              <h5 class="card-title">
                Số lượng đồng phục đăng ký (không đăng ký size, học sinh thử size khi đến nhận đồng phục)

              </h5>
              <hr>
              <div class="form-row">


                <div class="form-group col-sm-6 ">
                  <label for="">Áo thể dục</label>
                  <select class="custom-select" name="fitness_number">

                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>

                <div class="form-group col-sm-6 ">
                  <label for="">Quần thể dục</label>
                  <select class="custom-select" name="fitness_pants_number">

                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>
                <div class="form-group col-sm-6 ">
                  <label for="">Áo đồng phục chính khóa</label>
                  <select class="custom-select" name="uniform_number">

                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>
                <div class="form-group col-sm-6 ">
                  <label for="">Quần/váy đồng phục chính khóa</label>
                  <select class="custom-select" name="uniform_pants_number">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-lg-12">
                  <label for="">Áo Blouse</label>
                  <select class="custom-select" name="blouse_size">
                    <option value="1">Size 1 (Rộng vai: 40cm; Vòng ngực: 100cm; Dài áo: 95cm)</option>
                    <option value="2">Size 2 (Rộng vai: 40cm; Vòng ngực: 100cm; Dài áo: 95cm)</option>
                    <option value="3">Size 3 (Rộng vai: 46cm; Vòng ngực: 116cm; Dài áo: 107cm)</option>
                  </select>
                </div>
              </div>

              <h5 class=" card-title">
                Tập/vở
              </h5>
              <hr>
              <div class="form-row">


                <div class="form-group col-sm-6 ">

                  <label for="">Tập 80 trang</label>
                  <select class="custom-select" name="notebooks_80_page">

                    <option value="10">10 quyển</option>
                    <option value="20">20 quyển</option>

                  </select>
                </div>
                <div class="form-group col-sm-6 ">
                  <label for="">Tập 52 trang</label>
                  <select class="custom-select" name="notebooks_52_page">

                    <option value="10">10 quyển</option>
                    <option value="20">20 quyển</option>

                  </select>
                </div>


              </div>

            </div>


          </div>
        </div>
        <div class="col-lg-10">
          <div class="card-footer text-center">
            <button type="button" class="btn btn-primary" id="submit"> <sub><i class="las la-2x la-check-circle"></i></sub> Submit</button>
          </div>
        </div>


      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous">
  </script> -->
  <script src="pages/internal/quan_li_file/view/publish/plugin/switchery/dist/switchery.js"></script>
  <script src="pages/internal/quan_li_file/view/publish/plugin/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.all.min.js"></script>

  <script>
    // document.getElementById('divLoading').remove();
    // document.getElementById('divToast').remove();
    // document.getElementById('frmPrint').remove();
    // document.getElementById('divPopup').remove();
    // document.getElementsByTagName('head')[0].remove();

    var elem = document.querySelector('#switch1');
    var init = new Switchery(elem, {
      size: 'small',
      color: '#007bff',
      secondaryColor: '#e83e8c'
    });
    document.getElementById('class').addEventListener('input', function() {
      var uniform_card = document.getElementById('uniform_card');

      if (document.getElementById('class').value.indexOf('9') != -1)
        uniform_card.style.display = "block";
      else
        uniform_card.style.display = "none";

    });
    document.getElementById('submit').addEventListener('click', function() {
      var formData = new FormData(document.getElementById('form'));


      var origin = window.location.origin + "/" + window.location.pathname.split('/')[1] + "/pages/internal/quan_li_file";
      $.ajax({
        method: "POST",
        url: origin + "/Route.php?controller=UniformController&action=create&page=uniform&student_id=" + window.localStorage.getItem('_student_id'),
        data: formData,
        contentType: false,
        mimeType: "multipart/form-data",
        processData: false,
        cache: false,
        success: function(response) {
          console.log(response);
          var data = JSON.parse(response);
          if (data.status == 200)
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: data.msg,
              showConfirmButton: false,
              timer: 2000
            });
          else {
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: data.msg,
              showConfirmButton: false,
              timer: 2000
            });
          }


        },

        error: function(response) {
          console.log(response);
        }
      });


      // for (var pair of formData.entries()) {
      //   console.log(pair[0] + ', ' + pair[1]);
      // }
    });

    getConfig();

    function getConfig() {
      var origin = window.location.origin + "/" + window.location.pathname.split('/')[1] + "/pages/internal/quan_li_file";
      $.ajax({
        method: "GET",
        url: origin + "/Route.php?controller=UniformController&action=studentInformation&page=uniform&student_id=" + window.localStorage.getItem('_student_id'),
        success: function(response) {

          var data = JSON.parse(response).data;

          $('input[name=full_name').val(data['student_fullname']);
          $('input[name=student_id').val(data['student_id']);
          $('input[name=class').val(window.localStorage.getItem('_class_id'));
          if (data.student_sex = 'NAM') {
            $('input[name=gender').click();


          }

          if (document.getElementById('class').value.indexOf('9') != -1)
            uniform_card.style.display = "block";
          else
            uniform_card.style.display = "none";


        },

        error: function(response) {
          console.log(response);
        }
      });
    }
  </script>
</body>

</html>