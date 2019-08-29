<?php
	//INICIANDO UMA SESSÃO
	session_start();
	date_default_timezone_set('America/Sao_Paulo');

	//INCLUINDO AS CLASSES EM TODAS AS PÁGINAS
	$autoload = function($class) {
		include('classes/'.$class.'.php');
	};
	spl_autoload_register($autoload);

	//DEFINIÇÃO DAS CONSTANTES DE DIRETÓRIO
	define('INCLUDE_PATH_PORTAL','http://localhost:8080/ALTHAIA/');

	//DEFINIÇÃO DOS DADOS DE ACESSO PARA O BANCO DE DADOS
	define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','$Amanda@2021$');
	define('DATABASE','bd_althaia');

	
	//CONVERTE TODAS AS DATAS PARA O FORMATO DO BANCO DE DADOS E VICE E VERSA
	function convertData($data) {
		if(strstr($data, "/")) {
			$d = explode("/",$data);
			$rdata = "$d[2]-$d[1]-$d[0]";
		}else {
			$d = explode("-",$data);
			$rdata = "$d[2]/$d[1]/$d[0]";
		}
		return $rdata;
	}

	//MANTEM UM POST FEITO PELO USUÁRIO NOS CAMPOS (UTILZIADO PARA OS CASOS ONDE HÁ ERRO NAS INFORMAÇÕES)
	function recoverPost($post){
		if(isset($_POST[$post])){
			echo $_POST[$post];
		}
	}

	function loadPage() {
		if(isset($_GET['url'])) {
			$url = explode('/',$_GET['url']);
			if(file_exists('paginas/'.$url[0].'.php')) {
				$logado = True;
				include ('paginas/'.$url[0].'.php');
			}else {
				//SE A PÁGINA NÃO EXISTIR
				echo '<script>window.location.href = include_path+"home";</script>';
			}
		}else {
			$logado = True;
			include('paginas/home.php');
		}
	}

	//REDIRECIONA PARA PÁGINA DESEJADA
	function redirect($url) {
		echo '<script>location.href="'.$url.'"</script>';
		die();
	}

?>