<?php

    if (isset($_POST['update'])) {
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

	try{
       $elid            = $_POST['laid'];
       $nameempresa     = $_POST['nombres'];
       $ciudad          = $_POST['ciudad'];
       $dirempresa      = $_POST['direccion'];
       $phoneempresa    = $_POST['tel'];
       $faxempresa      = $_POST['fax'];
       
       $estado = 'A';
       /* DESHABILITADO MIERCOLES 26 DE JUNIO 
       $r_correo    = $_POST['r_correo'];
       $r_tel       = $_POST['r_telefono'];
       $r_rep_legal = $_POST['r_rep_legal'];
       $r_fax       = $_POST['r_fax'];
       $r_ruc       = $_POST['r_ruc'];
       $r_contador  = $_POST['r_contador'];
       $r_ruc_c     = $_POST['r_ruc_contador'];
       $r_aut_sri   = $_POST['r_aut_sri'];
       $r_tipo_i    = $_POST['r_tipo_i'];
       $r_iden      = $_POST['r_iden'];
       //$r_logo      = $_FILES['logo'];
       
       
                                rentas_correo='$r_correo',
                                rentas_telefono='$r_tel',
                                rentas_rep_legal='$r_rep_legal',
                                rentas_fax='$r_fax',
                                rentas_ruc='$r_ruc',
                                rentas_contador='$r_contador',
                                rentas_ruc_contador='$r_ruc_c',
                                rentas_aut_sri='$r_aut_sri',
                                rentas_tipo_id='$r_tipo_i',
                                rentas_id='$r_iden'
       */
       
		// hacer uso de una declaración preparada para evitar la inyección de sql
		$stmt = $db->prepare("UPDATE empresa SET
                                ciudad='$ciudad',
                                nombre_empresa='$nameempresa',
                                direccion_empresa='$dirempresa',
                                telefono_empresa='$phoneempresa',
                                fax_empresa='$faxempresa',
                                
                                estado='$estado'                               
                                
                                 WHERE id_empresa='$elid'");

		if ($stmt->execute()){
            echo '<script>
                    alert("Empresa Actualizada");
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=company/company_data"; 
                  </script>';
            
		}else{
			echo '<script type="text/javascript">
                        alert("Error");
                        window.history.back();
                    </script>';
		}
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
 }