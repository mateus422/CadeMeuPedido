<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadê meu pedido ?</title>
    <link rel="stylesheet" href="../../_css/pags/cadastro--empr.css">
    <link rel="stylesheet" href="../../_css/base.css">
    <link rel="stylesheet" href="../../_css/pags/inputs.css">
</head>

<body>
    <header class="header-main">
        <div class="content">
            <img class="logo" src="../../_images/logo.png" width="160px">
            <nav class="nav-main">
                <ul>
                    <li>
                        <a>Quem somos</a>
                    </li>
                </ul>
            </nav>
            <a class="header__btn" role="button" href="../../../functions--choice.html">Funções do sistema</a>
        </div>
    </header>

    <main>

				
        <section class="cadastro">
            <div class="content">
            
    <?php
    require '..\config.php';
    require '..\connection.php';
    require '..\database.php';

    $link = DBconnect();    
        
    //Teoricamente vai imprimir uma tabela com as opções de Update e Delete
    $teste = DBRead('T_pedido');
    $table= "T_pedido";
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
            <fieldset style = "width: 20%; margin: 100px auto;">
                <legend>Modifique pedidos aqui</legend>
                <label>ID do Pedido a ser modificado: </label>
                <br>
                <input type="number" name="CodPedido">
                <br>
                <label>Novo status do pedido: </label>
                <br>
                <select name="NStatusPedido">
                    <option value = 1>em andamento</option>
                    <option value = 0>fechado</option>
                </select>
                <br>
                <label>Nova descrição do pedido:</label>
                <br>
                <input type="text" name="NDescricaoPedido">
                <br>
                <label>Novo valor do pedido:</label>
                <br>
                <input type="number" name="NValorPedido">
                <br>
                <input class="botao" type="submit" value="Modificar">
            </fieldset>
        </form>
        <?php
        
@$nstatusPedido = $_GET['NStatusPedido'];
@$ndescricaoPedido = $_GET['NDescricaoPedido']; 
@$nvalorPedido = $_GET['NValorPedido'];

@$codPedido = $_GET['CodPedido'];
        
$dadosNPedido = array (
        
        'ped_status' => "$nstatusPedido",
        'ped_descricao' => "$ndescricaoPedido",
        'ped_valor' => "$nvalorPedido"
        );
        
          $update = DBUpdate($table,$dadosNPedido,"ped_codigo = $codPedido");
            if($update){
                echo "Dados modificados com sucesso!";
            }else{
                echo "Tivemos problemas em modificar os dados";
            }
        
       DBClose($link); 
        ?>
            </div>
        </section>
    </main>
</body>

</html>