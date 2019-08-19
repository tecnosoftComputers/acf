<?php
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

    if (isset($_POST['reverse'])){
       $the_debi    = $_POST['dd'];
       $the_cred    = $_POST['cc'];
       $point = $_POST['punto'];

    $contador = $db->prepare("SELECT * FROM dpcabtra");
    $contador->execute();
    $ver = $contador->fetchAll(PDO::FETCH_ASSOC);
    
    foreach((array) $ver as $thesum ){
        $debitos = $thesum['DEBITOS'];
        $creditos = $thesum['CREDITOS'];
        
    }
    
    if ($debitos != "") {
       $stmt = $db->prepare("UPDATE cabtra SET CREDITOS='$the_debi', DEBITOS='0.00' WHERE IDCONT ='$point')");
       
    	if ($stmt->execute()){
            echo '<script>
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=activities/journal"; 
                  </script>';
            }else{
    			echo '<script>
                        alert("Error");
                        window.history.back();
                      </script>';
            }
    }else if ($creditos != ""){
        $stmt = $db->prepare("UPDATE cabtra SET DEBITOS='$the_cred', CREDITOS='0.00' WHERE IDCONT ='$point')");
       
    	if ($stmt->execute()){
            echo '<script>
                    window.location.href = "../../inicializador/vistas/app/in.php?cid=activities/journal"; 
                  </script>';
            }else{
    			echo '<script>
                        alert("Error");
                        window.history.back();
                      </script>';
            }
    }
}