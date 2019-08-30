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
		
		$sql = "SELECT c.CODMOV, c.REFER, c.GRUPOCON, c.TIPO, FORMAT(c.CR, 2) AS CR,FORMAT(c.DB, 2) AS DB,d.NOMBRE, d.CODIGO_AUX, c.CONCEPTO FROM dpmovimi c INNER JOIN dp01a110 d ON c.CODMOV = d.CODIGO WHERE ";
		$id = str_pad($id,8, "0", STR_PAD_LEFT);
		if($type != false){
	      	$sql .= "ASIENTO = '$id' AND TIPO_ASI = '$type'";
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

	public static function report($empresa,$datefrom,$dateto,$typeseat='',$seatfrom='',$seatto='',
		                          $accfrom='',$accto='',$orderby=array()){
      if (empty($empresa) || empty($datefrom) || empty($dateto)){ return false; }       
	  $sql = "SELECT c.FECHA_ASI, c.DESC_ASI, c.ASIENTO, m.CODMOV, a.NOMBRE, m.IDCONT,
	                 m.CONCEPTO, m.IMPORTE, m.TIPO, m.REFER, m.DOCUMENTO, m.TIPO_ASI	    
			  FROM dpmovimi m 
			  INNER JOIN dpcabtra c ON m.TIPO_ASI = c.TIPO_ASI AND m.ASIENTO = c.ASIENTO  
			  INNER JOIN dp01a110 a ON a.CODIGO = m.CODMOV 
			  WHERE c.ID_EMPRESA = ? AND m.ID_EMPRESA = ? AND 
			        (a.CTAINACTIVA IS NULL OR a.CTAINACTIVA = 0) AND 
			        c.FECHA_ASI BETWEEN ? AND ?";
	  if (!empty($typeseat)){
	  	$sql .= " AND m.TIPO_ASI = '".$typeseat."'";
	  }		        
	  if (!empty($seatfrom)){
	  	$sql .= " AND c.ASIENTO >= '".$seatfrom."'";
	  }		  
	  if (!empty($seatto)){
	  	$sql .= " AND c.ASIENTO <= '".$seatto."'";
	  } 
	  if (!empty($accfrom)){
	  	$sql .= " AND m.CODMOV >= '".$accfrom."'";
	  } 
	  if (!empty($accto)){
	  	$sql .= " AND (m.CODMOV <= '".$accto."' OR m.CODMOV LIKE '".$accto."%')";
	  }
	  if (!empty($orderby) && count($orderby)>0){
	  	$sql .= " ORDER BY ";	
	  	foreach($orderby as $order){
	  	  $sql .= $order.", "; 	
	  	}	  	
	  	$sql = substr($sql, 0, -2);	  	
	  }    				  
      return $GLOBALS['db']->auto_array($sql,array($empresa,$empresa,$datefrom,$dateto),true);
	}

	public static function reportLedger($empresa,$date,$account){
	  if (empty($empresa) || empty($date) || empty($account)){ return false; }	
	  $sql = "SELECT CODMOV, SUM(IMPORTE) AS balance FROM dpmovimi 
	          WHERE ID_EMPRESA = ? AND FECHA_ASI < ? AND CODMOV = ?";	  
	  return $GLOBALS['db']->auto_array($sql,array($empresa,$date,$account));	
	}

	public static function reportSummaryR($empresa,$datefrom,$dateto,$accfrom='',$accto=''){
	  if (empty($empresa) || empty($datefrom) || empty($dateto)){ return false; }	
	  $sql = "SELECT temp.CODMOV, c.NOMBRE, SUM(temp.debit) AS debit, SUM(temp.credit) AS credit
			  FROM dp01a110 c
			  INNER JOIN 
				(SELECT m.CODMOV, m.TIPO_ASI, 
				        IF(m.IMPORTE>0,m.IMPORTE,0) AS debit, 
				        IF(m.IMPORTE<0,m.IMPORTE,0) AS credit
				FROM dpmovimi m 
				WHERE m.ID_EMPRESA = '".$empresa."' AND 
				      m.FECHA_ASI BETWEEN '".$datefrom."' AND '".$dateto."') AS temp
				      ON c.CODIGO = temp.CODMOV 
			  WHERE (c.CTAINACTIVA IS NULL OR c.CTAINACTIVA = 0)";
      if (!empty($accfrom)){
      	$sql .= " AND c.CODIGO >= '".$accfrom."'";
      }
      if (!empty($accto)){
      	$sql .= " AND (c.CODIGO <= '".$accto."' OR c.CODIGO LIKE '".$accto."%')";
      }
	  $sql .= " GROUP BY c.CODMOV ORDER BY c.CODIGO";
	}
}  
?>