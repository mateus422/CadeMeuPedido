<html lang="pt-br">

<head>
    <title>Update de dados</title>
    <link rel="stylesheet" href="../../HtmleCSS/cadastro.css">
    <link rel="stylesheet" href="../../HtmleCSS/tabela.css">

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
    $cont = 0;
        echo "<h2>Lista de clientes:</h2><br><br>";
        foreach($teste as $key){
            $cont++;
            $clientes[$cont] = $key['cod_cliente']; 
            $nomes[$cont] = $key['nome']; 
            $numeros[$cont] = $key['numero']; 
            $enderecos[$cont] = $key['endereço']; 
            $codPedido[$cont] = $key['cod_pedido']; 
   }
        
?>
        <table>
            <tr class="topo">
                <th>ID do cliente</th>
                <th>Nome do cliente</th>
                <th>Numero do cliente</th>
                <th>Endereço do cliente</th>
                <th>Código do pedido</th>
            </tr>
            <?php for($i = 1; $i <= $cont; $i++){ ?>
            <tr>
                <td>
                    <?php echo  $clientes[$i]; ?>
                </td>
                <td>
                    <?php echo  $nomes[$i]; ?>
                </td>
                <td>
                    <?php echo  $numeros[$i]; ?>
                </td>
                <td>
                    <?php echo  $enderecos[$i]; ?>
                </td>
                <td>
                    <?php echo  $codPedido[$i]; ?>
                </td>
            </tr>
            <?php } ?>
        </table>

        <br>
        <br>
        <br>

        <form method="get" action="#">
            <fieldset>
                <legend>Modifique clientes aqui</legend>
                <label>ID do cliente a ser modificado: </label>
                <br>
                <input type="number" name="CodCliente">
                <br>
                <label>Novo nome do cliente: </label>
                <br>
                <input type="text" name="NNomeCliente">
                <br>
                <label>novo numero do cliente: </label>
                <br>
                <input type="number" name="NNumeroCliente">
                <br>
                <label>Novo endereço do cliente: </label>
                <br>
                <input type="text" name="NEnderecoCliente">
                <br>
                <input class="botao" type="submit" value="Modificar">
            </fieldset>
        </form>

        <?php 
      @$codCliente = $_GET['CodCliente'];
      @$nnomeCliente = $_GET['NNomeCliente'];
      @$nnumeroCliente = $_GET['NNumeroCliente'];
      @$nenderecoCliente = $_GET['NEnderecoCliente'];   
        
        
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