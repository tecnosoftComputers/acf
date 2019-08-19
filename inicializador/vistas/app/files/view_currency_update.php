<?php
 session_start();  
 if(isset($_SESSION["correo"])) {

    require_once ("../head_unico.php");
    require_once ("../../../../datos/db/connect.php");

    // Moneda
    $money = DBSTART::abrirDB()->prepare("SELECT * FROM fimoneda");
    $money->execute();
    $dinero = $money->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_REQUEST['cid'])){
        $laid = $_REQUEST['cid'];

        $sql = DBSTART::abrirDB()->prepare("SELECT * FROM fimoneda WHERE IDMON = '$laid' ");
        $sql->execute();
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $key => $value) {
            $idupd = $value['IDMON'];
            $upd_tipo = $value['TIPO_MON'];
            $upd_nomb = $value['NOMBREMON'];
            $upd_fact = $value['FACTOR'];
            $upd_simb = $value['SIMBOLO'];
            $upd_deci = $value['DECIMA'];
        };
    }
?>
<script type="text/javascript" src="../../../js/files_banks.js"></script>
<div id="page-wrapper"><br />

<div class="alert alert-info"><p>Accounting / Files / Currency / Edit  </p></div>
    <div class="row">
        <div class="col-lg-12">
        <div class="col-lg-7">
        <div class="panel panel-default">

    <div class="panel-body">
    <form action="../../../../controlador/c_files/edit_currency.php" method="post" class="form-horizontal">
        <fieldset>
    <legend class="mibread"><strong>Currency</strong></legend>
    <input type="hidden" name="laids" value="<?php echo $idupd ?>">
            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Type Currency: </label>
                  <div class="col-md-8">
                    <input maxlength="3" autocomplete="off" value="<?php echo $upd_tipo ?>" name="type" type="text" class="form-control input-sm" />
                  </div>
            </div>            

            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Name Currency</label>
                  <div class="col-md-8">
                    <input autocomplete="off" value="<?php echo $upd_nomb ?>" name="name" type="text" class="form-control input-sm" />
                  </div>
            </div>            

            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Factor: </label>
                  <div class="col-md-8">
                    <input maxlength="50" value="<?php echo $upd_fact ?>" autocomplete="off" name="factor" type="text" class="form-control input-sm" />
                  </div>
            </div>

            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Simbolo: </label>
                  <div class="col-md-8">
                    <input maxlength="3" value="<?php echo $upd_simb ?>" autocomplete="off" name="simbol" type="text" class="form-control input-sm" />
                  </div>
            </div>

            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Decimal: </label>
                  <div class="col-md-8">
                    <input autocomplete="off" value="<?php echo $upd_deci ?>" maxlength="4" name="decimal" type="text" class="form-control input-sm" />
                  </div>
            </div>
                

            <div class="modal-footer">
                <button style="float: left;" type="submit" name="register" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a></button>&nbsp;
                <button style="float: left;" type="reset" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a></button>
                <span style="float: right"><a href="../in.php?cid=files/view_currency" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
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