<?php
	require_once ("../../datos/db/connect.php");
    require_once ("../../controlador/conf.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

	if (isset($_POST['update'])) {
	   $banks   = SEG::clean($_POST['bankcode']);           // CODIGOBCO
       $codmov  = SEG::clean($_POST['accountycode']);       // CODMOV
       $banna   = SEG::clean($_POST['bankname']);           // NOMBREBCO
       $accn    = SEG::clean($_POST['accountnumber']);      // CUENTANO
       $curr    = SEG::clean($_POST['currency']);           // TIPO_MON
       $acct    = SEG::clean($_POST['accountype']);         // TIPO_CTA
       $form    = SEG::clean($_POST['format']);             // FORMATOCH
       $type    = SEG::clean($_POST['typeaccountentry']);   // TIPOEGRESO
        
		if( isset($_POST["check"])) {
		  $last = $_POST["lastchecks"];
            $stmt = $db->prepare("UPDATE dp02a110 SET
                                                        CODMOV='$codmov',
                                                        NOMBREBCO='$banna',
                                                        CUENTANO='$accn',
                                                        CHEQUE=true,
                                                        NUMEROCH='$last',
                                                        TIPO_MON='$curr',
                                                        TIPO_CTA='$acct',
                                                        FORMATOCH='$form',
                                                        TIPOEGRESO='$type'
                                    WHERE CODIGOBCO='$banks'");
		if ($stmt->execute()){
            echo '<script>
                    alert("Cuenta Actualizada");
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=files/view_banks"; 
                  </script>';
            }else{
    			echo '<script>
                        alert("Error");
                        window.history.back();
                      </script>';
            }
       }else{
        $last = $_POST["lastchecks"];
            $stmt = $db->prepare("UPDATE dp02a110 SET 
                                                        CODMOV='$codmov', 
                                                        NOMBREBCO='$banna', 
                                                        CUENTANO='$accn', 
                                                        CHEQUE=false, 
                                                        NUMEROCH='$last',
                                                        TIPO_MON='$curr', 
                                                        TIPO_CTA='$acct', 
                                                        FORMATOCH='$form', 
                                                        TIPOEGRESO='$type' 
                                    WHERE CODIGOBCO='$banks'");
            if ($stmt->execute()){
            echo '<script>
                    alert("Cuenta Actualizada");
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