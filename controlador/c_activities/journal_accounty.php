<?php
    require_once ("../../datos/db/connect.php");
    $id = $_POST['id'];
    
    $valores = DBSTART::abrirDB()->prepare("SELECT * FROM dp01a110 WHERE CODIGO = '$id'");
    $valores ->execute();
    $all = $valores->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($all as $value) {
            $datos = array(
                            0 => $value['CODIGO_AUX'],
                            1 => $value['NOMBRE'],
            				);
            echo json_encode($datos);
        }