<?php
class Controlador_TRA extends Controlador_Base {
  
  public function construirPagina(){
  
    $tags = array();    

    if(!Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/login/");
    } 

    $opcion = Utils::getParam('opcion','',$this->data); 
    $tabla = $_SESSION['acfSession']['tabla'];
    switch($opcion){
      case 'create': 
        $view = 'typeTransCreate'; 
        
        if(Utils::getParam('create') == 1){
          try{ 
            $campos = array('code'=>1,'name'=>1);
            $data = $this->camposRequeridos($campos);
            $datos = array('CODIGO'=>$data['code'],'NOMBRE'=>$data['name']);

            $GLOBALS['db']->beginTrans();
            
            if(!Modelo_TabGeneral::insert($datos,$tabla)){
              throw new Exception('The type could not be created, try again.');
            }
            $_SESSION['acfSession']['mostrar_exito'] = 'The type was successfully created.';
            $GLOBALS['db']->commit();
          }
          catch(Exception $e){
            $GLOBALS['db']->rollback();
            $_SESSION['acfSession']['mostrar_error'] = $e->getMessage(); 
            $_SESSION['acfSession']['error'] = true;         
          }
          Utils::doRedirect(PUERTO.'://'.HOST.'/typeTransList/');
        }

        $tags = array('type'=>'Create',
                      'view'=>$view);

        $tags["template_js"][] = "typeTrans";
        $tags["template_css"][] = "";

        Vista::render('typeTrans', $tags);  
      break;
      case 'update':

        $id = Utils::getParam('id','',$this->data);
        $id = (!empty($id))?Utils::desencriptar($id):'';

        if(Utils::getParam('save') == 1){
          try{ 
            $campos = array('name'=>1);
            $data = $this->camposRequeridos($campos);
            $datos = array('NOMBRE'=>$data['name']);

            $GLOBALS['db']->beginTrans();

            if(!Modelo_TabGeneral::setUpdate($id,$datos,$tabla)){
              throw new Exception('The type could not be edited, try again.');
            }
            $_SESSION['acfSession']['mostrar_exito'] = 'The type was successfully edited.';
            $GLOBALS['db']->commit();
            Utils::doRedirect(PUERTO.'://'.HOST.'/typeTransList/');
          }
          catch(Exception $e){
            $GLOBALS['db']->rollback();
            $_SESSION['acfSession']['mostrar_error'] = $e->getMessage();           
          }
        }
        $typeTrans = Modelo_TabGeneral::getUpdate($id,$tabla);
        $view = 'typeTransUpdate';
        $tags = array('rows'=>$typeTrans,
                      'type'=>'Update',
                      'view'=>$view);

        $tags["template_js"][] = "typeTrans";
        $tags["template_css"][] = "";

        Vista::render('typeTrans', $tags);
      break;
      case 'delete':

        $id = Utils::getParam('id','',$this->data);
        $id = (!empty($id))?Utils::desencriptar($id):'';

        if(Utils::getParam('save') == 1){
          try{ 
            
            $GLOBALS['db']->beginTrans();
            if(!Modelo_TabGeneral::delete($id,$tabla)){
              throw new Exception('The type could not be deleted, try again.');
            }
            $_SESSION['acfSession']['mostrar_exito'] = 'The type was successfully delete.';
            $GLOBALS['db']->commit();
            Utils::doRedirect(PUERTO.'://'.HOST.'/typeTransList/');
          }
          catch(Exception $e){
            $GLOBALS['db']->rollback();
            $_SESSION['acfSession']['mostrar_error'] = $e->getMessage();           
          }
        }
        $typeTrans = Modelo_TabGeneral::getUpdate($id,$tabla);
        $view = 'typeTransDelete';
        $tags = array('rows'=>$typeTrans,
                      'type'=>'Delete',
                      'view'=>$view);

        $tags["template_js"][] = "typeTrans";
        $tags["template_css"][] = "";

        Vista::render('typeTrans', $tags);
      break;
      case 'report':

        $typeTrans = Modelo_TabGeneral::search($tabla);
        $nombre_archivo = 'typeTrans_List';
        $tipo = Utils::getParam('tipo','',$this->data);

        if($tipo == 'excel'){

          $objPHPExcel = new PHPExcel();
          $objPHPExcel->getProperties()
            ->setCreator("Lcda. Mariana Vera")
            ->setTitle("typeTrans List")
            ->setSubject("typeTrans List")
            ->setCategory("typeTrans List");

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
              ->setCellValue('A1', 'typeTrans LIST');

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

          foreach ($typeTrans as $key => $item) {

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
          $pdf->Cell(59,5,'typeTrans LIST',0,1);//end of line
          $pdf->Cell(189,10,'',0,1); //end of line
          $pdf->SetFont('Arial','B',12);
          $pdf->Ln(6);

          $pdf->SetFillColor(128,128,128);
          $pdf->Cell(50,6,'CODES',1,0,'C',1);
          $pdf->Cell(135,6,'NAMES',1,0,'C',1);
          $pdf->Ln(6);

          $pdf->SetFillColor(255,255,255);
          foreach ($typeTrans as $key => $item) {
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

        if(isset($_SESSION['acfSession']['error']) && $_SESSION['acfSession']['error'] == true){
          $error = true;
        }else{
          $error = false;
        }
        unset($_SESSION['acfSession']['error']);


        $typeTrans = Modelo_TabGeneral::search($tabla);
        $view = 'typeTransCreate'; 
        $tags = array('typeTrans'=>$typeTrans,
                      'type'=>'Create',
                      'view'=>$view,
                      'error'=>$error);

        $tags["template_js"][] = "typeTrans";
        $tags["template_css"][] = "";

        Vista::render('typeTransList', $tags);
      break;
    }
    
  }
}  
?>