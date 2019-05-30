 $(document).ready(function () {

 	$(".ts-sidebar-menu li a").each(function () {
 		if ($(this).next().length > 0) {
 			$(this).addClass("parent");
 		};
 	})
 	var menux = $('.ts-sidebar-menu li a.parent');
 	$('<div class="more"><i class="fa fa-angle-down"></i></div>').insertBefore(menux);
 	$('.more').click(function () {
 		$(this).parent('li').toggleClass('open');
 	});
	$('.parent').click(function (e) {
		e.preventDefault();
 		$(this).parent('li').toggleClass('open');
 	});
 	$('.menu-btn').click(function () {
 		$('nav.ts-sidebar').toggleClass('menu-open');
 	});


	 $('#zctb').DataTable();


	 $("#input-43").fileinput({
		showPreview: false,
		allowedFileExtensions: ["zip", "rar", "gz", "tgz"],
		elErrorContainer: "#errorBlock43"
			// you can configure `msgErrorClass` and `msgInvalidFileExtension` as well
	});

 });
 function initMap() {
   // Map options
   var options = {
     zoom:8,
     center:new google.maps.LatLng(32.109333,34.855499)
   }



   // create a new map in the div googleMap;
   var map = new google.maps.Map(document.getElementById("googleMap"),options);

   // Add Marker
   var marker = new google.maps.Marker({
     position:{lat:32.10933, lng:34.855499},
     map:map
   });

   var infowindow= new google.maps.InfoWindow({
     content:'<h3>HERE WE HAVE A WIFI YOU CAN PUBLISH HERE</h3>'
   });
   // add a listnerr when the click we see the msg.
   marker.addListener('click',function(){
     infowindow.open(map,marker);
   });
}

 </script>

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHvF0bJ9dQXEqbBpy5DGf-9r9ZFt7CHkc&callback=myMap"></script>
