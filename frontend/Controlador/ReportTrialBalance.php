<?php
class Controlador_ReportTrialBalance extends Controlador_Reports {

  public $module = 35;

  public function construirPagina(){ 

  	if(!Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/login.php");
    } 

    $action = Utils::getParam('action','',$this->data);
    switch($action){
      case 'search':
        $accfrom = Utils::getParam('accfrom','',$this->data);
        $accto = Utils::getParam('accto','',$this->data);
        $aux_datefrom = Utils::getParam('datefrom','',$this->data);
        $datefrom = (!empty($aux_datefrom)) ? date("Y-m-d", strtotime($aux_datefrom)) : date('Y-m-d');
        $aux_dateto = Utils::getParam('dateto','',$this->data);
        $dateto = (!empty($aux_dateto)) ? date("Y-m-d", strtotime($aux_dateto)) : date('Y-m-d');
        $ccfrom = (!empty($accfrom)) ? Modelo_ChartAccount::getIndAux($accfrom)["CODIGO"]: '';
        $ccto = (!empty($accto)) ? Modelo_ChartAccount::getIndAux($accto)["CODIGO"] : '';        
        $tags["accfrom"] = $accfrom;
        $tags["accto"] = $accto;
        $tags["datefrom"] = $aux_datefrom;
        $tags["dateto"] = $aux_dateto;
        $tags["dbdatefrom"] = strtotime($datefrom);
        $tags["dbdateto"] = strtotime($dateto);       
        $tags["results"] = Modelo_Dpmovimi::reportTrialBalance($_SESSION['acfSession']['id_empresa'],
                                                               $datefrom,$dateto,$ccfrom,$ccto); 
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->module];
        $tags["template_js"][] = "reports";        
        Vista::render('rpt_acc_trialbalance', $tags);
      break;
      default:          
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->module];
        $tags["template_js"][] = "reports";        
        Vista::render('rpt_acc_trialbalance', $tags);       
      break;
    }
  }	
}
?>