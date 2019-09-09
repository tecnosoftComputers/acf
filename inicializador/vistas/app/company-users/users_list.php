<script src="../../../jquery/jquery-1.11.0.min.js"></script>
<?php
	require_once ("../../../datos/db/connect.php");
	$env = new DBSTART;
	$cc = $env::abrirDB();

    $usuario = $_SESSION['acfSession']['correo'];
    
    //Consultar los dos permisos: accounting / operations    
    $new = $cc->prepare("SELECT * FROM usuarios
        WHERE NOT id_config=2 AND NOT id_config=4 AND NOT id_config=5 AND NOT id_config=6 ");
    $new->execute();
    $all_new = $new->fetchAll(PDO::FETCH_ASSOC);
    
    // Id rol
    $stmt = $cc->prepare("SELECT * FROM roles WHERE id_rol='$usuario'");
    $stmt->execute();
    $cant = $stmt->rowCount();
    
    if ($cant == 0) {
        
    }else{ // Usuarios que pertenezcan a diferentes empresas
        $emp = $cc->prepare("SELECT * from usuarios u INNER JOIN empresa e ON e.id_empresa = u.id_empresa WHERE u.id_usuario = e.id_empresa AND u.estado='A'");
        $emp->execute();
    }
    
    
    //Consultar los dos permisos: accounting / operations
    //$new = $cc->prepare("SELECT * FROM config WHERE NOT id_config=2 AND NOT id_config=4 AND NOT id_config=5 AND NOT id_config=6 ");
    $new = $cc->prepare("SELECT * FROM config");
    $new->execute();
    $all_new = $new->fetchAll(PDO::FETCH_ASSOC);
    
    $stmt = $cc->prepare("SELECT * FROM roles WHERE estado='A')");
    // Mostrar los Roles que esten disponibles para el NUEVO USUARIO
    //$stmt = $cc->prepare("SELECT * FROM roles t1 WHERE NOT EXISTS (SELECT NULL FROM usuarios t2 WHERE t2.position = t1.id_rol)");
    $stmt->execute();
    $all_stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $upd = $cc->prepare("SELECT * FROM roles WHERE estado='A'");
    $upd->execute();
    $all_upd = $upd->fetchAll(PDO::FETCH_ASSOC);   
    
    // Seleccionar las empresas => checkbox
    $check = $cc->prepare("SELECT * FROM empresa WHERE estado='A'");
    $check->execute();
    $all_check = $check->fetchAll(PDO::FETCH_ASSOC);
    

    // Seleccionar los modulos
    $module = $cc->prepare("SELECT * FROM config ");
    $module->execute();
    $all_module= $module->fetchAll(PDO::FETCH_ASSOC);
?>
<div id="page-wrapper"><br />

    
    <div class="alert alert-info"><p>Company / Users</p></div>
    
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-pills">
                    <li class="active"><a href="#home-pills" data-toggle="tab"><i class="fa fa-th-list"></i> View Users</a></li>
                    <li><a href="#profile-pills" data-toggle="tab"><i class="fa fa-plus-square-o"></i> New User</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home-pills">
                        <?php require_once ("../../../controlador/c_company_users/c_list_users.php"); ?>
                    </div>
                <div class="tab-pane fade" id="profile-pills"><br />
    <form id="addForm" class="form-horizontal" method="post" action="../../../controlador/c_company_users/add_users.php">
        <div class="form-group">
              <label class="col-md-4 control-label" for="name">User Name: </label>
              <div class="col-md-8">
                <input id="_username" name="username" type="text" class="form-control input-sm" />
              </div>
        </div>
        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Password: </label>
              <div class="col-md-8">
                <input id="_password" name="password" type="text" class="form-control input-sm" />
              </div>
        </div>
            
        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Name and Surname: </label>
              <div class="col-md-8">
                <input id="_surname" name="namesurname" type="text" class="form-control input-sm" onkeypress="return caracteres(event)" />
              </div>
        </div>

        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Profile: </label>
              <div class="col-md-8">
                <select id="_position" name="position" class="form-control">
                    <?php foreach((array) $all_upd as $val_) { ?>
                        <option value="<?php echo $val_['id_rol'] ?>"> <?php echo $val_['nombre_rol'] ?></option>
                    <?php } ?>
                </select>
              </div>
        </div>

	   <div class="form-group">
              <label class="col-md-4 control-label" for="name">Phone: </label>
              <div class="col-md-8">
                <input id="_phone" name="phone" type="text" class="form-control input-sm" onkeypress="return soloNumeros(event)" />
              </div>
        </div>

        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Email: </label>
              <div class="col-md-8">
                <input id="_email" name="email" type="text" class="form-control input-sm" />
              </div>
        </div>

        
        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Initial System: </label>
              <div class="col-md-8">
                <select id="_initial" class="form-control" name="initial">
                    <?php foreach((array) $all_new as $value) { ?>
                    <option value="<?php echo $value['id_config'] ?>"> <?php echo $value['name_access'] ?></option>
                    <?php } ?>
                </select>
              </div>
        </div>
        
        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Select Company </label>
              <div class="col-md-8">
                <?php foreach((array) $all_check as $check_values) { ?>
                        <input id="_name" type="checkbox" name="emp[ ]" value="<?php echo $check_values['id_empresa'] ?>" /> <?php echo $check_values['nombre_empresa'] ?> <br />
                    <?php } ?>
              </div>
        </div>
        <hr>
        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Select Modules </label>
              <div class="col-md-8">
                <?php foreach((array) $all_module as $check_mod) { ?>
                        <input type="checkbox" name="mod[ ]" value="<?php echo $check_mod['id_config'] ?>" /> <?php echo $check_mod['name_access'] ?> <br />
                    <?php } ?>
              </div>
        </div>


      			
        <div class="modal-footer">
            <button type="submit" name="register" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
            <button type="reset" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-clear"></span> Clear</a>
        </div>
    </form>   
                </div>
            </div>     
        </div>
    </div>
</div>

<script>
    function preguntar(id) {
        if (confirm('Esta seguro que desea inactivar este usuario ' )){
            window.location.href = "../../../controlador/c_company_users/delete.php?id="+ id;
        }
    }
</script>

<script>
    function preguntarActivar(id) {
        if (confirm('Esta seguro que desea activar este usuario ' )){
            window.location.href = "../../../controlador/c_company_users/activar_user.php?id="+ id;
        }
    }
</script>