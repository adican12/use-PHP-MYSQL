



//strat jquery
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
