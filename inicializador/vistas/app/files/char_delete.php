<?php
 session_start();  
 if(isset($_SESSION['acfSession']["correo"])) {

    require_once ("../head_unico.php");
    require_once ("../../../../datos/db/connect.php");

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
            $movi   = $value['TIENEMOV'];
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
<div class="alert alert-info"><p>Accounting / Files / Chart Account / Delete  </p></div>
    <div class="row">
        <div class="col-lg-12">
        <div class="col-lg-7">
        <div class="panel panel-default">

    <div class="panel-body">
    <form id="addForm" class="form-horizontal" method="post" action="../../../../controlador/c_files/del_account.php">

        <fieldset>
        <legend class="mibread"><strong>Chart of Accounts</strong></legend>

        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Account Number: </label>
            <div class="col-md-8">
                <input name="number" type="text" class="form-control input-sm" value="<?php echo $codigo ?>" disabled="" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Account Name: </label>
            <div class="col-md-8">
                <input name="name" type="text" class="form-control input-sm" value="<?php echo $name ?>" disabled="" />
            </div>
        </div>

        <div class="modal-footer">
            <?php if( ord($movi) == 1 ) { ?>
                    <div class="alert alert-danger">
                        <p> <strong>* Importante: </strong>Esta cuenta tiene movimientos y no se puede eliminar. <a href="../../../../inicializador/vistas/app/in.php?cid=files/chart_account">Volver</a></p>
                    </div>
                  <?php }else{?>
                  <button style="float: left;" type="submit" name="delete" class="btn btn-primary" ><span class="glyphicon glyphicon-floppy-remove"></span> Delete</a></button>
                  <span style="float: right"><a href="../../../../inicializador/vistas/app/in.php?cid=files/chart_account" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
                            
                  <?php } ?>
        </div>

        </fieldset>
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