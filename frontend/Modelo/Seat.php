<?php

class Modelo_Seat{

  public static function search($type=false,$fecha1=false,$fecha2=false){

    $sql = "SELECT * FROM dpcabtra";

    if($type != false && $fecha1 != false && $fecha2 != false){
      $sql .= " WHERE TIPO_ASI = '$type' AND FECHA_ASI BETWEEN '".$fecha1."' AND '".$fecha2."'";
    }
    return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
  }

  public static function searchMemorice(){

    $sql = "SELECT * FROM dpcabtra WHERE MEMORICE = 1";
    return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
  }

  public static function searchLastSeat(){

    $sql = "SELECT MAX(ASIENTO) as final FROM dpcabtra";
    return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
  }

  public static function insert($datos){
      if(count($datos)==0){return false;}
      return $result = $GLOBALS['db']->insert('dpcabtra',$datos);
  }

  public static function searchMaxCont(){

    $sql = "SELECT IF(MAX(IDCONT)='' OR MAX(IDCONT)= 0,1,MAX(IDCONT)) AS suma FROM dpcabtra";
    return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
  }

  public static function searchJournal($type=false,$range=false,$id=false){

    $sql = "SELECT *,LPAD(CEDRUC,5,0) as CEDRUC FROM dpcabtra";

    if($type != false && $id != false){
      $id = str_pad($id,8, "0", STR_PAD_LEFT);
      $sql .= " WHERE ASIENTO = '$id' AND TIPO_ASI = '$type'";
    }else if($id == ''){

      if($range[0] == 'All' && $type != false){
        $sql .= " WHERE  TIPO_ASI = '$type'";
      }else if($range[0] != 'All'){
        $sql .= " WHERE FECHA_ASI BETWEEN '".date('Y-m-d', strtotime($range[0]))."' AND '".date('Y-m-d', strtotime($range[1]))."'";
        if($type != false){
          $sql .= " AND TIPO_ASI = '$type'";
        }
      }
    }else{
      $sql .= " WHERE IDCONT = '$id'";
    }

    $sql .= ' ORDER BY ASIENTO';

    if($id == ''){
      $datos = $GLOBALS['db']->auto_array($sql,array(),true);
      $rs = array();
      foreach ($datos as $key => $value) {
        $rs[$key]['IDCONT'] =  Utils::encriptar($value['IDCONT']);
        $rs[$key]['TIPO_ASI'] =  $value['TIPO_ASI'];
        $rs[$key]['ASIENTO'] =  $value['ASIENTO'];
        $rs[$key]['FECHA_ASI'] =  $value['FECHA_ASI'];
        $rs[$key]['CEDRUC'] =  $value['CEDRUC'];
        $rs[$key]['BENEFICIAR'] =  $value['BENEFICIAR'];
        $rs[$key]['ANULADO'] =  $value['ANULADO'];
        $rs[$key]['DOCUMENTO'] =  $value['DOCUMENTO'];
        $rs[$key]['LIQUIDA_NO'] =  $value['LIQUIDA_NO'];
      }
    }else{
      
      $rs = $GLOBALS['db']->auto_array($sql,array(),false);
      if(!empty($rs)){
        $rs['IDCONT'] = Utils::encriptar($rs['IDCONT']);
      }
    }

    return $rs;
  }

  public static function deleteJournal($id){

    if(empty($id)){return false;}
    return $GLOBALS['db']->delete('dpcabtra',"IDCONT = '$id'");
  }

  public static function updateJournal($id, $datos){

    return $GLOBALS['db']->update("dpcabtra",$datos,"IDCONT='$id'");
  }

  public static function existJournal($company,$typeseat,$seat){
    $sql = "select * from dpcabtra where  id_empresa = $company and tipo_asi = '$typeseat' and asiento = '$seat';";
    return $GLOBALS['db']->auto_array($sql,array(),true);
  }

}  
?>
