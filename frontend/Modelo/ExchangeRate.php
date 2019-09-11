<?php

class Modelo_ExchangeRate{

  public static function search(){

    $sql = "SELECT * FROM fitabcam";
    return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
  }

  public static function getUpdate($fecha){
  	if(empty($fecha)){ return false;}

  	$sql = "SELECT * FROM fitabcam WHERE FECHA_CAM = '$fecha'";
  	return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
  }

  public static function setUpdate($fecha,$datos){
  	if(empty($fecha)){return false;}

    return $GLOBALS['db']->update("fitabcam",$datos,"FECHA_CAM='$fecha'");
  }

  public static function insert($datos){
    if(count($datos)==0){return false;}
    return $result = $GLOBALS['db']->insert('fitabcam',$datos);
  }

  public static function delete($fecha){
    if(empty($fecha)){return false;}
    
    return $GLOBALS['db']->delete('fitabcam',"FECHA_CAM ='$fecha'");
  }
}  
?>