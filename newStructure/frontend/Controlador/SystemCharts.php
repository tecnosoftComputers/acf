<?php
class Controlador_SystemCharts extends Controlador_Base {
  
  public function construirPagina(){
  
    $tags = array();    

    if(!Utils::estaLogueado()){
      header("Location: ../login.php");
    } 

    $opcion = Utils::getParam('opcion','',$this->data); 
    switch($opcion){
      case 'report':

        $systemCharts = Modelo_SystemCharts::search();
        $nombre_archivo = 'systemCharts_List';
        $tipo = Utils::getParam('tipo','',$this->data);

        if($tipo == 'excel'){

          $objPHPExcel = new PHPExcel();
          $objPHPExcel->getProperties()
            ->setCreator("Lcda. Mariana Vera")
            ->setTitle("SystemCharts List")
            ->setSubject("SystemCharts List")
            ->setCategory("SystemCharts List");

            $BStyle = array(
            'borders' => array(
                'allborders' => array(
                  'style' => PHPExcel_Style_Border::BORDER_THIN
                )
             ),
          );

          $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

          $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
          $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(80);
          $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(90);

          $objPHPExcel->getActiveSheet()->mergeCells('A1:B1'); 
          $objDrawing = new PHPExcel_Worksheet_Drawing(); 
          $objDrawing->setName('Logo'); 
          $objDrawing->setDescription('Logo'); 
          $objDrawing->setPath(FRONTEND_RUTA.'imagenes/logoinicial.jpg'); 
          $objDrawing->setCoordinates('B1'); 

          //setOffsetX works properly 
          $objDrawing->setOffsetX(360); 
          $objDrawing->setOffsetY(5); 
          //set width, height 
          $objDrawing->setWidth(110); 
          $objDrawing->setHeight(110); 
          $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

          $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue('A1', 'SYSTEM CHARTS LIST');

          $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true); 

          $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue('A2', 'CODE')
              ->setCellValue('B2', 'NAMES')
              ;

          $objPHPExcel->getActiveSheet()->getStyle('A2:B2')->getFont()->setBold(true);
          $objPHPExcel->getActiveSheet()->getStyle('A2:B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
          $objPHPExcel->getActiveSheet()->getStyle('A2:B2')->applyFromArray($BStyle);
          $objPHPExcel->getActiveSheet()->getStyle('A2:B2')->getFill()
            ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()->setRGB('808080');

          $cont = 3;

          $styleArray = array(
              'font' => array(
                  'bold' => true,
              ),
              'alignment' => array(
                  'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
              ),
          );

          foreach ($systemCharts as $key => $item) {

            $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':B'.$cont)->applyFromArray($BStyle);
            $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':B'.$cont)->applyFromArray($styleArray);
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$cont, $item['CODIGO'])
            ->setCellValue('B'.$cont, $item['NOMBRE'])
            ;

            $cont++;      
          }

          // indicar que se envia un archivo de Excel.
          header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          header('Content-Disposition: attachment;filename="'.$nombre_archivo.'.xlsx"');
          header('Cache-Control: max-age=0');
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
          $objWriter->save('php://output');
        
        }else{

          $pdf = new FPDF();
       
          $pdf->AddPage();
          $y_axis_initial = 25;
           $pdf->SetFont('Arial','B',12);
          $pdf->Cell(189  ,10,'',0,1);//end of line

          $pdf->Image(FRONTEND_RUTA.'imagenes/logoinicial.jpg', 139,10,50,26,'JPG');
          $pdf->Cell(59,5,'SYSTEM CHARTS LIST',0,1);//end of line
          $pdf->Cell(189,10,'',0,1); //end of line
          $pdf->SetFont('Arial','B',12);
          $pdf->Ln(6);

          $pdf->SetFillColor(128,128,128);
          $pdf->Cell(50,6,'CODES',1,0,'C',1);
          $pdf->Cell(135,6,'NAMES',1,0,'C',1);
          $pdf->Ln(6);

          $pdf->SetFillColor(255,255,255);
          foreach ($systemCharts as $key => $item) {
              $var = substr($item['CODIGO'], -1);
              if ($var == '.') {
                  $pdf->SetFont('Arial','B',12);
                  $pdf->Cell(50,6,$item['CODIGO'],1,0,'L',1);
                $pdf->Cell(135,6,$item['NOMBRE'],1,0,'L',1);    
              }else{
                  $pdf->SetFont('Arial','',12);
                  $pdf->Cell(50,6,'     '.$item['CODIGO'],1,0,'L',1);
                $pdf->Cell(135,6,'     '.$item['NOMBRE'],1,0,'L',1);
              }
              $pdf->Ln(6);
          }

          $pdf->Output($nombre_archivo.'.pdf','D');
        }
      break;
      default:  
        $systemCharts = Modelo_SystemCharts::search();
        $tags = array('systemCharts'=>$systemCharts);

        $tags["template_js"][] = "systemCharts";
        $tags["template_css"][] = "";

        Vista::render('systemChartsList', $tags);
      break;
    }
    
  }
}  
?>