<?php
require_once '../../../constantes.php';
require_once FRONTEND_RUTA.'init.php';

if(isset($_SESSION['acfSession']["correo"]))  {
    //echo 'entro'; exit;
    require_once ("head.php");

    if( isset($_GET['cid']) ) {
        $fflush = $_GET['cid'];
        }else{
            $fflush = "dashboard/init";
        } 
        require_once $fflush .".php";
        require_once ("foot.php");
 }else{
    /*session_unset();
    session_destroy();
    header('Location:  ../../../index.php');*/
}