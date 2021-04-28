<div id="footer" class="bg-light">
   <p style="text-align: center;padding:15px">Copyright © 2021, Created by: <u>Trần Đình Huy</u></p>
</div>

<!-- http://127.0.0.1:8000/quan_li_file/base/api/getConfig -->
<style>
   *{
      font-family: "Roboto Condensed", Helvetica, Arial, sans-serif !important;
   }
</style>
<script>
   getConfig();

   function getConfig() {
      var origin = window.location.origin + "/" + window.location.pathname.split('/')[1];
      $.ajax({
         method: "GET",
         url: origin + "/base/api/getConfig",

         success: function(response) {
        
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