<?php
class Modelo_TypeSeat{

  public static function searchSeat(){
    $sql = "SELECT * FROM DPNUMERO WHERE status='A'";
    return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
  }

  public static function increaseSeat($type,$asiento){
  	if(empty($type)){return false;}
     return $GLOBALS['db']->update('DPNUMERO',array('ASIENTO'=>$asiento),"TIPO_ASI='$type'");
  }

   public static function searchSeatType($type){
  	$sql = "SELECT ASIENTO,NOMBRE FROM DPNUMERO WHERE TIPO_ASI like '$type'";
  	$rs = $GLOBALS['db']->auto_array($sql,array(),false);
  	if(!empty($rs)){
      $seat = $rs['ASIENTO']+1;
  		return array('seat'=>str_pad($seat,8, "0", STR_PAD_LEFT),'name'=>$rs['NOMBRE']);
  	}else{
  		return false;
  	}
  }
}  
?>