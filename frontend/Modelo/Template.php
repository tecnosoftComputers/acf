<?php

class Modelo_Template{

  public static function searchTemplate($id){

    $sql = "SELECT * FROM templates WHERE description = 'Modelo$id'";
    return $rs = $GLOBALS['db']->auto_array($sql,array());
  }

}  
?>