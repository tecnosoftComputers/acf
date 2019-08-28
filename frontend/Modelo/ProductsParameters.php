<?php

class Modelo_ProductsParameters{

  public static function search(){

    $sql = "SELECT * FROM fitabimp";
    return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
  }

  public static function getUpdate($codigo){
  	if(empty($codigo)){ return false;}

  	$sql = "SELECT * FROM fitabimp WHERE PRODUCTO = '$codigo'";
  	return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
  }

  public static function setUpdate($codigo,$datos){
  	if(empty($codigo)){return false;}

    return $GLOBALS['db']->update("fitabimp",$datos,"PRODUCTO='$codigo'");
  }

  public static function insert($datos){
    if(count($datos)==0){return false;}
    return $result = $GLOBALS['db']->insert('fitabimp',$datos);
  }

  public static function delete($codigo){
    if(empty($codigo)){return false;}
    
    return $GLOBALS['db']->delete('fitabimp',"PRODUCTO ='$codigo'");
  }
}  
?>