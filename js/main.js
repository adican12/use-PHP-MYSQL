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

 changeRate(null, 3);

 function changeRate(element, rate=null){
   if(rate == null){
     let id = $(element).attr('for');
     let rateAux = $('#'+id).val();
     $('#rate').val(rateAux);
   }else{
     let rateAux = $("#rate").val();
     $("#lblStar"+rateAux).click();
   }
   console.log($('#rate').val());
 }
