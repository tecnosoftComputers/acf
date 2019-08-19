<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
	require_once ("../../datos/db/connect.php");
  require_once ("../../controlador/conf.php");
	$env = new DBSTART;
	$db = $env->abrirDB();
        
    if (isset($_POST['register'])){
       $banks   = SEG::clean(strtoupper($_POST['bankcode']));           // CODIGOBCO
       $codmov  = SEG::clean($_POST['accountycode']);       // CODMOV
       $banna   = SEG::clean(mb_strtoupper($_POST['bankname']));           // NOMBREBCO
       $accn    = SEG::clean($_POST['accountnumber']);      // CUENTANO
       //$gener = $_POST['generates'];          // CHEQUE
       $last    = SEG::clean($_POST['lastchecks']);         // NUMEROCH
       $curr    = SEG::clean($_POST['currency']);           // TIPO_MON
       $acct    = SEG::clean($_POST['accountype']);         // TIPO_CTA
       $form    = SEG::clean($_POST['format']);             // FORMATOCH
       $type    = SEG::clean($_POST['typeaccountentry']);   // TIPOEGRESO
       
       if( isset($_POST["check"])) {
            $stmt = $db->prepare("INSERT INTO dp02a110 
                (CODIGOBCO, CODMOV, NOMBREBCO, CUENTANO, CHEQUE, NUMEROCH, TIPO_MON, TIPO_CTA, FORMATOCH, TIPOEGRESO, STATUS) VALUES 
                ('$banks','$codmov','$banna','$accn',true,'$last','$curr','$acct','$form','$type','A')");
		    if ($stmt->execute()){
            echo '<script>
                    alert("Registrado Nuevo Cuenta de Banco");
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=files/view_banks"; 
                  </script>';
            }else{
    			     echo '<script>
                      alert("Error");
                      window.history.back();
                     </script>';
            }
       }else{
           $stmt = $db->prepare("INSERT INTO dp02a110 
                (CODIGOBCO, CODMOV, NOMBREBCO, CUENTANO, CHEQUE, NUMEROCH, TIPO_MON, TIPO_CTA, FORMATOCH, TIPOEGRESO, STATUS) VALUES 
                ('$banks','$codmov','$banna','$accn',false,'$last','$curr','$acct','$form','$type','A')");
        if ($stmt->execute()){
            echo '<script>
                    alert("Registrado Nuevo Cuenta de Banco");
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=files/view_banks"; 
                  </script>';
            }else{
               echo '<script>
                      alert("Error");
                      window.history.back();
                     </script>';
            }
       }
    }