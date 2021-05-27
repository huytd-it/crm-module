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
          <a href="#" class=lang vi="Kê khai hàng ngày(tại trường)" onclick="_loadPageContentURL('pages/MVC/View/asset-manage/admin.php');">
            Đồng phục
          </a>
 
        </li>

        <li class="" id="li_report">
          <a href="#" class=lang vi="Báo cáo" onclick="_loadPageContentURL('pages/MVC/View/asset-manage/sizes.admin.php');" class=lang>Kho đồ</a>

        </li>

      </ul>
    </div>
  </div>
</div>
<div id="divPageContent">

</div>


<script src="pages/MVC/View/publish/js/jquery.controller.js"></script>


<script type="text/javascript">
  setupMenuTab();
  window.onload = _loadPageContentURL('pages/MVC/View/asset-manage/admin.php');
 
</script>