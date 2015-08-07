<?php
	require_once('model/class.mysql.php');
	class produto {
		private $id_pedido;
		private $numero;
		private $tipopedido;
		private $descricao;
		private $codordemservico;
		private $codcliente;
		private $codfornecedor;
		private $codsolicitante;
		private $totaldescontovalor;
		private $situacao;
		private $totalcusto;
		private $totalpedido;
		private $totalimpostos;

		function __construct($id=''){ /* Preenche objeto com os dados do banco (id) */
			if($id != ''){
				$banco = conecta();
				$qry = $banco->query("select * from tb_pedido where id_pedido = '".$id."'");
				$dados = $qry->fetch_assoc();
				$this->setId_Pedido($dados['id_pedido']);
				$this->setNumero($dados['numero']);
				$this->setTipopedido($dados['tipopedido']);
				$this->setDescricao($dados['descricao']);
				$this->setCodordemservico($dados['cod_ordemservico']);
				$this->setCodcliente($dados['cod_cliente']);
				$this->setCodfornecedor($dados['cod_fornecedor']);
				$this->setCodsolicitante($dados['cod_solicitante']);
				$this->setTotaldescontovalor($dados['totaldescontovalor']);
				$this->setSituacao($dados['situacao']);
				$this->setTotalcusto($dados['totalcusto']);
				$this->setTotalpedido($dados['totalpedido']);
				$this->setTotalimpostos($dados['totalimpostos']);
			}
		}

		public function cadastrar(){
			$banco = conecta();
			$qry = $banco->query("insert into tb_pedido (numero,tipopedido,descricao,cod_ordemservico,cod_cliente,cod_fornecedor,cod_solicitante,totaldescontovalor,situacao,totalcusto,totalpedido,totalimpostos) values 
								 ('".$this->getNumero()."','".$this->getTipopedido()."','".$this->getDescricao()."','".$this->getCodordemservico()."','".$this->getCodCliente()."','".$this->getCodfornecedor()."','".$this->getCodsolicitante()."','".$this->getTotaldescontovalor()."','".$this->getSituacao()."','".$this->getTotalcusto()."','".$this->getTotalpedido()."','".$this->getTotalimpostos()."')");
			if($qry){
				return true;
			} else {
				return false;
			}
		}

		public function buscarProduto($descricao){
			$banco = conecta();
			$qry = $banco->query("select * from tb_pedido where descricao = '".$descricao."'");
			if($qry->num_rows > 0){
				$retorno = '';
				while($dados = $query->fetch_assoc()) $retorno[] = $dados;
				return $retorno;
			}
		}
		public function setId_Pedido($id_pedido){
			$this->id_pedido = $id_pedido;
		}
		public function setNumero($numero){
			$this->numero = $numero;
		}
		public function setTipopedido($tipopedido){
			$this->tipopedido = $tipopedido;
		}
		public function setDescricao($descricao){
			$this->descricao = $descricao;
		}
		public function setCodordemservico($codordemservico){
			$this->codordemservico = $codordemservico;
		}
		public function setCodcliente($codcliente){
			$this->codcliente = $codcliente;
		}
		public function setCodfornecedor($codfornecedor){
			$this->codfornecedor = $codfornecedor;
		}
		public function setCodsolicitante($codsolicitante){
			$this->codsolicitante = $codsolicitante;
		}
		public function setTotaldescontovalor($totaldescontovalor){
			$this->totaldescontovalor = $totaldescontovalor;
		}
		public function setSituacao($situacao){
			$this->situacao = $situacao;
		}
		public function setTotalcusto($totalcusto){
			$this->totalcusto = $totalcusto;
		}
		public function setTotalpedido($totalpedido){
			$this->totalpedido = $totalpedido;
		}
		public function setTotalimpostos($totalimpostos){
			$this->totalimpostos = $totalimpostos;
		}		
		public function getId_Pedido(){
			return $this->id_pedido;
		}
		public function getNumero(){
			return $this->numero;
		}
		public function getTipopedido(){
			return $this->tipopedido;
		}
		public function getDescricao(){
			return $this->descdicao;
		}
		public function getCodordemservico(){
			return $this->codordemservico;
		}
		public function getCodcliente(){
			return $this->codcliente;
		}
		public function getCodfornecedor(){
			return $this->codfornecedor;
		}
		public function getCodsolicitante(){
			return $this->codsolicitante;
		}
		public function getTotaldescontovalor(){
			return $this->totaldescontovalor;
		}
		public function getSituacao(){
			return $this->situacao;
		}
		public function getTotalcusto(){
			return $this->totalcusto;
		}
		public function getTotalpedido(){
			return $this->totalpedido;
		}
		public function getTotalimpostos(){
			return $this->totalimpostos;
		}
	}
?>