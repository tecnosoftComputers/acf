<?php
class Controlador_Reports extends Controlador_Base {

  public $objExcel;
  public $objPdf;
  
  public function construirPagina(){  
    $tags = array();    
    if(!Utils::estaLogueado()){
      header("Location: ../login.php");
    } 
    $option = Utils::getParam('option','',$this->data); 
    switch($option){
      case 'journalEntries': 
        $action = Utils::getParam('action','',$this->data); 
        //echo $_SESSION['acfSession']['id_empresa'];   
        if ($action == "search"){
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
          $tags["result"] = Modelo_Dpmovimi::report($_SESSION['acfSession']['id_empresa'],$datefrom,$dateto,$typeseat,$seatfrom,$seatto); 
          $tags["type_seats"] = Modelo_TypeSeat::searchSeat();
          $tags["template_js"][] = "reports";        
          Vista::render('rpt_acc_journalentries', $tags);
        }
        elseif($action == "pdf"){          
          $aux_datefrom = Utils::getParam('datefrom','',$this->data);                              
          $datefrom = (!empty($aux_datefrom)) ? date("Y-m-d", $aux_datefrom) : date('Y-m-d');                   
          $aux_dateto = Utils::getParam('dateto','',$this->data);
          $dateto = (!empty($aux_dateto)) ? date("Y-m-d", $aux_dateto) : date('Y-m-d'); 
          $typeseat = Utils::getParam('typeseat','',$this->data);
          $typeseat = (!empty($typeseat)) ? $typeseat : 'EGRE';         
          $seatfrom = Utils::getParam('seatfrom','',$this->data); 
          $seatfrom = (!empty($seatfrom)) ? $seatfrom : '';
          $seatfrom = (!empty($seatfrom)) ? str_pad($seatfrom,8, "0", STR_PAD_LEFT) : '';
          $seatto = Utils::getParam('seatto','',$this->data); 
          $seatto = (!empty($seatto)) ? $seatto : '';
          $seatto = (!empty($seatto)) ? str_pad($seatto,8, "0", STR_PAD_LEFT) : '';           
          $results = Modelo_Dpmovimi::report($_SESSION['acfSession']['id_empresa'],$datefrom,$dateto,$typeseat,$seatfrom,$seatto); 
                    
          $from = date("m/d/Y", strtotime($datefrom));
          $to = date("m/d/Y", strtotime($dateto));    
          $this->printHeaderPdf("JOURNAL ENTRIES REPORT",$from,$to); 

          $columns = array();
          $columns[] = array("width"=>30,"label"=>"ACCOUNT");  
          $columns[] = array("width"=>60,"label"=>"NAME ACCOUNT");  
          $columns[] = array("width"=>110,"label"=>"CONCEPT");  
          $columns[] = array("width"=>40,"label"=>"DEBIT");
          $columns[] = array("width"=>40,"label"=>"CREDIT");    
          $this->printHeaderTablePdf($columns);
         
          $this->objPdf->SetFont('Arial','',9); 

          if (!empty($results)){
            $acum_debits = 0;
            $acum_credits = 0;
            $seataux = ''; 
            $sum_h = 65;
            foreach($results as $key=>$value){                            
              if ($value["ASIENTO"] != $seataux){
                if (!empty($key)){ 
                  $this->objPdf->SetXY(210, $this->objPdf->GetY());                  
                  $this->objPdf->Cell(40, 5,'____________________',0,0);
                  $this->objPdf->Cell(40, 5,'____________________',0,0);
                  $this->objPdf->Cell(189  ,5,'',0,1);                  
                  $this->objPdf->SetXY(210, $this->objPdf->GetY());                  
                  $this->objPdf->Cell(40 ,5,number_format($acum_debits,2),0,0);
                  $this->objPdf->Cell(40 ,5,number_format($acum_credit*-1,2),0,0);                  
                  $this->objPdf->Cell(189  ,5,'',0,1);                  
                  $this->objPdf->Cell(189  ,5,'',0,1);                  
                  $this->objPdf->Cell(189  ,5,'',0,1);                                    
                }                                                
                $this->objPdf->Cell(30 ,5,"Date: ".date("m/d/Y",strtotime($value["FECHA_ASI"])),0,0);
                $this->objPdf->Cell(50 ,5,"No. ".$typeseat." ".$value["ASIENTO"],0,0);
                $this->objPdf->Cell(200 ,5,$value["DESC_ASI"],0,0);
                $seataux = $value["ASIENTO"]; 
                $acum_debits = 0;
                $acum_credit = 0;
              }                
              $this->objPdf->Cell(189  ,5,'',0,1);   
              $this->objPdf->Cell(189  ,5,'',0,1);                              
              $this->objPdf->Cell(30 ,5,$value['CODMOV'],0,0);
              $this->objPdf->Cell(60 ,5,$value['NOMBRE'],0,0);                 
              $starty = $this->objPdf->GetY();              
              $this->objPdf->MultiCell(110,4,trim($value['CONCEPTO']), 0, 'L', 0);              
              $this->objPdf->SetXY(210, $starty);              
              if ($value["IMPORTE"] > 0){                             
                $this->objPdf->Cell(40 ,5,number_format($value['IMPORTE'],2),0,0);
                $this->objPdf->Cell(40 ,5,'0.00',0,0);      
                $acum_debits = $acum_debits + $value['IMPORTE'];
              }
              else{
                $this->objPdf->Cell(40 ,5,'0.00',0,0);
                $this->objPdf->Cell(40 ,5,number_format($value['IMPORTE'],2),0,0);       
                $acum_credit = $acum_credit + $value['IMPORTE'];
              }              
              $this->objPdf->Cell(189  ,5,'',0,1);//end of line              
            }
            $this->objPdf->Cell(189  ,5,'',0,1);            
            $this->objPdf->SetXY(210, $this->objPdf->GetY());              
            $this->objPdf->Cell(40, 5,'____________________',0,0);
            $this->objPdf->Cell(40, 5,'____________________',0,0);
            $this->objPdf->Cell(189  ,5,'',0,1);      
            $this->objPdf->SetXY(210, $this->objPdf->GetY());        
            $this->objPdf->Cell(40 ,5,number_format($acum_debits,2),0,0);
            $this->objPdf->Cell(40 ,5,number_format($acum_credit*-1,2),0,0);            
            $this->objPdf->Output();
          }
        } 
        elseif($action == "excel"){
          $aux_datefrom = Utils::getParam('datefrom','',$this->data);
          $datefrom = (!empty($aux_datefrom)) ? date("Y-m-d", $aux_datefrom) : date('Y-m-d');          
          $aux_dateto = Utils::getParam('dateto','',$this->data);
          $dateto = (!empty($aux_dateto)) ? date("Y-m-d", $aux_dateto) : date('Y-m-d'); 
          $typeseat = Utils::getParam('typeseat','',$this->data);
          $typeseat = (!empty($typeseat)) ? $typeseat : 'EGRE';         
          $seatfrom = Utils::getParam('seatfrom','',$this->data); 
          $seatfrom = (!empty($seatfrom)) ? $seatfrom : '';
          $seatfrom = (!empty($seatfrom)) ? str_pad($seatfrom,8, "0", STR_PAD_LEFT) : '';
          $seatto = Utils::getParam('seatto','',$this->data); 
          $seatto = (!empty($seatto)) ? $seatto : '';
          $seatto = (!empty($seatto)) ? str_pad($seatto,8, "0", STR_PAD_LEFT) : '';           
          $results = Modelo_Dpmovimi::report($_SESSION['acfSession']['id_empresa'],$datefrom,$dateto,$typeseat,$seatfrom,$seatto); 
                 
          $from = date("m/d/Y", strtotime($datefrom));
          $to = date("m/d/Y", strtotime($dateto));  
          $info_company = Modelo_Companie::searchCompanies($_SESSION['acfSession']['id_empresa']); 
           
          $columns = array(
                     'A'=>array("width"=>20,"label"=>"ACCOUNT"),
                     'B'=>array("width"=>40,"label"=>"NAME ACCOUNT"),
                     'C'=>array("width"=>70,"label"=>"CONCEPT"),
                     'D'=>array("width"=>20,"label"=>"DEBIT"),
                     'E'=>array("width"=>20,"label"=>"CREDIT")
                   );          
          $this->printHeaderExcel("JOURNAL ENTRIES REPORT",$columns,'D1',$info_company,$from,$to);
          $objPHPExcel = $this->objExcel;          

          $objPHPExcel->getActiveSheet()->mergeCells('A1:C1');
          $objPHPExcel->getActiveSheet()->mergeCells('A2:C2'); 
          $objPHPExcel->getActiveSheet()->mergeCells('A3:C3');
          $objPHPExcel->getActiveSheet()->mergeCells('A4:C4');
          $objPHPExcel->getActiveSheet()->mergeCells('A5:C5');
          $objPHPExcel->getActiveSheet()->mergeCells('A6:C6');          
          $objPHPExcel->getActiveSheet()->mergeCells('D1:E6');           
                    
          $cont = 10;

          $styleArray = array(
            'font'  => array(
              'bold'  => false,              
              'size'  => 10,
              'name'  => 'Arial'
            )
          );

          $CStyle = array(
            'borders' => array(
              'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
            ),
          );  

          if (!empty($results)){
            $acum_debits = 0;
            $acum_credits = 0;
            $seataux = '';             
            foreach ($results as $key => $item) {
              if ($item["ASIENTO"] != $seataux){
                if (!empty($key)){                                  
                  $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':E'.$cont)->applyFromArray($styleArray);
                  $objPHPExcel->getActiveSheet()->getStyle('D'.$cont.':E'.$cont)->applyFromArray($CStyle);
                  $objPHPExcel->setActiveSheetIndex(0)              
                    ->setCellValue('D'.$cont, number_format($acum_debits,2))
                    ->setCellValue('E'.$cont, number_format($acum_credits*-1,2));
                                    
                  $cont++;  
                  //print blank line
                  $objPHPExcel->setActiveSheetIndex(0)              
                    ->setCellValue('A'.$cont, '')
                    ->setCellValue('B'.$cont, '')
                    ->setCellValue('C'.$cont, '')
                    ->setCellValue('D'.$cont, '')
                    ->setCellValue('E'.$cont, '');
                  $cont++;   
                }
                $objPHPExcel->getActiveSheet()->mergeCells('C'.$cont.':E'.$cont);                
                $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':E'.$cont)->applyFromArray($styleArray);
                $objPHPExcel->setActiveSheetIndex(0)
                  ->setCellValue('A'.$cont, "Date: ".date("m/d/Y",strtotime($item["FECHA_ASI"])))
                  ->setCellValue('B'.$cont, "No. ".$typeseat." ".$item["ASIENTO"])
                  ->setCellValue('C'.$cont, $item["DESC_ASI"])                                    
                  ;    
                $seataux = $item["ASIENTO"]; 
                $acum_debits = 0;
                $acum_credits = 0;                
                $cont++; 
              }
              
              $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':E'.$cont)->applyFromArray($styleArray);
              if ($item["IMPORTE"] > 0){ 
                $debit = number_format($item['IMPORTE']);
                $credit = "0.00";
                $acum_debits = $acum_debits + $item['IMPORTE'];
              }
              else{
                $debit = "0.00";
                $credit = number_format($item['IMPORTE']); 
                $acum_credits = $acum_credits + $item['IMPORTE'];
              }
              $objPHPExcel->getActiveSheet()->getStyle('C'.$cont)->getAlignment()->setWrapText(true); 
              $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$cont, " ".$item['CODMOV'])
                ->setCellValue('B'.$cont, $item['NOMBRE'])
                ->setCellValue('C'.$cont, $item['CONCEPTO'])
                ->setCellValue('D'.$cont, $debit)
                ->setCellValue('E'.$cont, $credit)
              ;              
              
              $cont++;      
            }
                        
            $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':E'.$cont)->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet()->getStyle('D'.$cont.':E'.$cont)->applyFromArray($CStyle);  
            $objPHPExcel->setActiveSheetIndex(0)              
              ->setCellValue('D'.$cont, number_format($acum_debits,2))
              ->setCellValue('E'.$cont, number_format($acum_credits*-1,2));            
          }

          $this->outputExcel("JOURNAL_ENTRIES_REPORT");
        } 
        else{      
          $tags["type_seats"] = Modelo_TypeSeat::searchSeat();
          $tags["template_js"][] = "reports";        
          Vista::render('rpt_acc_journalentries', $tags);
        }
      break; 
      case 'chartAccount':
        $action = Utils::getParam('action','',$this->data);
        if ($action == "search"){
          $accfrom = Utils::getParam('accfrom','',$this->data);
          $accto = Utils::getParam('accto','',$this->data);
          $tags["accfrom"] = $accfrom;
          $tags["accto"] = $accto;
          $tags["results"] = Modelo_ChartAccount::report($accfrom,$accto);
          Vista::render('rpt_acc_chartaccount', $tags);
        }
        elseif($action == "pdf"){
          $accfrom = Utils::getParam('accfrom','',$this->data);
          $accto = Utils::getParam('accto','',$this->data);
          $results = Modelo_ChartAccount::report($accfrom,$accto);

          $this->printHeaderPdf("CHART ACCOUNTS REPORT",$accfrom,$accto); 

          $columns = array();
          $columns[] = array("width"=>80,"label"=>"ACCOUNT");  
          $columns[] = array("width"=>198,"label"=>"NAME ACCOUNT");  
          $this->printHeaderTablePdf($columns);  

          $this->objPdf->SetFont('Arial','',9);    

          if (!empty($results)){            
            foreach($results as $key=>$value){                            
              $nro = substr_count($value["CODIGO"],".");   
              $lastc = substr($value["CODIGO"], -1);

              $blank_spaces = "";
              if ($nro>1){
                for($i=1;$i<$nro;$i++){
                  $blank_spaces .= "  ";
                }
              }   
              if ($lastc == '.'){
                $this->objPdf->SetFont('Arial','B',9);
                $this->objPdf->Cell(80 ,5,$value['CODIGO'],0,0);
                $this->objPdf->Cell(198 ,5,$blank_spaces.$value['NOMBRE'],0,0);                
              }     
              else{
                $blank_spaces .= "   ";
                $this->objPdf->SetFont('Arial','',9);
                $this->objPdf->Cell(80 ,5,$value['CODIGO'],0,0);
                $this->objPdf->Cell(198 ,5,$blank_spaces.$value['NOMBRE'],0,0);                                
              }               
              $this->objPdf->Cell(189  ,5,'',0,1);//end of line              
            }                      
            $this->objPdf->Output();
          }
        }
        elseif($action == "excel"){
          $accfrom = Utils::getParam('accfrom','',$this->data);
          $accto = Utils::getParam('accto','',$this->data);
          $results = Modelo_ChartAccount::report($accfrom,$accto);    

          $info_company = Modelo_Companie::searchCompanies($_SESSION['acfSession']['id_empresa']); 

          $columns = array(
                     'A'=>array("width"=>50, "label"=>"ACCOUNT"),
                     'B'=>array("width"=>100, "label"=>"NAME ACCOUNT")
                   );          
          $this->printHeaderExcel("CHART ACCOUNTS REPORT",$columns,'B1',$info_company,$accfrom,$accto);                    
          $objPHPExcel = $this->objExcel;                                              

          $objPHPExcel->getActiveSheet()->mergeCells('B1:B6');          
          $cont = 10;

          $styleArray = array(
            'font'  => array(
              'bold'  => false,              
              'size'  => 10,
              'name'  => 'Arial'
            )
          );

          if (!empty($results)){               
            foreach ($results as $key => $item) {              
              $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':B'.$cont)->applyFromArray($styleArray);
              $nro = substr_count($item["CODIGO"],".");   
              $lastc = substr($item["CODIGO"], -1);

              $blank_spaces = "";
              if ($nro>1){
                for($i=1;$i<$nro;$i++){
                  $blank_spaces .= "  ";
                }
              }   
              if ($lastc == '.'){                
                $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':B'.$cont)->getFont()->setBold(true);
                $objPHPExcel->setActiveSheetIndex(0)
                  ->setCellValue('A'.$cont, " ".$item['CODIGO'])
                  ->setCellValue('B'.$cont, $blank_spaces.$item['NOMBRE']);
              }     
              else{
                $blank_spaces .= "   ";                
                $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':B'.$cont)->getFont()->setBold(false); 
                $objPHPExcel->setActiveSheetIndex(0)
                  ->setCellValue('A'.$cont, " ".$item['CODIGO'])
                  ->setCellValue('B'.$cont, $blank_spaces.$item['NOMBRE']);                
              }                               
              
              $cont++;      
            }            
          }

          $this->outputExcel("CHART_ACCOUNTS_REPORT");          
        }
        else{
          Vista::render('rpt_acc_chartaccount', array());
        }
      break;        
      default:         
      break;
    }
    
  }

  public function printHeaderPdf($title,$from,$to){
    $info_company = Modelo_Companie::searchCompanies($_SESSION['acfSession']['id_empresa']);
    $this->objPdf = new FPDF('P','mm','A3');
    $this->objPdf->AddPage();
    $this->objPdf->SetFont('Arial','B',12);
    $this->objPdf->Cell(189  ,10,'',0,1);//end of line
    $this->objPdf->Image(FRONTEND_RUTA.'imagenes/logoinicial.jpg', 239,10,50,26,'JPG');
    $this->objPdf->Cell(80 ,5,$info_company["nombre_empresa"],0,1);//end of line       
    $this->objPdf->SetFont('Arial','',10);   
    $this->objPdf->Cell(59 ,5,$info_company["direccion_empresa"],0,1);//end of line
    $this->objPdf->Cell(59 ,5,$info_company["telefono_empresa"],0,1);//end of line
    $this->objPdf->Cell(189  ,10,'',0,1); //end of line
    $this->objPdf->SetFont('Arial','B',10);   
    $this->objPdf->Cell(246 ,5,$title,0,0);//end of line 
    $this->objPdf->Cell(250 ,5,'Page: '.$this->objPdf->PageNo(),0,1);              
    $this->objPdf->SetFont('Arial','',11);
    $this->objPdf->Cell(11 ,5,'From:',0,0);
    $this->objPdf->Cell(28 ,5, $from ,0,0);
    $this->objPdf->Cell(7, 5,'To:',0,0);
    $this->objPdf->Cell(200 ,5, $to,0,0);
    $this->objPdf->Cell(11 ,5,'Date:',0,0);
    $this->objPdf->Cell(58 ,5,date('m/d/Y'),0,0);    
    $this->objPdf->SetFont('Arial','',10);
    $this->objPdf->Cell(189  ,10,'',0,1); //end of line          
  }

  public function printHeaderTablePdf($columns){
    $this->objPdf->SetFont('Arial','B',10);
    foreach($columns as $key=>$value){
      $this->objPdf->Cell($value["width"] ,5,$value["label"],1,0);
    }
    $this->objPdf->Cell(189  ,10,'',0,1); //end of line           
  }

  public function printHeaderExcel($title,$columns,$columlogo,$info_company,$from,$to){
    $this->objExcel = new PHPExcel();          
    $this->objExcel->getActiveSheet()->getPageSetup()
                   ->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
    $this->objExcel->getActiveSheet()->getPageMargins()->setTop(0.3);
    $this->objExcel->getActiveSheet()->getPageMargins()->setRight(0.3);
    $this->objExcel->getActiveSheet()->getPageMargins()->setLeft(0.3);
    $this->objExcel->getActiveSheet()->getPageMargins()->setBottom(0.3);            
    $this->objExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);    
    $this->objExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
    $this->objExcel->getProperties()
                   ->setCreator("Lcda. Fernanda Fueltala")
                   ->setTitle($title)
                   ->setSubject($title)
                   ->setCategory($title);
    foreach($columns as $key=>$value){
      $this->objExcel->getActiveSheet()->getColumnDimension($key)->setWidth($value["width"]);
    }
    //logo
    $objDrawing = new PHPExcel_Worksheet_Drawing(); 
    $objDrawing->setName('Logo'); 
    $objDrawing->setDescription('Logo'); 
    $objDrawing->setPath(FRONTEND_RUTA.'imagenes/logoinicial.jpg'); 
    $objDrawing->setCoordinates($columlogo); 
    
    //setOffsetX works properly 
    $objDrawing->setOffsetX(60);//360 
    $objDrawing->setOffsetY(5); 
    //set width, height 
    $objDrawing->setWidth(110); 
    $objDrawing->setHeight(110); 
    $objDrawing->setWorksheet($this->objExcel->getActiveSheet());

    //company name
    $styleArray = array(
      'font'  => array(
        'bold'  => true,              
        'size'  => 12,
        'name'  => 'Arial'
    ));               
    $this->objExcel->setActiveSheetIndex(0)
                   ->setCellValue('A1', $info_company["nombre_empresa"]);
    $this->objExcel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);

    //address company
    $styleArray = array(
      'font'  => array(
        'bold'  => false,              
        'size'  => 10,
        'name'  => 'Arial'
    ));
    $this->objExcel->setActiveSheetIndex(0)
                   ->setCellValue('A2', $info_company["direccion_empresa"]);
    $this->objExcel->getActiveSheet()->getStyle('A2')->applyFromArray($styleArray);

    //telephone company
    $this->objExcel->setActiveSheetIndex(0)
                   ->setCellValue('A3', $info_company["telefono_empresa"]);
    $this->objExcel->getActiveSheet()->getStyle('A3')->applyFromArray($styleArray);

    //title
    $styleArray = array(
      'font'  => array(
        'bold'  => true,              
        'size'  => 11,
        'name'  => 'Arial'
    ));
    $this->objExcel->setActiveSheetIndex(0)
                   ->setCellValue('A6', $title);
    $this->objExcel->getActiveSheet()->getStyle('A6')->applyFromArray($styleArray);

    //dates
    $styleArray = array(
      'font'  => array(
        'bold'  => false,              
        'size'  => 10,
        'name'  => 'Arial'
    ));
    $this->objExcel->setActiveSheetIndex(0)
                   ->setCellValue('A7', 'From: '.$from. 'To: '.$to.' '.'Date: '.date('m/d/Y')); 
    $this->objExcel->getActiveSheet()->getStyle('A7')->applyFromArray($styleArray);           
              
    //header
    $styleArray = array(
      'borders' => array(
        'allborders' => array(
           'style' => PHPExcel_Style_Border::BORDER_THIN
         )
      ),
      'font'  => array(
        'bold'  => true,              
        'size'  => 11,
        'name'  => 'Arial'
      )
    ); 
    
    foreach($columns as $key=>$value){              
       $this->objExcel->setActiveSheetIndex(0)->setCellValue($key.'9', $value["label"]); 
       $this->objExcel->getActiveSheet()->getStyle($key.'9')->applyFromArray($styleArray);       
    }    
  }

  public function outputExcel($title){
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$title.'.xlsx"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($this->objExcel, 'Excel2007');
    $objWriter->save('php://output');    
  }

}  
?>