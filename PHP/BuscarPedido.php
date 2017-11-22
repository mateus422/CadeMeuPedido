<?php
	require '..\PHP\config.php';
    require '..\PHP\connection.php';
    require '..\PHP\database.php';
   
    $codigo = $_GET["codigo"];

    //Mostrar o pedido a partir do código
    $query = sprintf("SELECT P.nome, P.preco, E.identregador FROM T_PEDIDO P, T_ENTREGADOR E WHERE P.codigo=$codigo, P.identregador == E.identregador");
    //Passar o id do entregador para a variável
    $identregador = sprintf("SELECT E.identregador FROM T_PEDIDO P, T_ENTREGADOR E  WHERE P.identregador == E.identregador");
    $consulta =  DBExecute($query);

    if ($consulta) {
    	//Mostrar o entregador a partir de seu id
    	$entregador = sprintf("SELECT nome FROM T_ENTREGADOR  WHERE E.identregador == $identregador");
    	DBExecute($entregador);
    } else {
    	echo 'Código incompatível';
    }
   
?>
