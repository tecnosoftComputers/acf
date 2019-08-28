<?php

class Modelo_TabTClient{

  public static function search(){

    $sql = "SELECT * FROM tab_tclient";
    return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
  }

  public static function getUpdate($codigo){
  	if(empty($codigo)){ return false;}

  	$sql = "SELECT * FROM tab_tclient WHERE codtipo = '$codigo'";
  	return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
  }

  public static function setUpdate($codigo,$datos){
  	if(empty($codigo)){return false;}

    return $GLOBALS['db']->update("tab_tclient",$datos,"codtipo='$codigo'");
  }

  public static function insert($datos){
    if(count($datos)==0){return false;}
    return $result = $GLOBALS['db']->insert('tab_tclient',$datos);
  }

  public static function delete($codigo){
    if(empty($codigo)){return false;}
    
    return $GLOBALS['db']->delete('tab_tclient',"codtipo ='$codigo'");
  }
}  
?>