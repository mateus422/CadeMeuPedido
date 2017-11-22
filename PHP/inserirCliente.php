<?php
echo"<!DOCTYPE html><html lang='pt-br'><head><meta charset='utf-8'><link rel='stylesheet' href='..\Html e CSS\cadastro.css' type='text/css'></head><body><div>";
    require 'config.php';
    require 'connection.php';
    require 'database.php';

    $link = DBconnect();
   
$nomeCliente = $_POST['NomeCliente'];
$numeroCliente = $_POST['NumeroCliente'];
$enderecoCliente = $_POST['EnderecoCliente'];
$erro=false; 
/*Falta ver o nome correto no banco de dados;*/ $table= "T_cliente";
if (empty($nomeCliente)){//Verifica se o nome do cliente está preenchido
    echo "Por favor preencha o nome do cliente corretamente!<br>";
    $erro=true;
}    
if (empty($numeroCliente) || is_numeric($numeroCliente)) {//Verifica se o numero do cliente está preenchido e se é um numero
    echo "Por favor preencha o número do cliente corretamente!<br>";
    $erro=true;
}
if (empty($enderecoCliente)) {//Verifica se o endereço está preenchido
    echo "Por favor preencha o endereço do cliente corretamente!<br>";
    $erro=true;
}
if(!$erro){
    $dadosCliente = array (
        /*Falta ver o nome correto no banco de dados;*/ 'nome' => "$nomeCliente",
        /*Falta ver o nome correto no banco de dados;*/ 'numero' => "$numeroCliente",
        /*Falta ver o nome correto no banco de dados;*/ 'endereço' => "$enderecoCliente"
    );
    $gravar = DBCreate ($table, $dadosCliente);
    if($gravar){
        echo "Dados inseridos!<br>";
    } else{
        echo "Erro na inserção de dados!<br>";
    }
} else{
    echo "<button class='button' onClick=location.href='..\Html e CSS\cadastrarCliente.html'><span>Voltar ao início</span></button></div></body></html>";
}
DBClose($link);
?>