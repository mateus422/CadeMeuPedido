<html lang="pt-br">

<head>
    <title>Update de dados</title>
    
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
        
        echo "<h2>Lista de pedidos:</h2><br><br>";
        foreach($teste as $key){
             echo "ID: ".$key['cod_pedido'].'<br>';
             echo "Nome do pedido: ".$key['nome_pedido'].'<br>';
             echo "Valor do pedido: ".$key['valor_pedido'].'<br>';
             echo "Cod_cliente: ".$key['cod_cliente'].'<br>';
             echo "Cod_entregador: ".$key['cod_entregador'].'<br><hr>';
             
   }
        
?>
        <br><br><br>

        <form method="get" action="#">
            <fieldset>
                <legend>Modifique pedidos aqui</legend>
                <label>ID do Pedido a ser modificado: </label><br>
                <input type="number" name="CodPedido"><br>
                <label>Novo nome do pedido: </label><br>
                <input type="text" name="NNomePedido"> <br>
                <label>Novo valor do pedido:</label><br>
                <input type="number" name="NValorPedido"><br>
                <input type="submit" value="Modificar">
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