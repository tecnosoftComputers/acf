<?php
    require_once ("../../../datos/db/connect.php");
    $env = new DBSTART;
    $cc = $env::abrirDB();
?>

<?php
    $userid = $_SESSION['acfSession']['usuario'];
    $sql = $cc->prepare("SELECT * FROM dp01a110 ");
    $sql->execute();
    
    $fetch = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<div id="page-wrapper"><br />
    <div class="alert alert-info"><p>Accounting / Processes / Add - Edit Ledger Accounts</p></div>
    <div class="row">
        <div class="col-lg-6">
    <form action="../../../controlador/c_files/add_bank.php" method="post" class="form-horizontal">
        <fieldset>
        <legend class="mibread"><strong>Add ~ Edit Ledger Accounts</strong></legend>
            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Cuenta Anterior</label>
                  <div class="col-md-8">
                    <select class="form-control" name="account_antigua">
                        <?php foreach ((array) $fetch as $acc) { ?>
                            <option><?php echo $acc['CODIGO'].' | '.$acc['NOMBRE'] ?></option>
                        <?php } ?>
                    </select>
                  </div>
            </div>
            
            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Cuenta Nueva</label>
                  <div class="col-md-8">
                    <select class="form-control" name="account_nueva">
                        <?php foreach ((array) $fetch as $acc) { ?>
                            <option><?php echo $acc['CODIGO'].' '.$acc['NOMBRE'] ?></option>
                        <?php } ?>
                    </select>  
                  </div>
            </div>                   

            <div class="modal-footer">
                <button style="float: left;" type="submit" name="register" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a></button>&nbsp;
                <button style="float: left;" type="reset" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a></button>
                <span style="float: right"><a href="#list-pills" data-toggle="tab" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
            </div>
        </fieldset>
    </form> 
</div> <!-- FIN DE COL-LG-12  -->
</div> <!-- FIN DE ROW -->
</div> <!-- FIN DE WRAPPER  -->