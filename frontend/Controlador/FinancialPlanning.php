<?php
class Controlador_FinancialPlanning extends Controlador_Reports {

  public $item = 23;
  
  public function construirPagina(){
    $tags = array();    
    if(!Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/login.php");
    } 
    $action = Utils::getParam('action','',$this->data);

    switch($action){         
      default:    
        $tags["results"] = Modelo_ChartAccount::searchAccountsAct();
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->item];
        // $tags["template_js"][] = "";
        Vista::render('financialplanning',$tags);
      break;
    }
    
  }

}
?>