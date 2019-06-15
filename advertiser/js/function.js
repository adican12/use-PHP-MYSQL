function getTheLastId(){
  var x = "<?php echo $row1['MAX(adID)'];?>";
  document.getElementById("panel-body").style.fontSize = "xx-large";
  document.getElementById("panel-body").style.textAlign = "center";
  document.getElementById("panel-body").innerHTML= " Your banner ID is:  " + x + " Please keep your ID in order to use a platform for the campaign";
}

$(document).ready(function () {
 setTimeout(function() {
   $('.succWrap').slideUp("slow");
 }, 3000);
//add to database new ad

$("#ad").submit(function(){
//alert("signup_form");
$("button").prop('disabled', true);
var formData = new FormData(this);
$.ajax({
url:     'insert_ad.php',
type:    'POST',
data:    formData,
async:   false,
success: function(data) {
 alert("success");
   $("#result_ad").html(data);
 $("button").prop('disabled', false);
},
cache: false,
contentType: false,
processData: false
});
return false;
});
$("#formButton").click(function(){
$("#information").toggle();
});
 });
