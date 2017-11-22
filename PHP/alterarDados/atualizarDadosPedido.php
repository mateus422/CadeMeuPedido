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
        <h3>Modifique pedidos aqui:</h3>
        <form method="get" action="#">
          <label>ID do Pedido a ser modificado: <input type="number" name="CodPedido"></label><br><br>   
        <label>Novo nome do pedido: <input type="text" name="NNomePedido"></label><br>
            <label>Novo valor do pedido: <input type="number" name="NValorPedido"></label><br>
            <input type="submit" value="Modificar">
            </form>
<?php
        
$nnomePedido = $_GET['NNomePedido']; 
$nvalorPedido = $_GET['NValorPedido'];

$codPedido = $_GET['CodPedido'];
        
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
