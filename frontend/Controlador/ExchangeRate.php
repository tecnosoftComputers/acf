<?php
class Controlador_ExchangeRate extends Controlador_Base {
  
  public function construirPagina(){
  
    $tags = array();    

    if(!Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/login/");
    } 

    $opcion = Utils::getParam('opcion','',$this->data); 
    $state = array('1'=>'Active','0'=>'Inactive');
    switch($opcion){
      case 'create': 
        $view = 'exchangeRateCreate'; 
        
        /*if(Utils::getParam('create') == 1){
          try{ 
            $campos = array('name'=>1,'type'=>1,'factor'=>1,'symbol'=>1,'tenth'=>1,'state'=>1);
            $data = $this->camposRequeridos($campos);
            $datos = array('NOMBREMON'=>$data['name'],'TIPO_MON'=>$data['type'],'SIMBOLO'=>$data['symbol'],'DECIMA'=>$data['tenth'],'FACTOR'=>$data['factor'],'ESTADOMON'=>(int)$data['state']);

            $GLOBALS['db']->beginTrans();
            if(!Modelo_ExchangeRate::insert($datos)){
              throw new Exception('The currency could not be created, try again.');              
            }
            $_SESSION['acfSession']['mostrar_exito'] = 'The currency was successfully created.';
            $GLOBALS['db']->commit();
            
          }
          catch(Exception $e){
            $GLOBALS['db']->rollback();
            $_SESSION['acfSession']['mostrar_error'] = $e->getMessage(); 
            $_SESSION['acfSession']['error'] = true;          
          }
          Utils::doRedirect(PUERTO.'://'.HOST.'/exchangeRateList/');
        }*/

        $tags = array('type'=>'Create',
                      'state'=>$state,
                      'view'=>$view);

        $tags["template_js"][] = "exchangeRate";
        $tags["template_css"][] = "";

        Vista::render('exchangeRate', $tags);  
      break;
      case 'update':

        $id = Utils::getParam('id','',$this->data);
        $id = (!empty($id))?Utils::desencriptar($id):'';

        /*if(Utils::getParam('save') == 1){
          try{ 

            $campos = array('name'=>1,'type'=>1,'factor'=>1,'symbol'=>1,'tenth'=>1,'state'=>1);

            $data = $this->camposRequeridos($campos);
            $datos = array('NOMBREMON'=>$data['name'],'TIPO_MON'=>$data['type'],'SIMBOLO'=>$data['symbol'],'DECIMA'=>$data['tenth'],'FACTOR'=>$data['factor'],'ESTADOMON'=>(int)$data['state']);

            $GLOBALS['db']->beginTrans();
            if(!Modelo_ExchangeRate::setUpdate($id,$datos)){
              throw new Exception('The currency could not be edited, try again.');
            }
            $_SESSION['acfSession']['mostrar_exito'] = 'The currency was successfully edited.';
            $GLOBALS['db']->commit();
            Utils::doRedirect(PUERTO.'://'.HOST.'/exchangeRateList/');
          }
          catch(Exception $e){
            $GLOBALS['db']->rollback();
            $_SESSION['acfSession']['mostrar_error'] = $e->getMessage();           
          }
        }*/
        $exchangeRate = Modelo_ExchangeRate::getUpdate($id);
        $view = 'exchangeRateUpdate';
        $tags = array('rows'=>$exchangeRate,
                      'type'=>'Update',
                      'state'=>$state,
                      'view'=>$view);

        $tags["template_js"][] = "exchangeRate";
        $tags["template_css"][] = "";

        Vista::render('exchangeRate', $tags);
      break;
      case 'delete':

        $id = Utils::getParam('id','',$this->data);
        $id = (!empty($id))?Utils::desencriptar($id):'';

        /*if(Utils::getParam('save') == 1){
          try{ 
            
            $GLOBALS['db']->beginTrans();
            if(!Modelo_ExchangeRate::delete($id)){
              throw new Exception('The currency could not be deleted, try again.');
            }
            $_SESSION['acfSession']['mostrar_exito'] = 'The currency was successfully delete.';
            $GLOBALS['db']->commit();
            Utils::doRedirect(PUERTO.'://'.HOST.'/exchangeRateList/');
          }
          catch(Exception $e){
            $GLOBALS['db']->rollback();
            $_SESSION['acfSession']['mostrar_error'] = $e->getMessage();           
          }
        }*/
        $exchangeRate = Modelo_ExchangeRate::getUpdate($id);
        $view = 'exchangeRateDelete';
        $tags = array('rows'=>$exchangeRate,
                      'type'=>'Delete',
                      'state'=>$state,
                      'view'=>$view);

        $tags["template_js"][] = "exchangeRate";
        $tags["template_css"][] = "";

        Vista::render('exchangeRate', $tags);
      break;
      case 'report':

        $exchangeRate = Modelo_ExchangeRate::search();
        $nombre_archivo = 'exchangeRate_List';
        $tipo = Utils::getParam('tipo','',$this->data);

        if($tipo == 'excel'){

          $objPHPExcel = new PHPExcel();
          $objPHPExcel->getProperties()
            ->setCreator("Lcda. Mariana Vera")
            ->setTitle("exchangeRate List")
            ->setSubject("exchangeRate List")
            ->setCategory("exchangeRate List");

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
              ->setCellValue('A1', 'exchangeRate LIST');

          $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true); 

          $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue('A2', 'TYPE')
              ->setCellValue('B2', 'NAME')
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

          foreach ($exchangeRate as $key => $item) {

            $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':B'.$cont)->applyFromArray($BStyle);
            $objPHPExcel->getActiveSheet()->getStyle('A'.$cont.':B'.$cont)->applyFromArray($styleArray);
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$cont, $item['TIPO_MON'])
            ->setCellValue('B'.$cont, $item['NOMBREMON'])
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
          $pdf->Cell(59,5,'exchangeRate LIST',0,1);//end of line
          $pdf->Cell(189,10,'',0,1); //end of line
          $pdf->SetFont('Arial','B',12);
          $pdf->Ln(6);

          $pdf->SetFillColor(128,128,128);
          $pdf->Cell(50,6,'CODES',1,0,'C',1);
          $pdf->Cell(135,6,'NAMES',1,0,'C',1);
          $pdf->Ln(6);

          $pdf->SetFillColor(255,255,255);
          foreach ($exchangeRate as $key => $item) {
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(50,6,$item['TIPO_MON'],1,0,'L',1);
            $pdf->Cell(135,6,$item['NOMBREMON'],1,0,'L',1);    
            $pdf->Ln(6);
          }

          $pdf->Output($nombre_archivo.'.pdf','D');
        }
      break;
      default:  

        if(isset($_SESSION['acfSession']['error']) && $_SESSION['acfSession']['error'] == true){
          $error = true;
        }else{
          $error = false;
        }
        unset($_SESSION['acfSession']['error']);

        $exchangeRate = Modelo_ExchangeRate::search();
        $view = 'exchangeRateCreate'; 
        $tags = array('exchangeRate'=>$exchangeRate,
                      'type'=>'Create',
                      'view'=>$view,
                      'state'=>$state,
                      'error'=>$error);

        $tags["template_js"][] = "exchangeRate";
        $tags["template_css"][] = "";

        Vista::render('exchangeRateList', $tags);
      break;
    }
    
  }
}  
?>