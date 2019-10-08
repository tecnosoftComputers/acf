<?php
class Modelo_FinControl{

  //get the params for sign in reports
  public static function getParams(){
    $sql = "SELECT * FROM fincontrol";
    $rs = $GLOBALS['db']->auto_array($sql,array());    
    return $rs;
  }  
}
?>