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
    $teste = DBRead('T_entregador');
    $cont = 0;
    
    echo "<h2>Lista de entregadores:</h2><br><br>";
    foreach($teste as $key){
        $cont++;
        $cpfEntr[$cont] = $key['ent_cpf']; 
        $nomeEntr[$cont] = $key['ent_nomecompleto']; 
        $telefoneEntr[$cont] = $key['ent_telefone'];
        $cnpjEntr[$cont] = $key['emp_cnpj'];
}
    
?>
    <table>
        <tr class="topo">
            <th>CPF do entregador</th>
            <th>Nome do entregador</th>
            <th>Telefone do entregador</th>
            <th>Cnpj da Empresa</th>
        </tr>
        <?php for($i = 1; $i <= $cont; $i++){ ?>
        <tr>
            <td>
                <?php echo  $cpfEntr[$i]; ?>
            </td>
            <td>
                <?php echo  $nomeEntr[$i]; ?>
            </td>
            <td>
                <?php echo  $telefoneEntr[$i]; ?>
            </td>
            <td>
                <?php echo  $cnpjEntr[$i]; ?>
            </td>
        </tr>
        <?php } ?>
    </table>

    <br>
    <br>
    <br>
        
        <form method="get" action="#">
            <fieldset>
                <legend>Delete entregadores aqui</legend>
                <label>ID do entregador a ser deletado:
                    <input type="number" name="CpfEntregador">
                </label>
                <br>
                <br>
                <input class="botao" type="submit" value="Deletar">
            </fieldset>
        </form>

        <?php 

      			@$cpfEntregador = $_GET['CpfEntregador'];
      			  
        		$delete = DBDelete('T_entregador', "ent_cpf = $cpfEntregador");
 
        		if($delete)
        			echo "Deletado com Sucesso";
        		else
       				echo "Falha ao Deletar";

        

       DBClose($link); 
        ?>
</body>

</html>