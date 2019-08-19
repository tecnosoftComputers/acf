<?php

class Modelo_Beneficiary{

  public static function searchBeneficiary(){

    $sql = "SELECT * FROM finacli";
    return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
  }
}  
?>