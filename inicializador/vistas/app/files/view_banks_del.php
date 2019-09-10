<?php
  require_once "../../../../constantes.php";
 require_once FRONTEND_RUTA."init.php";  
 if(isset($_SESSION['acfSession']["correo"])) {

    require_once ("../head_unico.php");
    require_once ("../../../../datos/db/connect.php");

    if (isset($_REQUEST['cid'])){
        $laid = $_REQUEST['cid'];

        $sql = DBSTART::abrirDB()->prepare("SELECT * FROM dp02a110 WHERE CODIGOBCO = '$laid' ");
        $sql->execute();
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $key => $value) {
            $COD = $value['CODIGOBCO'];
            $NOM = $value['NOMBREBCO'];
            $MOV = $value['CODMOV'];
        };
    }
?>
<div id="page-wrapper"><br />
<div class="alert alert-info"><p>Accounting / Files / Banks / Deleted  </p></div>
    <div class="row">
        <div class="col-lg-12">
        <div class="col-lg-7">
        <div class="panel panel-default">

    <div class="panel-body">
    <form id="addForm" class="form-horizontal" method="post" action="../../../../controlador/c_files/del_bank.php">

        <fieldset>
        <legend class="mibread"><strong>Banks</strong></legend>

        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Bank Code: </label>
            <div class="col-md-8">
                <input name="bankcode" type="text" class="form-control input-sm" value="<?php echo $COD ?>" readonly="" />
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Accounting Code: </label>
            <div class="col-md-8">
                <input name="accode" type="text" class="form-control input-sm" value="<?php echo $MOV ?>" disabled="" />
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Bank Name: </label>
            <div class="col-md-8">
                <input name="bankname" type="text" class="form-control input-sm" value="<?php echo $NOM ?>" disabled="" />
            </div>
        </div>

        <div class="modal-footer">
            <button style="float: left;" type="submit" name="delete" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-remove"></span> Remove</a></button>
            <button style="float: left;" type="reset" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a></button>
            <span style="float: right"><a href="../../../../inicializador/vistas/app/in.php?cid=files/view_banks" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
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