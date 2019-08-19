<?php

class Modelo_SystemCharts{

  public static function search(){

    $sql = "SELECT * FROM system_chart";
    return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
  }

  public static function searchCode($code){
  	if(empty($code)){ return false; }

  	$sql = "SELECT TABLE_NAME FROM system_chart WHERE CODIGO='$code'";
    $rs = $GLOBALS['db']->auto_array($sql,array(),FALSE);
    return (!empty($rs['TABLE_NAME'])) ? $rs['TABLE_NAME'] : false;
  }  
}
?>