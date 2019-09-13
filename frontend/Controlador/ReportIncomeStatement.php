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
      case 'search':
        $aux_dateto = Utils::getParam('dateto','',$this->data);
        $dateto = (!empty($aux_dateto)) ? date("Y-m-d", strtotime($aux_dateto)) : date('Y-m-d');        
        $acclevel = Utils::getParam('acclevel',$this->maxlevel,$this->data);        
        $typereport = Utils::getParam('typereport','A',$this->data);
        $types_account = Modelo_Dasbal::getParams();              
        $tags["dateto"] = $aux_dateto;        
        $tags["dbdateto"] = strtotime($dateto);        
        $tags["typereport"] = $typereport;
        $tags["acclevel"] = $acclevel;
        $tags["types_account"] = $types_account;          
        if ($typereport == "A"){             
          $tags["results"] = Modelo_Dpmovimi::reportIncomeA($_SESSION['acfSession']['id_empresa'],
                                                            $dateto,$types_account["INGRESOS"],
                                                            $types_account["EGRESOS"],$acclevel); 
        }
        else{
          //$tags["results"] = Modelo_Dpmovimi::reportSummaryD($_SESSION['acfSession']['id_empresa'],
          //                                                   $datefrom,$dateto,$ccfrom,$ccto); 
        }         
        if (empty($tags["results"])){
          $_SESSION['acfSession']['mostrar_error'] = "Not found records";
        }      
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->item]; 
        $tags["template_js"][] = "reports";     
        Vista::render('rpt_acc_incomestatement', $tags);  
      break;
      default:  
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->item];
        $tags["typereport"] = "A";
        $tags["acclevel"] = $this->maxlevel;
        $tags["template_js"][] = "reports";     
        Vista::render('rpt_acc_incomestatement', $tags);       
      break;	
    }
  }

}
?>