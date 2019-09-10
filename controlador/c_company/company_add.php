<?php
require_once "../../constantes.php";
require_once FRONTEND_RUTA."init.php";
    if (isset($_POST['register'])) {
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

	try{
       $formato = array('.jpg', '.png');       
       $nombrearchivo = $_FILES['img']['name'];
       $nombretmparchivo = $_FILES['img']['tmp_name'];
       
       $nameempresa     = $_POST['nombres'];
       $ciudad          = $_POST['ciudad'];
       $dirempresa      = $_POST['direccion'];
       $phoneempresa    = $_POST['tel'];
       $faxempresa      = $_POST['fax'];
       $estado          = 'A';

       $ext = substr($nombrearchivo, strrpos($nombrearchivo, '.'));
       
       if (in_array($ext, $formato)) {
        
        if (move_uploaded_file($nombretmparchivo, "../../inicializador/img/$nombrearchivo")) {
           
       
		$stmt = $db->prepare("INSERT INTO empresa
            (ciudad, nombre_empresa, direccion_empresa, telefono_empresa, fax_empresa, estado,rentas_logo) VALUES
                ('$ciudad','$nameempresa','$dirempresa', '$phoneempresa', '$faxempresa','$estado','$nombrearchivo')");

		if ($stmt->execute()){
            echo '<script>
                    alert("Registrado");
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=company/company_data"; 
                  </script>';
            
		}else{
			echo '<script type="text/javascript">
                        alert("Error");
                        window.history.back();
                    </script>';
		}
    }
    }else{
         $stmt = $db->prepare("INSERT INTO empresa
            (ciudad, nombre_empresa, direccion_empresa, telefono_empresa, fax_empresa, estado) VALUES
                ('$ciudad','$nameempresa','$dirempresa', '$phoneempresa', '$faxempresa','$estado')");

		if ($stmt->execute()){
            echo '<script>
                    alert("Registrado");
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=company/company_data"; 
                  </script>';
            
		}else{
			echo '<script type="text/javascript">
                        alert("Error");
                        window.history.back();
                    </script>';
		}
        }
	}catch(PDOException $e){
		echo $e->getMessage();
	}
 }