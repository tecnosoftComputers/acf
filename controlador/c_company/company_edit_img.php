<?php
    if (isset($_POST['upd'])) {
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

    try{
       $formato = array('.jpg', '.png');       
       $nombrearchivo = $_FILES['img']['name'];
       $nombretmparchivo = $_FILES['img']['tmp_name'];
       $empresa = $_POST['empresa'];

       $ext = substr($nombrearchivo, strrpos($nombrearchivo, '.'));       
       if (in_array($ext, $formato)) {
            if (move_uploaded_file($nombretmparchivo, "../../inicializador/img/$nombrearchivo")) {           
		      $stmt = $db->prepare("UPDATE empresa SET rentas_logo='$nombrearchivo' WHERE id_empresa='$empresa'");
    		if ($stmt->execute()){
                header('Location: ../../inicializador/vistas/app/company/company_data_update.php?cid='.$empresa);
		      }else{
			     echo '<script type="text/javascript">
                        alert("Error");
                        window.history.back();
                    </script>';
		      }
            }
        }
	}catch(PDOException $e){
		echo $e->getMessage();
	}
 }