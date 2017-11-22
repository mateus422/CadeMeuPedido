<?php
 
    require 'config.php';
    require 'connection.php';
    require 'database.php';

    $link = DBconnect();
   
$nomeCliente = $_GET['NomeCliente'];
$numeroCliente = $_GET['NumeroCliente'];
$enderecoCliente = $_GET['EnderecoCliente']; 
/*Falta ver o nome correto no banco de dados;*/ $table= "T_cliente";
if ( !isset( $_GET ) || empty( $_GET ) ) {//Verifica se o get tem algo nele
    echo "Formulário vazio.";
} elseif (!empty($nomeCliente)){//Verifica se o nome do cliente está preenchido
    if (!empty($numeroCliente) || is_numeric($numeroCliente)) {//Verifica se o numero do cliente está preenchido e se é um numero
        if (!empty($enderecoCliente)) {//Verifica se o endereço está preenchido
            $dadosCliente = array (
            /*Falta ver o nome correto no banco de dados;*/ 'nome' => "$nomeCliente",
            /*Falta ver o nome correto no banco de dados;*/ 'numero' => "$numeroCliente",
            /*Falta ver o nome correto no banco de dados;*/ 'endereço' => "$enderecoCliente"
            );
            $gravar = DBCreate ($table, $dadosCliente);
            if($gravar){
                echo "Dados inseridos!";
            } else{
            echo "Erro na inserção de dados!";
            }
        }else{//Se o endereço está vazio retorna a msg de erro
            echo "Por favor preencha o endereço do cliente";
        }
    } else {//Se o numero do cliente não está preenchido, retorna a msg de erro
        echo "Por favor preencha o número do cliente corretamente!";
    }
} else {
    echo "Por favor preencha o nome do cliente!";
}
    DBClose($link);
?>