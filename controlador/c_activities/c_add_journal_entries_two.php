<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
    require_once ("../../datos/db/connect.php");
    $env = new DBSTART;
    $db = $env->abrirDB();
          
    if (isset($_POST['register'])){
       $type    = $_POST['typejournal'];  // NOMEMP
       //$numb    = $_POST['number'];       // CLASIFICACION
       $date    = $_POST['date'];         // CEDRUC
       $asiento = $_POST['actual'];

       $the_debi    = $_POST['el_debit'];
       $the_credi   = $_POST['el_credit'];
       $account     = $_POST['account']; // Nueva inclusión
       $naccount    = $_POST['el_name'];
       $bene        = $_POST['benef'];
       $memo        = $_POST['memo'];

       // O N E
      $contador = $db->prepare("SELECT MAX(IDCONT) AS suma FROM dpcabtra");
      $contador->execute();
      $ver = $contador->fetchAll(PDO::FETCH_ASSOC);
      
      foreach((array) $ver as $thesum ){
        $valor = $thesum['suma'];
      }
          
      if ($valor == 0 || $valor == "") {
        $va = 1;
      }else{
        $va = $valor + 1;
      }

       //  T W O   Nuevo secuencia del contador en dpmovimi

        $sec = $db->prepare("SELECT MAX(SECUENCIAL) AS ultimo FROM dpmovimi");
        $sec->execute();
        $let = $sec->fetchAll(PDO::FETCH_ASSOC);
        
        foreach((array) $let as $dd) {
            $num_secuencial = $dd['ultimo'];
        }
        
        if ($num_secuencial == 0) { // Num del secuencial
            $numero_secuencial = 1;
        }else{
            $numero_secuencial = $num_secuencial + 1;
        }
        
    // C O N T I N U E     
        
        $verify = $db->prepare("SELECT * FROM dpmovimi WHERE ASIENTO='$asiento'");
        $verify->execute();
        $cont_verify = $verify->rowCount();
        
        if ($cont_verify == 0) { // dpmovimi existente
          //echo '<script>alert("No existe este");window.history.back();</script>';
$stmt = $db->prepare("INSERT INTO dpmovimi (TIPO_ASI, ASIENTO, FECHA_ASI, CODMOV, CONCEPTO, SECUENCIAL, ESTADO, BENEFICIAR) 
    VALUES ('$type','$asiento','$date','$account','$memo', '$numero_secuencial','I', '$bene')"); 
    if ($stmt->execute()){
      // Ultimo dato de dpmovimi
       $danger = $db->prepare("SELECT MAX(SECUENCIAL) AS elmaximo FROM dpmovimi");
       $danger->execute();
       $env_movimi = $danger->fetchAll(PDO::FETCH_ASSOC);
       foreach ((array) $env_movimi as $dent ) {
          $sig       = $dent['elmaximo'];
          $siguiente = $sig + 1;
       }
    
       $stmt = $db->prepare("INSERT INTO dpcabtra 
        (ASIENTO, DESC_ASI, BENEFICIAR, DEBITOS,CREDITOS, IDCONT, account_aux, account_n_aux) VALUES (?,?,?,?, ?,?,?,?)");
       $stmt->bindParam(1, $asiento,    PDO::PARAM_STR);
       $stmt->bindParam(2, $memo,       PDO::PARAM_STR);
       $stmt->bindParam(3, $bene,       PDO::PARAM_STR);
       $stmt->bindParam(4, $the_debi,   PDO::PARAM_STR);
       $stmt->bindParam(5, $the_credi,  PDO::PARAM_STR);
       $stmt->bindParam(6, $va,         PDO::PARAM_INT);       
       $stmt->bindParam(7, $account,    PDO::PARAM_STR);
       $stmt->bindParam(8, $naccount,   PDO::PARAM_STR);
      if ($stmt->execute()){
          // +1 
        /*$au = $db->prepare("UPDATE dpnumero SET ASIENTO = ASIENTO + 1 WHERE TIPO_ASI='$type'");
        $au->execute();*/

          header('Location: ../../inicializador/vistas/app/activities/journal.php?cid='.$asiento);
      }else{
          echo '<script>
                  alert("Error");
                  window.history.back();
                </script>';
      }
    }
             


  }else if ($cont_verify == 1){ // No existe el dpmovimi
    
  $stmt_l = $db->prepare("INSERT INTO dpcabtra (ASIENTO, DESC_ASI, BENEFICIAR, DEBITOS,CREDITOS, IDCONT, account_aux, account_n_aux) VALUES (?,?,?,?, ?,?,?,?)");
             $stmt_l->bindParam(1, $asiento,    PDO::PARAM_STR);
             $stmt_l->bindParam(2, $memo,       PDO::PARAM_STR);
             $stmt_l->bindParam(3, $bene,       PDO::PARAM_STR);
             $stmt_l->bindParam(4, $the_debi,   PDO::PARAM_STR);
             $stmt_l->bindParam(5, $the_credi,  PDO::PARAM_STR);
             $stmt_l->bindParam(6, $va,         PDO::PARAM_INT);             
             $stmt_l->bindParam(7, $account,    PDO::PARAM_STR);
             $stmt_l->bindParam(8, $naccount,   PDO::PARAM_STR);
            if ($stmt_l->execute()){
               // Contar si es uno en dpcabtra
                $contar2 = $db->prepare("SELECT * FROM dpcabtra WHERE ASIENTO='$asiento'");
                 $contar2->execute();
                 $cont = $contar2->rowCount();
                                  
                 // Ver los datos de dpmovimi
                 $contar = $db->prepare("SELECT * FROM dpmovimi WHERE ASIENTO='$asiento'");
                 $contar->execute();
                 $misdatos = $contar->fetchAll(PDO::FETCH_ASSOC);
                 
                 foreach((array) $misdatos as $do ) {
                      $eltipo     = $do['TIPO_ASI'];
                      $elasiento  = $do['ASIENTO'];
                      $fecha      = $do['FECHA_ASI'];
                      $elconcepto = $do['CONCEPTO'];
                 }                 
                  header('Location: ../../inicializador/vistas/app/activities/journal.php?cid='.$asiento);

            }else{
                echo '<script>
                        alert("Error");
                        window.history.back();
                      </script>';
                  }
}
}