<?php
echo"<!DOCTYPE html><html lang='pt-br'><head><meta charset='utf-8'><link rel='stylesheet' href='../HtmleCSS/cadastro.css' type='text/css'></head><body><div>";
    require 'config.php';
    require 'connection.php';
    require 'database.php';
    $link = DBconnect();

$loginEmpresa = $_POST['LoginEmpresa']; 
$senhaEmpresa = $_POST['SenhaEmpresa']; 
$erro=false;
$table= "t_empresa";
$logon = DBRead('t_empresa', " WHERE emp_login ='$loginEmpresa' AND emp_senha = '$senhaEmpresa'", '*');
if (empty($loginEmpresa)){//Verifica se o login está preenchido
    echo"<script language='javascript' type='text/javascript'>alert('Por favor preencha o login corretamente!');window.location.href='../../login.html';</script>";
    $erro=true;
}    
if (empty($senhaEmpresa)) {//Verifica se o valor foi preenchido 
    echo"<script language='javascript' type='text/javascript'>alert('Por favor preencha a senha corretamente!');window.location.href='../../login.html';</script>";
    $erro=true;
}
if ($erro){
	echo "<button class='button' onClick=location.href='../../login.html'><span>Voltar ao login</span></button></div></body></html>";
} else{
	if ($logon){
		header("Location:../../functions--choice.html");
	} else{
		echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='../../login.html';</script>";
		DBClose($link);
    }

}
DBClose($link);
?>