<?php
class Controlador_Logout extends Controlador_Base {
  
  public function construirPagina(){

    if( Utils::estaLogueado() ){      
      session_regenerate_id(true);
      session_destroy();
    }
    Utils::doRedirect(PUERTO.'://'.HOST.'/login/');
  }

}
?>