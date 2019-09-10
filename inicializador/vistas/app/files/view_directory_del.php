<?php
  require_once "../../../../constantes.php";
 require_once FRONTEND_RUTA."init.php";  
 if(isset($_SESSION['acfSession']["correo"])) {

    require_once ("../head_unico.php");
    require_once ("../../../../datos/db/connect.php");
    
    $sql = DBSTART::abrirDB()->prepare("SELECT * FROM tab_asientos");
    $sql->execute();
    $all = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    $stmt2 = DBSTART::abrirDB()->prepare("SELECT * FROM tab_ide");
    $stmt2->execute();
    $all2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    
    $stmt = DBSTART::abrirDB()->prepare("SELECT * FROM tab_tclient");
    $stmt->execute();
    $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $stmt3 = DBSTART::abrirDB()->prepare("SELECT * FROM tab_act");
    $stmt3->execute();
    $all3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_REQUEST['cid'])){
        $laid = $_REQUEST['cid'];

        $sql = DBSTART::abrirDB()->prepare("SELECT * FROM Finacli WHERE NO_ID = '$laid' ");
        $sql->execute();
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $key => $value) {
            $NOID = $value['NO_ID'];
            $cla = $value['CLASIFICA'];
            $tc  = $value['TC'];
            $tid = $value['TID'];
            $ced = $value['CEDRUC'];
            $nom = $value['NOMEMP'];
            $nam = $value['NAMECONTACT'];
        }
    }
?>
<div id="page-wrapper"><br />
<div class="alert alert-info"><p>Accounting / Files / Directory / Remove  </p></div>
    <div class="row">
        <div class="col-lg-5">
        <div class="panel panel-default">

    <div class="panel-body">
    <form id="addForm" method="post" action="../../../../controlador/c_files/del_directory.php">

        <fieldset>
        
        <legend class="mibread"><strong>Directory</strong></legend>
        <input type="hidden" name="laid" value="<?php echo $NOID ?>" />
            
            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Company Name: </label>
                    <input name="name" type="text" class="form-control input-sm" value="<?php echo $nom ?>" disabled="" />
            </div>

            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Contact Type</label>
                    <select name="contact_type" class="form-control" disabled="">
                        <?php foreach ((array) $all as $val) {  ?>
                            <?php if ($val['codtipo'] == $cla ) { ?>
                            <option style="background: turquoise;" value="<?php echo $val['codtipo'] ?>" selected=""><?php echo $val['nomtipo'] ?></option>
                            <?php }else{ ?>
                        <option value="<?php echo $val['codtipo'] ?>"><?php echo $val['nomtipo'] ?></option>
                        <?php } } ?>
                    </select> <?php // comment  ?>
            </div>

    
        <div class="modal-footer">
            <button style="float: left;" type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Remove</a></button>
            <button style="float: left;" type="reset" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a></button>
            <span style="float: right"><a href="../../../../inicializador/vistas/app/in.php?cid=files/view_directory" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
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