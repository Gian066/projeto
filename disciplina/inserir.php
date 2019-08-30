<?php
include '../banco.php';
$con = conexao();

session_start();

$nome = $_POST['nome'];

$sql = "SELECT * FROM disciplina WHERE nome = '$nome'";
$result = executar($con, $sql);

if ($result->num_rows > 0) {
    $_SESSION['entrada_duplicada'] = 1;
    header('Location: index.php');
    die;
}

$sql =  "INSERT INTO disciplina (nome) VALUES ('$nome')";
executar($con, $sql);

$_SESSION['nova_entrada'] = 1;
header('Location: index.php');
