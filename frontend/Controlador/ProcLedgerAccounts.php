<?php
class Controlador_ProcLedgerAccounts extends Controlador_Reports {

  public $item = 51;
  
  public function construirPagina(){   

    $tags = array();    
    if(!Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/login.php");
    } 
    $action = Utils::getParam('action','',$this->data);
    switch($action){ 
      case 'changeLedgerAccounts':
        $prevaccount = Utils::getParam('prevaccount', '', $this->data);
        $newaccount = Utils::getParam('newaccount', '', $this->data);
        $this->changeLedgerAccounts($prevaccount, $newaccount);
      break;                           
      default:    
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->item];
        $listAccounts = Modelo_ChartAccount::searchAccountsAct();
        $tags["listAccounts"] = $listAccounts;
        $tags["template_js"][] = "reports";  
        Vista::render('proc_ledgeraccount', $tags); 
      break;
    }
    
  }

  public function changeLedgerAccounts($prevaccount, $newaccount){
    try {
      // if account exist or if account is not detail validate
        if(!Modelo_ChartAccount::searchAccountsAct($prevaccount,1)){
          throw new Exception("The prev account: ".$prevaccount." do not exist or not is a detail account. Please check it out and try again."); 
        }
        if(!Modelo_ChartAccount::searchAccountsAct($newaccount,1)){
          throw new Exception("The new account ".$newaccount." do not exist or not is a detail account. Please check it out and try again."); 
        }

      $result = Modelo_Dpmovimi::changeMovimiUpd($_SESSION['acfSession']['id_empresa'],$prevaccount,$newaccount);
      $rowsaffected = $GLOBALS['db']->rows_affected();
      if(!$result){
        throw new Exception("Has ocurred an error.");
      }
      $_SESSION['acfSession']['mostrar_exito'] = 'The accounts were successfully edited. Rows affected: '.$rowsaffected;
    } catch (Exception $e) {
      $_SESSION['acfSession']['mostrar_error'] = $e->getMessage();
      Utils::doRedirect(PUERTO.'://'.HOST.'/proccess/ledgeraccount/');
    }
    
    Utils::doRedirect(PUERTO.'://'.HOST.'/proccess/ledgeraccount/');
  }
}
?>