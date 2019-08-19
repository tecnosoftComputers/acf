<?php
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

	try{
       $acc_sice     = $_POST['acc_since'];
       $acc_util     = $_POST['acc_util'];
       
       $bak_since    = $_POST['bak_since'];
       $bak_util     = $_POST['bak_util'];
       
       $op_since    = $_POST['ope_since'];
       $op_util     = $_POST['ope_util'];
              
		// hacer uso de una declaración preparada para evitar la inyección de sql
		$stmt1 = $db->prepare("UPDATE company_business_date SET since='$acc_sice',util='$acc_util' WHERE id_business=1");
		$stmt1->execute();
        
        $stmt2 = $db->prepare("UPDATE company_business_date SET since='$bak_since',util='$bak_util' WHERE id_business=2");
		$stmt2->execute();
        
        $stmt3 = $db->prepare("UPDATE company_business_date SET since='$op_since',util='$op_util' WHERE id_business=3");
		$stmt3->execute();
        
            echo '<script>
                    alert("Date Updated");
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=company/business"; 
                  </script>';
	}catch(PDOException $e){
		echo $e->getMessage();
	}