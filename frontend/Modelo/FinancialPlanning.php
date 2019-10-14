<?php 

class Modelo_FinancialPlanning{
	public static function getData($year,$company=false){
		$sql = "SELECT dp.NOMBRE, dp.CODIGO AS CODIGOMAIN, dp.CODIGO_AUX, dp.PLANMARCA,dpp.* FROM dp01a110 dp LEFT JOIN dppresup dpp ON dp.CODIGO = dpp.CODIGO AND ANO = '$year'ORDER BY dp.CODIGO;";
		return $GLOBALS['db']->auto_array($sql,array(), true);
	}

	public static function getList($year,$company=false){
		$sql = "SELECT dp.NOMBRE, dp.CODIGO AS CODIGOMAIN, dp.CODIGO_AUX, dp.PLANMARCA,dpp.* FROM dp01a110 dp RIGHT JOIN dppresup dpp ON dp.CODIGO = dpp.CODIGO AND ANO = '$year'ORDER BY dp.CODIGO;";
		return $GLOBALS['db']->auto_array($sql,array(), true);
	}

	public static function Update($data,$company=false){
		if(empty($data)){return false;}
		$sql = "UPDATE dppresup SET VALPRE01 = '".$data['VALPRE01']."',VALPRE02 = '".$data['VALPRE02']."',VALPRE03 = '".$data['VALPRE03']."',VALPRE04 = '".$data['VALPRE04']."',VALPRE05 = '".$data['VALPRE05']."',VALPRE06 = '".$data['VALPRE06']."',VALPRE07 = '".$data['VALPRE07']."',VALPRE08 = '".$data['VALPRE08']."',VALPRE09 = '".$data['VALPRE09']."',VALPRE10 = '".$data['VALPRE10']."',VALPRE11 = '".$data['VALPRE11']."',VALPRE12 = '".$data['VALPRE12']."',TOTAL = '".$data['TOTAL']."' WHERE ANO = ".$data['YEAR']." AND CODIGO = '".$data['CODE']."';";
		return $GLOBALS['db']->execute($sql);
	}

	public static function insert($data){
		if(count($data)==0){return false;}
    	return $result = $GLOBALS['db']->insert('dppresup',$data);
	}
}

 ?>