<?php
class Controlador_ReportTrialBalance extends Controlador_Reports {

  public $item = 35;

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
        $tags["types_account"] = Modelo_Dasbal::getParams();    
        $tags["results"] = Modelo_Dpmovimi::reportTrialBalance($_SESSION['acfSession']['id_empresa'],
                                                               $datefrom,$dateto,$ccfrom,$ccto); 

        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->item];
        $tags["template_js"][] = "reports";        
        Vista::render('rpt_acc_trialbalance', $tags);
      break;
      case 'pdf':
        $accfrom = Utils::getParam('accfrom','',$this->data);
        $accto = Utils::getParam('accto','',$this->data);
        $aux_datefrom = Utils::getParam('datefrom','',$this->data);
        $datefrom = (!empty($aux_datefrom)) ? date("Y-m-d", $aux_datefrom) : date('Y-m-d'); 
        $aux_dateto = Utils::getParam('dateto','',$this->data);
        $dateto = (!empty($aux_dateto)) ? date("Y-m-d", $aux_dateto) : date('Y-m-d');
        $ccfrom = (!empty($accfrom)) ? Modelo_ChartAccount::getIndAux($accfrom)["CODIGO"]: '';
        $ccto = (!empty($accto)) ? Modelo_ChartAccount::getIndAux($accto)["CODIGO"] : '';        
       
        $types_account = Modelo_Dasbal::getParams();         
        $results = Modelo_Dpmovimi::reportTrialBalance($_SESSION['acfSession']['id_empresa'],
                                                       $datefrom,$dateto,$ccfrom,$ccto);  

        $from = date("m/d/Y", strtotime($datefrom));
        $to = date("m/d/Y", strtotime($dateto));
        $this->printHeaderPdf("TRIAL BALANCE REPORT",$from,$to,true);

        $columns = array();
        $columns[] = array("width"=>35,"label"=>"ACCOUNT");  
        $columns[] = array("width"=>82,"label"=>"ACCOUNT NAME");                           
        $columns[] = array("width"=>40,"label"=>"PREVIOUS BALANCE");  
        $columns[] = array("width"=>40,"label"=>"DEBIT");  
        $columns[] = array("width"=>40,"label"=>"CREDIT");
        $columns[] = array("width"=>40,"label"=>"CURRENT BALANCE");    
        $this->printHeaderTablePdf($columns);
       
        $this->objPdf->SetFont('Arial','',9); 
        if (!empty($results)){
          $acumbalance = 0;
          $acumdebit = 0;
          $acumcredit = 0;          
          foreach($results as $key=>$value){ 
            if ($this->objPdf->GetY() > $this->limitline){
              $this->objPdf->AddPage();
              $this->printHeaderPdf("TRIAL BALANCE REPORT",$from,$to);   
              $this->printHeaderTablePdf($columns);              
            }               
            //only sum mayors
            if (isset($value["parent"]) && $value["parent"] == 1){
              $acumbalance = $acumbalance + $value["balance"];
              $acumdebit = $acumdebit + $value["debit"];
              $acumcredit = $acumcredit + $value["credit"];    
            }                
            $resta = $value["balance"] + $value["debit"] + $value["credit"];      

            $sign = Utils::getSign(trim($value["CODIGO"]),array("ACTIVO","EGRESOS"),$types_account);
            $showdebit = abs($value["debit"]);  
            $showcredit = abs($value["credit"]); 

            $showbalance = round($value["balance"],2);               
            $showbalance = ($sign) ? $showbalance : $showbalance * -1; 
            $showbalance = (empty($showbalance)) ? abs($showbalance) : $showbalance;         

            $showresta = round($resta,2);               
            $showresta = ($sign) ? $showresta : $showresta * -1; 
            $showresta = (empty($showresta)) ? abs($showresta) : $showresta;

            $this->objPdf->SetFont('Arial','',9);                                       
            $this->objPdf->Cell(189,5,'',0,1);                              
            $this->objPdf->Cell(35 ,5,$value["CODIGO"],0,0);
            $this->objPdf->Cell(82 ,5,$value["NOMBRE"],0,0);                             
            $this->objPdf->Cell(40 ,5,number_format($showbalance,2,',','.'),0,0,'R');
            $this->objPdf->Cell(40 ,5,number_format($showdebit,2,',','.'),0,0,'R');
            $this->objPdf->Cell(40 ,5,number_format($showcredit,2,',','.'),0,0,'R');
            $this->objPdf->Cell(40 ,5,number_format($showresta,2,',','.'),0,0,'R');
            $this->objPdf->Cell(189  ,5,'',0,1);//end of line                           
          } 
          $showacumbalance = abs($acumbalance);
          $showacumdebit = abs($acumdebit);
          $showacumcredit = abs($acumcredit);
          $showacumresta = $acumdebit + $acumcredit;
          $showacumresta = abs($showacumresta);            

          $this->objPdf->SetFont('Arial','B',9);          
          $this->objPdf->SetXY(138, $this->objPdf->GetY());                          
          $this->objPdf->Cell(40, 5,'______________________',0,0);
          $this->objPdf->Cell(40, 5,'______________________',0,0);
          $this->objPdf->Cell(40, 5,'______________________',0,0);
          $this->objPdf->Cell(40, 5,'______________________',0,0);
          $this->objPdf->Cell(189  ,5,'',0,1);   
          $this->objPdf->SetXY(90, $this->objPdf->GetY());        
          $this->objPdf->Cell(37 ,5,'Totals:',0,0);
          $this->objPdf->Cell(40 ,5,number_format($showacumbalance,2,',','.'),0,0,'R');
          $this->objPdf->Cell(40 ,5,number_format($showacumdebit,2,',','.'),0,0,'R');
          $this->objPdf->Cell(40 ,5,number_format($showacumcredit,2,',','.'),0,0,'R');
          $this->objPdf->Cell(40 ,5,number_format($showacumresta,2,',','.'),0,0,'R');  
        }  
        $this->objPdf->Output(); 
      break;
      case 'excel':
        $accfrom = Utils::getParam('accfrom','',$this->data);
        $accto = Utils::getParam('accto','',$this->data);
        $aux_datefrom = Utils::getParam('datefrom','',$this->data);
        $datefrom = (!empty($aux_datefrom)) ? date("Y-m-d", $aux_datefrom) : date('Y-m-d'); 
        $aux_dateto = Utils::getParam('dateto','',$this->data);
        $dateto = (!empty($aux_dateto)) ? date("Y-m-d", $aux_dateto) : date('Y-m-d');
        $ccfrom = (!empty($accfrom)) ? Modelo_ChartAccount::getIndAux($accfrom)["CODIGO"]: '';
        $ccto = (!empty($accto)) ? Modelo_ChartAccount::getIndAux($accto)["CODIGO"] : '';        
        
        $types_account = Modelo_Dasbal::getParams();          
        $results = Modelo_Dpmovimi::reportTrialBalance($_SESSION['acfSession']['id_empresa'],
                                                       $datefrom,$dateto,$ccfrom,$ccto);  

        $from = date("m/d/Y", strtotime($datefrom));
        $to = date("m/d/Y", strtotime($dateto));
        $info_company = Modelo_Companie::searchCompanies($_SESSION['acfSession']['id_empresa']); 

        $columns = array(
                   'A'=>array("width"=>20,"label"=>"ACCOUNT"),
                   'B'=>array("width"=>60,"label"=>"ACCOUNT NAME"),
                   'C'=>array("width"=>25,"label"=>"PREVIOUS BALANCE"),
                   'D'=>array("width"=>25,"label"=>"DEBIT"),
                   'E'=>array("width"=>25,"label"=>"CREDIT"),
                   'F'=>array("width"=>25,"label"=>"CURRENT BALANCE")         
                 );

        $this->printHeaderExcel("TRIAL BALANCE REPORT",$columns,'E',140,$info_company,$from,$to,'D');
        $objPHPExcel = $this->objExcel;          
       
        if (!empty($results)){
          $acumbalance = 0;
          $acumdebit = 0;
          $acumcredit = 0;          
          foreach($results as $key=>$value){              
            //only sum mayors
            if (isset($value["parent"]) && $value["parent"] == 1){
              $acumbalance = $acumbalance + $value["balance"];
              $acumdebit = $acumdebit + $value["debit"];
              $acumcredit = $acumcredit + $value["credit"];    
            }                
            $resta = $value["balance"] + $value["debit"] + $value["credit"];      

            $sign = Utils::getSign(trim($value["CODIGO"]),array("ACTIVO","EGRESOS"),$types_account);
            $showdebit = abs($value["debit"]);  
            $showcredit = abs($value["credit"]); 

            $showbalance = round($value["balance"],2);               
            $showbalance = ($sign) ? $showbalance : $showbalance * -1; 
            $showbalance = (empty($showbalance)) ? abs($showbalance) : $showbalance;         

            $showresta = round($resta,2);               
            $showresta = ($sign) ? $showresta : $showresta * -1; 
            $showresta = (empty($showresta)) ? abs($showresta) : $showresta;

            $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':F'.$this->line)->applyFromArray($this->styleArray);
            $objPHPExcel->getActiveSheet()->getStyle('C'.$this->line.':F'.$this->line)->applyFromArray($this->AmtStyle);     
                                      
            $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue('A'.$this->line, " ".$value["CODIGO"])
              ->setCellValue('B'.$this->line, $value["NOMBRE"])
              ->setCellValue('C'.$this->line, " ".number_format($showbalance,2,',','.'))
              ->setCellValue('D'.$this->line, " ".number_format($showdebit,2,',','.'))
              ->setCellValue('E'.$this->line, " ".number_format($showcredit,2,',','.'))
              ->setCellValue('F'.$this->line, " ".number_format($showresta,2,',','.'));
            
            /*$objPHPExcel->getActiveSheet()
              ->getStyle('E'.$this->line.':F'.$this->line) 
              ->getNumberFormat()
              ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);*/

            $objPHPExcel->getActiveSheet()->getRowDimension($this->line)->setRowHeight($this->hexcel);
            $this->line++;                                
          } 
          $showacumbalance = abs($acumbalance);
          $showacumdebit = abs($acumdebit);
          $showacumcredit = abs($acumcredit);
          $showacumresta = $acumdebit + $acumcredit;
          $showacumresta = abs($showacumresta); 

          $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':F'.$this->line)->applyFromArray($this->styleArray);          
          $objPHPExcel->getActiveSheet()->getStyle('C'.$this->line.':F'.$this->line)->applyFromArray($this->AmtStyle);
          $objPHPExcel->getActiveSheet()->getStyle('B'.$this->line.':F'.$this->line)->applyFromArray($this->BoldStyle); 
          $objPHPExcel->setActiveSheetIndex(0)              
            ->setCellValue('B'.$this->line, "Totals:")
            ->setCellValue('C'.$this->line, " ".number_format($showacumbalance,2,',','.'))
            ->setCellValue('D'.$this->line, " ".number_format($showacumdebit,2,',','.'))
            ->setCellValue('E'.$this->line, " ".number_format($showacumcredit,2,',','.'))
            ->setCellValue('F'.$this->line, " ".number_format($showacumresta,2,',','.'));
          $objPHPExcel->getActiveSheet()->getRowDimension($this->line)->setRowHeight($this->hexcel);              
        }
        $this->outputExcel("TRIAL_BALANCE_REPORT");  
      break;
      default:          
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->item];
        $tags["template_js"][] = "reports";        
        Vista::render('rpt_acc_trialbalance', $tags);       
      break;
    }
  }	
}
?>