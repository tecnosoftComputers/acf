<?php 
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

		// SI
		$sql = $db->prepare("truncate table usuarios");
		$sql->execute();

		$sql2 = $db->prepare("truncate table usuarios_empresas");
		$sql2->execute();

		$sql3 = $db->prepare("truncate table usuarios_modulos");
		$sql3->execute();		
		
		$sql3 = $db->prepare("truncate table permisos");
		$sql3->execute();

		$sql4 = $db->prepare("truncate table sesion_init");
		$sql4->execute();
	
		$sql4 = $db->prepare("truncate table roles");
		$sql4->execute();

		$sql5 = $db->prepare("truncate table access");
		$sql5->execute();

		// INSERTS 

		$stmt = $db->prepare("insert into roles (nombre_rol, fecha_registro, estado) values ('Admin',now(),'A')");
		$stmt->execute();

		$stmt2 = $db->prepare("insert into usuarios 
					(username, namesurname, position, role,correo, passw, initial_system, fecha_registro, estado) values 
	('tecnosoft','Tecnosoft Computers',1,'Admin','gerencia@tecnosoftcomputers.com','ef7f812bc1d1a40e9afc6065e7022046cf89f48a',1,now(), 'A');");
		$stmt2->execute();


		$stmt3 = $db->prepare("insert into permisos (id_user_p, nivel, permisos_modulo, fecha_registro, estado) values 
											(1,1,1,now(),'ACTIVO'),(1,1,2,now(),'ACTIVO'),(1,1,3,now(),'ACTIVO'),
										    (1,1,4,now(),'ACTIVO'),(1,1,5,now(),'ACTIVO'),(1,1,6,now(),'ACTIVO'),(1,1,7,now(),'ACTIVO')");
		$stmt3->execute();


		// Empresas

		$empresas = $db->prepare("INSERT INTO usuarios_empresas (id_user, empresas, estado) VALUES (1, 1, 'A'),(1, 2, 'A'),(1, 3, 'A'),
																									(1, 4, 'A'),(1, 5, 'A'),(1, 6, 'A')");
        $empresas->execute();

        // Modulos

        $modd = $db->prepare("INSERT INTO usuarios_modulos (id_user, modulos, estado) VALUES  (1, 1, 'A'),(1, 2, 'A'),(1, 3, 'A'),
                                                                                              (1, 4, 'A'),(1, 5, 'A'),(1, 6, 'A')");
        $modd->execute();


        // Accesos

        $insert = $db->prepare("INSERT INTO access (a_perfil, a_modulo, a_item, cs,sav,edi,del,pri) VALUES                                                            
                                                            
                                                            (1, 1, 51, 'A','A','A','A','A'),
                                                            (1, 1, 50, 'A','A','A','A','A'),
                                                            (1, 1, 49, 'A','A','A','A','A'),
                                                            (1, 1, 48, 'A','A','A','A','A'),
                                                            (1, 1, 47, 'A','A','A','A','A'),
                                                            (1, 1, 46, 'A','A','A','A','A'),
                                                            (1, 1, 45, 'A','A','A','A','A'),
                                                            (1, 1, 44, 'A','A','A','A','A'),
                                                            (1, 1, 43, 'A','A','A','A','A'),
                                                            (1, 1, 42, 'A','A','A','A','A'),
                                                            (1, 1, 41, 'A','A','A','A','A'),
                                                            (1, 1, 40, 'A','A','A','A','A'),
                                                            (1, 1, 39, 'A','A','A','A','A'),
                                                            (1, 1, 38, 'A','A','A','A','A'),
                                                            (1, 1, 37, 'A','A','A','A','A'),
                                                            (1, 1, 36, 'A','A','A','A','A'),
                                                            (1, 1, 35, 'A','A','A','A','A'),
                                                            (1, 1, 34, 'A','A','A','A','A'),
                                                            (1, 1, 33, 'A','A','A','A','A'),
                                                            (1, 1, 32, 'A','A','A','A','A'),
                                                            (1, 1, 31, 'A','A','A','A','A'),
                                                            (1, 1, 30, 'A','A','A','A','A'),
                                                            (1, 1, 29, 'A','A','A','A','A'),
                                                            (1, 1, 28, 'A','A','A','A','A'),
                                                            (1, 1, 27, 'A','A','A','A','A'),
                                                            (1, 1, 26, 'A','A','A','A','A'),
                                                            (1, 1, 25, 'A','A','A','A','A'),
                                                            
                                                            
                                                            (1, 2, 54, 'A','A','A','A','A'),
                                                            (1, 2, 55, 'A','A','A','A','A'),
                                                            (1, 2, 56, 'A','A','A','A','A'),
                                                            (1, 2, 57, 'A','A','A','A','A'),
                                                            (1, 2, 58, 'A','A','A','A','A'),
                                                            (1, 2, 59, 'A','A','A','A','A'),
                                                            (1, 2, 60, 'A','A','A','A','A'),
                                                            (1, 2, 61, 'A','A','A','A','A'),
                                                            (1, 2, 62, 'A','A','A','A','A'),
                                                            (1, 2, 63, 'A','A','A','A','A'),
                                                            (1, 2, 64, 'A','A','A','A','A'),
                                                            (1, 2, 65, 'A','A','A','A','A'),
                                                            (1, 2, 66, 'A','A','A','A','A'),
                                                            (1, 2, 67, 'A','A','A','A','A'),
                                                            (1, 2, 68, 'A','A','A','A','A'),
                                                            (1, 2, 69, 'A','A','A','A','A'),
                                                            (1, 2, 70, 'A','A','A','A','A'),
                                                            (1, 2, 71, 'A','A','A','A','A'),
                                                            (1, 2, 72, 'A','A','A','A','A'),
                                                            (1, 2, 73, 'A','A','A','A','A'),
                                                            (1, 2, 74, 'A','A','A','A','A'),
                                                            (1, 2, 75, 'A','A','A','A','A'),
                                                            (1, 2, 76, 'A','A','A','A','A'),
                                                            (1, 2, 77, 'A','A','A','A','A')");
		$insert->execute();

		session_start();
		session_unset();
		session_destroy();

		header("Location: ../../login.php");

	