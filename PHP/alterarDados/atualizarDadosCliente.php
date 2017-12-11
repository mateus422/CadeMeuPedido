<html lang="pt-br">

<head>
    <title>Update de dados</title>

</head>

<body>


    <?php
    require '..\config.php';
    require '..\connection.php';
    require '..\database.php';

    $link = DBconnect();    
        
    //Teoricamente vai imprimir uma tabela com as opções de Update e Delete
    $teste = DBRead('T_cliente');
    $table= "T_cliente";
        echo "<h2>Lista de clientes:</h2><br><br>";
        foreach($teste as $key){
             echo "ID: ".$key['cod_cliente'].'<br>';
             echo "Nome: ".$key['nome'].'<br>';
             echo "Numero: ".$key['numero'].'<br>';
             echo "Endereço: ".$key['endereço'].'<br>';
             echo "Cod_pedido: ".$key['cod_pedido'].'<br><hr>';
   }
        
?>
        <br><br><br>

        <form method="get" action="#">
            <fieldset>
                <legend>Modifique clientes aqui</legend>
                <label>ID do cliente a ser modificado: </label><br>
                <input type="number" name="CodCliente"><br>
                <label>Novo nome do cliente: </label><br>
                <input type="text" name="NNomeCliente"><br>
                <label>novo numero do cliente: </label><br>
                <input type="number" name="NNumeroCliente"><br>
                <label>Novo endereço do cliente: </label><br>
                <input type="text" name="NEnderecoCliente"><br>
                <input type="submit" value="Modificar">
            </fieldset>
        </form>

        <?php 
      $codCliente = $_GET['CodCliente'];
      $nnomeCliente = $_GET['NNomeCliente'];
      $nnumeroCliente = $_GET['NNumeroCliente'];
      $nenderecoCliente = $_GET['NEnderecoCliente'];   
        
        
        $dadosNCliente = array (
        /*Falta ver o nome correto no banco de dados;*/ 'nome' => "$nnomeCliente",
        /*Falta ver o nome correto no banco de dados;*/ 'numero' => "$nnumeroCliente",
        /*Falta ver o nome correto no banco de dados;*/ 'endereço' => "$nenderecoCliente"
        );
        
        $update = DBUpdate($table,$dadosNCliente,"cod_cliente = $codCliente");
            if($update){
                echo "Dados modificados com sucesso!";
            }else{
                echo "Tivemos problemas em modificar os dados";
            }
        
       DBClose($link); 
        ?>


</body>

</html>