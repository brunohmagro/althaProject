<?php 

	class Usuario {

		private $id_usuario;
		private $login;
		private $nome;
		private $senha;
        
        //GET AND SET PARA ID DO USUÁRIO
        public function getIdUsuario() {
            return $this->id_usuario;
        }

        public function setIdUsuario($id_usuario){
            $this->id_usuario = $id_usuario;
            return $this;
        }

        //GET AND SET PARA LOGIN
        public function getLogin() {
            return $this->login;
        }

        public function setLogin($login) {
            $this->login = $login;
            return $this;
        }

        //GET AND SET PARA NOME
        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
            return $this;
        }

        //GET AND SET PARA SENHA
        public function getSenha() {
            return $this->senha;
        }

        public function setSenha($senha) {
            $this->senha = sha1(sha1($senha));
            return $this;
        }

        //MÉTODO PARA EFETUAR O LOGIN DO USUÁRIO
        public function validaUsuario() {
        	$sql = MySql::conectar()->prepare("SELECT * FROM `tb_usuario` WHERE login_usuario  = ? AND senha_usuario = ?");
            $sql->execute(array($this->getLogin(),$this->getSenha()));
            
            if($sql->rowCount() == 1) {
                return $sql->fetch();
            }else {
                return false;
            }
        }

        //VALIDA SE O USUÁRIO ESTÁ O LOGADO
        public static function logado() {
		  return isset($_SESSION['login']) ? true : false;
        }

        //EFETUA O LOGGOUT DO USUÁRIO
        public static function loggout() {
            session_destroy();
            header('Location: '.INCLUDE_PATH_PORTAL);
        }
    }
?>