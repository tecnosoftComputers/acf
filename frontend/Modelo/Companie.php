<?php

class Modelo_Companie{

  public static function searchCompanies($elvalor){

    $sql = "SELECT * FROM empresa WHERE id_empresa= ".$elvalor;
    $rs = $GLOBALS['db']->auto_array($sql,array());
    return (!empty($rs)) ? $rs : false;
  }
}  
?>