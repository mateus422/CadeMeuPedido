<?php
    require '..\PHP\config.php';
    require '..\PHP\connection.php';
    require '..\PHP\database.php';

$nomeEntregador = $_GET["NomeEntregador"];
$descricaoEntregador = $_GET["DescricaoEntregador"];
$table = "T_entregador";
$dadosEntregador= array(
'nome'=> "$nomeEntregador",
'descricao'=> "$descricaoEntregador"
);
$gravar = DBCreate ($table, $dadosPedido);
    if($gravar){
        echo "Dados inseridos!";
    } else{
        echo "Erro na inserção de dados!";
    }
DBRead($table, $params = null, $fields = '*');
?>