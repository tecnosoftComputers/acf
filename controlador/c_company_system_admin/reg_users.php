<?php
    require_once ("../../../datos/db/connect.php");
	require_once ("../../../controlador/conf.php");

	$env = new DBSTART;
	$cc = $env->abrirDB();
     
    $empresa    = SEG::clean($_POST['id_empresa']);
    $username 	= SEG::clean(strtoupper($_POST['username']));
    $passw 	    = SEG::clean(strtoupper($_POST['passw']));
    $nameuser 	= SEG::clean(strtoupper($_POST['nameuser']));
    $position 	= SEG::clean($_POST['position']);
    $phone 	    = SEG::clean(strtoupper($_POST['phone']));
    $mail 	    = SEG::clean(strtoupper($_POST['mail']));
    $initial   	= SEG::clean(strtoupper($_POST['initial']));
    $estado     = 'A';
        
        if ($username == "") {
            echo '<div class="alert alert-warning">
                <b>Debe asignar una cédula al cliente!</b>
            </div>';
        }else{

		// Consultar cédula repetida
		$stmt = $cc->prepare("SELECT * FROM usuarios WHERE username='$username' and id_empresa='$empresa'");
		$stmt->execute();
		$cant = $stmt->rowCount();

		if ( $cant == 0 ) {
			$sql = $cc->prepare("INSERT INTO usuarios 
                                    (id_empresa,username,namesurname,position, telefono,correo, passw, initial_system, estado)
                                VALUES (:emp,:user,:nsur,:niv,:tel,:cor,:pass,:ini,:est)");
			$sql->bindParam(':emp',  $empresa, 	   PDO::PARAM_INT);
            $sql->bindParam(':user', $username,    PDO::PARAM_STR);
            $sql->bindParam(':nsur', $nameuser,    PDO::PARAM_STR);
			$sql->bindParam(':niv',  $position,    PDO::PARAM_STR);
            $sql->bindParam(':tel',  $phone,       PDO::PARAM_STR);
            $sql->bindParam(':cor',  $mail, 	   PDO::PARAM_STR);
            $sql->bindParam(':pass', $passw, 	   PDO::PARAM_STR);
            $sql->bindParam(':ini',  $initial, 	   PDO::PARAM_STR);
            $sql->bindParam(':est',  $estado,      PDO::PARAM_STR);
			if ($sql -> execute() ) {
			     echo '<div class="alert alert-success">
                          <b>Nuevo Usuario Guardado!</b>
                       </div>';
			}else{
			     echo '<div class="alert alert-danger">
                    <b>Error al guardar el usuario!</b>
                </div>';
			}
		}else{
			echo '<div class="alert alert-danger">
                <b>Error, esta usuario ya existe en el sistema!</b>
            </div>';
		}
  }