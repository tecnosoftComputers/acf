<?php
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

	header('Location: ../../inicializador/vistas/app/in.php?cid=company/company_data');
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    
    $del = $db->prepare("UPDATE empresa SET estado='A' WHERE id_empresa ='$id'");
    $del->execute();