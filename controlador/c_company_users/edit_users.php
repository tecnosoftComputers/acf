<?php
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

if (isset($_POST['update'])){
	try{
		$id           = $_POST['laid'];
		$username     = $_POST['username'];
		$namesurname  = $_POST['namesurname'];
		$position     = $_POST['position'];
        $phone        = $_POST['phone'];
        $mail         = $_POST['email'];
        $passw        = $_POST['password'];
        $initial      = $_POST['initial'];
        
        $select = $_POST['emp'];
        $mod = $_POST['mod'];
        
        // Extraer la position del role
        $end = $db->prepare("SELECT * FROM roles WHERE nombre_rol = '$position' ");
        $end->execute();
        $all = $end->fetchAll();
        
        foreach((array) $all as $results) {
            $id_rol = $results['id_rol'];
        }
  
		$sql = $db->prepare("UPDATE usuarios SET 
                                    username = '$username',namesurname= '$namesurname',position='$id_rol',role = '$position',
                                    telefono='$phone',correo='$mail',passw='$passw', initial_system='$initial'
                            WHERE id_usuario = '$id'");
        
		//verifica el tipo de mensaje a mostrar
		if($sql->execute()){
          
          /***********************
            PERMISOS DE EMPRESAS
            **************************/
            $del = $db->prepare("DELETE FROM usuarios_empresas WHERE id_user='$id'");
            $del->execute();
            
            $empresas = $db->prepare("INSERT INTO usuarios_empresas (id_user, empresas, estado) VALUES  ('$id', 1, 'I'),
                                                                                                        ('$id', 2, 'I'),
                                                                                                        ('$id', 3, 'I'),
                                                                                                        ('$id', 4, 'I'),
                                                                                                        ('$id', 5, 'I'),
                                                                                                        ('$id', 6, 'I')");
             $empresas->execute();
             
             // Enviar las empresas de acceso con estado activo A
             foreach ((array) $select as $losdatos) {
                $add = $db->prepare("UPDATE usuarios_empresas SET estado='A' WHERE id_user='$id' AND empresas='$losdatos'");
                $add->execute();
             }


             /**************************
                PERMISOS DE MODULOS
              **************************/
            $del3 = $db->prepare("DELETE FROM usuarios_modulos WHERE id_user='$id'");
            $del3->execute();
            
            $empresas3 = $db->prepare("INSERT INTO usuarios_modulos (id_user, modulos, estado) VALUES    ('$id', 1, 'I'),
                                                                                                         ('$id', 2, 'I'),
                                                                                                         ('$id', 3, 'I'),
                                                                                                         ('$id', 4, 'I'),
                                                                                                         ('$id', 5, 'I'),
                                                                                                         ('$id', 6, 'I')");
             $empresas3->execute();
             
             // Enviar las empresas de acceso con estado activo A
             foreach ((array) $mod as $losmod) {
                $add3 = $db->prepare("UPDATE usuarios_modulos SET estado='A' WHERE id_user='$id' AND modulos='$losmod'");
                $add3->execute();
             }
          
			echo '<script>
                    alert("Usuario editado");
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=company-users/users_list"; 
                  </script>';
		}else{
			echo '<script>
                    alert("Error al editar");
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=company-users/users_list"; 
                  </script>';
		}
	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();
	}
}	
?>