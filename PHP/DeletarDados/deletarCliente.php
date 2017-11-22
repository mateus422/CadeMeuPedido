<html>

	<head>
		
	</head>

	<body>

		<?php

		require '..\config.php';
    	require '..\connection.php';
   		require '..\database.php';

    	$link = DBconnect();    
        
    	//Teoricamente vai imprimir uma tabela com as opções de Update e Delete
    	$teste = DBRead('T_cliente');
        	echo "<h2>Lista de clientes:</h2><br><br>";
        	foreach($teste as $key){
             	echo "ID: ".$key['cod_cliente'].'<br>';
             	echo "Nome: ".$key['nome'].'<br>';
             	echo "Numero: ".$key['numero'].'<br>';
             	echo "Endereço: ".$key['endereço'].'<br>';
             	echo "Cod_pedido: ".$key['cod_pedido'].'<br><hr>';
   		}
        
		?>
    		<br><br><br>
        	<h3>Delete clientes aqui:</h3>
        	<form method="get" action="#">
            	<label>ID do cliente a ser deletado: <input type="number" name="CodCliente"></label><br><br>
            	<input type="submit" value="Deletar">
        	</form>

        	<?php 

      			$codCliente = $_GET['CodCliente'];
      			  
        		$delete = DBDelete('T_cliente', "cod_cliente = $codCliente");
 
        		if($delete)
        			echo "Deletado com Sucesso";
        		else
       				echo "Falha ao Deletar";


       			DBClose($link); 
        	?>
	</body>

</html>