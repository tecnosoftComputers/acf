<?php
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

    /********  R E V E R S E   *******/
    
    if (isset($_REQUEST['reverse'])){
       $point   = $_REQUEST['reverse'];
       //$asiento = $_POST['asiento'];
       
       $prepare = $db->prepare("SELECT * FROM dpcabtra WHERE IDCONT ='$point'");
       $prepare->execute();
       $sond = $prepare->fetchAll(PDO::FETCH_ASSOC);
       
       foreach((array) $sond as $values) {
            $the_debi    = $values['DEBITOS'];
            $the_cred    = $values['CREDITOS'];
            $pp = $values['IDCONT'];
       }

      $stmt = $db->prepare("UPDATE dpcabtra SET DEBITOS='{$the_cred}', CREDITOS='{$the_debi}' WHERE IDCONT ='$pp'");
           
      if ($stmt->execute()){
                    echo '<script>window.history.back();</script>'; 
                }else{
        			echo '<script>
                            alert("Error");
                            window.history.back();
                          </script>';
                }
}