<?php
   

    require '..\PHP\config.php';
    require '..\PHP\connection.php';
    require '..\PHP\database.php';

    $link = DBconnect();

$nomePedido = $_GET['NomePedido']; 
$valorPedido = $_GET['ValorPedido']; 

/*Falta ver o nome correto no banco de dados;*/ $table= "T_pedido";
 
    $dadosPedido = array (
        
        /*Falta ver o nome correto no banco de dados;*/ 'nome_pedido' => "$nomePedido",
        /*Falta ver o nome correto no banco de dados;*/ 'valor_pedido' => "$valorPedido"
        );
        

    //Função gravar(Ailla)
    $gravar = DBCreate ($table, $dadosPedido);
    if($gravar){
        echo "Dados inseridos!";
    } else{
        echo "Erro na inserção de dados!";
    }

DBClose($link);
?>