<?php
	require_once('model/class.mysql.php');
	class produto {
		private $id_produto;
		private $codigo;
		private $nome_produto;
		private $codigobarras;

		function __construct($id=''){ /* Preenche objeto com os dados do banco (id) */
			if($id != ''){
				$banco = conecta();
				$qry = $banco->query("select * from tb_produto where id_produto = '".$id."'");
				$dados = $qry->fetch_assoc();
				$this->setId_Produto($dados['id_produto']);
				$this->setCodigo($dados['codigo']);
				$this->setnome_produto($dados['nome_produto']);
				$this->setCodigobarras($dados['codigobarras']);
			}
		}

		public function cadastrar(){
			$banco = conecta();
			$qry = $banco->query("insert into tb_produto (codigo,nome_produto,codigobarras) values ('".$this->getCodigo()."','".$this->getnome_produto()."','".$this->getCodigobarras()."')");
			if($qry){
				return true;
			} else {
				return false;
			}
		}

		public function buscarProduto($nome_produto){
			$banco = conecta();
			$qry = $banco->query("select * from tb_produto where nome_produto = '".$nome_produto."'");
			if($qry->num_rows > 0){
				$retorno = '';
				while($dados = $query->fetch_assoc()) $retorno[] = $dados;
				return $retorno;
			}
		}

		public function listaProduto(){
			$banco = conecta();
			$qry = $banco->query("select * from tb_produto");
			if($qry->num_rows > 0){
				$retorno = '';
				while($dados = $query->fetch_assoc()) $retorno[] = $dados;
				return $retorno;
			}
		}

		public function setId_Produto($id_produto){
			$this->id_produto = $id_produto;
		}
		public function setCodigo($codigo){
			$this->codigo = $codigo;
		}
		public function setnome_produto($nome_produto){
			$this->nome_produto = $nome_produto;
		}
		public function setCodigobarras($codigobarras){
			$this->codigobarras = $codigobarras;
		}
		public function getId_Produto(){
			return $this->id_produto;
		}
		public function getCodigo(){
			return $this->codigo;
		}
		public function getnome_produto(){
			return $this->nome_produto;
		}
		public function getCodigobarras(){
			return $this->codigobarras;
		}
	}
?>