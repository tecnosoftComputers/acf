
<?php 
    /********************************************
        VISTA VIEW_CHART_PARAMETER
        Desarrollado por: Fernando Reyes
        Fecha: 17/07/2019
    **********************************************/
    
?>
<style> .not-active {cursor: not-allowed;} </style>

<?php
    require_once ("../../../datos/db/connect.php");
    $env = new DBSTART;
    $cc = $env::abrirDB();
    
    $userid = $_SESSION['acfSession']['usuario'];
    $sql = $cc->prepare("SELECT * FROM usuarios WHERE id_usuario='$userid' AND estado='A' ");
    $sql->execute();
    $fetch = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ((array )$fetch as $results){
        $laid = $results['id_usuario'];
        $username = $results['namesurname'];
    }
    
    $stmt = $cc->prepare("SELECT * FROM dp01a110 ");
    $stmt->execute();
    $one = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Cargar dasbal
    $das = $cc->prepare("SELECT * FROM dasbal");
    $das->execute();
    $all_das = $das->fetchAll(PDO::FETCH_ASSOC);
    $cant_das = $das->rowCount();
    
    foreach((array) $all_das as $vale) {
        $p_activo       = $vale['ACTIVO'];
        $p_pasivo       = $vale['PASIVO'];
        $p_capital      = $vale['CAPITAL'];
        $p_ingresos     = $vale['INGRESOS'];
        $p_egresos      = $vale['EGRESOS'];
        $p_ordenactivo  = $vale['ORD_ACTIVO'];
        $p_orden_pasivo = $vale['ORD_PASIVO'];
        
        $p_results      = $vale['RESULTADOD'];
        $p_results_a    = $vale['RESULTADOA'];
        $p_acum_d       = $vale['ACUMULADOD'];
        $p_acum_a       = $vale['ACUMULADOA'];
        $p_manejo_db    = $vale['MANEJODB'];   
        $p_manejo_cr    = $vale['MANEJOCR'];    
        $p_manejo_por   = $vale['MANEJOPOR'];
    }
?>

<script type="text/javascript" src="../../js/files_chart_parameter.js"></script>
<script type="text/javascript" src="../../js/jsFunctions.js"></script>
<div id="page-wrapper"><br />
<!-- MODAL  1 -->

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 750px; margin-left:-100px">
        
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Plan de Cuentas</h4>
            </div>
            
            <div class="modal-body"  style="height:500px;overflow:auto;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                           <div class="tab-content">
                                <div class="tab-pane fade in active" id="home-pills">
                                    <table id="accounts" class="display table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Number</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="contentBody">
                                            
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


    <div class="alert alert-info"><p>Accounting / Files / Chart of accounts parameter</p></div>
    <div class="row">
        <div class="col-lg-12">
        <!--<button style="float: right;" data-toggle="modal"  data-target="#myModal" class="btn btn-info"> <i class="fa fa-sort-amount-desc"></i> Ver Plan de Cuentas</button>-->

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="tab-content"> <!-- Tab panes -->
                <div class="tab-pane fade in active" id="list-pills"><br />
                    <div class="col-lg-12">
                        <form id="formulario" action="../../../controlador/c_files/add_parameter.php" method="post" class="form-horizontal">
                            <fieldset>
                                <legend class="mibread" style="text-align: center;"><strong>Chart of accounts parameter</strong></legend>
                                <input type="hidden" required="required" readonly="readonly" id="pro" name="pro"/>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-md-4 control-label" for="name">Activo </label>
                                        <div class="col-md-8">
                                            <div class="input-group"> 
                                                <input readonly="" autocomplete="off" value="<?php echo $p_activo ?>" id="_activo" name="activo" type="text" class="form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('_activo',true,true)" ><span style="padding-top: 3px; padding-bottom: 3px" class="glyphicon glyphicon-search"></span></button> 
                                                </span> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="col-md-4 control-label" for="name">Pasivo</label>
                                        <div class="col-md-8">
                                            <div class="input-group"> 
                                                <input readonly="" autocomplete="off" value="<?php echo $p_pasivo ?>" id="_pasivo" name="pasivo" type="text" class="form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('_pasivo',true,true)" ><span style="padding-top: 3px; padding-bottom: 3px" class="glyphicon glyphicon-search"></span></button> 
                                                </span> 
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-md-4 control-label" for="name">Capital </label>
                                        <div class="col-md-8">
                                            <div class="input-group"> 
                                                <input readonly="" autocomplete="off" value="<?php echo $p_capital ?>" id="_capital" name="capital" type="text" class="form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('_capital',true,true)" ><span style="padding-top: 3px; padding-bottom: 3px" class="glyphicon glyphicon-search"></span></button> 
                                                </span> 
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="form-group col-md-6">
                                        <label class="col-md-4 control-label" for="name">Ingresos</label>
                                        <div class="col-md-8">
                                            <div class="input-group"> 
                                                <input readonly="" autocomplete="off" value="<?php echo $p_ingresos ?>" id="_ingresos" name="ingresos" type="text" class="form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('_ingresos',true,true)" ><span style="padding-top: 3px; padding-bottom: 3px" class="glyphicon glyphicon-search"></span></button> 
                                                </span> 
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-md-4 control-label" for="name">Egresos </label>
                                        <div class="col-md-8">
                                            <div class="input-group"> 
                                                <input readonly="" autocomplete="off" value="<?php echo $p_egresos ?>" id="_egresos" name="egresos" type="text" class="form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('_egresos',true,true)" ><span style="padding-top: 3px; padding-bottom: 3px" class="glyphicon glyphicon-search"></span></button> 
                                                </span> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="col-md-4 control-label" for="name">Orden Activo</label>
                                        <div class="col-md-8">
                                            <div class="input-group"> 
                                                <input readonly="" autocomplete="off" value="<?php echo $p_ordenactivo ?>" id="_orden_activo" name="orden_activo" type="text" class="form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('_orden_activo',true,true)" ><span style="padding-top: 3px; padding-bottom: 3px" class="glyphicon glyphicon-search"></span></button> 
                                                </span> 
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-md-4 control-label" for="name">Orden Pasivo </label>
                                        <div class="col-md-8">
                                            <div class="input-group"> 
                                                <input readonly="" autocomplete="off" value="<?php echo $p_orden_pasivo ?>" id="_orden_pasivo" name="orden_pasivo" type="text" class="form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('_orden_pasivo',true,true)" ><span style="padding-top: 3px; padding-bottom: 3px" class="glyphicon glyphicon-search"></span></button> 
                                                </span> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="col-md-4 control-label" for="name">Resultado Deudora</label>
                                        <div class="col-md-8">
                                            <div class="input-group"> 
                                                <input readonly="" autocomplete="off" value="<?php echo $p_results ?>" id="_rd" name="rs_deudora" type="text" class="form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('_rd',true,true)" ><span style="padding-top: 3px; padding-bottom: 3px" class="glyphicon glyphicon-search"></span></button> 
                                                </span> 
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-md-4 control-label" for="name">Resultado Acreedora </label>
                                        <div class="col-md-8">
                                            <div class="input-group"> 
                                                <input readonly="" autocomplete="off" value="<?php echo $p_results_a ?>" id="_ra" name="rs_acreedora" type="text" class="form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('_ra',true,true)" ><span style="padding-top: 3px; padding-bottom: 3px" class="glyphicon glyphicon-search"></span></button> 
                                                </span> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="col-md-4 control-label" for="name">Resultado Deudora</label>
                                        <div class="col-md-8">
                                            <div class="input-group"> 
                                                <input readonly="" autocomplete="off" value="<?php echo $p_acum_d ?>" id="_ad" name="acum_deudora" type="text" class="form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('_ad',true,true)" ><span style="padding-top: 3px; padding-bottom: 3px" class="glyphicon glyphicon-search"></span></button> 
                                                </span> 
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-md-4 control-label" for="name">Acumulado Acreedora </label>
                                        <div class="col-md-8">
                                            <div class="input-group"> 
                                                <input readonly="" autocomplete="off" value="<?php echo $p_acum_a ?>" id="_aa" name="acum_acree" type="text" class="form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('_aa',true,true)" ><span style="padding-top: 3px; padding-bottom: 3px" class="glyphicon glyphicon-search"></span></button> 
                                                </span> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="col-md-4 control-label" for="name">Management Deudora</label>
                                        <div class="col-md-8">
                                            <div class="input-group"> 
                                                <input readonly=""  autocomplete="off" value="<?php echo $p_manejo_db ?>" id="_md" name="man_deudora" type="text" class="form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('_md',true,true)" ><span style="padding-top: 3px; padding-bottom: 3px" class="glyphicon glyphicon-search"></span></button> 
                                                </span> 
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-md-4 control-label" for="name">Management Acreedora </label>
                                        <div class="col-md-8">
                                            <div class="input-group"> 
                                                <input readonly="" autocomplete="off" value="<?php echo $p_manejo_cr ?>" id="_ma" name="man_acreedora" type="text" class="form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('_ma',true,true)" ><span style="padding-top: 3px; padding-bottom: 3px" class="glyphicon glyphicon-search"></span></button> 
                                                </span> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="col-md-4 control-label" for="name">Management Porcentaje</label>
                                        <div class="col-md-8">
                                            <div class="input-group"> 
                                                <input readonly="" autocomplete="off" value="<?php echo $p_manejo_por ?>" id="_mp" name="porcentaje" type="text" class="form-control"> 
                                                <span class="input-group-btn"> 
                                                    <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('_mp',true,true)" ><span style="padding-top: 3px; padding-bottom: 3px" class="glyphicon glyphicon-search"></span></button> 
                                                </span> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="modal-footer">
            <?php if ( $cant_das == 0 ) { ?>
            <button id="lacruz" style="float: left;" type="submit" name="register" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a></button>&nbsp;
            <?php }else{ ?>
            <button id="lacruz" style="float: left;" type="submit" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a></button>&nbsp;
            <?php } ?>
            <a href="in.php?cid=dashboard/init" style="float: right;" type="reset" class="btn btn-warning"><span class="fa fa-repeat"></span> Exit</a></a>
        </div>
                            </fieldset>
                        </form>
                    </div>
                </div> <!-- FIN DE TIPOS DE ASIENTOS -->
            </div> <!-- FIN DE TAB CONTENT-->
        </div> <!-- FIN DE PANEL BODY -->
       
    </div> <!-- FIN DE PANEL DEFAULT -->
    
</div> <!-- FIN DE COL-LG-12  -->
</div> <!-- FIN DE ROW -->
</div> <!-- FIN DE WRAPPER  -->