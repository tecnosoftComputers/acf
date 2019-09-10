<?php
require_once "../../constantes.php";
require_once FRONTEND_RUTA."init.php";
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

	if (isset($_POST['update'])) {
		$id     = $_POST['param'];
        
    		$sql = $db->prepare("UPDATE DPNUMERO SET status='I' WHERE ns = '$id'");
    		if($sql->execute()){
    			echo '<script>
                        window.location.href = "../../inicializador/vistas/app/in.php?cid=files/view_voucher";
                      </script>';
    		}else{
    			echo '<script>
                        alert("Error al Actualizar");
                        window.history.back();
                      </script>';
    		}
      }
?>