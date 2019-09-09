<?php
 session_start();  
 if(isset($_SESSION['acfSession']["correo"])) {

    require_once FRONTEND_RUTA."head_unico.php";
    require_once FRONTEND_RUTA."datos/db/connect.php";

    if (isset($_REQUEST['cid'])){
        $laid = $_REQUEST['cid'];

        $sql = DBSTART::abrirDB()->prepare("SELECT * FROM dp01a110 WHERE CODIGO = '$laid' ");
        $sql->execute();
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $key => $value) {
            $codigo = $value['CODIGO'];
            $name   = $value['NOMBRE'];
            $tipe   = $value['CODTIPCTA'];
            $desc   = $value['CTADES'];
            $inac   = $value['CTAINACTIVA'];
        }
    
    // Type of account
    $type = DBSTART::abrirDB()->prepare("SELECT * FROM s01tab110");
    $type->execute();
    $all_type = $type->fetchAll(PDO::FETCH_ASSOC);
    
    // igualar el select 
    
    $igual = DBSTART::abrirDB()->prepare("SELECT * FROM s01tab110 WHERE codtipcta='$tipe'");
    $igual->execute();
    $all_igual = $igual->fetchAll(PDO::FETCH_ASSOC);
    foreach ((array) $all_igual as $datos) {
        $idc = $datos['codtipcta'];
        $nac = $datos['nomtipcta'];
    }
}
?>
<div id="page-wrapper"><br />
<div class="alert alert-info"><p>Accounting / Files / Chart Account / Update  <a style="float: right; color: #fff" href="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vistas/app/in.php?cid=files/chart_account">Volver</a></p></div>
    <div class="row">
        <div class="col-lg-12">
        <div class="col-lg-7">
        <div class="panel panel-default">

    <div class="panel-body">
    <form id="addForm" class="form-horizontal" method="post" action="<?php echo PUERTO.'://'.HOST; ?>/controlador/c_files/edit_account.php">

        <fieldset>
        <legend class="mibread"><strong>Chart of Accounts</strong></legend>

        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Account Number: </label>
            <div class="col-md-8">
                <input name="number" type="text" class="form-control input-sm" value="<?php echo $codigo ?>" readonly="" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Account Name: </label>
            <div class="col-md-8">
                <input name="name" type="text" class="form-control input-sm" value="<?php echo $name ?>" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Account Type: </label>
            <div class="col-md-8">
                <select class="form-control" name="type">
                        
                    <?php foreach ((array) $all_type as $key => $value ){ ?>
                        <?php if ($idc == $value['codtipcta']) { ?>
                        <option style="background-color: turquoise" value="<?php echo $value['codtipcta'] ?>" selected=""><?php echo $value['nomtipcta'] ?></option>
                    <?php }else{ ?>
                        <option value="<?php echo $value['codtipcta'] ?>"><?php echo $value['nomtipcta'] ?></option>
                    <?php }  } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Account Description: </label>
            <div class="col-md-8">
                <textarea name="desc" class="form-control input-sm" ><?php echo $desc ?></textarea>
            </div>
        </div>

        <!--<div class="form-group">
              <label class="col-md-4 control-label" for="name">Account is inactive: </label>
              <div class="col-md-8">
                   <?php // if( ord($inac) == 1 ) { ?>
                    <input style="margin-top: 10px" name="inactive" type="checkbox" checked="" />
                  <?php // }else{?>
                    <input style="margin-top: 10px" name="inactive" type="checkbox" />
                  <?php // } ?>
              </div>
        </div>-->

        <div class="modal-footer">
            <button style="float: left;" type="submit" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a></button>
            <button style="float: left;" type="reset" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a></button>
            <span style="float: right"><a href="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vistas/app/in.php?cid=files/chart_account" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
        </div>

        </fieldset>
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
    header("Location:  ".PUERTO.'://'.HOST; ."/login.php");
} 

 ?>