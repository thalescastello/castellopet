<?php
	session_start();
	require_once "model/class.usuario.php";
	require_once "model/class.produto.php";
	require_once "model/class.produtogrupo.php";
	require_once "model/class.pedido.php";

	if(isset($req) and $req == 'logar'){ /* Identifica requisição (Chamada no campo hidden em login) */
		$usuario = new usuario();
		if ($usuario->logar($login, $senha)) {
			$_SESSION['logado'] = 1;
			$_SESSION['id_login'] = $usuario->getId_login();
			$retorno['status'] = true;
			$retorno['mensagem'] = 'admin.html';
		}else{
			$retorno['status'] = false;
			$retorno['mensagem'] = 'Usuário ou Senha Incorreta';
		}
		echo json_encode($retorno); /* Tranforma array em json (array = retorno (vetor)) */
	}

	require_once "restricao.php";
	if(isset($req)){ /* Identifica requisição (Chamada no campo hidden em cadastrar) */
		switch ($req) {
			case 'cadastrar':		
				if (($nome!="") and ($usuario!="") and ($senha!="")) {
					$objUsuario = new usuario();
					$objUsuario->setNome($nome);
					$objUsuario->setUsuario($usuario);
					$objUsuario->setSenha($senha);

					if($objUsuario->cadastrar()){
						echo "cad ";
						$retorno['status'] = true;
						$retorno['mensagem'] = 'Usuário cadastrado com sucesso';
					} else {
						echo "cad2";
						$retorno['status'] = false;
						$retorno['mensagem'] = 'Erro ao cadastrar';
					}				
					echo "usuario";	
				} else {
					$retorno['status'] = false;
					$retorno['mensagem'] = 'Por favor preencha todos os campos';
				}
					
				echo json_encode($retorno);
			break;
			case 'cadproduto':
				if (($codigo!="") and ($descricao!="")) {
					$objProduto = new produto();
					$objProduto->setCodigo($codigo);
					$objProduto->setDescricao($descricao);
					$objProduto->setCodigobarras($codigobarras);

					if($objProduto->cadastrar()){
						$retorno['status'] = true;
						$retorno['mensagem'] = ' Produto cadastrado com sucesso';
					} else {
						$retorno['status'] = false;
						$retorno['mensagem'] = 'Erro ao cadastrar';
					}					
				} else {
					$retorno['status'] = false;
					$retorno['mensagem'] = 'Por favor preencha todos os campos';
				}
					
				echo json_encode($retorno);
			break;
			case 'cadprodutogrupo':
				if (($codigo!="") and ($nome!="")) {
					$objeto = new produtogrupo();
					$objeto->setCodigo($codigo);
					$objeto->setNome($nome);

					if($objeto->cadastrar()){
						$retorno['status'] = true;
						$retorno['mensagem'] = 'Grupo de produto cadastrado com sucesso';
					} else {
						$retorno['status'] = false;
						$retorno['mensagem'] = 'Erro ao cadastrar';
					}					
				} else {
					$retorno['status'] = false;
					$retorno['mensagem'] = 'Por favor preencha todos os campos';
				}
					
				echo json_encode($retorno);
			break;
			case 'cadpedidovenda':
				if ($numero!="") {
					$objeto = new pedido();
					$objeto->setNumero($numero);
					$objeto->setTipopedido($tipopedido);
					$objeto->setDescricao($descricao);
					$objeto->setCodordemservico($codordemservico);
					$objeto->setCodcliente($codcliente);
					$objeto->setSolicitante($solicitante);
					$objeto->setDescontovalor($descontovalor);
					$objeto->setSituacao($situacao);
					$objeto->setTotalcusto($totalcusto);
					$objeto->setTotalpedido($totalpedido);
					$objeto->setTotalimpostos($totalimpostos);

					if($objeto->cadastrar()){
						$retorno['status'] = true;
						$retorno['mensagem'] = 'Pedido de Venda registrado com sucesso';
					} else {
						$retorno['status'] = false;
						$retorno['mensagem'] = 'Erro ao cadastrar';
					}					
				} else {
					$retorno['status'] = false;
					$retorno['mensagem'] = 'Por favor preencha todos os campos';
				}
					
				echo json_encode($retorno);
			break;			
		}
	}

?>