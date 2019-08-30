<?php
include '../banco.php';
$con = new Conexao();

session_start();

$nome = $_POST['nome'];
$siape = $_POST['siape'];

$sql = "SELECT * FROM professor WHERE nome = '$nome' or siape = '$siape'";
$result = $con->executar($sql);

if ($result->num_rows > 0) {
    $_SESSION['entrada_duplicada'] = 1;
    header('Location: index.php');
    die;
}

$sql =  "INSERT INTO professor (nome,siape) VALUES ('$nome','$siape')";
$con->executar($sql);

$_SESSION['nova_entrada'] = 1;
header('Location: index.php');
