$(function(){

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
	        "ajax": include_path+'teste.php',
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
		

	});

	

});