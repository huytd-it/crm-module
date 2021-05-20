<!DOCTYPE html>
<!-- saved from url=(0047)http://127.0.0.1:5500/LSTS%20CRM.html?mode=view -->
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta property="og:locale" content="vi_VN">

  <link rel="stylesheet" href="/jquery-ui-1.12.1/jquery-ui.css">

  <link rel="icon" type="image/png" href="https://172.16.0.99:8008/crm/images/lsts_icon/lsts_icon_48.png" sizes="48x48">
  <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">


  <title>
    Đơn xin học bổng hiếu học 2
  </title>

  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <meta name="theme-color" content="#cd1818">


  <style>
    .gia_canh_hoc_sinh_tb td {
      padding: 11px !important;
    }

    body {
      margin: 0;
      padding: 0;
      font-size: 14px !important;
      line-height: 22.3px;
      background-color: gainsboro;
    }

    .header {
      display: flex;

    }

    .divPage_1024 {
      background-color: #ffffff;
    }

    .tieu_ngu_boder {
      float: right;
      padding-right: 87px;
    }

    .tieu_ngu {
      width: 90%;
      text-align: center;
      font-size: 18px;
    }

    .title__big {
      text-transform: uppercase;
      font-size: 16px;
      font-weight: bold;
      text-align: center;
      padding: 5px;
    }

    .text__boder {
      border: 1px solid black;
      display: inline;
      padding: 5px;
      float: right;
      margin-top: 0px;
    }

    .img_boder_in {
      width: 100%;
      display: flex;
      margin-left: 44px;
    }

    .text_header {
      margin-top: -25px;
      /* margin-bottom: 15px; */
      font-size: 18px;
      font-weight: bold;
    }

    .table-no-border td {
      border: none;
      font-size: 16px;
      padding: 15px;
    }

    .table-no-border tr {
      border: none;

    }

    .table-no-border th {
      border: none;
      font-size: 16px;

    }

    table {
      width: 100%;

    }

    input,
    select {

      color: #000000;
    }

    input:disabled,
    option:disabled,
    select:disabled {
      color: #000000;
    }

    .ky_ten td {
      text-align: center;
      border: none;

    }

    .ho_so_dinh_kem td:not(:first-child) {
      padding-left: 15px !important;
    }

    .form-floating input {
      /* border-bottom: 1px dotted black !important; */
      text-align: left;
      padding-left: 15px;
      width: 95%;
    }

    .ma_so input {
      text-align: left;
      border-bottom: 1px dotted black;
    }

    input,
    select {
      font-weight: bold;
      font-size: 16px;
      text-align: center;
      width: 100%;
      border: none;
      font-family: 'Times New Roman', Times, serif, sans-serif;

    }

    p input,
    td input,
    td select {
      border: none !important;
      border-radius: 0px !important;
      font-size: 14px !important;

    }

    p input,
    td input,
    td select,
    strong,
    td {
      font-size: 14px !important;

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

    input[type=mail] {

      font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    input[type=mail]:focus {
      border-bottom: 3px solid #1296ba;
      transition: border .3s ease-in-out;
    }

    input[type="file"] {
      width: 100%;
    }

    #divBodyContent {
      display: flex;
      justify-content: center;
      width: 100%;
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

    .modal-mail {
      position: fixed;
      margin: 0;
      padding: 0;
      width: 100%;
      left: 50%;
      transform: translate(-50%);
      height: 100%;
      text-align: center;
      background-color: rgba(0, 0, 0, 0.534);
      color: #17a2b8;
    

    }

    .hiden {
      display: none;
    }

    .alert-body {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 25px;
      border-radius: 15px;
      background-color: #ffffff;
      width: 500px;

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
      animation:
        fade_2 .7s ease-out 0s alternate 1 none running;

    }

    .list_wrapper {
      display: flex;
      justify-content: center;
      overflow: auto;

    }

    @keyframes fade_2 {
      from {
        color: transparent;
        transform: scale(.2);
        transform: translateY(-50%);


      }

      to {
        transform: scale(1.1);
      }
    }

    @keyframes fade {
      from {
        color: transparent;
        transform: translateX(-50%);

      }

      to {}
    }

   
    .save {
      position: fixed;
      bottom: 20px;
      left: 20px;
      padding: 15px;
      background-color: #1296ba;
      border: none;
      border-radius: 5px;
      color: white;
      font-weight: bold;
      cursor: pointer;
      outline: none;
    }

    #print {
      position: fixed;
      bottom: 90px;
      left: 20px;
      padding: 15px;
      background-color: #42646d;
      border: none;
      border-radius: 5px;
      color: white;
      font-weight: bold;
      cursor: pointer;
      outline: none;
    }

    .save:hover {
      background-color: black;
    }

    table {
      border-collapse: collapse;
    }

    th,
    td {
      border: 1px solid black;
      padding: 2px !important;


    }

    table th {
      text-align: center;
    }

    body {
      background-color: white;
    }

    .form-floating input[type="file"] {
      
      border: none;
    }

    .hide {
      display: none;
    }

    .lds-dual-ring {
      position: relative;
      display: inline-block;
      width: 80px;
      height: 80px;
      top: 0;


    }

    .lds-dual-ring:after {
      content: " ";
      display: block;
      width: 150px;
      height: 150px;
      margin: 8px;
      border-radius: 50%;
      border: 16px solid orange;
      border-color: orange transparent orange transparent;
      animation: lds-dual-ring 1.2s linear infinite;
    }


    .table-no-border td input[type="text"],
    td select {
      text-align: left;
      /* padding-left: 5px; */
      padding: 0 !important;
      border-bottom: 1px dotted black !important;
      margin: 0 !important;
    }
    .thanh_tich_hoc_tap_2 td input[type="text"] {
      border-bottom: 1px dotted black !important;
    }
    @page {
      size: A4;
      margin: 0;

    }

    @media print {
      body {
        margin-top: 5px;
        margin-left: 5px;
        margin-right: 2px;
        margin-bottom: 5px;

      }

      input,
      td,
      strong,
      th,
      p {
        font-size: 16px !important;
       
        /* font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; */
      }

      td input {
        padding: 0 !important;
        font-size: 16px !important;
        /* border-bottom: none  !important; */
      }

      #body {
        width: 21cm;
        height: 29.7cm;
        box-shadow: none;


      }

      .save {
        display: none !important;
      }

      .alert,
      .hiden_div {
        display: none !important;
      }




    }

  </style>
</head>

<body>

  <div class="alert hide">
    <div class="alert-body">
      <i class="fas fa-check-circle fa-10x"></i>
      <h3>Thành công</h3>
      <div class="list_wrapper">
        <ol class="list">

        </ol>
      </div>
      <button type="button" style="width:50px;height:50px;border-radius:50%;position:absolute;top:10px;right:10px;background-color:transparent;border:1px solid black;border-color:inherit; color:inherit;font-size:30px;padding:5px 15px;cursor:pointer;outline:none" id="close">&times;</button>
    </div>
  </div>

  <button type="button" id="print" class="save">Print <i class="fas fa-print"></i></button>
  <button type="button" class="save" id="save" style="background-color: red;">Save <i class="far fa-save"></i></button>
  <div id="divBodyContent" style="background-color: gainsboro;">
    <form id="hoc_bong_form" enctype="multipart/form-data" method="POST">
      <div class="modal-mail">
        <div class="alert-body">
          <h3>Mail xác nhận</h3>
          <input type="mail" required name="to_mail" style="padding: 5px;outline:none; border: 1px solid #1296ba;">
          <button type="button" class="save" id="send">Xác nhận</button>
        </div>
      </div>

      <div id="body" style="width: 840px; background-color: #ffffff; margin-top:15px;margin-right:2px !important">
        <div class="header">
          <div class="tieu_ngu">
            <div class="tieu_ngu_boder">
              <strong>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</strong><br>

              <strong style="border-bottom: 1px solid black;">Độc lập - Tự do - Hạnh phúc</strong>


            </div>
          </div>
          <div class="ma_so" style="margin-right:20px">
            <p style="text-align: right;font-size: 13px;" class="text__boder">Số:
              <input type="text" style=" width: 36px;font-size: 13px " name="so_thu_tu">Năm học: <input type="text" name="nam_hoc" style=" width: 60px; font-size: 13px !important;" value="2020-2021">
            </p>
            <p style="text-align: right;font-size: 13px;" class="text__boder" id="khoi">Lớp <input type="text" style=" width: 20px;border: none;font-size: 13px;" name="lop"></p>

          </div>

        </div>



        <div class="image_boder">
          <div class="img_boder_in">
            <div style="width:20%">

              <input type="file" id="imgInp" style="display: none;" name="avatar">


              <img id="img_avatar" src="../View/publish/images/anh_3_4.png" style="margin-top: -95px;max-width:123px;max-height: 150px;">
            </div>

            <div>
              <p class="text_header">ĐƠN XIN CẤP HỌC BỔNG HIẾU HỌC LAWRENCE S. TING</p>
              <p>
                <u> Kính gửi:</u><strong> Ban Giám hiệu trường THCS và THPT Đinh Thiện Lý </strong>
              </p>

            </div>
          </div>

        </div>



        <div class="body-content" style="margin:0 19px;">
          <table style="width: 100%" class="table-no-border">
            <tbody>
              <tr>
                <td style="border: none !important;width: 140px;" id="ho_ten_hs"> <strong>Họ và tên học sinh: </strong>
                </td>
                <td style="">
                  <input type="text" value="" name="ho_ten_hs">
                </td>

                <td style="border: none !important;width: 73px;"> <strong>Giới tính: </strong>
                </td>
                <td style="width: 99px;;">
                  <select name="gioi_tinh" id="gioi_tinh">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                  </select>
                </td>

                <td style="border: none !important;width: 62px;" id="dan_toc"> <strong>Dân tộc: </strong>
                </td>
                <td style="">
                  <input type="text" value="" name="dan_toc">
                </td>


              </tr>

            </tbody>
          </table>
          <table style="width: 100%" class="table-no-border">
            <tbody>

              <tr>
                <td style="border: none !important;width: 144px;" id="nam_sinh_hs">Ngày tháng năm sinh
                </td>
                <td style="">
                  <input type="text" class="datepicker" value="" name="nam_sinh_hs">
                </td>
                <td style="border: none !important;width: 62px;" id="noi_sinh_hs">Nơi sinh:
                </td>
                <td style="">
                  <input type="text" value="Việt Nam" name="noi_sinh_hs">
                </td>
              </tr>
            </tbody>
          </table>


          <table style="width: 100%" class="table-no-border">
            <tbody>
              <tr>

                <td style="border: none !important;width: auto;" id="dia_chi_thuong_tru_hs">Địa chỉ thường trú:</td>
                <td style="" colspan="3">
                  <input type="text" value="" name="dia_chi_thuong_tru_hs">
                </td>
              </tr>

              <tr>

                <td style="border: none !important;width: 132px;" id="dia_chi_cu_tru_hs">Nơi cư trú hiện nay:</td>
                <td style="" colspan="3">
                  <input type="text" value="" name="dia_chi_cu_tru_hs">
                </td>
              </tr>

            </tbody>
          </table>
          <table style="width: 100%" class="table-no-border">
            <tbody>
              <tr>
                <td style="border: none !important;width: 106px;" id="ho_ten_cha"> <strong>Họ và tên cha: </strong>
                </td>
                <td style="width: 150px;">
                  <input type="text" value="" name="ho_ten_cha">
                </td>

                <td style="border: none !important;width: 70px;" id="nam_sinh_cha"> <strong>Sinh năm</strong>
                </td>
                <td style="width: 96px;">
                  <input type="text" value="" name="nam_sinh_cha">
                </td>

                <td style="border: none !important;width: 126px;" id="trinh_do_hoc_van_cha"> <strong>Trình độ học
                    vấn</strong>
                </td>
                <td style=""><input type="text" value="" name="trinh_do_hoc_van_cha">
                </td>


              </tr>

            </tbody>
          </table>


          <table style="width: 100%" class="table-no-border">
            <tbody>
              <tr>

                <td style="border: none !important;width: 128px;">Địa chỉ thường trú:</td>
                <td style="" colspan="3"> <input type="text" value="" name="dia_chi_thuong_tru_cha">
                </td>
              </tr>

            </tbody>
          </table>
          <table style="width: 100%" class="table-no-border">
            <tbody>

              <tr>

                <td style="border: none !important;width: 132px;">Nơi cư trú hiện nay:</td>
                <td style="width: 501px;;" id="dia_chi_cu_tru_cha" colspan="3">
                  <input type="text" value="" name="dia_chi_cu_tru_cha">
                </td>
                <td style="border: none !important;width: 73px;">Điện thoại:</td>
                <td style="" id="sdt_cha" colspan="3">
                  <input type="text" value="" name="std_cha">
                </td>
              </tr>

            </tbody>
          </table>
          <table style="width: 100%" class="table-no-border">
            <tbody>

              <tr>
                <td style="border: none !important;width: 86px;">Nghề nghiệp
                </td>
                <td style="" id="nghe_nghiep_cha">
                  <input type="text" value="" name="nghe_nghiep_cha">
                </td>
                <td style="border: none !important;width: 90px;">Nơi công tác:
                </td>
                <td style="" id="noi_cong_tac_cha">
                  <input type="text" value="" name="noi_cong_tac_cha">
                </td>
              </tr>
            </tbody>
          </table>
          <table style="width: 100%" class="table-no-border">
            <tbody>
              <tr>
                <td style="border: none !important;width: 104px;"> <strong>Họ và tên mẹ: </strong>
                </td>
                <td style=";width: 156px;" id="ho_va_ten_me">
                  <input type="text" value="" name="ho_ten_me">
                </td>

                <td style="border: none !important;width: 70px;" id="nam_sinh_me"> <strong>Sinh năm</strong>
                </td>
                <td style="width: 96px;">
                  <input type="text" value="" name="nam_sinh_me">
                </td>

                <td style="border: none !important;width: 126px;" id="trinh_do_hoc_van_me"> <strong>Trình độ học vấn</strong>
                </td>
                <td style="">
                  <input type="text" value="" name="trinh_do_hoc_van_me">
                </td>


              </tr>

            </tbody>
          </table>


          <table style="width: 100%" class="table-no-border">
            <tbody>
              <tr>

                <td style="border: none !important;width: 125px;">Địa chỉ thường trú:</td>
                <td style="" id="dia_chi_thuong_tru_me" colspan="3"> <input type="text" value="" name="dia_chi_thuong_tru_me"></td>
              </tr>

            </tbody>
          </table>
          <table style="width: 100%" class="table-no-border">
            <tbody>

              <tr>

                <td style="border: none !important;width: 132px;">Nơi cư trú hiện nay:</td>
                <td style="width: 501px;;" id="dia_chi_cu_tru_me" colspan="3"> <input type="text" value="" name="dia_chi_cu_tru_me"></td>
                <td style="border: none !important;width: 80px;">Điện thoại:</td>
                <td style="" id="sdt_me" colspan="3">
                  <input type="text" value="" name="sdt_me">
                </td>
              </tr>

            </tbody>
          </table>
          <table style="width: 100%" class="table-no-border">
            <tbody>

              <tr>
                <td style="border: none !important;width: 89px;">Nghề nghiệp
                </td>
                <td style="" id="nghe_nghiep_me">
                  <input type="text" value="" name="nghe_nghiep_me">
                </td>
                <td style="border: none !important;width: 91px;">Nơi công tác:
                </td>
                <td style="" id="noi_cong_tac_me">
                  <input type="text" value="" name="noi_cong_tac_me">
                </td>
              </tr>
            </tbody>
          </table>





          <!--ANH CHI EM RUOT-->
          <strong>Anh, chị, em ruột</strong>
          <table style="width: 100%" class="table-no-border">
            <tbody>

              <tr>
                <td style="border: none !important;width: 76px;">Họ và tên: </td>
                <td style="" id="anh_chi_1">
                  <input type="text" value="" name="anh_chi_1">
                </td>
                <td style="border: none !important;width: 70px;">Sinh năm: </td>
                <td style="" id="anh_chi_nam_sinh_1">
                  <input type="text" value="" class="datepicker" name="anh_chi_nam_sinh_1">
                </td>
                <td style="border: none !important;width: 94px;">Nơi công tác:
                </td>
                <td style="" id="anh_chi_noi_cong_tac_1">
                  <input type="text" value="" name="anh_chi_noi_cong_tac_1">
                </td>
              </tr>

              <tr>
                <td style="border: none !important;width: 64px;">Họ và tên: </td>
                <td style="" id="anh_chi_2">
                  <input type="text" value="" name="anh_chi_2">
                </td>
                <td style="border: none !important;width: 59px;">Sinh năm: </td>
                <td style="" id="anh_chi_nam_sinh_2">
                  <input type="text" value="" class="datepicker" name="anh_chi_nam_sinh_2">
                </td>
                <td style="border: none !important;width: 80px;">Nơi công tác:
                </td>
                <td style="" id="anh_chi_noi_cong_tac_2">
                  <input type="text" value="" name="anh_chi_noi_cong_tac_2">
                </td>
              </tr>
              <tr>
                <td style="border: none !important;width: 64px;">Họ và tên: </td>
                <td style="">
                  <input type="text" value="" name="anh_chi_3">
                </td>
                <td style="border: none !important;width: 59px;">Sinh năm: </td>
                <td style="" id="anh_chi_nam_sinh_3">
                  <input type="text" value="" name="anh_chi_nam_sinh_3" class="datepicker">
                </td>
                <td style="border: none !important;width: 80px;">Nơi công tác:
                </td>
                <td style="" id="anh_chi_noi_cong_tac_3">
                  <input type="text" value="" name="anh_chi_noi_cong_tac_3">
                </td>
              </tr>


            </tbody>
          </table>
          <!--Người giám hộ-->
          <div class="nguoi_giam_ho">


            <table style="width: 100%" class="table-no-border">
              <tbody>
                <tr>
                  <td style="border: none !important;width: 250px;"> <strong>Họ và tên người giám hộ (Nếu có): </strong>
                  </td>
                  <td style="" id="nguoi_giam_ho">
                    <input type="text" value="" name="nguoi_giam_ho">
                  </td>

                  <td style="border: none !important;width: 70px;"> <strong>Sinh năm</strong>
                  </td>
                  <td style="" id="nam_sinh_nguoi_giam_ho">
                    <input type="text" value="" name="nam_sinh_nguoi_giam_ho" class="datepicker">
                  </td>

                  <td style="border: none !important;width: 130px;" id="trinh_do_hoc_van_nguoi_giam_ho"> <strong>Trình độ học vấn</strong>
                  </td>
                  <td style="">
                    <input type="text" value="" name="trinh_do_hoc_van_nguoi_giam_ho">
                  </td>


                </tr>

              </tbody>
            </table>


            <table style="width: 100%" class="table-no-border">
              <tbody>
                <tr>

                  <td style="border: none !important;width: 125px;">Địa chỉ thường trú:</td>
                  <td style="" id="dia_chi_thuong_tru_nguoi_giam_ho" colspan="3"> <input name="dia_chi_thuong_tru_nguoi_giam_ho" type="text" value=""></td>
                </tr>

              </tbody>
            </table>
            <table style="width: 100%" class="table-no-border">
              <tbody>

                <tr>

                  <td style="border: none !important;width: 132px;">Nơi cư trú hiện nay:</td>
                  <td style="width: 501px;;" id="student_addr" colspan="3"> <input type="text" value="" name="dia_chi_cu_tru_nguoi_giam_ho"></td>
                  <td style="border: none !important;width: 81px;">Điện thoại:</td>
                  <td style="" id="dia_chi_cu_tru_nguoi_giam_ho" colspan="3">
                    <input type="text" value="" name="sdt_nguoi_giam_ho">
                  </td>
                </tr>

              </tbody>
            </table>
            <table style="width: 100%" class="table-no-border">
              <tbody>

                <tr>
                  <td style="border: none !important;width: 89px;">Nghề nghiệp
                  </td>
                  <td style="" id="nghe_nghiep_nguoi_giam_ho">
                    <input type="text" value="" name="nghe_nghiep_nguoi_giam_ho">
                  </td>
                  <td style="border: none !important;width: 92px;">Nơi công tác:
                  </td>
                  <td style="" id="noi_cong_tac_nguoi_giam_ho"> <input type="text" value="" name="noi_cong_tac_nguoi_giam_ho">
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="thanh_tich_hoc_tap">
            <p class="title__big">Thành tích học tập - rèn luyện</p>
            <div class="ket_qua_hoc_tap">
              <table style="width: 100%;" id="ket_qua_hoc_tap_table">
                <thead>
                  <tr>
                    <th colspan="9" class="title__big">1 .Kết quả học tập trong trường</th>
                  </tr>

                  <tr>
                    <th rowspan="2" colspan="2" style="width:200px">Trường</th>
                    <th colspan="3" style="width:800px">Xếp loại và điểm TB các môn cả năm</th>
                    <th colspan="4">Điểm trung bình môn</th>

                  </tr>
                  <tr>


                    <th>ĐTBcn</th>
                    <th>Học lực</th>
                    <th>Hạnh kiểm</th>
                    <th>Toán</th>
                    <th>Lý</th>
                    <th>Hóa</th>
                    <th>Sinh</th>
                  </tr>
                </thead>
                <tbody>

                  <tr>

                    <td style="width: 45px;" id="lop_1">Lớp 6</td>
                    <td id="ten_truong_1" style="width:170px"> <input type="text" value="" name="ten_truong_1"></td>
                    <td id="dtb_ca_nam_1"> <input type="text" value="" name="dtb_ca_nam_1"></td>
                    <td id="hoc_luc_1"> <input type="text" value="" name="hoc_luc_1"></td>
                    <td id="hanh_kiem_1"> <input type="text" value="" name="hanh_kiem_1"></td>
                    <td id="toan_1"> <input type="text" value="" name="toan_1"></td>
                    <td id="ly_1"> <input type="text" value="" name="ly_1"></td>
                    <td id="hoa_1"> <input type="text" value="" name="hoa_1"></td>
                    <td id="sinh_1"> <input type="text" value="" name="sinh_1"></td>
                  </tr>
                  <tr>

                    <td style="width: 45px;" id="lop_2">Lớp 7</td>
                    <td id="ten_truong_2" style="width:170px"> <input type="text" value="" name="ten_truong_2"></td>
                    <td id="dtb_ca_nam_2"> <input type="text" value="" name="dtb_ca_nam_2"></td>
                    <td id="hoc_luc_2"> <input type="text" value="" name="hoc_luc_2"></td>
                    <td id="hanh_kiem_2"> <input type="text" value="" name="hanh_kiem_2"></td>
                    <td id="toan_2"> <input type="text" value="" name="toan_2"></td>
                    <td id="ly_2"> <input type="text" value="" name="ly_2"></td>
                    <td id="hoa_2"> <input type="text" value="" name="hoa_2"></td>
                    <td id="sinh_2"> <input type="text" value="" name="sinh_2"></td>
                  </tr>
                  <tr>

                    <td style="width: 45px;" id="lop_3">Lớp 8</td>
                    <td id="ten_truong_3" style="width:170px"> <input type="text" value="" name="ten_truong_3"></td>
                    <td id="dtb_ca_nam_3"> <input type="text" value="" name="dtb_ca_nam_3"></td>
                    <td id="hoc_luc_3"> <input type="text" value="" name="hoc_luc_3"></td>
                    <td id="hanh_kiem_3"> <input type="text" value="" name="hanh_kiem_3"></td>
                    <td id="toan_3"> <input type="text" value="" name="toan_3"></td>
                    <td id="ly_3"> <input type="text" value="" name="ly_3"></td>
                    <td id="hoa_3"> <input type="text" value="" name="hoa_3"></td>
                    <td id="sinh_3"> <input type="text" value="" name="sinh_3"></td>
                  </tr>
                  <tr>

                    <td style="width: 45px;" id="lop_4">Lớp 9</td>
                    <td id="ten_truong_4" style="width:170px"> <input type="text" value="" name="ten_truong_4"></td>
                    <td id="dtb_ca_nam_4"> <input type="text" value="" name="dtb_ca_nam_4"></td>
                    <td id="hoc_luc_4"> <input type="text" value="" name="hoc_luc_4"></td>
                    <td id="hanh_kiem_4"> <input type="text" value="" name="hanh_kiem_4"></td>
                    <td id="toan_4"> <input type="text" value="" name="toan_4"></td>
                    <td id="ly_4"> <input type="text" value="" name="ly_4"></td>
                    <td id="hoa_4"> <input type="text" value="" name="hoa_4"></td>
                    <td id="sinh_4"> <input type="text" value="" name="sinh_4"></td>
                  </tr>
                  <tr id="lop_5" class="hide">

                    <td style="width: 45px;" id="brother_1_name">Lớp 5</td>
                    <td id="ten_truong_4" style="width:170px"> <input type="text" value="" name="ten_truong_5"></td>
                    <td> <input type="text" value="" name="dtb_ca_nam_5"></td>
                    <td> <input type="text" value="" name="hoc_luc_5"></td>
                    <td> <input type="text" value="" name="hanh_kiem_5"></td>
                    <td><input type="text" value="" name="toan_5"></td>
                    <td> <input type="text" value="" name="ly_5"></td>
                    <td> <input type="text" value="" name="hoa_5"></td>
                    <td> <input type="text" value="" name="sinh_5"></td>
                  </tr>




                </tbody>

              </table>
              <table style="width: 100%;" id="ket_qua_hoc_tap_table_2">

                <tr>
                  <th colspan="5" class="title__big">1 .Kết quả học tập trong trường</th>
                </tr>

                <tr>
                  <th colspan="2" style="width:200px">Trường</th>
                  <th>Xếp loại và điểm TB các môn cả năm</th>
                  <th colspan="2" rowspan="2">Điểm trung bình môn <br> (chỉ ghi lớp 4 và lớp 5)</th>

                </tr>

                <tr>

                  <td style="width: 45px;" id="lop_1">Lớp 1</td>
                  <td id="ten_truong_1" style="width:170px"> <input type="text" value="" name="ten_truong_1"></td>
                  <td id="hoc_luc_1"> <input type="text" value="" name="hoc_luc_1"></td>
                  <!-- <td id="hoc_luc_1"> <input type="text" value="" name="hoc_luc_1"></td>
                    <td id="hoc_luc_1"> <input type="text" value="" name="hoc_luc_1"></td> -->


                </tr>
                <tr>

                  <td style="width: 45px;" id="lop_2">Lớp 2</td>
                  <td id="ten_truong_2" style="width:170px"> <input type="text" value="" name="ten_truong_2"></td>
                  <td id="hoc_luc_2"> <input type="text" value="" name="hoc_luc_2"></td>
                  <th rowspan="2">Toán</th>
                  <th rowspan="2">Tiếng Việt</th>

                </tr>
                <tr>

                  <td style="width: 45px;" id="lop_3">Lớp 3</td>
                  <td id="ten_truong_3" style="width:170px"> <input type="text" value="" name="ten_truong_3"></td>
                  <td id="hoc_luc_3"> <input type="text" value="" name="hoc_luc_3"></td>

                </tr>
                <tr>

                  <td style="width: 45px;" id="lop_4">Lớp 4</td>
                  <td id="ten_truong_4" style="width:170px"> <input type="text" value="" name="ten_truong_4"></td>
                  <td id="hoc_luc_4"> <input type="text" value="" name="hoc_luc_4"></td>
                  <td id="toan_4"> <input type="text" value="" name="toan_4"></td>
                  <td id="ly_4"> <input type="text" value="" name="ly_4"></td>

                </tr>
                <tr id="lop_5">

                  <td style="width: 45px;" id="brother_1_name">Lớp 5</td>
                  <td id="ten_truong_4" style="width:170px"> <input type="text" value="" name="ten_truong_5"></td>

                  <td> <input type="text" value="" name="hoc_luc_5"></td>
                  <td><input type="text" value="" name="toan_5"></td>
                  <td> <input type="text" value="" name="ly_5"></td>

                </tr>





              </table>


              <table style="width: 100%;">
                <thead>
                  <tr>
                    <th colspan="9" style="text-align: center;border-top: none;" class="title__big">2 .Thành tích tại
                      các kỳ
                      thì về văn hóa, thực nghiệm khoa học và khoa học kỹ thuật cấp thành phố trở lên (Nếu có)</th>
                  </tr>


                  <tr>
                    <th>Đơn vị tổ chức</th>
                    <th>Tên tổ chức</th>
                    <th>Giải thưởng</th>
                  </tr>

                </thead>
                <tbody>
                  <tr>
                    <td id="don_vi_1"> <input type="text" value="" name="don_vi_1"></td>
                    <td id="to_chuc_1"> <input type="text" value="" name="to_chuc_1"></td>
                    <td id="giai_thuong_1"> <input type="text" value="" name="giai_thuong_1"></td>
                  </tr>
                  <tr>
                    <td id="don_vi_2"> <input type="text" value="" name="don_vi_2"></td>
                    <td id="to_chuc_2"> <input type="text" value="" name="to_chuc_2"></td>
                    <td id="giai_thuong_2"> <input type="text" value="" name="giai_thuong_2"></td>
                  </tr>
                  <tr>
                    <td id="don_vi_3"> <input type="text" value="" name="don_vi_3"></td>
                    <td id="to_chuc_3"> <input type="text" value="" name="to_chuc_3"></td>
                    <td id="giai_thuong_3"> <input type="text" value="" name="giai_thuong_3"></td>
                  </tr>

                </tbody>
              </table>
              <div>
                <table style="width: 100%;margin-top: 260px;">
                  <thead>
                    <tr style="border:none">
                      <th colspan="9" style="border:none;padding:10px !important"></th>
                    </tr>
                    <tr>
                      <th colspan="9" class="title__big">3. Năng lực tiếng anh (Nếu có)</th>
                    </tr>


                    <tr>
                      <th>Tên chứng chỉ</th>
                      <th>Đơn vị cấp chứng chỉ</th>
                      <th>Điểm/Trình độ</th>
                    </tr>

                  </thead>
                  <tbody>
                    <tr>
                      <td id="chung_chi_1"> <input type="text" value="" name="chung_chi_1"></td>
                      <td id="don_vi_cap_1"> <input type="text" value="" name="don_vi_cap_1"></td>
                      <td id="trinh_do_1"> <input type="text" value="" name="trinh_do_1"></td>
                    </tr>
                    <tr>
                      <td id="chung_chi_2"> <input type="text" value="" name="chung_chi_2"></td>
                      <td id="don_vi_cap_2"> <input type="text" value="" name="don_vi_cap_2"></td>
                      <td id="trinh_do_2"> <input type="text" value="" name="trinh_do_2"></td>
                    </tr>
                    <tr>
                      <td id="chung_chi_3"> <input type="text" value="" name="chung_chi_3"></td>
                      <td id="don_vi_cap_3"> <input type="text" value="" name="don_vi_cap_3" id="don_vi_cap_3"></td>
                      <td id="trinh_do_3"> <input type="text" value="" name="trinh_do_3"></td>
                    </tr>

                  </tbody>
                </table>
              </div>

            </div>

          </div>



          <div>
            <p class="title__big">Gia cảnh học sinh (*)</p>
            <table class="gia_canh_hoc_sinh_tb">

              <tbody>
                <tr>
                  <td> (1) Gia đình là hộ nghèo hoặc hộ cận nghèo</td>
                  <td><input class="form-check-input" type="checkbox" name="ho_ngheo" id="ho_ngheo" style="
    width: auto;
"></td>

                </tr>
                <tr>
                  <td> (2) Cha và/hoặc mẹ là người khuyết tật hoặc mắc bệnh hiểm nghèo không có khả năng lao động,
                    không có thu nhập hoặc thu nhập bình quân tháng trong năm từ tất cả các nguồn thu nhập của gia
                    đình không vượt quá 5000.000VNĐ/tháng</td>
                  <td><input class="form-check-input" type="checkbox" name="khuyet_tat" id="khuyet_tat" style="
    width: auto;
"></td>

                </tr>
                <tr>
                  <td> (3) Mồ côi cha mẹ, sống nhờ sự cưu mang của người thân nhưng người thân cũng có hoàn cảnh rất
                    khó khăn (Khuyết tật, không có khả năng lao động; mắc bệnh hiểm nghèo, không có khả năng lao
                    động; không có thu nhập hoặc có thu nhập bình quân tháng trong năm từ tất cả các nguồn thu
                    nhập không vượt quá 5.000.000 VNĐ/tháng</td>
                  <td><input class="form-check-input" type="checkbox" name="mo_coi" id="mo_coi" style="
    width: auto;
"></td>

                </tr>
              </tbody>
            </table>
            <div class="ket-luan" style="padding: 10px;">
              <p style="
    margin: 0;
">
                Học sinh, cha mẹ học sinh hoặc người nuôi dưỡng học sinh cam đoan mọi thông tin trong đơn này đều đúng
                sự thật. Kính đề nghị Ban Giám hiệu trường THCS và THPT Đinh Thiện Lý xem xét và cấp học bổng hiếu học
                Lawrence S. Ting cho học sinh.
              </p>
              <p style="
    margin: 0;
">Trân trọng,</p>
            </div>

            <table class="ky_ten table-no-border">
              <tbody>
                <tr style="font-weight: bold;">
                  <td id="chu_ky_nguoi_nuoi_duong">Người nuôi dưỡng (**)</td>
                  <td id="chu_ky_cha_me">Cha mẹ học sinh</td>
                  <td id="chu_ky_hoc_sinh">Học sinh</td>
                </tr>
                <tr>
                  <td style="height: 60px; vertical-align: top;">(Ký rõ họ và tên)</td>
                  <td style="height: 60px; vertical-align: top;">(Ký rõ họ và tên)</td>
                  <td style="height: 60px; vertical-align: top;">(Ký rõ họ và tên)</td>
                </tr>
                <tr>
                  <td><input style="border-bottom: 1px dotted black; width: 80%;" type="text" name="chu_ky_nguoi_nuoi_duong"></td>
                  <td><input style="border-bottom: 1px dotted black; width: 80%;" type="text" name="chu_ky_cha_me"></td>
                  <td><input style="border-bottom: 1px dotted black; width: 80%;" type="text" name="chu_ky_hoc_sinh">
                  </td>


                </tr>
              </tbody>
            </table>
          </div>

          <div class="ho_so_dinh_kem" style="
    margin: 15px;
">
            <u class="title__big" style="
    margin: 38px;
">Hồ sơ đính kèm:</u>
            <table class="thanh_tich_hoc_tap_2">
              <thead>
                <tr class="text-center">

                  <th>(***)</th>
                  <th>Loại giấy tờ</th>
                  <th style="width:74px">Ghi chú</th>
                </tr>
              </thead>
              <tbody>

                <tr>

                  <td class="text-center"><input type="checkbox" class="form-check-input" name="giay_khen"></td>
                  <td>Bản sao công chứng Giấy khen <input type="file" name="dinh_kem_giay_khen" class="hiden_div"> </td>
                  <td><input type="text" name="gc_giay_khen"></td>

                </tr>
                <tr>

                  <td class="text-center"><input type="checkbox" class="form-check-input" name="cc_tieng_anh">
                  </td>
                  <td>Chứng chỉ tiếng Anh <input type="file" name="dinh_kem_tieng_anh" class="hiden_div"></td>
                  <td><input type="text" name="gc_cc_tieng_anh"></td>

                </tr>
                <tr>
                  <td class="text-center"><input type="checkbox" class="form-check-input" name="cc_thcs"></td>
                  <td>Bản sao có công chứng học bạ cấp THCS <input type="file" name="dinh_kem_thcs" class="hiden_div"> </td>
                  <td><input type="text"></td>

                </tr>
                <tr>

                  <td class="text-center"><input type="checkbox" class="form-check-input" name="cc_ho_ngheo"></td>
                  <td id="dinh_kem_ho_ngheo">Bản sao có công chứng Chứng nhận hộ nghèo, hộ cận nghèo <input type="file" name="dinh_kem_ho_ngheo" class="hiden_div"> </td>
                  <td><input type="text"></td>

                </tr>
                <tr>

                  <td class="text-center"><input type="checkbox" class="form-check-input" name="cc_khuyet_tat"></td>
                  <td>Bản sao có công chứng Giấy xác nhận người khuyết tật đối với người khuyết tật không có khả
                    năng lao động <input type="file" name="dinh_kem_khuyet_tat" class="hiden_div">

                  </td>
                  <td><input type="text"></td>

                </tr>
                <tr>

                  <td class="text-center"><input type="checkbox" class="form-check-input" name="cc_ho_so_benh_an"></td>
                  <td>Bản sao hồ sơ bệnh án đối với người bị bệnh hiểm nghèo <input type="file" name="dinh_kem_ho_so_benh_an" class="hiden_div">

                  </td>
                  <td><input type="text"></td>

                </tr>
                <tr>

                  <td class="text-center"><input type="checkbox" class="form-check-input" name="ho_so_cm_thu_nhap"></td>
                  <td>Hồ sơ chứng minh thu nhập không vượt quá 5.000.000 VNĐ/tháng xác nhận tại địa phương <input type="file" name="dinh_kem_ho_so_cm_thu_nhap" class="hiden_div">

                  </td>
                  <td><input type="text" width="100%"></td>

                </tr>
                <tr>

                  <td class="text-center"><input type="checkbox" class="form-check-input" name="giay_to_khac"></td>
                  <td>
                    Giấy tờ khác:
                    <div class="form-floating">

                      1.<input type="text" name="giay_to_khac_1"><input type="file" class="hiden_div" name="file_giay_to_khac_1">

                      <br> 2.<input type="text" name="giay_to_khac_2"><input type="file" class="hiden_div" name="file_giay_to_khac_2">

                      <br> 3.<input type="text" name="giay_to_khac_3"><input type="file" class="hiden_div" name="file_giay_to_khac_3">
                      <br> 4.<input type="text" name="giay_to_khac_4"><input type="file" class="hiden_div" name="file_giay_to_khac_4">


                    </div>
                  </td>
                  <td><input type="text" name="gc_giay_to_khac"></td>

                </tr>
              </tbody>
            </table>
          </div>

          <ul style="list-style-type: none;">
            <li><u><b>Lưu ý:</b></u></li>
            <li><b>(*) </b>Thuộc trường hợp nào thì đánh ✓ vào trường hợp đó</li>
            <li> <b>(**)</b>Người nuôi dưỡng ký tên nếu học sinh mồ côi cả cha lẫn mẹ</li>
            <li><b>(***) </b>Nộp loại giấy tờ nào thì đánh ✓ vào ô tương ứng</li>
          </ul>

        </div>

      </div>
    </form>

  </div>


  <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <script type="text/javascript">
    $(function() {
      $(".datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy',
        showAnim: "slide"
      });
    });

    $(document).ready(function() {

      $('#print').click(function() {
        window.print();


      });
      let status = 0;
      // $('.alert').click(function() {
      //   $(".alert").toggleClass("hide");
      // });
      $('#close').click(function() {
        $('.alert').toggleClass("hide");
        if (status == 1) {
          $('#save').show();
        }


      });
      $('#send').click(function() {
        $(".modal-mail").toggleClass("hide");
      });
      var origin = window.location.origin + "/" + window.location.pathname.split('/')[1] + "/pages/MVC";

      function validate(text, number, file) {


        if (text != undefined) {
          var validate_text = {
            ho_ten_hs: 'Họ và tên chưa được điền',
            dan_toc: 'Dân tộc chưa được điền',
            nam_sinh_hs: 'Năm sinh học sinh chưa được điền',
            noi_sinh_hs: 'Nơi sinh chưa được điền',
            dia_chi_thuong_tru_hs: 'Địa chỉ thường trú chưa được điền',
            dia_chi_cu_tru_hs: 'Địa chỉ cư trú chưa được điền',
            trinh_do_hoc_van_cha: 'Trình độ học vấn của cha chưa được điền',
            trinh_do_hoc_van_me: ' Trình độ học vấn của mẹ chưa được điền',
            trinh_do_hoc_van_nguoi_giam_ho: 'Trình độ học vấn của NGH chưa được điền'
          };
          for (var i = 0; i < text.length; i++) {
            $('.list').append('<li>' + validate_text[text[i]] + '</li>');
            $('#' + text[i]).css('color', 'red');

          }

        }
        if (number != undefined) {
          var validate_number = {
            nam_sinh_cha: 'Năm sinh của cha',
            nam_sinh_me: 'Năm sinh của mẹ'
          };
          for (var i = 0; i < number.length; i++) {

            $('.list').append('<li>' + validate_number[number[i]] + ' phải là số ' + '</li>');
            $('#' + number[i]).css('color', 'red');

          }
        }

        if (file != undefined) {
          var validate_file = {
            dinh_kem_ho_ngheo: 'File đính kèm hộ nghèo',

          };
          for (var i = 0; i < file.length; i++) {

            $('.list').append('<li>' + validate_file[file[i]] + ' là file bắt buộc ' + '</li>');
            $('#' + file[i]).css('color', 'red');

          }
        }

      }

      function getFormData($form) {
        var file_data = $('#imgInp').prop('files')[0];
        var data = new FormData($form[0]);

        data.append('avatar', file_data);
        //Checkbox
        data.append('ho_ngheo', $("input[name=ho_ngheo]").is(':checked') ? 1 : 0);
        data.append('khuyet_tat', $("input[name=khuyet_tat]").is(':checked') ? 1 : 0);
        data.append('mo_coi', $("input[name=mo_coi]").is(':checked') ? 1 : 0);
        data.append('giay_khen', $("input[name=giay_khen]").is(':checked') ? 1 : 0);
        data.append('cc_tieng_anh', $("input[name=cc_tieng_anh]").is(':checked') ? 1 : 0);
        data.append('cc_thcs', $("input[name=cc_thcs]").is(':checked') ? 1 : 0);
        data.append('cc_ho_ngheo', $("input[name=cc_ho_ngheo]").is(':checked') ? 1 : 0);
        data.append('cc_khuyet_tat', $("input[name=cc_khuyet_tat]").is(':checked') ? 1 : 0);
        data.append('cc_ho_so_benh_an', $("input[name=cc_ho_so_benh_an]").is(':checked') ? 1 : 0);
        data.append('ho_so_cm_thu_nhap', $("input[name=ho_so_cm_thu_nhap]").is(':checked') ? 1 : 0);
        data.append('giay_to_khac', $("input[name=giay_to_khac]").is(':checked') ? 1 : 0);
        if (Number.parseInt($('input[name=lop]').val()) == 10) {
          for (var i = 1; i <= 4; i++) {
            data.append('hoc_luc_' + i, $("input[name=hoc_luc_" + i + "]").val());
            data.append('ten_truong_' + i, $("input[name=ten_truong_" + i + "]").val());
            data.append('dtb_ca_nam_' + i, $("input[name=dtb_ca_nam_" + i + "]").val());
          }

        }
        $('.alert i').removeClass('far fa-check-circle').addClass('fas fa-exclamation-circle');
        $('.alert').css("color", "orange");
        $('.alert h3').text("Vui lòng chờ ... ");
        $('.list').empty();
        $('#save').hide();
        $('.alert').toggleClass("hide");
        $("#close").addClass("hide");

        if (mode == 'create') {
          $.ajax({
            method: "POST",
            url: origin + "/Route.php?page=hoc-bong&action=store",
            data: data,
            contentType: false,
            mimeType: "multipart/form-data",
            processData: false,
            cache: false,
            success: function(response) {


              var result = JSON.parse(response);

              $('.alert h3').text(result.msg);
              $('#close').removeClass('hide');
              if (result.status != 200) {
                $('.alert').css("color", "red");
                $('.alert i').removeClass('far fa-check-circle').addClass('fas fa-exclamation-circle');

                status = 1;
                var text = result.errors.text;
                var number = result.errors.number;
                var file = result.errors.file;
                validate(text, number, file);

              } else {
                status = 0;
                $('.alert').css("color", "green");
                $('.alert i').removeClass('far fa-exclamation-circle').addClass('fas fa-check-circle');
              }


            },
            error: function(response) {
              //  console.log(response);
              $('.alert h3').text("LỖI");
              $('.alert').css("color", "red");
              $('.alert i').removeClass('far fa-check-circle').addClass('fas fa-exclamation-circle');
              $('.alert').toggleClass("hide");
            }


          });

        } else if (mode == 'edit') {

          $.ajax({
            method: "POST",
            url: origin + "/Route.php?page=hoc-bong&action=update&id=" + id,
            data: data,
            contentType: false,
            mimeType: "multipart/form-data",
            processData: false,
            cache: false,
            success: function(response) {
             
              var result = JSON.parse(response);
              $('.alert h3').text(result.msg);
              $('#close').removeClass('hide');


              $('.list').empty();
              if (result.status != 200) {
                $('.alert').css("color", "red");
                $('.alert i').removeClass('far fa-check-circle').addClass('fas fa-exclamation-circle');
                status = 1;
                var text = result.errors.text;
                var number = result.errors.number;
                var file = result.errors.file;
                validate(text, number, file);

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
          url: origin + "/Route.php?page=hoc-bong&action=get&id=" + id,
          success: function(response) {

            var result = JSON.parse(response);

            var data = result.data;

            $('#img_avatar').attr('src',  data.avatar);
            $('#gioi_tinh').val(data.gioi_tinh);
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
            addRow();
          },
          error: function(response) {
            $('.alert h3').text("Errors");
            $('.alert').css("color", "red");
            $('.alert i').removeClass('far fa-check-circle').addClass('fas fa-exclamation-circle');
            $('.alert').toggleClass("hide");
          }


        });

      }



      function addRow() {
        if (lop != undefined) {
          $('input[name=lop]').val(lop);

        }
        if (Number.parseInt($('input[name=lop]').val()) == 10) {
          $('#ket_qua_hoc_tap_table_2').hide();
          $('#ket_qua_hoc_tap_table').show();
        } else {
          $('#ket_qua_hoc_tap_table_2').show();
          $('#ket_qua_hoc_tap_table').hide();
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

      var mode = getUrlParameter('mode');
      var lop = getUrlParameter('lop');
      //LOP 10 va LOP 6

      $('input[name=lop]').on('input', addRow);


      var id = getUrlParameter('id');




      $('#img_avatar').click(function() {
        $("#imgInp").click();
        $("#imgInp").change(function() {
          readURL(this);
        });
      })


      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#img_avatar').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }

      addRow();
      if (mode == 'view') {
        getData(id);
        $('.modal-mail').css('display', 'none');
        $("input").prop('readonly', true);
        $("select").prop('readonly', true);
        $('#save').hide();

      } else if (mode == 'edit') {
        getData(id);
        $('.modal-mail').css('display', 'none');
        $('#save').click(function() {
          var $form = $("#hoc_bong_form");
          getFormData($form);


        });

        $("input").prop('readonly', false);
        $("select").prop('readonly', false);
        $('#print').hide();

      } else if (mode == 'create') {
        $('#save').click(function() {
          var $form = $("#hoc_bong_form");
          getFormData($form);


        });
        $("input").prop('readonly', false);
        $("select").prop('readonly', false);
        $('#print').hide();
      }


    });
    getConfig();
    let config = 0;

    function getConfig() {
        var origin = window.location.origin + "/" + window.location.pathname.split('/')[1] + "/pages/MVC";
        $.ajax({
            method: "GET",
            url: origin + "/Route.php?controller=BaseController&action=getConfig&page=base",
            success: function(response) {
                config = response;
             
                result = JSON.parse(response);
                let img_src = $("#img_avatar").attr("src");
             
                $("#img_avatar").attr("src", result.origin + "/" + img_src);

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