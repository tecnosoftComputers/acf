<?php
require_once "../../constantes.php";
require_once FRONTEND_RUTA."init.php";
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

	if (isset($_POST['update'])) {
		$id       = $_POST['number'];
		$name     = $_POST['name'];
		$type     = $_POST['type'];
        $desc     = $_POST['desc'];
        
        if (isset($_POST['inactive'])) {
    		$sql = $db->prepare("UPDATE dp01a110 SET NOMBRE = '$name',CODTIPCTA='$type',CTADES='$desc',CTAINACTIVA=true
                                    WHERE CODIGO = '$id'");
    		if($sql->execute()){
    			echo '<script>
                        window.location.href = "../../inicializador/vistas/app/in.php?cid=files/chart_account";
                      </script>';
    		}else{
    			echo '<script>
                        alert("Error al Actualizar");
                        window.history.back();
                      </script>';
    		}
        }else{
            $sql = $db->prepare("UPDATE dp01a110 SET NOMBRE = '$name',CODTIPCTA='$type',CTADES='$desc',CTAINACTIVA=false
                                    WHERE CODIGO = '$id'");
    		if($sql->execute()){
    			echo '<script>
                        window.location.href = "../../inicializador/vistas/app/in.php?cid=files/chart_account";
                      </script>';
    		}else{
    			echo '<script>
                        alert("Error al Actualizar");
                        window.history.back();
                      </script>';
    		}
        }
	}
?>