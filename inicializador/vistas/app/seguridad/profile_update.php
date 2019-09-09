<?php
 session_start();  
 if(isset($_SESSION['acfSession']["correo"])) {
    require_once ("../head_unico.php");
    require_once ("../../../../datos/db/connect.php");
    
    if (isset($_REQUEST['cid'])){
        $laid = $_REQUEST['cid'];

        $sql = DBSTART::abrirDB()->prepare("SELECT * FROM roles WHERE id_rol = '$laid' ");
        $sql->execute();
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $key => $value) {
            $p_id       = $value['id_rol'];
            $p_namerol  = $value['nombre_rol'];
            $p_obs      = $value['observacion'];
        }
    }
?>
<div id="page-wrapper"><br />
<div class="alert alert-info"><p>Security / Profile / Update  <a style="float: right; color: #fff" href="../in.php?cid=seguridad/nivel">Volver</a></p></div>
    <div class="row">
        <div class="col-lg-12">
        <h2>Update Profile</h2>
        <div class="col-lg-6">
        <div class="panel panel-default">

    <div class="panel-body">
    <form class="form-horizontal" method="post" action="../../../../controlador/c_seguridad/edit_profile.php">
        <input name="laid" type="hidden" value="<?php echo $p_id ?>" />
            
        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Name Profile: </label>
              <div class="col-md-8">
                <input name="profile" type="text" value="<?php echo $p_namerol ?>" class="form-control input-sm" />
              </div>
        </div>
        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Observation: </label>
              <div class="col-md-8">
                <input name="obs" type="text" value="<?php echo $p_obs ?>" class="form-control input-sm" />
              </div>
        </div>
      			
        <div class="modal-footer">
            <button type="submit" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
            <button type="reset" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-clear"></span> Clear</a>
        </div>
    </form>
        </div>
        </div>
<br />
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