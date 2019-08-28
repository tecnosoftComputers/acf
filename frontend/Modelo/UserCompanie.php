<?php

class Modelo_UserCompanie{

  public static function searchUserComp($user){

    $sql = "SELECT * FROM usuarios_empresas eu 
    		INNER JOIN usuarios u ON u.id_usuario = eu.id_user 
            INNER JOIN empresa e ON e.id_empresa = eu.empresas 
            WHERE eu.id_user = '$user' AND eu.estado='A'";
    $rs = $GLOBALS['db']->auto_array($sql,array(),true);
    return (!empty($rs)) ? $rs : false;
  }

  public static function truncateTabla(){

    $sql = "TRUNCATE table usuarios_empresas";
    return $rs = $GLOBALS['db']->auto_array($sql,array());
  }

  public static function firtsInsert($arreglo_datos){
    $result = $GLOBALS['db']->insert_multiple("usuarios_empresas","id_user, empresas, estado",$arreglo_datos);
    return $result;
  }

}  
?>