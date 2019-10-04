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
        $limit = (empty($limit)) ? $this->vlrecords[3] : $limit;
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

        if(($page * $limit) >= $nrorecords){
          $tags["totalresult"] = $tags["results"]["totalresult"];
        }

        $tags["results"] = $tags["results"]["records"];

        // if(!empty($limit)){
        //   $reindexarray = array_values($results);
        //   $auxarr = array();
        //   foreach ($reindexarray as $key => $remove) {
        //     if(($key) >= $start && ($key) < ($limit + $start)){
        //       array_push($auxarr, $reindexarray[$key]);
        //     }
        //   }
        //   $results = $auxarr;
        // }

        $url = PUERTO."://".HOST."/report/balancesheet/search/";     
        $url .= $acclevel."/".strtotime($datebalance)."/".$limit;
        $pagination = new Pagination($nrorecords,$limit,$url);  
        $pagination->setPage($page); 
        $tags["pagination"] = $pagination->showPage();


        $tags["limit"] = $limit; 
        $tags["vlrecords"] = $this->vlrecords; 
        $tags["acclevel"] = $acclevel;
        
        $tags['datebalance'] = $datebalance;
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->item];
        $tags["template_js"][] = "reports";     
        Vista::render('rpt_acc_balancesheet', $tags); 

      break;  
      case 'pdf':

        $types_account = Modelo_Dasbal::getParams(); 
        $datetoaux = Utils::getParam("datetoaux", "", $this->data);
        $datebalance = Utils::getParam('datebalance', '', $this->data);
        $datebalance = (!empty($datetoaux)) ? date("m/d/Y", $datetoaux) : $datebalance ;
        $acclevel = Utils::getParam('acclevel',$this->maxlevel,$this->data);
        $datebalanceaux =  date("Y-m-d", strtotime($datebalance));
        $tags["types_account"] = $types_account;

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
                                                              ,$accacreedora,$accdeudora , $acclevel);
        $totalresult = $tags["results"]["totalresult"];
        $results = $tags["results"]["records"];


        // print_r($results);
        // exit();
        // Reporte
        $from = date("01/01/Y", strtotime($datebalanceaux));
        $to = date("m/d/Y", strtotime($datebalanceaux)); 
        $this->printHeaderPdf("BALANCE SHEET REPORT",$from,$to,true);
        $columns = array();
        $columns[] = array("width"=>69,"label"=>"ACCOUNT");  
        $columns[] = array("width"=>69,"label"=>"NAME ACCOUNT");  
        $columns[] = array("width"=>69,"label"=>"BALANCE");  
        $columns[] = array("width"=>69,"label"=>"TOTAL");    
        $this->printHeaderTablePdf($columns);     
        $this->objPdf->SetXY(224, $this->objPdf->GetY());  
        $this->objPdf->SetFont('Arial','B',9);

        foreach ($results as $key => $value) {
          // printing pdf file

          if ($this->objPdf->GetY() > $this->limitline){
            $this->printFooterPdf();
            $this->objPdf->AddPage();
            $this->printHeaderPdf("BALANCE SHEET REPORT",$from,$to);   
            $this->printHeaderTablePdf($columns);
          }
          if($value["level"] == 1 || $value["level"] == 2){
            $this->objPdf->SetFont('Arial','B',9);
            if($value["level"] == 1){
              $this->objPdf->Cell(69,5,'',0,1);                                   
            }
          }

          if(!empty($value["activo"])){
            $balance = $value["activo"];
          }
          elseif(!empty($value["pasivo"])){
            $balance = $value["pasivo"] * -1;
          } 
          else{
            $balance = $value["capital"] * -1;
          }        
          $total = ($value["level"] != 3) ? $balance : 0;   
          $balance = ($value["level"] == 3) ? $balance : 0;
          $balance = ($balance != 0) ? number_format($balance,2,',','.') : "";
          $total = ($total != 0) ? number_format($total,2,',','.') : "";

          $this->objPdf->Cell(69,5,$value["CODIGO"],0,0); 
          $this->objPdf->Cell(69,5,$value["NOMBRE"],0,0);
          $this->objPdf->SetFont('Arial',"",9);
          // $this->SetX(11.5);
          $this->objPdf->Cell(69,5,$balance,0,0,"R"); 
          $this->objPdf->Cell(69,5,$total,0,0,"R");

          // break line
          $this->objPdf->SetFont('Arial','',9);
          $this->objPdf->Cell(69,5,'',0,1);

        }

        $this->objPdf->SetFont('Arial','',9);
        $this->objPdf->Cell(69,5,'',0,1);
        $this->objPdf->Cell(69,5,"",0,0); 
        $this->objPdf->Cell(69,5,$totalresult["labelthis"],0,0);
        $this->objPdf->SetFont('Arial',"",9);
        // $this->SetX(11.5);
        $this->objPdf->Cell(69,5,"",0,0,"R"); 
        $this->objPdf->Cell(69,5,number_format(bcdiv($totalresult["valuethis"],1,2),2,",","."),0,0,"R");
        $this->printFooterPdf();
        $this->objPdf->Output();


      break;
      case 'excel':

        $types_account = Modelo_Dasbal::getParams(); 
        $datetoaux = Utils::getParam("datetoaux", "", $this->data);
        $datebalance = Utils::getParam('datebalance', '', $this->data);
        $datebalance = (!empty($datetoaux)) ? date("m/d/Y", $datetoaux) : $datebalance ;
        $acclevel = Utils::getParam('acclevel',$this->maxlevel,$this->data);
        $datebalanceaux =  date("Y-m-d", strtotime($datebalance));
        $tags["types_account"] = $types_account;

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
                                                              ,$accacreedora,$accdeudora , $acclevel);
        $totalresult = $tags["results"]["totalresult"];
        $results = $tags["results"]["records"];


        $from = date("01/01/Y", strtotime($datebalanceaux));
        $to = date("m/d/Y", strtotime($datebalanceaux));
        $info_company = Modelo_Companie::searchCompanies($_SESSION['acfSession']['id_empresa']); 
         
        $columns = array(
                   'A'=>array("width"=>50,"label"=>"ACCOUNT"),
                   'B'=>array("width"=>50,"label"=>"NAME ACCOUNT"),
                   'C'=>array("width"=>44,"label"=>"BALANCE"),
                   'D'=>array("width"=>44,"label"=>"TOTAL")
                 ); 

        $this->printHeaderExcel("BALANCE SHEET REPORT",$columns,'D',100,$info_company,$from,$to,'C');
        $objPHPExcel = $this->objExcel;

        foreach ($results as $key => $value) {
          if(!empty($value["activo"])){
            $balance = $value["activo"];
          }
          elseif(!empty($value["pasivo"])){
            $balance = $value["pasivo"] * -1;
          } 
          else{
            $balance = $value["capital"] * -1;
          }        
          $total = ($value["level"] != 3) ? $balance : 0;   
          $balance = ($value["level"] == 3) ? $balance : 0;
          $balance = ($balance != 0) ? number_format($balance,2,',','.') : "";
          $total = ($total != 0) ? number_format($total,2,',','.') : "";

          if($value["level"] == 1){
            $objPHPExcel->getActiveSheet()->mergeCells('A'.$this->line.':D'.$this->line); 
            $objPHPExcel->getActiveSheet()->getRowDimension($this->line)->setRowHeight($this->hexcel);
            $this->line++; 
          }
          
          
              
          $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':D'.$this->line)->applyFromArray($this->styleArray);
          if($value["level"] == 1 || $value["level"] == 2){
            $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':B'.$this->line)->applyFromArray($this->BoldStyle);
          }
          $objPHPExcel->getActiveSheet()->getStyle('C'.$this->line.':D'.$this->line)->applyFromArray($this->AmtStyle);
          $objPHPExcel->setActiveSheetIndex(0)
                  ->setCellValue('A'.$this->line, $value["CODIGO"])
                  ->setCellValue('B'.$this->line, $value["NOMBRE"])
                  ->setCellValue('C'.$this->line, $balance)
                  ->setCellValue('D'.$this->line, $total);
              $this->line++; 
        }

        $objPHPExcel->getActiveSheet()->mergeCells('A'.$this->line.':D'.$this->line); 
        $objPHPExcel->getActiveSheet()->getRowDimension($this->line)->setRowHeight($this->hexcel);  
        $this->line++; 

        $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':D'.$this->line)->applyFromArray($this->styleArray);
        $objPHPExcel->getActiveSheet()->getStyle('C'.$this->line.':D'.$this->line)->applyFromArray($this->AmtStyle);
        $objPHPExcel->setActiveSheetIndex(0)
                  ->setCellValue('A'.$this->line, "")
                  ->setCellValue('B'.$this->line, $totalresult["labelthis"])
                  ->setCellValue('C'.$this->line, "")
                  ->setCellValue('D'.$this->line, number_format(bcdiv($totalresult["valuethis"],1,2),2,",","."));


        $this->outputExcel("BALANCE SHEET REPORT");


      break;
      default:    
        // $tags["typereport"] = "A";     
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->item];
        $tags["template_js"][] = "reports";  
        $tags["acclevel"] = $this->maxlevel;   
        Vista::render('rpt_acc_balancesheet', $tags); 
      break;
    }
    
  }
}
?>