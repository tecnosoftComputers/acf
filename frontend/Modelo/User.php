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
    return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
  }

  public static function auth($username,$password){
         
    $sql = "SELECT  *
            FROM usuarios u INNER JOIN usuarios_empresas ue ON u.id_usuario = ue.id_user
            WHERE u.correo=? AND u.passw=? AND u.estado = 'A' LIMIT 1"; 
    $rs = $GLOBALS['db']->auto_array($sql,array($username,$password));     
    if (empty($rs)){ return false; }
    return $rs;
  }

}  
?>