<?php
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED);
	include "config.php";
	include "includes/funcoes.php";
	extract($_REQUEST);
	if(isset($site)){
		switch ($site) {
			case 'ajax':
				include "controller/ajax.php";
			break;
			case 'index':
				carregaView('login.html');
			break;
			case 'deslogar':
				include "controller/deslogar.php";
			break;
			case 'login':
				include "controller/login.php";
				carregaView('login.html');
			break;
			case 'admin':
				include "controller/admin.php";
				carregaView('admin.html');
			break;
			case 'cad_usuarios':		
				carregaView('cad_usuarios.html');
			break;	
			case 'cad_produtos':		
				carregaView('cad_produtos.html');
			break;
			case 'cad_produtosgrupo':		
				carregaView('cad_produtosgrupo.html');
			break;										
			default:
				carregaView('login.html');
			break;
		}
	} else {
		carregaView('login.html');
	}
	
?>