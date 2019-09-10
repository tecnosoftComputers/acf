<?php
require_once "../../constantes.php";
require_once FRONTEND_RUTA."init.php";
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

if (isset($_POST['register'])){
    $activo     = $_POST['activo'];
    $pasivo     = $_POST['pasivo'];
    $capital    = $_POST['capital'];
    $ingresos   = $_POST['ingresos'];
    $egresos    = $_POST['egresos'];
    
    $o_activo       = $_POST['orden_activo'];
    $o_pasivo       = $_POST['orden_pasivo'];
    $r_deudora      = $_POST['rs_deudora'];
    $r_acree        = $_POST['rs_acreedora'];
    $acum_deu       = $_POST['acum_deudora'];
    $acum_acre      = $_POST['acum_acree'];
    
    $man_deudora    = $_POST['man_deudora'];
    $man_acreedora  = $_POST['man_acreedora'];
    $man_porcent    = $_POST['porcentaje'];
    
    $stmt = $db->prepare("INSERT INTO dasbal (
            ACTIVO,PASIVO, CAPITAL, INGRESOS, EGRESOS, ORD_ACTIVO, ORD_PASIVO,
            RESULTADOD, RESULTADOA, ACUMULADOD, ACUMULADOA, MANEJODB, MANEJOCR, MANEJOPOR) VALUES
            
            ('$activo', '$pasivo', '$capital', '$ingresos', '$egresos',            
            '$o_activo', '$o_pasivo', '$r_deudora', '$r_acree', '$acum_deu', 
            '$acum_acre', '$man_deudora', '$man_acreedora', '$man_porcent')");
            
    if ($stmt->execute()){
        echo '<script>
                    alert("Registrado");
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=files/view_chart_parameter"; 
                  </script>';
    }else{
		echo '<script>
                alert("Error");
                        window.history.back();
              </script>';
            }
    }
    
    
if (isset($_POST['update'])){
    $activo     = $_POST['activo'];
    $pasivo     = $_POST['pasivo'];
    $capital    = $_POST['capital'];
    $ingresos   = $_POST['ingresos'];
    $egresos    = $_POST['egresos'];
    
    $o_activo       = $_POST['orden_activo'];
    $o_pasivo       = $_POST['orden_pasivo'];
    $r_deudora      = $_POST['rs_deudora'];
    $r_acree        = $_POST['rs_acreedora'];
    $acum_deu       = $_POST['acum_deudora'];
    $acum_acre      = $_POST['acum_acree'];
    
    $man_deudora    = $_POST['man_deudora'];
    $man_acreedora  = $_POST['man_acreedora'];
    $man_porcent    = $_POST['porcentaje'];
    
    $stmt = $db->prepare("UPDATE dasbal SET 
                                ACTIVO='$activo',
                                PASIVO='$pasivo', 
                                CAPITAL='$capital', 
                                INGRESOS='$ingresos', 
                                EGRESOS='$egresos', 
                                ORD_ACTIVO='$o_activo',
                                ORD_PASIVO='$o_pasivo',
                                RESULTADOD='$r_deudora',
                                RESULTADOA='$r_acree',
                                ACUMULADOD='$acum_deu',
                                ACUMULADOA='$acum_acre',
                                MANEJODB='$man_deudora',
                                MANEJOCR='$man_acreedora',
                                MANEJOPOR='$man_porcent'");
            
    if ($stmt->execute()){
        echo '<script>
                    alert("Cambios guardados");
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=files/view_chart_parameter"; 
                  </script>';
    }else{
		echo '<script>
                alert("Error");
                        window.history.back();
              </script>';
            }
    }