<?php
 session_start();  
 if(isset($_SESSION["correo"])) {

    require_once ("../head_unico.php");
    require_once ("../../../../datos/db/connect.php");

    if (isset($_REQUEST['cid'])){
        $laid = $_REQUEST['cid'];

        $sql = DBSTART::abrirDB()->prepare("SELECT * FROM DPNUMERO WHERE ns = '$laid' ");
        $sql->execute();
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $key => $value) {
            $tip = $value['TIPO_ASI'];
            $nom = $value['NOMBRE'];
            $asi = $value['ASIENTO'];
            $id = $value['ns'];
        }
    }
?>
<div id="page-wrapper"><br />
<div class="alert alert-info"><p>Accounting / Files / Voucher / Deleted </p></div>
    <div class="row">
        <div class="col-lg-12">
        <div class="col-lg-7">
        <div class="panel panel-default">

    <div class="panel-body">
    <form id="addForm" class="form-horizontal" method="post" action="../../../../controlador/c_files/del_voucher.php">
        <input type="hidden" name="param" value="<?php echo $id ?>" />
        <fieldset>
        <legend class="mibread"><strong>Voucher</strong></legend>

        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Code: </label>
            <div class="col-md-8">
                <input name="code" type="text" class="form-control input-sm" value="<?php echo $tip ?>" disabled="" />
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Entry Name: </label>
            <div class="col-md-8">
                <input name="name" type="text" class="form-control input-sm" value="<?php echo $nom ?>" disabled="" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Number: </label>
            <div class="col-md-8">
                <input name="numb" type="text" class="form-control input-sm" value="<?php echo $asi ?>" disabled="" />
            </div>
        </div>

        <div class="modal-footer">
            <button style="float: left;" type="submit" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-remove"></span> Remove</a></button>
            <span style="float: right"><a href="../../../../inicializador/vistas/app/in.php?cid=files/view_voucher" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
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
    header('Location:  ../../../../login.php');
} 

 ?>