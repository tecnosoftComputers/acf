<?php
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

	$output = array('error' => false);
	try{
		$id           = $_POST['id'];
		$username     = $_POST['username'];
		$namesurname  = $_POST['namesurname'];
		$position     = $_POST['position'];
        $phone        = $_POST['phone'];
        $mail         = $_POST['email'];
        $passw        = $_POST['password'];
        $initial      = $_POST['initial'];

		$sql = "UPDATE usuarios SET 
                                    username = '$username',
                                    namesurname= '$namesurname',
                                    position = '$position',
                                    telefono='$phone',
                                    correo='$mail',
                                    passw='$passw', 
                                    initial_system='$initial'
        
        WHERE id_usuario = '$id'";
        
		//verifica el tipo de mensaje a mostrar
		if($db->exec($sql)){
			$output['message'] = 'Usuario actualizado correctamente';
		} 
		else{
			$output['error'] = true;
			$output['message'] = 'Ocurrió un error al actualizar. No se pudo actualizar';
		}

	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();
	}

	echo json_encode($output);
	
?>