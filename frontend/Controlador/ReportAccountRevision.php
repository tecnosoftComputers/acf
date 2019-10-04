<?php
class Controlador_ReportAccountRevision extends Controlador_Reports {

  public $item = 42;
  
  public function construirPagina(){   

    $tags = array();    
    if(!Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/login.php");
    } 
    $action = Utils::getParam('action','',$this->data);
    switch($action){                            
      case 'search':
        $dateaux = Utils::getParam("dateaux", '', $this->data);
        $datereceiv = Utils::getParam("dateaccount",'',$this->data);
        if(!empty($datereceiv)){
          $explodedate = explode("/", $datereceiv);
          $datereceiv = $explodedate[0]."/01/".$explodedate[1];
        }
        $datereceiv = (!empty($dateaux)) ? date("m/d/Y", $dateaux) : $datereceiv ;
        $datefrom = date("Y-m-01", strtotime($datereceiv));
        $dateto = date("Y-m-t", strtotime($datereceiv));
        $limit = Utils::getParam('limit','',$this->data);
        $limit = (empty($limit)) ? $this->vlrecords[3] : $limit;
        $page = Utils::getParam('page',1,$this->data);
        $start = ($page - 1) * $limit;

        $consult = Modelo_Dpmovimi::accountRevision($_SESSION['acfSession']['id_empresa'],
                                                    $datefrom,$dateto);
        $result = Utils::existAccount($consult,true);
        $tags["results"] = $result;
        if (empty($tags["results"])){
          $_SESSION['acfSession']['mostrar_error'] = "Not found records";
        }
        else{
          if(!empty($limit)){
            $reindexarray = array_values($tags["results"]);
            $auxarr = array();
            foreach ($reindexarray as $key => $remove) {
              if(($key) >= $start && ($key) < ($limit + $start)){
                array_push($auxarr, $reindexarray[$key]);
              }
            }
            $results = $auxarr;
          }
          $tags["results"] = $results;
          $url = PUERTO."://".HOST."/report/accountrevision/search/";     
          $url .= strtotime($datereceiv)."/".$limit;
          $pagination = new Pagination(count($result),$limit,$url);  
          $pagination->setPage($page); 
          $tags["pagination"] = $pagination->showPage();
        }

        $tags["limit"] = $limit; 
        $tags["vlrecords"] = $this->vlrecords;
        $tags["dateto"] = $datereceiv;
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->item];
        $tags["template_css"][] = "airdatepicker/datepicker";
        $tags["template_js"][] = "airdatepicker/datepicker.min";
        $tags["template_js"][] = "reports";
        Vista::render('rpt_acc_accountrevision', $tags); 
      break;
      case 'pdf':

        $datereceiv = Utils::getParam("dateto",'',$this->data);
        $datefrom = date("Y-m-01", ($datereceiv));
        $dateto = date("Y-m-t", ($datereceiv));
        $consult = Modelo_Dpmovimi::accountRevision($_SESSION['acfSession']['id_empresa'],
                                                    $datefrom,$dateto);
        $result = Utils::existAccount($consult,true);
        $tags["results"] = $result;

        // print_r($tags["results"]);
        $from = date("m/d/Y", strtotime($datefrom));
        $to = date("m/d/Y", strtotime($dateto)); 
        $this->printHeaderPdf("ACCOUNT REVISION REPORT",$from,$to,true);
        $columns = array();
        $columns[] = array("width"=>50,"label"=>"SEAT");
        // $columns[] = array("width"=>,"label"=>"BALANCE");  
        $columns[] = array("width"=>228,"label"=>"MESSAGE");    
        $this->printHeaderTablePdf($columns);     
        $this->objPdf->SetXY(224, $this->objPdf->GetY());  
        $this->objPdf->SetFont('Arial','B',9);

        $this->objPdf->SetFont('Arial','',9);
        $this->objPdf->Cell(80,5,'',0,1);
        if(!empty($result)){
          if ($this->objPdf->GetY() > $this->limitline){
            $this->objPdf->AddPage();
            $this->printHeaderPdf("ACCOUNT REVISION REPORT",$from,$to);   
            $this->printHeaderTablePdf($columns);
          }
          foreach ($result as $key => $value) {
          // $this->objPdf->SetFont('Arial','',9);
            $this->objPdf->Cell(50,5,$value["TIPO_ASI"]." ".$value["ASIENTO"],0,0);
            if($value["IMPORTE"] != 0){
              $this->objPdf->Cell(198,5,"The accounting entry is not square. Check.",0,0);
              $this->objPdf->Ln();
            }
            if(!empty($value["NOEXIST"]) && $value["IMPORTE"] != 0){
               $this->objPdf->SetFont('Arial','',9);
              $this->objPdf->Cell(50,5,'',0,0);
              $this->objPdf->Cell(228,5,"The accounts ".$value["NOEXIST"]." do not exist in the account plan",0,1);
            }
            else{
              $this->objPdf->Cell(228,5,"The accounts ".$value["NOEXIST"]." do not exist in the account plan",0,1);
            }
            
            $this->objPdf->SetFont('Arial','',9);
            $this->objPdf->Cell(69,5,'',0,1);
          }
        }
        else{
          $this->objPdf->SetFont('Arial','',9);
          $this->objPdf->Cell(80,5,'Not found records',0,1);
        }
        $this->printFooterPdf();
        $this->objPdf->Output();

      break;
      case 'excel':

        $datereceiv = Utils::getParam("dateto",'',$this->data);
        $datefrom = date("Y-m-01", ($datereceiv));
        $dateto = date("Y-m-t", ($datereceiv));
        $consult = Modelo_Dpmovimi::accountRevision($_SESSION['acfSession']['id_empresa'],
                                                    $datefrom,$dateto);
        $result = Utils::existAccount($consult,true);
        $tags["results"] = $result;
        $from = date("m/d/Y", strtotime($datefrom));
        $to = date("m/d/Y", strtotime($dateto)); 
        $info_company = Modelo_Companie::searchCompanies($_SESSION['acfSession']['id_empresa']); 
         
        $columns = array(
                   'A'=>array("width"=>76,"label"=>"SEAT"),
                   'B'=>array("width"=>112,"label"=>"MESSAGE")
                 ); 
        $this->printHeaderExcel("ACCOUNT REVISION REPORT",$columns,'B',600,$info_company,$from,$to,'A');
        $objPHPExcel = $this->objExcel;
        $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':B'.$this->line)->applyFromArray($this->styleArray);

        $startRow = 10;
        $auxrow = 0;
        if(isset($result) && !empty($result)){
          foreach ($result as $key => $value) {
            $auxrow = $this->line;
            if($value["IMPORTE"] != 0 && !empty($value["NOEXIST"])){
              $this->objExcel->getActiveSheet()->mergeCells('A'.$startRow.':A'.($startRow+1));
              $auxrow = $startRow;
              $startRow += 2;
            }
            
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$auxrow, $value["TIPO_ASI"]." ".$value["ASIENTO"]);
            if($value["IMPORTE"] != 0){
              $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B'.$auxrow, "The accounting entry is not square. Check");
                    $auxrow += 1;
            }
            if(!empty($value["NOEXIST"])){
              $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B'.($auxrow), "The accounts ".$value["NOEXIST"]." do not exist in the account plan.");
            }
            $this->line++;
          }
        }
        else{
          $this->objExcel->getActiveSheet()->mergeCells("A".$startRow.":B".$startRow);
          $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$this->line, "NOT FOUND RECORDS");
        }
        $this->outputExcel("ACCOUNT REVISION REPORT");


      break;
      default:    
        // $tags["typereport"] = "A";     
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->item];
        $tags["template_css"][] = "airdatepicker/datepicker";
        $tags["template_js"][] = "airdatepicker/datepicker.min";
        $tags["template_js"][] = "reports";
        Vista::render('rpt_acc_accountrevision', $tags); 
      break;
    }
    
  }

  public function transformdate($datereceiv){
    $datereceivExplode = explode("-", $datereceiv);
    $month = "";
    $day = "01";
    $year = $datereceivExplode[1];
    $arrayMonth = array('January'=>'01','February'=>'02','March'=>'03','April'=>'04','May'=>'05','June'=>'06', 'July'=>'07','August'=>'08','September'=>'09','October'=>'10','November'=>'11','December'=>'12');
    foreach ($arrayMonth as $key => $value) {
      if($key == $datereceivExplode[0]){
        $month = $value;
        break;
      }
    }
    $datereturn = $month."-".$day."-".$year;
    return $datereturn;
  }
}
?>