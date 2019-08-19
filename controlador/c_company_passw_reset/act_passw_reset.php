<?php 
	require_once ("../../../datos/db/connect.php");
	require_once ("../../../controlador/conf.php");

	$env = new DBSTART;
	$cc = $env->abrirDB();
	
	    $empresa    = SEG::clean($_POST['id_empresa']);
        $laid       = SEG::clean($_POST['id_user']);
        $npassw 	= sha1(SEG::clean($_POST['new_passw']));
        $rpassw 	= sha1(SEG::clean($_POST['rep_passw']));
        $estado = 'A';

		// Consultar si las claves coinciden
		
		if ( $npassw == $rpassw ) {
			$sql = $cc->prepare("UPDATE usuarios SET passw='$npassw' WHERE id_usuario='$laid' AND estado='$estado'");
			if ($sql -> execute() ) {
			     echo '<div class="alert alert-success">
                    <b>Nuevo Clave Guardada!</b>
                </div>';
			}else{
			     echo '<div class="alert alert-danger">
                    <b>Error al cambiar la clave!</b>
                </div>';
			}	
		}else{
			echo '<div class="alert alert-danger">
                <b>Error, las claves no coinciden!</b>
            </div>';
		}