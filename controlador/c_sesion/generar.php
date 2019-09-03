<?php
@session_start();

$num = $_REQUEST['y'];
$num2 = $_REQUEST['x'];
require_once ("../../datos/db/connect.php");
require_once ("../../controlador/conf.php");
$env = new DBSTART;
$cc = $env->abrirDB();

if (!empty($num2)){
  $_SESSION["id_empresa"] = $num2;  
}
if (!empty($num)){
  $_SESSION["id_modulo"] = $num;     
}
$lasesion  = $_SESSION['lasesion'];
$usuario = $_SESSION['usuario'];    

$sql = $cc->prepare("UPDATE sesion_init SET modulo='$num', id_empresa='$num2'  WHERE num_sesion='$lasesion'");

if ($sql -> execute() ) {
  header("Location: ".PUERTO."://".HOST."/inicializador/vistas/app/in.php?cid=dashboard/init");
}else{
	
    echo '<div class="alert alert-danger">
            <b>Error al generar!</b>
          </div>';
}
?>