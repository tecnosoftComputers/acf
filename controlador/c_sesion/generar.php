<?php
    require_once "../../constantes.php";
    require_once FRONTEND_RUTA."init.php";
    //include "../../constantes.php";
    //@session_start();

    $num = $_REQUEST['y'];
    $num2 = $_REQUEST['x'];
    require_once ("../../datos/db/connect.php");
    require_once ("../../controlador/conf.php");
    
    $env = new DBSTART;
    $cc = $env->abrirDB();

    if (!empty($num2)){
      $_SESSION['acfSession']["id_empresa"] = $num2;  
    }
    if (!empty($num)){
      $_SESSION['acfSession']["id_modulo"] = $num;     
    }
    //$lasesion  = $_SESSION['lasesion'];
    //$usuario = $_SESSION['acfSession']['usuario'];

    /*$sql = $cc->prepare("UPDATE sesion_init SET modulo='$num', id_empresa='$num2'  WHERE num_sesion='$lasesion'");

    if ($sql -> execute() ) {*/

        if($num==3){
            header('Location: '.PUERTO.'://'.HOST.'/'.'dashboard/'); 
            exit;
        }else{
            echo '<script type="text/javascript">
                window.location.href = "../../inicializador/vistas/app/in.php";
              </script>';
        }

    /*}else{
        echo '<div class="alert alert-danger">
                <b>Error al generar!</b>
              </div>';
    }*/
?>