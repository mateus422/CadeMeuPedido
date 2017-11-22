<?php
	require '..\PHP\config.php';
    require '..\PHP\connection.php';
    require '..\PHP\database.php';
   
    $cod_pedido = $_GET["codigo"];

    //Mostrar o pedido a partir do código
    $query = sprintf("SELECT P.nome_pedido, P.valor_pedido, E.cod_entregador FROM T_PEDIDO P, T_ENTREGADOR E WHERE P.cod_pedido=$cod_pedido, P.cod_entregador = E.cod_entregador");
    //Passar o id do entregador para a variável
    $cod_entregador = sprintf("SELECT E.cod_entregador FROM T_PEDIDO P, T_ENTREGADOR E  WHERE P.cod_entregador = E.cod_entregador");
    $consulta =  DBExecute($query);

    if ($consulta) {
    	//Mostrar o entregador a partir de seu código
    	$entregador = sprintf("SELECT nome FROM T_ENTREGADOR  WHERE E.cod_entregador = $cod_entregador");
    	DBExecute($entregador);
    } else {
    	echo 'Código incompatível';
    }
   
?>
