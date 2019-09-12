<?php 
    include '../banco.php';

    $con = new Conexao();
    $con->deletar('curso', $_GET['id']);
