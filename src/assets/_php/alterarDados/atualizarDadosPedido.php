<html lang="pt-br">

<head>
    <title>Update de dados</title>
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
    $table= "T_pedido";
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
                <legend>Modifique pedidos aqui</legend>
                <label>ID do Pedido a ser modificado: </label>
                <br>
                <input type="number" name="CodPedido">
                <br>
                <label>Novo nome do pedido: </label>
                <br>
                <input type="text" name="NNomePedido">
                <br>
                <label>Novo valor do pedido:</label>
                <br>
                <input type="number" name="NValorPedido">
                <br>
                <input class="botao" type="submit" value="Modificar">
            </fieldset>
        </form>
        <?php
        
@$nnomePedido = $_GET['NNomePedido']; 
@$nvalorPedido = $_GET['NValorPedido'];

@$codPedido = $_GET['CodPedido'];
        
$dadosNPedido = array (
        
        'nome_pedido' => "$nnomePedido",
        'valor_pedido' => "$nvalorPedido"
        );
        
          $update = DBUpdate($table,$dadosNPedido,"cod_pedido = $codPedido");
            if($update){
                echo "Dados modificados com sucesso!";
            }else{
                echo "Tivemos problemas em modificar os dados";
            }
        
       DBClose($link); 
        ?>


</body>

</html>