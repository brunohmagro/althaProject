<?php
	//PROTEÇÃO PARA ACESSO DIRETO AO ARQUIVO
	if(!isset($logado)) {
		echo '<center style="width: 100%; height: 20px; background-color: red; color: white; font-family: Arial; padding-top: 3px;">Arquivo Protegido</center>';
        die();
	}
?>

<div class="container">
	<?php
		echo '<h2>Olá <b>'.$_SESSION['nome'].'</b> seja bem vindo(a) ao nosso sistema!';

	?>
</div><!--box-pagina-->