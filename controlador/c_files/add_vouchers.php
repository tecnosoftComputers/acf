<?php
require_once "../../constantes.php";
require_once FRONTEND_RUTA."init.php";
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

if (isset($_POST['register'])){
	try{
	       
           $entry   = $_POST['entry'];
           $name    = strtoupper($_POST['name']);
           $print   = $_POST['print'];
           $idasi   = $_POST['idasi'];
           
           // CONSULTAR CANTIDAD DE VOUCHERS
           $cant = $db->prepare("SELECT * FROM DPNUMERO");
           $cant->execute();
           $cantidad = $cant->rowCount();
           $fetch = $cant->fetchAll(PDO::FETCH_ASSOC);
           foreach ((array) $fetch as $datos) {
            $nn = $datos[''];
           }
           
           if ($cantidad == 0) {
                $num = 1;
           }else{
                $num = $cantidad + 1;
           }

      $dup = $db->prepare("SELECT * FROM DPNUMERO WHERE TIPO_ASI='$entry' || NOMBRE='$name'");
      $dup->execute();
      $cant_dup = $dup->rowCount();

      if ($cant_dup > 0) {
        echo '<script>alert("Error, el tipo o el nombre ya existe en la base"); window.history.back();</script>';
      }else{
    		// hacer uso de una declaración preparada para evitar la inyección de sql
    		$stmt = $db->prepare("INSERT INTO DPNUMERO
                (TIPO_ASI, NOMBRE, ASIENTO, IDASI, FORMATOCOM, ns, status) VALUES ('$entry', '$name',0,'$idasi','$print','$num','A')");

    		if ($stmt->execute()){
                    echo '<script>
                            alert("Registrado");
                            window.location.href = "../../inicializador/vistas/app/in.php?cid=files/view_voucher"; 
                          </script>';
                }else{
        			echo '<script>
                            alert("Error");
                            window.history.back();
                          </script>';
          
        	}
        }
        }catch(PDOException $e){
        		$output['error'] = true;
         		$output['message'] = $e->getMessage();
       	}
    
}