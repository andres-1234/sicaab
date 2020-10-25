// js para barra de navegación fija

$(document).ready(function(){
	var altura = $('.menu').offset().top;
	
	$(window).on('scroll', function(){
		if ( $(window).scrollTop() > altura ){
			$('.menu').addClass('menu_fixed');
		} else {
			$('.menu').removeClass('menu_fixed');
		}
	});
});