<html lang="pt-br">

<head>
    <title>Update de dados</title>
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
    $teste = DBRead('T_entregador');
    $table= "T_entregador";
    $cont = 0;
        
        echo "<h2>Lista de entregadores:</h2><br><br>";
        foreach($teste as $key){
            $cont++;
            $entregadores[$cont] = $key['cod_entregador']; 
            $nomes[$cont] = $key['nome']; 
            $descricao[$cont] = $key['descricao'];
   }
        
?>
        <table>
            <tr class="topo">
                <th>ID do entregador</th>
                <th>Nome do entregador</th>
                <th>Descrição do entregador</th>
            </tr>
            <?php for($i = 1; $i <= $cont; $i++){ ?>
            <tr>
                <td>
                    <?php echo  $entregadores[$i]; ?>
                </td>
                <td>
                    <?php echo  $nomes[$i]; ?>
                </td>
                <td>
                    <?php echo  $descricao[$i]; ?>
                </td>
            </tr>
            <?php } ?>
        </table>

        <br>
        <br>
        <br>

        <form method="get" action="#">
            <fieldset>
                <legend>Modifique entregadores aqui</legend>
                <label>ID do entregador a ser modificado: </label>
                <br>
                <input type="number" name="CodEntregador ">
                <br>
                <label>Novo nome do entregador: </label>
                <br>
                <input type="text" name="NNomeEntregador">
                <br>
                <label>Nova Descrição do entregador: </label>
                <br>
                <input type="text" name="NDescricaoEntregador">
                <br>
                <input class="botao" type="submit" value="Modificar">
            </fieldset>
        </form>

        <?php
@$nnomeEntregador = $_GET["NNomeEntregador"];
@$ndescricaoEntregador = $_GET["NDescricaoEntregador"];

@$codEntregador = $_GET["CodEntregador"];
        
$dadosNEntregador= array(
'nome' => "$nnomeEntregador",
'descricao' => "$ndescricaoEntregador"
);
        
        $update = DBUpdate($table,$dadosNEntregador,"cod_entregador = $codEntregador");
            if($update){
                echo "Dados modificados com sucesso!";
            }else{
                echo "Tivemos problemas em modificar os dados";
            }
          
       DBClose($link); 
        ?>
</body>

</html>