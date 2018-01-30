<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadê meu pedido ?</title>
    <link rel="stylesheet" href="../../_css/pags/cadastro--empr.css">
    <link rel="stylesheet" href="../../_css/base.css">
    <link rel="stylesheet" href="../../_css/pags/inputs.css">
</head>

<body>
    <header class="header-main">
        <div class="content">
            <img class="logo" src="../../_images/logo.png" width="160px">
            <nav class="nav-main">
                <ul>
                    <li>
                        <li><a href="../../../quemsomos.html">Quem somos</a></li> 
                    </li>
                </ul>
            </nav>
            <a class="header__btn" role="button" href="../../../functions--choice.html">Funções do sistema</a>
        </div>
    </header>

    <main>

				
        <section class="cadastro">
            <div class="content">
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
				<fieldset style = "width: 20%; margin: 150px auto;">
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
						echo"<script language='javascript' type='text/javascript'>alert('Deletado com sucesso!');</script>";
					else
						   echo"<script language='javascript' type='text/javascript'>alert('Falha ao Deletar');</script>";
	
	
					   DBClose($link); 
				?>
            </div>
        </section>
    </main>
</body>

</html>