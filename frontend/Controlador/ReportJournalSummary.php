<?php
class Controlador_ReportJournalSummary extends Controlador_Reports {

  public function construirPagina(){   
  	$tags = array();    
    if(!Utils::estaLogueado()){
      header("Location: ../login.php");
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
        $type_report = Utils::getParam('typereport','R',$this->data);
        $tags["accfrom"] = $accfrom;
        $tags["accto"] = $accto;
        $tags["datefrom"] = $aux_datefrom;
        $tags["dateto"] = $aux_dateto;
        $tags["dbdatefrom"] = strtotime($datefrom);
        $tags["dbdateto"] = strtotime($dateto);       
        $tags["typereport"] = $typereport;
        if ($typereport == "R"){
          $tags["results"] = Modelo_Dpmovimi::reportSummaryR($_SESSION['acfSession']['id_empresa'],
                                                             $datefrom,$dateto,$ccfrom,$ccto); 
        }
        else{
          $tags["results"] = Modelo_Dpmovimi::reportSummaryD($_SESSION['acfSession']['id_empresa'],
                                                             $datefrom,$dateto,$ccfrom,$ccto); 
        }
        $tags["template_js"][] = "reports";     
        Vista::render('rpt_acc_journalsummary', $tags);  
      break; 
      default:	
        $tags["template_js"][] = "reports";     
        Vista::render('rpt_acc_journalsummary', $tags);  	
      break;  
    }
  }	
}
?>