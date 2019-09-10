<?php
class Controlador_Accounts extends Controlador_Base {
  
  public function construirPagina(){
  
    $tags = array();    
 
    if(!Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/login/");
    } 

    if(!empty($_SESSION['id_empresa'])){
      $_SESSION['acfSession']['id_empresa'] = $_SESSION['id_empresa'];
    }

    $_SESSION['acfSession']['rule'] = PUERTO.'://'.HOST.'/journalReport';
    $opcion = Utils::getParam('opcion','',$this->data); 
    $item = Utils::getParam('item','30',$this->data); 

    switch($opcion){
      case 'searchTemplate':
        $mod = Utils::getParam('mod', '', $this->data); 
        $template = Modelo_Template::searchTemplate($mod);
        Vista::renderJSON(array('template' => $template));
      break;
      case 'deleteMemorice':
        $id = Utils::getParam('id', '', $this->data); 
        $id = Utils::desencriptar($id); 
        $datos = array('MEMORICE'=>0);
        $journal = Modelo_Seat::updateJournal($id,$datos);
        $_SESSION['acfSession']['mostrar_exito'] = 'The journal was removed from the memorized.';
        Utils::doRedirect(PUERTO.'://'.HOST.'/journalEntries/');
      break;
      case 'journalReport':

        $type = Utils::getParam('tipo','',$this->data);
        $idcont = Utils::getParam('idcont','',$this->data);
        $idcont = Utils::desencriptar($idcont); 

        $company = Modelo_Companie::searchCompanies($_SESSION['acfSession']['id_empresa']);
        $user = Modelo_User::searchUsuario($_SESSION['acfSession']['usuario'])['namesurname'];

        $datos = Modelo_Seat::searchJournal(false,false,$idcont);
        $movi = Modelo_Dpmovimi::searchMovimi(false,$idcont);
        $accounts = Modelo_ChartAccount::searchChartAccountArray();

        $nombre_archivo = 'journal_'.$datos['ASIENTO'].'_'.date('mdYHis');
        $title = 'VOUCHER '.$datos['TIPO_ASI'].' Nº '.$datos['ASIENTO'];

        $format = Modelo_TypeSeat::searchSeatType(trim($datos['TIPO_ASI']))['format'];

        self::template($type, $format, $nombre_archivo, $company, $user, $datos, $movi, $accounts, $title, array(),'','','');
      break;
      case 'annulJournal':

        try{ 

          $id = Utils::getParam('id', '', $this->data); 
          $id = Utils::desencriptar($id);

          $datos = array('ANULADO'=>1,'FECHAANU'=>date('Y-m-d'),'HORAANU'=>date('h:i:s'),'USUANU'=>$_SESSION['acfSession']['usuario']);
          $journal = Modelo_Seat::updateJournal($id,$datos);

          $movi = Modelo_Dpmovimi::updateAnnul($id);
          $_SESSION['acfSession']['mostrar_exito'] = 'The journal was successfully canceled.';

        }catch(Exception $e){
          $GLOBALS['db']->rollback();
          $_SESSION['acfSession']['mostrar_error'] = $e->getMessage();           
        }
        Utils::doRedirect(PUERTO.'://'.HOST.'/journalEntries/');
      break;
      case 'searchJournal':
        $id = Utils::getParam('id', '', $this->data); 
        $type = Utils::getParam('type', '', $this->data); 
        $range = Utils::getParam('range', '', $this->data); 
        $movi = array();

        if($type == ''){
          $id = Utils::desencriptar($id);
          $type = $range = false;   

        }

        if(empty($range[0])){
          $range = array('All');
        }

        $journal = Modelo_Seat::searchJournal($type,$range,$id);
        $movi = Modelo_Dpmovimi::searchMovimi($type,$id);
        Vista::renderJSON(array('journal' => $journal, 'movi'=>$movi, 'rule'=>$_SESSION['acfSession']['rule'], 'permission'=>$_SESSION['acfSession']['permission'][$item], 'simbolo'=>$_SESSION['acfSession']['simbolo']));
      break;
      case 'journalEntries': 

        $type_default = 'EG';
        $userid = $_SESSION['acfSession']['usuario'];
        $one = Modelo_ChartAccount::searchChartAccount();
        $fetch_dp = Modelo_TypeSeat::searchSeat();
        $bene = Modelo_Beneficiary::searchBeneficiary();
        $all_send = Modelo_Seat::searchMemorice();
        $all_send2 = Modelo_Seat::search($type_default,date("Y-m-d",strtotime(date('Y-m-d')."- 1 year")),date('Y-m-d'));
        $typeTrans = Modelo_TabGeneral::search('tab_trans');

        $fila = 0;
        $tags = array('userid'=>$userid,
                      'one'=>$one,
                      'fetch_dp'=>$fetch_dp,
                      'all_send'=>$all_send,
                      'all_send2'=>$all_send2,
                      'type_default'=>$type_default,
                      'bene'=>$bene,
                      'fila'=>$fila,
                      'typeTrans'=>$typeTrans,
                      'item'=>$item
                    );

        $tags["template_js"][] = "journalEntries";
        $tags["template_css"][] = "";

        Vista::render('journalEntries', $tags);  
      break;
      case 'saveJournal':
        self::save(0);
      break;
      case 'saveMemoriceJournal':
        self::save(1);
      break;
      case 'updateJournal':
        self::update(0);
      break;
      case 'updateMemoriceJournal':
        self::update(1);
      break;
      case 'searchAccountsDetail';
        $accountsDetail = Modelo_ChartAccount::searchAccountsDetail();
        Vista::renderJSON(array('accountsDetail' => $accountsDetail));
      break;
      case 'search': 
        $match = Utils::getParam('match', '', $this->data); 
        if($match == 'All'){
          $chartAccount = Modelo_ChartAccount::searchChartAccount();
        }else{
          $chartAccount = Modelo_ChartAccount::searchChartAccount($match);
        }
        echo json_encode($chartAccount);
      break;
      case 'searchType': 
        $type = Utils::getParam('type', '', $this->data); 
        $types = Modelo_TypeSeat::searchSeatType($type);
        Vista::renderJSON(array('number' => $types['seat'], 'name'=>$types['name']));
      break;
      case 'create': 
        $view = 'accountsCreate'; 
        $typeAccount = Modelo_TypeAccount::searchTypeAccount();
        
        if(Utils::getParam('create') == 1){
          try{ 
            $campos = array('number'=>1,'name'=>1,'type'=>1,'desc'=>0);
            $data = $this->camposRequeridos($campos);
            $datos = array('CODIGO'=>$data['number'],'NOMBRE'=>$data['name'],'CODTIPCTA'=>$data['type']);
             
            if(!empty($_GET['desc'])){
              $datos['CTADES'] = $_GET['desc'];
            }

            $GLOBALS['db']->beginTrans();
            if(!Modelo_ChartAccount::insert($datos)){
              throw new Exception('The account could not be created, try again.');
            }
            $_SESSION['acfSession']['mostrar_exito'] = 'The account was successfully created.';
            $GLOBALS['db']->commit();
            Utils::doRedirect(PUERTO.'://'.HOST.'/accountsList/');
          }
          catch(Exception $e){
            $GLOBALS['db']->rollback();
            $_SESSION['acfSession']['mostrar_error'] = $e->getMessage();           
          }
        }

        $tags = array('all_type'=>$typeAccount,
                      'type'=>'Create',
                      'view'=>$view);

        $tags["template_js"][] = "accounts";
        $tags["template_css"][] = "";

        Vista::render('accounts', $tags);  
      break;
      case 'update':

        $id = Utils::getParam('id','',$this->data);
        $id = (!empty($id))?Utils::desencriptar($id):'';

        if(Utils::getParam('save') == 1){
          try{ 
            $campos = array('number'=>1,'name'=>1,'type'=>1,'desc'=>0);
            $data = $this->camposRequeridos($campos);
            $datos = array('NOMBRE'=>$data['name'],'CODTIPCTA'=>$data['type']);
             
            if(!empty($_GET['desc'])){
              $datos['CTADES'] = $_GET['desc'];
            }

            $GLOBALS['db']->beginTrans();
            if(!Modelo_ChartAccount::setUpdate($id,$datos)){
              throw new Exception('The account could not be edited, try again.');
            }
            $_SESSION['acfSession']['mostrar_exito'] = 'The account was successfully edited.';
            $GLOBALS['db']->commit();
            Utils::doRedirect(PUERTO.'://'.HOST.'/accountsList/');
          }
          catch(Exception $e){
            $GLOBALS['db']->rollback();
            $_SESSION['acfSession']['mostrar_error'] = $e->getMessage();           
          }
        }
        $accounts = Modelo_ChartAccount::getUpdate($id);
        $typeAccount = Modelo_TypeAccount::searchTypeAccount();
        $view = 'accountsUpdate';
        $tags = array('rows'=>$accounts,
                      'all_type'=>$typeAccount,
                      'type'=>'Update',
                      'view'=>$view);

        $tags["template_js"][] = "accounts";
        $tags["template_css"][] = "";

        Vista::render('accounts', $tags);
      break;
      case 'delete':

        $id = Utils::getParam('id','',$this->data);
        $id = (!empty($id))?Utils::desencriptar($id):'';

        if(Utils::getParam('save') == 1){
          try{ 
            
            $GLOBALS['db']->beginTrans();
            //verificar si es cuenta mayor y tiene cuentas auxiliares
            //if(!Modelo_ChartAccount::validarAux($id)){
              if(!Modelo_ChartAccount::delete($id)){
                throw new Exception('The account could not be deleted, try again.');
              }
              $_SESSION['acfSession']['mostrar_exito'] = 'The account was successfully delete.';
              $GLOBALS['db']->commit();
              Utils::doRedirect(PUERTO.'://'.HOST.'/accountsList/');
            /*}else{

            }*/
          }
          catch(Exception $e){
            $GLOBALS['db']->rollback();
            $_SESSION['acfSession']['mostrar_error'] = $e->getMessage();           
          }
        }
        $accounts = Modelo_ChartAccount::getUpdate($id);
        $typeAccount = Modelo_TypeAccount::searchTypeAccount();
        $view = 'accountsDelete';
        $tags = array('rows'=>$accounts,
                      'all_type'=>$typeAccount,
                      'type'=>'Delete',
                      'view'=>$view);

        $tags["template_js"][] = "accounts";
        $tags["template_css"][] = "";

        Vista::render('accounts', $tags);
      break;
      default:  
        $userid = $_SESSION['acfSession']['usuario']; 
        $usuario = Modelo_User::searchUsuario($userid);
        $chartAccount = Modelo_ChartAccount::searchChartAccount();
        $tags = array('one'=>$chartAccount,
                      'laid'=>$usuario['id_usuario'],
                      'username'=>$usuario['namesurname']);
        Vista::render('accountsList', $tags);
      break;
    }  
  }

  public function save($memorice){

    try{

      $GLOBALS['db']->beginTrans();

      $cont = Modelo_Seat::searchMaxCont()['suma']+1;   
      $bene = Modelo_Beneficiary::searchBeneficiary();
      //$benef = array_search($_POST['benef'],$bene);
      $seat = Modelo_TypeSeat::searchSeatType($_POST['_seleccion'])['seat'];

      $registros = count($_POST['codep']);
      $sum_db = $sum_cr = 0;
      for ($key = 0; $key < $registros; $key++) { 

        $db = $_POST['el_debit'][$key];
        $cr = $_POST['el_credit'][$key];

        $sum_db += str_replace(',', '', $db);
        $sum_cr += str_replace(',', '', $cr);

        if($cr > 0){
          $importe = '-'.$cr;
        }else{
          $importe = $db;
        }

        $concept = str_replace('"', '', $_POST['el_memo'][$key]);
        $concept = str_replace("'", '', $concept);

        $datos = array('IDCONT'=>$cont,'TIPO_ASI'=>$_POST['_seleccion'],'FECHA_ASI'=>date("Y-m-d", strtotime($_POST['date'])),'ASIENTO'=>$seat,'CONCEPTO'=>$concept,'CODID'=>$_POST['benef'],'DB'=>str_replace(',', '',$db),'CR'=>str_replace(',', '',$cr), 'ID_EMPRESA'=>$_SESSION['acfSession']['id_empresa'],'CODIGO'=>$_POST['_accountycode'][$key],'CODMOV'=>$_POST['codep'][$key],'CERRADO'=>(int)1,'TIPO'=>$_POST['el_type'][$key],'REFER'=>$_POST['el_ref'][$key],'GRUPOCON'=>$_POST['_trans'][$key],'IMPORTE'=>str_replace(',', '',$importe), 'DOCUMENTO'=>$_POST['el_documento'][$key], 'LIQUIDA_NO'=>$_POST['la_liq'][$key]); 
        
        if(!Modelo_Dpmovimi::insert($datos)){
          throw new Exception('Error creating the detail, try again.');
        }
      }
      
      $memo = str_replace('"', '', $_POST['_memo']);
      $memo = str_replace("'", '', $memo);

      $datos = array('IDCONT'=>$cont,'TIPO_ASI'=>$_POST['_seleccion'],'FECHA_ASI'=>date("Y-m-d", strtotime($_POST['date'])),'ASIENTO'=>$seat,'DESC_ASI'=>$memo,'BENEFICIAR'=>$bene[$_POST['benef']],'DEBITOS'=>$sum_db,'CREDITOS'=>$sum_cr,'USER_ID'=>$_SESSION['acfSession']['usuario'],'TIPO_MON'=>'DOL', 'CERRADO'=>(int)1, 'ID_EMPRESA'=>$_SESSION['acfSession']['id_empresa'],'FACTOR'=>'1', 'CEDRUC'=>$_POST['benef'], 'DOCUMENTO'=>$_POST['_documento'], 'LIQUIDA_NO'=>$_POST['_liq']);

      if($memorice == 1){
        $datos['MEMORICE'] = $memorice;
        $mensaje = 'The journal memoriced successfully.';
      }else{
        $mensaje = 'The journal saved successfully.';
      }

      if(!Modelo_Seat::insert($datos)){
        throw new Exception('Error creating the seat, try again.');
      }

      if(!Modelo_TypeSeat::increaseSeat($_POST['_seleccion'],$seat)){
        throw new Exception('The seat could not be updated, try again.');
      }
      
      $_SESSION['acfSession']['idCont'] = Utils::encriptar($cont);
      $_SESSION['acfSession']['mostrar_exito'] = "The journal saved successfully"; 
      $GLOBALS['db']->commit();

    }catch(Exception $e){
      $GLOBALS['db']->rollback();
      $_SESSION['acfSession']['mostrar_error'] = $e->getMessage();           
    }
    Utils::doRedirect(PUERTO.'://'.HOST.'/journalEntries/');
  }

  public function update($memorice){

    try{ 

      $GLOBALS['db']->beginTrans();

      $bene = Modelo_Beneficiary::searchBeneficiary();
      $cont =  Utils::desencriptar($_POST['idcont']);
      $seat_data = Modelo_Seat::searchJournal(false,false,$cont);
      $seat = $seat_data['ASIENTO'];
      $type_seat = $seat_data['TIPO_ASI'];
      
      if(!Modelo_Dpmovimi::deleteMovimi($cont)){
        throw new Exception('Error could not erase data.');
      }

      $registros = count($_POST['codep']);
      $sum_db = $sum_cr = 0;
      for ($key = 0; $key < $registros; $key++) { 

        $db = $_POST['el_debit'][$key];
        $cr = $_POST['el_credit'][$key];

        $sum_db += str_replace(',', '', $db);
        $sum_cr += str_replace(',', '', $cr);

        if($cr > 0){
          $importe = '-'.$cr;
        }else{
          $importe = $db;
        }

        $concept = str_replace('"', '', $_POST['el_memo'][$key]);
        $concept = str_replace("'", '', $concept);

        $datos = array('IDCONT'=>$cont,'TIPO_ASI'=>$type_seat,'FECHA_ASI'=>date("Y-m-d", strtotime($_POST['date'])),'ASIENTO'=>$seat,'CONCEPTO'=>$concept,'CODID'=>$_POST['benef'],'DB'=>str_replace(',', '', $db),'CR'=>str_replace(',', '', $cr), 'ID_EMPRESA'=>$_SESSION['acfSession']['id_empresa'],'CODIGO'=>$_POST['_accountycode'][$key],'CODMOV'=>$_POST['codep'][$key],'CERRADO'=>(int)1,'TIPO'=>$_POST['el_type'][$key],'REFER'=>$_POST['el_ref'][$key],'GRUPOCON'=>$_POST['_trans'][$key],'IMPORTE'=>str_replace(',', '', $importe), 'DOCUMENTO'=>$_POST['el_documento'][$key], 'LIQUIDA_NO'=>$_POST['la_liq'][$key]); 

        if(!Modelo_Dpmovimi::insert($datos)){
          throw new Exception('Error creating the detail, try again.');
        }
      }

      $memo = str_replace('"', '', $_POST['_memo']);
      $memo = str_replace("'", '', $memo);

      $datos = array('TIPO_ASI'=>$type_seat,'FECHA_ASI'=>date("Y-m-d", strtotime($_POST['date'])),'DESC_ASI'=>$memo,'BENEFICIAR'=>$bene[$_POST['benef']],'DEBITOS'=>$sum_db,'CREDITOS'=>$sum_cr,'USER_ID'=>$_SESSION['acfSession']['usuario'], 'ID_EMPRESA'=>$_SESSION['acfSession']['id_empresa'], 'CEDRUC'=>$_POST['benef'], 'DOCUMENTO'=>$_POST['_documento'], 'LIQUIDA_NO'=>$_POST['_liq']);

      if($memorice == 1){
        $datos['MEMORICE'] = $memorice;
        $mensaje = 'The Journal was successfully memorized.';
      }else{
        $mensaje = 'The Journal was successfully updated.';
      }

      if(!Modelo_Seat::updateJournal($cont,$datos)){
        throw new Exception('Error creating the seat, try again.');
      }

      $_SESSION['acfSession']['idCont'] = Utils::encriptar($cont);
      $_SESSION['acfSession']['mostrar_exito'] = $mensaje;
      $GLOBALS['db']->commit();
    }
    catch(Exception $e){
      $GLOBALS['db']->rollback();
      $_SESSION['acfSession']['mostrar_error'] = $e->getMessage();           
    }
    Utils::doRedirect(PUERTO.'://'.HOST.'/journalEntries/');
  }

  public static function template($type, $mod, $nombre_archivo, $company, $user, $datos, $movi, $accounts, $title,$trans, $bco, $cta, $ch){

    $name = $company['nombre_empresa'];
    $logo = $company['rentas_logo'];
    $date = date('F j, Y',strtotime($datos['FECHA_ASI']));  
    $memo = $datos['DESC_ASI'];
    $beneficiary = $datos['BENEFICIAR'];
    $formatter = new \NumberFormatter($_SESSION['acfSession']['locale'], \NumberFormatter::SPELLOUT);

    if($type == 'excel'){

      $objPHPExcel = new PHPExcel();
      $objReader = PHPExcel_IOFactory::createReader('Excel2007');
      $objPHPExcel = $objReader->load(FRONTEND_RUTA.'templates/'.$mod.'.xlsx');
      self::excels($objPHPExcel, $mod, $nombre_archivo, $user, $datos, $movi, $accounts, $title, $name, $logo, 
        $date, $memo, $beneficiary, $formatter,$trans, $bco, $cta, $ch);
    }else{

      $template = Modelo_Template::searchTemplate($mod);
      $header = $template['header'];
      $body = $template['body'];
      $footer = $template['footer'];

      $header = str_replace('_PRINT_DATE_', date('d/m/Y H:i:s'), $header);
      $header = str_replace('_LOGO_', $logo, $header);
      $header = str_replace('_COMPANY_', strtoupper($name), $header);
      $header = str_replace('_USER_', ucwords($user), $header);

      $table = '';
      $s1 = $s2 = 0;
      foreach ($movi as $key => $value) {

        $aux = trim(str_replace('.', '', $value['CODMOV']));

        $table .= '<tr>';
        $table .= '<td style="padding-top:5px; padding-bottom:2px;">'.$aux.'</td>';
        $table .= '<td style="padding-top:5px; padding-bottom:2px;">'.$accounts[$aux].'</td>';

        if($value['IMPORTE'] > 0){
          $debit = $value['importe_format'];
          $credit = '0.00';
          $s1 += str_replace(',','',$debit); 
        }else{
          $debit = '0.00';
          $credit = $value['importe_format'];
          $s2 += str_replace(',','',$credit); 
        }

        $table .= '<td align="right" style="padding-top:5px; padding-bottom:2px;">'.$_SESSION['acfSession']['simbolo'].$debit.'</td>';
        $table .= '<td align="right" style="padding-top:5px; padding-bottom:2px;">'.$_SESSION['acfSession']['simbolo'].$credit.'</td>';
        $table .= '<tr>';
      }

      $decimal = explode('.', $s1);
      if(count($decimal)>1){
        $decimal = $decimal[1];
      }else{
        $decimal = '00';
      }

      $numberAsString = $formatter->format($s1);
      $numberAsString = strtoupper($numberAsString).' '.$decimal.'/100 '.$_SESSION['acfSession']['code_iso'];

      $totals = $_SESSION['acfSession']['simbolo'].number_format($s1,2);

      $table .= '<tr><td colspan="2" align="right" style="border:0px;padding-top:5px; padding-bottom:2px;"><b>Totals:</b></td><td align="right" style="padding-top:5px; padding-bottom:2px;"><b>'.$_SESSION['acfSession']['simbolo'].number_format($s1,2).'</b></td><td align="right" style="padding-top:5px; padding-bottom:2px;"><b>'.$_SESSION['acfSession']['simbolo'].number_format($s2,2).'</b></td></tr>';

      $table_transaction = '<p align="center" style="font-size:16px;"><b>
            TRANSACTION DETAIL</b></p>
            <table width="100%" id="table1" border="1" style="border-collapse: collapse;font-size:11px; font-family:Arial;">
              <tr style="background: #ddd;">
                <td align="center" style="padding-top:5px; padding-bottom:2px;"><b>Document</b></td>
                <td align="center" style="padding-top:5px; padding-bottom:2px;"><b>Concept</b></td>
                <td align="center" style="padding-top:5px; padding-bottom:2px;"><b>To pay</b></td>
                <td align="center" style="padding-top:5px; padding-bottom:2px;"><b>Balance</b></td>
              </tr>
              _BODY2_
            </table>';

      if(count($trans) > 0){
        $body = str_replace('_TRANSACTION_', $table_transaction, $body);

        $table2 = '';
        $s3 = $s4 = 0;
        //foreach ($trans as $key => $value) {

          //$aux = trim(str_replace('.', '', $value['CODMOV']));

          $table2 .= '<tr>';
          $table2 .= '<td style="padding-top:5px; padding-bottom:2px;"></td>';
          $table2 .= '<td style="padding-top:5px; padding-bottom:2px;"></td>';

          /*if($value['IMPORTE'] > 0){
            $debit = $value['importe_format'];
            $credit = '0.00';
            $s3 += str_replace(',','',$debit); 
          }else{
            $debit = '0.00';
            $credit = $value['importe_format'];
            $s4 += str_replace(',','',$credit); 
          }*/

          $table2 .= '<td align="right" style="padding-top:5px; padding-bottom:2px;"></td>';
          $table2 .= '<td align="right" style="padding-top:5px; padding-bottom:2px;"></td>';
          $table2 .= '<tr>';
        //}

        /*$decimal = explode('.', $s3);
        if(count($decimal)>1){
          $decimal = $decimal[1];
        }else{
          $decimal = '00';
        }

        $numberAsString = $formatter->format($s1);
        $numberAsString = strtoupper($numberAsString).' '.$decimal.'/100 '.$_SESSION['acfSession']['code_iso'];

        $totals = $_SESSION['acfSession']['simbolo'].number_format($s3,2);*/

        $table2 .= '<tr><td colspan="2" align="right" style="border:0px;padding-top:5px; padding-bottom:2px;"><b>Totals:</b></td><td align="right" style="padding-top:5px; padding-bottom:2px;"><b></b></td><td align="right" style="padding-top:5px; padding-bottom:2px;"><b></b></td></tr>';

        $body = str_replace('_BODY2_', $table2, $body);
      }else{
        $body = str_replace('_TRANSACTION_', '', $body);
      }

      $body = str_replace('_BODY_', $table, $body);
      $body = str_replace('_TITLE_', $title, $body);
      $body = str_replace('_DATE_', strtoupper($date), $body);
      $body = str_replace('_MEMO_', strtoupper($memo), $body);

      if($mod == 'Template2'){
        $body = str_replace('_PROVIDER_', strtoupper($beneficiary), $body);
      }else{
        $body = str_replace('_BENEFICIARY_', strtoupper($beneficiary), $body);
        $body = str_replace('_AMOUNT_', $numberAsString, $body);
        $body = str_replace('_TOTALS_', $totals, $body);
      }

      $body = str_replace('_TURNED_', $bco, $body);
      $body = str_replace('_ACCOUNT_', $cta, $body);
      $body = str_replace('_CHECK_', $ch, $body);

      $mpdf = new mPDF('','A4');
      $mpdf->SetFont('Arial','B',30);
      $mpdf->setHTMLHeader($header); 
      $mpdf->setHTMLFooter($footer);

      $mpdf->AddPage('', '', '', '', '',
          6, // margin_left
          6, // margin right
          15, // margin top
          30, // margin bottom
          5, // margin header
          8); 

      $mpdf->WriteHTML($body);      
      $mpdf->Output($nombre_archivo.'.pdf', 'I');
    }
  }

  public static function outputExcel($title,$objExcel){
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$title.'.xlsx"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
    $objWriter->save('php://output');  
  }

  public static function excels($objPHPExcel, $mod, $nombre_archivo, $user, $datos, $movi, $accounts, $title, $name, $logo, $date, $memo, $beneficiary, $formatter, $trans, $bco, $cta, $ch){
    
    $objPHPExcel->getActiveSheet()->getPageMargins()->setTop(0.2);
    $objPHPExcel->getActiveSheet()->getPageMargins()->setRight(0.2);
    $objPHPExcel->getActiveSheet()->getPageMargins()->setLeft(0.3);
    $objPHPExcel->getActiveSheet()->getPageMargins()->setBottom(0.2);

    $styleArray = array(
      'font'  => array(
        'bold'  => true,              
        'size'  => 11,
        'name'  => 'Arial'
    ));

    // Indicamos que se pare en la hoja uno del libro
    $objPHPExcel->setActiveSheetIndex(0)->getStyle()->applyFromArray($styleArray);
    
    //A1-COMPANY
    $objPHPExcel->getActiveSheet()->SetCellValue('C1', strtoupper($name));

    //B3-USER
    $objPHPExcel->getActiveSheet()->SetCellValue('H2', ucwords($user));
    
    //B4-PRINT DATE
    $objPHPExcel->getActiveSheet()->SetCellValue('H4', date('d/m/Y H:i:s'));

    //G1-LOGO
    $objDrawing = new PHPExcel_Worksheet_Drawing(); 
    $objDrawing->setName('Logo'); 
    $objDrawing->setDescription('Logo'); 
    $objDrawing->setPath(FRONTEND_RUTA.'imagenes/'.$logo); 
    $objDrawing->setCoordinates('A1'); 

    $objDrawing->setWidth(75); 
    $objDrawing->setHeight(75); 
    $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

    $CStyle = array(
      'borders' => array(
        'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
      ),

    );  

    $styleArray2 = array(
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
      ),
      'font'  => array(
        'bold'  => true,              
        'size'  => 11,
        'name'  => 'Arial'
    ));

    $AmtStyle = array(            
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
      ),
      'font' => array(
        'bold'  => true,              
        'size'  => 12,
        'name'  => 'Arial'
      )
    );

    //A8-TITLE
    $objPHPExcel->setActiveSheetIndex()->getStyle('A8')->applyFromArray($styleArray);
    $objPHPExcel->getActiveSheet()->SetCellValue('A8', strtoupper($title));
    
    //B10-DATE Y B11 BENEFICIARY
    $objPHPExcel->getActiveSheet()->SetCellValue('B10', strtoupper($date));
    $objPHPExcel->getActiveSheet()->SetCellValue('B11', $beneficiary);

    if($mod == 'Template2'){

      //B12-MEMO
      $objPHPExcel->getActiveSheet()->SetCellValue('B12', strtoupper($memo));

      $cont = 18;

    }else{

      //B13-BANK
      $objPHPExcel->getActiveSheet()->SetCellValue('B13', strtoupper($bco));

      //E13-ACCOUNT
      $objPHPExcel->getActiveSheet()->SetCellValue('E13', strtoupper($cta));

      //I13-CHECK
      $objPHPExcel->getActiveSheet()->SetCellValue('I13', strtoupper($ch));

      //B14-MEMO
      $objPHPExcel->getActiveSheet()->SetCellValue('B14', strtoupper($memo));

      $cont = 20;
      $result = self::excel($objPHPExcel, $cont, $CStyle, $styleArray2, $trans);
      $objPHPExcel = $result['objPHPExcel'];
      $cont = $result['cont'];

    }
    
    $s1 = $s2 = 0;
    foreach ($movi as $key => $item) {

      $aux = trim(str_replace('.', '', $item['CODMOV']));

      $objPHPExcel->getActiveSheet()->mergeCells('B'.$cont.':F'.$cont);
      $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':I'.$cont)->applyFromArray($CStyle);
      $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$cont, $aux)->setCellValue('B'.$cont, $accounts[$aux]);

      if($item['IMPORTE'] > 0){
        $debit = $item['importe_format'];
        $credit = '0.00';
        $s1 += str_replace(',','',$debit); 
      }else{
        $debit = '0.00';
        $credit = $item['importe_format'];
        $s2 += str_replace(',','',$credit); 
      }

      $objPHPExcel->getActiveSheet()->mergeCells('G'.$cont.':H'.$cont);
      $objPHPExcel->getActiveSheet()->getStyle('G'.$cont.':I'.$cont)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
      $objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$cont, $_SESSION['acfSession']['simbolo'].number_format($debit,2))->setCellValue('I'.$cont, $_SESSION['acfSession']['simbolo'].number_format($credit,2));
      $cont++;      
    }

    $decimal = explode('.', $s1);
    if(count($decimal)>1){
      $decimal = $decimal[1];
    }else{
      $decimal = '00';
    }
      
    $numberAsString = $formatter->format($s1);
    $numberAsString = strtoupper($numberAsString).' '.$decimal.'/100 '.$_SESSION['acfSession']['code_iso'];
    $totals = 'BY.: '.$_SESSION['acfSession']['simbolo'].number_format($s1,2);

    if($mod != 'Template2'){

      //G11-TOTALS
      $objPHPExcel->getActiveSheet()->SetCellValue('G10', $totals);

      //B13-AMOUNT
      $objPHPExcel->getActiveSheet()->SetCellValue('B12', $numberAsString);
    }

    

    $objPHPExcel->getActiveSheet()->getStyle('B'.$cont)->applyFromArray($AmtStyle);
    $objPHPExcel->getActiveSheet()->mergeCells('B'.$cont.':F'.$cont);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$cont, 'Totals:');
    
    $objPHPExcel->getActiveSheet()->getStyle('G'.$cont.':I'.$cont)->applyFromArray($CStyle);
    $objPHPExcel->getActiveSheet()->getStyle('G'.$cont.':I'.$cont)->getAlignment()
    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('G'.$cont.':I'.$cont)->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('G'.$cont.':I'.$cont)->getFont()->setSize(10);
    $objPHPExcel->getActiveSheet()->mergeCells('G'.$cont.':H'.$cont);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$cont, $_SESSION['acfSession']['simbolo'].number_format($s1,2));
    $objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$cont, $_SESSION['acfSession']['simbolo'].number_format($s2,2));

    self::outputExcel($nombre_archivo,$objPHPExcel);
  }

  /*function excel1($objPHPExcel, $cont){

    return array('cont'=>$cont,'objPHPExcel'=>$objPHPExcel);
  }*/

  public static function excel($objPHPExcel, $cont, $CStyle, $styleArray2, $trans){

    if(count($trans) > 0){

      $cont = 16;
      $title2 = 'TRANSACTION DETAIL'; 
      $objPHPExcel->setActiveSheetIndex()->getStyle('A'.$cont)->applyFromArray($styleArray2);
      $objPHPExcel->getActiveSheet()->SetCellValue('A'.$cont, strtoupper($title2));

      $cont = $cont + 2;
      $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':I'.$cont)->getFont()->setBold(true);
      $objPHPExcel->getActiveSheet()->SetCellValue('A'.$cont, 'Document');
      $objPHPExcel->getActiveSheet()->SetCellValue('B'.$cont, 'Concept');
      $objPHPExcel->getActiveSheet()->SetCellValue('G'.$cont, 'To pay');
      $objPHPExcel->getActiveSheet()->SetCellValue('I'.$cont, 'Balance');

      $cont++;
      $s3 = $s4 = 0;
      foreach ($trans as $key => $t) {

        //$aux = trim(str_replace('.', '', $item['CODMOV']));


        $objPHPExcel->getActiveSheet()->mergeCells('B'.$cont.':F'.$cont);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':I'.$cont)->applyFromArray($CStyle);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$cont, '')->setCellValue('B'.$cont, '');

        /*if($item['IMPORTE'] > 0){
          $debit = $item['importe_format'];
          $credit = '0.00';
          $s1 += str_replace(',','',$debit); 
        }else{
          $debit = '0.00';
          $credit = $item['importe_format'];
          $s2 += str_replace(',','',$credit); 
        }*/
        $objPHPExcel->getActiveSheet()->mergeCells('G'.$cont.':H'.$cont);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$cont, '')->setCellValue('I'.$cont, '');
        $cont++;      
      }
      $cont++;

      $title3 = 'SEAT DETAIL';

      $objPHPExcel->getActiveSheet()->mergeCells('A'.$cont.':I'.$cont);
      $objPHPExcel->setActiveSheetIndex()->getStyle('A'.$cont)->applyFromArray($styleArray2);
      $objPHPExcel->getActiveSheet()->SetCellValue('A'.$cont, strtoupper($title3));
      
      $cont = $cont + 2; 

      $styleArray = array(
        'font'  => array(
          'bold'  => true,              
          'size'  => 11,
          'name'  => 'Arial'
        ),
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ),
        'borders' => array(
          'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        ),
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'dddddd')
        ),
      );


      $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':I'.$cont)->applyFromArray($styleArray);
      $objPHPExcel->getActiveSheet()->SetCellValue('A'.$cont, 'Account');
      $objPHPExcel->getActiveSheet()->mergeCells('B'.$cont.':F'.$cont);
      $objPHPExcel->getActiveSheet()->SetCellValue('B'.$cont, 'Name');
      $objPHPExcel->getActiveSheet()->mergeCells('G'.$cont.':H'.$cont);
      $objPHPExcel->getActiveSheet()->SetCellValue('G'.$cont, 'Debit');
      $objPHPExcel->getActiveSheet()->SetCellValue('I'.$cont, 'Credit');

      $cont++;
    }

    return array('cont'=>$cont,'objPHPExcel'=>$objPHPExcel);
  }

}  
?>