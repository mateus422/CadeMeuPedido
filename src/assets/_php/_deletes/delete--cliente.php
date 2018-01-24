<html>

<head>
	<title>Deletar dados</title>
	<link rel="stylesheet" href="../../HtmleCSS/cadastro.css">
	<link rel="stylesheet" href="../../HtmleCSS/tabela.css">

</head>

<body>

	<?php

		require '..\config.php';
    	require '..\connection.php';
   		require '..\database.php';

    	$link = DBconnect();    
        
    	//Teoricamente vai imprimir uma tabela com as opções de Update e Delete
		$teste = DBRead('T_cliente');
		$cont = 0;
        echo "<h2>Lista de clientes:</h2><br><br>";
        foreach($teste as $key){
            $cont++;
            $clientes[$cont] = $key['cod_cliente']; 
            $nomes[$cont] = $key['nome']; 
            $numeros[$cont] = $key['numero']; 
            $enderecos[$cont] = $key['endereço']; 
            $codPedido[$cont] = $key['cod_pedido']; 
   }
        
?>
		<table>
			<tr class="topo">
				<th>ID do cliente</th>
				<th>Nome do cliente</th>
				<th>Numero do cliente</th>
				<th>Endereço do cliente</th>
				<th>Código do pedido</th>
			</tr>
			<?php for($i = 1; $i <= $cont; $i++){ ?>
			<tr>
				<td>
					<?php echo  $clientes[$i]; ?>
				</td>
				<td>
					<?php echo  $nomes[$i]; ?>
				</td>
				<td>
					<?php echo  $numeros[$i]; ?>
				</td>
				<td>
					<?php echo  $enderecos[$i]; ?>
				</td>
				<td>
					<?php echo  $codPedido[$i]; ?>
				</td>
			</tr>
			<?php } ?>
		</table>
		
		<br>
		<br>
		<br>

		<form method="get" action="#">
			<fieldset>
				<legend>Delete clientes aqui</legend>
				<label>ID do cliente a ser deletado:
					<input type="number" name="CodCliente">
				</label>
				<br>
				<br>
				<input class="botao" type="submit" value="Deletar">
			</fieldset>
		</form>

		<?php 

      			@$codCliente = $_GET['CodCliente'];
      			  
        		$delete = DBDelete('T_cliente', "cod_cliente = $codCliente");
 
        		if($delete)
        			echo "Deletado com Sucesso";
        		else
       				echo "Falha ao Deletar";


       			DBClose($link); 
        	?>
</body>

</html>