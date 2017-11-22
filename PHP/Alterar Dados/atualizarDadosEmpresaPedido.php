<?php
    require '..\PHP\config.php';
    require '..\PHP\connection.php';
    require '..\PHP\database.php';

    //Teoricamente vai imprimir uma tabela com as opções de Update e Delete
    $teste = DBRead('tabledeteste');
                
           echo "<table>
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
             
   }
    
?>