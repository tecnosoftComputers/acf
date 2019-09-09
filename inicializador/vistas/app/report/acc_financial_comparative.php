<?php
    require_once ("../../../datos/db/connect.php");
    $env    = new DBSTART;
    $cc     = $env::abrirDB();

    $userid = $_SESSION['acfSession']['usuario'];
    $sql = $cc->prepare("SELECT * FROM dp01a110 ");
    $sql->execute();  
    $fetch = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<div id="page-wrapper"><br />
    <div class="alert alert-info"><p>Accounting / Report / Financial Comparative Report </p></div>
    <div class="row">
        <div class="col-lg-6">
    <form action="../../../controlador/c_files/add_bank.php" method="post" class="form-horizontal">
        <fieldset>
            <legend class="mibread"><strong>Financial Comparative Report</strong></legend>
            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Cuenta Desde</label>
                  <div class="col-md-8">
                        <input type="text" name="fdesde" class="form-control" />
                  </div>
            </div>
            
            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Cuenta Hasta</label>
                  <div class="col-md-8">
                    <input type="text" name="fhasta"class="form-control" />  
                  </div>
            </div>

            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Fecha 1</label>
                  <div class="col-md-8">
                    <input type="date" name="fecha1"class="form-control" />  
                  </div>
            </div>
            
            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Fecha 2</label>
                  <div class="col-md-8">
                    <input type="date" name="fecha2"class="form-control" />  
                  </div>
            </div>
            
            <div class="form-group">
                  <label class="col-md-4 control-label" for="name"></label>
                  <div class="col-md-8">
                    <input type="radio" name="mensual" /> Mensual <br />
                    <input type="radio" name="acum" /> Acumulado  
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