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
$teste = DBRead('t_entregador');
$table= "t_entregador";
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
            <fieldset style = "width: 20%; margin: 50px auto;">
              <legend>Modifique entregadores aqui
              </legend>
              <label>CPF do entregador a ser modificado: 
              </label>
              <br>
              <input type="number" name="CpfEntregador">
              <br>
              <label>Novo nome do entregador: 
              </label>
              <br>
              <input type="text" name="NNomeEntregador">
              <br>
              <label>Novo telefone do entregador: 
              </label>
              <br>
              <input type="text" name="NTelefoneEntregador">
              <br>
              <input class="botao" type="submit" value="Modificar">
            </fieldset>
          </form>
          <?php
@$nnomeEntregador = $_GET["NNomeEntregador"];
@$ntelefoneEntregador = $_GET["NTelefoneEntregador"];
@$CpfEntregador = $_GET["CpfEntregador"];
$dadosNEntregador= array(
'ent_nomecompleto' => "$nnomeEntregador",
'ent_telefone' => "$ntelefoneEntregador"
);
$update = DBUpdate($table,$dadosNEntregador,"ent_cpf = $CpfEntregador");
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
