<?php

class Modelo_typeAccount{

  public static function searchTypeAccount(){

    $sql = "SELECT * FROM s01tab110";
    return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
  }

  public static function getTypeAccount($codigo){
  	if(empty($codigo)){ return false;}

  	$sql = "SELECT * FROM s01tab110 WHERE codtipcta = '$codigo'";
  	return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
  }
}  
?>