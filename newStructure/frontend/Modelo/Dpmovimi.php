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

	public static function report($empresa,$datefrom,$dateto,$typeseat,$seatfrom='',$seatto=''){
      if (empty($empresa) || empty($datefrom) || empty($dateto) || empty($typeseat)){ return false; }       
	  $sql = "SELECT c.FECHA_ASI, c.DESC_ASI, c.ASIENTO, m.CODMOV, a.NOMBRE, m.CONCEPTO, m.IMPORTE 	    
			  FROM dpmovimi m 
			  INNER JOIN dpcabtra c ON m.TIPO_ASI = c.TIPO_ASI AND m.ASIENTO = c.ASIENTO  
			  INNER JOIN dp01a110 a ON a.CODIGO = m.CODMOV 
			  WHERE c.ID_EMPRESA = ? AND m.ID_EMPRESA = ? AND 
			        c.FECHA_ASI BETWEEN ? AND ? AND m.TIPO_ASI = ? ";
	  if (!empty($seatfrom)){
	  	$sql .= "AND c.ASIENTO >= '".$seatfrom."' ";
	  }		  
	  if (!empty($seatto)){
	  	$sql .= "AND c.ASIENTO <= '".$seatto."' ";
	  }      			
	  $sql .= "ORDER BY c.FECHA_ASI, c.ASIENTO";	
      return $GLOBALS['db']->auto_array($sql,array($empresa,$empresa,$datefrom,$dateto,$typeseat),true);
	}
}  
?>