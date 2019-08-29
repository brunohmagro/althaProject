<?php
	if(!isset($logado)) {
		die("Arquivo Protegido");
	}
?>

<div class="container">
	<?php
		echo '<h2>Olá <b>'.$_SESSION['nome'].'</b> seja bem vindo(a) ao nosso sistema!';

	?>
</div><!--box-pagina-->