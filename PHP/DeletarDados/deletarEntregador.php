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
    $table= "T_entregador";
        
        echo "<h2>Lista de entregadores:</h2><br><br>";
        foreach($teste as $key){
             echo "ID: ".$key['cod_entregador'].'<br>';
             echo "Nome: ".$key['nome'].'<br>';
             echo "Descrição: ".$key['descricao'].'<br><hr>';
             
   }
        
?>
    <br><br><br>
        <h3>Modifique entregadores aqui:</h3>
        <form method="get" action="#">
            <label>ID do entregador a ser modificado: <input type="number" name="CodEntregador"></label><br><br>
            <label>Novo nome do entregador: <input type="text" name="NNomeEntregador"></label><br>
            <label>Nova Descrição do entregador: <input type="text" name="NDescricaoEntregador"></label><br>
            <input type="submit" value="Modificar">
            </form> 
        

       DBClose($link); 
        ?>        
        </body>
    </html>