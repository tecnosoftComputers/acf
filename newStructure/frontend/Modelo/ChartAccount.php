<?php

class Modelo_ChartAccount{

  public static function searchChartAccount($match=false){

    if($match == false){
      $sql = "SELECT CODIGO,NOMBRE FROM dp01a110";
      $rs = $GLOBALS['db']->auto_array($sql,array(),true);
      $response = $rs;
    }else{
      $sql = "SELECT CODIGO,NOMBRE FROM dp01a110 WHERE CODIGO LIKE '$match%' OR NOMBRE LIKE '%$match%'";
      $rs = $GLOBALS['db']->auto_array($sql,array(),true);
      $response = array();
      foreach ($rs as $key => $value) {
        $response[] = array("value"=>/*str_replace('.', '', */$value['CODIGO']/*)*/,"label"=>$value['CODIGO'].' - '.$value['NOMBRE']);
      } 
    }
    return $response;
  }

  public static function getUpdate($codigo){
  	if(empty($codigo)){ return false;}

  	$sql = "SELECT * FROM dp01a110 t1 LEFT JOIN s01tab110 t2 ON (t1.CODTIPCTA = t2.codtipcta) WHERE t1.CODIGO = '$codigo'";
  	return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
  }

  public static function setUpdate($codigo,$datos){
  	if(empty($codigo)){return false;}

    return $GLOBALS['db']->update("dp01a110",$datos,"CODIGO='$codigo'");
  }

  public static function insert($datos){
    if(count($datos)==0){return false;}
    return $result = $GLOBALS['db']->insert('dp01a110',$datos);
  }

  public static function report($accfrom='', $accto=''){
    $sql = "SELECT CODIGO, NOMBRE FROM dp01a110";
    if (!empty($accfrom)){
      $sql .= " WHERE CODIGO_AUX >= '".$accfrom."'";
    }
    if (!empty($accto)){
      $sql .= " AND CODIGO_AUX <= '".$accto."'";
    }
    return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
  }
}  
?>