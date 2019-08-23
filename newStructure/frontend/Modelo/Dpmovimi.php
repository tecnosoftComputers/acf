<?php

class Modelo_Dpmovimi{

	public static function search(){

		$sql = "SELECT * FROM dpmovimi";
		return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
	}

	/*public static function searchSequential(){

	   $sql = "SELECT IF(MAX(SECUENCIAL)='' OR MAX(SECUENCIAL)= 0,1,MAX(SECUENCIAL)+1) AS ultimo FROM dpmovimi";
	   return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
	}*/

	public static function searchMinSeat(){

		$sql = "SELECT MIN(ASIENTO) AS minimo FROM dpmovimi";
		return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
	}

	public static function searchMovimi($type=false,$id){
		
		$sql = "SELECT c.CODMOV, c.REFER, c.GRUPOCON, c.TIPO, FORMAT(c.CR, 2) AS CR,FORMAT(c.DB, 2) AS DB,d.NOMBRE, d.CODIGO_AUX FROM dpmovimi c INNER JOIN dp01a110 d ON c.CODMOV = d.CODIGO WHERE ";

		if($type != false){
	      $sql .= "ASIENTO like '%$id' AND TIPO_ASI = '$type'";
	    }else{
	      $sql .= "IDCONT = '$id'";
	    }

		return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
	}

	public static function deleteMovimi($id){

	    if(empty($id)){return false;}
	    return $GLOBALS['db']->delete('dpmovimi',"IDCONT ='$id'");
	 }


	public static function insert($datos){
	    if(count($datos)==0){return false;}
	    return $result = $GLOBALS['db']->insert('dpmovimi',$datos);
	}
}  
?>