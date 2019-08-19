<?php
    require_once ("../../../datos/db/connect.php");
	require_once ("../../../controlador/conf.php");

	$env = new DBSTART;
	$cc = $env->abrirDB();
     
    $empresa    = SEG::clean($_POST['id_empresa']);
    $user_id    = SEG::clean($_POST['id_user']);
    $username 	= SEG::clean(strtoupper($_POST['username']));
    $passw 	    = SEG::clean(strtoupper($_POST['passw']));
    $nameuser 	= SEG::clean(strtoupper($_POST['namesurname']));
    $position 	= SEG::clean($_POST['position']);
    $phone 	    = SEG::clean(strtoupper($_POST['phone']));
    $mail 	    = SEG::clean(strtoupper($_POST['mail']));
    $initial   	= SEG::clean(strtoupper($_POST['initial']));
    $estado     = 'A';
        
    if ($username == "" && $passw == "" && $nameuser == "" && $position == "" && $phone == "" && $mail == "" && $initial == "" ) {
            echo '<div class="alert alert-warning">
                    <b>Debe llenar todos los campos!</b>
                  </div>';
        }else{
			$sql = $cc->prepare("UPDATE usuarios SET
                                    username='$username',
                                    namesurname='$nameuser',
                                    position='$position',
                                    telefono='$phone',
                                    correo='$mail',
                                    passw='$passw',
                                    initial_system='$initial' 
                                WHERE id_empresa='$empresa' AND id_usuario='$user_id'");
			if ($sql -> execute() ) {
			     echo '<div class="alert alert-success">
                          <b>Datos actualizados!</b>
                       </div>';
			}else{
			     echo '<div class="alert alert-danger">
                    <b>Error al actualizar datos del usuario!</b>
                </div>';
			}
		}