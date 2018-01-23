<?php
	require 'config.php';
    require 'connection.php';
    require 'database.php';
    $link = DBconnect();

    $cod_pedido = $_GET['codigo'];

    //Mostrar o pedido a partir do código
   $teste = DBRead('t_pedido', " WHERE cod_pedido = '$cod_pedido'", '*');
   $table= "t_pedido";
        
        echo "<h2>Pedido: </h2><br><br>";
            foreach($teste as $key){

                     echo "ID: ".$key['cod_pedido'].'<br>';
                     echo "Nome do pedido: ".$key['nome_pedido'].'<br>';
                     echo "Valor do pedido: ".$key['valor_pedido'].'<br>';
                } 
   DBClose($link);
?>