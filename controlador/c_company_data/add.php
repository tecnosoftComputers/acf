<?php
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

	$output = array('error' => false);

	try{
	   $username    = $_POST['username'];
       $namesurname = $_POST['namesurname'];
       $position    = $_POST['position'];
       $phone       = $_POST['phone'];
       $email       = $_POST['email'];
       $passw       = $_POST['password'];
       $initial     = $_POST['initial'];
       $empresa     = 1;
       
		// hacer uso de una declaración preparada para evitar la inyección de sql
		$stmt = $db->prepare("INSERT INTO usuarios
            (id_empresa, username, namesurname, position, telefono, correo, passw, initial_system, estado) VALUES 
            ('$empresa','$username', '$namesurname', '$position', '$phone', '$email', '$passw', '$initial','A')");

		if ($stmt->execute()){
		     /*$rol = $db->prepare("INSERT INTO roles (nombre_rol, estado) VALUES ('$position', 'A')");
             $rol->execute();*/                
            //Obtener el ultimo id generado del usuario nuevo
                $get = $db->prepare("select id_usuario, initial_system from usuarios order by id_usuario desc limit 1");
                $get->execute();
                $total = $get->fetchAll(PDO::FETCH_ASSOC);
                foreach((array) $total as $in) {
                    $ultimo = $in['id_usuario'];
                    $system = $in['initial_system'];
                }
             // Insert una sesion para el nuevo usuario
             $sesion = $db->prepare("INSERT INTO sesion_init (id_empresa, id_user, modulo, estado_init) VALUES 
                                                            ('$empresa','$ultimo','$system','A')");
             $sesion->execute();
             
             $estad = 'ACTIVO';
             //Insert permisos para este usuario
             $permisos = $db->prepare("INSERT INTO permisos (id_empresa, nivel, permisos_modulo, estado) 
                                            VALUES ('$empresa','$position',1,'$estad'),
                                                   ('$empresa','$position',2,'$estad'),
                                                   ('$empresa','$position',3,'$estad'),
                                                   ('$empresa','$position',4,'$estad'),
                                                   ('$empresa','$position',5,'$estad'),
                                                   ('$empresa','$position',6,'$estad'),
                                                   ('$empresa','$position',7,'$estad')");
             $permisos->execute();
             
             // Enviar las empresas de acceso
             foreach ((array) $_POST['emp'] as $losdatos) {
                $add = $db->prepare("INSERT INTO usuarios_empresas (id_user,id_empresa,estado) VALUES ('$ultimo','$losdatos','A')");
                $add->execute();
             }
			$output['message'] = 'Usuario agregado correctamente';
		}else{
			$output['error'] = true;
			$output['message'] = 'Ocurrió un error al agregar. No se pudo agregar';
		}
	}
	catch(PDOException $e){
		$output['error'] = true;
 		$output['message'] = $e->getMessage();
	}
	echo json_encode($output);