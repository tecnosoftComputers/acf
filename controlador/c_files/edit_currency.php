<?php
	require_once ("../../datos/db/connect.php");
	require_once ("../../controlador/conf.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

	if (isset($_POST['register'])){
		$id = $_POST['laids'];
       $type   = SEG::clean($_POST['type']);           // CODIGOBCO
       $name  = SEG::clean($_POST['name']);       // CODMOV
       $factor   = SEG::clean($_POST['factor']);           // NOMBREBCO
       $simbol    = SEG::clean($_POST['simbol']);      // CUENTANO
       $decimal    = SEG::clean($_POST['decimal']);         // NUMEROCH

        $stmt = $db->prepare("UPDATE fimoneda SET
        	TIPO_MON='$type', NOMBREMON='$name', FACTOR='$factor', SIMBOLO='$simbol', DECIMA='$decimal' WHERE IDMON='$id'");
		if ($stmt->execute()){
            echo '<script>
                    alert("Succesfully Updated");
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