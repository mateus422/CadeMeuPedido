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
    $teste = DBRead('T_pedido');
    $cont = 0;
    
    echo "<h2>Lista de pedidos:</h2><br><br>";
    foreach($teste as $key){
        $cont++;
        $pedidos[$cont] = $key['cod_pedido']; 
        $nomes[$cont] = $key['nome_pedido']; 
        $valor[$cont] = $key['valor_pedido']; 
        $codCliente[$cont] = $key['cod_cliente']; 
        $codEntregador[$cont] = $key['cod_entregador']; 
         
}
    
?>
        <table>
            <tr class="topo">
                <th>ID do pedido</th>
                <th>Nome do pedido</th>
                <th>Valor do pedido</th>
                <th>Código do cliente</th>
                <th>Código do entregador</th>
            </tr>
            <?php for($i = 1; $i <= $cont; $i++){ ?>
            <tr>
                <td>
                    <?php echo  $pedidos[$i]; ?>
                </td>
                <td>
                    <?php echo  $nomes[$i]; ?>
                </td>
                <td>
                    <?php echo  $valor[$i]; ?>
                </td>
                <td>
                    <?php echo  $codCliente[$i]; ?>
                </td>
                <td>
                    <?php echo  $codEntregador[$i]; ?>
                </td>
            </tr>
            <?php } ?>
        </table>

        <br>
        <br>
        <br>

        <form method="get" action="#">
            <fieldset>
                <legend>Delete pedidos aqui</legend>
                <label>ID do Pedido a ser deletado:
                    <input type="number" name="CodPedido">
                </label>
                <br>
                <br>
                <input class="botao" type="submit" value="Deletar">
            </fieldset>
        </form>

        <?php 

                @$codPedido = $_GET['CodPedido'];
                  
                $delete = DBDelete('T_pedido', "cod_pedido = $codPedido");
 
                if($delete)
                    echo "Deletado com Sucesso";
                else
                    echo "Falha ao Deletar";

        DBClose($link); 
    ?>
</body>

</html>