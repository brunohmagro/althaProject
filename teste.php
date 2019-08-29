<?php
	
	include('config.php');

	$sql = MySql::conectar()->prepare("SELECT id_medicamento, apresentacao, pAtivo, fornecedor, descricao FROM `tb_medicamento`");
	$sql->execute();
	$retorno = $sql->fetchAll();

	foreach ($retorno as $key => $value) {

		$data[] = array(

			"btnDescricao" => '<button style="border: none; background: none; color: #17a2b8;" title="Ver Descrição" name="descMedicamento" type="button" data-toggle="modal" data-target="#mostrarDescricao" id="dataMedicamento" data-id="'.$value['id_medicamento'].'"><i class="fas fa-info-circle"></i></button>',
			"id_medicamento" => $value['id_medicamento'],
			"apresentacao" => $value['apresentacao'],
			"pAtivo" => $value['pAtivo'],
			"fornecedor" => $value['fornecedor'],
			"btnEditar" => '<button type="button" class="btn btn-primary btn-sm" name="edMedicamento" id="'.$value['id_medicamento'].'"> Editar</button>',
			"btnExcluir" => '<button actionBtn="delete" id="'.$value['id_medicamento'].'" name="exMedicamento" type="button" class="btn btn-danger btn-sm">Excluir</button>'

		);
	
	}

	echo json_encode(array("data" => $data));

?>