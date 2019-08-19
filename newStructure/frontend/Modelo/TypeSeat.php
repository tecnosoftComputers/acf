<?php

class Modelo_TypeSeat{

  public static function searchSeat(){

    $sql = "SELECT * FROM DPNUMERO WHERE status='A'";
    return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
  }

  public static function increaseSeat($type,$asiento){
  	if(empty($type)){return false;}
     return $GLOBALS['db']->update('DPNUMERO',array('ASIENTO'=>$asiento+1),"TIPO_ASI='$type'");
  }
}  
?>