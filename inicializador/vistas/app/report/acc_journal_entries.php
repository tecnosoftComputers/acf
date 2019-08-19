<?php
    require_once ("../../../datos/db/connect.php");
    $env = new DBSTART;
    $cc = $env::abrirDB();

    $sql = $cc->prepare("SELECT * FROM dp01a110 ");
    $sql->execute();
    $fetch = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    $sql2 = $cc->prepare("SELECT * FROM DPNUMERO ");
    $sql2->execute();
    $fetch2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
?>

<script src="../../../jquery/jquery-1.5.1.min.js"></script>
<script src="../../../jquery/jquery-1.12.1.min.js"></script>
<script src="../../../query/jquery-ui.js"></script>
<div id="page-wrapper"><br />
    <div class="alert alert-info"><p>Accounting / Report / Journal Entries</p></div>
    <div class="row">
        <div class="col-lg-6">
    <form action="../../../datos/clases/pdf/rp_journal_entries_report.php" method="post" class="form-horizontal" target="_blank">
        <fieldset>
            <legend class="mibread"><strong>Journal Entries Report</strong></legend>
            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Fecha desde</label>
                  <div class="col-md-8">
                        <input type="date" name="fdesde" class="form-control" />
                  </div>
            </div>
            
            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Fecha Hasta</label>
                  <div class="col-md-8">
                    <input type="date" name="fhasta"class="form-control" />  
                  </div>
            </div>
            
            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Asiento desde</label>
                  <div class="col-md-2">
                    <select name="adesde" class="form-control">
                        <?php foreach((array) $fetch2 as $val ){ ?>
                            <option><?php echo $val['TIPO_ASI'] ?></option>
                        <?php } ?>
                    </select>
                  </div>
                  
                  <div class="col-md-6">
                    <input type="text" autocomplete="off" id="one" name="ndesde" class="form-control" />
                  </div>
            </div>
            
            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Asiento Hasta</label>
                  <div class="col-md-2">
                    <select name="ahasta" class="form-control">
                        <?php foreach((array) $fetch2 as $val ){ ?>
                            <option><?php echo $val['TIPO_ASI'] ?></option>
                        <?php } ?>
                    </select>
                  </div>
                  
                  <div class="col-md-6">
                    <input type="text" autocomplete="off" id="two" name="nhasta" class="form-control" />
                  </div>
            </div>

            <div class="modal-footer">
                <button style="float: left;" type="submit" name="register" class="btn btn-primary"><i class="fa fa-eye"></i> Save</a></button>&nbsp;
                <button style="float: left;" type="reset" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a></button>
                <span style="float: right"><a href="in.php?cid=dashboard/init" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
            </div>
        </fieldset>
    </form> 
</div> <!-- FIN DE COL-LG-12  -->
</div> <!-- FIN DE ROW -->
</div> <!-- FIN DE WRAPPER  -->

<script src="http://code.jquery.com/jquery-1.0.4.js"></script>
<script>
      $(document).ready(function () {
          $("#one").keyup(function () {
              var value = $(this).val();
              $("#two").val(value);
          });
      });
</script>