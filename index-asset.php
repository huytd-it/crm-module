<?php



header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

try {
} catch (Exception $e) {
  echo $e->getMessage();
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<br>

<div class="list-categories">
  <div class="wrapper">


    <div class="inner">
      <ul class="no-bullets menuTab" id=ulList_2>
        <li class="active" id="li_online">
          <a href="#" class=lang vi="Kê khai hàng ngày(tại trường)" onclick="_loadPageContentURL('pages/MVC/View/asset-manage/admin.php');">
            Đồng phục
          </a>
        </li>
        <!-- <li id="li_hoc_bong">
          <a href="#" class=lang vi="Kê khai hàng ngày(tại trường)" onclick="_loadPageContentURL('pages/MVC/View/hoc-bong/admin_list.php');">
            Học bổng
          </a>
        </li> -->


      </ul>
    </div>
  </div>
</div>
<div id="divPageContent" >

</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="pages/MVC/view/publish/plugin/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>


<script>

  getConfig();
  let config = 0;

  function getConfig() {
    var origin = window.location.origin + "/" + window.location.pathname.split('/')[1] + "/pages/MVC";
    $.ajax({
      method: "GET",
      url: origin + "/Route.php?controller=BaseController&action=getConfig&page=base",
      success: function(response) {
        config = response;
      
        // result = JSON.parse(response);
        // let img_src = $("img").attr("src");
        // $("img").attr("src", result.origin + "/" + img_src);

        // var hrefArray = document.querySelectorAll("link");
        // for (var i = 0; i < hrefArray.length; i++) {
        //   if (hrefArray[i].getAttribute("href") != '#' || hrefArray[i].getAttribute("href").indexOf('http') != -1 )
        //     hrefArray[i].setAttribute("href", result.origin + "/" + hrefArray[i].getAttribute("href"));
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
  _loadPageContentURL('pages/MVC/View/asset-manage/admin.php');
</script>