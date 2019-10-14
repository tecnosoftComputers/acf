<?php
class Controlador_FinancialPlanning extends Controlador_Reports {

  public $item = 23;
  public $months = array('1'=>'January','2'=>'February','3'=>'March','4'=>'April','5'=>'May','6'=>'June','7'=>'July','8'=>'August','9'=>'September','10'=>'October','11'=>'November','12'=>'December');
  
  public function construirPagina(){
    // $value = str_replace(array('.',','), array('','.'),'11.112.000,40');
    // echo $value;
    // echo number_format($value,'.','');
    // exit();
    $tags = array();    
    if(!Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/login.php");
    } 
    $action = Utils::getParam('action','',$this->data);

    switch($action){
      case 'saveFP':
      try {
        $year = Utils::getParam('yearFinan', '', $this->data);
        $listData = Modelo_FinancialPlanning::getList($year);
        $obtainData = $_POST;
        $dataToSave = array();
        foreach ($obtainData as $key => $value) {
          $explode = explode("_", $key);
          $keyEx = $explode[1];
          if($explode[0] == 'var'){
            $columnArray = array_column($listData, 'CODIGO_AUX');
            $getRow = array_search($keyEx, $columnArray);
            $flag = 0;
            foreach ($value as $key1 => $value1) {
              if(!empty($value1) && $key1 != 13){
                $flag = 1;
                break;
              }
            }
            if($flag == 1){
              $arrayValue = array();
        $arrayValue['jan'] = (!empty($value[0])) ? (float)number_format(str_replace(array('.',','), array('','.'),$value[0]),3, '.', '') : '';
        $arrayValue['feb'] = (!empty($value[1])) ? (float)number_format(str_replace(array('.',','), array('','.'),$value[1]),3, '.', '') : '';
        $arrayValue['mar'] = (!empty($value[2])) ? (float)number_format(str_replace(array('.',','), array('','.'),$value[2]),3, '.', '') : '';
        $arrayValue['apr'] = (!empty($value[3])) ? (float)number_format(str_replace(array('.',','), array('','.'),$value[3]),3, '.', '') : '';
        $arrayValue['may'] = (!empty($value[4])) ? (float)number_format(str_replace(array('.',','), array('','.'),$value[4]),3, '.', '') : '';
        $arrayValue['jun'] = (!empty($value[5])) ? (float)number_format(str_replace(array('.',','), array('','.'),$value[5]),3, '.', '') : '';
        $arrayValue['jul'] = (!empty($value[6])) ? (float)number_format(str_replace(array('.',','), array('','.'),$value[6]),3, '.', '') : '';
        $arrayValue['aug'] = (!empty($value[7])) ? (float)number_format(str_replace(array('.',','), array('','.'),$value[7]),3, '.', '') : '';
        $arrayValue['sep'] = (!empty($value[8])) ? (float)number_format(str_replace(array('.',','), array('','.'),$value[8]),3, '.', '') : '';
        $arrayValue['oct'] = (!empty($value[9])) ? (float)number_format(str_replace(array('.',','), array('','.'),$value[9]),3, '.', '') : '';
        $arrayValue['nov'] = (!empty($value[10])) ? (float)number_format(str_replace(array('.',','), array('','.'),$value[10]),3, '.', '') : '';
        $arrayValue['dec'] = (!empty($value[11])) ? (float)number_format(str_replace(array('.',','), array('','.'),$value[11]),3, '.', '') : '';
        $arrayValue['total'] = (!empty($value[12])) ? (float)number_format(str_replace(array('.',','), array('','.'),$value[12]),3, '.', '') : '';
        $arrayValue['code'] = $value[13];


        $_SESSION['acfSession']['mostrar_exito'] = 'The account was successfully created.';

        // $arrayValue['year'] = $year;
              if(!empty($getRow)){
                $dataToUpdate[] = array('VALPRE01'=>$arrayValue['jan'],'VALPRE02'=>$arrayValue['feb'],'VALPRE03'=>$arrayValue['mar'],'VALPRE04'=>$arrayValue['apr'],'VALPRE05'=>$arrayValue['may'],'VALPRE06'=>$arrayValue['jun'],'VALPRE07'=>$arrayValue['jul'],'VALPRE08'=>$arrayValue['aug'],'VALPRE09'=>$arrayValue['sep'],'VALPRE10'=>$arrayValue['oct'],'VALPRE11'=>$arrayValue['nov'],'VALPRE12'=>$arrayValue['dec'], 'TOTAL'=>$arrayValue['total'], 'CODE'=>$arrayValue['code'],'YEAR'=>$year);
              }
              else{
                $dataToSave[] = array('VALPRE01'=>$arrayValue['jan'],'VALPRE02'=>$arrayValue['feb'],'VALPRE03'=>$arrayValue['mar'],'VALPRE04'=>$arrayValue['apr'],'VALPRE05'=>$arrayValue['may'],'VALPRE06'=>$arrayValue['jun'],'VALPRE07'=>$arrayValue['jul'],'VALPRE08'=>$arrayValue['aug'],'VALPRE09'=>$arrayValue['sep'],'VALPRE10'=>$arrayValue['oct'],'VALPRE11'=>$arrayValue['nov'],'VALPRE12'=>$arrayValue['dec'], 'TOTAL'=>$arrayValue['total'], 'CODIGO'=>$arrayValue['code'],'ANO'=>$year);
              }
            }
          }
        }
        $GLOBALS['db']->beginTrans();
        if(!empty($dataToUpdate)){
          foreach ($dataToUpdate as $key => $value) {
            if(!Modelo_FinancialPlanning::Update($value)){
              throw new Exception("An error has ocurred. Please try again.");
              
            }
          }
        }
        echo count($dataToSave);
        // exit();
        if(!empty($dataToSave)){
          foreach ($dataToSave as $key => $value) {
            if(!Modelo_FinancialPlanning::insert($value)){
              // print_r($value);
              throw new Exception("An error has ocurred. Please try again.");
            }
          }
        }
        // exit();
        
        $_SESSION['acfSession']['mostrar_exito'] = 'The financial planning data was successfully saved.';
        $GLOBALS['db']->commit();
        Utils::doRedirect(PUERTO.'://'.HOST.'/financialplanning/');

      } catch (Exception $e) {
        $GLOBALS['db']->rollback();
        $_SESSION['acfSession']['mostrar_error'] = $e->getMessage();
        Utils::doRedirect(PUERTO.'://'.HOST.'/financialplanning/');
      }

      break;         
      default:    
      $year = date('Y');
      $date = Utils::getParam('yearFinancial', '', $this->data);
      $year = (!empty($date)) ?$date:$year; 
        // $results = Modelo_ChartAccount::searchAccountsAct();
      $results = Modelo_FinancialPlanning::getData($year);
          // print_r($results);
        // foreach ($results as $key => $value) {
        //   print_r($value);
        //   echo "<br>";
        // }


        $tags["yearFinancial"] = $year;
        $tags["results"] = $results;
        $tags["permission"] = $_SESSION['acfSession']['permission'][$this->item];
        $tags["months"] = $this->months;
        $tags["template_js"][] = "financialPlanning";
        Vista::render('financialplanning',$tags);
      break;
    }
    
  }

}
?>