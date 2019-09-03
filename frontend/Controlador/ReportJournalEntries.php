<?php
class Controlador_ReportJournalEntries extends Controlador_Reports {

  public $module = 31;

  public function construirPagina(){   
    $tags = array();    
    if(!Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/login.php");
    } 

    //Utils::log(print_r($_SESSION['acfSession']['permission'],true));
    $action = Utils::getParam('action','',$this->data);
    $orderby = array("c.FECHA_ASI", "c.ASIENTO");         
    switch($action){
      case 'search':                         
        $aux_datefrom = Utils::getParam('datefrom','',$this->data);
        $datefrom = (!empty($aux_datefrom)) ? date("Y-m-d", strtotime($aux_datefrom)) : date('Y-m-d');
        $aux_dateto = Utils::getParam('dateto','',$this->data);
        $dateto = (!empty($aux_dateto)) ? date("Y-m-d", strtotime($aux_dateto)) : date('Y-m-d'); 
        $typeseat = Utils::getParam('typeseatfrom','',$this->data);         
        $seatfrom = Utils::getParam('seatfrom','',$this->data); 
        $seatfrom = (!empty($seatfrom)) ? str_pad($seatfrom,8, "0", STR_PAD_LEFT) : '';
        $seatto = Utils::getParam('seatto','',$this->data); 
        $seatto = (!empty($seatto)) ? str_pad($seatto,8, "0", STR_PAD_LEFT) : ''; 

        $tags["datefrom"] = $aux_datefrom;  
        $tags["dateto"] = $aux_dateto; 
        $tags["datefromdb"] = strtotime($datefrom); 
        $tags["datetodb"] = strtotime($dateto); 
        $tags["typeseat"] = $typeseat; 
        $tags["seatfrom"] = $seatfrom;  
        $tags["seatto"] = $seatto;  
        $tags["result"] = Modelo_Dpmovimi::report($_SESSION['acfSession']['id_empresa'],$datefrom,
                                                  $dateto,$typeseat,$seatfrom,$seatto,'','',$orderby);
        if (empty($tags["result"])){          
          $_SESSION['acfSession']['mostrar_error'] = "Not found records";
        }
        $tags["type_seats"] = Modelo_TypeSeat::searchSeat();
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->module];
        $tags["template_js"][] = "reports";        
        Vista::render('rpt_acc_journalentries', $tags);        
      break;
      case 'pdf':
        $aux_datefrom = Utils::getParam('datefrom','',$this->data);                              
        $datefrom = (!empty($aux_datefrom)) ? date("Y-m-d", $aux_datefrom) : date('Y-m-d');                   
        $aux_dateto = Utils::getParam('dateto','',$this->data);
        $dateto = (!empty($aux_dateto)) ? date("Y-m-d", $aux_dateto) : date('Y-m-d'); 
        $typeseat = Utils::getParam('typeseat','',$this->data);
        //$typeseat = (!empty($typeseat)) ? $typeseat : 'EGRE';         
        $seatfrom = Utils::getParam('seatfrom','',$this->data); 
        $seatfrom = (!empty($seatfrom)) ? $seatfrom : '';
        $seatfrom = (!empty($seatfrom)) ? str_pad($seatfrom,8, "0", STR_PAD_LEFT) : '';
        $seatto = Utils::getParam('seatto','',$this->data); 
        $seatto = (!empty($seatto)) ? $seatto : '';
        $seatto = (!empty($seatto)) ? str_pad($seatto,8, "0", STR_PAD_LEFT) : '';           
        $results = Modelo_Dpmovimi::report($_SESSION['acfSession']['id_empresa'],$datefrom,
                                           $dateto,$typeseat,$seatfrom,$seatto,'','',$orderby); 
                  
        $from = date("m/d/Y", strtotime($datefrom));
        $to = date("m/d/Y", strtotime($dateto));    
        $this->printHeaderPdf("JOURNAL ENTRIES REPORT",$from,$to,true); 

        $columns = array();
        $columns[] = array("width"=>30,"label"=>"ACCOUNT");  
        $columns[] = array("width"=>45,"label"=>"NAME ACCOUNT");  
        $columns[] = array("width"=>15,"label"=>"TYPE");  
        $columns[] = array("width"=>25,"label"=>"REFERENCE");  
        $columns[] = array("width"=>30,"label"=>"SETTLEMENT");  
        $columns[] = array("width"=>73,"label"=>"CONCEPT");  
        $columns[] = array("width"=>30,"label"=>"DEBIT");
        $columns[] = array("width"=>30,"label"=>"CREDIT");    
        $this->printHeaderTablePdf($columns);
       
        $this->objPdf->SetFont('Arial','',9); 

        if (!empty($results)){
          $acum_debits = 0;
          $acum_credits = 0;
          $seataux = ''; 
         
          foreach($results as $key=>$value){                                           
            if ($this->objPdf->GetY() > $this->limitline){
              $this->objPdf->AddPage();
              $this->printHeaderPdf("JOURNAL ENTRIES REPORT",$from,$to);   
              $this->printHeaderTablePdf($columns);              
            }                    
            if ($value["ASIENTO"] != $seataux){
              if (!empty($key)){ 
                $this->objPdf->SetFont('Arial','',9);
                $this->objPdf->SetXY(224, $this->objPdf->GetY());                  
                $this->objPdf->Cell(30, 5,'________________',0,0);
                $this->objPdf->Cell(30, 5,'________________',0,0);
                $this->objPdf->Cell(189  ,5,'',0,1);                  
                $this->objPdf->SetXY(224, $this->objPdf->GetY());                  
                $this->objPdf->SetFont('Arial','B',9);
                $this->objPdf->Cell(30 ,5,number_format($acum_debits,2),0,0,'R');
                $this->objPdf->Cell(30 ,5,number_format(abs($acum_credit),2),0,0,'R');                  
                $this->objPdf->Cell(189  ,5,'',0,1);                  
                $this->objPdf->Cell(189  ,5,'',0,1);
              }                     
              $this->objPdf->SetFont('Arial','B',9);                           
              $this->objPdf->Cell(30 ,5,"Date: ".date("m/d/Y",strtotime($value["FECHA_ASI"])),0,0);
              $this->objPdf->Cell(45 ,5,"No. ".$typeseat." ".$value["ASIENTO"],0,0);
              $this->objPdf->Cell(200 ,5,$value["DESC_ASI"]."  ".$value["cabliquida"],0,0);
              $seataux = $value["ASIENTO"]; 
              $acum_debits = 0;
              $acum_credit = 0;
            }    
            $this->objPdf->SetFont('Arial','',9);                                       
            $this->objPdf->Cell(189,5,'',0,1);                              
            $this->objPdf->Cell(30 ,5,$value['CODMOV'],0,0);
            $this->objPdf->Cell(45 ,5,$value['NOMBRE'],0,0);                 
            $this->objPdf->Cell(15 ,5,$value['TIPO'],0,0);                 
            $this->objPdf->Cell(25 ,5,$value['REFER'],0,0);                 
            $this->objPdf->Cell(30 ,5,$value['LIQUIDA_NO'],0,0);                 
            $starty = $this->objPdf->GetY();              
            $this->objPdf->MultiCell(73,3,trim($value['CONCEPTO']), 0, 'L', 0);
            $this->objPdf->SetXY(224, $starty);              
            if ($value["IMPORTE"] > 0){                             
              $this->objPdf->Cell(30 ,5,number_format($value['IMPORTE'],2),0,0,'R');
              $this->objPdf->Cell(30 ,5,'0.00',0,0,'R');      
              $acum_debits = $acum_debits + $value['IMPORTE'];
            }
            else{
              $this->objPdf->Cell(30 ,5,'0.00',0,0,'R');
              $this->objPdf->Cell(30 ,5,number_format(abs($value['IMPORTE']),2),0,0,'R');       
              $acum_credit = $acum_credit + $value['IMPORTE'];
            }              
            $this->objPdf->Cell(189  ,5,'',0,1);//end of line              
            $this->objPdf->Cell(189  ,5,'',0,1);//end of line                            
          }
          //$this->objPdf->SetFont('Arial','',9); 
          $this->objPdf->Cell(189  ,5,'',0,1);            
          $this->objPdf->SetXY(224, $this->objPdf->GetY());              
          $this->objPdf->Cell(30, 5,'________________',0,0);
          $this->objPdf->Cell(30, 5,'________________',0,0);
          $this->objPdf->Cell(189  ,5,'',0,1);      
          $this->objPdf->SetXY(224, $this->objPdf->GetY());  
          $this->objPdf->SetFont('Arial','B',9);      
          $this->objPdf->Cell(30 ,5,number_format($acum_debits,2),0,0,'R');
          $this->objPdf->Cell(30 ,5,number_format(abs($acum_credit),2),0,0,'R');                      
        } 
        $this->objPdf->Output();  
      break;    
      case 'excel':
        $aux_datefrom = Utils::getParam('datefrom','',$this->data);
        $datefrom = (!empty($aux_datefrom)) ? date("Y-m-d", $aux_datefrom) : date('Y-m-d');          
        $aux_dateto = Utils::getParam('dateto','',$this->data);
        $dateto = (!empty($aux_dateto)) ? date("Y-m-d", $aux_dateto) : date('Y-m-d'); 
        $typeseat = Utils::getParam('typeseat','',$this->data);
        //$typeseat = (!empty($typeseat)) ? $typeseat : 'EGRE';         
        $seatfrom = Utils::getParam('seatfrom','',$this->data); 
        $seatfrom = (!empty($seatfrom)) ? $seatfrom : '';
        $seatfrom = (!empty($seatfrom)) ? str_pad($seatfrom,8, "0", STR_PAD_LEFT) : '';
        $seatto = Utils::getParam('seatto','',$this->data); 
        $seatto = (!empty($seatto)) ? $seatto : '';
        $seatto = (!empty($seatto)) ? str_pad($seatto,8, "0", STR_PAD_LEFT) : '';           
        $results = Modelo_Dpmovimi::report($_SESSION['acfSession']['id_empresa'],$datefrom,$dateto,
                                           $typeseat,$seatfrom,$seatto,'','',$orderby); 
               
        $from = date("m/d/Y", strtotime($datefrom));
        $to = date("m/d/Y", strtotime($dateto));  
        $info_company = Modelo_Companie::searchCompanies($_SESSION['acfSession']['id_empresa']); 
         
        $columns = array(
                   'A'=>array("width"=>18,"label"=>"ACCOUNT"),
                   'B'=>array("width"=>30,"label"=>"NAME ACCOUNT"),
                   'C'=>array("width"=>10,"label"=>"TYPE"),
                   'D'=>array("width"=>20,"label"=>"REFERENCE"),
                   'E'=>array("width"=>20,"label"=>"SETTLEMENT"),
                   'F'=>array("width"=>50,"label"=>"CONCEPT"),
                   'G'=>array("width"=>20,"label"=>"DEBIT"),
                   'H'=>array("width"=>20,"label"=>"CREDIT")
                 );          
        $this->printHeaderExcel("JOURNAL ENTRIES REPORT",$columns,'G1',80,$info_company,$from,$to);
        $objPHPExcel = $this->objExcel;          

        $objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
        $objPHPExcel->getActiveSheet()->mergeCells('A2:F2'); 
        $objPHPExcel->getActiveSheet()->mergeCells('A3:F3');
        $objPHPExcel->getActiveSheet()->mergeCells('A4:F4');
        $objPHPExcel->getActiveSheet()->mergeCells('A5:F5');
        $objPHPExcel->getActiveSheet()->mergeCells('A6:F6');          
        $objPHPExcel->getActiveSheet()->mergeCells('G1:H6');
      
        if (!empty($results)){
          $acum_debits = 0;
          $acum_credits = 0;
          $seataux = '';             
          foreach ($results as $key => $item) {
            if ($item["ASIENTO"] != $seataux){
              if (!empty($key)){                                  
                $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':H'.$this->line)->applyFromArray($this->styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('G'.$this->line.':H'.$this->line)->applyFromArray($this->CStyle);
                $objPHPExcel->getActiveSheet()->getStyle('G'.$this->line.':H'.$this->line)->applyFromArray($this->AmtStyle);
                $objPHPExcel->getActiveSheet()->getStyle('G'.$this->line.':H'.$this->line)->applyFromArray($this->BoldStyle);
                $objPHPExcel->setActiveSheetIndex(0)              
                  ->setCellValue('G'.$this->line, " ".number_format($acum_debits,2))
                  ->setCellValue('H'.$this->line, " ".number_format(abs($acum_credits),2));
                                  
                $this->line++;  
                //print blank line
                $objPHPExcel->setActiveSheetIndex(0)              
                  ->setCellValue('A'.$this->line, '')
                  ->setCellValue('B'.$this->line, '')
                  ->setCellValue('C'.$this->line, '')
                  ->setCellValue('D'.$this->line, '')
                  ->setCellValue('E'.$this->line, '')
                  ->setCellValue('F'.$this->line, '');
                $this->line++;   
              }
              $objPHPExcel->getActiveSheet()->mergeCells('C'.$this->line.':H'.$this->line);                
              $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':H'.$this->line)->applyFromArray($this->styleArray);
              $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':H'.$this->line)->applyFromArray($this->BoldStyle);
              $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$this->line, "Date: ".date("m/d/Y",strtotime($item["FECHA_ASI"])))
                ->setCellValue('B'.$this->line, "No. ".$typeseat." ".$item["ASIENTO"])
                ->setCellValue('C'.$this->line, $item["DESC_ASI"]."   ".$item['cabliquida']);
                    
              $seataux = $item["ASIENTO"]; 
              $acum_debits = 0;
              $acum_credits = 0;                
              $this->line++; 
            }
            
            $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':H'.$this->line)->applyFromArray($this->styleArray);
            $objPHPExcel->getActiveSheet()->getStyle('G'.$this->line.':H'.$this->line)->applyFromArray($this->AmtStyle); 
            if ($item["IMPORTE"] > 0){                 
              $debit = " ".number_format($item['IMPORTE'],2);
              $credit = " 0.00";
              $acum_debits = $acum_debits + $item['IMPORTE'];
            }
            else{
              $debit = " 0.00";                
              $credit = " ".number_format(abs($item['IMPORTE']),2); 
              $acum_credits = $acum_credits + $item['IMPORTE'];
            }
            $objPHPExcel->getActiveSheet()->getStyle('F'.$this->line)->getAlignment()->setWrapText(true);         
            $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue('A'.$this->line, " ".$item['CODMOV'])
              ->setCellValue('B'.$this->line, $item['NOMBRE'])
              ->setCellValue('C'.$this->line, $item['TIPO'])
              ->setCellValue('D'.$this->line, $item['REFER'])
              ->setCellValue('E'.$this->line, $item['LIQUIDA_NO'])
              ->setCellValue('F'.$this->line, $item['CONCEPTO'])
              ->setCellValue('G'.$this->line, $debit)
              ->setCellValue('H'.$this->line, $credit)
            ;              
            
            $this->line++;      
          }
                      
          $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':H'.$this->line)->applyFromArray($this->styleArray);
          $objPHPExcel->getActiveSheet()->getStyle('G'.$this->line.':H'.$this->line)->applyFromArray($this->CStyle);
          $objPHPExcel->getActiveSheet()->getStyle('G'.$this->line.':H'.$this->line)->applyFromArray($this->AmtStyle);
          $objPHPExcel->getActiveSheet()->getStyle('G'.$this->line.':H'.$this->line)->applyFromArray($this->BoldStyle);
          $objPHPExcel->setActiveSheetIndex(0)              
            ->setCellValue('G'.$this->line, " ".number_format($acum_debits,2))
            ->setCellValue('H'.$this->line, " ".number_format(abs($acum_credits),2));            
        }

        $this->outputExcel("JOURNAL_ENTRIES_REPORT");
      break;   
      default:  
        $tags["type_seats"] = Modelo_TypeSeat::searchSeat();
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->module];
        $tags["template_js"][] = "reports";        
        Vista::render('rpt_acc_journalentries', $tags);       
      break;
    }
  }
}  
?>