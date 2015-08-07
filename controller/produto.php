<?php
	require_once "model/class.produto.php";

	function relatorio(){

		/*$objProduto = new produto();
		$sql = $objProduto->listaProduto()*/

        echo "<table id='listar_resultado'>";
        echo "<thead>";
        echo "<tr>
				<th id='fornecedor_produto'>Fornecedor</th>
				<th id='qtd_produto'>Quantidade</th>
				<th id='v_unitario_produto'>Valor Unitário</th>
				<th id='v_venda_produto'>Valor Venda</th>
			</tr>";
		echo "</thead>";
		echo "<tbody>";
		/*
		while($ficha=mysql_fetch_assoc($sql)){
			$dt = explode('-',$ficha['dt_diagnostico_sintoma']);
			$data = $dt[2]."/".$dt[1]."/".$dt[0];
			echo "<tr>
					<td align='center'>".$ficha['nu_notificacao']."</td>
					<td>".$ficha['no_nome_paciente']."</td>
					<td>".$ficha['no_nome_mae']."</td>
					<td align='center'>".$data."</td>
				</tr>";
		}
		echo "</tbody>";
		echo "</table>";*/
    }
?>
