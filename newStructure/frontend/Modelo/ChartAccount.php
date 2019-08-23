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
        $response[] = array("value"=>$value['CODIGO'],"label"=>$value['CODIGO'].' - '.$value['NOMBRE']);
      } 
    }
    return $response;
  }

  public static function searchAccountsDetail(){
    $sql = "SELECT t1.CODIGO_AUX FROM dp01a110 t1 WHERE t1.PLANMARCA = 1";
    return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
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
}  
?>