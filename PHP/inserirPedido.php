<?php
echo"<!DOCTYPE html><html lang='pt-br'><head><meta charset='utf-8'><link rel='stylesheet' href='..\Html e CSS\cadastro.css' type='text/css'></head><body><div>";
    require '..\PHP\config.php';
    require '..\PHP\connection.php';
    require '..\PHP\database.php';

    $link = DBconnect();

$nomePedido = $_POST['NomePedido']; 
$valorPedido = $_POST['ValorPedido']; 

/*Falta ver o nome correto no banco de dados;*/ $table= "T_pedido";
if (empty($nomePedido)){//Verifica se o nome está preenchido
    echo "Por favor preencha o nome do pedido corretamente!<br>";
    $erro=true;
}    
if (empty($valorPedido) || !is_numeric($valorPedido)) {//Verifica se o valor foi preenchido e se é um numero
    echo "Por favor preencha o valor do pedido corretamente!<br>";
    $erro=true;
}
if(!$erro){
    $dadosPedido = array (
    /*Falta ver o nome correto no banco de dados;*/ 'nome_pedido' => "$nomePedido",
    /*Falta ver o nome correto no banco de dados;*/ 'valor_pedido' => "$valorPedido"
    );
    $gravar = DBCreate ($table, $dadosPedido);
    if($gravar){
        echo "Dados inseridos!";
    } else{
        echo "Erro na inserção de dados!";
    }
} else{
    echo "<button class='button' onClick=location.href='..\Html e CSS\CadastrarPedido.html'><span>Voltar ao início</span></button></div></body></html>";
}
DBClose($link);
?>