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

    $opcion = Utils::getParam('opcion','',$this->data); 
    switch($opcion){
      case 'deleteMemorice':
        $id = Utils::getParam('id', '', $this->data); 
        $id = Utils::desencriptar($id);
        $datos = array('MEMORICE'=>0);
        $journal = Modelo_Seat::updateJournal($id,$datos);
        $_SESSION['acfSession']['mostrar_exito'] = 'The journal was removed from the memorized';
        Utils::doRedirect(PUERTO.'://'.HOST.'/journalEntries/');
      break;
      case 'deleteJournal':
        $id = Utils::getParam('id', '', $this->data); 
        $id = Utils::desencriptar($id);
        $journal = Modelo_Seat::deleteJournal($id);
        $movi = Modelo_Dpmovimi::deleteMovimi($id);
        Utils::doRedirect(PUERTO.'://'.HOST.'/journalEntries/');
      break;
      case 'annulJournal':
        $id = Utils::getParam('id', '', $this->data); 
        $id = Utils::desencriptar($id);
        $datos = array('ANULADO'=>1,'FECHAANU'=>date('Y-m-d'),'HORAANU'=>date('h:i:s'),'USUANU'=>$_SESSION['acfSession']['usuario']);
        $journal = Modelo_Seat::updateJournal($id,$datos);
        Utils::doRedirect(PUERTO.'://'.HOST.'/journalEntries/');
      break;
      case 'searchJournal':
        $id = Utils::getParam('id', '', $this->data); 
        $type = Utils::getParam('type', '', $this->data); 
        $range = Utils::getParam('range', '', $this->data); 
        $movi = array();

        if($type == ''){
          $id = Utils::desencriptar($id);
          $type = false;     
        }

        if(empty($range[0])){
          $range = array('All');
        }

        $journal = Modelo_Seat::searchJournal($type,$range,$id);
        $movi = Modelo_Dpmovimi::searchMovimi($type,$id);
        Vista::renderJSON(array('journal' => $journal, 'movi'=>$movi));
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
                      'typeTrans'=>$typeTrans
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
      $benef = array_search($_POST['benef'],$bene);
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

        $datos = array('IDCONT'=>$cont,'TIPO_ASI'=>$_POST['_seleccion'],'FECHA_ASI'=>date("Y-m-d", strtotime($_POST['date'])),'ASIENTO'=>$seat,'CONCEPTO'=>$_POST['el_memo'][$key],'CODID'=>$benef,'DB'=>$db,'CR'=>$cr, 'ID_EMPRESA'=>$_SESSION['acfSession']['id_empresa'],'CODIGO'=>$_POST['_accountycode'][$key],'CODMOV'=>$_POST['codep'][$key],'CERRADO'=>(int)1,'TIPO'=>$_POST['el_type'][$key],'REFER'=>$_POST['el_ref'][$key],'GRUPOCON'=>$_POST['_trans'][$key],'IMPORTE'=>$importe); 
        
        if(!Modelo_Dpmovimi::insert($datos)){
          throw new Exception('Error creating the detail, try again.');
        }
      }

      $datos = array('IDCONT'=>$cont,'TIPO_ASI'=>$_POST['_seleccion'],'FECHA_ASI'=>date("Y-m-d", strtotime($_POST['date'])),'ASIENTO'=>$seat,'DESC_ASI'=>$_POST['_memo'],'BENEFICIAR'=>$_POST['benef'],'DEBITOS'=>$sum_db,'CREDITOS'=>$sum_cr,'USER_ID'=>$_SESSION['acfSession']['usuario'],'TIPO_MON'=>'DOL', 'CERRADO'=>(int)1, 'ID_EMPRESA'=>$_SESSION['acfSession']['id_empresa'],'FACTOR'=>'1', 'CEDRUC'=>$benef);

      if($memorice == 1){
        $datos['MEMORICE'] = $memorice;
      }

      if(!Modelo_Seat::insert($datos)){
        throw new Exception('Error creating the seat, try again.');
      }

      if(!Modelo_TypeSeat::increaseSeat($_POST['_seleccion'],$seat)){
        throw new Exception('The seat could not be updated, try again.');
      }
      
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
      $benef = array_search($_POST['benef'],$bene);
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

        $datos = array('IDCONT'=>$cont,'TIPO_ASI'=>$_POST['_seleccion'],'FECHA_ASI'=>date("Y-m-d", strtotime($_POST['date'])),'ASIENTO'=>$seat,'CONCEPTO'=>$_POST['el_memo'][$key],'CODID'=>$benef,'DB'=>$db,'CR'=>$cr, 'ID_EMPRESA'=>$_SESSION['acfSession']['id_empresa'],'CODIGO'=>$_POST['_accountycode'][$key],'CODMOV'=>$_POST['codep'][$key],'CERRADO'=>(int)1,'TIPO'=>$_POST['el_type'][$key],'REFER'=>$_POST['el_ref'][$key],'GRUPOCON'=>$_POST['_trans'][$key],'IMPORTE'=>$importe); 

        if(!Modelo_Dpmovimi::insert($datos)){
          throw new Exception('Error creating the detail, try again.');
        }
      }

      $datos = array('TIPO_ASI'=>$_POST['_seleccion'],'FECHA_ASI'=>date("Y-m-d", strtotime($_POST['date'])),'DESC_ASI'=>$_POST['_memo'],'BENEFICIAR'=>$_POST['benef'],'DEBITOS'=>number_format($sum_db, 2),'CREDITOS'=>number_format($sum_cr, 2),'USER_ID'=>$_SESSION['acfSession']['usuario'], 'ID_EMPRESA'=>$_SESSION['acfSession']['id_empresa'], 'CEDRUC'=>$benef, 'ANULADO'=>0);

      if($memorice == 1){
        $datos['MEMORICE'] = $memorice;
      }

      if(!Modelo_Seat::updateJournal($cont,$datos)){
        throw new Exception('Error creating the seat, try again.');
      }

      $_SESSION['acfSession']['mostrar_exito'] = 'The Journal was successfully updated.';
      $GLOBALS['db']->commit();
    }
    catch(Exception $e){
      $GLOBALS['db']->rollback();
      $_SESSION['acfSession']['mostrar_error'] = $e->getMessage();           
    }
    Utils::doRedirect(PUERTO.'://'.HOST.'/journalEntries/');
  }
}  
?>