<?php
class Controlador_Accounts extends Controlador_Base {
  
  public function construirPagina(){
  
    $tags = array();    
 
    if(!Utils::estaLogueado()){
      header("Location: ".PUERTO."://".PREVIOUS_SYSTEM."login.php");
    } 

    if(!empty($_SESSION['id_empresa'])){
      $_SESSION['acfSession']['id_empresa'] = $_SESSION['id_empresa'];
    }

    $_SESSION['acfSession']['rule'] = PUERTO.'://'.HOST.'/journalReport';
    $opcion = Utils::getParam('opcion','',$this->data); 
    $item = Utils::getParam('item','',$this->data); 

    switch($opcion){
      case 'deleteMemorice':
        $id = Utils::getParam('id', '', $this->data); 
        $id = Utils::desencriptar($id);
        $datos = array('MEMORICE'=>0);
        $journal = Modelo_Seat::updateJournal($id,$datos);
        $_SESSION['acfSession']['mostrar_exito'] = 'The journal was removed from the memorized.';
        Utils::doRedirect(PUERTO.'://'.HOST.'/journalEntries/');
      break;
      case 'journalReport':

        $tipo = Utils::getParam('tipo','',$this->data);
        $idcont = Utils::getParam('idcont','',$this->data);
        $nombre_archivo = 'journal_'.$idcont.'_'.date('mdY');

        if($tipo == 'excel'){

          $objPHPExcel = new PHPExcel();
          /*$objPHPExcel->getProperties()
            ->setCreator("Lcda. Mariana Vera")
            ->setTitle("activities List")
            ->setSubject("activities List")
            ->setCategory("activities List");

            $BStyle = array(
            'borders' => array(
                'allborders' => array(
                  'style' => PHPExcel_Style_Border::BORDER_THIN
                )
             ),
          );

          $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

          $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
          $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(80);
          $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(90);

          $objPHPExcel->getActiveSheet()->mergeCells('A1:B1'); 
          $objDrawing = new PHPExcel_Worksheet_Drawing(); 
          $objDrawing->setName('Logo'); 
          $objDrawing->setDescription('Logo'); 
          $objDrawing->setPath(FRONTEND_RUTA.'imagenes/logoinicial.jpg'); 
          $objDrawing->setCoordinates('B1'); 

          //setOffsetX works properly 
          $objDrawing->setOffsetX(360); 
          $objDrawing->setOffsetY(5); 
          //set width, height 
          $objDrawing->setWidth(110); 
          $objDrawing->setHeight(110); 
          $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

          $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue('A1', 'ACTIVITIES LIST');

          $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true); 

          $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue('A2', 'CODE')
              ->setCellValue('B2', 'NAMES')
              ;

          $objPHPExcel->getActiveSheet()->getStyle('A2:B2')->getFont()->setBold(true);
          $objPHPExcel->getActiveSheet()->getStyle('A2:B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
          $objPHPExcel->getActiveSheet()->getStyle('A2:B2')->applyFromArray($BStyle);
          $objPHPExcel->getActiveSheet()->getStyle('A2:B2')->getFill()
            ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()->setRGB('808080');

          $cont = 3;

          $styleArray = array(
              'font' => array(
                  'bold' => true,
              ),
              'alignment' => array(
                  'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
              ),
          );

          foreach ($activities as $key => $item) {

            $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':B'.$cont)->applyFromArray($BStyle);
            $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':B'.$cont)->applyFromArray($styleArray);
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$cont, $item['CODIGO'])
            ->setCellValue('B'.$cont, $item['NOMBRE'])
            ;

            $cont++;      
          }*/

          // indicar que se envia un archivo de Excel.
          header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          header('Content-Disposition: attachment;filename="'.$nombre_archivo.'.xlsx"');
          header('Cache-Control: max-age=0');
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
          $objWriter->save('php://output');
        
        }else{

          $pdf = new FPDF();
       
          /*$pdf->AddPage();
          $y_axis_initial = 25;
           $pdf->SetFont('Arial','B',12);
          $pdf->Cell(189  ,10,'',0,1);//end of line

          $pdf->Image(FRONTEND_RUTA.'imagenes/logoinicial.jpg', 139,10,50,26,'JPG');
          $pdf->Cell(59,5,'ACTIVITIES LIST',0,1);//end of line
          $pdf->Cell(189,10,'',0,1); //end of line
          $pdf->SetFont('Arial','B',12);
          $pdf->Ln(6);

          $pdf->SetFillColor(128,128,128);
          $pdf->Cell(50,6,'CODES',1,0,'C',1);
          $pdf->Cell(135,6,'NAMES',1,0,'C',1);
          $pdf->Ln(6);

          $pdf->SetFillColor(255,255,255);
          foreach ($activities as $key => $item) {
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(50,6,$item['CODIGO'],1,0,'L',1);
            $pdf->Cell(135,6,$item['NOMBRE'],1,0,'L',1);    
            $pdf->Ln(6);
          }*/

          $pdf->Output($nombre_archivo.'.pdf','D');
        }

        /*$id = Utils::getParam('id', '', $this->data); 
        $id = Utils::desencriptar($id);
        $journal = Modelo_Seat::deleteJournal($id);
        $movi = Modelo_Dpmovimi::deleteMovimi($id);
        $_SESSION['acfSession']['mostrar_exito'] = 'The journal was successfully deleted.';
        Utils::doRedirect(PUERTO.'://'.HOST.'/journalEntries/');*/
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
        Vista::renderJSON(array('journal' => $journal, 'movi'=>$movi, 'rule'=>$_SESSION['acfSession']['rule'], 'permission'=>$_SESSION['acfSession']['permission'][$item]));
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

        $sum_db += $db;
        $sum_cr += $cr;

        if($cr > 0){
          $importe = '-'.$cr;
        }else{
          $importe = $db;
        }

        $concept = str_replace('"', '', $_POST['el_memo'][$key]);
        $concept = str_replace("'", '', $concept);

        $datos = array('IDCONT'=>$cont,'TIPO_ASI'=>$_POST['_seleccion'],'FECHA_ASI'=>date("Y-m-d", strtotime($_POST['date'])),'ASIENTO'=>$seat,'CONCEPTO'=>$concept,'CODID'=>$_POST['benef'],'DB'=>$db,'CR'=>$cr, 'ID_EMPRESA'=>$_SESSION['acfSession']['id_empresa'],'CODIGO'=>$_POST['_accountycode'][$key],'CODMOV'=>$_POST['codep'][$key],'CERRADO'=>(int)1,'TIPO'=>$_POST['el_type'][$key],'REFER'=>$_POST['el_ref'][$key],'GRUPOCON'=>$_POST['_trans'][$key],'IMPORTE'=>$importe, 'DOCUMENTO'=>$_POST['el_documento'][$key], 'LIQUIDA_NO'=>$_POST['la_liq'][$key]); 
        
        if(!Modelo_Dpmovimi::insert($datos)){
          throw new Exception('Error creating the detail, try again.');
        }
      }
      
      $sum_db = str_replace(',', '', $sum_db);
      $sum_cr = str_replace(',', '', $sum_cr);
      $memo = str_replace('"', '', $_POST['_memo']);
      $memo = str_replace("'", '', $memo);

      $datos = array('IDCONT'=>$cont,'TIPO_ASI'=>$_POST['_seleccion'],'FECHA_ASI'=>date("Y-m-d", strtotime($_POST['date'])),'ASIENTO'=>$seat,'DESC_ASI'=>$memo,'BENEFICIAR'=>$bene[$_POST['benef']],'DEBITOS'=>$sum_db,'CREDITOS'=>$sum_cr,'USER_ID'=>$_SESSION['acfSession']['usuario'],'TIPO_MON'=>'DOL', 'CERRADO'=>(int)1, 'ID_EMPRESA'=>$_SESSION['acfSession']['id_empresa'],'FACTOR'=>'1', 'CEDRUC'=>$_POST['benef'], 'DOCUMENTO'=>$_POST['_documento'], 'LIQUIDA_NO'=>$_POST['_liq']);

      if($memorice == 1){
        $datos['MEMORICE'] = $memorice;
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
    //print_r($_SESSION); exit;
    Utils::doRedirect(PUERTO.'://'.HOST.'/journalEntries/');
  }

  public function update($memorice){

    try{ 

      $GLOBALS['db']->beginTrans();

      $bene = Modelo_Beneficiary::searchBeneficiary();
      //$benef = array_search($_POST['benef'],$bene);
      $cont =  Utils::desencriptar($_POST['idcont']);
      $seat = $_POST['_actual'];
      
      if(!Modelo_Dpmovimi::deleteMovimi($cont)){
        throw new Exception('Error could not erase data.');
      }

      $registros = count($_POST['codep']);
      $sum_db = $sum_cr = 0;
      for ($key = 0; $key < $registros; $key++) { 

        $db = $_POST['el_debit'][$key];
        $cr = $_POST['el_credit'][$key];

        $sum_db += $db;
        $sum_cr += $cr;

        if($cr > 0){
          $importe = '-'.$cr;
        }else{
          $importe = $db;
        }

        $concept = str_replace('"', '', $_POST['el_memo'][$key]);
        $concept = str_replace("'", '', $concept);

        $datos = array('IDCONT'=>$cont,'TIPO_ASI'=>$_POST['_seleccion'],'FECHA_ASI'=>date("Y-m-d", strtotime($_POST['date'])),'ASIENTO'=>$seat,'CONCEPTO'=>$concept,'CODID'=>$_POST['benef'],'DB'=>$db,'CR'=>$cr, 'ID_EMPRESA'=>$_SESSION['acfSession']['id_empresa'],'CODIGO'=>$_POST['_accountycode'][$key],'CODMOV'=>$_POST['codep'][$key],'CERRADO'=>(int)1,'TIPO'=>$_POST['el_type'][$key],'REFER'=>$_POST['el_ref'][$key],'GRUPOCON'=>$_POST['_trans'][$key],'IMPORTE'=>$importe, 'DOCUMENTO'=>$_POST['el_documento'][$key], 'LIQUIDA_NO'=>$_POST['la_liq'][$key]); 

        if(!Modelo_Dpmovimi::insert($datos)){
          throw new Exception('Error creating the detail, try again.');
        }
      }

      $sum_db = str_replace(',', '', $sum_db);
      $sum_cr = str_replace(',', '', $sum_cr);

      $memo = str_replace('"', '', $_POST['_memo']);
      $memo = str_replace("'", '', $memo);

      $datos = array('TIPO_ASI'=>$_POST['_seleccion'],'FECHA_ASI'=>date("Y-m-d", strtotime($_POST['date'])),'DESC_ASI'=>$memo,'BENEFICIAR'=>$bene[$_POST['benef']],'DEBITOS'=>$sum_db,'CREDITOS'=>$sum_cr,'USER_ID'=>$_SESSION['acfSession']['usuario'], 'ID_EMPRESA'=>$_SESSION['acfSession']['id_empresa'], 'CEDRUC'=>$_POST['benef'], 'DOCUMENTO'=>$_POST['_documento'], 'LIQUIDA_NO'=>$_POST['_liq']);

      if($memorice == 1){
        $datos['MEMORICE'] = $memorice;
      }

      if(!Modelo_Seat::updateJournal($cont,$datos)){
        throw new Exception('Error creating the seat, try again.');
      }

      $_SESSION['acfSession']['idCont'] = Utils::encriptar($cont);
      $_SESSION['acfSession']['mostrar_exito'] = 'The Journal was successfully updated.';
      $GLOBALS['db']->commit();
    }
    catch(Exception $e){
      $GLOBALS['db']->rollback();
      $_SESSION['acfSession']['mostrar_error'] = $e->getMessage();           
    }
    //print_r($_SESSION); exit;
    Utils::doRedirect(PUERTO.'://'.HOST.'/journalEntries/');
  }
}  
?>