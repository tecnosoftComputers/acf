<?php
	error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
    require_once ("../../datos/db/connect.php");
    $env = new DBSTART;
    $db = $env->abrirDB();

    if (isset($_REQUEST['cid'])){
    	$param = $_REQUEST['cid'];

    	$sql = $db->prepare("UPDATE dpmovimi SET DB=0, CR=0 WHERE ASIENTO='$param'");
    	if ($sql->execute()) {
    		header('Location: ../../inicializador/vistas/app/activities/journal.php?cid='.$param);
    	}else{
    		echo '<script>alert("No se pudo realizar la actualización"); window.history.bakc();</script>';
    	}

    }