<?php
echo"<!DOCTYPE html><html lang='pt-br'><head><meta charset='utf-8'><link rel='stylesheet' href='../HtmleCSS/cadastro.css' type='text/css'></head><body><div>";
    require 'config.php';
    require 'connection.php';
    require 'database.php';

    $link = DBconnect();

$descricaoPedido = $_POST['DescricaoPedido']; 
$valorPedido = $_POST['ValorPedido']; 
$cpfCliente = $_POST['CPFCliente']; 
$erro=false;

$table= "t_pedido";
if (empty($descricaoPedido)){//Verifica se o nome está preenchido
    echo "Por favor preencha a descrição do pedido corretamente!<br>";
    $erro=true;
}    
if (empty($valorPedido)) {//Verifica se o valor foi preenchido e se é um numero
    echo "Por favor preencha o valor do pedido corretamente!<br>";
    $erro=true;
}
if (empty($cpfCliente)) {//Verifica se o valor foi preenchido e se é um numero
    echo "Por favor preencha o cpf do cliente corretamente!<br>";
    $erro=true;
}
if(!$erro){
    $dadosPedido = array ( 
    'ped_descricao' => "$descricaoPedido",
    'ped_valor' => "$valorPedido",
    'cli_cpf' => "$cpfCliente"
    );
    $gravar = DBCreate ($table, $dadosPedido);
    if($gravar){
        echo "Dados inseridos!";
    } else{
        echo "Erro na inserção de dados!";
    }
} else{
    echo "<button class='button' onClick=location.href='../../cadastro--pedido.html'><span>Voltar ao início</span></button></div></body></html>";
}
DBClose($link);
?>