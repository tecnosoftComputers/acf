<?php

class Modelo_User{

  public static function truncateTabla(){

    $sql = "TRUNCATE table usuarios";
    return $rs = $GLOBALS['db']->auto_array($sql,array());
  }

  public static function firtsInsert($arreglo_datos){

    $result = $GLOBALS['db']->insert('usuarios',$arreglo_datos);
    return $result;
  }
  
  public static function searchUsuario($userid){

    $sql = "SELECT * FROM usuarios WHERE id_usuario='$userid' AND estado='A'";
    $rs = $GLOBALS['db']->auto_array($sql,array(),false);
  }

}  
?>