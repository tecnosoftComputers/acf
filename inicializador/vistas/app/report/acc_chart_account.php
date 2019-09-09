<?php
    require_once ("../../../datos/db/connect.php");
    $env = new DBSTART;
    $cc = $env::abrirDB();

    $userid = $_SESSION['acfSession']['usuario'];
    $sql = $cc->prepare("SELECT distinct(CODIGO_AUX) FROM dp01a110");
    $sql->execute();
    $fetch = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    $stmt = $cc->prepare("SELECT * FROM dp01a110");
    $stmt->execute();
    $one = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<script type="text/javascript" src="../../js/files_chart_parameter.js"></script>
<div id="page-wrapper"><br />
<!-- MODAL  1 -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 750px; margin-left:-100px">
            <div class="modal-header">
                <h4>Plan de Cuentas</h4>
                <button type="button" class="close"  data-dismiss="modal">&times;</button>
            </div>
            
    <div class="modal-body">
        <div class="col-lg-12">
            <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body"> <!-- Nav tabs -->

                <!-- Tab panes -->  
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home-pills">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Cuenta</th>
                        <th>Nombre</th>
                        <th>Lock</th>
                    </tr>
                </thead>
                
    <tbody>
    <?php foreach( (array) $one as $registro2 ){ ?>
        <tr class="odd gradeX">
    <?php
        $var = $registro2['CODIGO'];
        $newvar = substr($var, -1);
        if ($newvar == '.'){ ?>
        <td><strong><?php echo $registro2['CODIGO']; ?></strong></td>
        <td><strong><?php echo $registro2['NOMBRE']; ?></strong></td>
        
        <?php }else{ ?>
            <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $registro2['CODIGO']; ?></td>
            <td><?php echo $registro2['NOMBRE']; ?></td>
            <?php echo '<td data-toggle="modal" data-target="#myModal"> <a href="javascript:editarProducto('.$registro2['AUX_PARAM'].');"><i class="fa fa-check"> Select</i></a></td>'; ?>                 
        <?php } ?>
        </tr>
    <?php } ?>
    </tbody>
                        
            </table>
        </div>
            </div>
        </div>
    </div>
</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="buttonClose">Close</button>
            </div>
        </div>
    </div>
</div> <!--  FIN MODAL 1 -->






    <div class="alert alert-info"><p>Accounting / Report / Chart of Accounts</p></div>
    <div class="row">
        <p>Ver general <a target="_blank" href="../../../datos/clases/pdf/plan_cuentas.php">Aqu&iacute;</a></p>
        <div class="col-lg-6">
    <form action="../../../datos/clases/pdf/plan_cuentas_param.php" method="post" class="form-horizontal" target="_blank">
        <fieldset>
        <legend class="mibread"><strong>Journal Entries Report</strong></legend>
            
            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Mostrar solo la cuenta:</label>
                  <div class="col-md-8">
                        <select class="form-control col-md-4" name="param">
                        <?php foreach ((array) $fetch as $sales) { ?>
                            <option><?php echo $sales['CODIGO_AUX'] ?></option>
                        <?php } ?>
                        </select>
                  </div>
            </div>
            
            <!--<div class="form-group">
                  <label class="control-label" for="name">Mostrar Listado </label>
                  <div class="col-md-6">
                      <input autocomplete="off" data-toggle="modal" data-target="#myModal" value="<?php echo $p_activo ?>" id="_activo" name="activo" type="text" class="form-control input-sm" />          
                  </div>
            </div>-->
            
            <div class="modal-footer">
                <button style="float: left;" type="submit" name="register" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a></button>&nbsp;
                <button style="float: left;" type="reset" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a></button>
                <span style="float: right"><a href="in.php?cid=dashboard/init" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
            </div>
        </fieldset>
    </form>
</div> <!-- FIN DE COL-LG-12  -->
</div> <!-- FIN DE ROW -->
</div> <!-- FIN DE WRAPPER  -->