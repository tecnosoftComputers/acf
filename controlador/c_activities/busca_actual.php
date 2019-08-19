<?php
	//require_once ("config.php");
	require_once ("llenarActual.php");
	
	$obj = new Ventas();
	echo json_encode($obj->obtenerDatosProducto($_POST['idpro']));

 ?>