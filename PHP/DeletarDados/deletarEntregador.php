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
        $entregadores[$cont] = $key['cod_entregador']; 
        $nomes[$cont] = $key['nome']; 
        $descricao[$cont] = $key['descricao'];

}
    
?>

        <table>
            <tr class="topo">
                <th>ID do entregador</th>
                <th>Nome do entregador</th>
                <th>Descrição do entregador</th>
            </tr>
            <?php for($i = 1; $i <= $cont; $i++){ ?>
            <tr>
                <td>
                    <?php echo  $entregadores[$i]; ?>
                </td>
                <td>
                    <?php echo  $nomes[$i]; ?>
                </td>
                <td>
                    <?php echo  $descricao[$i]; ?>
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
                    <input type="number" name="CodEntregador">
                </label>
                <br>
                <br>
                <input class="botao" type="submit" value="Deletar">
            </fieldset>
        </form>

        <?php 

      			@$codEntregador = $_GET['CodEntregador'];
      			  
        		$delete = DBDelete('T_entregador', "cod_entregador = $codEntregador");
 
        		if($delete)
        			echo "Deletado com Sucesso";
        		else
       				echo "Falha ao Deletar";

        

       DBClose($link); 
        ?>
</body>

</html>