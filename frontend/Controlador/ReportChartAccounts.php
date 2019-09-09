<?php
class Controlador_ReportChartAccounts extends Controlador_Reports {

  public $item = 43;

  public function construirPagina(){   

    $tags = array();    
    if(!Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/login.php");
    } 
    $action = Utils::getParam('action','',$this->data);
    switch($action){      
      case 'search':                
  	    $accfrom = Utils::getParam('accfrom','',$this->data);
  	    $accto = Utils::getParam('accto','',$this->data);
        //$nrorecords = Utils::getParam('nrorecords',25,$this->data);
  	    $tags["accfrom"] = $accfrom;
  	    $tags["accto"] = $accto;
  	    $tags["results"] = Modelo_ChartAccount::report($accfrom,$accto);        
        if (empty($tags["results"])){
          $_SESSION['acfSession']['mostrar_error'] = "Not found records";
        }        
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->item];
  	    $tags["template_js"][] = "reports";     
  	    Vista::render('rpt_acc_chartaccount', $tags);                       
      break;        
      case 'pdf':     
        $accfrom = Utils::getParam('accfrom','',$this->data);
  	    $accto = Utils::getParam('accto','',$this->data);
  	    $results = Modelo_ChartAccount::report($accfrom,$accto);

  	    $this->printHeaderPdf("CHART ACCOUNTS REPORT",$accfrom,$accto,true); 

  	    $columns = array();
  	    $columns[] = array("width"=>80,"label"=>"ACCOUNT");  
  	    $columns[] = array("width"=>198,"label"=>"NAME ACCOUNT");  
  	    $this->printHeaderTablePdf($columns);  

  	    $this->objPdf->SetFont('Arial','',9);    

  	    if (!empty($results)){                      
          foreach($results as $key=>$value){   
            if ($this->objPdf->GetY() > $this->limitline){
              $this->objPdf->AddPage();
              $this->printHeaderPdf("CHART ACCOUNTS REPORT",$accfrom,$accto);   
              $this->printHeaderTablePdf($columns);              
            }                          
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
  	    }
        $this->objPdf->Output();
      break; 
      case 'excel':
        $accfrom = Utils::getParam('accfrom','',$this->data);
        $accto = Utils::getParam('accto','',$this->data);
        $results = Modelo_ChartAccount::report($accfrom,$accto);    

        $info_company = Modelo_Companie::searchCompanies($_SESSION['acfSession']['id_empresa']); 

        $columns = array(
                     'A'=>array("width"=>50, "label"=>"ACCOUNT"),
                     'B'=>array("width"=>100, "label"=>"NAME ACCOUNT")
                   );          
        $this->printHeaderExcel("CHART ACCOUNTS REPORT",$columns,'B1',500,$info_company,$accfrom,$accto);                    
        $objPHPExcel = $this->objExcel;                                              

        $objPHPExcel->getActiveSheet()->mergeCells('B1:B6');          
        $objPHPExcel->getActiveSheet()->mergeCells('A7:B7');                  

        if (!empty($results)){               
          foreach ($results as $key => $item) {              
              $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':B'.$this->line)->applyFromArray($this->styleArray);
              $nro = substr_count($item["CODIGO"],".");   
              $lastc = substr($item["CODIGO"], -1);

              $blank_spaces = "";
              if ($nro>1){
                for($i=1;$i<$nro;$i++){
                  $blank_spaces .= "  ";
                }
              }   
              if ($lastc == '.'){                
                $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':B'.$this->line)->getFont()->setBold(true);
                $objPHPExcel->setActiveSheetIndex(0)
                  ->setCellValue('A'.$this->line, " ".$item['CODIGO'])
                  ->setCellValue('B'.$this->line, $blank_spaces.$item['NOMBRE']);
              }     
              else{
                $blank_spaces .= "   ";                
                $objPHPExcel->getActiveSheet()->getStyle('A'.$this->line.':B'.$this->line)->getFont()->setBold(false); 
                $objPHPExcel->setActiveSheetIndex(0)
                  ->setCellValue('A'.$this->line, " ".$item['CODIGO'])
                  ->setCellValue('B'.$this->line, $blank_spaces.$item['NOMBRE']);                
              }                               
              
              $this->line++;      
          }            
        }

        $this->outputExcel("CHART_ACCOUNTS_REPORT");   
      break;
      default:  
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->item];
        $tags["template_js"][] = "reports";     
        Vista::render('rpt_acc_chartaccount', $tags);       
      break;
    }    
  }	
}
?>