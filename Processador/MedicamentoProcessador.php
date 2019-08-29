<?php

	if(!isset($_POST['logado']) && !isset($_GET['listarMedicamentos'])) {
        echo '<center style="width: 100%; height: 20px; background-color: red; color: white; font-family: Arial; padding-top: 3px;">Arquivo Protegido</center>';
        die();
    }

	include('../config.php');

    switch ($_POST || $_GET) {
	    //EFETUA O PROCESSAMENTO DE CADASTRO DE MEDICAMENTO
	    case isset($_POST['cadastrarMedicamento']):

	    	//INICIALIZAÇÃO DAS VARIÁVEIS
	        $codigo = $_POST['codigoRemedio'];
	        $apresentacao = $_POST['apresRemedio'];
	        $pAtivo = $_POST['pAtivo'];
	        $fornecedor = $_POST['fornecedor'];
	        $descricao = $_POST['descricaoRemedio'];
	        $usuario = $_SESSION['user'];
	        $dtCadastro = date('Y-m-d H:i:s');

	        //VALICAÇÃO DO CÓDIGO
	        if(strlen($codigo) < 10 || ctype_alpha($codigo) == true) {
	        	$resp = 'falha';
		        $alerta = 'O código deve conter no mínimo 10 caracteres numéricos';
		    }else if (strlen($apresentacao) > 200) {
		    	//VALICAÇÃO DA APRESENTAÇÃO
		    	$resp = 'falha';
		        $alerta = 'Parece que você ultrapassou o limite de 200 caracteres na <b>apresentação</b>.';
		    }else if(strlen($descricao) > 255) {
		    	//VALICAÇÃO DA DESCRIÇÃO
		    	$resp = 'falha';
		        $alerta = 'Parece que você ultrapassou o limite de 255 caracteres na <b>descrição</b>.';
		    }else {

	        //VALIDA SE EXISTE UM MEDICAMENTO COM O CÓDIGO INFORMADO PELO USUÁRIO
	        $validarMedicamento = Medicamento::verificaMedicamento($codigo);

	        //SE NÃO TIVER UM MEDICAMENTO COM O CÓDIGO INFORMADO PODEMOS CADASTRAR
	        if($validarMedicamento == true) {
	        	$medicamento = new Medicamento();
		        $medicamento->setIdMedicamento($codigo);
		        $medicamento->setApresentacao($apresentacao);
		        $medicamento->setPAtivo($pAtivo);
		        $medicamento->setFornecedor($fornecedor);
		        $medicamento->setDescricao($descricao);
		        $medicamento->setIdUsuario($usuario);
		        $medicamento->setDtCadastro($dtCadastro);
		        $cadastroMedicamento = $medicamento->cadastrarMedicamento();

		        if($cadastroMedicamento == true) {
		        	$resp = 'sucesso';
		        	$alerta = 'Cadastro efetuado com sucesso!';
		        }else {
		        	$resp = 'falha';
		        	$alerta = 'Ocorreu um erro ao cadastrar medicamento';
		        }
	        }else {
	        	$resp = 'falha';
		        $alerta = 'Já existe um medicamento com o código informado!';
	        }

	        }        

	        echo json_encode(array($resp,$alerta), JSON_PRETTY_PRINT);
	    break;
	    //EFETUA A CONSULTA DA DESCRIÇÃO DO MEDICAMENTO PARA IMPRIMIR NO MODAL
	    case isset($_POST['descMedicamento']):

	    	//INICIALIZAÇÃO DAS VARIÁVEIS
	        $codigo = $_POST['id_medicamento'];

	        //INSTANCIA MEDICAMENTO PARA CONSULTA
	        $descMedicamento = new Medicamento();
	        $descMedicamento->setIdMedicamento($codigo);
	        $consulta = $descMedicamento->consutarMedicamento();

	        //DEFINIÇÃODAS VARIÁVEIS
	        $codigo = $_POST['id_medicamento'];
	        $descricao = $consulta['descricao'];
	        $usuario = $consulta['id_usuario'];
	        $dataCadastro = date('d/m/Y H:i', strtotime($consulta['dt_cadastro']));       

	        echo json_encode(array($codigo,$descricao,$usuario,$dataCadastro), JSON_PRETTY_PRINT);
	    break;

	    //EFETUA A ATUALIZAÇÃO DO MEDICAMENTO NO BANCO DE DADOS
	    case isset($_POST['editarMedicamento']):

	    	//INICIALIZAÇÃO DAS VARIÁVEIS
	        $codigo = $_POST['id_medicamento'];
	        $apresentacao = $_POST['apresRemedio'];
	        $pAtivo = $_POST['pAtivo'];
	        $fornecedor = $_POST['fornecedor'];
	        $descricao = $_POST['descricaoRemedio'];

	        if (strlen($apresentacao) > 200) {
		    	//VALICAÇÃO DA APRESENTAÇÃO
		    	$resp = 'falha';
		        $alerta = 'Parece que você ultrapassou o limite de 200 caracteres na <b>apresentação</b>.';
		    }else if(strlen($descricao) > 255) {
		    	//VALICAÇÃO DA DESCRIÇÃO
		    	$resp = 'falha';
		        $alerta = 'Parece que você ultrapassou o limite de 255 caracteres na <b>descrição</b>.';
		    }else {

		        //INSTANCIA MEDICAMENTO PARA CONSULTA
		        $editMedicamento = new Medicamento();
		        $editMedicamento->setIdMedicamento($codigo);
		        $editMedicamento->setApresentacao($apresentacao);
		        $editMedicamento->setPAtivo($pAtivo);
		        $editMedicamento->setFornecedor($fornecedor);
		        $editMedicamento->setDescricao($descricao);
		        $editar = $editMedicamento->editarMedicamento();

		        //VERIFICA A RESPOSTA DA CLASSE DE ATUALIZAÇÃO
		        if($editar == true) {
		        	$resp = 'sucesso';
		        	$alerta = 'Medicamento atualizado com sucesso!';
		        }else {
		        	$resp = 'falha';
		        	$alerta = 'Ocorreu uma falha ao atualizar o medicamento';
		        }
		    }

	        echo json_encode(array($resp,$alerta), JSON_PRETTY_PRINT);
	    break;

	    //EXCLUIR UM MEDICAMENTO DO BANCO DE DADOS
	    case isset($_POST['deletarMedicamento']):

	    	//INICIALIZAÇÃO DAS VARIÁVEIS
	        $codigo = $_POST['id_medicamento'];

	        //VALIDA SE O CÓDIGO INFORMADO EXISTE NO BANCO DE DADOS
	        $validarMedicamento = Medicamento::verificaMedicamento($codigo);

	        if($validarMedicamento == false) {
	        	//INSTANCIA MEDICAMENTO PARA CONSULTA
		        $excluirMedicamento = new Medicamento();
		        $excluirMedicamento->setIdMedicamento($codigo);
		        $excluir = $excluirMedicamento->excluirMedicamento();

		        if($excluir == true) {
		        	$resp = 'sucesso';
		        	$alerta = 'Medicamento excluido com sucesso!';
		        }else {
		        	$resp = 'falha';
		        	$alerta = 'Não foi possível exluir o medicamento';
		        }

	        }else {
	        	$resp = 'falha';
	        	$alerta = 'Código enviado não localizado';
	        }

	        echo json_encode(array($resp,$alerta), JSON_PRETTY_PRINT);
	    break;

	    //LISTA TODOS OS MEDICAMENTOS PARA POPULAR A TABELA
	    case isset($_GET['listarMedicamentos']) && $_GET['listarMedicamentos'] == 1:

	    	$sql = MySql::conectar()->prepare("SELECT * FROM `tb_medicamento`");
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
	    break;
	}

	

?>