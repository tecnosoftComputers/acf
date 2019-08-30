<?php
class Controlador_ReportJournalSummary extends Controlador_Reports {

  public function construirPagina(){   
  	$tags = array();    
    if(!Utils::estaLogueado()){
      header("Location: ../login.php");
    } 
    $action = Utils::getParam('action','',$this->data);
    switch($action){ 
      default:	
        $tags["template_js"][] = "reports";     
        Vista::render('rpt_acc_journalsummary', $tags);  	
      break;  
    }
  }	
}
?>