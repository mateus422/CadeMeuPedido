<html>

<head>
    <title>Deletar dados</title>
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
    $teste = DBRead('T_pedido');
    $cont = 0;
    
    echo "<h2>Lista de pedidos:</h2><br><br>";
    foreach($teste as $key){
        $cont++;
        $pedidos[$cont] = $key['ped_codigo']; 
        $statusPed[$cont] = $key['ped_status']; 
        $descricaoPed[$cont] = $key['ped_descricao']; 
        $valorPed[$cont] = $key['ped_valor']; 
        $cpfClientePed[$cont] = $key['cli_cpf']; 
        $codEntrEntregador[$cont] = $key['ent_cpf'];  
}
    
?>
    <table>
        <tr class="topo">
            <th>ID do pedido</th>
            <th>Status do pedido</th>
            <th>Descrição do pedido</th>
            <th>Valor do pedido</th>
            <th>CPF do cliente</th>
            <th>CPF do entregador</th>
        </tr>
        <?php for($i = 1; $i <= $cont; $i++){ ?>
        <tr>
            <td>
                <?php echo  $pedidos[$i]; ?>
            </td>
            <td>
                <?php echo  $statusPed[$i]; ?>
            </td>
            <td>
                <?php echo  $descricaoPed[$i]; ?>
            </td>
            <td>
                <?php echo  $valorPed[$i]; ?>
            </td>
            <td>
                <?php echo  $cpfClientePed[$i]; ?>
            </td>
            <td>
                <?php echo  $codEntrEntregador[$i]; ?>
            </td>
        </tr>
        <?php } ?>
    </table>

    <br>
    <br>
    <br>

        <form method="get" action="#">
            <fieldset>
                <legend>Delete pedidos aqui</legend>
                <label>ID do Pedido a ser deletado:
                    <input type="number" name="CodPedido">
                </label>
                <br>
                <br>
                <input class="botao" type="submit" value="Deletar">
            </fieldset>
        </form>

        <?php 

                @$codPedido = $_GET['CodPedido'];
                  
                $delete = DBDelete('T_pedido', "ped_codigo = $codPedido");
 
                if($delete)
                    echo "Deletado com Sucesso";
                else
                    echo "Falha ao Deletar";

        DBClose($link); 
    ?>
</body>

</html>