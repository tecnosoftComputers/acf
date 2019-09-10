<?php 
require_once "../../constantes.php";
require_once FRONTEND_RUTA."init.php";
require_once ("../../datos/db/connect.php"); $env = new DBSTART; $db = $env->abrirDB();

if (isset($_POST['register'])){
    $cod    = $_POST['number'];
    $nom    = $_POST['name'];
    $aux    = substr($cod, 0, -1);
    $may    = $cod;
    $pla    = true;
    $type   = $_POST['type'];
    $desc   = $_POST['desc'];
    
    // Ultima cuenta
    $last = $db->prepare("SELECT MAX(CODIGO_AUX) ultimo FROM dp01a110");
    $last->execute();
    $thelast = $last->fetchAll(PDO::FETCH_ASSOC);
    
    foreach((array) $thelast as $sacar) {
        $el_ultimo = $sacar['ultimo'];
    }
    
    $resta = 0;
    $resta = $aux - $el_ultimo;
    if ($resta == 1) {
	  if (isset($_POST['inactive'])) {
            $stmt = $db->prepare("INSERT INTO dp01a110
            (CODIGO, NOMBRE, CODIGO_AUX, CODIGO_MAY, PLANMARCA, CODTIPCTA, CTADES, CTAINACTIVA, TIENEMOV) VALUES
            ('$cod','$nom', '$aux', '$may', true, '$type', '$desc', true, false)");
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
        $stmt = $db->prepare("INSERT INTO dp01a110 
            (CODIGO, NOMBRE, CODIGO_AUX, CODIGO_MAY, PLANMARCA, CODTIPCTA, CTADES, CTAINACTIVA, TIENEMOV) VALUES
            ('$cod','$nom', '$aux', '$may', true, '$type', '$desc', false, false)");
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
    }
    }else{ // No sigue la secuencia de las cuentas
        echo '<script>
                    alert("La secuencia del numero de cuenta no corresponde");
                    window.history.back();
                  </script>';
    }
}