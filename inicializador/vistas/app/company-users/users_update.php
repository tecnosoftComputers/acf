<?php
 session_start();  
 if(isset($_SESSION['acfSession']["correo"]))  {

    require_once ("../head_unico.php");
    require_once ("../../../../datos/db/connect.php");

    // Generar link para vista usuarios
    $view = DBSTART::abrirDB()->prepare("SELECT * FROM modulos_items WHERE nombre_item='Users'");
    $view->execute();
    $all_view = $view->fetchAll(PDO::FETCH_ASSOC);

    foreach ($all_view as $key => $value_view) {
        $link = $value_view['src_head_u'];
    }
    
    if (isset($_REQUEST['cid'])){
        $laid = $_REQUEST['cid'];

        $sql = DBSTART::abrirDB()->prepare("SELECT * FROM usuarios u LEFT JOIN usuarios_empresas ue ON ue.id_user = u.id_usuario 
                                            WHERE u.id_usuario = '$laid' ");
        $sql->execute();
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $key => $value) {
            $p_id       = $value['id_usuario'];
            $p_username = $value['username'];
            $p_passw    = $value['passw'];
            $p_namesur  = $value['namesurname'];
            $p_role     = $value['role'];
            $p_phone    = $value['telefono'];
            $p_correo   = $value['correo'];
            $p_initial  = $value['initial_system'];
            $param      = $value['empresas'];
        }
    //Consultar los dos permisos: accounting / operations
    //$new = $cc->prepare("SELECT * FROM config WHERE NOT id_config=2 AND NOT id_config=4 AND NOT id_config=5 AND NOT id_config=6 ");
    $new = DBSTART::abrirDB()->prepare("SELECT * FROM config");
    $new->execute();
    $all_new = $new->fetchAll(PDO::FETCH_ASSOC);
    
    
    // Mostrar los Roles que esten disponibles para el NUEVO USUARIO
    $stmt = DBSTART::abrirDB()->prepare("SELECT * FROM roles t1 WHERE t1.estado='A'");
    $stmt->execute();
    $all_stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $upd = DBSTART::abrirDB()->prepare("SELECT * FROM roles WHERE estado='A'");
    $upd->execute();
    $all_upd = $upd->fetchAll(PDO::FETCH_ASSOC);   
    
    // Seleccionar las empresas => checkbox
    $check = DBSTART::abrirDB()->prepare("SELECT * FROM empresa WHERE estado='A'");
    $check->execute();
    $all_check = $check->fetchAll(PDO::FETCH_ASSOC);
    
    // Mostras las empresas seleccionadas previamente
    $previa = DBSTART::abrirDB()->prepare("SELECT ue.estado, e.id_empresa, ue.empresas,e.nombre_empresa FROM usuarios_empresas ue INNER JOIN empresa e ON e.id_empresa = ue.empresas WHERE ue.id_user='$laid'");
    $previa->execute();
    $all_send = $previa->fetchAll(PDO::FETCH_ASSOC);

    $previas = DBSTART::abrirDB()->prepare("SELECT ue.estado, e.id_config, ue.modulos,e.name_access FROM usuarios_modulos ue INNER JOIN config e ON e.id_config = ue.modulos WHERE ue.id_user='$laid'");
    $previas->execute();
    $all_sends = $previas->fetchAll(PDO::FETCH_ASSOC);
}
?>
<div id="page-wrapper"><br />
<div class="alert alert-info"><p>Company / Users / Update  <a style="float: right; color: #fff" href="<?php echo $link ?>">Volver</a></p></div>
    <div class="row">
        <div class="col-lg-12">
        <h2>Update Users</h2>
        <div class="col-lg-8">
        <div class="panel panel-default">

    <div class="panel-body">
    <form class="form-horizontal" method="post" action="../../../../controlador/c_company_users/edit_users.php">
        <input name="laid" type="hidden" value="<?php echo $p_id ?>" />
            
        <div class="form-group">
              <label class="col-md-4 control-label" for="name">User Name: </label>
              <div class="col-md-8">
                <input id="_username" name="username" type="text" value="<?php echo $p_username ?>" class="form-control input-sm" />
              </div>
        </div>
        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Password: </label>
              <div class="col-md-8">
                <input id="_password" name="password" type="text" value="<?php echo $p_passw ?>" class="form-control input-sm" />
              </div>
        </div>
            
        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Name and Surname: </label>
              <div class="col-md-8">
                <input id="_surname" name="namesurname" type="text" value="<?php echo $p_namesur ?>" class="form-control input-sm" onkeypress="return caracteres(event)" />
              </div>
        </div>

        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Profile: </label>
              <div class="col-md-8">
                <select id="_position" name="position" class="form-control">
                    <option><?php echo $p_role ?></option>
                            <?php foreach((array) $all_stmt as $val_) { ?>
                                    <option> <?php echo $val_['nombre_rol'] ?></option>
                            <?php } ?>
                </select>
              </div>
        </div>

	   <div class="form-group">
              <label class="col-md-4 control-label" for="name">Phone: </label>
              <div class="col-md-8">
                <input id="_phone" name="phone" type="text" value="<?php echo $p_phone ?>" class="form-control input-sm" onkeypress="return soloNumeros(event)" />
              </div>
        </div>

        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Email: </label>
              <div class="col-md-8">
                <input id="_email" name="email" type="text" value="<?php echo $p_correo ?>" class="form-control input-sm" />
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
              <?php foreach((array) $all_send as $sh) {
              if ($sh['estado'] == 'A') { // CONSULTAR
                    $cs1 = "checked";
                }else if($sh['estado'] == 'I'){
                    $cs1 = "unchecked";
                }
              ?>
              <input type="checkbox" name="emp[ ]" value="<?php echo $sh['empresas'] ?>" <?php echo $cs1 ?> /> <?php echo $sh['nombre_empresa'] ?><br />
              <?php } ?>              
              </div>
        </div>        
              

        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Select Module </label>
              <div class="col-md-8">
              <?php foreach((array) $all_sends as $shs) {
              if ($shs['estado'] == 'A') { // CONSULTAR
                    $cs1s = "checked";
                }else if($shs['estado'] == 'I'){
                    $cs1s = "unchecked";
                }
              ?>
              <input type="checkbox" name="mod[ ]" value="<?php echo $shs['modulos'] ?>" <?php echo $cs1s ?> /> <?php echo $shs['name_access'] ?><br />
              <?php } ?>              
              </div>
        </div> 



        <div class="modal-footer">
            <button type="submit" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
            <button type="reset" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-clear"></span> Clear</a>
        </div>
    </form>
        </div>
        </div><br />
        </div>
    </div>
</div>

<?php
require_once ("../foot_unico.php");

}else{
    session_unset();
    session_destroy();
    header('Location:  ../../../../login.php');
}
?>