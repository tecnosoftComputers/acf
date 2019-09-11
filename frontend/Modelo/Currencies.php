<?php

class Modelo_Currencies{

  
  public static function search(){

    $sql = "SELECT * FROM fimoneda";
    return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
  }

  public static function getUpdate($codigo){
  	if(empty($codigo)){ return false;}

  	$sql = "SELECT * FROM fimoneda WHERE IDMON = '$codigo'";
  	return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
  }

  public static function setUpdate($codigo,$datos){
  	if(empty($codigo)){return false;}

    return $GLOBALS['db']->update("fimoneda",$datos,"IDMON='$codigo'");
  }

  public static function insert($datos){
    if(count($datos)==0){return false;}
    return $result = $GLOBALS['db']->insert('fimoneda',$datos);
  }

  public static function delete($codigo){
    if(empty($codigo)){return false;}
    
    return $GLOBALS['db']->delete('fimoneda',"IDMON ='$codigo'");
  }
}  
?>