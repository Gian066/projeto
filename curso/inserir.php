<?php
include '../banco.php';
$con = new Conexao();

session_start();

$ppc = $_POST['ppc'];
$vigencia = $_POST['vigencia'];
$ingresso = $_POST['ingresso'];
$ano_semestre = $_POST['ano_semestre'];

$sql = "SELECT * FROM curso WHERE ppc = '$ppc' and vigencia = '$vigencia' and ingresso = $ingresso and ano_semestre = '$ano_semestre'";
$result = $con->executar($sql);

if ($result->num_rows > 0) {
    $_SESSION['entrada_duplicada'] = 1;
    header('Location: index.php');
    die;
}

$sql =  "INSERT INTO curso (ppc, vigencia, ingresso, ano_semestre) VALUES ('$ppc', '$vigencia', '$ingresso', '$ano_semestre')";
$con->executar($sql);
print_r($con);
$_SESSION['nova_entrada'] = 1;
header('Location: index.php');
