<?php 
	require_once ("../../../datos/db/connect.php");
	require_once ("../../../controlador/conf.php");
	
	    $pais          = SEG::clean($_POST['pais']);
        $provincia     = SEG::clean($_POST['provincia']);
        $ciudad   	   = SEG::clean($_POST['ciudad']);
        $ruc   	       = SEG::clean($_POST['ruc']);
        $nombres   	   = SEG::clean($_POST['nombres']);
        $direccion     = SEG::clean($_POST['direccion']);
        $telefono      = SEG::clean($_POST['telefono']);
        $correo   	   = SEG::clean($_POST['correo']);
        $estado        = 'A';
        
        $statement = DBSTART::abrirDB()->prepare("INSERT INTO c_empresa 
            (id_ciudad, id_provincia, id_pais, ruc_empresa, nom_empresa, direcc_empresa, telf_empresa, mail_empresa, est_empresa) VALUES
            (:ciudad, :provin, :pais, :ruc, :nombre, :direcc, :telf, :mail, :est)");
        $statement->bindParam(':ciudad',    $ciudad,        PDO::PARAM_INT);
        $statement->bindParam(':provin',    $provincia,     PDO::PARAM_INT);
        $statement->bindParam(':pais',      $pais,          PDO::PARAM_INT);
        $statement->bindParam(':ruc',       $ruc,           PDO::PARAM_STR);
        $statement->bindParam(':nombre',    $nombres,       PDO::PARAM_STR);
        $statement->bindParam(':direcc',    $direccion,     PDO::PARAM_STR);
        $statement->bindParam(':telf',      $telefono,      PDO::PARAM_STR);
        $statement->bindParam(':mail',      $correo,        PDO::PARAM_STR);
        $statement->bindParam(':est',       $estado,        PDO::PARAM_STR);
        
        $statement->execute();
        
        echo "<script>
                     $(window).load(function(){
                         $('#successModal').modal('show');
                     });
                </script>";
	 