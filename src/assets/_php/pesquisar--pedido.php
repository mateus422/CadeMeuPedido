<?php
	require 'config.php';
    require 'connection.php';
    require 'database.php';
    $link = DBconnect();

    $cod_pedido = $_GET['codigo'];

    //Mostrar o pedido a partir do código
   $teste = DBRead('t_pedido', " WHERE ped_codigo = '$cod_pedido'", '*');
        if($teste){
           $table= "t_pedido";
           $cont = 0;

                echo "<h2>Pedido: </h2><br><br>";
                    foreach($teste as $key){
                        $cont++;
                        $pedidos[$cont] = $key['ped_codigo']; 
                        $descricao[$cont] = $key['ped_descricao']; 
                        $valor[$cont] = $key['ped_valor'];
                        } 
        ?>

            <html>

            <head>
                <link rel="stylesheet" href="../HtmleCSS/tabela.css">
            </head>

            <body>

                <table>
                    <tr class="topo">
                        <th>Código do pedido</th>
                        <th>Descricao do pedido</th>
                        <th>Valor do pedido</th>
                    </tr>
                    <?php for($i = 1; $i <= $cont; $i++){ ?>
                    <tr>
                        <td>
                            <?php echo  $pedidos[$i]; ?>
                        </td>
                        <td>
                            <?php echo  $descricao[$i]; ?>
                        </td>
                        <td>
                            <?php echo  $valor[$i]; ?>
                        </td>
                    </tr>
                    <?php } }
                    else {
                        echo 'Código inválido';
        } ?>
                </table>
    </body>

    </html>

    <?php DBClose($link); ?>