<?php
 
    // Executa as Querys
    function DBExecute($query){
        $link = DBConnect();
        $result = @mysqli_query($link, $query) or die(mysqli_error($link));
        
        DBClose($link);
        return $result;
    }

    // Alterar Registros
    function DBUpdate($table, array $data, $where = null){
        foreach ($data as $key => $value){
            $fields[] = "{$key} = '{$value}'";
        }
        
        $fields = implode (', ', $fields);
        
        $where = ($where) ? "WHERE {$where}" : null;
        
        $query = "UPDATE {$table} SET {$fields}{$where}";
        
        return DBExecute($query);
    }
    //Gravar Registros
    function DBCreate ($table, array $data){
        $fields = implode(', ', array_keys($data));
        $values = "'".implode("', '", $data)."'";
        $query = "INSERT INTO {$table} ({$fields}) VALUES ({$values}) ";

        return DBExecute($query);
    }
    //FUNÇÃO PODERÁ SER USADA PARA O UPDATE
    // Ler registros
    function DBRead($table, $params = null, $fields = '*'){
        $params = ($params) ? "{$params}" : null;
        
        $query = "SELECT {$fields} FROM {$table}{$params}";
        $result = DBExecute($query);
        
        if(!mysqli_num_rows($result)){
            return false;
        }else{
            foreach($data /*ou $result (Não commitado)*/  as $key => $value){
                echo "<table>
                    <tr>
                        <th>
                            $key
                            </th>
                        </tr>
                        <tr>
                        <td>
                            $values
                            </td>
                        </tr>
                
                </table>";
            }
        }
    }
?>