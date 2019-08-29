<?php
	
    //PROTEGE O ACESSO DIRETO AO ARQUIVO
    if(!isset($_POST['pageLogin'])) {
        echo '<center style="width: 100%; height: 20px; background-color: red; color: white; font-family: Arial; padding-top: 3px;">Arquivo Protegido</center>';
        die();
    }

	include('../config.php');

    switch ($_POST) {
    //EFETUA O LOGIN NO SISTEMA E ABRE TODAS AS SESSÕES
    case isset($_POST['entrarSistema']):

        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        if($usuario != '' && strlen($usuario) > 5 && strpos($usuario,'.') != 0 && $senha != '' && strlen($senha) > 8) {
            
            $login = new Usuario();
            $login->setLogin($usuario);
            $login->setSenha($senha);
            $logar = $login->validaUsuario();

            if($logar != false) {
                //LOGAMOS COM SUCESSO.
                $_SESSION['login'] = true;
                $_SESSION['user'] = $usuario;
                $_SESSION['nome'] = $logar['nome_usuario'];

                $resp = 'sucesso';
                $alerta = 'home';
            }else {
                $resp = 'falha';
                $alerta = 'Usuário ou senha incorretos!';
            }
        }else {
            $resp = 'falha';
            $alerta = 'Usuário ou senha incorretos!';
        }        

        echo json_encode(array($resp,$alerta), JSON_PRETTY_PRINT);
        break;
    
    }


?>