<?php 
    include '../banco.php';

    $con = conexao();
    deletar($con, "disciplina", $_GET['id']);
?>
