<html lang="pt-br">

<head>
    <title>Update de dados</title>

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
        
        echo "<h2>Lista de entregadores:</h2><br><br>";
        foreach($teste as $key){
             echo "ID: ".$key['cod_entregador'].'<br>';
             echo "Nome: ".$key['nome'].'<br>';
             echo "Descrição: ".$key['descricao'].'<br><hr>';
             
   }
        
?>
        <br><br><br>

        <form method="get" action="#">
            <fieldset>
                <legend>Modifique entregadores aqui</legend>
                <label>ID do entregador a ser modificado: </label><br>
                <input type="number" name="CodEntregador "><br>
                <label>Novo nome do entregador: </label><br>
                <input type="text" name="NNomeEntregador"><br>
                <label>Nova Descrição do entregador: </label><br>
                <input type="text" name="NDescricaoEntregador"><br>
                <input type="submit" value="Modificar">
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