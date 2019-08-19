<?php

class Modelo_Dpmovimi{

	public static function search(){

		$sql = "SELECT * FROM dpmovimi";
		return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
	}

	public static function searchSequential(){

	   $sql = "SELECT IF(MAX(SECUENCIAL)='' OR MAX(SECUENCIAL)= 0,1,MAX(SECUENCIAL)+1) AS ultimo FROM dpmovimi";
	   return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
	}

	public static function searchMinSeat(){

		$sql = "SELECT MIN(ASIENTO) AS minimo FROM dpmovimi";
		return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
	}

	public static function searchMaxAux(){

		$sql = "SELECT MAX(AUX) AS favorito FROM dpmovimi";
		return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
	}

	public static function searchJournal($id){

		$sql = "SELECT TIPO_ASI,CONCEPTO FROM dpmovimi WHERE ASIENTO like '$id'";
		return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
	}

	public static function insert($datos){
	    if(count($datos)==0){return false;}
	    return $result = $GLOBALS['db']->insert('dpmovimi',$datos);
	}
}  
?>