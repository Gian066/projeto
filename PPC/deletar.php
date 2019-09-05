<?php 
    include '../banco.php';

    $con = new Conexao();
    $con->deletar("disciplina", $_GET['id']);
?>
