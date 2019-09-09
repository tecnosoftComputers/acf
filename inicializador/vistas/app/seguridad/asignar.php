<?php
    session_start();
    if(isset($_SESSION['acfSession']["correo"])) {
    require_once ("../../../../datos/db/connect.php"); $new = new DBSTART(); $db = $new->abrirDB();
    require_once ("../head_unico.php");

    if (isset($_REQUEST['cid'])) {
        $cid = $_REQUEST['cid'];

        $sentencia = DBSTART::abrirDB()->prepare("SELECT * FROM roles WHERE id_rol='$cid' AND estado= 'A'");
        $sentencia->execute();
        $name = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ( (array) $name as $all ) {
            $in = $all['id_rol'];
            $na = $all['nombre_rol'];
        }
        
        $upd = DBSTART::abrirDB()->prepare("select * from roles WHERE estado='A'");
        $upd->execute();
        $all_upd = $upd->fetchAll(PDO::FETCH_ASSOC);
        
        //Mostrar usuarios que pertenezcan al perfil
        $profile = DBSTART::abrirDB()->prepare("SELECT * FROM usuarios WHERE position='$cid'");
        $profile->execute();
        $all_profile = $profile->fetchAll(PDO::FETCH_ASSOC);
        
        //Mostrar empresas que pertenezcan al perfil
        $company = DBSTART::abrirDB()->prepare("SELECT distinct(e.nombre_empresa) FROM usuarios_empresas ue 
                                                    INNER JOIN usuarios u ON u.id_usuario = ue.id_user
                                                    INNER JOIN empresa e ON e.id_empresa = ue.empresas
                                                    WHERE u.position='$cid'");
        $company->execute();
        $all_company = $company->fetchAll(PDO::FETCH_ASSOC);
        
        //Las compañias que usa el usuario
        $land = DBSTART::abrirDB()->prepare("SELECT * FROM empresa e INNER JOIN usuarios_empresas ue ON ue.empresas = e.id_empresa
                                                    WHERE ue.id_user = '$cid' AND ue.estado='A'");
                                                    $land->execute();
                                                    $send_land = $land->fetchAll(PDO::FETCH_ASSOC);
    }
?>
<script>
$(document).ready(function () {
  $('body').on('click', '#selectAll', function () {
    if ($(this).hasClass('allChecked')) {
        $('input[type="checkbox"]', '#example').prop('checked', false);
    } else {
        $('input[type="checkbox"]', '#example').prop('checked', true);
    }
    $(this).toggleClass('allChecked');
  })
});
</script>

<script>
$(document).ready(function () {
  $('body').on('click', '#selectAll2', function () {
    if ($(this).hasClass('allChecked')) {
        $('input[type="checkbox"]', '#example2').prop('checked', false);
    } else {
        $('input[type="checkbox"]', '#example2').prop('checked', true);
    }
    $(this).toggleClass('allChecked');
  })
});
</script>
<div id="page-wrapper"><br />
    <div class="row">
        <div class="col-lg-12">
        <div class="alert alert-info" style="margin-top: 10px">
            <p style="float: left;">Security / Profile / Assign</p>
            <p style="float: right"><a style="color: #fff;" href="../../../../inicializador/vistas/app/in.php?cid=seguridad/nivel">Volver</a></p><br /><hr />
            <p><b><i class="fa fa-lock"></i> Asignar permisos del sistema para este perfil (<?php echo $na ?>)</b></p>
        </div>
        
        <div class="row">
            <div class="col-md-4 img">
              <center> 
        <form action="asignar.php" class="navbar-form" method="request" >
            <div class="form-group">
                <h3><i class="fa fa-star"></i> Profile </h3><hr />
                    <select name="cid" class="form-control" onchange='this.form.submit()'>
                    <?php foreach( (array) $all_upd as $vale) { ?>
                        <label>Perfil</label>
                        <?php if ($cid == $vale['id_rol']){ ?>
                            <option value="<?php echo $vale['id_rol'] ?>" style="font-size: 15px;" selected=""> <?php echo $vale['nombre_rol'] ?></option>
                        <?php }else{ ?>
                            <label>Perfil</label>
                            <option value="<?php echo $vale['id_rol'] ?>" style="font-size: 15px;" > <?php echo $vale['nombre_rol'] ?></option>
                    <?php } }?>
                    </select>
            </div>
        <noscript><input type="submit" value="Submit" /></noscript>
        </form></center>
            </div>
            <div class="col-md-4 details">
              <blockquote>
                <h3> <i class="fa fa-user"></i> Users</h3><hr />
                <?php foreach((array) $all_profile as $end) {
                echo '<small><cite title="Source Title">'. $end['username'].'<i class="icon-map-marker"></i></cite></small>';
                } ?>
              </blockquote>
            </div>
            <div class="col-md-4 details">
              <blockquote>
                <h3> <i class="fa fa-building"></i> Companys</h3><hr />
                <?php foreach((array) $send_land as $ends) {
                echo '<small><cite title="Source Title">'.$ends['nombre_empresa'].'<i class="icon-map-marker"></i></cite></small>';
                } ?>
              </blockquote>
            </div>
          </div><br /> <!-- FIN DE INFO DEL ROL-->
        </div> <!-- FIN COL12-->
    </div> <!-- FIN DE ROW -->










<form action="../../../../controlador/c_seguridad/cambiar_permisos.php" method="post">
<div class="row">

<input type="hidden" name="id_perfil" value="<?php echo $cid ?>" />   
        <div class="col-lg-6" >
        <div class="alert alert-info"><i class="fa fa-folder-open"></i> ACCOUNTING</div>
            <?php
                $module = DBSTART::abrirDB()->prepare(
                "SELECT * FROM access a INNER JOIN modulos_items mi ON mi.id_modulo_item = a.a_item WHERE a.a_modulo = 1 AND a.a_perfil='$cid' ORDER BY a.a_item ASC ");
                $module->execute();
                $stmt = $module->fetchAll(PDO::FETCH_ASSOC); ?>
                
                

   	<table id="example2" class="table">
    	<thead>
            <th>MODULE</th>
    		<th>Read</th>
    		<th>Save</th>
            <th>Edit</th>
            <th>Remove</th>
            <th>Print</th>
    	</thead>
        
        <button type="button" id="selectAll2" class="btn btn-info main"> <span class="sub"></span> <i class="fa fa-check-square-o"></i> Select All</button> &nbsp;&nbsp;
        <!--<button onClick="window.location.href=window.location.href" class="btn btn-warning main"> <span class="sub"></span><i class="fa fa-retweet"></i>  Reset</button>-->
        
    <?php foreach ( (array) $stmt as $key => $value){
    	if ($value['cs'] =='A') {
	    	$check = "checked";
	    }else{
	    	$check = "unchecked";
	    }

	    if ($value['sav'] =='A') {
	    	$check_read = "checked";
	    }else{
	    	$check_read = "unchecked";
	    }
        
        if ($value['edi'] =='A') {
	    	$check_edi = "checked";
	    }else{
	    	$check_edi = "unchecked";
	    }
        
        if ($value['del'] =='A') {
	    	$check_del = "checked";
	    }else{
	    	$check_del = "unchecked";
	    }
        
        if ($value['pri'] =='A') {
	    	$check_pri = "checked";
	    }else{
	    	$check_pri = "unchecked";
	    }
    ?>

    <tr>
    <td><?php echo $value['nombre_item'] ?></td>
    <td><input type="checkbox" name="val[]" value="<?php echo $value['a_item'] ?>" <?php echo $check?> /></td>
    
    <td><input type="checkbox" name="val_re[]" value="<?php echo $value['a_item']?>" <?php echo $check_read?>> </td>
    <td><input type="checkbox" name="val_ed[]" value="<?php echo $value['a_item']?>" <?php echo $check_edi?> > </td>
    <td><input type="checkbox" name="val_de[]" value="<?php echo $value['a_item']?>" <?php echo $check_del?> > </td>
    <td><input type="checkbox" name="val_pi[]" value="<?php echo $value['a_item']?>" <?php echo $check_pri?> > </td>
    </tr>
<?php } ?>
    		</tbody>
    	</table><br />   
        </div> <!-- FIN ACCOUNTING -->
        
        
        <!-- B A N K S -->
<div class="col-lg-6" >
    <div class="alert alert-info"><i class="fa fa-bank"></i> BANKS</div>
    <?php
    $module2 = DBSTART::abrirDB()->prepare(
        "SELECT * FROM access a INNER JOIN modulos_items mi ON mi.id_modulo_item = a.a_item 
                WHERE a.a_modulo = 2 AND a.a_perfil='$cid' ORDER BY a.a_item ASC ");
    $module2->execute();
    $stmt2 = $module2->fetchAll(PDO::FETCH_ASSOC); ?>            

   	<table id="example" class="table">
    	<thead>
            <th>MODULE</th>
    		<th>Read</th>
    		<th>Save</th>
            <th>Edit</th>
            <th>Remove</th>
            <th>Print</th>
    	</thead>
        
        <button type="button" id="selectAll" class="btn btn-info main"> <span class="sub"></span> <i class="fa fa-check-square-o"></i> Select All</button> &nbsp;&nbsp;
        <!--<button onClick="window.location.href=window.location.href" class="btn btn-warning main"> <span class="sub"></span><i class="fa fa-retweet"></i>  Reset</button>-->
        
    <?php foreach ( (array) $stmt2 as $key => $value2){
    	if ($value2['cs'] =='A') {
	    	$check2 = "checked";
	    }else{
	    	$check2 = "unchecked";
	    }

	    if ($value2['sav'] =='A') {
	    	$check_read2 = "checked";
	    }else{
	    	$check_read2 = "unchecked";
	    }
        
        if ($value2['edi'] =='A') {
	    	$check_edi2 = "checked";
	    }else{
	    	$check_edi2 = "unchecked";
	    }
        
        if ($value2['del'] =='A') {
	    	$check_del2 = "checked";
	    }else{
	    	$check_del2 = "unchecked";
	    }
        
        if ($value2['pri'] =='A') {
	    	$check_pri2 = "checked";
	    }else{
	    	$check_pri2 = "unchecked";
	    }
    ?>

    <tr>
    <td><?php echo $value2['nombre_item'] ?></td>
    <td><input type="checkbox" name="val_banks[]"    value="<?php echo $value2['a_item'] ?>" <?php echo $check2?> /></td>    
    <td><input type="checkbox" name="val_re_banks[]" value="<?php echo $value2['a_item']?>" <?php echo $check_read2 ?>> </td>
    <td><input type="checkbox" name="val_ed_banks[]" value="<?php echo $value2['a_item']?>" <?php echo $check_edi2 ?> > </td>
    <td><input type="checkbox" name="val_de_banks[]" value="<?php echo $value2['a_item']?>" <?php echo $check_del2 ?> > </td>
    <td><input type="checkbox" name="val_pi_banks[]" value="<?php echo $value2['a_item']?>" <?php echo $check_pri2 ?> > </td>
    </tr>
<?php } ?>
    		</tbody>
    	</table><br />        
        </div>

</div> <!-- FIN ROW PERMISOS -->


<div class="row">
    <div class="col-lg-6" >
        <div class="alert alert-info"><i class="fa fa-folder-open"></i> OPERATIONS</div>
            <?php
            $module3 = DBSTART::abrirDB()->prepare(
                "SELECT * FROM access a INNER JOIN modulos_items mi ON mi.id_modulo_item = a.a_item WHERE a.a_modulo = 3 AND a.a_perfil='$cid' ORDER BY a.a_item ASC ");
            $module3->execute();
                $stmt3 = $module3->fetchAll(PDO::FETCH_ASSOC); ?>
   	<table id="example2" class="table">
    	<thead>
            <th>MODULE</th>
    		<th>Read</th>
    		<th>Save</th>
            <th>Edit</th>
            <th>Remove</th>
            <th>Print</th>
    	</thead>
        
        <button type="button" id="selectAll2" class="btn btn-info main"> <span class="sub"></span> <i class="fa fa-check-square-o"></i> Select All</button> &nbsp;&nbsp;
        
    <?php foreach ( (array) $stmt3 as $key => $value3){
    	if ($value3['cs'] =='A') {
	    	$check3 = "checked";
	    }else{
	    	$check3 = "unchecked";
	    }

	    if ($value3['sav'] =='A') {
	    	$check_read3 = "checked";
	    }else{
	    	$check_read3 = "unchecked";
	    }
        
        if ($value3['edi'] =='A') {
	    	$check_edi3 = "checked";
	    }else{
	    	$check_edi3 = "unchecked";
	    }
        
        if ($value3['del'] =='A') {
	    	$check_del3 = "checked";
	    }else{
	    	$check_del3 = "unchecked";
	    }
        
        if ($value3['pri'] =='A') {
	    	$check_pri3 = "checked";
	    }else{
	    	$check_pri3 = "unchecked";
	    }
    ?>

    <tr>
    <td><?php echo $value3['nombre_item'] ?></td>
    <td><input type="checkbox" name="val_ope[]" value="<?php echo $value3['a_item'] ?>" <?php echo $check3 ?> /></td>
    <td><input type="checkbox" name="val_re_ope[]" value="<?php echo $value3['a_item']?>" <?php echo $check_read3 ?> /> </td>
    <td><input type="checkbox" name="val_ed_ope[]" value="<?php echo $value3['a_item']?>" <?php echo $check_edi3 ?> /> </td>
    <td><input type="checkbox" name="val_de_ope[]" value="<?php echo $value3['a_item']?>" <?php echo $check_del3 ?> /> </td>
    <td><input type="checkbox" name="val_pi_ope[]" value="<?php echo $value3['a_item']?>" <?php echo $check_pri3 ?> /> </td>
    </tr>
<?php } ?>
    		</tbody>
    	</table><br />   
        </div>
        <div class="col-lg-6" >
            
        </div>
        
        
        
        
        
        
        
        
        <div style="clear: both;"></div>
        <input type="submit" name="yeah" class="btn btn-success" value="Save" />
    </div>
    </form>
    
    
    <div class="row">
        <div class="col-lg-6" >
            
        </div>
        <div class="col-lg-6" >
           
        </div>
    </div>
</div>
<?php
require_once ("../foot_unico.php");
}else{
    session_unset();
    session_destroy();
    header('Location:  ../../../../index.php');
}
?>