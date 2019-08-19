<?php
	error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
    require_once ("../../datos/db/connect.php");
    $env = new DBSTART;
    $db = $env->abrirDB();

    	$sql = $db->prepare("UPDATE dpmovimi SET ESTADO='X' WHERE ASIENTO='".$_GET['delj']."'");
    	if ($sql->execute()) {
    		echo '<script>window.history.back();</script>';
    	}else{
    		echo '<script>alert("No se pudo realizar la actualización"); window.history.back();</script>';
    	}