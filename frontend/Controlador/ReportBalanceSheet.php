<?php
class Controlador_ReportBalanceSheet extends Controlador_Reports {
  
  public function construirPagina(){   

    $tags = array();    
    if(!Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/login.php");
    } 
    $action = Utils::getParam('action','',$this->data);
    switch($action){                            
      case 'search':                
      break;  
      case 'pdf':
      break;
      case 'excel':
      break;
      default:         
        $tags["template_js"][] = "reports";     
        Vista::render('rpt_acc_balancesheet', $tags); 
      break;
    }
    
  }
}
?>