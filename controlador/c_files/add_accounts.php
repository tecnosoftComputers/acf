<?php
require_once "../../constantes.php";
require_once FRONTEND_RUTA."init.php";
require_once ("../../datos/db/connect.php"); 
$env = new DBSTART;
$db = $env->abrirDB();

if (isset($_POST['register'])){
    $cod    = $_POST['number'];
    $nom    = strtoupper($_POST['name']);
    $aux    = substr($cod,0,1); // Extrae el primer caracter
    $pla    = true;
    $type   = $_POST['type'];
    $desc   = $_POST['desc'];
    
    $lasesion   = $_POST['laempresaid'];
    
    /******   E X T R A E R   L A   ID   D E  L A    E M P R E S A   ******/
    $buscar = $db->prepare("SELECT * FROM sesion_init WHERE num_sesion='$lasesion'");
    $buscar->execute();
    $all_buscar = $buscar->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ((array )$all_buscar as $data_buscar){
        $laempresa = $data_buscar['id_empresa'];
    }


    
    // Verificar el num secuencial param
    /*$param = $db->prepare("SELECT max(AUX_PARAM) as el_param FROM dp01a110");
    $param->execute();
    $all_param = $param->fetchAll(PDO::FETCH_ASSOC);
    
    foreach((array) $all_param as $thelast) {
        $el_numero = $thelast['el_param'];

        if ($el_numero == 0) {
            $el_numero = 1;
        }else{
            $el_numero = $el_numero + 1;
        }
    }*/

    // Verificar que la cuenta no exista
    $send = $db->prepare("SELECT * FROM dp01a110 WHERE CODIGO_MAY='$cod'");
    $send->execute();
    $cant = $send->rowCount();
    
    // PRIMER CARACTER => substr($var, 0,1);
    // Consultar que la cuenta sea siguiente del secuencial
    $secuencial = $db->prepare("SELECT max(CODIGO_AUX) as limite FROM dp01a110");
    $secuencial->execute();
    $all_s = $secuencial->fetchAll(PDO::FETCH_ASSOC);
    
    foreach((array) $all_s as $el_limite) {
        $verificar = $el_limite['limite'];
    }
    
    $resta = $aux - $verificar;
    if ( $resta > 1 ) {
        echo '<script>
                    alert("Error, la cuenta no sigue el secuencial!");
                    window.history.back();
              </script>';
    }else{
    // VALIDACION NUEVA
    if ( $cant > 0 ) { // ********* CUENTA REPETIDA **********//
        echo '<script>
                    alert("Error, cuenta repetida!");
                    window.history.back();
              </script>';
    }else{
           // Consultar si la nueva cuenta termina en punto
           $local = substr($cod, -1);
	       if ($local == ".") {
	            $may = $cod; // mayor terminará en punto
                $res = trim(implode(". ", explode(".", $cod)));// Add espacios despues del punto

                $pos = strrpos($res, " ");
            	if ($pos !== false) {
            		$fflush = substr($res, 0, $pos);
            	}
            	$cuenta_a_comparar = preg_replace('/\s+/','',@$fflush); // Adjuntar string   

                // Comparar el DOM con la cuenta mayor
                $equals = $db->prepare("SELECT * FROM dp01a110 WHERE CODIGO_MAY ='$cuenta_a_comparar'");
                $equals->execute();
                $cant_equals = $equals->rowCount();
                
                if ($cant_equals > 0 ) {
                     $stmt = $db->prepare("INSERT INTO dp01a110
                        (CODIGO, NOMBRE, CODIGO_AUX, CODIGO_MAY, PLANMARCA, CODTIPCTA, CTADES, CTAINACTIVA, TIENEMOV) VALUES
                        ('$cod','$nom', '$aux', '$may', false, '$type', '$desc', true, false)");
                   if ($stmt->execute()){
                        echo '<script>
                                alert("Registrado Nueva Cuenta");
                                window.location.href = "../../inicializador/vistas/app/in.php?cid=files/chart_account";
                              </script>';
                   }else{
                        echo '<script>
                                alert("Error");
                                window.history.back();
                              </script>';
                   }
                }else{
                    echo '<script>
                            alert("No existe el mayor anterior");
                            window.history.back();
                          </script>';
                }
           }else{
                $may = ''; // No finaliza con punto y no se inserta en mayor
                $res = trim(implode(". ", explode(".", $cod)));// Add espacios despues del punto

                $pos = strrpos($res, " ");
            	if ($pos !== false) {
            		$fflush = substr($res, 0, $pos);
            	}
            	$cuenta_a_comparar = preg_replace('/\s+/','',@$fflush); // Adjuntar string   

                // Comparar el DOM con la cuenta mayor
                $equals = $db->prepare("SELECT * FROM dp01a110 WHERE CODIGO_MAY ='$cuenta_a_comparar'");
                $equals->execute();
                $cant_equals = $equals->rowCount();
                
                if ($cant_equals > 0 ) {
                     $stmt = $db->prepare("INSERT INTO dp01a110
                        (CODIGO, NOMBRE, CODIGO_AUX, CODIGO_MAY, PLANMARCA, CODTIPCTA, CTADES, CTAINACTIVA, TIENEMOV) VALUES
                        ('$cod', '$nom', '$aux', '$may', true, '$type', '$desc', true, false)");
                   if ($stmt->execute()){
                        echo '<script>
                                alert("Registrado Nueva Cuenta Detalle");
                                window.location.href = "../../inicializador/vistas/app/in.php?cid=files/chart_account";
                              </script>';
                   }else{
                        echo '<script>
                                alert("Error");
                                window.history.back();
                              </script>';
                   }
                }else{
                    echo '<script>
                            alert("No existe el mayor anterior");
                            window.history.back();
                          </script>';
                }
           }
    	} // FIN REPETICION DE CUENTA
     }
}// FIN   IF