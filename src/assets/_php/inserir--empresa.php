<?php
echo"<!DOCTYPE html><html lang='pt-br'><head><meta charset='utf-8'><link rel='stylesheet' href='../HtmleCSS/cadastro.css' type='text/css'></head><body><div>";
    require 'config.php';
    require 'connection.php';
    require 'database.php';

    $link = DBconnect();

$loginEmpresa = $_POST['LoginEmpresa']; 
$senhaEmpresa = $_POST['SenhaEmpresa']; 
$nomeEmpresa = $_POST['NomeEmpresa'];
$cnpjEmpresa = $_POST['CNPJEmpresa']; 
$telefoneEmpresa = $_POST['TelefoneEmpresa'];
$erro=false;

$table= "t_empresa";
if (empty($loginEmpresa)){//Verifica se o nome está preenchido
    echo "Por favor preencha o login corretamente!<br>";
    $erro=true;
}    
if (empty($senhaEmpresa)) {//Verifica se o valor foi preenchido e se é um numero
    echo "Por favor preencha a senha da empresa corretamente!<br>";
    $erro=true;
}
if (empty($nomeEmpresa)) {//Verifica se o valor foi preenchido e se é um numero
    echo "Por favor preencha o nome da empresa corretamente!<br>";
    $erro=true;
}
if (empty($cnpjEmpresa)) {//Verifica se o valor foi preenchido e se é um numero
    echo "Por favor preencha o CNPJ da empresa corretamente!<br>";
    $erro=true;
}
if (empty($telefoneEmpresa)) {//Verifica se o valor foi preenchido e se é um numero
    echo "Por favor preencha o telefone da empresa corretamente!<br>";
    $erro=true;
}
if(!$erro){
    $dadosPedido = array ( 
    'emp_cnpj' => "$cnpjEmpresa",
    'emp_nome' => "$nomeEmpresa",
    'emp_login' => "$loginEmpresa",
    'emp_senha' => "$senhaEmpresa",
    'emp_telefone' => "$telefoneEmpresa"

    );
    $gravar = DBCreate ($table, $dadosPedido);
    if($gravar){
        echo "Dados inseridos!";
    } else{
        echo "Erro na inserção de dados!";
    }
} else{
    echo "<button class='button' onClick=location.href='../../cadastro--empr.html'<span>Voltar ao início</span></button></div></body></html>";
}
DBClose($link);
?>