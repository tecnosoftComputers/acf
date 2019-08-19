<?php /*** R E T R O C E S O ***/

    require_once ("../../datos/db/connect.php");
    $sql = DBSTART::abrirDB()->prepare("SELECT MAX(AUX) AS auxi FROM dpmovimi"); // Localizando el actual aux
    $sql->execute();
    $all = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($all as $key => $value) {
    	$existe = $value['auxi'];
    }

    $val = 0;
    $val = $existe - 1;
    $sun = str_pad($val,8, "0", STR_PAD_LEFT);
    if ($val == 0) {
    	header('Location: ../../inicializador/vistas/app/activities/journal.php?cid=00000001');
    }else{
		    $stmt = DBSTART::abrirDB()->prepare("SELECT * FROM dpmovimi WHERE ASIENTO='$sun'");
		    $stmt->execute();
		    $cant = $stmt->rowCount();

		    if ($cant == 0) {
		    	$valores = DBSTART::abrirDB()->prepare("UPDATE dpmovimi SET AUX = AUX - 1");
		    	$valores->execute();
		    	header('Location: ../../inicializador/vistas/app/in.php?cid=activities/view_journal');
		    }else{
		    	$valores = DBSTART::abrirDB()->prepare("UPDATE dpmovimi SET AUX = AUX - 1");
		    	$valores->execute();
		    	header('Location: ../../inicializador/vistas/app/activities/journal.php?cid='.$sun);
		    }
		}