<?php

class Modelo_TypeTransaction{

  public static function search(){

    $sql = "SELECT * FROM type_transaction";
    return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
  }
}  
?>