<?php

class Modelo_Access{

  public static function truncateTabla(){

    $sql = "TRUNCATE table access";
    return $rs = $GLOBALS['db']->auto_array($sql,array());
  }

  public static function firtsInsert($arreglo_datos){
    $result = $GLOBALS['db']->insert_multiple("access","a_perfil, a_modulo, a_item, cs,sav,edi,del,pri",$arreglo_datos);
    return $result;
  }

}  
?>