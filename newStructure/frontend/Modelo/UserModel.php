<?php

class Modelo_UserModel{

  public static function searchUserMod($user){

    $sql = "SELECT * FROM usuarios_modulos eu 
            INNER JOIN usuarios u ON u.id_usuario = eu.id_user 
            INNER JOIN config e on e.id_config = eu.modulos
            WHERE eu.id_user = '$user' AND eu.estado='A'";
    $rs = $GLOBALS['db']->auto_array($sql,array(),true);
    return (!empty($rs)) ? $rs : false;
  }

  public static function truncateTabla(){

    $sql = "TRUNCATE table usuarios_modulos";
    return $rs = $GLOBALS['db']->auto_array($sql,array());
  }

  public static function firtsInsert($arreglo_datos){
    $result = $GLOBALS['db']->insert_multiple("usuarios_modulos","id_user, modulos, estado",$arreglo_datos);
    return $result;
  }
}  
?>