<?php
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

	if (isset($_POST['delete'])) {
		$code     = $_POST['bankcode'];
        
    		$sql = $db->prepare("UPDATE dp02a110 SET STATUS='I' WHERE CODIGOBCO = '$code'");
    		if($sql->execute()){
    			echo '<script>
                        window.location.href = "../../inicializador/vistas/app/in.php?cid=files/view_banks";
                      </script>';
    		}else{
    			echo '<script>
                        alert("Error al Eliminar");
                        window.history.back();
                      </script>';
    		}
      }