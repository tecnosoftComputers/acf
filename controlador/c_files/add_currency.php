<?php
require_once "../../constantes.php";
require_once FRONTEND_RUTA."init.php";
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
	require_once ("../../datos/db/connect.php");
    require_once ("../../controlador/conf.php");
	$env = new DBSTART;
	$db = $env->abrirDB();
        
    if (isset($_POST['register'])){
       $type   = SEG::clean($_POST['type']);           // CODIGOBCO
       $name  = SEG::clean($_POST['name']);       // CODMOV
       $factor   = SEG::clean($_POST['factor']);           // NOMBREBCO
       $simbol    = SEG::clean($_POST['simbol']);      // CUENTANO
       $decimal    = SEG::clean($_POST['decimal']);         // NUMEROCH

        $stmt = $db->prepare("INSERT INTO fimoneda 
                (TIPO_MON, NOMBREMON, FACTOR, SIMBOLO, ESTADOMON, DECIMA) VALUES 
                ('$type','$name','$factor','$simbol',1,'$decimal')");
		if ($stmt->execute()){
            echo '<script>
                    alert("Succesfully");
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=files/view_currency"; 
                  </script>';
            }else{
    			echo '<script>
                        alert("Error");
                        window.history.back();
                      </script>';
            }
       }