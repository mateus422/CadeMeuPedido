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
		$teste = DBRead('t_cliente');
		$cont = 0;
		echo "<h2>Lista de clientes:</h2><br><br>";
        foreach($teste as $key){
            $cont++;
            $cpf[$cont] = $key['cli_cpf']; 
            $nomes[$cont] = $key['cli_nomecompleto']; 
            $numeros[$cont] = $key['cli_telefone']; 
            $enderecos[$cont] = $key['cli_endereco']; 
   }
        
?>
        <table>
            <tr class="topo">
                <th>CPF do cliente</th>
                <th>Nome do cliente</th>
                <th>Telefone do cliente</th>
                <th>Endereço do cliente</th>
            </tr>
            <?php for($i = 1; $i <= $cont; $i++){ ?>
            <tr>
                <td>
                    <?php echo  $cpf[$i]; ?>
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
            </tr>
            <?php } ?>
        </table>

        <br>
        <br>
        <br>

		<form method="get" action="#">
			<fieldset>
				<legend>Delete clientes aqui</legend>
				<label>CPF do cliente a ser deletado:
					<input type="number" name="CpfCliente">
				</label>
				<br>
				<br>
				<input class="botao" type="submit" value="Deletar">
			</fieldset>
		</form>

		<?php 

      			@$cpfCliente = $_GET['CpfCliente'];
      			  
        		$delete = DBDelete('t_cliente', "cli_cpf = $cpfCliente");
 
        		if($delete)
        			echo "Deletado com Sucesso";
        		else
       				echo "Falha ao Deletar";


       			DBClose($link); 
        	?>
</body>

</html>