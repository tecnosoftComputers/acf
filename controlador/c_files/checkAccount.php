<?php
require_once "../../constantes.php";
require_once FRONTEND_RUTA."init.php";
    require_once ("../../datos/db/connect.php");
    $env = new DBSTART;
    $cc = $env::abrirDB();

	$stmt = $cc->prepare("SELECT * FROM dp01a110 ");
    $stmt->execute();
    $one = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($one);
?>
