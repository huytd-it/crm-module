<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dự tuyển</title>
  <style>
    body {

      /* display: flex;
      justify-content: center; */
      background-color: gainsboro;
      margin: 0;
      padding: 0;

    }

    #body {
      box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);

    }

    input,
    select {
      border: none !important;
      border-bottom: 1px dotted black !important;
      border-radius: 0px !important;

    }

    textarea {
      border: none !important;
    }

    table,
    td,
    th {
      border: 1px solid black;
      border-collapse: collapse;
      text-align: center;

    }

    td {
      text-align: center;
      padding-left: 5px;
      padding-right: 5px;


    }

    .td-left td {
      text-align: left;

    }


    .td-left input {
      min-width: 100px;
      max-width: 150px;
      margin: 0;

    }

    .input-full input {
      max-width: 100%;
    }

    input[type="checkbox"] {

      width: 15px !important;

      text-align: right;


    }




    textarea {
      font-size: 15px;
      font-family: 'Times New Roman', Times, serif;
      border: none;
      width: 96%;
      background-attachment: local;
      background-image:
        linear-gradient(to right, white 10px, transparent 10px),
        linear-gradient(to left, white 10px, transparent 10px),
        repeating-linear-gradient(white, white 30px, #ccc 30px, #ccc 31px, white 31px);
      line-height: 31px;
      padding: 0px 10px;

    }

    div {
      border-radius: 15px;
      padding: 15px;
      margin: 0 auto;
    }

    table {
      width: 100%;
      border: 3px solid black;
      margin: 0 auto;
    }

    input {
      outline: none;
      border: none;
      border-bottom: 1px dotted black;
      width: 100% !important;
      text-align: left;
      font-weight: bold;
      font-family: 'Times New Roman', Times, serif;
      font-size: 15px;

    }
    
    .btn {
      bottom: 40%;
      left: 14px;
      position: fixed;
      width: 100px;
      padding: 15px;
      outline: none;
      border: none;
      background-color: green;
      font-size: 15px;
      font-weight: bold;
      border-radius: 5px;
      color: white;
      -webkit-box-shadow: -2px 11px 38px 0px rgba(0, 0, 0, 1);
      -moz-box-shadow: -2px 11px 38px 0px rgba(0, 0, 0, 1);
      box-shadow: -2px 11px 38px 0px rgba(0, 0, 0, 1);


    }

    .btn:focus {
      background-color: white;
      color: green;
      border: 2px solid green;
    }

    .btn-save {
      background-color: rebeccapurple;
      bottom: 50%;
    }

    #ten_truong_1 {
      width: 200px;
    }

    @page {
      size: A4;
      margin: 0;
    }

    @media print {

      #chon_anh {
        width: 80px;
      }

      .btn,
      .hide_print {
        display: none;
      }

      table,
      input,
      p,
      textarea {

        font-size: 10.5px;
      }

      input {
        border: none !important;
      }

      #ten_truong_1 {
        width: 150px;
      }



      h3 {

        font-size: 17px;
      }

      #body {
        width: 21cm;
        height: 29.7cm;
        box-shadow: none;
        padding:0 20px 0px 5px;

      }


    }

    .alert {
      position: fixed;
      width: 100%;
      height: 100%;
      text-align: center;
      background-color: rgba(0, 0, 0, 0.534);
      color: #17a2b8;
      /* font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; */
      
    }
    .alert  li {
      font-size: 13px !important;
      
    }

    .hide {
      display: none;
    }

    .alert-body {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 15px;
      border-radius: 15px;
      background-color: #ffffff;
      width: 300px;
    
      -webkit-box-shadow: -2px 11px 38px 0px rgba(0, 0, 0, 1);
      -moz-box-shadow: -2px 11px 38px 0px rgba(0, 0, 0, 1);
      box-shadow: -2px 11px 38px 0px rgba(0, 0, 0, 1);


    }

    .alert-body {
      animation-name: fade;
      animation-duration: .5s;

    }

    .list {

      text-align: left;

    }

    .alert i {

      border-radius: 100%;
    }

    .alert i,
    .alert h3 {

      animation:
        fade_2 .7s ease-out 0s alternate 1 none running;

    }

    .list_wrapper {
      display: flex;
      justify-content: center;
      overflow: auto;
      max-height: 200px;

    }

    @keyframes fade_2 {
      from {
        color: transparent;
        transform: scale(.5);
        transform: translateY(-50%);


      }

      to {

        transform: scale(1);
      }
    }

    @keyframes fade {
      from {
        color: transparent;
        transform: translateX(-50%);

      }

      to {}
    }

    .lds-hourglass {
      display: inline-block;
      position: relative;
      width: 80px;
      height: 80px;
    }

    .lds-hourglass:after {
      content: " ";
      display: block;
      border-radius: 50%;
      width: 0;
      height: 0;
      margin: 8px;
      box-sizing: border-box;
      border: 32px solid #fff;
      border-color: #fff transparent #fff transparent;
      animation: lds-hourglass 1.2s infinite;
    }

    @keyframes lds-hourglass {
      0% {
        transform: rotate(0);
        animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
      }

      50% {
        transform: rotate(900deg);
        animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
      }

      100% {
        transform: rotate(1800deg);
      }
    }

    #header,
    #div_chat {
      display: none;
    }

    h3,
    .h3 {
      font-size: 24px;
      font-weight: bold !important;
    }
  </style>
</head>

<body>
  <div class="alert hide">
    <div class="alert-body">
      <i class="fas fa-check-circle fa-5x" aria-hidden="true"></i>
      <h3>Thành công</h3>
      <div class="list_wrapper">
        <ol class="list"></ol>
      </div>
      <button type="button" style="width:35px;height:35px;border-radius:50%;position:absolute;top:10px;right:10px;background-color:transparent;border:1px solid black;border-color:inherit; color:inherit;font-size:30px;padding:5px 15px;cursor:pointer;outline:none" id="close">&times;</button>
    </div>
  </div>
  <button class="btn btn-save">Save <i class="fas fa-print"></i></button>
  <button class="btn btn-print">Print <i class="far fa-save"></i></button>

  <div style="background-color: white;width: 1000px;" id="body">
    <form id="du-tuyen-form" enctype="multipart/form-data">
      <div style="text-align: right;margin-top: 7px;margin-bottom:7px;float:right">
        <p style="border: 2px solid black;display: inline;padding: 4px; ">From No :.
          <input style="width: 70px !important;
    text-align: center;
    border: none !important;" type="text" name="ma_du_tuyen" value="HR.001B">
        </p>
      </div>
      <h3 style="text-align: center;margin:0px 150px" id="title">
        PHIẾU ĐĂNG KÝ DỰ TUYỂN-GIÁO VIÊN CƠ HỮU
        <br> APPLICATION FORM-FULL TIME TEACHERS
      </h3>

      <table>
        <tbody>
          <tr>
            <td id="ho_ten" style="width:120px">Họ tên <br> Full Name</td>
            <td colspan="2"><input type="text" name="ho_ten"></td>
            <td style="width:140px" id="bo_mon">Giáo viên cơ hữu - Bộ môn <br>Full-time teachers -
              Subject<br>
            </td>
            <td colspan="2"><input type="text" name="bo_mon"></td>
            <td style="padding:2px;margin:0" rowspan="4" id="chon_anh">
              <p>Nơi dán ảnh <br> Picture</p>
              <input type="file" id="avatar" name="avatar" style="display: none;width:100%">
              <img id="img_avatar" width="100" src="/View/publish/images/anh_3_4.png">
            </td>
          </tr>
          <tr>
            <td id="ngay_sinh">Ngày sinh/DOB</td>
            <td><input type="text" name="ngay_sinh"></td>
            <td style="width:120px" id="can_nang">Cân nặng/Weight</td>
            <td><input type="text" name="can_nang"></td>
            <td style="width:100px">Chiều cao/Height</td>
            <td><input type="text" name="chieu_cao"></td>
          </tr>
          <tr>
            <td id="gioi_tinh">Giới tính <br> Sexual</td>
            <td><input type="text" name="gioi_tinh"></td>
            <td id="hon_nhan">Hôn nhân <br>Marital Status<br>
            </td>
            <td><input type="text" name="hon_nhan"></td>
            <td id="so_cm">Số CMND <br>ID Number<br>
            </td>
            <td><input type="text" name="so_cm"></td>
          </tr>
          <tr>
            <td id="dan_toc">Dân tộc/ Ethnic</td>
            <td><input type="text" name="dan_toc"></td>
            <td id="ton_giao">Tôn giáo <br> Religion</td>
            <td><input type="text" name="ton_giao"></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td id="noi_o_hien_tai">Nơi ở hiện tại <br>Temporary Address<br>
            </td>
            <td style="width:450px" colspan="2"><input type="text" name="noi_o_hien_tai"></td>
            <td id="sdt">Điện thoại <br>Phone Number<br>
            </td>
            <td><input type="text" name="sdt"></td>
            <td id="email" colspan="2">Email: <input type="email" name="email"> </td>
          </tr>
          <tr id="dia_chi_lien_lac" class="td-left input-full">
            <td colspan="2">Địa chỉ liên lạc/Permanent Address</td>
            <td colspan="5"><input type="text" name="dia_chi_lien_lac"></td>
          </tr>
          <tr class="td-left input-full">
            <td colspan="2" id="noi_cong_tac">Nơi công tác hiện nay <br>Temporary Working Place</td>
            <td colspan="5"><input type="text" name="noi_cong_tac"></td>
          </tr>
          <tr class="td-left input-full">
            <td colspan="2" id="nguon_thong_tin">Nguồn tiếp nhận thông tin tuyển dụng<br>Recruitment Source<br>
            </td>
            <td colspan="5"><input type="text" name="nguon_thong_tin"></td>
          </tr>

        </tbody>
      </table>
      <table style="border-top:none;">

        <tr>
          <th rowspan="4">Trình độ học vấn <br> Education</th>
          <th rowspan="2" id="ten_truong_1">Trường/Name of the University</th>
          <th rowspan="2" style="width:140px">Trình độ <br> Qualification</th>
          <th rowspan="2">Khoa <br>Faculty
          </th>
          <th rowspan="2" style="width:100px">Ngành <br> Major</th>
          <th colspan="2">Bắt đầu Starting</th>
          <th colspan="2">Kết thúc Ending</th>
        </tr>
        <tr>
          <td>Tháng (mm)
          </td>
          <td>Năm (yyyy)
          </td>
          <td>Tháng (mm)
          </td>
          <td>Năm (yyyy)
          </td>
        </tr>
        <tr class="td-checkox">
          <td><input type="text" name="ten_truong_1" style="width:200px"></td>
          <td style="text-align: left;font-size: 11px;">
            <input type="checkbox" name="trung_cap_1"> Trung cấp/ Intermediate<br>
            <input type="checkbox" name="cao_dang_1"> Cao đẳng /College<br>
            <input type="checkbox" name="cu_nhan_1"> Cử nhân/BA<br>
            <input type="checkbox" name="thac_si_1">Thạc sĩ/MA
          </td>
          <td><input type="text" name="khoa_1"></td>
          <td><input type="text" name="nganh_1"></td>
          <td><input type="text" name="thang_1"></td>
          <td><input type="text" name="nam_1"></td>
          <td><input type="text" name="thang_2"></td>
          <td><input type="text" name="nam_2"></td>
        </tr>
        <tr>
          <td><input type="text" name="ten_truong_2"></td>
          <td style="text-align: left;font-size: 11px;">
            <input type="checkbox" name="trung_cap_2"> Trung cấp/ Intermediate<br>
            <input type="checkbox" name="cao_dang_2"> Cao đẳng /College<br>
            <input type="checkbox" name="cu_nhan_2"> Cử nhân/BA<br>
            <input type="checkbox" name="thac_si_2"> Thạc sĩ/MA
          </td>
          <td><input type="text" name="khoa_2"></td>
          <td><input type="text" name="nganh_2"></td>
          <td><input type="text" name="thang_3"></td>
          <td><input type="text" name=" nam_3"></td>
          <td><input type="text" name="thang_4"></td>
          <td><input type="text" name="nam_4"></td>
        </tr>
        <tr>
          <td>Trình độ ngoại ngữ/ Language Skills</td>
          <td colspan="3"><input type="text" name="ngoai_ngu"></td>
          <td>Trình độ tin học <br>Computer Skills<br>
          </td>
          <td colspan="4"><input type="text" name="tin_hoc"></td>
        </tr>
        <tr>
          <th rowspan="7">Kinh nghiệm làm việc <br>Work Experience<br>
          </th>
          <th rowspan="3" colspan="3">Đơn vị công tác/ Working Places</th>
          <th rowspan="3">Chức vụ <br>Positions</th>
          <th colspan="4">Thời gian/Time</th>
        </tr>
        <tr>
          <th colspan="2">Bắt đầu/Starting</th>
          <th colspan="2">Kết thúc/Ending</th>
        </tr>
        <tr>
          <td>Tháng (mm)</td>
          <td>Năm (yyyy)</td>
          <td>Tháng (mm)</td>
          <td>Năm (yyyy)</td>
        </tr>
        <tr>
          <td colspan="3"><input type="text" name="don_vi_cong_tac_1"></td>
          <td><input type="text" name="chuc_vu_1"></td>
          <td><input type="text" name="thang_5"></td>
          <td><input type="text" name="nam_5"></td>
          <td><input type="text" name="thang_6"></td>
          <td><input type="text" name="nam_6"></td>
        </tr>
        <tr>
          <td colspan="3"><input type="text" name="don_vi_2"></td>
          <td><input type="text" name=" chuc_vu_2"></td>
          <td><input type="text" name="thang_7"></td>
          <td><input type="text" name="nam_7"></td>
          <td><input type="text" name="thang_8"></td>
          <td><input type="text" name=" nam_8"></td>
        </tr>
        <tr>
          <td colspan="3"><input type="text" name="don_vi_3"></td>
          <td><input type="text" name="chuc_vu_3"></td>
          <td><input type="text" name="thang_9"></td>
          <td><input type="text" name="nam_9"></td>
          <td><input type="text" name="thang_10"></td>
          <td><input type="text" name="nam_10"></td>
        </tr>
        <tr>
          <td colspan="3"><input type="text" name="don_vi_4"></td>
          <td><input type="text" name="chuc_vu_4"></td>
          <td><input type="text" name="thang_11"></td>
          <td><input type="text" name=" nam_11"></td>
          <td><input type="text" name="thang_12"></td>
          <td><input type="text" name="nam_12"></td>
        </tr>

        <tr>
          <td>Sở thích <br> Interests</td>
          <td colspan="8"><input type="text" name="so_thich"></td>
        </tr>
        <tr>
          <td>Năng khiếu <br>Talents</td>
          <td colspan="8"><input type="text" name="nang_khieu"></td>
        </tr>
        <tr>
          <td>Khen thưởng <br> Rewards</td>
          <td colspan="8"><input type="text" name="khen_thuong"></td>
        </tr>
        <tr>
          <td>Thành tích nổi trội</td>
          <td colspan="8">※
            Những thành tích trong giảng dạy,
            bồi dưỡng, tổ chức học sinh: những
            tác phẩm hay nghiên cứu có liên quan đến giảng dạy/Achievements in teaching, fostering and organizing for
            students: works or researches related to teaching
            <textarea type="text" name="thanh_tich"></textarea>
          </td>
        </tr>
        <tr>
          <td rowspan="6">Các lớp tập huấn/đào tạo <br>Training Classes/Courses</td>
          <td colspan="2">Lớp/khóa đào tạo/ Name of Classes/Courses</td>
          <td colspan="2">Thời gian/Time</td>
          <td colspan="4">Địa điểm/Places</td>
        </tr>
        <tr>
          <td colspan="2"><input type="text" name="ten_lop_1"></td>
          <td colspan="2"><input type="text" name="thoi_gian_1"></td>
          <td colspan="4"><input type="text" name="dia_diem_1"></td>


        </tr>
        <tr>
          <td colspan="2"><input type="text" name="ten_lop_2"></td>
          <td colspan="2"><input type="text" name="thoi_gian_2"></td>
          <td colspan="4"><input type="text" name="dia_diem_2"></td>


        </tr>
        <tr>
          <td colspan="2"><input type="text" name=" ten_lop_3"></td>
          <td colspan="2"><input type="text" name="thoi_gian_3"></td>
          <td colspan="4"><input type="text" name=" dia_diem_3"></td>


        </tr>
        <tr>
          <td colspan="2"><input type="text" name="ten_lop_4"></td>
          <td colspan="2"><input type="text" name="thoi_gian_4"></td>
          <td colspan="4"><input type="text" name="dia_diem_4"></td>


        </tr>
        <tr>
          <td colspan="2"><input type="text" name="ten_lop_5"></td>
          <td colspan="2"><input type="text" name="thoi_gian_5"></td>
          <td colspan="4"><input type="text" name=" dia_diem_5"></td>


        </tr>
        <tr class="td-left">
          <td rowspan="2">Người liên hệ tham chiếu/ Reference Check</td>
          <td colspan="2">Tên/Name: <input type="text" name="ten_nguoi_lien_he_1"></td>
          <td colspan="4">Chức vục/Position:
            <input type="text" name="ref_chuc_vu_1"> <br>
            Cty/Company
          </td>
          <td colspan="2">Số điện thoại/Phone <input type="text" name="ref_sdt_1"></td>
        </tr>

        <tr class="td-left">
          <td colspan="2">Tên/Name: <input type="text" name="ten_nguoi_lien_he_2"></td>
          <td colspan="4">Chức vục/Position:
            <input type="text" name="ref_chuc_vu_2"> <br>
            Cty/Company
          </td>
          <td colspan="2">Số điện thoại/Phone <input type="text" name="ref_sdt_2"></td>
        </tr>


        <tr>
          <td colspan="4">Ngày/Date: <input type="text" name="now_ngay" style="width:50px !important">tháng <input type="text" name="now_thang" style="width:50px !important">năm
            <input type="text" name="now_nam" style="width:50px !important">
          </td>
          <td style="height: 80px; text-align: left;vertical-align: top;" colspan="5">Người đăng ký ký tên/Applicant's
            signature:

          </td>
        </tr>

      </table>

      <div class="hide_print">
        <p> Đính kèm file:</p>
        <input type="file" name="file_1">
        <input type="file" name="file_2">
        <input type="file" name="file_3">
        <input type="file" name="file_4">
        <input type="file" name="file_5">
      </div>
      <div class="hide_print" style="margin:15px">
        <b>Lưu ý ứng viên khi nộp hồ sơ:</b>
        <p>Bước 1: Ứng viên điền “Phiếu đăng ký dự tuyển”</p>
        <p>Bước 2: Ứng viên sắp xếp hồ sơ theo thứ tự:</p>
        <ul>
          <li>1.1. Hồ sơ bắt buộc
            Phiếu đăng ký dự tuyển.
            CV/ Lý lịch cá nhân - Bản sao bằng cấp, chứng chỉ và các giấy tờ liên quan khác.
            Bài luận thể hiện quan điểm, định hướng giáo dục của cá nhân trong 1 trang A4
            (khoảng 400 - 500 chữ, kiểu chữ Times New Roman, cỡ chữ 12).</li>
          <li>1.2. Hồ sơ được ưu tiên cộng điểm
            Ưu tiên những ứng viên có kinh nghiệm về nghiên cứu khoa học (bổ sung trong hồ sơ những
            báo cáo nghiên cứu khoa học đã thực hiện) hoặc luận văn thạc sĩ, khóa luận tốt nghiệp, v.v</li>
        </ul>
        <p>Bước 3: Ứng viên kẹp hồ sơ thành 01 bộ (không nộp bìa hồ sơ) và nộp cho người phụ trách</p>

      </div>
    </form>
  </div>


  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous">
  </script>
  <!-- <script src="./View/publish/js/help.js"></script> -->
  <script>
    function readURL(input_file) {
      if (input_file.files && input_file.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#img_avatar').attr('src', e.target.result);
        }

        reader.readAsDataURL(input_file.files[0]); // convert to base64 string
      }
    }
    var getUrlParameter = function getUrlParameter(sParam) {
      var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

      for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
          //https://www.w3schools.com/jsref/jsref_decodeuricomponent.asp
          return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
      }
    };

    $(document).ready(function() {
      $('.btn-print').click(function() {
        window.print();
      });
      let status = 0;
      // $('.alert').click(function() {
      //   $(".alert").toggleClass("hide");
      // });
      $('#close').click(function() {
        $('.alert').toggleClass("hide");
        console.log(status);
        if (status == 1) {
          $('.btn-save').show();
        }


      });
      $('.btn-save').click(function() {
        getFormData($("#du-tuyen-form"));

      });
      $('#img_avatar').click(function() {
        $("#chon_anh p").hide();
        // $(this).append("<img id='img_avatar'  style='width:100%'>");
        $("#avatar").click();
        $("#avatar").change(function() {
          readURL(this);
        })


      })

      var origin = window.location.origin + "/" + window.location.pathname.split('/')[1] + "/pages/internal/quan_li_file";
      var mode = getUrlParameter("mode");
      var type = getUrlParameter('type');

      printTitle(type);

      function getFormData($form) {
        $('.alert i').removeClass('far fa-check-circle').addClass('fas fa-exclamation-circle');
        $('.alert').css("color", "orange");
        $('.alert h3').text("Vui lòng chờ ... ");
        $('.list').empty();
        $('.btn-save').hide();
        $('.alert').toggleClass("hide");
        $("#close").addClass("hide");

        var mode = getUrlParameter("mode");
        var data = new FormData($form[0]);

        data.append('trung_cap_1', $("input[name=trung_cap_1]").is(':checked') ? 1 : 0);
        data.append('cao_dang_1', $("input[name=cao_dang_1]").is(':checked') ? 1 : 0);
        data.append('cu_nhan_1', $("input[name=cu_nhan_1]").is(':checked') ? 1 : 0);
        data.append('thac_si_1', $("input[name=thac_si_1]").is(':checked') ? 1 : 0);
        data.append('trung_cap_2', $("input[name=trung_cap_2]").is(':checked') ? 1 : 0);
        data.append('cao_dang_2', $("input[name=cao_dang_2]").is(':checked') ? 1 : 0);
        data.append('cu_nhan_2', $("input[name=cu_nhan_2]").is(':checked') ? 1 : 0);
        data.append('thac_si_2', $("input[name=thac_si_2]").is(':checked') ? 1 : 0);
        data.append('type', type);

        if (mode == 'create') {
          $.ajax({
            method: "POST",
            url: origin + "/Route.php?controller=DuTuyenController&page=du-tuyen&action=store",
            data: data,
            contentType: false,
            mimeType: "multipart/form-data",
            processData: false,
            cache: false,
            success: function(response) {
              console.log(response);


              var result = JSON.parse(response);

              $('#close').removeClass('hide');
              $('.alert h3').text(result.msg);
              $('.list').empty();
              if (result.status != 200) {
                status = 1;
                $('.alert').css("color", "red");
                $('.alert i').removeClass('far fa-check-circle').addClass('fas fa-exclamation-circle');
                var errors = Object.entries(result.errors);

                errors.forEach(entry => {
                  const [key, value] = entry;
                  $('.list').append('<li>' + value + '</li>');
                  // $('#' + key).css('color', 'red');
                  // $('input[name=' + key + ']').css('border', '1px solid red !important');
                  $('input[name=' + key + ']').css('background', 'red');

                });

              } else {
                status = 0;
                $('.alert').css("color", "green");
                $('.alert i').removeClass('far fa-exclamation-circle').addClass('fas fa-check-circle');


              }

            },
            error: function(response) {
              //  console.log(response);
              $('.alert h3').text("Errors");
              $('.alert').css("color", "red");
              $('.alert i').removeClass('far fa-check-circle').addClass('fas fa-exclamation-circle');
              $('.alert').toggleClass("hide");
            }


          });

        } else if (mode == 'edit') {

          $.ajax({
            method: "POST",
            url: origin + "/Route.php?controller=DuTuyenController&page=du-tuyen&action=update&id=" + getUrlParameter('id'),
            data: data,
            contentType: false,
            mimeType: "multipart/form-data",
            processData: false,
            cache: false,
            success: function(response) {
              console.log(response);
              var result = JSON.parse(response);
              //  console.log(response);
              $('.alert h3').text(result.msg);
              $('.list').empty();
              $('#close').removeClass('hide');
              if (result.status != 200) {
                $('.alert').css("color", "red");
                $('.alert i').removeClass('far fa-check-circle').addClass('fas fa-exclamation-circle');
                var errors = Object.entries(result.errors);
                status = 1;
                errors.forEach(entry => {
                  const [key, value] = entry;
                  $('.list').append('<li>' + value +
                    '</li>');
                  // $('#' + key).css('color', 'red');
                  $('input[name=' + key + ']').css('border', '1px solid red');

                });
              } else {
                status = 0;
                $('.alert').css("color", "green");
                $('.alert i').removeClass('far fa-exclamation-circle').addClass('fas fa-check-circle');


              }

            },
            error: function(response) {
              $('.alert h3').text("Errors");
              $('.alert').css("color", "red");
              $('.alert i').removeClass('far fa-check-circle').addClass('fas fa-exclamation-circle');
              $('.alert').toggleClass("hide");
            }


          });

        }

      };

      function getData(id) {

        var data = new FormData($("#hoc_bong_form")[0]);
        $.ajax({
          method: "GET",
          url: origin + "/Route.php?page=du-tuyen&action=get&id=" + id,
          success: function(response) {
            var result = JSON.parse(response);
            
            var data = result.data;
            printTitle(data.type);
            $("#chon_anh p").hide();
            $("textarea[name=thanh_tich").val(data.thanh_tich);
            $('#img_avatar').attr('src', data.avatar);

            for (const [key, value] of Object.entries(data)) {
              if ($('input[name=' + key + ']').prop('type') == 'file') {
                $('input[name=' + key + ']').val('');
              } else {
                $('input[name=' + key + ']').val(value);

                if (value == 1) {
                  $('input[name=' + key + ']').prop('checked', true);
                }
              }



            }

          },
          error: function(response) {
            $('.alert h3').text("Errors");
            $('.alert').css("color", "red");
            $('.alert i').removeClass('far fa-check-circle').addClass('fas fa-exclamation-circle');
            $('.alert').toggleClass("hide");
          }


        });

      }

      if (mode == 'edit' || mode == 'view') {
        getData(getUrlParameter('id'));
      }

      if (mode == 'edit' || mode == 'create') {
        $('.btn-print').hide();
      } else {
        $('.btn-save').hide();
      }

      function printTitle(type) {

        if (type == 0) {
          $('#title').html('PHIẾU ĐĂNG KÝ DỰ TUYỂN-GIÁO VIÊN CƠ HỮU <br> APPLICATION FORM-FULL TIME TEACHERS');
        } else if (type == 1) {
          $('#title').html('PHIẾU ĐĂNG KÝ DỰ TUYỂN-GIÁO VIÊN NÒNG CỐT TIỀM NĂNG <br> APPLICATION FORM-POTENTIAL SEED TEACHERS');
        }
      }


    });
  </script>
<script>
    getConfig();
    let config = 0;

    function getConfig() {
        var origin = window.location.origin + "/" + window.location.pathname.split('/')[1] + "/pages/internal/quan_li_file";
        $.ajax({
            method: "GET",
            url: origin + "/Route.php?controller=BaseController&action=getConfig&page=base",
            success: function(response) {
                config = response;
             
                result = JSON.parse(response);
                let img_src = $("img").attr("src");
             
                $("img").attr("src", result.origin + "/" + img_src);

                var hrefArray = document.getElementsByTagName("a");
                for (var i = 0; i < hrefArray.length; i++) {
                   if (hrefArray[i].getAttribute("href") != '#')
                      hrefArray[i].setAttribute("href", result.origin + hrefArray[i].getAttribute("href"));
                }
            },

            error: function(response) {
                console.log(response);
            }
        });
    }
</script>
</body>

</html>