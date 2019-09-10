<?php 
    include '../banco.php';

    $con = new Conexao();
    $con->deletar('ppc', $_GET['id']);
