<?php

class Modelo_SesionInit{

  public static function buscarSesion($lasesion){
    if(empty($lasesion)){ return false; }

    $sql = "SELECT * FROM sesion_init WHERE num_sesion=".$lasesion; 
    $arrdatos = $GLOBALS['db']->auto_array($sql,array(),false);
	return $arrdatos;
  }

  public static function truncateTabla(){

    $sql = "TRUNCATE table sesion_init";
    return $rs = $GLOBALS['db']->auto_array($sql,array());
  }
  
}  
?>