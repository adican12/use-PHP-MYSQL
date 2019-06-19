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


 document.addEventListener('DOMContentLoaded', function(){
 addListeners();
 setRating(); //based on value inside the div
 });

 function addListeners(){
 var stars = document.querySelectorAll('.star');
 [].forEach.call(stars, function(star, index){
 	star.addEventListener('click', (function(idx){
 		console.log('adding rating on', index);
 		document.querySelector('.stars').setAttribute('data-rating',  idx + 1);
 		console.log('Rating is now', idx+1);
 		setRating();
 	}).bind(window,index) );
 });

 }

 function setRating(){
 var stars = document.querySelectorAll('.star');
 var rating = parseInt( document.querySelector('.stars').getAttribute('data-rating') );
 [].forEach.call(stars, function(star, index){
 	if(rating > index){
 		star.classList.add('rated');
 		console.log('added rated on', index );
 	}else{
 		star.classList.remove('rated');
 		console.log('removed rated on', index );
 	}
 });
 }
