<?php
class Controlador_ReportGeneralLedger extends Controlador_Reports {

  public function construirPagina(){   
    
    if(!Utils::estaLogueado()){
      header("Location: ../login.php");
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
        $columns[] = array("width"=>20,"label"=>"TYPE SEAT");  
        $columns[] = array("width"=>20,"label"=>"SEAT");  
        $columns[] = array("width"=>25,"label"=>"REFERENCE");  
        $columns[] = array("width"=>105,"label"=>"CONCEPT");  
        $columns[] = array("width"=>30,"label"=>"DEBIT");  
        $columns[] = array("width"=>30,"label"=>"CREDIT");
        $columns[] = array("width"=>30,"label"=>"BALANCE");    
        $this->printHeaderTablePdf($columns);
       
        $this->objPdf->SetFont('Arial','',9); 
        if (!empty($results)){
          $account = '';      
          foreach($results as $key=>$value){             
            if ($this->objPdf->GetY() > 370){
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
            $starty = $this->objPdf->GetY();              
            $this->objPdf->MultiCell(105,3,trim($value["CONCEPTO"]), 0, 'L', 0);
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
                   'E'=>array("width"=>80,"label"=>"CONCEPT"),                   
                   'F'=>array("width"=>20,"label"=>"DEBIT"),
                   'G'=>array("width"=>20,"label"=>"CREDIT"),
                   'H'=>array("width"=>20,"label"=>"BALANCE")
                 );

        $this->printHeaderExcel("GENERAL LEDGER REPORT",$columns,'G1',80,$info_company,$from,$to);
        $objPHPExcel = $this->objExcel;          

        $objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
        $objPHPExcel->getActiveSheet()->mergeCells('A2:F2'); 
        $objPHPExcel->getActiveSheet()->mergeCells('A3:F3');
        $objPHPExcel->getActiveSheet()->mergeCells('A4:F4');
        $objPHPExcel->getActiveSheet()->mergeCells('A5:F5');
        $objPHPExcel->getActiveSheet()->mergeCells('A6:F6');          
        $objPHPExcel->getActiveSheet()->mergeCells('G1:H6');           
                  
        $cont = 10;

        $styleArray = array(
          'font'  => array(
            'bold'  => false,              
            'size'  => 10,
            'name'  => 'Arial'
          ),
          'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          ) 
        );

        $CStyle = array(
          'borders' => array(
            'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
          )
        );  

        $AmtStyle = array(            
          'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
          )
        );

        $BoldStyle = array(            
          'font'  => array(
            'bold'  => true,                           
          )
        );

        if (!empty($results)){
          $account = '';      
          foreach($results as $key=>$value){                           
            if ($account != $value["CODMOV"]){ 
              if (!empty($key)){
                $showacumdebit = abs($acumdebit);
                $showacumcredit = abs($acumcredit);
                $showbalance = abs($balance);
                
                $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':H'.$cont)->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('F'.$cont.':H'.$cont)->applyFromArray($CStyle);  
                $objPHPExcel->getActiveSheet()->getStyle('F'.$cont.':H'.$cont)->applyFromArray($AmtStyle);
                $objPHPExcel->getActiveSheet()->getStyle('E'.$cont.':H'.$cont)->applyFromArray($BoldStyle); 
                $objPHPExcel->setActiveSheetIndex(0)              
                  ->setCellValue('E'.$cont, "Current Balance:")
                  ->setCellValue('F'.$cont, " ".number_format($showacumdebit,2))
                  ->setCellValue('G'.$cont, " ".number_format($showacumcredit,2))
                  ->setCellValue('H'.$cont, " ".number_format($showbalance,2)); 
                $cont++; 

                //print blank line
                $objPHPExcel->setActiveSheetIndex(0)              
                  ->setCellValue('A'.$cont, '')
                  ->setCellValue('B'.$cont, '')
                  ->setCellValue('C'.$cont, '')
                  ->setCellValue('D'.$cont, '')
                  ->setCellValue('E'.$cont, '')
                  ->setCellValue('F'.$cont, '');
                $cont++;
              }              

              $infoaccount = Modelo_ChartAccount::getIndividual($value["CODMOV"]);
              $prevbalance = Modelo_Dpmovimi::reportLedger($_SESSION['acfSession']['id_empresa'],
                                                           $datefrom,trim($value["CODMOV"]));
              $showprevbalance = abs($prevbalance["balance"]); 

              $objPHPExcel->getActiveSheet()->mergeCells('A'.$cont.':D'.$cont);
              $objPHPExcel->getActiveSheet()->mergeCells('F'.$cont.':G'.$cont);
              $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':H'.$cont)->applyFromArray($styleArray);
              $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':H'.$cont)->applyFromArray($BoldStyle);
              $objPHPExcel->getActiveSheet()->getStyle('H'.$cont)->applyFromArray($AmtStyle);
              $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$cont, $value["CODMOV"])
                ->setCellValue('E'.$cont, $infoaccount["NOMBRE"])
                ->setCellValue('F'.$cont, "Previous Balance:")
                ->setCellValue('H'.$cont, " ".number_format($showprevbalance,2)); 
              $cont++;    

              $account = $value["CODMOV"];    
              $acumdebit = 0;
              $acumcredit = 0;
              $acumbalance = 0;
              $balance = $prevbalance["balance"];               
            }   

            $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':H'.$cont)->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet()->getStyle('F'.$cont.':H'.$cont)->applyFromArray($AmtStyle);     
            $debit = ($value["IMPORTE"] > 0) ? $value["IMPORTE"] : 0;
            $credit = ($value["IMPORTE"] <= 0) ? $value["IMPORTE"] : 0;
            $balance = $balance + $value["IMPORTE"];
            $acumdebit = $acumdebit + $debit;
            $acumcredit = $acumcredit + $credit;    
            $idmov = Utils::encriptar($value["IDCONT"]);
            $showdebit = abs($debit);  
            $showcredit = abs($credit);   
            $showbalance = abs($balance); 

            $objPHPExcel->getActiveSheet()->getStyle('E'.$cont)->getAlignment()->setWrapText(true);
            $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue('A'.$cont, date("m/d/Y",strtotime($value["FECHA_ASI"])))
              ->setCellValue('B'.$cont, $value["TIPO_ASI"])
              ->setCellValue('C'.$cont, $value["ASIENTO"])
              ->setCellValue('D'.$cont, $value["REFER"])
              ->setCellValue('E'.$cont, trim($value["CONCEPTO"]))
              ->setCellValue('F'.$cont, " ".number_format($showdebit,2))
              ->setCellValue('G'.$cont, " ".number_format($showcredit,2))
              ->setCellValue('H'.$cont, " ".number_format($showbalance,2));  
            $cont++;                              
          } 
          $showacumdebit = abs($acumdebit);
          $showacumcredit = abs($acumcredit);
          $showbalance = abs($balance);                  

          $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':H'.$cont)->applyFromArray($styleArray);
          $objPHPExcel->getActiveSheet()->getStyle('F'.$cont.':H'.$cont)->applyFromArray($CStyle);  
          $objPHPExcel->getActiveSheet()->getStyle('F'.$cont.':H'.$cont)->applyFromArray($AmtStyle);
          $objPHPExcel->getActiveSheet()->getStyle('E'.$cont.':H'.$cont)->applyFromArray($BoldStyle); 
          $objPHPExcel->setActiveSheetIndex(0)              
            ->setCellValue('E'.$cont, "Current Balance:")
            ->setCellValue('F'.$cont, " ".number_format($showacumdebit,2))
            ->setCellValue('G'.$cont, " ".number_format($showacumcredit,2))
            ->setCellValue('H'.$cont, " ".number_format($showbalance,2));   
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