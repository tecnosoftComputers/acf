<?php
require_once "../../constantes.php";
require_once FRONTEND_RUTA."init.php"; 
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

if (isset($_POST['update'])){
	try{
		$id      = $_POST['laid'];
		$pro     = $_POST['profile'];
		$obs     = $_POST['obs'];

		$sql = $db->prepare("UPDATE roles SET nombre_rol = '$pro', fecha_modificacion=now(), observacion= '$obs' WHERE id_rol = '$id'");
		if($sql->execute()){
			echo '<script>
                    alert("Profile Updated");
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=seguridad/nivel"; 
                  </script>';
		}else{
			echo '<script>
                    alert("Error edit");
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=seguridad/nivel";
                  </script>';
		}
	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();
	}
}	
?>