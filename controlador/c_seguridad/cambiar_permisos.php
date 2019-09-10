<?php
require_once "../../constantes.php";
require_once FRONTEND_RUTA."init.php"; 
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();
    
if (isset($_POST['yeah'])) {
        // ACCOUNTING
		$emp      = $_POST['val'];                // ITEM DEL MODULO
        $emp2     = $_POST['val_re'];             // READ
        $edi      = $_POST['val_ed'];             // EDIT
        $del1     = $_POST['val_de'];             // DELETED
        $print    = $_POST['val_pi'];             // PRINT
        
        // BANKS
        $emp_banks      = $_POST['val_banks'];
        $emp2_banks     = $_POST['val_re_banks'];
        $edi_banks      = $_POST['val_ed_banks'];
        $del1_banks     = $_POST['val_de_banks'];
        $print_banks    = $_POST['val_pi_banks'];
        
        // OPERATIONS
        $emp_ope      = $_POST['val_ope'];
        $emp2_ope     = $_POST['val_re_ope'];
        $edi_ope      = $_POST['val_ed_ope'];
        $del1_ope     = $_POST['val_de_ope'];
        $print_ope    = $_POST['val_pi_ope'];
        
        $perfil   = $_POST['id_perfil']; // PRINCIPAL

		// 1. Elimino los datos del usuarios
		$del = $db->prepare("DELETE FROM access WHERE a_perfil ='$perfil'");
		$del->execute();

		// 2. Lo inserto nuevamennte con esatdo I
		$insert = $db->prepare("INSERT INTO access (a_perfil, a_modulo, a_item, cs,sav,edi,del,pri) VALUES
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
                                                            
                                                            ;");
		$insert->execute();
        
        /*************************************************
                    UPDATE PARA ACCOUNTING // 26/06/2019
        **************************************************/

		// 3. Lo actualizo solo con los elegidos
		foreach($emp as $datos){
			$stmt = $db->prepare("UPDATE access SET cs='A' WHERE a_perfil='$perfil' AND a_modulo=1 AND a_item='$datos'");
			$stmt->execute();
		}

		foreach($emp2 as $datos2){
			$stmt2 = $db->prepare("UPDATE access SET sav='A' WHERE a_perfil='$perfil' AND a_modulo=1 AND a_item='$datos2'");
			$stmt2->execute();
		}
        
        foreach($edi as $datos3){
			$stmt2 = $db->prepare("UPDATE access SET edi='A' WHERE a_perfil='$perfil' AND a_modulo=1 AND a_item='$datos3'");
			$stmt2->execute();
		}
        
        foreach($del1 as $datos4){
			$stmt2 = $db->prepare("UPDATE access SET del='A' WHERE a_perfil='$perfil' AND a_modulo=1 AND a_item='$datos4'");
			$stmt2->execute();
		}
        
        foreach($print as $datos5){
			$stmt2 = $db->prepare("UPDATE access SET pri='A' WHERE a_perfil='$perfil' AND a_modulo=1 AND a_item='$datos5'");
			$stmt2->execute();
		}
        
        /*********************************************
                    UPDATE PARA BANKS // 26/06/2019
        **********************************************/

		// 3. Lo actualizo solo con los elegidos
		foreach($emp_banks as $datos_banks){
			$stmt = $db->prepare("UPDATE access SET cs='A' WHERE a_perfil='$perfil' AND a_modulo=2 AND a_item='$datos_banks'");
			$stmt->execute();
		}

		foreach($emp2_banks as $datos2_banks){
			$stmt2 = $db->prepare("UPDATE access SET sav='A' WHERE a_perfil='$perfil' AND a_modulo=2 AND a_item='$datos2_banks'");
			$stmt2->execute();
		}
        
        foreach($edi_banks as $datos3_banks){
			$stmt2 = $db->prepare("UPDATE access SET edi='A' WHERE a_perfil='$perfil' AND a_modulo=2 AND a_item='$datos3_banks'");
			$stmt2->execute();
		}
        
        foreach($del1_banks as $datos4_banks){
			$stmt2 = $db->prepare("UPDATE access SET del='A' WHERE a_perfil='$perfil' AND a_modulo=2 AND a_item='$datos4_banks'");
			$stmt2->execute();
		}
        
        foreach($print_banks as $datos5_banks){
			$stmt2 = $db->prepare("UPDATE access SET pri='A' WHERE a_perfil='$perfil' AND a_modulo=2 AND a_item='$datos5_banks'");
			$stmt2->execute();
		}
        
        /*********************************************
                    UPDATE PARA OPERATIONS // 05/07/2019
        **********************************************/

		// 3. Lo actualizo solo con los elegidos
		foreach($emp_ope as $datos_ope){
			$stmt = $db->prepare("UPDATE access SET cs='A' WHERE a_perfil='$perfil' AND a_modulo=3 AND a_item='$datos_ope'");
			$stmt->execute();
		}

		foreach($emp2_ope as $datos2_ope){
			$stmt2 = $db->prepare("UPDATE access SET sav='A' WHERE a_perfil='$perfil' AND a_modulo=3 AND a_item='$datos2_ope'");
			$stmt2->execute();
		}
        
        foreach($edi_ope as $datos3_ope){
			$stmt2 = $db->prepare("UPDATE access SET edi='A' WHERE a_perfil='$perfil' AND a_modulo=3 AND a_item='$datos3_ope'");
			$stmt2->execute();
		}
        
        foreach($del1_ope as $datos4_ope){
			$stmt2 = $db->prepare("UPDATE access SET del='A' WHERE a_perfil='$perfil' AND a_modulo=3 AND a_item='$datos4_ope'");
			$stmt2->execute();
		}
        
        foreach($print_ope as $datos5_ope){
			$stmt2 = $db->prepare("UPDATE access SET pri='A' WHERE a_perfil='$perfil' AND a_modulo=3 AND a_item='$datos5_ope'");
			$stmt2->execute();
		}
                  
        header('Location: ../../inicializador/vistas/app/seguridad/asignar.php?cid='.$perfil);
}