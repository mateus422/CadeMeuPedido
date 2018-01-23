<html>

<head>
    <title>Deletar dados</title>
    <link rel="stylesheet" href="../../HtmleCSS/cadastro.css">
</head>

<body>

    <?php
     require '..\config.php';
    require '..\connection.php';
    require '..\database.php';

    $link = DBconnect();    
        
    //Teoricamente vai imprimir uma tabela com as opções de Update e Delete
    $teste = DBRead('T_pedido');
    $table= "T_pedido";
        
        echo "<h2>Lista de pedidos:</h2><br><br>";
        foreach($teste as $key){
             echo "ID: ".$key['cod_pedido'].'<br>';
             echo "Nome do pedido: ".$key['nome_pedido'].'<br>';
             echo "Valor do pedido: ".$key['valor_pedido'].'<br>';
             echo "Cod_cliente: ".$key['cod_cliente'].'<br>';
             echo "Cod_entregador: ".$key['cod_entregador'].'<br><hr>';
             
   }
        
?>
        <br><br><br>
        <form method="get" action="#">
            <fieldset>
                <legend>Delete pedidos aqui</legend>
                <label>ID do Pedido a ser deletado: <input type="number" name="CodPedido"></label><br><br>
                <input class="botao" type="submit" value="Deletar">
            </fieldset>
        </form>

        <?php 

                @$codPedido = $_GET['CodPedido'];
                  
                $delete = DBDelete('T_pedido', "cod_pedido = $codPedido");
 
                if($delete)
                    echo "Deletado com Sucesso";
                else
                    echo "Falha ao Deletar";

        DBClose($link); 
    ?>
</body>

</html>