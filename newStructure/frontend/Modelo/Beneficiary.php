<?php

class Modelo_Beneficiary{

  public static function searchBeneficiary(){

    $sql = "SELECT LPAD(NO_ID,5,0) AS NO_ID, TRIM(NOMEMP) as NOMEMP FROM finacli ORDER BY NOMEMP ASC";
	$arrdatos = $GLOBALS['db']->auto_array($sql,array(),true);

    $datos = array();
	if (!empty($arrdatos) && is_array($arrdatos)){

		foreach ($arrdatos as $key => $value) {
			$datos[$value['NO_ID']] = $value['NOMEMP'];
		}
	}
	return $datos;
  }
}  
?>