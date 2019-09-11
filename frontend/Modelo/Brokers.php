<?php
class Modelo_Brokers{

  public static function search(){
    $sql = "SELECT * FROM finacli";
    return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
  }

  public static function getUpdate($codigo){
  	if(empty($codigo)){ return false;}

  	$sql = "SELECT * FROM finacli WHERE NO_ID = '$codigo'";
  	return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
  }


}  
?>