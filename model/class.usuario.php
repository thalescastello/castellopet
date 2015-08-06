<?php
	require_once('model/class.mysql.php');
	class usuario {
		private $id_login;
		private $nome;
		private $usuario;
		private $senha;

		function __construct($id=''){ /* Preenche objeto com os dados do banco (id) */
			if($id != ''){
				$banco = conecta();
				$qry = $banco->query("select * from tb_login where id_login = '".$id."'");
				$dados = $qry->fetch_assoc();
				$this->setId_login($dados['id_login']);
				$this->setNome($dados['nome']);
				$this->setUsuario($dados['usuario']);
				$this->setSenha($dados['senha']);
			}
		}

		public function cadastrar(){
			$banco = conecta();
			$qry = $banco->query("insert into tb_login (nome,usuario,senha) values ('".$this->getNome()."','".$this->getUsuario()."','".md5($this->getSenha())."')");
			if($qry){
				return true;
			} else {
				return false;
			}
		}

		public function logar($usuario, $senha){ /* Verifica se usuário existe, preenche objeto com os dados do banco e retorna verdadeiro ou falso*/
			$banco = conecta();
			$qry = $banco->query("select * from tb_login where usuario = '".$usuario."' and senha = '".md5($senha)."'");
			if($qry->num_rows > 0){
				$dados = $qry->fetch_assoc();
				$this->setId_login($dados['id_login']);
				$this->setNome($dados['nome']);
				$this->setUsuario($dados['usuario']);
				$this->setSenha($dados['senha']);
				return true;
			}else{
				return false;
			}
		}

		public function buscarUsuario($nome){
			$banco = conecta();
			$qry = $banco->query("select * from tb_login where nome = '".$nome."'");
			if($qry->num_rows > 0){
				$retorno = '';
				while($dados = $query->fetch_assoc()) $retorno[] = $dados;
				return $retorno;
			}
		}
		public function setId_login($id_login){
			$this->id_login = $id_login;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
		public function setSenha($senha){
			$this->senha = $senha;
		}
		public function getId_login(){
			return $this->id_login;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getUsuario(){
			return $this->usuario;
		}
		public function getSenha(){
			return $this->senha;
		}
	}
?>