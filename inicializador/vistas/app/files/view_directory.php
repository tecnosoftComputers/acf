<?php
@header("Content-Type: text/html;charset=utf-8");
require_once ("../../../datos/db/connect.php");
$env = new DBSTART;
$cc = $env::abrirDB();
?>

<?php
$userid = $_SESSION['usuario'];
$sql = $cc->prepare("SELECT * FROM usuarios WHERE id_usuario='$userid' AND estado='A' ");
$sql->execute();

$fetch = $sql->fetchAll(PDO::FETCH_ASSOC);
foreach ((array )$fetch as $results){
    $laid = $results['id_usuario'];
    $username = $results['namesurname'];
}

    $stmt2 = $cc->prepare("SELECT * FROM tab_ide");
    $stmt2->execute();
    $all2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    
    $stmt = $cc->prepare("SELECT * FROM tab_tclient");
    $stmt->execute();
    $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $stmt3 = $cc->prepare("SELECT * FROM tab_act");
    $stmt3->execute();
    $all3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
    
    $ofi = $cc->prepare("SELECT * FROM tab_ofi");
    $ofi->execute();
    $all_ofi = $ofi->fetchAll(PDO::FETCH_ASSOC);
    
    $cli = $cc->prepare("SELECT * FROM tab_cli");
    $cli->execute();
    $all_cli = $cli->fetchAll(PDO::FETCH_ASSOC);
?>

<div id="page-wrapper"><br />
    <div class="alert alert-info"><p>Accounting / Files / Directory</p></div>
    <div class="row">
        <div class="col-lg-12">
<div class="panel panel-default"> <!-- /.panel-heading -->
  <div class="panel-body" style="height:500px;overflow:auto;"> <!-- Nav tabs -->
    <ul class="nav nav-pills">
        <li class="active"><a href="#list-pills" data-toggle="tab"><i class="fa fa-th-list"></i> List Directory</a></li>
        <li style="width: 300px;"><a href="#form-pills" data-toggle="tab"><i class="fa fa-plus-square-o"></i> New Directory</a></li>
    </ul>
                
<div class="tab-content"> <!-- Tab panes -->
    <div class="tab-pane fade in active" id="list-pills"><br />
        <div class="col-lg-12">
<?php  require_once ("../../../controlador/c_files/c_list_directory.php"); ?>
        </div>
    </div> <!-- FIN DE TIPOS DE ASIENTOS -->

  <div class="tab-pane fade" id="form-pills"><br />
<div class="col-lg-9">
    <form action="../../../controlador/c_files/add_directory.php" method="post" class="form-horizontal">
        <fieldset>
    <legend class="mibread"><strong>Directory</strong></legend>
        <div class="form-row">
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Company Name: </label>
                  <div class="col-md-8">
                    <input name="name" type="text" class="form-control input-sm" autocomplete="off" />
                  </div>
            </div>

            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Contact Type</label>
                  <div class="col-md-8">
                    <select name="contact_type" class="form-control">
                        <?php foreach ((array) $all as $val) {  ?>
                        <option value="<?php echo $val['codtipo'] ?>"><?php echo $val['nomtipo'] ?></option>
                        <?php } ?>
                    </select>
                  </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">ID Number </label>
                  <div class="col-md-8">
                    <input name="id_number" type="text" class="form-control input-sm" autocomplete="off" />
                  </div>
            </div>
            
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Type Identification </label>
                  <div class="col-md-8">
                    <select name="type_type" class="form-control input-sm" >
                        <?php foreach ((array) $all2 as $dal) { ?>
                            <option value="<?php echo $dal['CODIGO'] ?>"><?php echo $dal['NOMBRE'] ?></option>
                        <?php } ?> 
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
                        <option value="<?php echo $val2['CODIGO'] ?>"><?php echo $val2['NOMBRE'] ?></option>
                        <?php } ?>
                  </select>
                  </div>
            </div>
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Legal Representante </label>
                  <div class="col-md-8">
                    <input name="legal_rep"  type="text" class="form-control input-sm" autocomplete="off" />
                  </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Phone (1) </label>
                  <div class="col-md-8">
                       <input name="phoneone" type="text" class="form-control input-sm" autocomplete="off" />
                  </div>
            </div>
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Phone (2) </label>
                  <div class="col-md-8">
                    <input name="phonetwo"  type="text" class="form-control input-sm" autocomplete="off" />
                  </div>
            </div>            
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Email (1) </label>
                  <div class="col-md-8">
                       <input name="emailone" type="text" class="form-control input-sm" autocomplete="off" />
                  </div>
            </div>
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Email (2) </label>
                  <div class="col-md-8">
                       <input name="emailtwo" type="text" class="form-control input-sm" autocomplete="off" />
                  </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Adress </label>
                  <div class="col-md-8">
                    <input name="adress" type="text" class="form-control input-sm" autocomplete="off" />
                  </div>
            </div>
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Country </label>
                  <div class="col-md-8">
                    <input name="country" type="text" class="form-control input-sm" autocomplete="off" />
                  </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">State </label>
                  <div class="col-md-8">
                    <input name="state" type="text" class="form-control input-sm" autocomplete="off" />
                  </div>
            </div>
            
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">City </label>
                  <div class="col-md-8">
                    <input name="city"  type="text" class="form-control input-sm" autocomplete="off" />
                  </div>
            </div>
        </div>   


        <div class="form-row">
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Zipcode </label>
                  <div class="col-md-8">
                    <input name="zipcode" type="text" class="form-control input-sm" autocomplete="off" />
                  </div>
            </div>
            
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Web </label>
                  <div class="col-md-8">
                    <input name="web" type="text" class="form-control input-sm" autocomplete="off" />
                  </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Phone Cia (1) </label>
                  <div class="col-md-8">
                    <input name="phonecia1" type="text" class="form-control input-sm" autocomplete="off" />
                  </div>
            </div>
            
            <div class="form-group col-md-6">
                  <label class="col-md-4 control-label" for="name">Phone Cia (2) </label>
                  <div class="col-md-8">
                    <input name="phonecia2" type="text" class="form-control input-sm" autocomplete="off" />
                  </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-md-4 control-label" for="name">Officer </label>
                  <div class="col-md-8">
                    <select name="assignee" class="form-control">
                        <?php foreach ((array) $all_ofi as $val_ofi) { ?>
                            <option value="<?php echo $val_ofi['CODIGO'] ?>"> <?php echo $val_ofi['NOMBRE'] ?></option>
                        <?php } ?>
                    </select>
                  </div>
            </div>
            
            <div class="form-group col-md-6">
                <label class="col-md-4 control-label" for="name">Classification </label>
                  <div class="col-md-8">
                  
                    <select name="classi" class="form-control">
                        <?php foreach ((array) $all_cli as $val_cli) { ?>
                            <option value="<?php echo $val_cli['CODIGO'] ?>"> <?php echo $val_cli['NOMBRE'] ?></option>
                        <?php } ?>
                    </select>
                  </div>
            </div>
        </div>
        
            <div class="modal-footer">
                <button style="float: left;" type="submit" name="register" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a></button>&nbsp;
                <button style="float: left;" type="reset" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a></button>
                <span style="float: right"><a href="#list-pills" data-toggle="tab" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
            </div>
        </fieldset>
    </form>
    </div>
</div> <!-- FIN DE ASIENTOS CONTABLES-->
            </div> <!-- FIN DE TAB CONTENT-->    
        </div> <!-- FIN DE PANEL BODY -->
    </div> <!-- FIN DE PANEL DEFAULT -->
</div> <!-- FIN DE COL-LG-12  -->
</div> <!-- FIN DE ROW -->
</div> <!-- FIN DE WRAPPER  -->
<script>
    function preguntar(id) {
        if (confirm('Esta seguro que desea inactivar este usuario ' )){
            window.location.href = "../../../controlador/c_company_users/delete.php?id="+ id;
        }
    }
</script>

<script>
    function preguntarActivar(id) {
        if (confirm('Esta seguro que desea activar este usuario ' )){
            window.location.href = "../../../controlador/c_company_users/activar_user.php?id="+ id;
        }
    }
</script>