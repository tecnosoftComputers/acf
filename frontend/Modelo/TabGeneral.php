<?php

class Modelo_TabGeneral{

  public static function search($tabla){

    $sql = "SELECT * FROM $tabla"; 
    return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
  }

  public static function getUpdate($codigo,$tabla){
  	if(empty($codigo)){ return false;}

  	$sql = "SELECT * FROM $tabla WHERE CODIGO = '$codigo'";
  	return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
  }

  public static function setUpdate($codigo,$datos,$tabla){
  	if(empty($codigo)){return false;}
    
    return $GLOBALS['db']->update($tabla,$datos,"CODIGO='$codigo'");
  }

  public static function insert($datos,$tabla){
    if(count($datos)==0){return false;}
    return $result = $GLOBALS['db']->insert($tabla,$datos);
  }

  public static function delete($codigo,$tabla){
    if(empty($codigo)){return false;}
    
    return $GLOBALS['db']->delete($tabla,"CODIGO ='$codigo'");
  }
}  
?>