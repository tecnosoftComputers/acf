<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();
        
    if (isset($_POST['delete'])){
       $la = $_POST['laid'];

         $stmt = $db->prepare("UPDATE Finacli SET STATUS ='I' WHERE NO_ID='$la'"); 
		if ($stmt->execute()){
            echo '<script>
                    alert("Datos del directorio han sido eliminados!");
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=files/view_directory"; 
                  </script>';
            }else{
    			echo '<script>
                        alert("Error");
                        window.history.back();
                      </script>';
            }
    }
    
    
    
     /*$stmt = $db->prepare("INSERT INTO Finacli 
            (CLASIFICA, TC, TID, CEDRUC, NOMEMP, NAMECONTACT,APELLIDOS, NOMBRES, APE_CONY, NOM_CONY, APE_CONY2, NOM_CONY2,CONTAC_T1,
             CONTAC_T2, CED_CONY, CIUDAD, STATE, COUNTRY, ZIPCODE, DIRDOM, DIRCOM, DIROFI, TELEFONO, TELEFONO2, 
            ACTIVIDAD, PATRIMONIO, OFICIAL, REFER1, REFER2, REFER3, TIPOCLI, TIPOCRE, FECHACT, EMAIL, EMAIL2, SSN, 
            NOLICENCIA, ACTIVOCLI, FALTACLI, WEBSITE, TAXID, CODID, COUNTRYID) VALUES
            
            (null, null, null, '$idnu', '$name','$lega',null, null, null, null, null, null, null, 
            null, null, '$city', '$stat', '$coun', '$zipc', '$adre', null, null, '$pho1', '$pho2',
            null, null, null, null, null, null,null, null, null, '$ema1', '$ema2', null,
            null, null, null, '$web', null, null, null)");*/
    
    
    
    