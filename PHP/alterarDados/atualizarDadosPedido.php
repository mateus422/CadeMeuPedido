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
            
         /*  echo "<table>
                    <tr>
                        <th>Nome</th>
                        <th>Numero</th>
                        <th>Endereço</th>
                        <th>Data</th>
                        <th>Update</th>
                        <th>Delete</th>
                        </tr>";

        foreach($teste as $key){
             echo "
         
                        <tr>
                            <td>$key[Nome]</td>
                            <td>$key[Numero]</td>
                            <td>$key[endereco]</td>
                            <td>$key[data]</td>
                            <td> <form method='get'>
                                <label><input type='button'>Update</label></td>
                            <td>
                                 <label><input type='button'>Delete</label></td>
                                </form><td>
                        </tr>
                
                </table>";
             
   }*/
?>

<form method="get" action="#">
          <label>ID do Pedido a ser modificado: <input type="number" name="CodPedido"></label><br><br>   
        <label>Novo nome do pedido: <input type="text" name="NNomePedido"></label><br>
            <label>Novo valor do pedido: <input type="number" name="NValorPedido"></label><br>
            <input type="submit" value="Enviar">
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
