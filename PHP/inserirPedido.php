<?php
    require '..\PHP\config.php';
    require '..\PHP\connection.php';
    require '..\PHP\database.php';

$nomePedido = $_GET['NomePedido']; 
$valorPedido = $_GET['ValorPedido']; 

/*Falta ver o nome correto no banco de dados;*/ $table= "T_pedido";
 
    $dadosPedido = array (
        
        /*Falta ver o nome correto no banco de dados;*/ 'nome_pedido' => "$nomePedido",
        /*Falta ver o nome correto no banco de dados;*/ 'valor_pedido' => "$valorPedido"
        );
        
<<<<<<< HEAD
      DBCreate($table, $dadosClientes);

        
      $gravar = DBCreate($table, $dadosPedido);

    if($gravar){
        echo "Tudo certo!";
    }else{
        echo "algo deu Errado!";
    }
=======
    //Função gravar(Ailla)
    $gravar = DBCreate ($table, $dadosPedido);
    if($gravar){
        echo "Dados inseridos!";
    } else{
        echo "Erro na inserção de dados!";
    }
    //Teoricamente vai imprimir uma tabela com as opções de Update e Delete
    DBRead($table, $params = null, $fields = '*');
>>>>>>> 1d9eb31fb607853ec349deb23b1054483919eb80

?>