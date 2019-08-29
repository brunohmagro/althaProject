$(function(){

	//IDENTIFICA O SUBMIT PARA CADASTRAMENTO DO USUÁRIO
	$("form#formCadMedicamento").submit(function() {

    var dataMedicamento = $("form#formCadMedicamento").serialize();

		$.ajax({
			url: include_path+'Processador/MedicamentoProcessador.php',
			type: 'POST',
			data: dataMedicamento,
			dataType: "json",
			beforeSend: function() {
				$('.overlay-loading').fadeIn();
			},
			success: function(retorno) {
				if(retorno[0] == 'sucesso') {
					$('.overlay-loading').fadeOut();
					$('html,body').scrollTop(0);
					$('#resultadoCadastroMedicamento').html('<center><div class="alert alert-success" role="alert">'+retorno[1]+'</div></center>');
				}else {
					$('.overlay-loading').fadeOut();
					$('html,body').scrollTop(0);
					$('#resultadoCadastroMedicamento').fadeIn(1000, function() {
						$('#resultadoCadastroMedicamento').html('<center><div class="alert alert-danger" role="alert">'+retorno[1]+'</div></center>');
					});				
				}
							
	        },
			error: function(retorno) {
				alert('Ocorreu um erro ao tentar efetuar o cadastro!');
				$('.overlay-loading').fadeOut();
			}
		});
		return false;
	});

	//INICIALIZA A TABELA QUE LISTA OS MEDIDAMENTOS E EFETUA A TRADUÇÃO DO PLUGIN
	$(document).ready(function() {

	    $('#data-table').DataTable({
	        "ajax": include_path+'Processador/MedicamentoProcessador.php?listarMedicamentos=1',
	        "columns": [
	        	{ "data": "btnDescricao" },
	            { "data": "id_medicamento" },
	            { "data": "apresentacao" },
	            { "data": "pAtivo" },
	            { "data": "fornecedor" },	            
	            { "data": "btnEditar" },
	            { "data": "btnExcluir" }
        	],
        	"language": {
	                "lengthMenu": "Mostrando _MENU_ registros por página",
	                "zeroRecords": "Nada encontrado",
	                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
				    "sInfoPostFix": "",
				    "sInfoThousands": ".",
	                "info": "Mostrando página _PAGE_ de _PAGES_",
	                "sZeroRecords": "Nenhum registro encontrado",
	                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
				    "sLoadingRecords": "Carregando...",
				    "sProcessing": "Processando...",
	    			"sSearch": "Pesquisar",
	                "infoFiltered": "(filtrado de _MAX_ registros no total)",
	                "oPaginate": {
				        "sNext": "Próximo",
				        "sPrevious": "Anterior",
				        "sFirst": "Primeiro",
				        "sLast": "Último"
				    },
				    "oAria": {
				        "sSortAscending": ": Ordenar colunas de forma ascendente",
				        "sSortDescending": ": Ordenar colunas de forma descendente"
				    }
	            }
	    });
	});

	//IDENTIFICA O CLICK NO BOTÃO DE EDITAR DA TABELA E ENCAMINHA PARA O ARQUIVO DE EDIÇÃO
	$('body').on('click','#data-table .btn-primary', function() {

		var idMedicamento = $(this).attr('id');
		window.location.href = include_path+'editar-medicamento?id_medicamento='+idMedicamento;

	});

	//IDENTIFICA O CLICK NO BOTÃO PARA APRESENTAR OS DETALHES DO MEDICAMENTO
	$('body').on('click','#dataMedicamento', function() {

		var idMedDescricao = $(this).attr('data-id');

		$.ajax({
			url: include_path+'Processador/MedicamentoProcessador.php',
			type: 'POST',
			data: {logado:"",id_medicamento:idMedDescricao,descMedicamento:""},
			dataType: "json",
			beforeSend: function() {

			},
			success: function(retorno) {
				$('#infoMedicamento').html('<p class="text-body"><b>Código:</b> '+retorno[0]+'</p>'+retorno[1]);
				$('#footerInfMedicamento').html('Cadastrado em: '+retorno[3]+' | Por: '+retorno[2]+'');		
	        },
			error: function(retorno) {
				alert('Ocorreu um erro ao tentar resgatar a descrição!');
				$('.overlay-loading').fadeOut();
			}
		});
		
	});

	//FUNÇÃO QUE EFETUA A ATUALIZAÇÃO DO USUÁRIO
	$("form#formEditMedicamento").submit(function() {

    var dataEditMedicamento = $("form#formEditMedicamento").serialize();

		$.ajax({
			url: include_path+'Processador/MedicamentoProcessador.php',
			type: 'POST',
			data: dataEditMedicamento,
			dataType: "json",
			beforeSend: function() {
				$('.overlay-loading').fadeIn();
			},
			success: function(retorno) {
				if(retorno[0] == 'sucesso') {
					$('.overlay-loading').fadeOut();
					$('html,body').scrollTop(0);
					$('#resultadoEdicaoMedicamento').html('<center><div class="alert alert-success" role="alert">'+retorno[1]+'</div></center>');
				}else {
					$('.overlay-loading').fadeOut();
					$('html,body').scrollTop(0);
					$('#resultadoEdicaoMedicamento').fadeIn(1000, function() {
						$('#resultadoEdicaoMedicamento').html('<center><div class="alert alert-danger" role="alert">'+retorno[1]+'</div></center>');
					});				
				}
							
	        },
			error: function(retorno) {
				alert('Ocorreu um erro ao tentar efetuar a atualização!');
				$('.overlay-loading').fadeOut();
			}
		});
		return false;
	});


	//IDENTIFICA O CLICK NO BOTÃO DE EXCLUIR O MEDICAMENTO
	$('body').on('click','[actionBtn=delete]', function() {
		var txt;
		var r = confirm("Tem certeza que deseja excluir?");
		if(r == true) {
			
			var idMedExcluir = $(this).attr('id');
			
			$.ajax({
				url: include_path+'Processador/MedicamentoProcessador.php',
				type: 'POST',
				data: {logado:"",id_medicamento:idMedExcluir,deletarMedicamento:""},
				dataType: "json",
				beforeSend: function() {
					$('.overlay-loading').fadeIn();
				},
				success: function(retorno) {
					if(retorno[0] == 'sucesso') {
						$('.overlay-loading').fadeOut();
						$('#resultadoExcluirMedicamento').html('<center><div class="alert alert-success" role="alert">'+retorno[1]+'</div></center>');
						$('#data-table').DataTable().ajax.reload();
					}else {
						$('.overlay-loading').fadeOut();
						$('html,body').scrollTop(0);
						$('#resultadoExcluirMedicamento').fadeIn(1000, function() {
							$('#resultadoExcluirMedicamento').html('<center><div class="alert alert-danger" role="alert">'+retorno[1]+'</div></center>');
						});				
					}
								
		        },
				error: function(retorno) {
					alert('Ocorreu um erro ao tentar efetuar a atualização!');
					$('.overlay-loading').fadeOut();
				}
			});
			return false;
		}else {
			return false;
		}
	})

	

});