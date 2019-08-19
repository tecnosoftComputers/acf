<?php
	function verPermisos3($cc, $param) {
    // M O D U L O      2
    $modulo1 = $cc->prepare("SELECT * FROM config WHERE id_config=3");
    $modulo1->execute();
    $all_modulo1 = $modulo1->fetchAll(PDO::FETCH_ASSOC);

    foreach((array) $all_modulo1 as $view1) {
        $namemode1 = $view1['name_access'];
    }
                    // Extrae los files del modulo 3
                	$arg_mode1 = $cc->prepare("SELECT * FROM modulos_items WHERE modulo=3 AND acceso=3");
                	$arg_mode1->execute();
                	$datas1 = $arg_mode1->fetchAll(PDO::FETCH_ASSOC);
                	$count1 = $arg_mode1->rowCount();
                    
                    // Extrae los files del modulo 4
                	$arg_mode1b = $cc->prepare("SELECT * FROM modulos_items WHERE modulo=4 AND acceso=3");
                	$arg_mode1b->execute();
                	$datas1b = $arg_mode1b->fetchAll(PDO::FETCH_ASSOC);
                	$count1b = $arg_mode1b->rowCount();
                    
                    // Extrae los files del modulo 5
                	$arg_mode1c = $cc->prepare("SELECT * FROM modulos_items WHERE modulo=5 AND acceso=3");
                	$arg_mode1c->execute();
                	$datas1c = $arg_mode1c->fetchAll(PDO::FETCH_ASSOC);
                	$count1c = $arg_mode1c->rowCount();
                    
                    // Extrae los files del modulo 6
                	$arg_mode1d = $cc->prepare("SELECT * FROM modulos_items WHERE modulo=6 AND acceso=3");
                	$arg_mode1d->execute();
                	$datas1d = $arg_mode1d->fetchAll(PDO::FETCH_ASSOC);
                	$count1d = $arg_mode1d->rowCount();
?>

<div class="panel-group" id="accordion3">
<div class="panel panel-success">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion3" href="#collapseOne3" style="text-decoration:none"><p style="color: #fff; font-weight: bold;">
            <i class="fa fa-refresh"></i> <?php echo $namemode1 ?>  <i class="fa fa-caret-down" style="float: right; color:#fff"></i></p> </a>
        </h4>
    </div>
    <div id="collapseOne3" class="panel-collapse collapse">
    <h3>&nbsp; Files</h3>
 <table class="table table-striped table-hover bg-dark">
    <thead >
        <th>Módulo</i> </th>
        <th>Consultar</th>
        <th>Agregar</th>
        <th>Modificar</th>
        <th>Eliminar</th>
    </thead>
 <?php
 if ( $count1 == 0 ) {
 	echo '<tr><td> No se encontraron resultados</td></tr>';
 	}else{ ?>
<?php foreach ($datas1 as $key => $value1): ?>
    <tbody>
        <td><?php echo $value1['nombre_item'] ?></td>
		<td><input type="checkbox" /></td>
        <td><input type="checkbox" /></td>
        <td><input type="checkbox" /></td>
        <td><input type="checkbox" /></td>
    </tbody>

<?php endforeach ?>
<?php } ?>
</table>

<h3>&nbsp; Activities</h3>
 <table class="table table-striped table-hover bg-dark">
    <thead >
        <th>Módulo</i> </th>
        <th>Consultar</th>
        <th>Agregar</th>
        <th>Modificar</th>
        <th>Eliminar</th>
    </thead>
 <?php 
 if ( $count1b == 0 ) {
 	echo '<tr><td> No se encontraron resultados</td></tr>';
 	}else{ ?>
<?php foreach ($datas1b as $key => $value1b): ?>
    <tbody>
        <td><?php echo $value1b['nombre_item'] ?></td>
		<td><input type="checkbox" /></td>
        <td><input type="checkbox" /></td>
        <td><input type="checkbox" /></td>
        <td><input type="checkbox" /></td>
    </tbody>

<?php endforeach ?>
<?php } ?>
</table>

<h3>&nbsp; Report</h3>
 <table class="table table-striped table-hover bg-dark">
 <?php if ( $count1c == 0 ) {
 	echo '<tr><td> No se encontraron resultados</td></tr>';
 	}else{ ?>
<?php foreach ($datas1c as $key => $value1c): ?>
    <tbody>
        <td><?php echo $value1c['nombre_item'] ?></td>
		<td><input type="checkbox" /></td>
        <td><input type="checkbox" /></td>
        <td><input type="checkbox" /></td>
        <td><input type="checkbox" /></td>
    </tbody>

<?php endforeach ?>
<?php } ?>
</table>

<h3>&nbsp; Processes</h3>
 <table class="table table-striped table-hover bg-dark">
<?php
 if ( $count1d == 0 ) {
 	echo '<tr><td> No se encontraron resultados</td></tr>';
 	}else{ ?>
<?php foreach ($datas1d as $key => $value1d): ?>
<tbody>
        <td><?php echo $value1d['nombre_item'] ?></td>
		<td><input type="checkbox" /></td>
        <td><input type="checkbox" /></td>
        <td><input type="checkbox" /></td>
        <td><input type="checkbox" /></td>
    </tbody>
<?php endforeach ?>
<?php } ?>
</table>
</div>
</div></div>
<?php } ?>