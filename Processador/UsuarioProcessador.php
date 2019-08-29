<?php
	
	include('../config.php');

    switch ($_POST) {
    //EFETUA O LOGIN NO SISTEMA E ABRE TODAS AS SESSÕES
    case isset($_POST['entrarSistema']):

        $usuario = $_POST['usuario'];
        $senha = sha1(sha1($_POST['senha']));
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_usuario` WHERE login_usuario  = ? AND senha_usuario = ?");
        $sql->execute(array($usuario,$senha));
        
        if($sql->rowCount() == 1) {
        //LOGAMOS COM SUCESSO.
            $info = $sql->fetch();
            $_SESSION['login'] = true;
            $_SESSION['user'] = $usuario;
            $_SESSION['nome'] = $info['nome_usuario'];

            $resp = 'sucesso';
        }else {
            $resp = 'falha';
        }

        echo json_encode(array($resp), JSON_PRETTY_PRINT);
        break;
    //SELECIONA TODOS OS SUBMOTIVOS DOS EVENTOS POR MOTIVO
    case isset($_POST['atualizarSenhaUsuario']):

        $id_usuario = $_POST['id_usuario'];
        $senhaAtual = sha1(sha1($_POST['senha-atual']));
        $senhaNova1 = sha1(sha1($_POST['nova-senha']));
        $senhaNova2 = sha1(sha1($_POST['conf-senha']));

        if($senhaNova1 == $senhaNova2) {

            $usuario = new Usuario();
            $usuario->setLogin($id_usuario);
            $usuario->setSenha($senhaAtual);

            $validaUsuario = Usuario::validaSenhaAtual($usuario);

            if($validaUsuario == true) {
                //AGORA PODEMOS ATUALIZAR A SENHA
                $resp = 'sucesso';
                $alerta = 'Vou alterar a senha';
            }else {
                $resp = 'falha';
                $alerta = 'A senha atual informada está incorreta!';
            }
        }else {
            $resp = 'falha';
            $alerta = 'As senhas informadas não são iguais!';
        }

        echo json_encode(Array($resp,$alerta));
        break;
        //EDITAR APELIDO E IMAGEM USUÁRIO
        case isset($_POST['atualizaInfoUsuario']):

        //$novo_apelido = filter_input(INPUT_POST, 'apelido');

        echo 'Tudo certo';
        break;
    }


?>