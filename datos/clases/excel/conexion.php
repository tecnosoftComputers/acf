<?php
	
	$mysqli=new mysqli("localhost","expricei_exprice","expriceitec2019!","expricei_tecnicentro_produccion"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	
?>