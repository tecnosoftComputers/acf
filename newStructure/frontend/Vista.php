<?php
class Vista {

  public static function render($pagina, $template_vars = array(),$cabecera='cabecera', $piepagina='piepagina',$deshabilitarmenu=''){

    if (!empty($template_vars))
      extract($template_vars);


    $sess_err_msg = self::obtieneMsgError();
    $sess_suc_msg = self::obtieneMsgExito();
    $sess_not_msg = self::obtieneMsgNotif();
    $menu = self::obtieneMenu($deshabilitarmenu);
    if( !$sess_err_msg ){
      $sess_err_msg = '';
    }
    if (!$sess_suc_msg){
      $sess_suc_msg = '';
    } 
    if (!$sess_not_msg){
      $sess_not_msg = '';
    }
    ob_start();
    if (!empty ($cabecera)){    
      require_once RUTA_VISTA . "html/". $cabecera . '.php';
    }
    $ruta = RUTA_VISTA . "html/". $pagina . '.php';
    if( file_exists($ruta) ){
      require_once $ruta;       
    }    
    else{
      echo 'Esta pagina no existe : '. $pagina;  
    }
    if (!empty($piepagina)){  
      require_once RUTA_VISTA . "html/" . $piepagina . '.php';
    }    
    ob_end_flush(); 
  }

  public static function display($pagina, $template_vars = array()){    
    if (!empty($template_vars))
      extract($template_vars);    
    ob_start();
    $ruta = RUTA_VISTA . "html/". $pagina . '.php';
    if(file_exists($ruta) ){
      require $ruta;       
    }    
    else{
      echo 'Esta pagina no existe : '. $pagina;  
    }        
    $to_return = ob_get_clean();
    return $to_return;
  }
  
  private static function obtieneMsgError(){
    $msg = "";
    if( isset($_SESSION['acfSession']['mostrar_error']) && !empty($_SESSION['acfSession']['mostrar_error']) ){
      $msg = $_SESSION['acfSession']['mostrar_error'];
      $msg = str_replace (array("\r\n", "\n", "\r"), '', $msg);
      $msg = htmlentities($msg, ENT_QUOTES, 'UTF-8');
      unset($_SESSION['acfSession']['mostrar_error']);
    }
    return $msg;
  }
  
  private static function obtieneMsgExito(){
    $msg = "";
    if( isset($_SESSION['acfSession']['mostrar_exito']) && !empty($_SESSION['acfSession']['mostrar_exito']) ){
      $msg = $_SESSION['acfSession']['mostrar_exito'];
      $msg = str_replace (array("\r\n", "\n", "\r"), '', $msg);
      $msg = htmlentities($msg, ENT_QUOTES, 'UTF-8');
      unset($_SESSION['acfSession']['mostrar_exito']);
    }
    return $msg;
  } 

  private static function obtieneMsgNotif(){
    $msg = "";    
    if( isset($_SESSION['acfSession']['mostrar_notif']) && !empty($_SESSION['acfSession']['mostrar_notif']) ){
      $msg = $_SESSION['acfSession']['mostrar_notif'];
      $msg = str_replace (array("\r\n", "\n", "\r"), '', $msg);
      $msg = htmlentities($msg, ENT_QUOTES, 'UTF-8');
      unset($_SESSION['acfSession']['mostrar_notif']);
    }
    return $msg;
  }  

  private static function obtieneMenu($deshabilitarmenu){
  
    $role        = $_SESSION['acfSession']['correo'];
    $user       = $_SESSION['acfSession']['usuario'];
    $lasesion   = $_SESSION['acfSession']['lasesion'];

    $sesion = Modelo_SesionInit::buscarSesion($lasesion);
    $acceso = $sesion['modulo'];
    $id_empresa = $sesion['id_empresa'];
        
    $_SESSION['acfSession']['id_empresa'] = $id_empresa; 

    $all_upde = Modelo_UserModel::searchUserMod($user);
    $all_upd = Modelo_UserCompanie::searchUserComp($user);

    $menu = '<nav class="navbar navbar-default navbar-static-top" role="navigation" style="border-bottom:1px solid #b1d09e; margin-bottom: -60px">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    </div>
    <form id="form_g" action="'.PUERTO.'://'.PREVIOUS_SYSTEM.'controlador/c_sesion/generar.php" class="navbar-form" method="POST">
    <ul class="nav navbar-top-links navbar-right">
    <li class=""><a style="font-size: 22px; font-weight: bold; color:#c61818" href="?cid=dashboard/init">ACF</a></li>
    <li class="">
    <select id="y" name="y" class="form-control" onchange="enviarForm()" style="width: 200px;">';
    foreach ($all_upde as $vale_conf) {
      if ($acceso == $vale_conf['id_config']){ 
        $menu .= '<option value="'.$vale_conf['id_config'].'" style="font-size: 15px;" selected="" disabled> 
        '.$vale_conf['name_access'].'</option>';
      }else{
        $menu .= '<option value="'.$vale_conf['id_config'].'" style="font-size: 15px;"> 
        '.$vale_conf['name_access'].'</option>';
      } 
    } 
    $menu .= '</select>
   
    </li>

    <li class="">

    <select id="x" name="x" class="form-control" onchange="enviarForm()" style="width: 300px;">';
    foreach ($all_upd as $vale){ 
      if ($id_empresa == $vale['id_empresa']) { 
        $menu .= '<option value="'.$vale['id_empresa'].'" style="font-size: 15px;" selected="">'.$vale['nombre_empresa'].'</option>';
      } else{ 
        $menu .= '<option value="'.$vale['id_empresa'].'" style="font-size: 15px;"> 
        '.$vale['nombre_empresa'].'</option>';
      } 
    } 
    $menu .= '</select>
   
    </li></form>';
    
    $modules = Modelo_Module::searchModules();

    foreach ($modules as $key => $value) {
      $id_module = $value['id_modulo'];

      if($id_module != '1' && $id_module != '7'){
        $icons = $value['icons'];
        $data_name = $value['nombre_modulo'];
        $all_sql = Modelo_Permission::searchPermission($id_module,$role,$acceso);
        $menu .= self::subMenu($icons, $data_name,$all_sql,$id_module,$acceso);
      }
    }

    $menu .= '<li><a><i class="fa fa-user"></i>'.strtoupper($_SESSION['acfSession']["elrol"]).'</a></li>
    <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
    <i class="fa fa-sign-in fa-fw"></i>
    </a>
    <ul class="dropdown-menu dropdown-user">
    <li><a href="">'.strtoupper($_SESSION['acfSession']["persona"]).'</a></li>
    <li><a href="'.PUERTO.'://'.HOST.'/reestablecerSistema/"><i class="fa fa-eye fa-fw"></i> RESTABLECER SISTEMA</a></li>
    <li class="divider"></li> 
    <li><a href="'.PUERTO.'://'.HOST.'/close/"><i class="fa fa-sign-out fa-fw"></i> CERRAR SESIÓN</a></li>
    </ul>
    </li>
    </ul>

    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="text-decoration:none"><i id="elfa" class="fa fa-times" style="font-size: 30px; color:white"></i></a>
    <div class="navbar-default sidebar" style="margin-top: 50px;" role="navigation">
    <div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
    <li><a href="?cid=dashboard/init"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>';
    if ($_SESSION['acfSession']['correo'] == 1){

      foreach ($modules as $key => $value) {

        $id_module = $value['id_modulo'];
        if($id_module == '7'){
          $icons = $value['icons'];
          $data_name = $value['nombre_modulo'];
          $all_sql = Modelo_Permission::searchPermission2($id_module,$role);
          $menu .= self::subMenuDos($icons,$data_name,$all_sql,$id_module,$acceso);
          break;
        }
      }
      foreach ($modules as $key => $value) {

        $id_module = $value['id_modulo'];
        if($id_module == '1'){
          $icons = $value['icons'];
          $data_name = $value['nombre_modulo'];
          $all_sql = Modelo_Permission::searchPermission2($id_module,$role);
          $menu .= self::subMenuDos($icons,$data_name,$all_sql,$id_module,$acceso);
          break;
        }        
      }

    }else{
     foreach ($modules as $key => $value) {

        $id_module = $value['id_modulo'];
        if($id_module == '1'){
          $icons = $value['icons'];
          $data_name = $value['nombre_modulo'];
          $all_sql = Modelo_Permission::searchPermission2($id_module,$role);
          $menu .= self::subMenuDos($icons,$data_name,$all_sql,$id_module,$acceso);
          break;
        }
      }
    }
    $menu .= '</ul>
    </div>
    </div>
    </div>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa fa-list-ul"></i></span>
    </nav>';

    return $menu;
  }

  public static function subMenu($icons, $data_name,$all_sql,$modulo,$acceso){

    $submenu = '<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
    <i class="'.$icons.'"></i>'.$data_name.'
    </a>

    <ul class="dropdown-menu dropdown-messages">';
    foreach ((array)$all_sql as $data_sql) {
      if($acceso == 3 || ($acceso == 1 && $modulo == 4) || ($acceso == 1 && $modulo == 5)){
        $enlace = PUERTO.'://'.HOST.'/'.$data_sql['src_head'];
      } else{
        $enlace = PUERTO.'://'.PREVIOUS_SYSTEM.'inicializador/vistas/app/in.php'.$data_sql['src_head'];
      }

      $submenu .= '<li>
      <a href="'.$enlace.'"><i class="fa fa-caret-right"></i>'.$data_sql['nombre_item'].'</a>
      </li>';
    }
    return $submenu .= '</ul>
    </li>';
  }

  public static function subMenuDos($icons, $data_name,$all_sql,$modulo,$acceso){

    $submenu = '<li>
        <a href="#" id="font-lista"><i class="'.$icons.'"></i>'.$data_name.'<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">';
    foreach ((array) $all_sql as $data_sql) { 
      $submenu .= '<li>';

      if($acceso == 3 || ($acceso == 1 && $modulo == 4)){
        $enlace = PUERTO.'://'.HOST.'/'.$data_sql['src_head'];
      } else{
        $enlace = PUERTO.'://'.PREVIOUS_SYSTEM.'inicializador/vistas/app/in.php'.$data_sql['src_head'];
      }

      $submenu .= '<a href="'.$enlace.'"><i class="fa fa-caret-right"></i>'.$data_sql['nombre_item'].'</a>
        </li>';
    }
    return $submenu .= '</ul>
    </li>';
  }

  public static function renderJSON($template_vars=array()){
    array_walk_recursive($template_vars, function(&$item){
      $item = utf8_encode($item); 
    });
    echo json_encode($template_vars);
  }
}
?>