<?php
class Controlador_ProcYearEndEntries extends Controlador_Reports {

  public $item = 50;
  
  public function construirPagina(){   

    $tags = array();    
    if(!Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/login.php");
    } 
    $action = Utils::getParam('action','',$this->data);
    Utils::log("accion eder: ".$action);

    switch($action){ 
      case 'prodend':
        $closingdate = Utils::getParam('closingdate', '', $this->data);
        $closingseatdetail = Utils::getParam('closingseatdetail', '', $this->data);
        $seatnumber = Utils::getParam('seatnumber', '', $this->data);
        $this->createYearEndEntries($closingdate, $closingseatdetail, $seatnumber);
      break;               
      case 'getCabtra':
        $date = Utils::getParam('date','',$this->data);
        $dateaux = explode("-", date("Y-12-d", strtotime($date)));
        $company = $_SESSION['acfSession']['id_empresa'];
        $typeasi = "DI";
        $seat = "00".$dateaux[0].$dateaux[1];
        $returnData = $this->getCabtra($company,$typeasi,$seat);
        Vista::renderJSON(array('returnData' => $returnData));

      break;            
      default:    
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->item];
        $tags["template_js"][] = "yearendentries";  
        Vista::render('proc_yearendentries', $tags);
      break;
    }
    
  }


  public function createYearEndEntries($closingdate, $closingseatdetail, $seatnumber){
    try {
      if(empty($closingdate) || $closingdate == ""){
        throw new Exception("The accounting closing date is empty.");
      }
      $dateto = date("Y-m-d", strtotime($closingdate));
      $closingdate = date("Y-12-t", strtotime($closingdate));
      if(!Utils::valida_fecha($closingdate)){
        throw new Exception("The accounting date is not valid!.");
      }
      $closingdateExp = explode("-", $closingdate);
      $seatnumberAux = "00".$closingdateExp[0].$closingdateExp[1];
      $closingseatdetailAux = "Year-end accounting period (".$closingdateExp[0].")";
      if(empty($closingseatdetail) || $closingseatdetail != $closingseatdetailAux){
        $closingseatdetail = $closingseatdetailAux;
      }
      if(empty($seatnumber) || $seatnumber != $seatnumberAux){
        $seatnumber = $seatnumberAux;
      }
      $types_account = Modelo_Dasbal::getParams();
      $tipoasi = "DI";

      $getCabJournal = Modelo_Seat::existJournal($_SESSION['acfSession']['id_empresa'],$tipoasi,$seatnumber);
      
      $GLOBALS['db']->beginTrans();
      if(!empty($getCabJournal)){
        $idcont = $getCabJournal[0]["IDCONT"];
        $deleteJournal = Modelo_Seat::deleteJournal($idcont);
        if(empty($deleteJournal)){
          throw new Exception("Ha ocurrido un error al eliminar el journal Cab.");
          
        }
        $deleteDpmovimi = Modelo_Dpmovimi::deleteMovimi($idcont);
        if(empty($deleteDpmovimi)){
          throw new Exception("Ha ocurrido un error al eliminar los movimientos del journal.");
          
        }
      }

      $cont = Modelo_Seat::searchMaxCont()['suma']+1; 
      $dateSystem = date("Y-m-d");
      $hourSystem = date("H:i:s");

      $results = Modelo_Dpmovimi::allYearMovimi($_SESSION['acfSession']['id_empresa']
                                    ,$dateto,$types_account["INGRESOS"],
                                    $types_account["EGRESOS"]);
      $debitos = 0;
      $creditos = 0;
      $datosMovimi = array();
      foreach ($results as $key => $value) {
        $valueSet = 0;
        if(!empty($value["ingreso"])){
          $creditos += $value["ingreso"];
        }
        if(!empty($value["egreso"])){
          $debitos += $value["egreso"];
        }
        $valueSet = (!empty($value["ingreso"])) ? $value["ingreso"] : $value["egreso"] ;
        $importe = $valueSet * -1;
        $valueSet1 = 0;
        $valueSet2 = 0;
        if(!empty($value["ingreso"])){
          $valueSet1 = $value["ingreso"];
          if($valueSet1 < 0){
            $valueSet1 *= -1;
          }
        }
        if(!empty($value["egreso"])){
          $valueSet2 = $value["egreso"];
          if($valueSet2 < 0){
            $valueSet2 *= 1;
          }
        }

        $datosMovimiArray = array('IDCONT'=>$cont,'TIPO_ASI'=>$tipoasi,'FECHA_ASI'=>$dateto,'ASIENTO'=>$seatnumber,'CONCEPTO'=>$closingseatdetail,'DB'=>str_replace(',', '',$valueSet1),'CR'=>str_replace(',', '',$valueSet2), 'ID_EMPRESA'=>$_SESSION['acfSession']['id_empresa'],'CODMOV'=>$value["CODIGO"],'CERRADO'=>(int)1,'IMPORTE'=>str_replace(',', '',$importe));

        array_push($datosMovimi, $datosMovimiArray);

      }

      // Utils::log("suma de primera: ".(169867.40000+19280.00000+46406.65000+7621.75640+10222.28911-36.47000+64619.03000+6959.77000+4000.00000+3165.90000-114.82000));

      // Utils::log("suma de segunda: ".(-4000.00000-181368.30533-852203.93000-36592.37000-1769.65000-103.02000-895.00000-50.00000-655.32000));

      $resultdebcred = (($creditos *-1)-$debitos) * - 1;
      Utils::log("res eder: ".$resultdebcred);
      $valueSet = 0;
      if($resultdebcred >=0){
        foreach($types_account["ACUMULADOD"] as $deudora){
          $accdeudora[] = Modelo_ChartAccount::getIndAux($deudora);
          foreach ($accdeudora as $key => $value) {
            $valueSet = $resultdebcred;
            $datosMovimiArray = array('IDCONT'=>$cont,'TIPO_ASI'=>$tipoasi,'FECHA_ASI'=>$dateto,'ASIENTO'=>$seatnumber,'CONCEPTO'=>$closingseatdetail,'DB'=>str_replace(',', '',$valueSet),'CR'=>str_replace(',', '',$valueSet), 'ID_EMPRESA'=>$_SESSION['acfSession']['id_empresa'],'CODMOV'=>$value["CODIGO"],'CERRADO'=>(int)1,'IMPORTE'=>str_replace(',', '',$resultdebcred));
            array_push($datosMovimi, $datosMovimiArray);
          }
        }
      }
      else{
        foreach($types_account["ACUMULADOA"] as $acreedora){
          $accacreedora[] = Modelo_ChartAccount::getIndAux($acreedora);
          foreach ($accacreedora as $key => $value) {
            $valueSet = $resultdebcred;
            $datosMovimiArray = array('IDCONT'=>$cont,'TIPO_ASI'=>$tipoasi,'FECHA_ASI'=>$dateto,'ASIENTO'=>$seatnumber,'CONCEPTO'=>$closingseatdetail,'DB'=>str_replace(',', '',$valueSet),'CR'=>str_replace(',', '',$valueSet), 'ID_EMPRESA'=>$_SESSION['acfSession']['id_empresa'],'CODMOV'=>$value["CODIGO"],'CERRADO'=>(int)1,'IMPORTE'=>str_replace(',', '',$resultdebcred));
            array_push($datosMovimi, $datosMovimiArray);
          }
        }
      }
      if($debitos < 0){
        $debitos *= -1;
      }
      if($creditos < 0){
        $creditos *= -1;
      }
      $datos = array('IDCONT'=>$cont,'TIPO_ASI'=>$tipoasi,'FECHA_ASI'=>$dateto,'ASIENTO'=>$seatnumber,'DESC_ASI'=>$closingseatdetail,'DEBITOS'=>$debitos,'CREDITOS'=>$creditos,'USER_ID'=>$_SESSION['acfSession']['usuario'],'TIPO_MON'=>'DOL','FECHASYS'=>$dateSystem,'HORASYS'=>$hourSystem, 'CERRADO'=>(int)1, 'ID_EMPRESA'=>$_SESSION['acfSession']['id_empresa'],'FACTOR'=>'1');

      $insertCabJournal = Modelo_Seat::insert($datos);
      if($insertCabJournal == false){
        throw new Exception("An error has occurred. try again");
      }
       
      foreach ($datosMovimi as $key => $value) {
        $insertMovimiJournal = Modelo_Dpmovimi::insert($value);
        if($insertMovimiJournal == false){
          throw new Exception("An error has occurred. try again.");
          
        }
      }
      
      $GLOBALS['db']->commit();
      $_SESSION['acfSession']['mostrar_exito'] = 'The year entries was successful.';
      Utils::doRedirect(PUERTO.'://'.HOST.'/proccess/yearendentries/');


    } catch (Exception $e) {
      $_SESSION['acfSession']['mostrar_error'] = $e->getMessage();
      Utils::doRedirect(PUERTO.'://'.HOST.'/proccess/yearendentries/');
    }
  }

  public function getCabtra($company,$typeasi,$seat){
    if(!empty(Modelo_Seat::existJournal($company,$typeasi,$seat))){
        return true;
    }
    return false;
  }

}
?>