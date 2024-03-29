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

  public static function searchChartAccountArray(){
    $sql = "SELECT CODIGO_AUX,NOMBRE FROM dp01a110";
    $rs = $GLOBALS['db']->auto_array($sql,array(),true);
    $data = array();
    foreach ($rs as $key => $value) {
      $data[$value['CODIGO_AUX']] = $value['NOMBRE'];
    }
    return $data;
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

  public static function report($accfrom='', $accto='',$start='',$limit=''){    
    $sql = "SELECT CODIGO, NOMBRE FROM dp01a110 WHERE (CTAINACTIVA IS NULL OR CTAINACTIVA = 0)";    
    if (!empty($accfrom)){
      $sql .= " AND CODIGO_AUX >= '".$accfrom."'";
    }
    if (!empty($accto)){
      $sql .= " AND (CODIGO_AUX <= '".$accto."' OR CODIGO_AUX LIKE '".$accto."%')";
    }
    $rs = $GLOBALS['db']->Query($sql);
    $total = $GLOBALS['db']->rows_affected();    
    if (!empty($limit)){
      $sql .= " LIMIT ".$start.", ".$limit;    
    }
    $arr["records"] = $GLOBALS['db']->auto_array($sql,array(),true);
    $arr["nrorecords"] = $total;
    return $arr;
  } 

  public static function getIndividual($codigo){
    if (empty($codigo)){ return false; }
    $sql = "SELECT CODIGO,NOMBRE FROM dp01a110 WHERE CODIGO = ?";
    return $GLOBALS['db']->auto_array($sql,array($codigo));
  }

  public static function getIndAux($codigoaux){
    if (empty($codigoaux)){ return false; }
    $sql = "SELECT CODIGO,NOMBRE FROM dp01a110 WHERE CODIGO_AUX = ?";
    return $GLOBALS['db']->auto_array($sql,array($codigoaux));
  }
}  
?>