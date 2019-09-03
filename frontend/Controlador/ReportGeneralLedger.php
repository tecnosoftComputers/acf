<?php
class Controlador_ReportGeneralLedger extends Controlador_Reports {

  public function construirPagina(){   
    
    if(!Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/login.php");
    } 
    $tags = array();    
    $action = Utils::getParam('action','',$this->data);
    $orderby = array("m.CODMOV, m.FECHA_ASI");         
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
        $tags["results"] = Modelo_Dpmovimi::report($_SESSION['acfSession']['id_empresa'],$datefrom,
                                                   $dateto,'','','',$ccfrom,$ccto,$orderby);   
        if (empty($tags["results"])){
          $_SESSION['acfSession']['mostrar_error'] = "Not found records";
        }                                                
  	    $tags["template_js"][] = "reports";     
  	    Vista::render('rpt_acc_generalledger', $tags);                             
      break;      
      case 'view':
        $accfrom = Utils::getParam('accfrom','',$this->data);
        $accto = Utils::getParam('accto','',$this->data);
        $aux_datefrom = Utils::getParam('datefrom','',$this->data);          
        $aux_dateto = Utils::getParam('dateto','',$this->data);          
        $datefrom = (!empty($aux_datefrom)) ? date("Y-m-d", $aux_datefrom) : date('Y-m-d'); 
        $dateto = (!empty($aux_dateto)) ? date("Y-m-d", $aux_dateto) : date('Y-m-d');
        $ccfrom = (!empty($accfrom)) ? Modelo_ChartAccount::getIndAux($accfrom)["CODIGO"]: '';
        $ccto = (!empty($accto)) ? Modelo_ChartAccount::getIndAux($accto)["CODIGO"] : '';
        $tags["accfrom"] = $accfrom;
        $tags["accto"] = $accto;
        $tags["datefrom"] = (!empty($aux_datefrom)) ? date("m/d/Y",$aux_datefrom) : date("m/d/Y");
        $tags["dateto"] = (!empty($aux_dateto)) ? date("m/d/Y",$aux_dateto) : date("m/d/Y");
        $tags["dbdatefrom"] = strtotime($datefrom);
        $tags["dbdateto"] = strtotime($dateto);
        $tags["results"] = Modelo_Dpmovimi::report($_SESSION['acfSession']['id_empresa'],$datefrom,
                                                   $dateto,'','','',$ccfrom,$ccto,$orderby); 
        $tags["template_js"][] = "reports";     
        Vista::render('rpt_acc_generalledger', $tags);
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
       
        $results = Modelo_Dpmovimi::report($_SESSION['acfSession']['id_empresa'],$datefrom,
                                           $dateto,'','','',$ccfrom,$ccto,$orderby);  

        $from = date("m/d/Y", strtotime($datefrom));
        $to = date("m/d/Y", strtotime($dateto));
        $this->printHeaderPdf("GENERAL LEDGER REPORT",$from,$to,true); 

        $columns = array();
        $columns[] = array("width"=>18,"label"=>"DATE");  
        $columns[] = array("width"=>20,"label"=>"TYPE");  
        $columns[] = array("width"=>20,"label"=>"SEAT");  
        $columns[] = array("width"=>25,"label"=>"REFERENCE");  
        $columns[] = array("width"=>25,"label"=>"SETTLEMENT");  
        $columns[] = array("width"=>80,"label"=>"CONCEPT");  
        $columns[] = array("width"=>30,"label"=>"DEBIT");  
        $columns[] = array("width"=>30,"label"=>"CREDIT");
        $columns[] = array("width"=>30,"label"=>"BALANCE");    
        $this->printHeaderTablePdf($columns);
       
        $this->objPdf->SetFont('Arial','',9); 
        if (!empty($results)){
          $account = '';      
          foreach($results as $key=>$value){             
            if ($this->objPdf->GetY() > $this->limitline){
              $this->objPdf->AddPage();
              $this->printHeaderPdf("GENERAL LEDGER REPORT",$from,$to);   
              $this->printHeaderTablePdf($columns);              
            }  
            if ($account != $value["CODMOV"]){ 
              if (!empty($key)){
                $showacumdebit = abs($acumdebit);
                $showacumcredit = abs($acumcredit);
                $showbalance = abs($balance);

                $this->objPdf->SetFont('Arial','B',9);          
                $this->objPdf->SetXY(199, $this->objPdf->GetY());                          
                $this->objPdf->Cell(30, 5,'________________',0,0);
                $this->objPdf->Cell(30, 5,'________________',0,0);
                $this->objPdf->Cell(30, 5,'________________',0,0);
                $this->objPdf->Cell(189  ,5,'',0,1);   
                $this->objPdf->SetXY(96, $this->objPdf->GetY());        
                $this->objPdf->Cell(103 ,5,'Current Balance:',0,0);
                $this->objPdf->Cell(30 ,5,number_format($showacumdebit,2),0,0,'R');
                $this->objPdf->Cell(30 ,5,number_format($showacumcredit,2),0,0,'R');
                $this->objPdf->Cell(30 ,5,number_format($showbalance,2),0,0,'R');                
                $this->objPdf->Cell(189  ,5,'',0,1);   
                $this->objPdf->Cell(189  ,5,'',0,1);
                $this->objPdf->Cell(189  ,5,'',0,1);   
              }              

              $infoaccount = Modelo_ChartAccount::getIndividual($value["CODMOV"]);
              $prevbalance = Modelo_Dpmovimi::reportLedger($_SESSION['acfSession']['id_empresa'],
                                                           $datefrom,trim($value["CODMOV"]));
              $showprevbalance = abs($prevbalance["balance"]); 

              $this->objPdf->SetFont('Arial','B',9);                           
              $this->objPdf->Cell(50 ,5,$value["CODMOV"],0,0);
              $this->objPdf->Cell(138 ,5,$infoaccount["NOMBRE"],0,0);
              $this->objPdf->Cell(60 ,5,"Previous Balance:",0,0);
              $this->objPdf->Cell(30 ,5,number_format($showprevbalance,2),0,0,'R');
              $this->objPdf->Cell(189  ,5,'',0,1);   

              $account = $value["CODMOV"];    
              $acumdebit = 0;
              $acumcredit = 0;
              $acumbalance = 0;
              $balance = $prevbalance["balance"];               
            }        
            
            $debit = ($value["IMPORTE"] > 0) ? $value["IMPORTE"] : 0;
            $credit = ($value["IMPORTE"] <= 0) ? $value["IMPORTE"] : 0;
            $balance = $balance + $value["IMPORTE"];
            $acumdebit = $acumdebit + $debit;
            $acumcredit = $acumcredit + $credit;    
            $idmov = Utils::encriptar($value["IDCONT"]);
            $showdebit = abs($debit);  
            $showcredit = abs($credit);   
            $showbalance = abs($balance); 

            $this->objPdf->SetFont('Arial','',9);                                       
            $this->objPdf->Cell(189,5,'',0,1);                              
            $this->objPdf->Cell(18 ,5,date("m/d/Y",strtotime($value["FECHA_ASI"])),0,0);
            $this->objPdf->Cell(20 ,5,$value["TIPO_ASI"],0,0);                 
            $this->objPdf->Cell(20 ,5,$value["ASIENTO"],0,0);                 
            $this->objPdf->Cell(25 ,5,$value["REFER"],0,0);
            $this->objPdf->Cell(25 ,5,$value["LIQUIDA_NO"],0,0);
            $starty = $this->objPdf->GetY();              
            $this->objPdf->MultiCell(80,3,trim($value["CONCEPTO"]), 0, 'L', 0);
            $this->objPdf->SetXY(198, $starty); 
            $this->objPdf->Cell(30 ,5,number_format($showdebit,2),0,0,'R');
            $this->objPdf->Cell(30 ,5,number_format($showcredit,2),0,0,'R');
            $this->objPdf->Cell(30 ,5,number_format($showbalance,2),0,0,'R');            
            $this->objPdf->Cell(189  ,5,'',0,1);//end of line                          
          } 
          $showacumdebit = abs($acumdebit);
          $showacumcredit = abs($acumcredit);
          $showbalance = abs($balance);                  

          $this->objPdf->SetFont('Arial','B',9);          
          $this->objPdf->SetXY(199, $this->objPdf->GetY());                          
          $this->objPdf->Cell(30, 5,'________________',0,0);
          $this->objPdf->Cell(30, 5,'________________',0,0);
          $this->objPdf->Cell(30, 5,'________________',0,0);
          $this->objPdf->Cell(189  ,5,'',0,1);   
          $this->objPdf->SetXY(96, $this->objPdf->GetY());        
          $this->objPdf->Cell(103 ,5,'Current Balance:',0,0);
          $this->objPdf->Cell(30 ,5,number_format($showacumdebit,2),0,0,'R');
          $this->objPdf->Cell(30 ,5,number_format($showacumcredit,2),0,0,'R');
          $this->objPdf->Cell(30 ,5,number_format($showbalance,2),0,0,'R');          
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
       
        $results = Modelo_Dpmovimi::report($_SESSION['acfSession']['id_empresa'],$datefrom,
                                           $dateto,'','','',$ccfrom,$ccto,$orderby);  

        $from = date("m/d/Y", strtotime($datefrom));
        $to = date("m/d/Y", strtotime($dateto));
        $info_company = Modelo_Companie::searchCompanies($_SESSION['acfSession']['id_empresa']); 

        $columns = array(
                   'A'=>array("width"=>11,"label"=>"DATE"),
                   'B'=>array("width"=>14,"label"=>"TYPE SEAT"),
                   'C'=>array("width"=>10,"label"=>"SEAT"),
                   'D'=>array("width"=>15,"label"=>"REFERENCE"),
                   'E'=>array("width"=>15,"label"=>"SETTLEMENT"),
                   'F'=>array("width"=>65,"label"=>"CONCEPT"),                   
                   'G'=>array("width"=>20,"label"=>"DEBIT"),
                   'H'=>array("width"=>20,"label"=>"CREDIT"),
                   'I'=>array("width"=>20,"label"=>"BALANCE")
                 );

        $this->printHeaderExcel("GENERAL LEDGER REPORT",$columns,'H1',80,$info_company,$from,$to);
        $objPHPExcel = $this->objExcel;          

        $objPHPExcel->getActiveSheet()->mergeCells('A1:G1');
        $objPHPExcel->getActiveSheet()->mergeCells('A2:G2'); 
        $objPHPExcel->getActiveSheet()->mergeCells('A3:G3');
        $objPHPExcel->getActiveSheet()->mergeCells('A4:G4');
        $objPHPExcel->getActiveSheet()->mergeCells('A5:G5');
        $objPHPExcel->getActiveSheet()->mergeCells('A6:G6');          
        $objPHPExcel->getActiveSheet()->mergeCells('H1:I6');           
                      
        if (!empty($results)){
          $account = '';      
          foreach($results as $key=>$value){                           
            if ($account != $value["CODMOV"]){ 
              if (!empty($key)){
                $showacumdebit = abs($acumdebit);
                $showacumcredit = abs($acumcredit);
                $showbalance = abs($balance);
                
                $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':I'.$this->line)->applyFromArray($this->styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('G'.$this->line.':I'.$this->line)->applyFromArray($this->CStyle);
                $objPHPExcel->getActiveSheet()->getStyle('F'.$this->line.':I'.$this->line)->applyFromArray($this->AmtStyle);
                $objPHPExcel->getActiveSheet()->getStyle('E'.$this->line.':I'.$this->line)->applyFromArray($this->BoldStyle); 
                $objPHPExcel->setActiveSheetIndex(0)              
                  ->setCellValue('F'.$this->line, "Current Balance:")
                  ->setCellValue('G'.$this->line, " ".number_format($showacumdebit,2))
                  ->setCellValue('H'.$this->line, " ".number_format($showacumcredit,2))
                  ->setCellValue('I'.$this->line, " ".number_format($showbalance,2)); 
                $this->line++; 

                //print blank line
                $objPHPExcel->setActiveSheetIndex(0)              
                  ->setCellValue('A'.$this->line, '')
                  ->setCellValue('B'.$this->line, '')
                  ->setCellValue('C'.$this->line, '')
                  ->setCellValue('D'.$this->line, '')
                  ->setCellValue('E'.$this->line, '')
                  ->setCellValue('F'.$this->line, '')
                  ->setCellValue('G'.$this->line, '')
                  ->setCellValue('H'.$this->line, '')
                  ->setCellValue('I'.$this->line, '');
                $this->line++;
              }              

              $infoaccount = Modelo_ChartAccount::getIndividual($value["CODMOV"]);
              $prevbalance = Modelo_Dpmovimi::reportLedger($_SESSION['acfSession']['id_empresa'],
                                                           $datefrom,trim($value["CODMOV"]));
              $showprevbalance = abs($prevbalance["balance"]); 

              $objPHPExcel->getActiveSheet()->mergeCells('A'.$this->line.':C'.$this->line);
              $objPHPExcel->getActiveSheet()->mergeCells('D'.$this->line.':F'.$this->line);
              $objPHPExcel->getActiveSheet()->mergeCells('G'.$this->line.':H'.$this->line);
              $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':I'.$this->line)->applyFromArray($this->styleArray);
              $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':I'.$this->line)->applyFromArray($this->BoldStyle);
              $objPHPExcel->getActiveSheet()->getStyle('I'.$this->line)->applyFromArray($this->AmtStyle);
              $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$this->line, $value["CODMOV"])
                ->setCellValue('D'.$this->line, $infoaccount["NOMBRE"])
                ->setCellValue('G'.$this->line, "Previous Balance:")
                ->setCellValue('I'.$this->line, " ".number_format($showprevbalance,2)); 
              $this->line++;    

              $account = $value["CODMOV"];    
              $acumdebit = 0;
              $acumcredit = 0;
              $acumbalance = 0;
              $balance = $prevbalance["balance"];               
            }   

            $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':I'.$this->line)->applyFromArray($this->styleArray);
            $objPHPExcel->getActiveSheet()->getStyle('G'.$this->line.':I'.$this->line)->applyFromArray($this->AmtStyle);     
            $debit = ($value["IMPORTE"] > 0) ? $value["IMPORTE"] : 0;
            $credit = ($value["IMPORTE"] <= 0) ? $value["IMPORTE"] : 0;
            $balance = $balance + $value["IMPORTE"];
            $acumdebit = $acumdebit + $debit;
            $acumcredit = $acumcredit + $credit;    
            $idmov = Utils::encriptar($value["IDCONT"]);
            $showdebit = abs($debit);  
            $showcredit = abs($credit);   
            $showbalance = abs($balance); 

            $objPHPExcel->getActiveSheet()->getStyle('F'.$this->line)->getAlignment()->setWrapText(true);
            $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue('A'.$this->line, date("m/d/Y",strtotime($value["FECHA_ASI"])))
              ->setCellValue('B'.$this->line, $value["TIPO_ASI"])
              ->setCellValue('C'.$this->line, $value["ASIENTO"])
              ->setCellValue('D'.$this->line, $value["REFER"])
              ->setCellValue('E'.$this->line, " ")
              ->setCellValue('F'.$this->line, trim($value["CONCEPTO"]))
              ->setCellValue('G'.$this->line, " ".number_format($showdebit,2))
              ->setCellValue('H'.$this->line, " ".number_format($showcredit,2))
              ->setCellValue('I'.$this->line, " ".number_format($showbalance,2));  
            $this->line++;                              
          } 
          $showacumdebit = abs($acumdebit);
          $showacumcredit = abs($acumcredit);
          $showbalance = abs($balance);                  

          $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':I'.$this->line)->applyFromArray($this->styleArray);
          $objPHPExcel->getActiveSheet()->getStyle('G'.$this->line.':I'.$this->line)->applyFromArray($this->CStyle);  
          $objPHPExcel->getActiveSheet()->getStyle('F'.$this->line.':I'.$this->line)->applyFromArray($this->AmtStyle);
          $objPHPExcel->getActiveSheet()->getStyle('E'.$this->line.':I'.$this->line)->applyFromArray($this->BoldStyle); 
          $objPHPExcel->setActiveSheetIndex(0)              
            ->setCellValue('F'.$this->line, "Current Balance:")
            ->setCellValue('G'.$this->line, " ".number_format($showacumdebit,2))
            ->setCellValue('H'.$this->line, " ".number_format($showacumcredit,2))
            ->setCellValue('I'.$this->line, " ".number_format($showbalance,2));   
        }
        $this->outputExcel("GENERAL_LEDGER_REPORT");  
      break; 
      default:
        $tags["template_js"][] = "reports";     
        Vista::render('rpt_acc_generalledger', $tags);         
      break;
    }    
  }	
}
?>