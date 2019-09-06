<?php
include '../banco.php';

$ano = $_POST['ano'];
$id = $_POST['id'];
$nome = $_POST['nome'];
$formacao = $_POST['formacao'];


$con = new Conexao();
$sql = "UPDATE ppc SET nome= '$nome', ano = '$ano', formacao = '$formacao'  WHERE id = $id";
$con->executar($sql);
header('location: index.php');
