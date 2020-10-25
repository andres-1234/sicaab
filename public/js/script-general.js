$(document).ready(function(){

	/*  Mostrar/Ocultar Submenus */
    
    $('.nav-btn-submenu').on('click', function(e){
		e.preventDefault();
		var SubMenu=$(this).next('ul');
		var iconBtn=$(this).children('.fa-chevron-down');
		if(SubMenu.hasClass('show-nav-lateral-submenu')){
			$(this).removeClass('active');
			iconBtn.removeClass('fa-rotate-180');
			SubMenu.removeClass('show-nav-lateral-submenu');
		}else{
			$(this).addClass('active');
			iconBtn.addClass('fa-rotate-180');
			SubMenu.addClass('show-nav-lateral-submenu');
		}
	});

    /*  Mostrar/Ocultar Nav Lateral */
    
	$('.show-nav-lateral').on('click', function(e){
		e.preventDefault();
		var NavLateral=$('.nav-lateral');
		var PageConten=$('.page-content');
		if(NavLateral.hasClass('active')){
			NavLateral.removeClass('active');
			PageConten.removeClass('active');
		}else{
			NavLateral.addClass('active');
			PageConten.addClass('active');
		}
	});

	/*  Botón Salir */
    
    $('.btn-exit-system').on('click', function(e){
		e.preventDefault();
		Swal.fire({
			title: '¿Está seguro que quiere cerrar la sesión?',
			text: "Al cerrar la sesión saldrá del sistema",
			type: 'question',
			showCancelButton: true,
			confirmButtonColor: '#275877',
			cancelButtonColor: '#F0194D',
			confirmButtonText: 'Salir',
			cancelButtonText: 'Cancelar'
		}).then((result) => {
			if (result.value) {
				window.location="../../../html/form-ingr-regr.html";
			}
		});
	});

	
});

/* Scroll*/

(function($){
    $(window).on("load",function(){
        $(".nav-lateral-content").mCustomScrollbar({
        	theme:"light-thin",
        	scrollbarPosition: "inside",
        	autoHideScrollbar: true,
        	scrollButtons: {enable: true}
        });
        $(".page-content").mCustomScrollbar({
        	theme:"dark-thin",
        	scrollbarPosition: "inside",
        	autoHideScrollbar: true,
        	scrollButtons: {enable: true}
        });
    });
})(jQuery);

