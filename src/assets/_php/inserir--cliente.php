<?php
echo"<!DOCTYPE html><html lang='pt-br'><head><meta charset='utf-8'><link rel='stylesheet' href='../HtmleCSS/cadastro.css' type='text/css'></head><body><div>";
    require 'config.php';
    require 'connection.php';
    require 'database.php';

    $link = DBconnect();
   
$cpfCliente = $_POST['CPFCliente']; 
$nomeCliente = $_POST['NomeCliente'];
$telefoneCliente = $_POST['NumeroCliente'];
$enderecoCliente = $_POST['EnderecoCliente'];
$erro=false; 
$table= "t_cliente";
if (empty($cpfCliente)) {//Verifica se o valor foi preenchido e se é um numero
    echo "Por favor preencha o cpf do cliente corretamente!<br>";
    $erro=true;
}
if (empty($nomeCliente)){//Verifica se o nome do cliente está preenchido
    echo "Por favor preencha o nome do cliente corretamente!<br>";
    $erro=true;
}    
if (empty($telefoneCliente)) {//Verifica se o numero do cliente está preenchido e se é um numero
    echo "Por favor preencha o número do cliente corretamente!<br>";
    $erro=true;
}
if (empty($enderecoCliente)) {//Verifica se o endereço está preenchido
    echo "Por favor preencha o endereço do cliente corretamente!<br>";
    $erro=true;
}
if(!$erro){
    $dadosCliente = array (
        'cli_cpf' => "$cpfCliente",
        'cli_nomecompleto' => "$nomeCliente",
        'cli_telefone' => "$telefoneCliente",
        'cli_endereco' => "$enderecoCliente"
    );
    $gravar = DBCreate ($table, $dadosCliente);
    if($gravar){
        echo "Dados inseridos!<br>";
    } else{
        echo "Erro na inserção de dados!<br>";
    }
} else{
    echo "<button class='button' onClick=location.href='../../cadastro--cliente.html'><span>Voltar ao início</span></button></div></body></html>";
}
DBClose($link);
?>