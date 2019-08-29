$(function(){

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