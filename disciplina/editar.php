<?php 
    include '../banco.php';

    $nome = $_POST['nome'];


    $con = conexao();
    $sql = "UPDATE disciplina SET nome= '$nome' WHERE id = $id";
    executar($con, $sql);
    
?>