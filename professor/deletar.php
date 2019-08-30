<?php 
    include '../banco.php';

    $con = new Conexao();
    $con->deletar("professor", $_GET['id']);
?>
