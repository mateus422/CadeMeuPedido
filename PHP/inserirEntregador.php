<?php
         

    require 'config.php';
    require 'connection.php';
    require 'database.php';

    $link = DBconnect();

$nomeEntregador = $_GET["NomeEntregador"];
$descricaoEntregador = $_GET["DescricaoEntregador"];

$table = "T_entregador";

$dadosEntregador= array(
'nome'=> "$nomeEntregador",
'descricao'=> "$descricaoEntregador"
);

$gravar = DBCreate ($table, $dadosEntregador);
    if($gravar){
        echo "Dados inseridos!";
    } else{
        echo "Erro na inserção de dados!";
    }

DBClose($link);
?>