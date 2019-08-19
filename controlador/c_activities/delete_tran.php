<?php
	error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
    require_once ("../../datos/db/connect.php");
    $env = new DBSTART;
    $db = $env->abrirDB();


    	$sql = $db->prepare("DELETE FROM dpcabtra WHERE IDCONT='".$_GET['delid']."'");
    	if ($sql->execute()) {
    		echo '<script>window.history.back();</script>';
    	}else{
    		echo '<script>alert("Error in delete transaction"); window.history.back();</script>';
    	}
    