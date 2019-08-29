<?php 
    include '../banco.php';

    $nome = $_POST['nome'];

    $con = conexao();
    $sql =  "INSERT INTO disciplina (nome) VALUES ('$nome')"; 
    executar($con, $sql);

?>