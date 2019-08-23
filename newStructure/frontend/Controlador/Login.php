<?php
class Controlador_Login extends Controlador_Base {
 
  public function construirPagina(){    
    if(Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/dashboard/");
    }

    $username = Utils::getParam('username','');
    $password = Utils::getParam('password','');
     
    if (isset($username) || isset($password)){
        
      try{
        $campos = array('username'=>1, 'password1'=>1);        
        $data = $this->camposRequeridos($campos); 
//Utils::log(print_r($data,true)); 
        $usuario = Modelo_User::auth($data["username"],sha1($data["password"]));  

        if (!empty($usuario)){          
          $number_session = Modelo_User::searchNumberSession();                               
            
          foreach($number_session as $val) {
            $sesiones = $val['contador'];
            $sesiones = $sesiones + 1;
          }
          $_SESSION["correo"]  = $empresa["position"];
          $_SESSION["usuario"] = $empresa["id_usuario"];
          $_SESSION["elrol"]   = $empresa["role"];
          $_SESSION["persona"] = $empresa["namesurname"];
          // Nuevo iniciar con la empresa
          //$_SESSION["empresas"]    = $empresa["id_empresa"];
          
          $estado = 'I'; // ultimo cambio
       
          //la_sesion($sesiones, $_SESSION["usuario"], $estado, DBSTART::abrirDB());
          $row_ext = Modelo_User::findUser($_SESSION["usuario"]);
          //$ext = $db->prepare("SELECT * FROM usuarios WHERE id_usuario='$user'");
          //$ext->execute();
          //$row_ext = $ext->fetchAll(PDO::FETCH_ASSOC);
          
          foreach((array) $row_ext as $ladata){
              $el_acceso = $ladata['initial_system'];
          }

          
          //$sql = $db->prepare("INSERT INTO sesion_init (num_sesion,id_user, modulo, estado_init) VALUES 
          //                        ('$access','$user','$el_acceso','$std')");
          //$sql->execute(); 

          $vl_insert = array();
          $vl_insert["num_sesion"] = $access;
          $vl_insert["id_user"] = $_SESSION["usuario"];
          $vl_insert["modulo"] = $el_acceso;
          $vl_insert["estado_init"] = $estado;                
          if (!Modelo_SesionInit::insert($vl_insert)){
            throw new Exception('<div class="alert alert-danger">Internal Error</div>');
          }

          // generar un clave encriptada de sesion para extreerla
          //$solucion = DBSTART::abrirDB()->prepare("SELECT * FROM sesion_init WHERE num_sesion='$sesiones'");
          //$solucion->execute();
          //$ext = $solucion->fetchAll(PDO::FETCH_ASSOC);

          $ext = Modelo_SesionInit::buscarSesion($sesiones);

          foreach((array) $ext as $premier) {
            $premier_sesion = $premier['num_sesion'];
             $id_empresa = $premier['id_empresa'];
          }
          
          $_SESSION['lasesion'] = $premier_sesion;
           $_SESSION['id_empresa'] = $id_empresa;
          @ini_set("session.gc_maxlifetime", 900);        
          session_write_close();  

          header("Location: ".PUERTO."://".HOST."/dashboard/");

        }
        else{
          throw new Exception('<div class="alert alert-danger">Datos Incorrectos</div>');
        }                         
      }
      catch( Exception $e ){
        $_SESSION['mostrar_error'] = $e->getMessage();        
      }
    } 
        
    $tags = array('vista'=>'login');    
    Vista::render('login',$tags,'','');  
  }

}  
?>