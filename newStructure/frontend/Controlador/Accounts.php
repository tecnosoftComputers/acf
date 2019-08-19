<?php
class Controlador_Accounts extends Controlador_Base {
  
  public function construirPagina(){
  
    $tags = array();    

    if(!Utils::estaLogueado()){
      header("Location: ../login.php");
    } 

    $opcion = Utils::getParam('opcion','',$this->data); 
    switch($opcion){
      case 'journalEntries': 

        $userid = $_SESSION['usuario'];
        $one = Modelo_ChartAccount::searchChartAccount();
        $fetch_dp = Modelo_TypeSeat::searchSeat();
        $data_last = Modelo_Seat::searchLastSeat()['final'];
        $asi = Modelo_Dpmovimi::searchMinSeat()['minimo'];
        $bene = Modelo_Beneficiary::searchBeneficiary();
        $all_send = Modelo_Dpmovimi::search();

        // Rueda transaccional
        $fav = Modelo_Dpmovimi::searchMaxAux()['favorito'];

        if ($fav == "" || $fav == 0) {
          $lande = 1;
          $land = str_pad($lande,8, "0", STR_PAD_LEFT);
        }else{
          $lande = $fav+1;
          $land = str_pad($lande,8, "0", STR_PAD_LEFT);
        }

        $fila = 1;
        $tags = array('userid'=>$userid,
                      'one'=>$one,
                      'fetch_dp'=>$fetch_dp,
                      'data_last'=>$data_last,
                      'all_send'=>$all_send,
                      'asi'=>$asi,
                      'bene'=>$bene,
                      'fav'=>$fav,
                      'land'=>$land,
                      'lande'=>$lande,
                      'fila'=>$fila,
                      'tip'=>'EGRE'
                    );

        $tags["template_js"][] = "journalEntries";
        $tags["template_css"][] = "";

        Vista::render('journalEntries', $tags);  
      break;
      case 'saveJournal':
        try{

          $GLOBALS['db']->beginTrans();

          echo '<br>'.$numero_secuencial = Modelo_Dpmovimi::searchSequential()['ultimo'];      
          echo '<br>'.$cont = Modelo_Seat::searchMaxCont()['suma'];   

          $datos = array('TIPO_ASI'=>$_POST['_seleccion'],'FECHA_ASI'=>date("Y-m-d", strtotime($_POST['date'])),'ASIENTO'=>$_POST['number'],'CONCEPTO'=>$_POST['_memo'],'BENEFICIAR'=>$_POST['benef'],'AUX'=>$_POST['fav'],'ESTADO'=>'I','SECUENCIAL'=>$numero_secuencial,'DB'=>1,'CR'=>0);

          if(!Modelo_Dpmovimi::insert($datos)){
            throw new Exception('Error creating the seat, try again.');
          }

          $registros = count($_POST['_accountycode']);

          for ($key = 0; $key < $registros; $key++) { 

            $datos = array('TIPO_ASI'=>$_POST['_seleccion'],'FECHA_ASI'=>date("Y-m-d", strtotime($_POST['date'])),'ASIENTO'=>$_POST['number'],'DESC_ASI'=>$_POST['el_memo'][$key],'BENEFICIAR'=>$_POST['benef'],'DEBITOS'=>$_POST['el_debit'][$key],'CREDITOS'=>$_POST['el_credit'][$key],'IDCONT'=>$cont+($key+1),'account_aux'=>$_POST['_accountycode'][$key],'account_n_aux'=>$_POST['_accountyname'][$key]); 

            if(!Modelo_Seat::insert($datos)){
              throw new Exception('Error creating the seat, try again.');
            }
          }

          if(!Modelo_TypeSeat::increaseSeat($_POST['_seleccion'],$_POST['_actual'])){
            throw new Exception('The seat could not be updated, try again.');
          }
          
          $_SESSION['mostrar_exito'] = "The journal saved successfully"; 
          $GLOBALS['db']->commit();
          Utils::doRedirect(PUERTO.'://'.HOST.'/journalEntries/');

        }catch(Exception $e){
          $GLOBALS['db']->rollback();
          $_SESSION['mostrar_error'] = $e->getMessage();           
        }
      break;
      case 'memoriceJournal':
      break;
      case 'updateJournal':
      break;
      case 'deleteJournal':
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
        $types = Modelo_Seat::searchSeat($type);
        Vista::renderJSON(array('number' => $types));
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
            $_SESSION['mostrar_exito'] = 'The account was successfully created.';
            $GLOBALS['db']->commit();
            Utils::doRedirect(PUERTO.'://'.HOST.'/accountsList/');
          }
          catch(Exception $e){
            $GLOBALS['db']->rollback();
            $_SESSION['mostrar_error'] = $e->getMessage();           
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
            $_SESSION['mostrar_exito'] = 'The account was successfully edited.';
            $GLOBALS['db']->commit();
            Utils::doRedirect(PUERTO.'://'.HOST.'/accountsList/');
          }
          catch(Exception $e){
            $GLOBALS['db']->rollback();
            $_SESSION['mostrar_error'] = $e->getMessage();           
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
              $_SESSION['mostrar_exito'] = 'The account was successfully delete.';
              $GLOBALS['db']->commit();
              Utils::doRedirect(PUERTO.'://'.HOST.'/accountsList/');
            /*}else{

            }*/
          }
          catch(Exception $e){
            $GLOBALS['db']->rollback();
            $_SESSION['mostrar_error'] = $e->getMessage();           
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
        $userid = $_SESSION['usuario']; 
        $usuario = Modelo_User::searchUsuario($userid);
        $chartAccount = Modelo_ChartAccount::searchChartAccount();
      	$tags = array('one'=>$chartAccount,
                      'laid'=>$usuario['id_usuario'],
                      'username'=>$usuario['namesurname']);
        Vista::render('accountsList', $tags);
      break;
    }
    
  }
}  
?>