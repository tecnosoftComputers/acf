<?php
	require_once ("../../datos/db/connect.php");
	require_once ("../../controlador/conf.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

	if (isset($_POST['register'])){
		$id = $_POST['laids'];

        $stmt = $db->prepare("UPDATE fimoneda SET ESTADOMON=0 WHERE IDMON='$id'");
		if ($stmt->execute()){
            echo '<script>
                    alert("Succesfully Deleted");
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=files/view_currency"; 
                  </script>';
            }else{
    			echo '<script>
                        alert("Error");
                        window.history.back();
                      </script>';
            }
       }
?>