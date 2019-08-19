<?php

    require_once ("../../../../datos/db/connect.php");

    $cc = new DBSTART;

    $db = $cc->abrirDB();

    $empresa = $_SESSION['id_empresa'];

    $cid = $_SESSION['correo'];



    // Mostrar items del modulo

    $sql = $db->prepare("SELECT * FROM permisos p INNER JOIN modulos_items mi ON mi.modulo = p.permisos_modulo 

                            WHERE p.permisos_modulo=3 AND p.nivel='$cid'");

    $sql->execute();

    $all_sql = $sql->fetchAll(PDO::FETCH_ASSOC);

    

    // Extraer datos del modulo company

    $company = $db->prepare("SELECT * FROM modulos WHERE id_modulo = 3 AND estado = 'A'");

    $company->execute();

    $all_company = $company->fetchAll(PDO::FETCH_ASSOC);

    

    foreach ((array) $all_company as $rows) {

        $data_name = $rows['nombre_modulo'];

        $icons = $rows['icons'];

    }

?>

        <li>

            <a href="#"><i class="<?php echo $icons ?>"></i> <?php echo $data_name ?><span class="fa arrow"></span></a>

            <ul class="nav nav-second-level">

            <?php foreach ((array) $all_sql as $data_sql) { ?>

                <li style="font-size: 11px">

                    <a href="<?php echo $data_sql['src_head'] ?>"><i class="fa fa-caret-right"></i> <?php echo $data_sql['nombre_item'] ?></a>

                </li>

            <?php } ?>

            </ul>

        </li>