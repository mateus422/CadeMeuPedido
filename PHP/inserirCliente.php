<?php
 
    require 'config.php';
    require 'connection.php';
    require 'database.php';

    $link = DBconnect();
   
$nomeCliente = $_GET['NomeCliente'];
$numeroCliente = $_GET['NumeroCliente'];
$enderecoCliente = $_GET['EnderecoCliente']; 

/*Falta ver o nome correto no banco de dados;*/ $table= "T_cliente";

    $dadosCliente = array (
        /*Falta ver o nome correto no banco de dados;*/ 'nome' => "$nomeCliente",
        /*Falta ver o nome correto no banco de dados;*/ 'numero' => "$numeroCliente",
        /*Falta ver o nome correto no banco de dados;*/ 'endereço' => "$enderecoCliente"
        );

    
    //Função gravar(Ailla)
    $gravar = DBCreate ($table, $dadosCliente);
    if($gravar){
        echo "Dados inseridos!";
    } else{
        echo "Erro na inserção de dados!";
    }

    DBClose($link);
?>