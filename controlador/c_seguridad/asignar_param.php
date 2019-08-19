<?php
	function verPermisos($cc, $param) {
    // M O D U L O     1     A C C O U N T I N G
    $modulo1 = $cc->prepare("SELECT * FROM config WHERE id_config=1");
    $modulo1->execute();
    $all_modulo1 = $modulo1->fetchAll(PDO::FETCH_ASSOC);

    foreach((array) $all_modulo1 as $view1) {
        $namemode1 = $view1['name_access'];
    }
    // Extrae los files del modulo 3
   	$arg_mode1 = $cc->prepare("SELECT * FROM access a INNER JOIN modulos_items mi ON mi.id_modulo_item = a.a_modulo WHERE a.a_perfil='$param'");
   	$arg_mode1->execute();
   	$datas1 = $arg_mode1->fetchAll(PDO::FETCH_ASSOC);
   	$count1 = $arg_mode1->rowCount();
?>

<div class="col-lg-12">
<form action="../../../../controlador/c_seguridad/cambiar_permisos.php" method="post">
<input type="" name="id_rol" value="<?php echo $param ?>" />
<div class="panel-group" id="accordion">
<div class="panel panel-success">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="text-decoration: none;">
            <p style="color: #fff; font-weight: bold"><i class="fa fa-folder-open-o"></i> <?php echo $namemode1 ?> <i class="fa fa-caret-down" style="float: right; color:#fff"></i></p></a>
        </h4>
    </div>
<div id="collapseOne" class="panel-collapse collapse">
    <h3>&nbsp; Files</h3>
 <table class="table table-striped table-hover bg-dark">
    <thead >
        <th align="center">Module </th>
        <th align="center">View</th>
        <th align="center">Add</th>
        <th align="center">Edit</th>
        <th align="center">Delete</th>
        <th align="center">Print</th>
    </thead>

<?php foreach ($datas1 as $key => $value1){
    if ($value1['cs'] == 'A') { // CONSULTAR
        $cs1 = "checked";
    }else if($value1['cs'] == 'I'){
        $cs1 = "unchecked";
    }
    
    
    if ($value1['sav'] == 'A') { // AGREGAR
        $cs2 = "checked";
    }else if($value1['sav'] == 'I'){
        $cs2 = "unchecked";
    }
    
    
    if ($value1['edi'] == 'A') { // Editar
        $cs3 = "checked";
    }else if($value1['edi'] == 'I'){
        $cs3 = "unchecked";
    }
    
    
    if ($value1['del'] == 'A') { // Eliminar
        $cs4 = "checked";
    }else if($value1['del'] == 'I'){
        $cs4 = "unchecked";
    }
    
    if ($value1['pri'] == 'A') { // Imprimir
        $cs5 = "checked";
    }else if($value1['pri'] == 'I'){
        $cs5 = "unchecked";
    }
?>
<tbody>
    <input type="hidden" name="id_modulo" value="<?php echo $value1['a_modulo'] ?>" />
    <td><?php echo $value1['nombre_item'] ?></td>
    <td align="center"><input type="checkbox" name="modulo[]" value="<?php  echo $value1['a_modulo'] ?>" <?php echo $cs1 ?> /></td>
</tbody>
<?php } ?>
</table>
</div>
</div></div>

<input type="submit" name="update" class="btn btn-success" value="Save Changes"  />
</form>
</div>
<?php } ?>