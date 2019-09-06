<?php
include '../banco.php';
$con = new Conexao();

session_start();

$ano = $_POST['ano'];
$nome = $_POST['nome'];
$formacao = $_POST['formacao'];

$sql = "SELECT * FROM ppc WHERE nome = '$nome' and ano = $ano and formacao = '$formacao'";
$result = $con->executar($sql);

if ($result->num_rows > 0) {
    $_SESSION['entrada_duplicada'] = 1;
    header('Location: index.php');
    die;
}

$sql =  "INSERT INTO ppc (ano, nome, formacao) VALUES ($ano, '$nome', '$formacao')";
$con->executar($sql);

$_SESSION['nova_entrada'] = 1;
header('Location: index.php');
