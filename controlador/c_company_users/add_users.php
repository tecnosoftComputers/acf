<?php
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

if (isset($_POST['register'])){
	try{
	     $username    = $_POST['username'];
       $namesurname = $_POST['namesurname'];
       $position    = $_POST['position'];
       $phone       = $_POST['phone'];
       $email       = $_POST['email'];
       $passw       = sha1($_POST['password']);
       $initial     = $_POST['initial'];
       $select      = $_POST['emp'];
       $mod         = $_POST['mod'];
  if (isset($select)) {
    if (isset($mod)) {
       
       $roll = $db->prepare("SELECT * FROM roles WHERE id_rol ='$position'");
       $roll->execute();
       $nroll = $roll->fetchAll(PDO::FETCH_ASSOC);
       
       foreach ((array) $nroll as $view) {
            $namerol = $view['nombre_rol'];
       }
       
		// hacer uso de una declaración preparada para evitar la inyección de sql
		$stmt = $db->prepare("INSERT INTO usuarios
            (username, namesurname, position, role, telefono, correo, passw, initial_system, estado) VALUES 
            ('$username', '$namesurname', '$position', '$namerol', '$phone', '$email', '$passw', '$initial','A')");

		if ($stmt->execute()){               
      //Obtener el ultimo id generado del usuario nuevo
      $get = $db->prepare("select id_usuario, initial_system from usuarios order by id_usuario desc limit 1");
      $get->execute();
      $total = $get->fetchAll(PDO::FETCH_ASSOC);
      foreach((array) $total as $in) {
        $uss = $in['id_usuario'];
        $system = $in['initial_system'];
      }

      $estad = 'ACTIVO';
      //Insert permisos para este usuario
             
             // Primero. Consultar si el rol seleccionado ya existe en la tabla permisos
             $consulta = $db->prepare("SELECT * FROM permisos WHERE nivel='$position'");
             $consulta->execute();
             $cantidad = $consulta->rowCount();
             
             if ($cantidad == 0) {
                $permisos = $db->prepare(
                //                      Usuario    Role   Modulo         Estado
                "INSERT INTO permisos (id_user_p, nivel, permisos_modulo,estado)
                VALUES ('$uss','$position',1,'$estad'),
                       ('$uss','$position',2,'$estad'),
                       ('$uss','$position',3,'$estad'),
                       ('$uss','$position',4,'$estad'),
                       ('$uss','$position',5,'$estad'),
                       ('$uss','$position',6,'$estad'),
                       ('$uss','$position',7,'$estad')");
                $permisos->execute();
             }
             
             /******************************
                PERMISOS 1 - EMPRESAS
              *******************************/
             $empresas = $db->prepare("INSERT INTO usuarios_empresas (id_user, empresas, estado) VALUES ('$uss', 1, 'I'),
                                                                                                        ('$uss', 2, 'I'),
                                                                                                        ('$uss', 3, 'I'),
                                                                                                        ('$uss', 4, 'I'),
                                                                                                        ('$uss', 5, 'I'),
                                                                                                        ('$uss', 6, 'I')");
             $empresas->execute();
             
             // Enviar las empresas de acceso con estado activo A
                foreach ((array) $select as $losdatos) {
                    $add = $db->prepare("UPDATE usuarios_empresas SET estado='A' WHERE id_user='$uss' AND empresas='$losdatos'");
                    $add->execute();
                }


              /******************************
                PERMISOS 2 - MODULOS
              *******************************/

              $modd = $db->prepare("INSERT INTO usuarios_modulos (id_user, modulos, estado) VALUES  ('$uss', 1, 'I'),
                                                                                                        ('$uss', 2, 'I'),
                                                                                                        ('$uss', 3, 'I'),
                                                                                                        ('$uss', 4, 'I'),
                                                                                                        ('$uss', 5, 'I'),
                                                                                                        ('$uss', 6, 'I')");
             $modd->execute();
             
             // Enviar las empresas de acceso con estado activo A
                foreach ((array) $mod as $losmod) {
                    $add_mod = $db->prepare("UPDATE usuarios_modulos SET estado='A' WHERE id_user='$uss' AND modulos='$losmod'");
                    $add_mod->execute();
                }

                echo '<script>
                        alert("Registrado");
                        window.location.href = "../../inicializador/vistas/app/in.php?cid=company-users/users_list"; 
                      </script>';
            }else{
    			echo '<script>
                        alert("Error");
                        window.history.back();
                      </script>';
      }
      }else{
         echo '<script>
                    alert("Debe eleigr al menos un modulo");
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=company-users/users_list"; 
                 </script>';
      }
    	}else{
    	   echo '<script>
                    alert("Debe eleigr al menos una empresa");
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=company-users/users_list"; 
                 </script>';
    	}
    }catch(PDOException $e){
    		$output['error'] = true;
     		$output['message'] = $e->getMessage();
    	}
}