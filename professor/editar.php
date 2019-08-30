<?php 
    include '../banco.php';
    
    $nome = $_POST['nome'];
    $siape = $_POST['siape'];
    $id = $_POST['id'];


    $con = new Conexao();
    $sql = "UPDATE professor SET nome = '$nome', siape = '$siape' WHERE id = $id";
    $result = $con->executar($sql);
    
    print_r($result)
?>