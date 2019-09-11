<?php
class Modelo_ParameterControl{

  public static function search(){
    $sql = "SELECT * FROM tabla";
    return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
  }

  public static function getUpdate($codigo){
  	if(empty($codigo)){ return false;}

  	$sql = "SELECT * FROM tabla WHERE NO_ID = '$codigo'";
  	return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
  }


}  
?>