<?php
require_once "../../constantes.php";
require_once FRONTEND_RUTA."init.php";
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();
ECHO "UPDATE dp01a110 SET CTAINACTIVA=1 WHERE CODIGO = '".$_POST['number']."'"; EXIT;
	if (isset($_POST['delete'])) {
		$id     = $_POST['number'];
        
    		$sql = $db->prepare("UPDATE dp01a110 SET CTAINACTIVA=1 WHERE CODIGO = '$id'");
    		if($sql->execute()){
    			
    		}else{
    			echo '<script>
                        alert("Error al Eliminar");
                        window.history.back();
                      </script>';
    		}
      }
?>