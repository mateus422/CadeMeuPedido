<?php
	require 'config.php';
    require 'connection.php';
    require 'database.php';
    $link = DBconnect();

    $cpf = $_GET['cpf'];

    //Mostrar o pedido a partir do código
   $teste = DBRead('t_entregador', " WHERE ent_cpf = '$cpf'", '*');
       if($teste){
           $table= "t_entregador";
           $cont = 0;

                echo "<h2>Entregador: </h2><br><br>";
                    foreach($teste as $key){
                        $cont++;
                        $cpf[$cont] = $key['ent_cpf']; 
                        $nome[$cont] = $key['ent_nomecompleto']; 
                        $telefone[$cont] = $key['ent_telefone'];
                        } 
        ?>

            <html>

            <head>
                <link rel="stylesheet" href="../HtmleCSS/tabela.css">
            </head>

            <body>

                <table>
                    <tr class="topo">
                        <th>CPF do Entregador</th>
                        <th>Nome Completo</th>
                        <th>Telefone</th>
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
                    </tr>
                    <?php } 
            } else {
            echo 'CPF inválido';
        }?>
                </table>
    </body>

    </html>

    <?php DBClose($link); ?>