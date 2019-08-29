<?php
	
	//PROTEÇÃO PARA ACESSO DIRETO AO ARQUIVO
	if(!isset($logado)) {
        echo '<center style="width: 100%; height: 20px; background-color: red; color: white; font-family: Arial; padding-top: 3px;">Arquivo Protegido</center>';
        die();
    }

    //IDENTIFICA O GET PARA SELECIONAR AS INFORMAÇÕES DO BANCO DE DADOS
    if(isset($_GET['id_medicamento'])){

		$id = $_GET['id_medicamento'];
			//VALIDAÇÃO DO ID (VERIFICA SE TODOS OS CARACTERES SÃO NUMÉRICOS)
			if(ctype_alpha($id) == true) {
				echo '<script>alert("O valor do código é inválido")</script>';
				echo '<script>window.location.href = include_path+"listar-medicamentos"</script>';
			}else {
				//SE ESTIVER TUDO CERTO ELE SELECIONA AS INFORMAÇÕES
				$consultarMedicmento = new Medicamento();
				$consultarMedicmento->setIdMedicamento($id);
				$consulta = $consultarMedicmento->consutarMedicamento();
			}

		
	}else{
		echo '<script>alert("Ocorreu um erro ao processar a requisição!")</script>';
		echo '<script>window.location.href = include_path+"listar-medicamentos"</script>';
	}

?>

<div class="box-content">
	<h2><i class="fas fa-tablets"></i></i> Editar Medicamento</h2>

	<div id="resultadoEdicaoMedicamento"></div>

	<form method="POST" id="formEditMedicamento">

		<div class="form-group w-25 p-2 float-left">
			<label for="codigoRemedio">Código:</label>
			<input formato="codigoRemedio" type="text" class="form-control" name="codigoRemedio" id="codigoRemedio" required value="<?php echo $consulta['id_medicamento']; ?>" disabled/>
		</div><!--form-edit-user-->

		<div class="form-group w-75 p-2 float-left">
			<label for="apresRemedio">Apresentação:</label>
			<input type="text" class="form-control" name="apresRemedio" value="<?php echo $consulta['apresentacao']; ?>" required />
		</div><!--form-edit-user-->

		<div class="form-group w-50 p-2 float-left">
			<label for="pAtivo">Princípio Ativo:</label>
			<input type="text" class="form-control" name="pAtivo" maxlength="100" value="<?php echo $consulta['pAtivo']; ?>" required />
		</div><!--form-edit-user-->

		<div class="form-group w-50 p-2 float-left">
			<label for="fornecedor">Fabricante:</label>
			<input class="form-control" type="text" name="fornecedor" maxlength="100" value="<?php echo $consulta['fornecedor']; ?>" required/>
		</div><!--form-edit-user-->

		<div class="form-group w-100 p-2 float-left">
			<label for="descricaoRemedio">Descrição:</label>
			<textarea style="overflow:auto;resize:none;height: 130px;" class="form-control" name="descricaoRemedio" value="<?php echo $consulta['descricao']; ?>" required><?php echo $consulta['descricao']; ?></textarea>
		</div><!--form-edit-user-->
		
		<input type="hidden" name="editarMedicamento">
		<input type="hidden" name="logado">
		<input type="hidden" name="id_medicamento" value="<?php echo $consulta['id_medicamento']; ?>">
		<button type="submit" class="btn btn-primary float-right" style="margin-bottom: 15px;" id="btnEditarMedicamento" name="btnEditarMedicamento">ATUALIZAR</button>
	</form>
<div class="clear"></div>
</div><!-- box-content -->
<script src="<?php echo INCLUDE_PATH_PORTAL ?>Controlador/MedicamentoControlador.js"></script>