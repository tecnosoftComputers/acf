<?php

class Modelo_Seat{

  public static function searchLastSeat(){

    $sql = "SELECT MAX(ASIENTO) as final FROM dpcabtra";
    return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
  }

  public static function searchSeat($type){

  	$sql = "SELECT ASIENTO FROM DPNUMERO WHERE TIPO_ASI like '$type'";
  	$rs = $GLOBALS['db']->auto_array($sql,array(),false);
  	if(!empty($rs)){
  		$rs['ASIENTO'];
  		return $convert = str_pad(($rs['ASIENTO']+1),8, "0", STR_PAD_LEFT);
  	}else{
  		return false;
  	}
  }

  public static function insert($datos){
      if(count($datos)==0){return false;}
      return $result = $GLOBALS['db']->insert('dpcabtra',$datos);
  }

  public static function searchMaxCont(){

    $sql = "SELECT IF(MAX(IDCONT)='' OR MAX(IDCONT)= 0,1,MAX(IDCONT)) AS suma FROM dpcabtra";
    return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
  }

}  
?>
