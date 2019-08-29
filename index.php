<?php

	include('config.php');

	if(Usuario::logado() == False) {
		include('login.php');
	}else {
		include('main.php');
	}

?>