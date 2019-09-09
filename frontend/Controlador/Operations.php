<?php
class Controlador_Operations extends Controlador_Base {
  
  public function construirPagina(){
  
    $tags = array();         

    if(!Utils::estaLogueado()){
      header("Location: ".PUERTO."://".HOST."/login/");
    } 

    $opcion = Utils::getParam('opcion','',$this->data);
    switch($opcion){
      case 'reestablecerSistema':
        self::reestablecerSistema();
      break;
      /*case 'close':
        session_destroy();
        header("Location: ".PUERTO."://".HOST."/login/");
      break;*/
      default:          
      	$tags = array();
        Vista::render('dashboard', $tags);
      break;
    }
    
  }

  public function reestablecerSistema(){

    try{  
      $GLOBALS['db']->beginTrans();

      Modelo_User::truncateTabla();
      Modelo_UserCompanie::truncateTabla();
      Modelo_UserModel::truncateTabla();
      Modelo_Permission::truncateTabla();
      Modelo_SesionInit::truncateTabla();
      Modelo_Roles::truncateTabla();
      Modelo_Access::truncateTabla();

      // INSERTS 
      $arreglo_datos = array('nombre_rol'=>'Admin', 'fecha_registro'=>'"'.date('Y-m-d H:i:s').'"','estado'=>'"'.'A'.'"');
      Modelo_Roles::firtsInsert($arreglo_datos);
      
      $arreglo_datos = array('username'=>'tecnosoft', 'namesurname'=>'Tecnosoft Computers', 'position'=>'1', 'role'=>'Admin','correo'=>'gerencia@tecnosoftcomputers.com', 'passw'=>'ef7f812bc1d1a40e9afc6065e7022046cf89f48a', 'initial_system'=>'1', 'fecha_registro'=>'"'.date('Y-m-d H:i:s').'"', 'estado'=>'A');
      Modelo_User::firtsInsert($arreglo_datos);

      $arreglo_datos = array(array(1,1,1,'"'.date('Y-m-d H:i:s').'"','"'.'ACTIVO'.'"'),array(1,1,2,'"'.date('Y-m-d H:i:s').'"','"'.'ACTIVO'.'"'),array(1,1,3,'"'.date('Y-m-d H:i:s').'"','"'.'ACTIVO'.'"'),array(1,1,4,'"'.date('Y-m-d H:i:s').'"','"'.'ACTIVO'.'"'),array(1,1,5,'"'.date('Y-m-d H:i:s').'"','"'.'ACTIVO'.'"'),array(1,1,6,'"'.date('Y-m-d H:i:s').'"','"'.'ACTIVO'.'"'),array(1,1,7,'"'.date('Y-m-d H:i:s').'"','"'.'ACTIVO'.'"'));
      Modelo_Permission::firtsInsert($arreglo_datos);

      // Empresas
      $arreglo_datos = array(array(1, 1, '"'.'A'.'"'),array(1, 2, '"'.'A'.'"'),array(1, 3, '"'.'A'.'"'),array(1, 4, '"'.'A'.'"'),array(1, 5, '"'.'A'.'"'),array(1, 6, '"'.'A'.'"'));
      Modelo_UserCompanie::firtsInsert($arreglo_datos);

      // Modulos
      $arreglo_datos = array(array(1, 1, '"'.'A'.'"'),array(1, 2, '"'.'A'.'"'),array(1, 3, '"'.'A'.'"'),array(1, 4, '"'.'A'.'"'),array(1, 5, '"'.'A'.'"'),array(1, 6, '"'.'A'.'"'));
      Modelo_UserModel::firtsInsert($arreglo_datos);

      // Accesos
      $arreglo_datos = array(array(1, 1, 51, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 50, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 49, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 48, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 47, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 46, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 45, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 44, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 43, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 42, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 41, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 40, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 39, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 38, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 37, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 36, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 35, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 34, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 33, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 32, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 31, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 30, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 29, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 28, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 27, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 26, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 1, 25, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),                                      array(1, 2, 54, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 55, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 56, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 57, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 58, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 59, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 60, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 61, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 62, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 63, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 64, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 65, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 66, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 67, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 68, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 69, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 70, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 71, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 72, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 73, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 74, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 75, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 76, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'),array(1, 2, 77, '"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"','"'.'A'.'"'));
      Modelo_Access::firtsInsert($arreglo_datos);
      
      $GLOBALS['db']->commit();

      session_start();
      session_unset();
      session_destroy();
      header("Location: ../../login.php");
    }
    catch(Exception $e){
        $GLOBALS['db']->rollback();
        echo "Reestablecimiento no completado<br>";            
    }
  }
}  
?>