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
    $table= "t_cliente";
    $cont = 0;
        echo "<h2>Lista de clientes:</h2><br><br>";
        foreach($teste as $key){
            $cont++;
            $cpf[$cont] = $key['cli_cpf']; 
            $nomes[$cont] = $key['cli_nomecompleto']; 
            $numeros[$cont] = $key['cli_telefone']; 
            $enderecos[$cont] = $key['cli_endereco']; 
   }
        
?>
        <table>
            <tr class="topo">
                <th>CPF do cliente</th>
                <th>Nome do cliente</th>
                <th>Telefone do cliente</th>
                <th>Endereço do cliente</th>
            </tr>
            <?php for($i = 1; $i <= $cont; $i++){ ?>
            <tr>
                <td>
                    <?php echo  $cpf[$i]; ?>
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
            </tr>
            <?php } ?>
        </table>

        <br>
        <br>
        <br>

        <form method="get" action="#">
            <fieldset>
                <legend>Modifique clientes aqui</legend>
                <label>CPF do cliente a ser modificado: </label>
                <br>
                <input type="number" name="cpfCliente">
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
      @$cpfCliente = $_GET['cpfCliente'];
      @$nnomeCliente = $_GET['NNomeCliente'];
      @$nnumeroCliente = $_GET['NNumeroCliente'];
      @$nenderecoCliente = $_GET['NEnderecoCliente'];   
        
        
        $dadosNCliente = array (
        'cli_cpf' => "$cpfCliente",
        'cli_nomecompleto' => "$nnomeCliente",
         'cli_telefone' => "$nnumeroCliente",
         'cli_endereco' => "$nenderecoCliente"
        );
        
        $update = DBUpdate($table,$dadosNCliente,"cli_cpf = $cpfCliente");
            if($update){
                echo "Dados modificados com sucesso!";
            }else{
                echo "Tivemos problemas em modificar os dados";
            }
        
       DBClose($link); 
        ?>


</body>

</html>