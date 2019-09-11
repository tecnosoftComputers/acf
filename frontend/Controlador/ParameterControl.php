<?php
class Controlador_ParameterControl extends Controlador_Base {
  
  public function construirPagina(){
  
    $tags = array();    

    if(!Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/login/");
    } 

    $opcion = Utils::getParam('opcion','',$this->data); 
    $tabla = $_SESSION['acfSession']['tabla'];
    switch($opcion){
      default:  

        if(isset($_SESSION['acfSession']['error']) && $_SESSION['acfSession']['error'] == true){
          $error = true;
        }else{
          $error = false;
        }
        unset($_SESSION['acfSession']['error']);

        if(Utils::getParam('save') == 1){
          try{ 
            $campos = array('param'=>1);
            $data = $this->camposRequeridos($campos);
            $datos = array('MORE'=>$data['param']);

            $GLOBALS['db']->beginTrans();
            if(!Modelo_ParameterControl::setUpdate($datos)){
              throw new Exception('The more leanding could not be edited, try again.');
            }
            $_SESSION['acfSession']['mostrar_exito'] = 'The more leanding was successfully edited.';
            $GLOBALS['db']->commit();
            Utils::doRedirect(PUERTO.'://'.HOST.'/dashboard/');
          }
          catch(Exception $e){
            $GLOBALS['db']->rollback();
            $_SESSION['acfSession']['mostrar_error'] = $e->getMessage();           
          }
        }

        $parameters['MORE']='18.00';//Modelo_ParameterControl::search();
        $tags = array('parameters'=>$parameters);

        $tags["template_js"][] = "parameters";
        $tags["template_css"][] = "";

        Vista::render('parameterControl', $tags);
      break;
    }
    
  }
}  
?>