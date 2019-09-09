<?php
//session_start();
print_r($_SESSION); exit;
if(isset($_SESSION['acfSession']["correo"]))  {
    echo 'entro'; exit;
    require_once ("head.php");

    if( isset($_GET['cid']) ) {
        $fflush = $_GET['cid'];
        }else{
            $fflush = "dashboard/init";
        } 
        require_once $fflush .".php";
        require_once ("foot.php");
 }else{
    print_r($_SESSION);
    echo 'entro1'; exit;
    /*session_unset();
    session_destroy();
    header('Location:  ../../../index.php');*/
}