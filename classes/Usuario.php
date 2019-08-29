<?php 

	class Usuario {

		private $id_usuario;
		private $login;
		private $nome;
		private $senha;
    
        public function getIdUsuario() {
            return $this->id_usuario;
        }

        public function setIdUsuario($id_usuario){
            $this->id_usuario = $id_usuario;
            return $this;
        }

        public function getLogin() {
            return $this->login;
        }

        public function setLogin($login) {
            $this->login = $login;
            return $this;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
            return $this;
        }

        public function getSenha() {
            return $this->senha;
        }

        public function setSenha($senha) {
            $this->senha = $senha;
            return $this;
        }

    public static function selecinaTodosUsuarios() {
    	$sql = MySql::conectarBpo()->prepare("SELECT u.id_usuario, u.nome, p.nome_perfil, u.gestor, s.nome_status_usuario FROM `tb_usuario` AS u INNER JOIN `tb_perfil` AS p ON u.id_perfil = p.id_perfil INNER JOIN `tb_status_usuario` AS s ON u.id_status = s.id_status_usuario");
		$sql->execute();
		return $sql->fetchAll();
    }

    public static function selecionarUsuario($id_usuario) {
    	$sql = MySql::conectarBpo()->prepare("SELECT * FROM `tb_usuario` WHERE id_usuario = ?");
    	$sql->execute(array($id_usuario));
    	return $sql->fetch();
    }

    public static function validaSenhaAtual($usuario) {
        $sql = MySql::conectarBpo()->prepare("SELECT * FROM `tb_usuario` WHERE id_usuario  = ? AND senha = ?");
        $sql->execute(array($usuario->getLogin(),$usuario->getSenha()));
        
        if($sql->rowCount() == 1){
            return true;
        }else {
            return false;
        }
    }


    public static function logado() {
			return isset($_SESSION['login']) ? true : false;
		}

		public static function loggout() {
			session_destroy();
			header('Location: '.INCLUDE_PATH_PORTAL);
		}

		public static function fotoValida($foto){
			if($foto['type'] == 'image/jpeg' ||
				$foto['type'] == 'image/jpg' ||
				$foto['type'] == 'image/png') {

				$tamanho = intval($foto['size']/1024);
				if($tamanho < 300) 
					return true;
				else
					return false;
			}else {
				return false;
			}
		}

		public static function carregarFoto($foto) {
			$formatoArquivo = explode('.',$foto['name']);
			$fotoNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
			if(move_uploaded_file($foto['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$fotoNome)) {
				return $fotoNome;
			}else {
				return false;
			}
		}

		public static function deleteFoto($file) {
			@unlink('uploads/'.$file);
		}

		public static function listarAniversarios($mes){
			$sql = MySql::conectarBpo()->prepare("SELECT * FROM `tb_usuario` WHERE MONTH(dat_nasc) = ?");
			$sql->execute(array($mes));
			return $sql->fetchAll();
		}
    }
?>