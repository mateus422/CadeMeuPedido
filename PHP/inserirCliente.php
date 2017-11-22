<?php
     require '..\PHP\config.php';
    require '..\PHP\connection.php';
    require '..\PHP\database.php';
   
$nomeCliente = $_GET['NomeCliente'];
$numeroCliente = $_GET['NumeroCliente'];
$enderecoCliente = $_GET['EnderecoCliente']; 

/*Falta ver o nome correto no banco de dados;*/ $table= "table-cliente";

    $dadosCliente = array (
        /*Falta ver o nome correto no banco de dados;*/ 'nome' => "$nomeCliente",
        /*Falta ver o nome correto no banco de dados;*/ 'numero' => "$numeroCliente",
        /*Falta ver o nome correto no banco de dados;*/ 'endereco' => "$enderecoCliente"
        );
    
    //Função gravar(Ailla)
    $gravar = DBCreate ('cliente, $dadosCliente');
    if($gravar){
        echo "Dados inseridos!";
    } else{
        echo "Erro na inserção de dados!";
    }
    //Teoricamente vai imprimir uma tabela com as opções de Update e Delete
    DBRead($table, $params = null, $fields = '*');

?>