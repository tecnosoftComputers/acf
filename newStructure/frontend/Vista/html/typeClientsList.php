<div id="page-wrapper"><br />
    <div class="alert alert-info"><p>Operations / Files / System Charts / Customers Status <a style="float: right; color: #fff" href="<?php echo PUERTO."://".HOST.'/systemChartsList/'; ?>">Volver</a></p></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body" style="height: 500px; overflow: auto;">
                    
                    <div id="export" <?php if($error){ echo 'style="display:none"'; } ?>>
                        <span id="pdf" style="float: right; margin-left: 10px"><a href="<?php echo PUERTO."://".HOST.'/typeClientsReport/excel/'; ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a></span>
                        <span id="excel" style="float: right"><a href="<?php echo PUERTO."://".HOST.'/typeClientsReport/pdf/'; ?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a></span>
                    </div>
                    
                    <ul class="nav nav-pills">
                        <li <?php if(!$error){ echo 'class="active"'; } ?>><a id="list" href="#home-pills" data-toggle="tab"><i class="fa fa-th-list"></i> List Customers Status</a></li>
                        <li style="width: auto;" <?php if($error){ echo 'class="active"'; } ?>><a id="new" href="#form-pills" data-toggle="tab"><i class="fa fa-plus-square-o"></i> New State</a></li>
                    </ul>

                    <!-- Tab panes -->  
                    <div class="tab-content">
                        <div class="tab-pane fade <?php if(!$error){ echo 'in active'; } ?>" id="home-pills">
                            <br>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="typeClients">
                                <thead>
                                    <tr>
                                        <th align="center" width=220>Code</th>
                                        <th align="center" >Name</th>
                                        <th align="center" width=220>Update</th>
                                        <th align="center" width=220>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach( (array) $typeClients as $registro2 ){ ?>
                                        <tr class='odd gradeX' data-toggle="collapse" data-target="#demo<?php echo $registro2['codtipo']; ?>" class="accordion-toggle">
                                            <td><?php echo $registro2['codtipo'] ?></td>
                                            <td><?php echo $registro2['nomtipo'] ?></td>
                                            <td align="center"><a href="<?php echo PUERTO."://".HOST.'/typeClientsUpdate/'.Utils::encriptar($registro2['codtipo']).'/'; ?>"><i class="fa fa-edit"></i></a></td>
                                            <td align="center"><a href="<?php echo PUERTO."://".HOST.'/typeClientsDelete/'.Utils::encriptar($registro2['codtipo']).'/'; ?>"><i class="fa fa-trash"></i></a></td>    
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade <?php if($error){ echo 'in active'; } ?>" id="form-pills">
                            <br>
                            <div class="col-lg-5">
                                <div class="panel panel-default">

                                    <div class="panel-body">

                                        <form id="addForm" class="form-horizontal" method="post" action="<?php echo PUERTO."://".HOST.'/'.$view.'/'; ?>" onsubmit="return validarFormulario()">

                                            <fieldset>
                                                <legend class="mibread"><strong>State</strong></legend>

                                                <div class="form-group" id="seccion_name">
                                                    <label class="col-md-4 control-label" for="name">Name: </label>
                                                    <div class="col-md-8">
                                                        <div id="err_name" class="help-block with-errors"></div>
                                                        <input id="name" name="name" type="text" class="form-control input-sm" maxlength="30" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    
                                                    <?php if($type == 'Update'){ ?>
                                                        <input type="hidden" name="save" id="save" value="1">
                                                        <button style="float: left;" type="submit" id="update" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                                                        <span style="float: right"><a href="<?php echo PUERTO."://".HOST.'/typeClientsList/'; ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
                                                        &nbsp;
                                                        <a id="clean" style="float: right; margin-right: 10px;" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a>
                                                    <?php }else if($type == 'Delete'){ ?>
                                                        <input type="hidden" name="save" id="save" value="1">
                                                        <button style="float: left;" type="submit" id="delete" name="delete" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-remove"></span> Delete</button>
                                                        <span style="float: right"><a href="<?php echo PUERTO."://".HOST.'/typeClientsList/'; ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
                                                        &nbsp;
                                                    <?php }else{ ?>
                                                        <input type="hidden" name="create" id="create" value="1">
                                                        <button style="float: left;" type="submit" id="update" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                                                        <span style="float: right"><a href="<?php echo PUERTO."://".HOST.'/typeClientsList/'; ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
                                                        &nbsp;
                                                        <a id="clean" style="float: right; margin-right: 10px;" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a>
                                                    <?php } ?>
                                                </div>

                                            </fieldset>
                                        </form>
                                    </div>
                                </div><br />
                            </div>
                        </div>
                    </div><!-- FIN TAB CONTENT -->
                </div>
            </div>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
</div>