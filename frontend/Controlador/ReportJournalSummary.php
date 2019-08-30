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
              if ($this->objPdf->GetY() > 375){
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
            if ($this->objPdf->GetY() > 370){
              $this->objPdf->AddPage();
              $this->printHeaderPdf("JOURNAL ENTRY SUMMARY REPORT",$from,$to);   
              $this->printHeaderTablePdf($columns);              
            } 
            if ($account <> $value["CODMOV"]){
              if (!empty($key)){
                $totdebit = $totdebit + $acumdebit;
                $totcredit = $totcredit + $acumcredit;
                $totresta = $totresta + $acumresta;
                $showacumdebit = abs($acumdebit);
                $showacumcredit = abs($acumcredit);     
                $showacumresta = abs($acumresta);

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
            $acumdebit = $acumdebit + $value["debit"];
            $acumcredit = $acumcredit + $value["credit"]; 
            $acumresta = $acumresta + $value["debit"] + $value["credit"];           
            $showdebit = abs($value["debit"]);  
            $showcredit = abs($value["credit"]);  
            $showresta = abs($value["debit"] + $value["credit"]);  

            $this->objPdf->SetFont('Arial','',9);                                       
            //$this->objPdf->Cell(189,5,'',0,1);                              
            $this->objPdf->Cell(30 ,5,$value["TIPO_ASI"],0,0);
            $this->objPdf->Cell(98 ,5,$value["nombre_asiento"],0,0);                             
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
           $showacumresta = abs($acumresta);     
           $showtotdebit = abs($totdebit);
           $showtotcredit = abs($totcredit);
           $showtotresta = abs($totresta);

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
      default:	
        $tags["typereport"] = "S";
        $tags["template_js"][] = "reports";     
        Vista::render('rpt_acc_journalsummary', $tags);  	
      break;  
    }
  }	
}
?>