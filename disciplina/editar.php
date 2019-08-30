<?php 
    include '../banco.php';

    $nome = $_POST['nome'];
    $id = $_POST['id'];

    $con = new Conexao();
    $sql = "UPDATE disciplina SET nome= '$nome' WHERE id = $id";
    $con->executar($sql);
    
?>