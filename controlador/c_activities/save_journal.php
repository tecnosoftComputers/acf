<?php /*** A D E L A N T O ***/

	if (isset($_REQUEST['cid'])) {
		$cid = $_REQUEST['cid'];
		
    	require_once ("../../datos/db/connect.php");

    	$valores = DBSTART::abrirDB()->prepare("UPDATE dpmovimi SET DB =1, CR=0 WHERE ASIENTO='$cid'");
	    $valores->execute();
    	//header('Location: ../../inicializador/vistas/app/in.php?cid=activities/view_journal');

    	echo '<script>window.history.back();</script>';
    	

}