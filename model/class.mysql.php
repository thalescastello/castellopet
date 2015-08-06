<?php
	class mysqlObj extends mysqli {
		private $con;
		private $host;
		private $user;
		private $pass;
		private $bdName;
		public  $qry;
		function __construct($host, $user, $pass, $bdName){ 
	        $this->setHost($host); 
	        $this->setUser($user); 
	        $this->setPass($pass);
	        $this->setDbName($bdName); 
	        $this->conectarBanco();
	    } 
		function conectarBanco(){
			$mysqli = new mysqli($this->getHost(), $this->getUser(), $this->getPass(), $this->getDbName());
			$this->setConexao($mysqli);
			
			if (mysqli_connect_errno()) {
				trigger_error(mysqli_connect_error());
			}
		}
		function setConexao($con){
			$this->con = $con;
		}	
	 	function setHost($host){
			$this->host = $host;
		}	
	 	function setUser($user){
			$this->user = $user;
		}
	 	function setPass($pass){
			$this->pass = $pass;
		}	
	 	function setDbName($bdName){
			$this->bdName = $bdName;
		}
		function getConexao(){
			return $this->con;
		}
		function getHost(){
			return $this->host;
		}
		function getUser(){
			return $this->user;
		}
		function getPass(){
			return $this->pass;
		}
		function getDbName(){
			return $this->bdName;
		}
	}
?>