<?php
 session_start();  
 if(isset($_SESSION["correo"])) {

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
    
    $ofi = DBSTART::abrirDB()->prepare("SELECT * FROM tab_ofi");
    $ofi->execute();
    $all_ofi = $ofi->fetchAll(PDO::FETCH_ASSOC);
    
    $cli = DBSTART::abrirDB()->prepare("SELECT * FROM tab_cli");
    $cli->execute();
    $all_cli = $cli->fetchAll(PDO::FETCH_ASSOC);

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
            $ct1 = $value['CONTAC_T1'];
            $ct2 = $value['CONTAC_T2'];
            $ciu = $value['CIUDAD'];
            
            $sta = $value['STATE'];
            $cou = $value['COUNTRY'];
            $zip = $value['ZIPCODE'];
            $dir = $value['DIRDOM'];
            $te1 = $value['TELEFONO'];
            $te2 = $value['TELEFONO2'];
            $act = $value['ACTIVIDAD'];
            
            $em1 = $value['EMAIL'];
            $em2 = $value['EMAIL2'];
            $web = $value['WEBSITE'];
            
            // Dos campos nuevos
            $oficial = $value['OFICIAL'];
            $tipocli = $value['TIPOCLI'];;
        }
    }
?>
<div id="page-wrapper"><br />
<div class="alert alert-info"><p>Accounting / Files / Directory / Edit </p></div>
    <div class="row">
        <div class="col-lg-12">
        <div class="col-lg-9">
        <div class="panel panel-default">

    <div class="panel-body">
    <form id="addForm" class="form-horizontal" method="post" action="../../../../controlador/c_files/edit_directory.php">

        <fieldset>
        
        <legend class="mibread"><strong>Directory</strong></legend>
        <input type="hidden" name="laid" value="<?php echo $NOID ?>" />
        <div class="form-row">
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Company Name: </label>
                  <div class="col-md-8">
                    <input name="name" type="text" class="form-control input-sm" value="<?php echo $nom ?>" />
                  </div>
            </div>

            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Contact Type</label>
                  <div class="col-md-8">
                    <select name="contact_type" class="form-control">
                        <?php foreach ((array) $all as $val) {  ?>
                            <?php if ($val['codtipo'] == $cla ) { ?>
                            <option style="background: turquoise;" value="<?php echo $val['codtipo'] ?>" selected=""><?php echo $val['nomtipo'] ?></option>
                            <?php }else{ ?>
                        <option value="<?php echo $val['codtipo'] ?>"><?php echo $val['nomtipo'] ?></option>
                        <?php } } ?>
                    </select> <?php // comment  ?>
                  </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">ID Number </label>
                  <div class="col-md-8">
                    <input name="id_number" type="text" class="form-control input-sm" value="<?php echo $ced ?>" />
                  </div>
            </div>
            
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Type Identification </label>
                  <div class="col-md-8">
                    <select name="type_type" class="form-control input-sm" >
                        <?php foreach ((array) $all2 as $dal) { ?>
                        <?php if ($dal['CODIGO'] == $tid ) { ?>
                            <option style="background: turquoise;" value="<?php echo $dal['CODIGO'] ?>" selected=""><?php echo $dal['NOMBRE'] ?></option>
                            <?php }else{  ?>
                            <option value="<?php echo $dal['CODIGO'] ?>"><?php echo $dal['NOMBRE'] ?></option>
                        <?php } } ?> 
                    </select>
                  </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Company Activity </label>
                  <div class="col-md-8">
                  <select name="company_act" class="form-control">
                        <?php foreach ((array) $all3 as $val2) { ?>
                        <?php if ($val2['CODIGO'] == $act) { ?>
                        <option style="background: turquoise;" value="<?php echo $val2['CODIGO'] ?>" selected=""><?php echo $val2['NOMBRE'] ?></option>
                        <?php }else{ ?>
                        <option value="<?php echo $val2['CODIGO'] ?>"><?php echo $val2['NOMBRE'] ?></option>
                        <?php } } ?>
                  </select>
                  </div>
            </div>
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Legal Representante </label>
                  <div class="col-md-8">
                    <input value="<?php echo $nam ?>" name="legal_rep"  type="text" class="form-control input-sm" />
                  </div>
            </div>
            
            
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Phone (1) </label>
                  <div class="col-md-8">
                    <input value="<?php echo $ct1 ?>" name="phoneone" type="text" class="form-control input-sm" />
                  </div>
            </div>
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Phone (2) </label>
                  <div class="col-md-8">
                    <input name="phonetwo" value="<?php echo $ct2 ?>" type="text" class="form-control input-sm" />
                  </div>
            </div>
            
            
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Email (1) </label>
                  <div class="col-md-8">
                    <input value="<?php echo $em1 ?>" name="emailone" type="text" class="form-control input-sm" />
                  </div>
            </div>
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Email (2) </label>
                  <div class="col-md-8">
                    <input value="<?php echo $em2 ?>" name="emailtwo" type="text" class="form-control input-sm" />
                  </div>
            </div>
            
            
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Adress </label>
                  <div class="col-md-8">
                    <input value="<?php echo $dir ?>" name="adress" type="text" class="form-control input-sm" />
                  </div>
            </div>
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Country </label>
                  <div class="col-md-8">
                    <input value="<?php echo $cou ?>" name="country" type="text" class="form-control input-sm" />
                  </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">State </label>
                  <div class="col-md-8">
                    <input value="<?php echo $sta ?>" name="state" type="text" class="form-control input-sm" />
                  </div>
            </div>
            
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">City </label>
                  <div class="col-md-8">
                    <input value="<?php echo $ciu ?>" name="city"  type="text" class="form-control input-sm" />
                  </div>
            </div>
        </div>   


        <div class="form-row">
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Zipcode </label>
                  <div class="col-md-8">
                    <input value="<?php echo $zip ?>" name="zipcode" type="text" class="form-control input-sm" />
                  </div>
            </div>
            
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Web </label>
                  <div class="col-md-8">
                    <input name="web" type="text" class="form-control input-sm" value="<?php echo $web ?>" />
                  </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Phone Cia (1) </label>
                  <div class="col-md-8">
                    <input value="<?php echo $te1 ?>" name="phonecia1" type="text" class="form-control input-sm" />
                  </div>
            </div>
            
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Phone Cia (2) </label>
                  <div class="col-md-8">
                    <input value="<?php echo $te2 ?>" name="phonecia2" type="text" class="form-control input-sm" />
                  </div>
            </div>
        </div>
        

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-md-4 control-label" for="name">Officer </label>
                  <div class="col-md-8">
                  
                    <select name="assignee" class="form-control">
                        <?php foreach ((array) $all_ofi as $va) { ?>
                        <?php if ($va['CODIGO'] == $oficial) { ?>
                        <option style="background: turquoise;" value="<?php echo $va['CODIGO'] ?>" selected=""><?php echo $va['NOMBRE'] ?></option>
                        <?php }else{ ?>
                        <option value="<?php echo $va['CODIGO'] ?>"><?php echo $va['NOMBRE'] ?></option>
                        <?php } } ?>
                    </select>
                
                    
                    
                  </div>
            </div>
            
            <div class="form-group col-md-6">
                <label class="col-md-4 control-label" for="name">Classification </label>
                  <div class="col-md-8">
                    <select name="classi" class="form-control">
                        <?php foreach ((array) $all_cli as $val_cli) { ?>
                            <?php if ($val_cli['CODIGO'] == $tipocli ) { ?>
                            <option style="background: turquoise;" value="<?php echo $val_cli['CODIGO'] ?>" selected=""> <?php echo $val_cli['NOMBRE'] ?></option>
                        <?php }else{ ?>
                        <option value="<?php echo $val_cli['CODIGO'] ?>"> <?php echo $val_cli['NOMBRE'] ?></option>
                        <?php } } ?>
                    </select>
                  </div>
            </div>
        </div>

    
        <div class="modal-footer">
            <button style="float: left;" type="submit" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a></button>
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