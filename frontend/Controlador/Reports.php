<?php
class Controlador_Reports extends Controlador_Base {

  public $objExcel;
  public $objPdf;
  public $limitline = 370;
  public $line = 10;
  public $vlrecords = array(10,25,50,100);
  public $hexcel = 20;

  //style for all cells
  public $styleArray = array(
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

  //style for line before totals
  public $CStyle = array(
          'borders' => array(
            'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
          )
         );

  //style for amounts
  public $AmtStyle = array(            
          'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
          )
         );

  //style bold
  public $BoldStyle = array(            
          'font'  => array(
            'bold'  => true,                           
          )
        );
  
  public function construirPagina(){}

  public function printHeaderPdf($title,$from,$to,$new=false){
    $info_company = Modelo_Companie::searchCompanies($_SESSION['acfSession']['id_empresa']);
    if ($new == true){
      $this->objPdf = new FPDF('P','mm','A3'); 
      //$this->objPdf->SetMargins(7,7);     
      $this->objPdf->AddPage();
    }
    $this->objPdf->Image(FRONTEND_RUTA.PATH_LOGO.$info_company["rentas_logo"], 239,10,50,26,'JPG');

    $this->objPdf->SetFont('Arial','B',14);
    $this->objPdf->Cell(189  ,5,'',0,1);//end of line
    
    $this->objPdf->Cell(80 ,5,$info_company["nombre_empresa"],0,1);//end of line       
    $this->objPdf->SetFont('Arial','',10);   
    $this->objPdf->Cell(59 ,5,$info_company["direccion_empresa"],0,1);//end of line
    $this->objPdf->Cell(59 ,5,$info_company["telefono_empresa"],0,1);//end of line
    $this->objPdf->Cell(189  ,5,'',0,1); //end of line
    $this->objPdf->SetFont('Arial','B',12);   
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
      $this->objPdf->Cell($value["width"],8,$value["label"],1,0,'C');      
    }    
    $this->objPdf->Cell(189,10,'',0,1); //end of line                       
    $this->objPdf->SetLineWidth(1.2);
    $this->objPdf->Line(11, 58, 287, 58);
    $this->objPdf->Cell(189,1,'',0,1); //end of line                       
    $this->objPdf->SetLineWidth(0.2);
  }

  public function printHeaderExcel($title,$columns,$columlogo,$setxlogo,$info_company,$from,$to){
    $this->objExcel = new PHPExcel();          
    $this->objExcel->getActiveSheet()->getPageSetup()
                   ->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
    $this->objExcel->getActiveSheet()->getPageMargins()->setTop(0.2);
    $this->objExcel->getActiveSheet()->getPageMargins()->setRight(0.2);
    $this->objExcel->getActiveSheet()->getPageMargins()->setLeft(0.2);
    $this->objExcel->getActiveSheet()->getPageMargins()->setBottom(0.2);            
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
    $objDrawing->setPath(FRONTEND_RUTA.PATH_LOGO.$info_company["rentas_logo"]); 
    $objDrawing->setCoordinates($columlogo); 
    
    //setOffsetX works properly 
    $objDrawing->setOffsetX($setxlogo);//360 80
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
    $this->objExcel->getActiveSheet()->getRowDimension('1')->setRowHeight($this->hexcel); 

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
    $this->objExcel->getActiveSheet()->getRowDimension('2')->setRowHeight($this->hexcel); 

    //telephone company
    $this->objExcel->setActiveSheetIndex(0)
                   ->setCellValue('A3', $info_company["telefono_empresa"]);
    $this->objExcel->getActiveSheet()->getStyle('A3')->applyFromArray($styleArray);
    $this->objExcel->getActiveSheet()->getRowDimension('3')->setRowHeight($this->hexcel); 

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
    $this->objExcel->getActiveSheet()->getRowDimension('6')->setRowHeight($this->hexcel); 

    //dates
    $styleArray = array(
      'font'  => array(
        'bold'  => false,              
        'size'  => 10,
        'name'  => 'Arial'
    ));
    $this->objExcel->setActiveSheetIndex(0)
                   ->setCellValue('A7', 'From: '.$from. '     To: '.$to.' '.'     Date: '.date('m/d/Y'));     
    $this->objExcel->getActiveSheet()->getStyle('A7')->applyFromArray($styleArray);          
    $this->objExcel->getActiveSheet()->getRowDimension('7')->setRowHeight($this->hexcel); 
              
    //header
    $styleArray = array(      
      'borders' => array(
        'top' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
        ),
        'left' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
        ),
        'right' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
        ),
        'bottom' => array(
          'style' => PHPExcel_Style_Border::BORDER_THICK,
        ),
      ),
      'font'  => array(
        'bold'  => true,              
        'size'  => 11,
        'name'  => 'Arial'
      ),
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
      )
    ); 
    
    foreach($columns as $key=>$value){              
       $this->objExcel->setActiveSheetIndex(0)->setCellValue($key.'9', $value["label"]); 
       $this->objExcel->getActiveSheet()->getStyle($key.'9')->applyFromArray($styleArray);       
    }        
    $this->objExcel->getActiveSheet()->getRowDimension('9')->setRowHeight($this->hexcel); 
    $this->objExcel->getActiveSheet()->mergeCells('A7:'.$key.'7');    
  }

  public function outputExcel($title){
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$title.'.xlsx"');    
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($this->objExcel, 'Excel2007');
    //ob_end_clean();
    $objWriter->save('php://output');    
  }
}
?>