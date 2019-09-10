<script src="../../jquery/jquery-1.11.0.min.js"></script>
<?php
    require_once ("../../../datos/db/connect.php");
    $env = new DBSTART;
    $cc = $env::abrirDB();

    $usuario = $_SESSION['acfSession']['correo'];
    
    $sql = $cc->prepare("SELECT * FROM tab_asientos");
    $sql->execute();
    $all = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<div id="page-wrapper"><br />
    <div class="alert alert-info"><p>Accounting / Files / Voucher</p></div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-pills">
                    <li class="active"><a href="#home-pills" data-toggle="tab"><i class="fa fa-th-list"></i> View Voucher</a></li>
                    <li><a href="#profile-pills" data-toggle="tab"><i class="fa fa-plus-square-o"></i> New Voucher</a></li>
                </ul><br>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home-pills">
                        <?php require_once ("../../../controlador/c_files/vouchers_list.php"); ?>
                    </div>
                <div class="tab-pane fade" id="profile-pills"><br />
                <div class="col-lg-6">
                <fieldset>
                <legend class="mibread"><strong>Voucher</strong></legend>
                
    <form id="addForm" class="form-horizontal" method="post" action="../../../controlador/c_files/add_vouchers.php">
        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Type of accounty entry: </label>
              <div class="col-md-8">
                <input maxlength="4" style="width: 60px;" name="entry" type="text" class="form-control input-sm" required="" autocomplete="off" />
              </div>
        </div>
        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Name: </label>
              <div class="col-md-8">
                <input name="name" type="text" class="form-control input-sm" autocomplete="off" />
              </div>
        </div>
            
        <!--<div class="form-group">
              <label class="col-md-4 control-label" for="name">Number: </label>
              <div class="col-md-8">
                <input autocomplete="off" name="number" type="text" class="form-control input-sm" onkeypress="return soloNumeros(event)" />
              </div>
        </div>-->
        
        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Print: </label>
              <div class="col-md-8">
                <input name="print" type="text" class="form-control input-sm" autocomplete="off" />
              </div>
        </div>
        
        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Classification: </label>
              <div class="col-md-8">
                <select class="form-control" name="idasi">
                    <?php foreach ((array)  $all as $data ) { ?>
                        <option value="<?php echo $data['codasi'] ?>"><?php echo $data['nomasi'] ?></option>
                    <?php } ?>
                </select>
              </div>
        </div>
                
        <div class="modal-footer">
            <button  style="float:left" type="submit" name="register" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
            <button  style="float:right" type="reset" class="btn btn-success"><span class="fa fa-reload"></span> Clean</a>
            <button style="float: right;" href="#home-pills" data-toggle="tab" type="reset" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-clear"></span> Exit</a>
        </div>
    </form>
    </fieldset>
    </div>
                </div>
            </div>     
        </div>
    </div>
</div>
 
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