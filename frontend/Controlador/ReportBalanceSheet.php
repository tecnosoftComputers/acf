<?php
class Controlador_ReportBalanceSheet extends Controlador_Reports {

  public $item = 36;
  
  public function construirPagina(){   

    $tags = array();    
    if(!Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/login.php");
    } 
    $action = Utils::getParam('action','',$this->data);
    switch($action){                            
      case 'search':
        $types_account = Modelo_Dasbal::getParams(); 
        $datetoaux = Utils::getParam("datetoaux", "", $this->data);
        $datebalance = Utils::getParam('datebalance', '', $this->data);
        $datebalance = (!empty($datetoaux)) ? date("m/d/Y", $datetoaux) : $datebalance ;
        $acclevel = Utils::getParam('acclevel',$this->maxlevel,$this->data);
        $datebalanceaux =  date("Y-m-d", strtotime($datebalance));
        $tags["types_account"] = $types_account;
        $limit = Utils::getParam('limit','',$this->data);
        $limit = (empty($limit)) ? $this->vlrecords[0] : $limit;
        $page = Utils::getParam('page',1,$this->data);
        $start = ($page - 1) * $limit;

        $accdeudora = array();
        $accacreedora = array();
        foreach($types_account["RESULTADOD"] as $deudora){
          $accdeudora[] = Modelo_ChartAccount::getIndAux($deudora); 
        }
        foreach($types_account["RESULTADOA"] as $acreedora){
          $accacreedora[] = Modelo_ChartAccount::getIndAux($acreedora); 
        }
        $tags["results"] = Modelo_Dpmovimi::reportBalanceSheet($_SESSION['acfSession']['id_empresa'],
                                                              $datebalanceaux, $types_account['ACTIVO'],
                                                              $types_account['PASIVO'], $types_account['CAPITAL']
                                                              ,$accacreedora,$accdeudora , $acclevel, $start, $limit);


        $nrorecords = $tags["results"]["nrorecords"];
        $tags["results"] = $tags["results"]["records"];

        $url = PUERTO."://".HOST."/report/balancesheet/search/";     
        $url .= $acclevel."/".strtotime($datebalance)."/".$limit;
        $pagination = new Pagination($nrorecords,$limit,$url);  
        $pagination->setPage($page); 
        $tags["pagination"] = $pagination->showPage();


        if(($page * $limit) >= $nrorecords){
          $tags["totalresult"] = array();
          $labelThis = "TOTAL";
          foreach ($tags["results"] as $key => $value) {
            if($value["level"] == 1 && ($value["pasivo"] != 0 || $value["capital"] != 0)){
              $labelThis .= $value["NOMBRE"]." + ";
              $valueThis +=  ($value["capital"] * -1) - ($value["pasivo"]); 
            }
          }
          $labelThis = substr($labelThis, 0, -2);
          $tags["totalresult"] = array("labelthis"=>$labelThis, "valuethis"=>$valueThis);
        }
        $tags["limit"] = $limit; 
        $tags["vlrecords"] = $this->vlrecords; 
        $tags["acclevel"] = $acclevel;
        
        $tags['datebalance'] = $datebalance;
        $tags["template_js"][] = "reports";     
        Vista::render('rpt_acc_balancesheet', $tags); 

      break;  
      case 'pdf':
      break;
      case 'excel':
      break;
      default:         
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->item];
        $tags["template_js"][] = "reports";  
        $tags["acclevel"] = $this->maxlevel;   
        Vista::render('rpt_acc_balancesheet', $tags); 
      break;
    }
    
  }
}
?>