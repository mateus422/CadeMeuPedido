<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadê meu pedido ?
    </title>
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
              <a>Quem somos
              </a>
            </li>
          </ul>
        </nav>
        <a class="header__btn" role="button" href="../../../functions--choice.html">Funções do sistema
        </a>
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
              <th>ID do pedido
              </th>
              <th>Status do pedido
              </th>
              <th>Descrição do pedido
              </th>
              <th>Valor do pedido
              </th>
              <th>CPF do cliente
              </th>
              <th>CPF do entregador
              </th>
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
            <fieldset style = "width: 20%; margin: 300px auto;">
              <legend>Delete pedidos aqui
              </legend>
              <label>CPF do Pedido a ser deletado:
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
        </div>
      </section>
    </main>
  </body>
</html>
