<?php
require_once "../../../../constantes.php";
require_once FRONTEND_RUTA."init.php"; 
 if(isset($_SESSION['acfSession']["correo"]))  {
    require_once ("../head_unico.php");
    require_once ("../../../../datos/db/connect.php");
    
    

    if (isset($_REQUEST['cid'])){
        $laid = $_REQUEST['cid'];
        
        
        $lasesion   = $_SESSION['acfSession']['lasesion'];
        /******   E X T R A E R   L A   ID   D E  L A    E M P R E S A   ******/
        $buscar = DBSTART::abrirDB()->prepare("SELECT * FROM sesion_init WHERE num_sesion='$lasesion'");
        $buscar->execute();
        $all_buscar = $buscar->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ((array )$all_buscar as $data_buscar){
            $laempresa = $data_buscar['id_empresa'];
        }

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
    //Consultar los dos permisos: accounting / operations
    //$new = $cc->prepare("SELECT * FROM config WHERE NOT id_config=2 AND NOT id_config=4 AND NOT id_config=5 AND NOT id_config=6 ");
    $new = DBSTART::abrirDB()->prepare("SELECT * FROM config");
    $new->execute();
    $all_new = $new->fetchAll(PDO::FETCH_ASSOC);
    
    // Type of account
    $type = DBSTART::abrirDB()->prepare("SELECT * FROM s01tab110");
    $type->execute();
    $all_type = $type->fetchAll(PDO::FETCH_ASSOC);
}
?>
<div id="page-wrapper"><br />
<div class="alert alert-info"><p>Accounting / Files / Chart Account </p></div>
    <div class="row">
        <div class="col-lg-12">
        <div class="col-lg-7">
        <div class="panel panel-default">

    <div class="panel-body">
    <form id="addForm" class="form-horizontal" method="post" action="../../../../controlador/c_files/add_accounts.php">
<input type="hidden" name="laempresaid" value="<?php echo $laempresa; ?>" />
        <fieldset>
        <legend class="mibread"><strong>Chart of Accounts</strong></legend>

        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Account Number: </label>
            <div class="col-md-8">
                <input name="number" type="text" class="form-control input-sm" value="<?php echo $codigo ?>" required="" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Account Name: </label>
            <div class="col-md-8">
                <input name="name" type="text" class="form-control input-sm" required="" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Account Type: </label>
            <div class="col-md-8">
                <select class="form-control" name="type">
                    <?php foreach ( $all_type as $key => $value ): ?>
                        <option value="<?php echo $value['codtipcta'] ?>"><?php echo $value['nomtipcta'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Account Description: </label>
            <div class="col-md-8">
                <textarea name="desc" class="form-control input-sm"></textarea>
            </div>
        </div>

        <!--</a><div class="form-group">
              <label class="col-md-4 control-label" for="name">Account is inactive: </label>
              <div class="col-md-8">
                <?php //if( ord($inac) == 1 ) { ?>
                    <input style="margin-top: 10px" name="inactive" type="checkbox" checked="" />
                  <?php // }else{?>
                    <input style="margin-top: 10px" name="inactive" type="checkbox" />
                  <?php // } ?>
              </div>
        </div>-->

        <div class="modal-footer">
            <button style="float: left;" type="submit" name="register" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
            <button style="float: right;" type="reset" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a></button>
            <span style="float: right"><a href="../../../../inicializador/vistas/app/in.php?cid=files/chart_account" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
        </div>

        </fieldset>

    </form> 
        </div>
        </div>
<br />
        </div>

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