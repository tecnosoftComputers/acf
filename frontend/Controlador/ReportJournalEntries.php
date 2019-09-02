<?php
class Controlador_ReportJournalEntries extends Controlador_Reports {

  public function construirPagina(){   
    $tags = array();    
    if(!Utils::estaLogueado()){
      header("Location: ../login.php");
    } 
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
        $tags["type_seats"] = Modelo_TypeSeat::searchSeat();
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
            if ($this->objPdf->GetY() > 370){
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
                $this->objPdf->Cell(30 ,5,number_format($acum_debits,2),0,0,'R');
                $this->objPdf->Cell(30 ,5,number_format(abs($acum_credit),2),0,0,'R');                  
                $this->objPdf->Cell(189  ,5,'',0,1);                  
                $this->objPdf->Cell(189  ,5,'',0,1);
              }                     
              $this->objPdf->SetFont('Arial','B',9);                           
              $this->objPdf->Cell(30 ,5,"Date: ".date("m/d/Y",strtotime($value["FECHA_ASI"])),0,0);
              $this->objPdf->Cell(50 ,5,"No. ".$typeseat." ".$value["ASIENTO"],0,0);
              $this->objPdf->Cell(200 ,5,$value["DESC_ASI"],0,0);
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
            $this->objPdf->Cell(30 ,5,$value['DOCUMENTO'],0,0);                 
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
          $acum_debits = 0;
          $acum_credits = 0;
          $seataux = '';             
          foreach ($results as $key => $item) {
            if ($item["ASIENTO"] != $seataux){
              if (!empty($key)){                                  
                $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':H'.$cont)->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('G'.$cont.':H'.$cont)->applyFromArray($CStyle);
                $objPHPExcel->getActiveSheet()->getStyle('G'.$cont.':H'.$cont)->applyFromArray($AmtStyle);
                $objPHPExcel->setActiveSheetIndex(0)              
                  ->setCellValue('G'.$cont, " ".number_format($acum_debits,2))
                  ->setCellValue('H'.$cont, " ".number_format(abs($acum_credits),2));
                                  
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
              $objPHPExcel->getActiveSheet()->mergeCells('C'.$cont.':H'.$cont);                
              $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':H'.$cont)->applyFromArray($styleArray);
              $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':H'.$cont)->applyFromArray($BoldStyle);
              $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$cont, "Date: ".date("m/d/Y",strtotime($item["FECHA_ASI"])))
                ->setCellValue('B'.$cont, "No. ".$typeseat." ".$item["ASIENTO"])
                ->setCellValue('C'.$cont, $item["DESC_ASI"]);
                    
              $seataux = $item["ASIENTO"]; 
              $acum_debits = 0;
              $acum_credits = 0;                
              $cont++; 
            }
            
            $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':H'.$cont)->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet()->getStyle('G'.$cont.':H'.$cont)->applyFromArray($AmtStyle); 
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
            $objPHPExcel->getActiveSheet()->getStyle('F'.$cont)->getAlignment()->setWrapText(true);         
            $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue('A'.$cont, " ".$item['CODMOV'])
              ->setCellValue('B'.$cont, $item['NOMBRE'])
              ->setCellValue('C'.$cont, $item['TIPO'])
              ->setCellValue('D'.$cont, $item['REFER'])
              ->setCellValue('E'.$cont, $item['DOCUMENTO'])
              ->setCellValue('F'.$cont, $item['CONCEPTO'])
              ->setCellValue('G'.$cont, $debit)
              ->setCellValue('H'.$cont, $credit)
            ;              
            
            $cont++;      
          }
                      
          $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':H'.$cont)->applyFromArray($styleArray);
          $objPHPExcel->getActiveSheet()->getStyle('G'.$cont.':H'.$cont)->applyFromArray($CStyle);  
          $objPHPExcel->getActiveSheet()->getStyle('G'.$cont.':H'.$cont)->applyFromArray($AmtStyle);
          $objPHPExcel->setActiveSheetIndex(0)              
            ->setCellValue('G'.$cont, " ".number_format($acum_debits,2))
            ->setCellValue('H'.$cont, " ".number_format(abs($acum_credits),2));            
        }

        $this->outputExcel("JOURNAL_ENTRIES_REPORT");
      break;   
      default:  
        $tags["type_seats"] = Modelo_TypeSeat::searchSeat();
        $tags["template_js"][] = "reports";        
        Vista::render('rpt_acc_journalentries', $tags);       
      break;
    }
  }
}  
?>