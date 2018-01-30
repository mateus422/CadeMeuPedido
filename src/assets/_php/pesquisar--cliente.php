<?php
	require 'config.php';
    require 'connection.php';
    require 'database.php';
    $link = DBconnect();

    $cpf = $_GET['cpf'];

    //Mostrar o pedido a partir do código
   $teste = DBRead('t_cliente', " WHERE cli_cpf = '$cpf'", '*');
    if($teste){
       $table= "t_cliente";
       $cont = 0;

            echo "<h2>Cliente: </h2><br><br>";
                foreach($teste as $key){
                    $cont++;
                    $cpf[$cont] = $key['cli_cpf']; 
                    $nome[$cont] = $key['cli_nomecompleto']; 
                    $telefone[$cont] = $key['cli_telefone'];
                    $endereco[$cont] = $key['cli_endereco'];
                    } 
    ?>

        <html>

        <head>
            <link rel="stylesheet" href="../HtmleCSS/tabela.css">
        </head>

        <body>

            <table>
                <tr class="topo">
                    <th>CPF do Cliente</th>
                    <th>Nome Completo</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                </tr>
                <?php for($i = 1; $i <= $cont; $i++){ ?>
                <tr>
                    <td>
                        <?php echo  $_GET['cpf']; ?>
                    </td>
                    <td>
                        <?php echo  $nome[$i]; ?>
                    </td>
                    <td>
                        <?php echo  $telefone[$i]; ?>
                    </td>
                    <td>                    <?php echo  $endereco[$i]; ?>
                    </td>
                </tr>
                <?php } 
            } else {
            echo 'CPF inválido';
        }?>
            </table>

    </body>

    </html>

    <?php DBClose($link); ?>