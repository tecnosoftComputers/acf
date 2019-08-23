<?php

class Modelo_Seat{

  public static function search(){

    $sql = "SELECT * FROM dpcabtra";
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

  public static function searchJournal($type=false,$id){

    $sql = "SELECT * FROM dpcabtra WHERE ";

    if($type != false){
      $sql .= "ASIENTO like '%$id' AND TIPO_ASI = '$type'";
    }else{
      $sql .= "IDCONT = '$id'";
    }

    $rs = $GLOBALS['db']->auto_array($sql,array(),false);

    if(!empty($rs)){
      $rs['IDCONT'] = Utils::encriptar($rs['IDCONT']);
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

}  
?>
