<?php
    
    function conexao() {
        $servername = "localhost";
        $username = "root";
        $db = "cargahoraria";


        $con = new mysqli($servername, $username, "", $db);
        $con->set_charset("utf8");
        return $con;
    }

    function buscar($con, $tabela) {
        $sql = "SELECT * FROM $tabela WHERE 1 ORDER BY nome";
        $result = $con->query($sql);

        return $result;
    }

    function deletar($con, $tabela, $id){
        $sql = "DELETE FROM $tabela WHERE id=$id";
        $con->query($sql);
    }
    
    

    function executar($con, $sql) {
        $con->query($sql);

    }
 ?>