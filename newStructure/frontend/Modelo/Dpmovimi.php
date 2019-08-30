<?php
class Modelo_Dpmovimi{

	public static function search(){

		$sql = "SELECT * FROM dpmovimi";
		return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
	}

	public static function searchMinSeat(){

		$sql = "SELECT MIN(ASIENTO) AS minimo FROM dpmovimi";
		return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
	}

	public static function searchMovimi($type=false,$id){
		
		$sql = "SELECT c.CODMOV, c.REFER, c.GRUPOCON, c.TIPO, FORMAT(c.CR, 2) AS CR,FORMAT(c.DB, 2) AS DB,d.NOMBRE, d.CODIGO_AUX, c.CONCEPTO, c.IMPORTE, c.DOCUMENTO, c.LIQUIDA_NO, FORMAT(ABS(IMPORTE),2) as importe_format FROM dpmovimi c LEFT JOIN dp01a110 d ON c.CODMOV = d.CODIGO WHERE ";
		
		if($type != false){
			$id = str_pad($id,8, "0", STR_PAD_LEFT);
			if($id != '00000000'){
				$sql .= "TIPO_ASI = '$type'";
			}else{
				$sql .= "ASIENTO = '$id' AND TIPO_ASI = '$type'";
			}
	      	
	    }else{
	      	$sql .= "IDCONT = '$id'";
	    }

	    $sql .= ' ORDER BY c.ASIENTO';
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

	public static function report($empresa,$datefrom,$dateto,$typeseat='',$seatfrom='',$seatto='',
		                          $codmov='',$orderby=array()){
      if (empty($empresa) || empty($datefrom) || empty($dateto)){ return false; }       
	  $sql = "SELECT c.FECHA_ASI, c.DESC_ASI, c.ASIENTO, m.CODMOV, a.NOMBRE, m.IDCONT,
	                 m.CONCEPTO, m.IMPORTE, m.TIPO, m.REFER, m.DOCUMENTO, m.TIPO_ASI	    
			  FROM dpmovimi m 
			  INNER JOIN dpcabtra c ON m.TIPO_ASI = c.TIPO_ASI AND m.ASIENTO = c.ASIENTO  
			  INNER JOIN dp01a110 a ON a.CODIGO = m.CODMOV 
			  WHERE c.ID_EMPRESA = ? AND m.ID_EMPRESA = ? AND 
			        c.FECHA_ASI BETWEEN ? AND ? ";
	  if (!empty($typeseat)){
	  	$sql .= " AND m.TIPO_ASI = '".$typeseat."'";
	  }		        
	  if (!empty($seatfrom)){
	  	$sql .= "AND c.ASIENTO >= '".$seatfrom."' ";
	  }		  
	  if (!empty($seatto)){
	  	$sql .= "AND c.ASIENTO <= '".$seatto."' ";
	  } 
	  if (!empty($codmov)){
	  	$sql .= "AND m.CODMOV = '".$codmov."'";
	  } 
	  if (!empty($orderby) && count($orderby)>0){
	  	$sql .= "ORDER BY ";	
	  	foreach($orderby as $order){
	  	  $sql .= $order.", "; 	
	  	}	  	
	  	$sql = substr($sql, 0, -2);	  	
	  }    				  
      return $GLOBALS['db']->auto_array($sql,array($empresa,$empresa,$datefrom,$dateto),true);
	}

	public static function reportLedger($empresa,$date,$accfrom='',$accto=''){
	  if (empty($empresa) || empty($date)){ return false; }	
	  $sql = "SELECT CODMOV, SUM(IMPORTE) AS balance FROM dpmovimi 
	          WHERE ID_EMPRESA = ? AND FECHA_ASI < ? ";
	  if (!empty($accfrom)){
	  	$sql .= "AND CODMOV >= '".$accfrom."' ";
	  }        
	  if (!empty($accto)){
	  	$sql .= "AND CODMOV <= '".$accto."' ";
	  }
	  $sql .= "GROUP BY CODMOV HAVING balance > 0 ORDER BY CODMOV";
	  return $GLOBALS['db']->auto_array($sql,array($empresa,$date),true);	
	}

	public static function updateAnnul($id){

		return $GLOBALS['db']->execute("UPDATE dpmovimi SET IMPORTE_AN = IMPORTE, IMPORTE=0, DB=0, CR=0 WHERE IDCONT='$id'");
	}
}  
?>