<?php
require_once ("../../datos/db/connect.php");
$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO
$valores = DBSTART::abrirDB()->prepare("select u.username, u.passw, u.namesurname, u.position, u.telefono, u.correo, 
                                            u.initial_system, u.id_usuario from usuarios u 
                                                inner join empresa e on u.id_empresa = e.id_empresa
                                                    where u.id_usuario= '$id' and u.estado = 'A'");
$valores ->execute();
$all = $valores->fetchAll(PDO::FETCH_ASSOC);

    foreach($all as $value) {
        $datos = array(
                        0 => $value['username'],
                        1 => $value['passw'],
                        2 => $value['namesurname'],
                        3 => $value['position'],
                        4 => $value['telefono'],
                        5 => $value['correo'],
                        6 => $value['initial_system'],
                        7 => $value['id_usuario'],
        				);
        echo json_encode($datos);
    }
?>