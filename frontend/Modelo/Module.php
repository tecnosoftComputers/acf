<?php

class Modelo_Module{

  public static function searchModules(){

    $sql = " SELECT * FROM modulos WHERE id_modulo IN('1','3','4','5','6','7') AND estado = 'A'";
    $rs = $GLOBALS['db']->auto_array($sql,array(),true);
    return (!empty($rs)) ? $rs : false;
  }
}  
?>