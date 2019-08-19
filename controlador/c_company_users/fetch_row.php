<?php
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

	$output = array('error' => false);
	try{
		$id = $_POST['id'];
		$stmt = $db->prepare("SELECT * FROM usuarios u LEFT JOIN usuarios_empresas ue
                                    ON ue.id_user = u.id_usuario WHERE u.id_usuario = :id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$output['data'] = $stmt->fetch();
	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();
	}

	echo json_encode($output);