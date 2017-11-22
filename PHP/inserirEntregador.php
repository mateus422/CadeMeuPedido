<?php
echo"<!DOCTYPE html><html lang='pt-br'><head><meta charset='utf-8'><link rel='stylesheet' href='..\Html e CSS\cadastro.css' type='text/css'></head><body><div>";
    require 'config.php';
    require 'connection.php';
    require 'database.php';

    $link = DBconnect();

$nomeEntregador = $_POST["NomeEntregador"];
$descricaoEntregador = $_POST["DescricaoEntregador"];

$table = "T_entregador";
if (empty($nomeEntregador)){//Verifica se o nome está preenchido
    echo "Por favor preencha o nome do entregador corretamente!<br>";
    $erro=true;
}    
if (empty($descricaoEntregador)) {//Verifica se a descrição está preenchida
    echo "Por favor preencha a descricao do entregador corretamente!<br>";
    $erro=true;
}
if(!$erro){
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
} else{
    echo "<button class='button' onClick=location.href='..\Html e CSS\CadastrarEntregador.html'><span>Voltar ao início</span></button></div></body></html>";
}
DBClose($link);
?>