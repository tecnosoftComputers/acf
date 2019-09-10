<?php
require_once "../../constantes.php";
require_once FRONTEND_RUTA."init.php";
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
  	require_once ("../../datos/db/connect.php");
  	$env = new DBSTART;
  	$db = $env->abrirDB();
        
    if (isset($_POST['register'])){
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
       
       
       $coun    = $_POST['country'];        // NUMEROCH
       $stat    = $_POST['state'];          // TIPO_MON
       $city    = $_POST['city'];           // TIPO_CTA
       $zipc    = $_POST['zipcode'];        // FORMATOCH
       $web     = $_POST['web'];            // TIPOEGRESO
       
       
       $pci1    = $_POST['phonecia1'];      // TIPO_MON
       $pci2    = $_POST['phonecia2'];      // TIPO_CTA
       $assi    = $_POST['assignee'];       // FORMATOCH
       $clas    = $_POST['classi'];         // TIPOEGRESO
       
       $new_type = $_POST['type_type'];

         $stmt = $db->prepare("INSERT INTO Finacli
            (CLASIFICA, TC, TID, CEDRUC, NOMEMP,NAMECONTACT,CONTAC_T1,CONTAC_T2,CIUDAD, STATE, COUNTRY, ZIPCODE,
            DIRDOM, TELEFONO, TELEFONO2,ACTIVIDAD, OFICIAL, TIPOCLI, EMAIL, EMAIL2,FALTACLI, WEBSITE, STATUS) VALUES
            
            ('$cony',1,'$new_type','$idnu','$name','$lega', '$pho1','$pho2','$city','$stat','$coun', '$zipc',
            '$adre', '$pci1', '$pci2', '$assi','$clas', '$coma','$ema1', '$ema2', now(),'$web','A')"); 
		if ($stmt->execute()){
            echo '<script>
                    alert("Registrado Directorio");
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=files/view_directory"; 
                  </script>';
            }else{
    			echo '<script>
                        alert("Error");
                        window.history.back();
                      </script>';
            }
    }    