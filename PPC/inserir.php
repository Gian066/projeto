<?php
include '../banco.php';
$con = new Conexao();

session_start();

$nome = $_POST['nome_modal'];

$sql = "SELECT * FROM disciplina WHERE nome = '$nome'";
$result = $con->executar($sql);

if ($result->num_rows > 0) {
    $_SESSION['entrada_duplicada'] = 1;
    header('Location: index.php');
    die;
}

$sql =  "INSERT INTO disciplina (nome) VALUES ('$nome')";
$con->executar($sql);

$_SESSION['nova_entrada'] = 1;
header('Location: index.php');
