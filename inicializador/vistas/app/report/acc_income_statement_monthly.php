<?php
    require_once ("../../../datos/db/connect.php");
    $env    = new DBSTART;
    $cc     = $env::abrirDB();

    $userid = $_SESSION['usuario'];
    $sql = $cc->prepare("SELECT * FROM dp01a110 ");
    $sql->execute();  
    $fetch = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<div id="page-wrapper"><br />
    <div class="alert alert-info"><p>Accounting / Report / Income Statement Monthly </p></div>
    <div class="row">
        <div class="col-lg-4">
    <form action="../../../controlador/c_files/add_bank.php" method="post" class="form-horizontal">
        <fieldset>
            <legend class="mibread"><strong>Income statement Monthly</strong></legend>
            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Year</label>
                  <div class="col-md-8">
                        <input type="number" name="fdesde" class="form-control" />
                  </div>
            </div>
            <div class="modal-footer">
                <button style="float: left;" type="submit" name="register" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a></button>&nbsp;
                <button style="float: left;" type="reset" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a></button>
            </div>
        </fieldset>
    </form>
</div> <!-- FIN DE COL-LG-12  -->
</div> <!-- FIN DE ROW -->
</div> <!-- FIN DE WRAPPER  -->