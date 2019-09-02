<?php

class Modelo_Access{

  public static function truncateTabla(){

    $sql = "TRUNCATE table access";
    return $rs = $GLOBALS['db']->auto_array($sql,array());
  }

  public static function firtsInsert($arreglo_datos){
    $result = $GLOBALS['db']->insert_multiple("access","a_perfil, a_modulo, a_item, cs,sav,edi,del,pri",$arreglo_datos);
    return $result;
  }

  public static function searchPermission($id_user){

  	$sql = 'SELECT b.id_access, b.a_perfil, b.a_modulo, m.modulo, b.a_item, m.nombre_item, 
  			m.estado, b.cs, b.sav, b.edi, b.del, b.pri 
  			FROM access b, modulos_items m 
  			WHERE b.a_perfil = '.$id_user.' AND m.id_modulo_item = b.a_item 
  			ORDER BY m.modulo,b.a_item,a_modulo;';
  	$datos = $GLOBALS['db']->auto_array($sql,array(),true);

  	$rs = array();
  	foreach ($datos as $key => $value) {
		  $rs[$value['a_item']] = array("rd"=>($value['cs']=='A')?1:0,"sav"=>($value['sav']=='A')?1:0,"edi"=>($value['edi']=='A')?1:0,"del"=>($value['del']=='A')?1:0,"pri"=>($value['pri']=='A')?1:0);
	  } 
	  return $rs;
  }

}  
?>