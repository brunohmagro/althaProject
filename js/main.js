$(function(){

	//TRABALHANDO COM MUDANÇA DE TAMANHO DA TELA
	var open  = true;
	var windowSize = $(window)[0].innerWidth;

	var targetSizeMenu = (windowSize <= 400) ? 200 : 250;

	if(windowSize <= 768){
		$('.menu').css('width','0').css('padding','0');
		$('.pagina').css('width','100%').css('left','0');
		$('.form-group').removeClass('w-25');
		$('.form-group').removeClass('w-50');
		$('.form-group').removeClass('p-3');
		$('.form-group').addClass('w-100');
		open = false;
	}



	$('.menu-btn').click(function(){
		if(open){
			//O menu está aberto, precisamos fechar e adaptar nosso conteudo geral do painel
			$('.menu').animate({'width':'0','padding':'0'},function(){
				open = false;
			});			
			$('.pagina').animate({'left':'0'},function(){
				open = false;
			});
			$('.pagina').css('width','100%');
		}else{
			//O menu está fechado
			$('.menu').animate({'width':targetSizeMenu+'px'},function(){
				open = true;
			});
			$('.menu').css('display','block');
			if(windowSize > 768)
				$('.pagina').css('width','calc(100% - 250px)').css('transition','0.65s').css('left','0');
				$('.pagina').animate({'left':targetSizeMenu+'px'},function(){
				open = true;
			});
		}
	});

	$(window).resize(function() {
		windowSize = $(window)[0].innerWidth;
		if(windowSize <= 768) {
			$('.menu').css('width',0);
			$('.pagina').css('width','100%').css('left','0').css('transition','0.5s');
			$('.form-group').removeClass('w-25');
			$('.form-group').removeClass('w-50');
			$('.form-group').removeClass('p-3');
			$('.form-group').addClass('w-100');

			open = false;
		} else {
			open = true;
			$('.pagina').css('width','calc(100% - 250px)').css('left','250px').css('transition','0.5s');
			$('.menu').css('width','250px');
		}
	})

 	//CONFIRMA UMA SOLICITAÇÃO DE DELETAR DO BANCO DE DADOS
	$('body').on('click','[actionBtn=delete]', function() {
		var txt;
		var r = confirm("Tem certeza que deseja excluir?!");
		if(r == true) {
			return true;
		}else {
			return false;
		}
	})

	//DEFINE O FORMATO DE INPUT DO CÓDIGO DE MEDICAMENTOS
	$('[formato=codigoRemedio]').mask('9999999999');

	//INICIALIZANDO MENU
	$(document).ready(function () {
	    $("#sidebar").mCustomScrollbar({
	        theme: "minimal"
	    });

	    $('#dismiss, .overlay').on('click', function () {
	        $('#sidebar').removeClass('active');
	        $('.overlay').removeClass('active');
	    });

	    $('#sidebarCollapse').on('click', function () {
	        $('#sidebar').addClass('active');
	        $('.overlay').addClass('active');
	        $('.collapse.in').toggleClass('in');
	        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
	    });
	});

});