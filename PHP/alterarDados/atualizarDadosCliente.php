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
    $table= "T_cliente";
            
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
            <label>ID do cliente a ser modificado: <input type="number" name="CodCliente"></label><br><br>
            <label>Novo nome do cliente: <input type="text" name="NNomeCliente"></label><br><br>
            <label>novo numero do cliente: <input type="number" name="NNumeroCliente"></label><br><br>
            <label>Novo endereço do cliente: <input type="text" name="NEnderecoCliente"></label><br><br>
            <input type="submit" value="Enviar">
        </form>
    
<?php 
      $codCliente = $_GET['CodCliente'];
      $nnomeCliente = $_GET['NNomeCliente'];
      $nnumeroCliente = $_GET['NNumeroCliente'];
      $nenderecoCliente = $_GET['NEnderecoCliente'];   
        
        
        $dadosNCliente = array (
        /*Falta ver o nome correto no banco de dados;*/ 'nome' => "$nnomeCliente",
        /*Falta ver o nome correto no banco de dados;*/ 'numero' => "$nnumeroCliente",
        /*Falta ver o nome correto no banco de dados;*/ 'endereço' => "$nenderecoCliente"
        );
        
        $update = DBUpdate($table,$dadosNCliente,"cod_cliente = $codCliente");
            if($update){
                echo "Dados modificados com sucesso!";
            }else{
                echo "Tivemos problemas em modificar os dados";
            }
        
       DBClose($link); 
        ?>        
        
        
        </body>
    </html>
