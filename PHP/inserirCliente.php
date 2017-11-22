<?php
     require '..\PHP\config.php';
    require '..\PHP\connection.php';
    require '..\PHP\database.php';
   
$nomeCliente = $_GET['NomeCliente'];
$numeroCliente = $_GET['NumeroCliente'];
$enderecoCliente = $_GET['EnderecoCliente']; 

/*Falta ver o nome correto no banco de dados;*/ $table= "T_cliente";

    $dadosCliente = array (
        /*Falta ver o nome correto no banco de dados;*/ 'nome' => "$nomeCliente",
        /*Falta ver o nome correto no banco de dados;*/ 'numero' => "$numeroCliente",
        /*Falta ver o nome correto no banco de dados;*/ 'endereco' => "$enderecoCliente"
        );
<<<<<<< HEAD

      $gravar = DBCreate($table, $dadosCliente);
=======
    
    //Função gravar(Ailla)
    $gravar = DBCreate ($table, $dadosCliente);
    if($gravar){
        echo "Dados inseridos!";
    } else{
        echo "Erro na inserção de dados!";
    }
    //Teoricamente vai imprimir uma tabela com as opções de Update e Delete
    DBRead($table, $params = null, $fields = '*');
>>>>>>> 1d9eb31fb607853ec349deb23b1054483919eb80

    if($gravar){
        echo "Tudo certo!";
    }else{
        echo "algo deu Errado!";
    }
?>