<?php
class Controlador_ReportLedgerAccount extends Controlador_Reports {

  public function construirPagina(){ 

  	if(!Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/login.php");
    } 

    $action = Utils::getParam('action','',$this->data);
    switch($action){

    }
  }	
}
?>