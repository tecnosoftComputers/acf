<?php
require_once "../../constantes.php";
require_once FRONTEND_RUTA."init.php";
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

	header('Location: ../../inicializador/vistas/app/in.php?cid=company-users/users_list ');
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    
    $del = $db->prepare("UPDATE usuarios SET estado='I' WHERE id_usuario ='$id'");
    $del->execute();
    
?>