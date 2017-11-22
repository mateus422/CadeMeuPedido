<?php
     require '..\PHP\config.php';
    require '..\PHP\connection.php';
    require '..\PHP\database.php';
   
$nomeCliente = $_GET['NomeCliente'];
$numeroCliente = $_GET['NumeroCliente'];
$enderecoCliente = $_GET['EnderecoCliente']; 

/*Falta ver o nome correto no banco de dados;*/ $table= "table-cliente";

    $dadosCliente = array (
        /*Falta ver o nome correto no banco de dados;*/ 'nome' => "$nomeCliente",
        /*Falta ver o nome correto no banco de dados;*/ 'numero' => "$numeroCliente",
        /*Falta ver o nome correto no banco de dados;*/ 'endereco' => "$enderecoCliente"
        );

      $gravar = DBCreate($table, $dadosCliente);

    if($gravar){
        echo "Tudo certo!";
    }else{
        echo "algo deu Errado!";
    }
?>