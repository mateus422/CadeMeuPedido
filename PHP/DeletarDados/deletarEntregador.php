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
        
      echo "<h2>Lista de pedidos:</h2><br><br>";
        foreach($teste as $key){
             echo "ID: ".$key['cod_entregador'].'<br>';
             echo "Nome do entregador: ".$key['nome'].'<br>';
             echo "Descrição: ".$key['descricao'].'<br>';
             echo "Cod_pedido: ".$key['cod_pedido'].'<br>';
             echo "Cod_entregador: ".$key['cod_entregador'].'<br><hr>';
             
   }
?>
    <br><br><br>
        <h3>Delete entregadores aqui:</h3>
        <form method="get" action="#">
            <label>ID do entregador a ser deletado: <input type="number" name="CodEntregador"></label><br><br>
            <input type="submit" value="Deletar">
            </form> 

            <?php 

      			$codEntregador = $_GET['CodEntregador'];
      			  
        		$delete = DBDelete('T_entregador', "cod_entregador = $codEntregador");
 
        		if($delete)
        			echo "OK";
        		else
       				echo "Deu ruuim";

        

       DBClose($link); 
        ?>        
        </body>
    </html>