<?php 
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
require_once 'constantes.php';
//new structure
//if ( isset($_GET['mostrar']) && !empty($_GET['mostrar']) ) {  
  require_once 'init.php';
  dispatch();
  $GLOBALS['db']->close();
/*}
else{
  require_once ("controlador/controller.php");
  require_once ("datos/clases/model.php");
  $mvc = new MvcController();
  $mvc -> elInicio();
}*/

function dispatch() {
  global $_SUBMIT;
  $pagina = Utils::getParam('mostrar', '');
  $controlador_nombre = obtieneControlador($pagina);
  $clase = 'Controlador_' . $controlador_nombre; 

  if(class_exists($clase)){
    $controlador = new $clase();

    $tabla = Modelo_SystemCharts::searchCode($controlador_nombre); 
    if(!empty($tabla)){
      $_SESSION['acfSession']['tabla'] = $tabla;
    }else{
    }
    return $controlador->construirPagina(); 

  }else{
//echo 'entro';
    /*require_once FRONTEND_RUTA.'inicializador/vistas/app/head.php';
    print_r($_GET);
    if( isset($_GET['cid']) ) {
      $fflush = FRONTEND_RUTA.'inicializador/vistas/app/'.$_GET['cid'];
    }else{
      $fflush = FRONTEND_RUTA.'inicializador/vistas/app/dashboard/init.php';
    } 

    $pos = strpos(".php", $fflush);
    if($pos === false){
     // echo $fflush; exit;
      $fflush = $fflush.".php";
    }
    require_once $fflush;
    require_once FRONTEND_RUTA.'inicializador/vistas/app/foot.php';*/
    //print_r($_SESSION); exit;
    //header("location: ".FRONTEND_RUTA.'inicializador/vistas/app/in.php');
  }
}
	  
function obtieneControlador($nombre){
  switch($nombre){
    case 'login':
      return 'Login';
    break;
    case 'logout':
      return 'Logout';
    break;
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
    case 'typeTrans':
      return 'TRA';
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
    case 'reportJournalEntries':
      return 'ReportJournalEntries';
    break;
    case 'reportChartAccounts':
      return 'ReportChartAccounts';
    break;
    case 'reportGeneralLedger':
      return 'ReportGeneralLedger';
    break;
    case 'reportBalanceSheet':
      return 'ReportBalanceSheet';
    break;
    case 'reportJournalSummary':
      return 'ReportJournalSummary';
    break;
    case 'reportTrialBalance':
      return 'ReportTrialBalance';
    break;
    /*default:
      return 'Operations'; 
    break;*/
  }
  return ucfirst($nombre);
} 
?>