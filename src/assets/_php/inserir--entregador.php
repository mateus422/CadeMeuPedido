<?php
echo"<!DOCTYPE html><html lang='pt-br'><head><meta charset='utf-8'><link rel='stylesheet' href='../HtmleCSS/cadastro.css' type='text/css'></head><body><div>";
    require 'config.php';
    require 'connection.php';
    require 'database.php';

    $link = DBconnect();

$cpfEntregador = $_POST["CPFEntregador"];
$nomeEntregador = $_POST["NomeEntregador"];
$telefoneEntregador = $_POST["TelefoneEntregador"];
$cnpjEmpresa = $_POST['CNPJEmpresa']; 
$erro=false;

$table = "t_entregador";
if (empty($cpfEntregador)) {//Verifica se a descrição está preenchida
    echo "Por favor preencha o cpf do entregador corretamente!<br>";
    $erro=true;
}
if (empty($nomeEntregador)){//Verifica se o nome está preenchido
    echo "Por favor preencha o nome do entregador corretamente!<br>";
    $erro=true;
}
if (empty($telefoneEntregador)) {//Verifica se a descrição está preenchida
    echo "Por favor preencha o telefone do entregador corretamente!<br>";
    $erro=true;
}  
if (empty($cnpjEmpresa)) {//Verifica se o valor foi preenchido e se é um numero
    echo "Por favor preencha o CNPJ da empresa corretamente!<br>";
    $erro=true;
}  
if(!$erro){
    $dadosEntregador= array(
        'ent_cpf'=> "$cpfEntregador",
        'ent_nomecompleto'=> "$nomeEntregador",
		'ent_telefone'=> "$telefoneEntregador",
        'emp_cnpj' => "$cnpjEmpresa"

	);
    $gravar = DBCreate ($table, $dadosEntregador);
    if($gravar){
        echo "Dados inseridos!";
    } else{
        echo "Erro na inserção de dados!";
    }
} else{
    echo "<button class='button' onClick=location.href='../HtmleCSS/CadastrarEntregador.html'><span>Voltar ao início</span></button></div></body></html>";
}
DBClose($link);
?>