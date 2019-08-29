<?php
	
	if(!isset($logado)) {
		echo '<center style="width: 100%; height: 20px; background-color: red; color: white; font-family: Arial; padding-top: 3px;">Arquivo Protegido</center>';
		die();
	}

?>
<div class="box-content">
	<h2><i class="fas fa-tablets"></i></i> Cadastro de Medicamento</h2>

	<div id="resultadoCadastroMedicamento"></div>

	<form method="POST" id="formCadMedicamento">

		<div class="form-group w-25 p-2 float-left">
			<label for="codigoRemedio">Código:</label>
			<input formato="codigoRemedio" type="text" class="form-control" name="codigoRemedio" id="codigoRemedio" required />
		</div><!--form-edit-user-->

		<div class="form-group w-75 p-2 float-left">
			<label for="apresRemedio">Apresentação:</label>
			<input type="text" class="form-control" name="apresRemedio" required />
		</div><!--form-edit-user-->

		<div class="form-group w-50 p-2 float-left">
			<label for="pAtivo">Princípio Ativo:</label>
			<input type="text" class="form-control" name="pAtivo" maxlength="100" required />
		</div><!--form-edit-user-->

		<div class="form-group w-50 p-2 float-left">
			<label for="fornecedor">Fabricante:</label>
			<input class="form-control" type="text" name="fornecedor" maxlength="100" required/>
		</div><!--form-edit-user-->

		<div class="form-group w-100 p-2 float-left">
			<label for="descricaoRemedio">Descrição:</label>
			<textarea style="overflow:auto;resize:none;height: 130px;" class="form-control" name="descricaoRemedio" required></textarea>
		</div><!--form-edit-user-->


		<input type="hidden" name="cadastrarMedicamento">
		<button type="submit" class="btn btn-primary float-right" style="margin-bottom: 15px;" id="btnCadastroMedicamento" name="btnCadastroMedicamento">CADASTRAR</button>
	</form>
<div class="clear"></div>
</div><!--box-content-->
<script src="<?php echo INCLUDE_PATH_PORTAL ?>Controlador/MedicamentoControlador.js"></script>