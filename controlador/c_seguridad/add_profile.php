<?php
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

if (isset($_POST['register'])){
	try{
	   $pro = $_POST['_descripcion'];
       $obs = $_POST['_obs'];

       $roll = $db->prepare("SELECT * FROM roles WHERE nombre_rol ='$pro'");
       $roll->execute();
       $cant = $roll->rowCount();

	   if ($cant == 0) {
		$stmt = $db->prepare("INSERT INTO roles (nombre_rol, estado, observacion) VALUES ('$pro', 'A', '$obs')");
		if ($stmt->execute()){
          $send = $db->prepare("select id_rol from roles order by id_rol desc limit 1");
          $send->execute();
          $total = $send->fetchAll(PDO::FETCH_ASSOC);
          
          foreach((array) $total as $in) {
            $perfil = $in['id_rol'];
          }

          $insert = $db->prepare("INSERT INTO access 
                                            (a_perfil, a_modulo, a_item, cs,sav,edi,del,pri) VALUES
                                                            ('$perfil', 1, 51, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 50, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 49, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 48, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 47, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 46, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 45, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 44, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 43, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 42, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 41, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 40, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 39, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 38, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 37, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 36, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 35, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 34, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 33, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 32, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 31, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 30, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 29, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 28, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 27, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 26, 'I','I','I','I','I'),
                                                            ('$perfil', 1, 25, 'I','I','I','I','I'),
                                                                      
                                                                                                                        
                                                            ('$perfil', 2, 54, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 55, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 56, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 57, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 58, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 59, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 60, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 61, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 62, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 63, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 64, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 65, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 66, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 67, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 68, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 69, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 70, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 71, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 72, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 73, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 74, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 75, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 76, 'I','I','I','I','I'),
                                                            ('$perfil', 2, 77, 'I','I','I','I','I'),
                                                            
                                                            
                                                            ('$perfil', 3, 78, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 79, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 80, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 81, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 82, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 83, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 84, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 85, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 86, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 87, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 88, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 89, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 90, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 91, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 92, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 93, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 94, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 95, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 96, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 97, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 98, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 99, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 100, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 101, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 102, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 103, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 104, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 105, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 106, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 107, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 108, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 109, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 110, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 111, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 112, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 113, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 114, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 115, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 116, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 117, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 118, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 119, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 120, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 121, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 122, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 123, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 124, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 125, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 126, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 127, 'I','I','I','I','I'),
                                                            ('$perfil', 3, 128, 'I','I','I','I','I'),
                                                            
                                                                                                                        
                                                            ('$perfil', 4, 129, 'I','I','I','I','I'),
                                                            ('$perfil', 4, 130, 'I','I','I','I','I'),
                                                            ('$perfil', 4, 131, 'I','I','I','I','I'),
                                                            ('$perfil', 4, 132, 'I','I','I','I','I'),
                                                            ('$perfil', 4, 133, 'I','I','I','I','I'),
                                                            ('$perfil', 4, 134, 'I','I','I','I','I'),
                                                            ('$perfil', 4, 135, 'I','I','I','I','I'),
                                                            ('$perfil', 4, 136, 'I','I','I','I','I'),                                                            
                                                            ('$perfil', 4, 137, 'I','I','I','I','I'),
                                                            ('$perfil', 4, 138, 'I','I','I','I','I'),
                                                            ('$perfil', 4, 139, 'I','I','I','I','I'),
                                                            ('$perfil', 4, 140, 'I','I','I','I','I'),
                                                            ('$perfil', 4, 141, 'I','I','I','I','I'),
                                                            ('$perfil', 4, 142, 'I','I','I','I','I'),
                                                            ('$perfil', 4, 143, 'I','I','I','I','I'),
                                                            ('$perfil', 4, 144, 'I','I','I','I','I'),
                                                            ('$perfil', 4, 145, 'I','I','I','I','I'),
                                                            ('$perfil', 4, 146, 'I','I','I','I','I'),
                                                            ('$perfil', 4, 147, 'I','I','I','I','I'),
                                                            

                                                            ('$perfil', 6, 148, 'I','I','I','I','I'),
                                                            ('$perfil', 6, 149, 'I','I','I','I','I')
                                                            ");
		$insert->execute();
          echo '<script>
                    alert("Perfil Regisrado");
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=seguridad/nivel"; 
                </script>';            
      }else{
    			echo '<script>
                        alert("Error");
                        window.history.back();
                      </script>';
        }
      }else{
        echo '<script>
                    alert("Este nombre de rol no esta disponible");
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=seguridad/nivel"; 
                </script>';
      }
   	}catch(PDOException $e){
    		$output['error'] = true;
     		$output['message'] = $e->getMessage();
   	}
}