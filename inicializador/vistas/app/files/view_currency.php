<?php
require_once FRONTEND_RUTA."datos/db/connect.php";
$env = new DBSTART;
$cc = $env::abrirDB();
?>

<script type="text/javascript" src="<?php echo PUERTO.'://'.HOST; ?>/js/cs_company_data.js"></script>
<div id="page-wrapper"><br />
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Accounting</li>
        <li class="breadcrumb-item">Files</li>
        <li class="breadcrumb-item active"> Currency</li>
    </ol>
</nav>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-pills">
                    <li class="active"><a href="#home-pills" data-toggle="tab"><i class="fa fa-list-alt"></i> List Currency</a></li>
                    <li><a href="#profile-pills" data-toggle="tab"><i class="fa fa-check"></i> New Currency</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home-pills"><br />              
                        <?php require_once FRONTEND_RUTA."controlador/c_files/c_list_currency.php"; ?>
                    </div>
                    
                    <!-- /. New Company -->
                    <div class="tab-pane fade" id="profile-pills"><br />
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-7">

                                        <form action="<?php echo PUERTO.'://'.HOST; ?>/controlador/c_files/add_currency.php" method="post" class="form-horizontal">
                                            <fieldset>
                                                <legend class="mibread"><strong>Currency</strong></legend>
                                                <div class="form-group">
                                                  <label class="col-md-4 control-label" for="name">Type Currency: </label>
                                                  <div class="col-md-8">
                                                    <input maxlength="3" autocomplete="off" name="type" type="text" class="form-control input-sm" />
                                                </div>
                                            </div>            

                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="name">Name Currency</label>
                                              <div class="col-md-8">
                                                <input autocomplete="off" id="_accountycode" name="name" type="text" class="form-control input-sm" />
                                            </div>
                                        </div>            

                                        <div class="form-group">
                                          <label class="col-md-4 control-label" for="name">Factor: </label>
                                          <div class="col-md-8">
                                            <input maxlength="50" autocomplete="off" name="factor" type="text" class="form-control input-sm" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-md-4 control-label" for="name">Simbolo: </label>
                                      <div class="col-md-8">
                                        <input maxlength="3" autocomplete="off" name="simbol" type="text" class="form-control input-sm" />
                                    </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="name">Decimal: </label>
                                  <div class="col-md-8">
                                    <input autocomplete="off" maxlength="4" name="decimal" type="text" class="form-control input-sm" />
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button style="float: left;" type="submit" name="register" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a></button>&nbsp;
                                <button style="float: left;" type="reset" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a></button>
                                <span style="float: right"><a href="#list-pills" data-toggle="tab" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
                            </div>
                        </fieldset>
                    </form> 
                </div><!-- FIN COL-LG-7-->

            </div> <!-- ./ F I N   R O W   F O R M -->


        </div> <!-- F I N  P A N E L   B O D Y -->
    </div>
</div> <!-- F I N   T A B  -->
</div> <!-- F I N     T A B    C O N T E N T -->
</div>
</div>
</div> <!-- col sm 12 -->
</div><!-- ROW -->
</div>
<script>
    function preguntar(id) {
        if (confirm('Esta seguro que desea eliminar ' + id + '?')){
            window.location.href = "<?php echo PUERTO.'://'.HOST; ?>/controlador/c_company_data/delete.php?id="+ id;
        }
    }
</script>

<script>
    function preguntarActivar(id) {
        if (confirm('Esta seguro que desea activar esta empresa ' )){
            window.location.href = "<?php echo PUERTO.'://'.HOST; ?>/controlador/c_company_data/activar_company.php?id="+ id;
        }
    }
</script>