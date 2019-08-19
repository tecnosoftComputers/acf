<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

    if (isset($_POST['update'])){
       $la = $_POST['laid'];
       $name    = $_POST['name'];               // NOMEMP
       $cony    = $_POST['contact_type'];       // CLASIFICACION
       $idnu    = $_POST['id_number'];          // CEDRUC
       $coma    = $_POST['company_act'];        // ACTIVITY COMPANY
       $lega    = $_POST['legal_rep'];          // CHEQUE
       
       
       $pho1    = $_POST['phoneone'];           // NUMEROCH
       $pho2    = $_POST['phonetwo'];           // TIPO_MON
       $ema1    = $_POST['emailone'];           // TIPO_CTA
       $ema2    = $_POST['emailtwo'];           // FORMATOCH
       $adre    = $_POST['adress'];             // TIPOEGRESO       
       
       
       $coun    = $_POST['country'];         // NUMEROCH
       $stat    = $_POST['state'];           // TIPO_MON
       $city    = $_POST['city'];           // TIPO_CTA
       $zipc    = $_POST['zipcode'];             // FORMATOCH
       $web     = $_POST['web'];            // TIPOEGRESO
       
       
       $pci1    = $_POST['phonecia1'];           // TIPO_MON
       $pci2    = $_POST['phonecia2'];         // TIPO_CTA
       $assi    = $_POST['assignee'];             // FORMATOCH
       $clas    = $_POST['classi'];   // TIPOEGRESO
       
       $new_type = $_POST['type_type'];

         $stmt = $db->prepare("UPDATE Finacli SET
                                                CLASIFICA='$cony',
                                                TID='$new_type',
                                                CEDRUC='$idnu',
                                                NOMEMP='$name',
                                                NAMECONTACT='$lega',
                                                CONTAC_T1='$pho1',
                                                CONTAC_T2='$pho2',
                                                CIUDAD='$city',
                                                STATE='$stat',
                                                COUNTRY='$coun',
                                                ZIPCODE='$zipc',
                                                DIRDOM='$adre',
                                                TELEFONO='$pci1',
                                                TELEFONO2='$pci2',
                                                ACTIVIDAD='$coma',
                                                OFICIAL='$assi',
                                                TIPOCLI='$clas',
                                                EMAIL='$ema1',
                                                EMAIL2='$ema2',
                                                WEBSITE='$web' WHERE NO_ID='$la'"); 
		if ($stmt->execute()){
            echo '<script>
                    alert("Datos del directorio actualizados");
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
    
    
    
    