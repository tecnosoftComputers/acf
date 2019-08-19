<?php
	//require_once ("config.php");
	require_once ("llenarJournal.php");
	
	$obj = new Ventas();
	echo json_encode($obj->obtenerDatosProducto($_POST['idpro']));

 ?>