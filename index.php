<?php



header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

try {
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<br>

<div class="list-categories">
    <div class="wrapper">


        <div class="inner">
            <ul class="no-bullets menuTab" id=ulList_2>
                <li class="active" id="li_online">
                    <a href="#" class=lang vi="Kê khai hàng ngày(tại trường)" onclick="_loadPageContentURL('pages/internal/quan_li_file/View/du-tuyen/du-tuyen-admin.php');">
                        Dự tuyển
                    </a>
                </li>
                <li id="li_hoc_bong">
                    <a href="#" class=lang vi="Kê khai hàng ngày(tại trường)" onclick="_loadPageContentURL('pages/internal/quan_li_file/View/hoc-bong/admin_list.php');">
                        Học bổng
                    </a>
                </li>

                <!-- <li class="" id="li_listing">
                 
                </li>    -->

                <!-- <li class="" id="li_report">
                    <a href="#" class=lang vi="Báo cáo">Report</a>
                    <ul>
                        <li id=li_report_1><a href="#" onclick="check_access('pages/internal/online_medical/report_1.php');"  class=lang vi="Danh sách DS GVNV chưa báo cáo ngày"> DS GVNV chưa báo cáo ngày</a></li>
                        <li id=li_report_2><a href="#" onclick="check_access('pages/internal/online_medical/report_2.php');"  class=lang vi="DS KÊ KHAI Y TẾ CÁ NHÂN ">DS KÊ KHAI Y TẾ CÁ NHÂN </a></li>
                        <li id=li_report_3><a href="#" onclick="check_access('pages/internal/online_medical/report_3.php');"  class=lang vi="BC TUẦN-THÁNG">BC TUẦN-THÁNG</a></li>

                        <li id=li_report_4><a href="#" onclick="check_access('pages/internal/online_medical/report_4.php');"  class=lang vi="DS HỌC SINH KHAI BÁO  Y TẾ">DS HỌC SINH KHAI BÁO  Y TẾ</a></li>
                    </ul>
                </li>                            -->
            </ul>
        </div>
    </div>
</div>
<div id="divPageContent" style="padding: 0px;background-image: url('images/2019-hinh-toan.jpg');background-size: cover;min-height: 1000px;background-attachment: fixed;">

</div>
<style>

</style>

<?php include_once "View/javascript.php" ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                console.log(config);
                // result = JSON.parse(response);
                // let img_src = $("img").attr("src");
                // $("img").attr("src", result.origin + "/" + img_src);

                // var hrefArray = document.getElementsByTagName("a");
                // for (var i = 0; i < hrefArray.length; i++) {
                //    if (hrefArray[i].getAttribute("href") != '#')
                //       hrefArray[i].setAttribute("href", result.origin + hrefArray[i].getAttribute("href"));
                // }
            },

            error: function(response) {
                console.log(response);
            }
        });
    }
</script>
<script type="text/javascript">
    setupMenuTab();
    _loadPageContentURL('pages/internal/quan_li_file/View/du-tuyen/du-tuyen-admin.php');
</script>