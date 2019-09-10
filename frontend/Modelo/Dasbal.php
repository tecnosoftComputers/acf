<?php
class Modelo_Dasbal{

  //get the params for sign in reports
  public static function getParams(){
    $sql = "SELECT ACTIVO,PASIVO,CAPITAL,INGRESOS,EGRESOS FROM dasbal";
    $rs = $GLOBALS['db']->auto_array($sql,array());    
    if (!empty($rs)){
      foreach($rs as $key=>$value){
        $rs[$key] = explode(",",str_replace(".","",$rs[$key]));
      }
    }
    return $rs;
  }  
}
?>