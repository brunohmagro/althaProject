<?php

	class Medicamento extends Usuario {
		
		private $idMedicamento;
		private $apresentacao;
		private $pAtivo;
		private $fornecedor;
		private $descricao;
		private $dtCadastro;

		//GET AND SET ID MEDICAMENTO
		public function getIdMedicamento() {
		    return $this->idMedicamento;
		}
		 
		public function setIdMedicamento($idMedicamento) {
		    $this->idMedicamento = $idMedicamento;
		}

		//GET AND SET APRESENTAÇÃO
		public function getApresentacao() {
		    return $this->apresentacao;
		}
		 
		public function setApresentacao($apresentacao) {
		    $this->apresentacao = $apresentacao;
		}

		//GET AND SET DO PRINCÍPIO ATIVO
		public function getPAtivo() {
		    return $this->pAtivo;
		}
		 
		public function setPAtivo($pAtivo) {
		    $this->pAtivo = $pAtivo;
		}

		// GET AND SET DO FORNECEDOR
		public function getFornecedor() {
		    return $this->fornecedor;
		}
		 
		public function setFornecedor($fornecedor) {
		    $this->fornecedor = $fornecedor;
		}

		//GET AND SET DESCRIÇÃO
		public function getDescricao() {
		    return $this->descricao;
		}
		 
		public function setDescricao($descricao) {
		    $this->descricao = $descricao;
		}
		
		//GET AND SET DATA DE CADASTRO
		public function getDtCadastro() {
		    return $this->dtCadastro;
		}		
		 		
		public function setDtCadastro($dtCadastro) {
		    $this->dtCadastro = $dtCadastro;
		}


		//MÉTODO UTILIZADO PARA INSERIR UM NOVO MEDICAMENTO NO BANCO DE DADOS
        public function cadastrarMedicamento() {
            $sql = MySql::conectar()->prepare("INSERT INTO `tb_medicamento` VALUES (?,?,?,?,?,?,?)");
            if($sql->execute(array($this->getIdMedicamento(),$this->getApresentacao(),$this->getPAtivo(),$this->getFornecedor(),$this->getDescricao(),$this->getIdUsuario(),$this->getDtCadastro()))) {
                return true;
            }else {
                return false;
            }
        }

        //MÉTODO DE VALIDAÇÃO PARA VERIFICAR O CÓDIGO DO MEDICAMENTO
        public static function verificaMedicamento($id) {
        	$sql = MySql::conectar()->prepare("SELECT * FROM `tb_medicamento` WHERE id_medicamento = ?");
        	$sql->execute(array($id));
        	if($sql->rowCount() > 0) {
        		return false;
        	}else {
        		return true;
        	}
        }

        //CONSULTA A DESCRIÇÃO DO MEDICAMENTO NO BANCO DE DADOS
        public function consutarMedicamento() {
        	$sql = MySql::conectar()->prepare("SELECT * FROM `tb_medicamento` WHERE id_medicamento = ?");
        	if($sql->execute(array($this->getIdMedicamento()))) {
        		return $sql->fetch();
        	}else {
        		return false;
        	}
        }

        //EDITA UM MEDICAMENTO NO BANCO DE DADOS
        public function editarMedicamento() {
        	$sql = Mysql::conectar()->prepare("UPDATE `tb_medicamento` SET apresentacao = ?,pAtivo = ?,fornecedor = ?,descricao = ? WHERE id_medicamento = ?");
        	if($sql->execute(array($this->getApresentacao(),$this->getPAtivo(),$this->getFornecedor(),$this->getDescricao(),$this->getIdMedicamento()))) {
        		return true;
        	}else {
        		return false;
        	}
        }

        //EXCLUI UM MEDICAMENTO NO BANCO DE DADOS
        public function excluirMedicamento() {
        	$sql = MySql::conectar()->prepare("DELETE FROM `tb_medicamento` WHERE id_medicamento = ?");
        	if($sql->execute(array($this->getIdMedicamento()))) {
        		return true;
        	}else {
        		return false;
        	}
        }


	}

?>