<?php

class Modelo_Permission{

  public static function searchPermission($id_modulo,$role,$acceso){

    $sql = "SELECT * FROM permisos p
      		INNER JOIN modulos_items mi ON mi.modulo = p.permisos_modulo
      		WHERE p.permisos_modulo='$id_modulo' AND p.nivel='$role' AND mi.acceso='$acceso'";
    $rs = $GLOBALS['db']->auto_array($sql,array(),true);
    return (!empty($rs)) ? $rs : false;
  }

  public static function searchPermission2($id_modulo,$role){

    $sql = "SELECT * FROM permisos p
      		INNER JOIN modulos_items mi ON mi.modulo = p.permisos_modulo
      		WHERE p.permisos_modulo='$id_modulo' AND p.nivel='$role' AND mi.estado='A'";
    $rs = $GLOBALS['db']->auto_array($sql,array(),true);
    return (!empty($rs)) ? $rs : false;
  }

  public static function truncateTabla(){

    $sql = "TRUNCATE table permisos";
    return $rs = $GLOBALS['db']->auto_array($sql,array());
  }

  public static function firtsInsert($arreglo_datos){
    $result = $GLOBALS['db']->insert_multiple("permisos","id_user_p, nivel, permisos_modulo, fecha_registro, estado",$arreglo_datos);
    return $result;
  }

}  
?>