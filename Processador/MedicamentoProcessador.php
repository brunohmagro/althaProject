<?php
	
	include('../config.php');

    switch ($_POST) {
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
	}

?>