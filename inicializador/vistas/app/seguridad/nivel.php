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
?>
<div id="page-wrapper"><br />
    <div class="alert alert-info"><p>Security / Profiles</p></div>
    
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-pills">
                    <li class="active"><a href="#home-pills" data-toggle="tab"><i class="fa fa-th-list"></i> View Profiles</a></li>
                    <li><a href="#profile-pills" data-toggle="tab"><i class="fa fa-plus-square-o"></i> New Profile</a></li>
                </ul>
                <!-- Tab panes -->
                
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home-pills">
                        <?php require_once ("../../../controlador/c_seguridad/c_list_profile.php"); ?>
                    </div>
                <div class="tab-pane fade" id="profile-pills"><br />
                <div class="col-lg-6">
    <form method="post" name="frm" action="../../../controlador/c_seguridad/add_profile.php">    
        <div class="form-group">
            <label for="inputAddress2">Name Profile</label>
            <input class="form-control" type="text" name="_descripcion" placeholder="" />
        </div>

        <div class="form-group">
            <label for="inputAddress2">Observation</label>
            <textarea class="form-control" name="_obs"></textarea>
        </div>

          <div class="modal-footer">
            <button type="submit" id="register" name="register" class="btn btn-success"> <i class="fa fa-check"></i> Ingresar</button>
            <button type="submit" id="register" name="update" class="btn btn-info"> <i class="fa fa-edit"></i> Actualizar</button>
            <button type="reset" class="btn btn-warning" > <i class="fa fa-times"></i> Nuevo</button>
           </div>
    </form>
    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function preguntar(id) {
        if (confirm('Esta seguro que desea inactivar este rol ' )){
            window.location.href = "../../../controlador/c_seguridad/delete_rol.php?id="+ id;
        }
    }
</script>

<script>
    function preguntarActivar(id) {
        if (confirm('Esta seguro que desea activar este rol ' )){
            window.location.href = "../../../controlador/c_seguridad/activar_rol.php?id="+ id;
        }
    }
</script>