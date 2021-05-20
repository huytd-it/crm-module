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



<br>

<div class="list-categories">
  <div class="wrapper">


    <div class="inner">
      <ul class="no-bullets menuTab" id=ulList_2>
        <li class="active" id="li_online">
          <a href="#" class=lang vi="Kê khai hàng ngày(tại trường)" onclick="_loadPageContentURL('pages/MVC/View/asset-manage/uniform-form.php');">
            Đồng phục
          </a>
        </li>
        <li id="li_hoc_bong">
          <a href="#" class=lang vi="Kê khai hàng ngày(tại trường)" onclick="_loadPageContentURL('pages/MVC/View/asset-manage/update-form.php');">
            Kiểm tra
          </a>
        </li>


      </ul>
    </div>
  </div>
</div>
<div id="divPageContent" >

</div>


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
  _loadPageContentURL('pages/MVC/View/asset-manage/uniform-form.php');
</script>