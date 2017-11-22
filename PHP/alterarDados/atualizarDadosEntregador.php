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
    $teste = DBRead('T_entregador');
    $table = "T_entregador";
            
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
            <label>ID do entregador a ser modificado: <input type="number" name="CodEntregador"></label><br><br>
            <label>Novo nome do entregador: <input type="text" name="NNomeEntregador"></label><br>
            <label>Nova Descricao do entregador: <input type="text" name="NDescricaoEntregador"></label><br>
            <input type="submit" value="Enviar">
            </form> 
        
<?php
$nnomeEntregador = $_GET["NNomeEntregador"];
$ndescricaoEntregador = $_GET["NDescricaoEntregador"];

$codEntregador = $_GET["CodEntregador"];
        
$dadosNEntregador= array(
'nome' => "$nnomeEntregador",
'descricao' => "$ndescricaoEntregador"
);
        
        $update = DBUpdate($table,$dadosNEntregador,"cod_entregador = $codEntregador");
            if($update){
                echo "Dados modificados com sucesso!";
            }else{
                echo "Tivemos problemas em modificar os dados";
            }
          
       DBClose($link); 
        ?>        
        </body>
    </html>
