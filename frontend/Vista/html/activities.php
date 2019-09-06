<div id="page-wrapper"><br />
    <div class="alert alert-info"><p>Operations / Files / Activities / <?php echo $type; ?> <a style="float: right; color: #fff" href="<?php echo PUERTO."://".HOST.'/activitiesList/'; ?>">Back</a></p></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-5">
                <div class="panel panel-default">

                    <div class="panel-body">

                        <form id="addForm" class="form-horizontal" method="post" action="<?php echo PUERTO."://".HOST.'/'.$view.'/'.Utils::encriptar($rows['CODIGO']).'/'; ?>" onsubmit="return validarFormulario()">

                            <fieldset>
                                <legend class="mibread"><strong>Activity</strong></legend>

                                <div class="form-group" id="seccion_number">
                                    <label class="col-md-4 control-label" for="code">Code: </label>
                                    <div class="col-md-8">
                                        <div id="err_number" class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-2">
                                        <input id="code" name="code" type="text" class="form-control input-sm" maxlength="3" value="<?php echo $rows['CODIGO']; ?>" disabled="true" readonly="true" />
                                    </div>
                                </div>

                                <div class="form-group" id="seccion_name">
                                    <label class="col-md-4 control-label" for="name">Name: </label>
                                    <div class="col-md-8">
                                        <div id="err_name" class="help-block with-errors"></div>
                                        <input id="name" name="name" type="text" class="form-control input-sm" maxlength="30" value="<?php echo $rows['NOMBRE']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    
                                    <?php if($type == 'Update'){ ?>
                                        <input type="hidden" name="save" id="save" value="1">
                                        <button style="float: left;" type="submit" id="update" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                                        <span style="float: right"><a href="<?php echo PUERTO."://".HOST.'/activitiesList/'; ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
                                        &nbsp;
                                        <a id="clean" style="float: right; margin-right: 10px;" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a>
                                    <?php }else if($type == 'Delete'){ ?>
                                        <input type="hidden" name="save" id="save" value="1">
                                        <button style="float: left;" type="submit" id="delete" name="delete" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-remove"></span> Delete</button>
                                        <span style="float: right"><a href="<?php echo PUERTO."://".HOST.'/activitiesList/'; ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
                                        &nbsp;
                                    <?php }else{ ?>
                                        <input type="hidden" name="create" id="create" value="1">
                                        <button style="float: left;" type="submit" id="update" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                                        <span style="float: right"><a href="<?php echo PUERTO."://".HOST.'/activitiesList/'; ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
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
    </div>