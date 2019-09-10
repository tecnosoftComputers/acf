<?php
class Controlador_Login extends Controlador_Base {
 
  public function construirPagina(){

    if(Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/dashboard/");
    }

    if ( Utils::getParam('username') && Utils::getParam('password') ){
      
      try{
        $campos = array('username'=>1, 'password'=>1);        
        $data = $this->camposRequeridos($campos); 

        $usuario = Modelo_User::auth($data["username"],sha1($data["password"]));  

        if (!empty($usuario)){          

          $_SESSION['acfSession']["correo"]  = $usuario["position"];
          $_SESSION['acfSession']["usuario"] = $usuario["id_usuario"];
          $_SESSION['acfSession']["elrol"]   = $usuario["role"];
          $_SESSION['acfSession']["persona"] = $usuario["namesurname"];

          $_SESSION['acfSession']["id_modulo"] = $usuario['initial_system'];
           $_SESSION['acfSession']["modulo"] = $usuario['initial_system'];
          $_SESSION['acfSession']["estado_init"] = $usuario['estado'];                

          $_SESSION['acfSession']['id_empresa'] = $usuario['id_user_emp'];  
          $_SESSION['acfSession']['permission'] = Modelo_Access::searchPermission($usuario["id_usuario"]);   
          $_SESSION['acfSession']['code_iso'] = 'USD';
          $_SESSION['acfSession']['locale'] = 'en_US';
          $_SESSION['acfSession']['simbolo'] = '$';
    
          session_write_close();  
          header("location: ".PUERTO."://".HOST."/inicializador/vistas/app/in.php");
        }
        else{
          throw new Exception('Datos Incorrectos');
        }                         
      }
      catch( Exception $e ){
        $_SESSION['acfSession']['mostrar_error'] = $e->getMessage();        
      }
    } 
        
    $tags = array();    
    Vista::render('login',$tags);  
  }

}  
?>