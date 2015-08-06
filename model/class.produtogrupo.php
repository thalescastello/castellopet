<?php
	require_once('model/class.mysql.php');
	class produtogrupo {
		private $id_produtogrupo;
		private $codigo;
		private $nome;

		function __construct($id=''){ /* Preenche objeto com os dados do banco (id) */
			if($id != ''){
				$banco = conecta();
				$qry = $banco->query("select * from tb_produtogrupo where id_produtogrupo = '".$id."'");
				$dados = $qry->fetch_assoc();
				$this->setId_Produtogrupo($dados['id_produtogrupo']);
				$this->setCodigo($dados['codigo']);
				$this->setNome($dados['nome']);
			}
		}

		public function cadastrar(){
			$banco = conecta();
			$qry = $banco->query("insert into tb_produtogrupo (codigo,nome) values ('".$this->getCodigo()."','".$this->getNome()."')");
			if($qry){
				return true;
			} else {
				return false;
			}
		}

		public function buscarprodutogrupo($nome){
			$banco = conecta();
			$qry = $banco->query("select * from tb_produtogrupo where nome = '".$nome."'");
			if($qry->num_rows > 0){
				$retorno = '';
				while($dados = $query->fetch_assoc()) $retorno[] = $dados;
				return $retorno;
			}
		}
		public function setId_Produtogrupo($id_produtogrupo){
			$this->id_produtogrupo = $id_produtogrupo;
		}
		public function setCodigo($codigo){
			$this->codigo = $codigo;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function getId_Produtogrupo(){
			return $this->id_produtogrupo;
		}
		public function getCodigo(){
			return $this->codigo;
		}
		public function getNome(){
			return $this->nome;
		}
	}
?>