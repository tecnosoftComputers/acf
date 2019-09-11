<?php
class Controlador_ReportIncomeStatement extends Controlador_Reports {

  public $item = 43;

  public function construirPagina(){ 
    $tags = array();    
    if(!Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/login.php");
    } 
    $action = Utils::getParam('action','',$this->data);
    switch($action){   

      default:  
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->item];
        $tags["template_js"][] = "reports";     
        Vista::render('rpt_acc_incomestatement', $tags);       
      break;	
    }
  }

}
?>