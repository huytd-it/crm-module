
function readURL(input_file) {
  if (input_file.files && input_file.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
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
