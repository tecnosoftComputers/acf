<?php
class Controlador_ReportIncomeStatement extends Controlador_Reports {

  public $item = 43;

  public function construirPagina(){ 
    $tags = array();    
    if(!Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/login.php");
    } 
    $action = Utils::getParam('action','',$this->data);
    switch($action){   
      case 'search':
        $datetoaux = Utils::getParam('datetoaux','',$this->data);
        $dateonurl = Utils::getParam('dateto','',$this->data);
        $aux_dateto = (!empty($datetoaux)) ? date("m-d-Y", $datetoaux) : Utils::getParam('dateto','',$this->data);
        if(!empty($datetoaux)){
          $dateto = date("Y-m-d", $datetoaux);
        }
        elseif(!empty($aux_dateto)){
          $dateto = date("Y-m-d", strtotime($aux_dateto));
        }
        else{
          $dateto = date('Y-m-d');
        }

        $typereport = Utils::getParam('typereport','A',$this->data); 
        $tags["dbdateto"] = strtotime($dateto); 
        $dateto = ($typereport != "A") ? date("Y-m-t", strtotime($dateto)) : $dateto ;    
        $datefrom = date("Y-m-01",strtotime($dateto));
        $acclevel = Utils::getParam('acclevel',$this->maxlevel,$this->data);        
        $types_account = Modelo_Dasbal::getParams();              
        $tags["dateto"] = $aux_dateto;  
        // echo "eder dateto: ".$dateto." - ".$tags["dateto"];      
                
        $tags["typereport"] = $typereport;
        $tags["acclevel"] = $acclevel;
        $tags["types_account"] = $types_account;

        $limit = Utils::getParam('limit','',$this->data);
        $limit = (empty($limit)) ? $this->vlrecords[0] : $limit;
        $page = Utils::getParam('page',1,$this->data);
        $start = ($page - 1) * $limit;
        // echo $datefrom."<br>";
        // echo date("Y-m-t", strtotime($dateto));
        // exit();
        //cuenta acreedora y deudora
        $accdeudora = array();
        $accacreedora = array();
        foreach($types_account["RESULTADOD"] as $deudora){
          $accdeudora[] = Modelo_ChartAccount::getIndAux($deudora); 
        }
        foreach($types_account["RESULTADOA"] as $acreedora){
          $accacreedora[] = Modelo_ChartAccount::getIndAux($acreedora); 
        }                   
        if ($typereport == "A"){             
          $tags["results"] = Modelo_Dpmovimi::reportIncomeA($_SESSION['acfSession']['id_empresa'],
                                                            $dateto,$types_account["INGRESOS"],
                                                            $types_account["EGRESOS"],$acclevel,$start,$limit); 
        }
        else{
          $tags["results"] = Modelo_Dpmovimi::reportIncomeM($_SESSION['acfSession']['id_empresa'],
                                                            $datefrom,date("Y-m-t", strtotime($dateto)),$types_account["INGRESOS"],
                                                            $types_account["EGRESOS"],$acclevel,$start,$limit); 
        }
        $nrorecords = $tags["results"]["nrorecords"];
        if(($page * $limit) >= $nrorecords){
          $tags['leveloneval'] = $tags["results"]['leveloneval'];
        }

        $tags["results"] = $tags["results"]['records'];

        $url = PUERTO."://".HOST."/report/incomestatement/search/";        
        $url .= $acclevel."/".$tags["dbdateto"]."/".$typereport."/";
        $url .= $limit;
        $pagination = new Pagination($nrorecords,$limit,$url);  
        $pagination->setPage($page); 
        // echo $pagination->showPage();

        $tags["pagination"] = $pagination->showPage();       
        if (empty($tags["results"])){
          $_SESSION['acfSession']['mostrar_error'] = "Not found records";
        }
        $tags["limit"] = $limit; 
        $tags["vlrecords"] = $this->vlrecords;  
        $tags['accdeudora'] = $accdeudora;     
        $tags['accacreedora'] = $accacreedora;     
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->item]; 
        $tags["template_js"][] = "reports";     
        Vista::render('rpt_acc_incomestatement', $tags);  
      break;
      case 'pdf':

        if (!isset($_SESSION['acfSession']['permission'][$this->item]) || 
            empty($_SESSION['acfSession']['permission'][$this->item]["pri"])){
          $this->redirectToController('report/incomestatement');
        }

        $aux_dateto = Utils::getParam('dateto','',$this->data);
        $dateto = (!empty($aux_dateto)) ? date("Y-m-d", ($aux_dateto)) : date('Y-m-d');
        $typereport = Utils::getParam('typereport','',$this->data);
        $dateto = ($typereport != "A") ? date("Y-m-t", strtotime($dateto)) : $dateto ;        
        $datefrom = date("Y-m-01",($aux_dateto));
        $acclevel = Utils::getParam('acclevel',$this->data);
        $types_account = Modelo_Dasbal::getParams();
        //cuenta acreedora y deudora
        $accdeudora = array();
        $accacreedora = array();
        $results = "";
        foreach($types_account["RESULTADOD"] as $deudora){
          $accdeudora[] = Modelo_ChartAccount::getIndAux($deudora); 
        }
        foreach($types_account["RESULTADOA"] as $acreedora){
          $accacreedora[] = Modelo_ChartAccount::getIndAux($acreedora); 
        }                         
        if ($typereport == "A"){             
          $results = Modelo_Dpmovimi::reportIncomeA($_SESSION['acfSession']['id_empresa'],
                                                            $dateto,$types_account["INGRESOS"],
                                                            $types_account["EGRESOS"],$acclevel); 
        }
        else{
          $results = Modelo_Dpmovimi::reportIncomeM($_SESSION['acfSession']['id_empresa'],
                                                            $datefrom,$dateto,$types_account["INGRESOS"],
                                                            $types_account["EGRESOS"],$acclevel); 
        }


        // Reporte
        $from = date("m/d/Y", strtotime($datefrom));
        $to = date("m/d/Y", strtotime($dateto)); 
        $this->printHeaderPdf("INCOME STATEMENT REPORT",$from,$to,true);
        $columns = array();
        $columns[] = array("width"=>69,"label"=>"ACCOUNT");  
        $columns[] = array("width"=>69,"label"=>"NAME ACCOUNT");  
        $columns[] = array("width"=>69,"label"=>"BALANCE");  
        $columns[] = array("width"=>69,"label"=>"TOTAL");    
        $this->printHeaderTablePdf($columns);     
        $this->objPdf->SetXY(224, $this->objPdf->GetY());  
        $this->objPdf->SetFont('Arial','B',9);
        
        $total = 0; 
        $printblank = 0;        
        $acumingresos = 0;
        $acumegresos = 0;

        foreach ($results as $key => $value) {
          if ($this->objPdf->GetY() > $this->limitline){
            $this->objPdf->AddPage();
            $this->printHeaderPdf("INCOME STATEMENT REPORT",$from,$to);   
            $this->printHeaderTablePdf($columns);
          }

          if (empty($value["ingreso"]) && $printblank == 0){
            $this->objPdf->SetFont('Arial','',9);
            $this->objPdf->Cell(69,5,'',0,1);                                 
            $printblank = 1;      
          }
          
          if ($value["level"] == 1){
            $cod = str_replace(".","",$value["CODIGO"]);
            if (in_array($cod,$types_account["INGRESOS"])){
              $acumingresos = $acumingresos + $value["ingreso"];
            } 
            if (in_array($cod,$types_account["EGRESOS"])){
              $acumegresos = $acumegresos + $value["egreso"];
            }
          }
          $leveladjust = array("space"=>"","resalt"=>"B");
          $leveladjust['resalt'] = ($value['level'] == 3) ? "": $leveladjust['resalt'];
          if($value['level'] == 2){$leveladjust['space'] = "  ";}elseif($value['level'] == 3){$leveladjust['space'] = "    ";}

          $balance = (!empty($value["ingreso"])) ? $value["ingreso"] * -1 : $value["egreso"];           
          $total = ($value["level"] != 3) ? $balance : 0;   
          $balance = ($value["level"] == 3) ? $balance : 0; 
            $this->objPdf->SetFont('Arial',$leveladjust['resalt'],9);
            $this->objPdf->Cell(69,5,'',0,1);
            $this->objPdf->Cell(69,5,$leveladjust['space'].$value["CODIGO"],0,0); 
            $this->objPdf->Cell(69,5,$leveladjust['space'].$value["NOMBRE"],0,0);
            $this->objPdf->SetFont('Arial',"",9);
            $this->objPdf->Cell(69.5,5,number_format($balance,2,',','.'),0,0); 
          $this->objPdf->Cell(69.5,5,number_format($total,2,',','.'),0,0);
        }

        $this->objPdf->SetFont('Arial','',9);
        $this->objPdf->Cell(69,5,'',0,1);

        $total = abs($acumingresos) - abs($acumegresos);
       if ($total > 0){
         foreach($accdeudora as $deudora){
            $this->objPdf->SetFont('Arial','',9);
            $this->objPdf->Cell(69,5,'',0,1);
            $this->objPdf->Cell(69,5,$deudora["CODIGO"],0,0); 
            $this->objPdf->Cell(69,5,$deudora["NOMBRE"],0,0);
            $this->objPdf->Cell(69.5,5,"",0,0); 
            $this->objPdf->Cell(69.5,5,number_format($total,2,',','.'),0,0);           
         }
       }
       else{
         foreach($accacreedora as $acreedora){
            $this->objPdf->SetFont('Arial','',9);
            $this->objPdf->Cell(69,5,'',0,1);
            $this->objPdf->Cell(69,5,$acreedora["CODIGO"],0,0); 
            $this->objPdf->Cell(69,5,$acreedora["NOMBRE"],0,0);
            $this->objPdf->Cell(69.5,5,"",0,0); 
            $this->objPdf->Cell(69.5,5,number_format($total,2,',','.'),0,0);           
        }
       }

      $this->objPdf->Output();

      break;
      case 'excel':

        if (!isset($_SESSION['acfSession']['permission'][$this->item]) || 
            empty($_SESSION['acfSession']['permission'][$this->item]["pri"])){
          $this->redirectToController('report/incomestatement');
        }

        $aux_dateto = Utils::getParam('dateto','',$this->data);
        $dateto = (!empty($aux_dateto)) ? date("Y-m-d", ($aux_dateto)) : date('Y-m-d'); 
        $typereport = Utils::getParam('typereport','',$this->data); 
        $dateto = ($typereport != "A") ? date("Y-m-t", strtotime($dateto)) : $dateto ;       
        $datefrom = date("Y-m-01",($aux_dateto));
        $acclevel = Utils::getParam('acclevel',$this->data);
        $types_account = Modelo_Dasbal::getParams();
        //cuenta acreedora y deudora
        $accdeudora = array();
        $accacreedora = array();
        
        
        $results = "";
        foreach($types_account["RESULTADOD"] as $deudora){
          $accdeudora[] = Modelo_ChartAccount::getIndAux($deudora); 
        }
        foreach($types_account["RESULTADOA"] as $acreedora){
          $accacreedora[] = Modelo_ChartAccount::getIndAux($acreedora); 
        }          

        if ($typereport == "A"){             
          $results = Modelo_Dpmovimi::reportIncomeA($_SESSION['acfSession']['id_empresa'],
                                                            $dateto,$types_account["INGRESOS"],
                                                            $types_account["EGRESOS"],$acclevel); 
        }
        else{
          $results = Modelo_Dpmovimi::reportIncomeM($_SESSION['acfSession']['id_empresa'],
                                                            $datefrom,$dateto,$types_account["INGRESOS"],
                                                            $types_account["EGRESOS"],$acclevel); 
        }

        $from = date("m/d/Y", strtotime($datefrom));
        $to = date("m/d/Y", strtotime($dateto));  
        $info_company = Modelo_Companie::searchCompanies($_SESSION['acfSession']['id_empresa']); 
         
        $columns = array(
                   'A'=>array("width"=>50,"label"=>"ACCOUNT"),
                   'B'=>array("width"=>50,"label"=>"NAME ACCOUNT"),
                   'C'=>array("width"=>44,"label"=>"BALANCE"),
                   'D'=>array("width"=>44,"label"=>"TOTAL")
                 );          
        $this->printHeaderExcel("INCOME STATEMENT REPORT",$columns,'D',100,$info_company,$from,$to,'C');
        $objPHPExcel = $this->objExcel;

        $total = 0; 
        $printblank = 0;        
        $acumingresos = 0;
        $acumegresos = 0;



        foreach($results as $key=>$value){ 
          $leveladjust = array("space"=>"");
          if($value['level'] == 2){$leveladjust['space'] = "  ";}elseif($value['level'] == 3){$leveladjust['space'] = "    ";}
          if (empty($value["ingreso"]) && $printblank == 0){
            $objPHPExcel->getActiveSheet()->mergeCells('A'.$this->line.':D'.$this->line); 
            $objPHPExcel->getActiveSheet()->getRowDimension($this->line)->setRowHeight($this->hexcel);  
            $this->line++;
            $printblank = 1; 
          }


          if ($value["level"] == 1){
              $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':D'.$this->line)->applyFromArray($this->styleArray);
              $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':D'.$this->line)->applyFromArray($this->BoldStyle);
              $objPHPExcel->getActiveSheet()->getStyle('C'.$this->line.':D'.$this->line)->applyFromArray($this->AmtStyle);
              $cod = str_replace(".","",  $value["CODIGO"]);
              if (in_array($cod,$types_account["INGRESOS"])){
                $acumingresos = $acumingresos + $value["ingreso"];
              } 
              if (in_array($cod,$types_account["EGRESOS"])){
                $acumegresos = $acumegresos + $value["egreso"];
              }
            }


              $balance = (!empty($value["ingreso"])) ? $value["ingreso"] * -1 : $value["egreso"];           
              $total = ($value["level"] != 3) ? $balance : 0;   
              $balance = ($value["level"] == 3) ? $balance : 0;          
              $objPHPExcel->getActiveSheet()->getStyle('C'.$this->line.':D'.$this->line)->applyFromArray($this->AmtStyle);
              if ($value["level"] == 2){
                $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':D'.$this->line)->applyFromArray($this->BoldStyle);
              }
              $objPHPExcel->setActiveSheetIndex(0)
                  ->setCellValue('A'.$this->line,   $leveladjust['space'].$value["CODIGO"])
                  ->setCellValue('B'.$this->line, $leveladjust['space'].$value["NOMBRE"])
                  ->setCellValue('C'.$this->line, ($balance != 0) ? number_format($balance,2,',','.') : "-")
                  ->setCellValue('D'.$this->line, ($total != 0) ? number_format($total,2,',','.') : "-");
              $this->line++; 
            
        }

          $objPHPExcel->getActiveSheet()->mergeCells('A'.$this->line.':D'.$this->line); 
          $objPHPExcel->getActiveSheet()->getRowDimension($this->line)->setRowHeight($this->hexcel);  
          $this->line++;

          $total = abs($acumingresos) - abs($acumegresos);
           if ($total > 0){

             foreach($accdeudora as $deudora){
              $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':D'.$this->line)->applyFromArray($this->styleArray);
              $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':D'.$this->line)->applyFromArray($this->BoldStyle);
              $objPHPExcel->getActiveSheet()->getStyle('C'.$this->line.':D'.$this->line)->applyFromArray($this->AmtStyle);
              $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$this->line, $deudora["CODIGO"])
                    ->setCellValue('B'.$this->line, $deudora["NOMBRE"])
                    ->setCellValue('C'.$this->line, "")
                    ->setCellValue('D'.$this->line, number_format($total,2,',','.'));  
                    $this->line++;          
             }
           }
           else{
             foreach($accacreedora as $acreedora){
              $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':D'.$this->line)->applyFromArray($this->styleArray);
              $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':D'.$this->line)->applyFromArray($this->BoldStyle);
              $objPHPExcel->getActiveSheet()->getStyle('C'.$this->line.':D'.$this->line)->applyFromArray($this->AmtStyle);
               $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$this->line, $acreedora["CODIGO"])
                    ->setCellValue('B'.$this->line, $acreedora["NOMBRE"])
                    ->setCellValue('C'.$this->line, "")
                    ->setCellValue('D'.$this->line, number_format($total,2,',','.'));   
                    $this->line++;      
            }
         }


        $this->outputExcel("INCOME STATEMENT REPORT");
      break;
      default:  
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->item];
        $tags["typereport"] = "A";
        $tags["acclevel"] = $this->maxlevel;
        $tags["template_js"][] = "reports";     
        Vista::render('rpt_acc_incomestatement', $tags);       
      break;	
    }
  }

}
?>