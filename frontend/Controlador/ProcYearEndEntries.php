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
      $dateto = date("Y-12-30", strtotime($closingdate));
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


      $getCabJournal = Modelo_Seat::existJournal($_SESSION['acfSession']['id_empresa'],$tipoasi,$seatnumber);
      $GLOBALS['db']->beginTrans();
      if($getCabJournal != false){
        // $idcont = $getCabJournal["IDCONT"];
        
        // $deleteJournal = Modelo_Seat::deleteJournal($idcont);
        // if($deleteJournal == false){
        //   throw new Exception("Ha ocurrido un error al eliminar el journal Cab.");
          
        // }
        // $deleteDpmovimi = Modelo_Dpmovimi::deleteMovimi($idcont);
        // if($deleteDpmovimi == false){
        //   throw new Exception("Ha ocurrido un error al eliminar los movimientos del journal.");
          
        // }
        Utils::log("ederederederedereder");
      }


      $cont = Modelo_Seat::searchMaxCont()['suma']+1; 
      $dateSystem = date("Y-m-d");
      $hourSystem = date("H:i:s");
      $tipoasi = "DI";

      $results = Modelo_Dpmovimi::allYearMovimi($_SESSION['acfSession']['id_empresa']
                                    ,$dateto,$types_account["INGRESOS"],
                                    $types_account["EGRESOS"]);
      $debitos = 0;
      $creditos = 0;
      foreach ($results as $key => $value) {
        if(!empty($value["ingreso"])){
          $creditos += $value["ingreso"];
        }
        if(!empty($value["egreso"])){
          $debitos += $value["egreso"];
        }
      }

      $resultdebcred = ($creditos *-1)-$debitos;
      echo $resultdebcred;
      

      foreach($types_account["ACUMULADOD"] as $deudora){
        $accdeudora[] = Modelo_ChartAccount::getIndAux($deudora); 
      }
      foreach($types_account["ACUMULADOA"] as $acreedora){
        $accacreedora[] = Modelo_ChartAccount::getIndAux($acreedora); 
      }
      echo "<br>";
      print_r($accdeudora);
      echo "<br>";
      print_r($accacreedora);
      exit();

      // $datos = array('IDCONT'=>$cont,'TIPO_ASI'=>$_POST['_seleccion'],'FECHA_ASI'=>date("Y-m-d", strtotime($_POST['date'])),'ASIENTO'=>$seat,'CONCEPTO'=>$concept,'CODID'=>$_POST['benef'],'DB'=>str_replace(',', '',$db),'CR'=>str_replace(',', '',$cr), 'ID_EMPRESA'=>$_SESSION['acfSession']['id_empresa'],'CODIGO'=>$_POST['_accountycode'][$key],'CODMOV'=>$_POST['codep'][$key],'CERRADO'=>(int)1,'TIPO'=>$_POST['el_type'][$key],'REFER'=>$_POST['el_ref'][$key],'GRUPOCON'=>$_POST['_trans'][$key],'IMPORTE'=>str_replace(',', '',$importe), 'DOCUMENTO'=>$_POST['el_documento'][$key], 'LIQUIDA_NO'=>$_POST['la_liq'][$key]);


      // echo "<br>";
      // echo (169867.40000+19280.00000+46406.65000+7662.06166+10253.89063+(-36.47000)+64619.03000+6959.77000+4000.00000+3165.90000+(-114.82000));
      // echo "<br>";
      // echo (-4000.00000-168514.10223-173312.77000-36592.37000-1769.65000-103.02000-895.00000-50.00000-655.32000);
      // echo "<br>";
      // echo (332063.41229-385892.23223);
      print_r("<br>".$creditos."<br>".$debitos."<br>Net income = :".(($creditos *-1)-$debitos));
      // print_r($results);
      exit();

      // $datos = array('IDCONT'=>$cont,'TIPO_ASI'=>$tipoasi,'FECHA_ASI'=>$closingdate,'ASIENTO'=>$seat,'DESC_ASI'=>$memo,,'DEBITOS'=>$sum_db,'CREDITOS'=>$sum_cr,'USER_ID'=>$_SESSION['acfSession']['usuario'],'TIPO_MON'=>'DOL', 'CERRADO'=>(int)1, 'ID_EMPRESA'=>$_SESSION['acfSession']['id_empresa'],'FACTOR'=>'1', 'CEDRUC'=>$_POST['benef'], 'DOCUMENTO'=>$_POST['_documento'], 'LIQUIDA_NO'=>$_POST['_liq']);
      // echo $dateSystem." - ".$hourSystem;


      // exit();

      // $datos = array('IDCONT'=>$cont,'TIPO_ASI'=>$_POST['_seleccion'],'FECHA_ASI'=>date("Y-m-d", strtotime($_POST['date'])),'ASIENTO'=>$seat,'CONCEPTO'=>$concept,'CODID'=>$_POST['benef'],'DB'=>str_replace(',', '',$db),'CR'=>str_replace(',', '',$cr), 'ID_EMPRESA'=>$_SESSION['acfSession']['id_empresa'],'CODIGO'=>$_POST['_accountycode'][$key],'CODMOV'=>$_POST['codep'][$key],'CERRADO'=>(int)1,'TIPO'=>$_POST['el_type'][$key],'REFER'=>$_POST['el_ref'][$key],'GRUPOCON'=>$_POST['_trans'][$key],'IMPORTE'=>str_replace(',', '',$importe), 'DOCUMENTO'=>$_POST['el_documento'][$key], 'LIQUIDA_NO'=>$_POST['la_liq'][$key]);


      // echo "<br><br><br><br><br>";
      // print_r($results);
      // foreach ($results as $key => $value) {
        
      // }

      // foreach($types_account["RESULTADOD"] as $deudora){
      //   $accdeudora[] = Modelo_ChartAccount::getIndAux($deudora); 
      // }
      // foreach($types_account["RESULTADOA"] as $acreedora){
      //   $accacreedora[] = Modelo_ChartAccount::getIndAux($acreedora); 
      // }


      
      


    } catch (Exception $e) {
      $_SESSION['acfSession']['mostrar_error'] = $e->getMessage();
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