<?php

class Modelo_Roles{

  public static function truncateTabla(){

    $sql = "TRUNCATE table roles";
    return $rs = $GLOBALS['db']->auto_array($sql,array());
  }

  public static function firtsInsert($arreglo_datos){

    $result = $GLOBALS['db']->insert('roles',$arreglo_datos);
    return $result;
  }
}  
?>