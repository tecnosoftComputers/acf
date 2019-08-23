<?php
require_once 'constantes.php';
require_once 'init.php';
//print_r($_SESSION);
dispatch();
$GLOBALS['db']->close();


function dispatch() {
    global $_SUBMIT;
    $pagina = Utils::getParam('mostrar', 'inicio');
    $controlador_nombre = obtieneControlador($pagina);
    $clase = 'Controlador_' . $controlador_nombre; 
    if(class_exists($clase)){
      $controlador = new $clase();
    }else{
      //no existe controlador
    }

    $tabla = Modelo_SystemCharts::searchCode($controlador_nombre); 
    if(!empty($tabla)){
      $_SESSION['tabla'] = $tabla;
    }else{
    }
    return $controlador->construirPagina(); 
  }
  
function obtieneControlador($nombre){
  switch($nombre){
    case 'operations':
      return 'Operations';
    break;
    case 'accounts':
      return 'Accounts';
    break;
    case 'systemCharts':
      return 'SystemCharts';
    break;
    case 'clients':
      return 'CLI';
    break;
    case 'activities':
      return 'ACT';
    break;
    case 'typeClients':
      return 'CLA';
    break;
    case 'creditDestinations':
      return 'DES';
    break;
    case 'typeIdentification':
      return 'IDE';
    break;
    case 'creditOfi':
      return 'OFI';
    break;
    case 'typesCalculations':
      return 'CAL';
    break;
    case 'products':
      return 'PRO';
    break;
    case 'currencies':
      return 'Currencies';
    break;
    case 'productsParameters':
      return 'ProductsParameters';
    break;
    case 'reports':
      return 'Reports';
    break;
    default:
      return 'Operations'; 
    break;
  }
  return ucfirst($nombre);
}
?>