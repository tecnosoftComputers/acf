<?php
class Controlador_ReportJournalSummary extends Controlador_Reports {

  public $item = 32;

  public function construirPagina(){   
  	$tags = array();    
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
        $typereport = Utils::getParam('typereport','S',$this->data);
        $tags["accfrom"] = $accfrom;
        $tags["accto"] = $accto;
        $tags["datefrom"] = $aux_datefrom;
        $tags["dateto"] = $aux_dateto;
        $tags["dbdatefrom"] = strtotime($datefrom);
        $tags["dbdateto"] = strtotime($dateto);       
        $tags["typereport"] = $typereport;        
        if ($typereport == "S"){        
          $tags["results"] = Modelo_Dpmovimi::reportSummaryS($_SESSION['acfSession']['id_empresa'],
                                                             $datefrom,$dateto,$ccfrom,$ccto); 
        }
        else{
          $tags["results"] = Modelo_Dpmovimi::reportSummaryD($_SESSION['acfSession']['id_empresa'],
                                                             $datefrom,$dateto,$ccfrom,$ccto); 
        } 
        $tags["types_account"] = Modelo_Dasbal::getParams();
        if (empty($tags["results"])){
          $_SESSION['acfSession']['mostrar_error'] = "Not found records";
        }      
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->item]; 
        $tags["template_js"][] = "reports";     
        Vista::render('rpt_acc_journalsummary', $tags);  
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
        $typereport = Utils::getParam('typereport','S',$this->data);
        $types_account = Modelo_Dasbal::getParams();

        $from = date("m/d/Y", strtotime($datefrom));
        $to = date("m/d/Y", strtotime($dateto));
        $this->printHeaderPdf("JOURNAL ENTRY SUMMARY REPORT",$from,$to,true); 

        if ($typereport == "S"){
          $results = Modelo_Dpmovimi::reportSummaryS($_SESSION['acfSession']['id_empresa'],
                                                     $datefrom,$dateto,$ccfrom,$ccto);
          $columns = array();
          $columns[] = array("width"=>60,"label"=>"ACCOUNT");  
          $columns[] = array("width"=>118,"label"=>"NAME ACCOUNT");            
          $columns[] = array("width"=>50,"label"=>"DEBIT");
          $columns[] = array("width"=>50,"label"=>"CREDIT");    
          $this->printHeaderTablePdf($columns);  

          if (!empty($results)){                      
            $acumdebit = 0;
            $acumcredit = 0;
            foreach($results as $key=>$value){ 
              if ($this->objPdf->GetY() > $this->limitline){
                $this->objPdf->AddPage();
                $this->printHeaderPdf("JOURNAL ENTRY SUMMARY REPORT",$from,$to);   
                $this->printHeaderTablePdf($columns);              
              }                        
              $acumdebit = $acumdebit + $value["debit"];
              $acumcredit = $acumcredit + $value["credit"];            
              $showdebit = abs($value["debit"]);  
              $showcredit = abs($value["credit"]);

              $this->objPdf->SetFont('Arial','',9);
              $this->objPdf->Cell(60 ,5,$value["CODMOV"],0,0);
              $this->objPdf->Cell(118 ,5,$value["NOMBRE"],0,0);
              $this->objPdf->Cell(50 ,5,number_format($showdebit,2),0,0,'R');
              $this->objPdf->Cell(50 ,5,number_format($showcredit,2),0,0,'R');              
              $this->objPdf->Cell(189  ,5,'',0,1);//end of line                                    
            } 
            $showacumdebit = abs($acumdebit);
            $showacumcredit = abs($acumcredit);  

            $this->objPdf->SetFont('Arial','B',9);          
            $this->objPdf->SetXY(190, $this->objPdf->GetY());                          
            $this->objPdf->Cell(50, 5,'___________________________',0,0);
            $this->objPdf->Cell(50, 5,'___________________________',0,0);            
            $this->objPdf->Cell(189  ,5,'',0,1);   
            $this->objPdf->SetXY(70, $this->objPdf->GetY());        
            $this->objPdf->Cell(118 ,5,'Total:',0,0,'R');
            $this->objPdf->Cell(50 ,5,number_format($showacumdebit,2),0,0,'R');
            $this->objPdf->Cell(50 ,5,number_format($showacumcredit,2),0,0,'R');                        
          }                        
        }
        else{
          $results = Modelo_Dpmovimi::reportSummaryD($_SESSION['acfSession']['id_empresa'],
                                                     $datefrom,$dateto,$ccfrom,$ccto); 
          $columns = array();
          $columns[] = array("width"=>30,"label"=>"TYPE SEAT");  
          $columns[] = array("width"=>98,"label"=>"DESCRIPTION");            
          $columns[] = array("width"=>50,"label"=>"DEBIT");
          $columns[] = array("width"=>50,"label"=>"CREDIT");    
          $columns[] = array("width"=>50,"label"=>"(DB - CR)");    
          $this->printHeaderTablePdf($columns); 

          $account = '';      
          $acumdebit = 0;
          $acumcredit = 0;
          $acumresta = 0;
          $totdebit = 0;
          $totcredit = 0;
          $totresta = 0;
          foreach($results as $key=>$value){ 
            if ($this->objPdf->GetY() > $this->limitline){
              $this->objPdf->AddPage();
              $this->printHeaderPdf("JOURNAL ENTRY SUMMARY REPORT",$from,$to);   
              $this->printHeaderTablePdf($columns);              
            } 
            if ($account <> $value["CODMOV"]){
              if (!empty($key)){
                $sign = Utils::getSign(trim($account),array("ACTIVO","EGRESOS"),$types_account); 
                $totdebit = $totdebit + $acumdebit;
                $totcredit = $totcredit + $acumcredit;
                $totresta = $totresta + $acumresta;
                $showacumdebit = abs($acumdebit);
                $showacumcredit = abs($acumcredit);  
                $showacumresta = round($acumresta,2);               
                $showacumresta = ($sign) ? $showacumresta : $showacumresta * -1; 
                $showacumresta = (empty($showacumresta)) ? abs($showacumresta) : $showacumresta;

                $this->objPdf->SetFont('Arial','B',9);          
                $this->objPdf->SetXY(140, $this->objPdf->GetY());                          
                $this->objPdf->Cell(50, 5,'___________________________',0,0);
                $this->objPdf->Cell(50, 5,'___________________________',0,0);
                $this->objPdf->Cell(50, 5,'___________________________',0,0);
                $this->objPdf->Cell(189  ,5,'',0,1);   
                $this->objPdf->SetXY(40, $this->objPdf->GetY());        
                $this->objPdf->Cell(98 ,5,'Subtotal:',0,0,'R');
                $this->objPdf->Cell(50 ,5,number_format($showacumdebit,2),0,0,'R');
                $this->objPdf->Cell(50 ,5,number_format($showacumcredit,2),0,0,'R');
                $this->objPdf->Cell(50 ,5,number_format($showacumresta,2),0,0,'R');                
                $this->objPdf->Cell(189,5,'',0,1);   
                $this->objPdf->Cell(189,5,'',0,1);
                $this->objPdf->Cell(189,5,'',0,1);                         
              }

              $this->objPdf->SetFont('Arial','B',9);                           
              $this->objPdf->Cell(50 ,5,$value["CODMOV"],0,0);
              $this->objPdf->Cell(138 ,5,$value["NOMBRE"],0,0);
              $this->objPdf->Cell(189  ,5,'',0,1);   
              
              $account = $value["CODMOV"];   
              $acumdebit = 0;
              $acumcredit = 0;
              $acumresta = 0;  
            }
            $sign = Utils::getSign(trim($value["CODMOV"]),array("ACTIVO","EGRESOS"),$types_account); 
            $acumdebit = $acumdebit + $value["debit"];
            $acumcredit = $acumcredit + $value["credit"]; 
            $acumresta = $acumresta + $value["debit"] + $value["credit"];           
            $showdebit = abs($value["debit"]);  
            $showcredit = abs($value["credit"]);  
            $showresta = $value["debit"] + $value["credit"]; 
            $showresta = round($showresta,2);               
            $showresta = ($sign) ? $showresta : $showresta * -1; 
            $showresta = (empty($showresta)) ? abs($showresta) : $showresta; 

            $this->objPdf->SetFont('Arial','',9);                                       
            //$this->objPdf->Cell(189,5,'',0,1);                              
            $this->objPdf->Cell(30 ,5,$value["TIPO_ASI"],0,0);
            $this->objPdf->Cell(98 ,5,$value["nameseat"],0,0);                             
            $this->objPdf->Cell(50 ,5,number_format($showdebit,2),0,0,'R');
            $this->objPdf->Cell(50 ,5,number_format($showcredit,2),0,0,'R');
            $this->objPdf->Cell(50 ,5,number_format($showresta,2),0,0,'R');            
            $this->objPdf->Cell(189  ,5,'',0,1);//end of line                               
           }
           $totdebit = $totdebit + $acumdebit;
           $totcredit = $totcredit + $acumcredit;
           $totresta = $totresta + $acumresta; 
           $showacumdebit = abs($acumdebit);
           $showacumcredit = abs($acumcredit); 
           $showacumresta = round($acumresta,2);               
           $showacumresta = ($sign) ? $showacumresta : $showacumresta * -1; 
           $showacumresta = (empty($showacumresta)) ? abs($showacumresta) : $showacumresta;
           
           $showtotdebit = abs($totdebit);
           $showtotcredit = abs($totcredit);           
           $showtotresta = round($totresta,2);               
           $showtotresta = ($sign) ? $showtotresta : $showtotresta * -1; 
           $showtotresta = (empty($showtotresta)) ? abs($showtotresta) : $showtotresta;

           $this->objPdf->SetFont('Arial','B',9);          
           $this->objPdf->SetXY(140, $this->objPdf->GetY());                          
           $this->objPdf->Cell(50, 5,'___________________________',0,0);
           $this->objPdf->Cell(50, 5,'___________________________',0,0);
           $this->objPdf->Cell(50, 5,'___________________________',0,0);
           $this->objPdf->Cell(189  ,5,'',0,1);   
           $this->objPdf->SetXY(40, $this->objPdf->GetY());        
           $this->objPdf->Cell(98 ,5,'Subtotal:',0,0,'R');
           $this->objPdf->Cell(50 ,5,number_format($showacumdebit,2),0,0,'R');
           $this->objPdf->Cell(50 ,5,number_format($showacumcredit,2),0,0,'R');
           $this->objPdf->Cell(50 ,5,number_format($showacumresta,2),0,0,'R');                
           $this->objPdf->Cell(189,5,'',0,1);   
           $this->objPdf->Cell(189,5,'',0,1);
           $this->objPdf->Cell(189,5,'',0,1); 

           $this->objPdf->SetXY(140, $this->objPdf->GetY());                          
           $this->objPdf->Cell(50, 5,'___________________________',0,0);
           $this->objPdf->Cell(50, 5,'___________________________',0,0);
           $this->objPdf->Cell(50, 5,'___________________________',0,0);
           $this->objPdf->Cell(189  ,5,'',0,1);   
           $this->objPdf->SetXY(40, $this->objPdf->GetY());        
           $this->objPdf->Cell(98 ,5,'Total:',0,0,'R');
           $this->objPdf->Cell(50 ,5,number_format($showtotdebit,2),0,0,'R');
           $this->objPdf->Cell(50 ,5,number_format($showtotcredit,2),0,0,'R');
           $this->objPdf->Cell(50 ,5,number_format($showtotresta,2),0,0,'R');                
           $this->objPdf->Cell(189,5,'',0,1);   
           $this->objPdf->Cell(189,5,'',0,1);
           $this->objPdf->Cell(189,5,'',0,1);               
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
        $typereport = Utils::getParam('typereport','S',$this->data);
        $types_account = Modelo_Dasbal::getParams();
               
        $from = date("m/d/Y", strtotime($datefrom));
        $to = date("m/d/Y", strtotime($dateto));  
        $info_company = Modelo_Companie::searchCompanies($_SESSION['acfSession']['id_empresa']); 

        if ($typereport == "S"){ 
          $results = Modelo_Dpmovimi::reportSummaryS($_SESSION['acfSession']['id_empresa'],
                                                     $datefrom,$dateto,$ccfrom,$ccto);  
          $columns = array(
                     'A'=>array("width"=>18,"label"=>"ACCOUNT"),
                     'B'=>array("width"=>80,"label"=>"NAME ACCOUNT"),
                     'C'=>array("width"=>30,"label"=>"DEBIT"),
                     'D'=>array("width"=>30,"label"=>"CREDIT")
                   );          
          $this->printHeaderExcel("JOURNAL ENTRY SUMMARY REPORT",$columns,'D1',10,$info_company,$from,$to);
          $objPHPExcel = $this->objExcel;          

          $objPHPExcel->getActiveSheet()->mergeCells('A1:C1');
          $objPHPExcel->getActiveSheet()->mergeCells('A2:C2'); 
          $objPHPExcel->getActiveSheet()->mergeCells('A3:C3');
          $objPHPExcel->getActiveSheet()->mergeCells('A4:C4');
          $objPHPExcel->getActiveSheet()->mergeCells('A5:C5');
          $objPHPExcel->getActiveSheet()->mergeCells('A6:C6');          
          $objPHPExcel->getActiveSheet()->mergeCells('D1:D6');           
                    
          if (!empty($results)){
            $acumdebit = 0;
            $acumcredit = 0;
            foreach($results as $key=>$value){                         
              $acumdebit = $acumdebit + $value["debit"];
              $acumcredit = $acumcredit + $value["credit"];            
              $showdebit = abs($value["debit"]);  
              $showcredit = abs($value["credit"]);           

              $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$this->line, " ".$value['CODMOV'])
                ->setCellValue('B'.$this->line, $value['NOMBRE'])
                ->setCellValue('C'.$this->line, " ".number_format($showdebit,2))
                ->setCellValue('D'.$this->line, " ".number_format($showcredit,2)); 
              $objPHPExcel->getActiveSheet()->getRowDimension($this->line)->setRowHeight($this->hexcel);

              $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':D'.$this->line)->applyFromArray($this->styleArray);
              $objPHPExcel->getActiveSheet()->getStyle('C'.$this->line.':D'.$this->line)->applyFromArray($this->AmtStyle);
            
              $this->line++;                  
             } 
             $showacumdebit = abs($acumdebit);
             $showacumcredit = abs($acumcredit);      

             $objPHPExcel->setActiveSheetIndex(0)                
                ->setCellValue('A'.$this->line,'')
                ->setCellValue('B'.$this->line,'')                
                ->setCellValue('C'.$this->line,'')
                ->setCellValue('D'.$this->line,'');
             $objPHPExcel->getActiveSheet()->getRowDimension($this->line)->setRowHeight($this->hexcel); 
             $this->line++;

             $objPHPExcel->setActiveSheetIndex(0)                
                ->setCellValue('A'.$this->line,'')
                ->setCellValue('B'.$this->line,'Total:')                
                ->setCellValue('C'.$this->line, " ".number_format($showacumdebit,2))
                ->setCellValue('D'.$this->line, " ".number_format($showacumcredit,2));
             $objPHPExcel->getActiveSheet()->getRowDimension($this->line)->setRowHeight($this->hexcel); 

             $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':D'.$this->line)->applyFromArray($this->styleArray);   
             $objPHPExcel->getActiveSheet()->getStyle('C'.$this->line.':D'.$this->line)->applyFromArray($this->AmtStyle);
             $objPHPExcel->getActiveSheet()->getStyle('C'.$this->line.':D'.$this->line)->applyFromArray($this->CStyle);
             $objPHPExcel->getActiveSheet()->getStyle('B'.$this->line.':D'.$this->line)->applyFromArray($this->BoldStyle);                 
          }
        }
        else{
          $results = Modelo_Dpmovimi::reportSummaryD($_SESSION['acfSession']['id_empresa'],
                                                     $datefrom,$dateto,$ccfrom,$ccto); 

          $columns = array(
                     'A'=>array("width"=>18,"label"=>"TYPE SEAT"),
                     'B'=>array("width"=>80,"label"=>"DESCRIPTION"),
                     'C'=>array("width"=>30,"label"=>"DEBIT"),
                     'D'=>array("width"=>30,"label"=>"CREDIT"),
                     'E'=>array("width"=>30,"label"=>"(DB - CR)")
                   );          
          $this->printHeaderExcel("JOURNAL ENTRY SUMMARY REPORT",$columns,'E1',10,$info_company,$from,$to);
          $objPHPExcel = $this->objExcel;          

          $objPHPExcel->getActiveSheet()->mergeCells('A1:D1');
          $objPHPExcel->getActiveSheet()->mergeCells('A2:D2'); 
          $objPHPExcel->getActiveSheet()->mergeCells('A3:D3');
          $objPHPExcel->getActiveSheet()->mergeCells('A4:D4');
          $objPHPExcel->getActiveSheet()->mergeCells('A5:D5');
          $objPHPExcel->getActiveSheet()->mergeCells('A6:D6');          
          $objPHPExcel->getActiveSheet()->mergeCells('E1:E6'); 

          if (!empty($results)){
            $account = '';      
            $acumdebit = 0;
            $acumcredit = 0;
            $acumresta = 0;
            $totdebit = 0;
            $totcredit = 0;
            $totresta = 0;
            foreach($results as $key=>$value){ 
              if ($account <> $value["CODMOV"]){
                if (!empty($key)){
                  $sign = Utils::getSign(trim($account),array("ACTIVO","EGRESOS"),$types_account); 
                  $totdebit = $totdebit + $acumdebit;
                  $totcredit = $totcredit + $acumcredit;
                  $totresta = $totresta + $acumresta;
                  $showacumdebit = abs($acumdebit);
                  $showacumcredit = abs($acumcredit);
                  $showacumresta = round($acumresta,2);               
                  $showacumresta = ($sign) ? $showacumresta : $showacumresta * -1; 
                  $showacumresta = (empty($showacumresta)) ? abs($showacumresta) : $showacumresta;

                  $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':E'.$this->line)->applyFromArray($this->styleArray);  
                  $objPHPExcel->getActiveSheet()->getStyle('C'.$this->line.':E'.$this->line)->applyFromArray($this->AmtStyle);
                  $objPHPExcel->getActiveSheet()->getStyle('B'.$this->line.':E'.$this->line)->applyFromArray($this->BoldStyle); 
                  $objPHPExcel->getActiveSheet()->getStyle('C'.$this->line.':E'.$this->line)->applyFromArray($this->CStyle);       
                  $objPHPExcel->setActiveSheetIndex(0)                
                    ->setCellValue('A'.$this->line,'')
                    ->setCellValue('B'.$this->line,'Subtotal:')                
                    ->setCellValue('C'.$this->line, " ".number_format($showacumdebit,2))
                    ->setCellValue('D'.$this->line, " ".number_format($showacumcredit,2))
                    ->setCellValue('E'.$this->line, " ".number_format($showacumresta,2)); 
                  $objPHPExcel->getActiveSheet()->getRowDimension($this->line)->setRowHeight($this->hexcel);  
                  $this->line++;                    

                  $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$this->line, " ")
                    ->setCellValue('B'.$this->line, " ")
                    ->setCellValue('C'.$this->line, " ")
                    ->setCellValue('D'.$this->line, " ")
                    ->setCellValue('E'.$this->line, " "); 
                  $objPHPExcel->getActiveSheet()->getRowDimension($this->line)->setRowHeight($this->hexcel);  
                  $this->line++;  
                }

                $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':E'.$this->line)->applyFromArray($this->styleArray); 
                $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':B'.$this->line)->applyFromArray($this->BoldStyle);     
                $objPHPExcel->setActiveSheetIndex(0)
                  ->setCellValue('A'.$this->line, " ".$value['CODMOV'])
                  ->setCellValue('B'.$this->line, $value['NOMBRE']); 
                $objPHPExcel->getActiveSheet()->getRowDimension($this->line)->setRowHeight($this->hexcel);  
                $this->line++;  
                
                $account = $value["CODMOV"];   
                $acumdebit = 0;
                $acumcredit = 0;
                $acumresta = 0;  
              }
              $sign = Utils::getSign(trim($value["CODMOV"]),array("ACTIVO","EGRESOS"),$types_account); 
              $acumdebit = $acumdebit + $value["debit"];
              $acumcredit = $acumcredit + $value["credit"]; 
              $acumresta = $acumresta + $value["debit"] + $value["credit"];           
              $showdebit = abs($value["debit"]);  
              $showcredit = abs($value["credit"]);  
              $showresta = $value["debit"] + $value["credit"]; 
              $showresta = round($showresta,2);               
              $showresta = ($sign) ? $showresta : $showresta * -1; 
              $showresta = (empty($showresta)) ? abs($showresta) : $showresta; 

              $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':E'.$this->line)->applyFromArray($this->styleArray);  
              $objPHPExcel->getActiveSheet()->getStyle('C'.$this->line.':E'.$this->line)->applyFromArray($this->AmtStyle);    
              $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$this->line, $value['TIPO_ASI'])
                ->setCellValue('B'.$this->line, $value['nameseat'])
                ->setCellValue('C'.$this->line, " ".number_format($showdebit,2))
                ->setCellValue('D'.$this->line, " ".number_format($showcredit,2))
                ->setCellValue('E'.$this->line, " ".number_format($showresta,2)); 
              $objPHPExcel->getActiveSheet()->getRowDimension($this->line)->setRowHeight($this->hexcel);
              $this->line++;                              
             }
             $totdebit = $totdebit + $acumdebit;
             $totcredit = $totcredit + $acumcredit;
             $totresta = $totresta + $acumresta; 
             $showacumdebit = abs($acumdebit);
             $showacumcredit = abs($acumcredit);  
                          
             $showacumresta = round($acumresta,2);               
             $showacumresta = ($sign) ? $showacumresta : $showacumresta * -1; 
             $showacumresta = (empty($showacumresta)) ? abs($showacumresta) : $showacumresta;

             $showtotdebit = abs($totdebit);
             $showtotcredit = abs($totcredit);             
             $showtotresta = round($totresta,2);               
             $showtotresta = ($sign) ? $showtotresta : $showtotresta * -1; 
             $showtotresta = (empty($showtotresta)) ? abs($showtotresta) : $showtotresta;

             $objPHPExcel->setActiveSheetIndex(0)                
                ->setCellValue('A'.$this->line,'')
                ->setCellValue('B'.$this->line,'Subtotal:')                
                ->setCellValue('C'.$this->line, " ".number_format($showacumdebit,2))
                ->setCellValue('D'.$this->line, " ".number_format($showacumcredit,2))
                ->setCellValue('E'.$this->line, " ".number_format($showacumresta,2));
             $objPHPExcel->getActiveSheet()->getRowDimension($this->line)->setRowHeight($this->hexcel); 
             $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':E'.$this->line)->applyFromArray($this->styleArray);   
             $objPHPExcel->getActiveSheet()->getStyle('C'.$this->line.':E'.$this->line)->applyFromArray($this->AmtStyle);
             $objPHPExcel->getActiveSheet()->getStyle('B'.$this->line.':E'.$this->line)->applyFromArray($this->BoldStyle); 
             $objPHPExcel->getActiveSheet()->getStyle('C'.$this->line.':E'.$this->line)->applyFromArray($this->CStyle);              

             $objPHPExcel->setActiveSheetIndex(0)                
                ->setCellValue('A'.$this->line,'')
                ->setCellValue('B'.$this->line,'')                
                ->setCellValue('C'.$this->line,'')
                ->setCellValue('D'.$this->line,'')
                ->setCellValue('E'.$this->line,'');
             $objPHPExcel->getActiveSheet()->getRowDimension($this->line)->setRowHeight($this->hexcel); 
             $this->line++;   

             $objPHPExcel->setActiveSheetIndex(0)                
                ->setCellValue('A'.$this->line,'')
                ->setCellValue('B'.$this->line,'Total:')                
                ->setCellValue('C'.$this->line, " ".number_format($showtotdebit,2))
                ->setCellValue('D'.$this->line, " ".number_format($showtotcredit,2))
                ->setCellValue('E'.$this->line, " ".number_format($showtotresta,2));
             $objPHPExcel->getActiveSheet()->getRowDimension($this->line)->setRowHeight($this->hexcel);
             $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':E'.$this->line)->applyFromArray($this->styleArray);
             $objPHPExcel->getActiveSheet()->getStyle('C'.$this->line.':E'.$this->line)->applyFromArray($this->AmtStyle);       
             $objPHPExcel->getActiveSheet()->getStyle('B'.$this->line.':E'.$this->line)->applyFromArray($this->BoldStyle);
             $objPHPExcel->getActiveSheet()->getStyle('C'.$this->line.':E'.$this->line)->applyFromArray($this->CStyle);           
          }
        }
        
        $this->outputExcel("JOURNAL_ENTRY_SUMMARY_REPORT");
      break;
      default:	
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->item];
        $tags["typereport"] = "S";
        $tags["template_js"][] = "reports";     
        Vista::render('rpt_acc_journalsummary', $tags);  	
      break;  
    }
  }	
}
?>