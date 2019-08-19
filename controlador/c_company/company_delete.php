<?php
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

	$output = array('error' => false);
	try{
		$sql = "DELETE FROM usuarios WHERE id_usuario = '".$_POST['id']."'";
		//verifica el tipo de mensaje a mostrar
		if($db->exec($sql)){
			$output['message'] = 'Miembro borrado correctamente';
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Ocurrió un error. No se pudo elimimar';
		} 
	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();;
	}

	echo json_encode($output);

?>