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
$sql = "SELECT id FROM curso ORDER BY id DESC LIMIT 1";
$id_curso = $con->executar($sql)->fetch_assoc()['id'];

if($ano_semestre == 0)
    for($periodo=1; $periodo<=$vigencia - $ingresso + 1; $periodo++){
        $vig_curso = $ingresso + $periodo - 1;
    $sql="INSERT INTO turma (periodo,fk_curso,vigencia, semestre) VALUES ('$periodo', '$id_curso', '$vig_curso', '$semestre')";
    $con->executar($sql);
}
 
elseif($ano_semestre == 1 || $ano_semestre == 2)
    for($i = 0; $i =  - $ingresso + 1; $periodo++){
        $vig_curso = $ingresso + $periodo - 1;
    $sql="INSERT INTO turma (periodo,fk_curso,vigencia, semestre) VALUES ('$periodo', '$id_curso', '$vig_curso', '$semestre')";
$con->executar($sql);
}



print_r($con);

$_SESSION['nova_entrada'] = 1;

header('Location: index.php');
