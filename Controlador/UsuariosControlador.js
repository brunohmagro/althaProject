$(function(){	

	//IDENTIFICA O SUBMIT PARA EFETUAR O LOGIN NO SISTEMA
	$("form#formLogin").submit(function() {

    var dataUsuario = $("form#formLogin").serialize();

		$.ajax({
			url: include_path+'Processador/UsuarioProcessador.php',
			type: 'POST',
			data: dataUsuario,
			dataType: "json",
			beforeSend: function() {
				$('#login').html('<img src="'+include_path+'loader/ajax-loader-login.gif" style="width: 20px;" disabled/>');
			},
			success: function(retorno) {
				if(retorno[0] == 'sucesso') {
					window.location.href = include_path;
				}else {
					$('#erroLogin').fadeIn(1000, function() {
						$(".formulario").height(280);
						$('#erroLogin').html('<center><div class="alert alert-danger">'+retorno[1]+'</div></center>');
						$('#login').html('ENTRAR');
					});
				
				}
							
	        },
			error: function(retorno) {
				alert('Aconteceu um erro ao tentar logar');
				$('#login').html('ENTRAR');
			}
		});
		return false;
	});
});