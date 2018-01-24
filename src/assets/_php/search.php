<?php
	require 'config.php';
    require 'connection.php';
    require 'database.php';
    $link = DBconnect();

    $cod_pedido = $_GET['codigo'];

    //Mostrar o pedido a partir do código
   $teste = DBRead('t_pedido', " WHERE cod_pedido = '$cod_pedido'", '*');
   $table= "t_pedido";
   $cont = 0;

        echo "<h2>Pedido: </h2><br><br>";
            foreach($teste as $key){
                $cont++;
                $pedidos[$cont] = $key['cod_pedido']; 
                $nomes[$cont] = $key['nome_pedido']; 
                $valor[$cont] = $key['valor_pedido'];
                } 
?>

    <html>

    <head>
        <link rel="stylesheet" href="../HtmleCSS/tabela.css">
    </head>

    <body>

        <table>
            <tr class="topo">
                <th>ID do pedido</th>
                <th>Nome do pedido</th>
                <th>Valor do pedido</th>
            </tr>
            <?php for($i = 1; $i <= $cont; $i++){ ?>
            <tr>
                <td>
                    <?php echo  $pedidos[$i]; ?>
                </td>
                <td>
                    <?php echo  $nomes[$i]; ?>
                </td>
                <td>
                    <?php echo  $valor[$i]; ?>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>

    </html>

    <?php DBClose($link); ?>