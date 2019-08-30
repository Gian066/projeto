<?php

class Conexao{
    private $con;
    public function __construct(){
        $servername = "localhost";
        $username = "root";
        $db = "cargahoraria";

        $this->con = new mysqli($servername, $username, "", $db);
        $this->con->set_charset("utf8");
    }

    function buscar($tabela){
        $sql = "SELECT * FROM $tabela WHERE 1 ORDER BY nome";
        return $this->con->query($sql);
    }

    function deletar($tabela, $id){
        $sql = "DELETE FROM $tabela WHERE id=$id";
        return $this->con->query($sql);
    }

    function executar($sql){
        return $this->con->query($sql);
    }
}
