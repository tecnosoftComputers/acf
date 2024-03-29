<?php
class Controlador_ProductsParameters extends Controlador_Base {
  
  public function construirPagina(){
  
    $tags = array();    

    if(!Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/login/");
    } 

    $opcion = Utils::getParam('opcion','',$this->data); 
    $type_table = array('A'=>'Cap.+Int.','B'=>'Int.');
    $type_rent = array('F'=>'Fija','V'=>'Variable');
    $currency = Modelo_Currencies::search();
    switch($opcion){
      case 'create': 
        $view = 'productsParametersCreate'; 
        
        if(Utils::getParam('create') == 1){
          try{ 
            $campos = array('product'=>1,'nombre'=>1,'currency'=>1);
            $data = $this->camposRequeridos($campos);
            $datos = array('PRODUCTO'=>$data['product'],'NOMBRE'=>$data['nombre'],'MONEDA'=>$data['currency'],'INTERES'=>$_POST['int'],'COMISION'=>$_POST['com'],'DESCUENTO'=>$_POST['desc'],'OTROS'=>$_POST['otro'],'RESERVA'=>$_POST['reserved'],'OTROS2'=>$_POST['otro2'],'SEGUROS'=>$_POST['ins'],'TRANSFERE'=>$_POST['wire'],'COSTCLIEN'=>$_POST['clie'],'TRENTA'=>$_POST['type'],'COLOCACION'=>(int)$_POST['col'],'CAPTACION'=>(int)$_POST['cap'],'CONTIGENTE'=>(int)$_POST['con'],'TABLA'=>(int)$_POST['table'],'TT'=>$_POST['ttable'],'FACTORING'=>(int)$_POST['factoring'],'PO'=>(int)$_POST['po'],'ESABL'=>(int)$_POST['abl'],'MARKETING'=>$_POST['mark'],'LC'=>(int)$_POST['lc'],'PARTICIPA'=>(int)$_POST['part'],'CALMORA'=>(int)$_POST['cm']);

            $GLOBALS['db']->beginTrans();
            if(!Modelo_ProductsParameters::insert($datos)){
              throw new Exception('The parameters could not be created, try again.');              
            }
            $_SESSION['mostrar_exito'] = 'The parameters was successfully created.';
            $GLOBALS['db']->commit();
            
          }
          catch(Exception $e){
            $GLOBALS['db']->rollback();
            $_SESSION['mostrar_error'] = $e->getMessage(); 
            $_SESSION['error'] = true;          
          }
          Utils::doRedirect(PUERTO.'://'.HOST.'/productsParametersList/');
        }

        $tags = array('type'=>'Create',
                      'currency'=>$currency,
                      'type_table'=>$type_table,
                      'type_rent'=>$type_rent,
                      'view'=>$view);

        $tags["template_js"][] = "productsParameters";
        $tags["template_css"][] = "";

        Vista::render('productsParameters', $tags);  
      break;
      case 'update':

        $id = Utils::getParam('id','',$this->data);
        $id = (!empty($id))?Utils::desencriptar($id):'';

        if(Utils::getParam('save') == 1){
          try{ 
            $campos = array('nombre'=>1,'currency'=>1);
            $data = $this->camposRequeridos($campos);
            $datos = array('NOMBRE'=>$data['nombre'],'MONEDA'=>$data['currency'],'INTERES'=>$_POST['int'],'COMISION'=>$_POST['com'],'DESCUENTO'=>$_POST['desc'],'OTROS'=>$_POST['otro'],'RESERVA'=>$_POST['reserved'],'OTROS2'=>$_POST['otro2'],'SEGUROS'=>$_POST['ins'],'TRANSFERE'=>$_POST['wire'],'COSTCLIEN'=>$_POST['clie'],'TRENTA'=>$_POST['type'],'COLOCACION'=>(int)$_POST['col'],'CAPTACION'=>(int)$_POST['cap'],'CONTIGENTE'=>(int)$_POST['con'],'TABLA'=>(int)$_POST['table'],'TT'=>$_POST['ttable'],'FACTORING'=>(int)$_POST['factoring'],'PO'=>(int)$_POST['po'],'ESABL'=>(int)$_POST['abl'],'MARKETING'=>$_POST['mark'],'LC'=>(int)$_POST['lc'],'PARTICIPA'=>(int)$_POST['part'],'CALMORA'=>(int)$_POST['cm']);

            $GLOBALS['db']->beginTrans();
            if(!Modelo_ProductsParameters::setUpdate($id,$datos)){
              throw new Exception('The parameter could not be edited, try again.');
            }
            $_SESSION['mostrar_exito'] = 'The parameter was successfully edited.';
            $GLOBALS['db']->commit();
            Utils::doRedirect(PUERTO.'://'.HOST.'/productsParametersList/');
          }
          catch(Exception $e){
            $GLOBALS['db']->rollback();
            $_SESSION['mostrar_error'] = $e->getMessage();           
          }
        }
        $productsParameters = Modelo_ProductsParameters::getUpdate($id);
        
        $view = 'productsParametersUpdate';
        $tags = array('rows'=>$productsParameters,
                      'type'=>'Update',
                      'currency'=>$currency,
                      'type_table'=>$type_table,
                      'type_rent'=>$type_rent,
                      'view'=>$view);

        $tags["template_js"][] = "productsParameters";
        $tags["template_css"][] = "";

        Vista::render('productsParameters', $tags);
      break;
      case 'delete':

        $id = Utils::getParam('id','',$this->data);
        $id = (!empty($id))?Utils::desencriptar($id):'';

        if(Utils::getParam('save') == 1){
          try{ 
            
            $GLOBALS['db']->beginTrans();
            if(!Modelo_ProductsParameters::delete($id)){
              throw new Exception('The parameter could not be deleted, try again.');
            }
            $_SESSION['mostrar_exito'] = 'The parameter was successfully delete.';
            $GLOBALS['db']->commit();
            Utils::doRedirect(PUERTO.'://'.HOST.'/productsParametersList/');
          }
          catch(Exception $e){
            $GLOBALS['db']->rollback();
            $_SESSION['mostrar_error'] = $e->getMessage();           
          }
        }
        $productsParameters = Modelo_ProductsParameters::getUpdate($id);
        $view = 'productsParametersDelete';
        $tags = array('rows'=>$productsParameters,
                      'currency'=>$currency,
                      'type_table'=>$type_table,
                      'type_rent'=>$type_rent,
                      'type'=>'Delete',
                      'view'=>$view);

        $tags["template_js"][] = "productsParameters";
        $tags["template_css"][] = "";

        Vista::render('productsParameters', $tags);
      break;
      case 'report':

        $productsParameters = Modelo_ProductsParameters::search();
        $nombre_archivo = 'productsParameters_List';
        $tipo = Utils::getParam('tipo','',$this->data);

        if($tipo == 'excel'){

          $objPHPExcel = new PHPExcel();
          $objPHPExcel->getProperties()
            ->setCreator("Lcda. Mariana Vera")
            ->setTitle("products Parameters List")
            ->setSubject("products Parameters List")
            ->setCategory("products Parameters List");

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
              ->setCellValue('A1', 'PRODUCTS PARAMETERS LIST');

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

          foreach ($productsParameters as $key => $item) {

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
          $pdf->Cell(59,5,'PRODUCTS PARAMETERS LIST',0,1);//end of line
          $pdf->Cell(189,10,'',0,1); //end of line
          $pdf->SetFont('Arial','B',12);
          $pdf->Ln(6);

          $pdf->SetFillColor(128,128,128);
          $pdf->Cell(50,6,'CODES',1,0,'C',1);
          $pdf->Cell(135,6,'NAMES',1,0,'C',1);
          $pdf->Ln(6);

          $pdf->SetFillColor(255,255,255);
          foreach ($productsParameters as $key => $item) {
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(50,6,$item['CODIGO'],1,0,'L',1);
            $pdf->Cell(135,6,$item['NOMBRE'],1,0,'L',1);    
            $pdf->Ln(6);
          }

          $pdf->Output($nombre_archivo.'.pdf','D');
        }
      break;
      default:  

        if(isset($_SESSION['error']) && $_SESSION['error'] == true){
          $error = true;
        }else{
          $error = false;
        }
        unset($_SESSION['error']);

        $productsParameters = Modelo_ProductsParameters::search();
        $view = 'productsParametersCreate'; 
        $tags = array('productsParameters'=>$productsParameters,
                      'currency'=>$currency,
                      'type'=>'Create',
                      'type_table'=>$type_table,
                      'type_rent'=>$type_rent,
                      'view'=>$view,
                      'error'=>$error);

        $tags["template_js"][] = "productsParameters";
        $tags["template_css"][] = "";

        Vista::render('productsParametersList', $tags);
      break;
    }
    
  }
}  
?>