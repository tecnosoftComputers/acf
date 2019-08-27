<?php    
    define('NEW_SYSTEM','http://tecnosoftcomputers.com/acf/newStructure/');
    function head_init($role,$db, $acceso) {
    // Mostrar items del modulo
    $sql = $db->prepare("SELECT * FROM permisos p
                            INNER JOIN modulos_items mi ON mi.modulo = p.permisos_modulo
                            WHERE p.permisos_modulo=3 AND p.nivel='$role' AND mi.acceso='$acceso'");
    $sql->execute();
    $all_sql = $sql->fetchAll(PDO::FETCH_ASSOC);

    // Extraer datos del modulo company
    $company = $db->prepare("SELECT * FROM modulos WHERE id_modulo = 3 AND estado = 'A'");
    $company->execute();
    $all_company = $company->fetchAll(PDO::FETCH_ASSOC);
    foreach ((array) $all_company as $rows) {
        $data_name  = $rows['nombre_modulo'];
        $icons      = $rows['icons'];
    }
 ?>

    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="<?php echo $icons ?>"></i> <?php echo $data_name ?></a>
        <ul class="dropdown-menu dropdown-messages">
        <?php foreach ((array) $all_sql as $data_sql) { ?>
        <li><a href="<?php echo $data_sql['src_head'] ?>"><i class="fa fa-caret-right"></i> <?php echo $data_sql['nombre_item'] ?></a></li>
        <?php } ?>
        </ul>
    </li>
 <?php
    // Mostrar items del modulo  A C T I V I T I E S
    $sql = $db->prepare("SELECT * FROM permisos p INNER JOIN modulos_items mi ON mi.modulo = p.permisos_modulo 
                            WHERE p.permisos_modulo=4 AND p.nivel='$role' AND mi.acceso = '$acceso'");
    $sql->execute();
    $all_sql = $sql->fetchAll(PDO::FETCH_ASSOC);

    // Extraer datos del modulo company
    $company = $db->prepare("SELECT * FROM modulos WHERE id_modulo = 4 AND estado = 'A'");
    $company->execute();
    $all_company = $company->fetchAll(PDO::FETCH_ASSOC);

    foreach ((array) $all_company as $rows) {
        $data_name = $rows['nombre_modulo'];
        $icons = $rows['icons'];
    }
?>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="<?php echo $icons ?>"></i> <?php echo $data_name ?>
    </a>
        <ul class="dropdown-menu dropdown-messages">
            <?php foreach ((array) $all_sql as $data_sql) { ?>
                <li>
                    <?php if($acceso = 1){
                        $enlace = NEW_SYSTEM.$data_sql['src_head'];
                      } else{
                        $enlace = $data_sql['src_head'];
                      }
                     ?>
                    <a href="<?php echo $enlace ?>"><i class="fa fa-caret-right"></i> <?php echo $data_sql['nombre_item'] ?></a>
                </li>
            <?php } ?>
        </ul>
</li>
<?php
// Mostrar items del modulo R E P O R T
    $sql = $db->prepare("SELECT * FROM permisos p INNER JOIN modulos_items mi ON mi.modulo = p.permisos_modulo 
                            WHERE p.permisos_modulo=5 AND p.nivel='$role' AND mi.acceso = '$acceso'");
    $sql->execute();
    $all_sql = $sql->fetchAll(PDO::FETCH_ASSOC);

    // Extraer datos del modulo company
    $company = $db->prepare("SELECT * FROM modulos WHERE id_modulo = 5 AND estado = 'A'");
    $company->execute();
    $all_company = $company->fetchAll(PDO::FETCH_ASSOC);

    foreach ((array) $all_company as $rows) {
        $data_name = $rows['nombre_modulo'];
        $icons = $rows['icons'];
    }
?>
<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="<?php echo $icons ?>"></i> <?php echo $data_name ?>
        </a>        
    <ul class="dropdown-menu dropdown-messages">
        <?php foreach ((array) $all_sql as $data_sql) { ?>
            <li>
                <?php if($acceso = 1){
                    $enlace = NEW_SYSTEM.$data_sql['src_head'];
                  } else{
                    $enlace = $data_sql['src_head'];
                  }
                ?>
                <a href="<?php echo $enlace; ?>"><i class="fa fa-caret-right"></i> <?php echo $data_sql['nombre_item'] ?></a>
            </li>
        <?php } ?>
    </ul>
</li>

<?php
// Mostrar items del modulo P R O C C E S S 
    $sql = $db->prepare("SELECT * FROM permisos p INNER JOIN modulos_items mi ON mi.modulo = p.permisos_modulo 
                            WHERE p.permisos_modulo=6 AND p.nivel='$role' AND mi.acceso = '$acceso'");
    $sql->execute();
    $all_sql = $sql->fetchAll(PDO::FETCH_ASSOC);

    // Extraer datos del modulo company
    $company = $db->prepare("SELECT * FROM modulos WHERE id_modulo = 6 AND estado = 'A'");
    $company->execute();
    $all_company = $company->fetchAll(PDO::FETCH_ASSOC);
    foreach ((array) $all_company as $rows) {
        $data_name = $rows['nombre_modulo'];
        $icons = $rows['icons'];
    }
?>
<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="<?php echo $icons ?>"></i> <?php echo $data_name ?>
        </a>
        
        <ul class="dropdown-menu dropdown-messages">
        <?php foreach ((array) $all_sql as $data_sql) { ?>
            <li>
                <a href="<?php echo $data_sql['src_head'] ?>"><i class="fa fa-caret-right"></i> <?php echo $data_sql['nombre_item'] ?></a>
            </li>
        <?php } ?>
</ul>
</li>
<?php }  // FIN DE FUNCIÓN HEAD_INIT

        
        
function head_inits($role,$db, $acceso) {
    // Mostrar items del modulo
    $sql = $db->prepare("SELECT * FROM permisos p
                                    INNER JOIN modulos_items mi ON mi.modulo = p.permisos_modulo
                                    WHERE p.permisos_modulo=3 AND p.nivel='$role' AND mi.acceso = '$acceso'");
    $sql->execute();
    $all_sql = $sql->fetchAll(PDO::FETCH_ASSOC);

    // Extraer datos del modulo company
    $company = $db->prepare("SELECT * FROM modulos WHERE id_modulo = 3 AND estado = 'A'");
    $company->execute();
    $all_company = $company->fetchAll(PDO::FETCH_ASSOC);
    foreach ((array) $all_company as $rows) {
        $data_name  = $rows['nombre_modulo'];
        $icons      = $rows['icons'];
    }
 ?>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="<?php echo $icons ?>"></i> <?php echo $data_name ?></a>
        <ul class="dropdown-menu dropdown-messages">
        <?php foreach ((array) $all_sql as $data_sql) { ?>
        <li><a href="<?php echo $data_sql['src_head_u'] ?>"><i class="fa fa-caret-right"></i> <?php echo $data_sql['nombre_item'] ?></a></li>
        <?php } ?>
        </ul>
    </li>
 <?php
    // Mostrar items del modulo
    $sql = $db->prepare("SELECT * FROM permisos p INNER JOIN modulos_items mi ON mi.modulo = p.permisos_modulo 
                            WHERE p.permisos_modulo=4 AND p.nivel='$role' AND mi.acceso = '$acceso'");
    $sql->execute();
    $all_sql = $sql->fetchAll(PDO::FETCH_ASSOC);

    // Extraer datos del modulo company
    $company = $db->prepare("SELECT * FROM modulos WHERE id_modulo = 4 AND estado = 'A'");
    $company->execute();
    $all_company = $company->fetchAll(PDO::FETCH_ASSOC);

    foreach ((array) $all_company as $rows) {
        $data_name = $rows['nombre_modulo'];
        $icons = $rows['icons'];
    }
?>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="<?php echo $icons ?>"></i> <?php echo $data_name ?>
    </a>
        <ul class="dropdown-menu dropdown-messages">
            <?php foreach ((array) $all_sql as $data_sql) { ?>
                <li>
                    <a href="<?php echo $data_sql['src_head_u'] ?>"><i class="fa fa-caret-right"></i> <?php echo $data_sql['nombre_item'] ?></a>
                </li>
            <?php } ?>
        </ul>
</li>
<?php
// Mostrar items del modulo
    $sql = $db->prepare("SELECT * FROM permisos p INNER JOIN modulos_items mi ON mi.modulo = p.permisos_modulo 
                            WHERE p.permisos_modulo=5 AND p.nivel='$role' AND mi.acceso = '$acceso'");
    $sql->execute();
    $all_sql = $sql->fetchAll(PDO::FETCH_ASSOC);

    // Extraer datos del modulo company
    $company = $db->prepare("SELECT * FROM modulos WHERE id_modulo = 5 AND estado = 'A'");
    $company->execute();
    $all_company = $company->fetchAll(PDO::FETCH_ASSOC);

    foreach ((array) $all_company as $rows) {
        $data_name = $rows['nombre_modulo'];
        $icons = $rows['icons'];
    }
?>
<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="<?php echo $icons ?>"></i> <?php echo $data_name ?>
        </a>        
    <ul class="dropdown-menu dropdown-messages">
        <?php foreach ((array) $all_sql as $data_sql) { ?>
            <li>
                <a href="<?php echo $data_sql['src_head_u'] ?>"><i class="fa fa-caret-right"></i> <?php echo $data_sql['nombre_item'] ?></a>
            </li>
        <?php } ?>
    </ul>
</li>

<?php
// Mostrar items del modulo
    $sql = $db->prepare("SELECT * FROM permisos p INNER JOIN modulos_items mi ON mi.modulo = p.permisos_modulo 
                            WHERE p.permisos_modulo=6 AND p.nivel='$role' AND mi.acceso = '$acceso'");
    $sql->execute();
    $all_sql = $sql->fetchAll(PDO::FETCH_ASSOC);

    // Extraer datos del modulo company
    $company = $db->prepare("SELECT * FROM modulos WHERE id_modulo = 6 AND estado = 'A'");
    $company->execute();
    $all_company = $company->fetchAll(PDO::FETCH_ASSOC);
    foreach ((array) $all_company as $rows) {
        $data_name = $rows['nombre_modulo'];
        $icons = $rows['icons'];
    }
?>
<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="<?php echo $icons ?>"></i> <?php echo $data_name ?>
        </a>
        
        <ul class="dropdown-menu dropdown-messages">
        <?php foreach ((array) $all_sql as $data_sql) { ?>
            <li>
                <a href="<?php echo $data_sql['src_head_u'] ?>"><i class="fa fa-caret-right"></i> <?php echo $data_sql['nombre_item'] ?></a>
            </li>
        <?php } ?>
</ul>
</li>
        <?php }  // FIN DE FUNCIÓN HEAD_INITS
        
        
        
        

                        // Contador sesion 
function la_sesion($access, $user, $std, $db) {
            $ext = $db->prepare("SELECT * FROM usuarios WHERE id_usuario='$user'");
                $ext->execute();
                $row_ext = $ext->fetchAll(PDO::FETCH_ASSOC);
                
                foreach((array) $row_ext as $ladata){
                    $el_acceso = $ladata['initial_system'];
                    $la_empresa = $ladata['initial_system'];
                }

            $sql = $db->prepare("INSERT INTO sesion_init (num_sesion,id_user, modulo,id_empresa, estado_init) VALUES 
                                    ('$access','$user','$el_acceso','$la_empresa','$std')");
            $sql->execute();
        }
        
		function contador($cc, $tabla,$empresa) {
			$sql = $cc->prepare("SELECT * FROM $tabla WHERE id_empresa = '$empresa' AND estado = 'A'");
			$sql->execute();
			$all = $sql->rowCount();
			
            echo $all;
		}
        
        function contadorI($cc, $tabla,$empresa) {
			$sql = $cc->prepare("SELECT * FROM $tabla WHERE id_empresa = '$empresa' AND estado = 'I'");
			$sql->execute();
			$all = $sql->rowCount();
            echo $all;
		}

        function contadorA($cc, $tabla,$empresa) {
			$sql = $cc->prepare("SELECT * FROM $tabla WHERE id_empresa = '$empresa' AND estado = 'A'");
			$sql->execute();
			$all = $sql->rowCount();
			
            echo $all;
		}
        
		function contadorMasUno($cc, $tabla, $empresa) {
			$sql = $cc->prepare("SELECT * FROM $tabla WHERE id_empresa = '$empresa' AND estado = 'A'");
			$sql->execute();
			$all = $sql->rowCount();
			
            echo $all += 1;
		}
        
        // Verificar si la empresa existe y esta activa
        function estadoEmpresa($cc, $param) {
            $sql = $cc->prepare("SELECT * FROM c_empresa WHERE id_empresa = '$param' AND est_empresa = 'A'");
            $sql->execute();
            $count = $sql->rowCount();
            
            echo $count;
        }

		function selectDato($cc, $tabla) {
			$sql = $cc->prepare("SELECT * FROM $tabla");
			$sql->execute();
			$all = $sql->fetchAll(PDO::FETCH_ASSOC);
			foreach ($all as $key => $value) { ?>
			 <option value="<?php echo $value['idclientes'] ?>"><?php echo $value['nombres']. " ". $value['apellidos'] ?></option>
    <?php } }
   
    function nameModule($db, $module_id ){
        $sql = $db->prepare("SELECT * FROM config WHERE id_config='$module_id'");
        $sql->execute();
        $all_sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach((array) $all_sql as $newdata){
            $nombreacceso = $newdata['name_access'];
        }
?>        
         <?php echo $nombreacceso; ?>
  <?php } ?>