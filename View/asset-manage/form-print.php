<!DOCTYPE html>

<html>

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="icon" type="image/png" href="https://172.16.0.99:8008/crm/images/lsts_icon/lsts_icon_48.png" sizes="48x48">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

  <title>
    Đơn xin học bổng hiếu học 2
  </title>
  <!--  -->


  <style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600');

    .gia_canh_hoc_sinh_tb td {
      padding: 11px !important;
    }

    * {
      font-family: "Roboto Condensed", Helvetica, Arial, sans-serif !important;
    }

    body {

      margin: 0;
      padding: 0;
      font-size: 14px !important;
      line-height: 22.3px;
      background-color: gainsboro;
    }



    .divPage_1024 {
      background-color: #ffffff;
    }

    .tieu_ngu_boder {
      float: right;
      padding-right: 87px;
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



    .text_header {

      text-align: center;
      /* margin-bottom: 15px; */
      font-size: 26px;
      font-weight: bold;
      line-height: 1.5;
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

    .ho_so_dinh_kem td {
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

    #hoa_don td:first-child {
      text-align: center;
    }

    .table-no-border td input[type="text"],
    td select {
      text-align: center;
      /* padding-left: 5px; */
      padding: 0 !important;
      border-bottom: 1px dotted black !important;
      margin: 0 !important;
    }

    .thanh_tich_hoc_tap_2 td input[type="text"] {
      border-bottom: 1px dotted black !important;
    }

    .input-sign td input[type=text] {
      margin-top: 70px !important;
      margin-bottom: 5px !important;
    }

    @page {
      size: A4;
      margin: 25mm 25mm 25mm 25mm;

    }


    @media print {


      input,
      td,
      strong,
      label,
      th,
      p {
        font-size: 11pt !important;
        line-height: 1.3;
      }

      input td {
        padding: 0 !important;
        font-size: 11pt !important;
    
        /* text-align: center; */
      }
      p {
        line-height:0.6;
      }
      .text_header {
        text-align: center !important;
        font-size: 13pt !important;
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

      .table-no-border td {
        text-align: center !important;
      }


    }
 
  </style>

</head>

<body>



  <button type="button" id="print" class="save">Print <i class="fas fa-print"></i></button>
  <button type="button" class="save" id="save" style="background-color: red;">Save <i class="far fa-save"></i></button>
  <div id="divBodyContent" style="background-color: gainsboro;">

    <form id="hoc_bong_form" enctype="multipart/form-data" method="POST">

      <div id="body" style="width: 840px; background-color: #ffffff; margin-right:2px !important">

        <div class="image_boder">
          <div style="margin-left: 50px;"> <svg id="barcode"></svg></div>

          <div class="img_boder_in" style="display: flex;">

            <div style="margin: 0 auto;">
              <div class="text_header">
                PHIẾU NHẬN ĐỒNG PHỤC VÀ VỞ TẬP <br>
                UNIFORM AND NOTERBOOK RECEIPT FORM
  </div>
            </div>
          </div>

        </div>



        <div class="body-content" style="margin:0 50px;">
          <table style="width: 100%" class="table-no-border">
            <tbody>
              <tr>
                <td style="border: none !important;width: 82px;" id="student_fullname"> <strong>Họ và tên <br> Full name: </strong>
                </td>
                <td style="">
                  <input style="width:200px" type="text" value="" name="student_fullname">
                </td>

                <td style="border: none !important;width: 90px;"> <strong>Mã học sinh <br> Std. Code: </strong>
                </td>
                <td style="width: 200px;">
                  <input type="text" value="" name="student_id">
                </td>

                <td style="border: none !important;width: 62px;" id="dan_toc"> <strong> Lớp <br> Class: </strong>
                </td>
                <td style="">
                  <input type="text" value="" name="class_id">
                </td>


              </tr>

            </tbody>
          </table>


        </div>

        <div class="ho_so_dinh_kem" style="margin:5px 50px">
          <!-- <u class="title__big" style="margin: 38px;">Hồ sơ đính kèm:</u> -->
          <table class="thanh_tich_hoc_tap_2" id="hoa_don">
            <thead>
              <tr class="text-center">

                <th>Số thứ tự <br> No. </th>
                <th>Tên hàng<br>Items</th>
                <th>Số lượng<br>Quantity</th>
                <th>Đơn giá<br>Unit price</th>
                <th style="width:74px">Thành tiền<br>Ammount</th>
                <th style="width:74px">Size<br>Kích thước</th>
                <th style="width:74px">Ghi chú<br>Remarks</th>
              </tr>
            </thead>
            <tbody id="hoa_don_tbody">


            </tbody>
            <tfoot>
              <tr>
                <td colspan="4" id="total">
                  <b> Tổng cộng/Total: </b>

                </td>
                <td colspan="3">
                  <input style="width:20px" type="checkbox" name="" id="">Cash/Tiền mặt<br>
                  <input style="width:20px" type="checkbox" name="" id="">Bank/Chuyển khoản
                </td>

              </tr>
            </tfoot>


          </table>
        </div>
        <!-- <div style="float: right;margin-right: 50px;margin-top: 50px;">
          <div style="text-align:center">
            Ngày phát phiếu <input type="text" name="" id="" style="width:auto;border:none !important;padding:0;font-size:15px !important;text-align:left;
          border-bottom:1px dotted black !important; border-radius:0 !important">
            <p style="font-weight:bold">NGƯỜI PHÁT PHIẾU / FORM DELIVER </p>
            <p>(Ký và ghi rõ họ tên / Signed and write full name)</p>
            <input type="text" name="from_deliver" id="" style="margin-top:70px;width:auto;border:none !important;padding:0;font-size:15px !important;text-align:left;
          border-bottom:1px dotted black !important; border-radius:0 !important; text-align:center">
          </div>
        </div> -->

        <div style="text-align: center;display:inline-block; width:100%;">
          <p>PHẦN GIAO VÀ NHẬN ĐỒNG PHỤC, VỞ TẬP / DELIVERED AND RECEIVED UNIFORM AND NOTEBOOK</p>
          <p>Chúng tôi xác nhận đồng phục và vở tập đã được giao và nhận theo đúng số lượng, size hoặc quy cách nêu trên </p>
          <p>We here by confirm uniform and notebook that were be delivered and received as above size and specification</p>

        </div>
        <table class="table-no-border">
          <thead>
            <tr>
              <td style=" text-align: center;">
                <b>NGƯỜI GIAO / DELIVER</b><br>
                (Ký và ghi rõ họ tên )<br>
                (Signed and write full name)<br>
                </th>
              <td style="text-align: center;">
                <b> NGƯỜI NHẬN/ RECEIVER</b>
                <br>
                (Ký và ghi rõ họ tên )<br>
                (Signed and write full name)<br>

                </th>
            </tr>
          </thead>
          <tbody>
            <tr class="input-sign">
              <td style="text-align: center;"><input style="text-align: center;  width:60%" type="text" name="deliver" id=""></td>
              <td style="text-align: center;"><input style="text-align: center; width:60%" type="text" name="receiver" id=""></td>
            </tr>
          </tbody>
        </table>

      </div>

  </div>
  </form>

  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.4/dist/JsBarcode.all.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {



      $('#print').click(function() {
        window.print();


      });
      let status = 0;

      $('#close').click(function() {
        $('.alert').toggleClass("hide");
        if (status == 1) {
          $('#save').show();
        }


      });
      $('#send').click(function() {
        $(".modal-mail").toggleClass("hide");
      });
      var origin = window.location.origin + "/pages/MVC";

  

      function getData(id) {

        var data = new FormData($("#hoc_bong_form")[0]);
        $.ajax({
          method: "GET",
          url: origin + "/Route.php?page=uniform&action=get&id=" + id,
          success: function(response) {

            var result = JSON.parse(response);

            var data = result.data;
            getBill(data.student_id);
            createBarCode(data.student_id);
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

      function getBill(id) {
        $.ajax({
          method: "GET",
          url: origin + "/Route.php?page=uniform&action=getBill&id=" + id,
          success: function(response) {

            var result = JSON.parse(response).data;
            addBill(result);

          },
          error: function(response) {
            $('.alert h3').text("Errors");
            $('.alert').css("color", "red");
            $('.alert i').removeClass('far fa-check-circle').addClass('fas fa-exclamation-circle');
            $('.alert').toggleClass("hide");
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
        if (data) {
          let out = "";
          for (var i = 0; i < data.length; i++) {
            total += calculateAmount(data[i].quantity, data[i].price);
            out += ' <tr ><th scope="row">' + (i + 1) + '</th>' +
              ' <td> ' + data[i].name + '<br>' + data[i].en_name + '</td>' +
              ' <td>' + data[i].quantity + ' </td>' + ' <td>' + formatPrice(data[i].price) + '</td>' +
              ' <td>' + formatPrice(calculateAmount(data[i].quantity, data[i].price)) + '</td>';



            out += '<td>' + data[i].size_name + '</td>';
            out += '<td>' + data[i].note + '</td>';


            out += "</tr>";



          }
          $('#total').append(formatPrice(total));
          $('#hoa_don_tbody').append(out);
          // $('select').select2();

        }
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

      $('input[name=lop]').change(addRow);


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

      getConfig();
      let config = 0;

      function getConfig() {
        var origin = window.location.origin + "/pages/MVC";
        $.ajax({
          method: "GET",
          url: origin + "/Route.php?controller=BaseController&action=getConfig&page=base",
          success: function(response) {
            console.log(response);
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
    });
  </script>

  <script>
    function createBarCode(id) {
      JsBarcode("#barcode")
        .options({
          font: "OCR-B"
        })
        .CODE128(id, {
          fontSize: 14,
          textMargin: 0,
          height: 40
        })
        .render();
    }
  </script>