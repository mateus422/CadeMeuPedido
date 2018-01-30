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
              <a class="header__btn" role="button" href="../../../functions--choice.html">Funções do sistema</a>
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
$teste = DBRead('T_entregador');
$cont = 0;
echo "<h2>Lista de entregadores:</h2><br><br>";
foreach($teste as $key){
$cont++;
$cpfEntr[$cont] = $key['ent_cpf']; 
$nomeEntr[$cont] = $key['ent_nomecompleto']; 
$telefoneEntr[$cont] = $key['ent_telefone'];
$cnpjEntr[$cont] = $key['emp_cnpj'];
}
?>
          <table>
            <tr class="topo">
              <th>CPF do entregador
              </th>
              <th>Nome do entregador
              </th>
              <th>Telefone do entregador
              </th>
              <th>Cnpj da Empresa
              </th>
            </tr>
            <?php for($i = 1; $i <= $cont; $i++){ ?>
            <tr>
              <td>
                <?php echo  $cpfEntr[$i]; ?>
              </td>
              <td>
                <?php echo  $nomeEntr[$i]; ?>
              </td>
              <td>
                <?php echo  $telefoneEntr[$i]; ?>
              </td>
              <td>
                <?php echo  $cnpjEntr[$i]; ?>
              </td>
            </tr>
            <?php } ?>
          </table>
          <br>
          <br>
          <br>
          <form method="get" action="#">
            <fieldset style = "width: 20%; margin: 300px auto;">
              <legend>Delete entregadores aqui
              </legend>
              <label>CPF do entregador a ser deletado:
                <input type="number" name="CpfEntregador">
              </label>
              <br>
              <br>
              <input class="botao" type="submit" value="Deletar">
            </fieldset>
          </form>
          <?php 
@$cpfEntregador = $_GET['CpfEntregador'];
$delete = DBDelete('T_entregador', "ent_cpf = $cpfEntregador");
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
