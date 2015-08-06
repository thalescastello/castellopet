<?php
	session_start();
	if(!isset($_SESSION['logado']) or $_SESSION['logado']!=1){
		header("Location: index.html");
	}
?>