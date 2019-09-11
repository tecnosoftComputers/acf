<div id="page-wrapper"><br />
    <div class="alert alert-info"><p>Operations / Files / Parameter Control <a style="float: right; color: #fff" href="<?php echo PUERTO."://".HOST.'/dashboard/'; ?>">Back</a></p></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-5">
                <div class="panel panel-default">

                    <div class="panel-body">

                        <form id="addForm" class="form-horizontal" method="post" action="<?php echo PUERTO."://".HOST.'/parameterControl/'; ?>" onsubmit="return validarFormulario()">

                            <fieldset>
                                <legend class="mibread"><strong>Parameter Control</strong></legend>

                                <div class="form-group" id="seccion_param">
                                    <label class="col-md-4 control-label" for="param">More Leanding: </label>
                                    <div class="col-md-3 input-group">
                                        <div id="err_param" class="help-block with-errors"></div>
                                        <input id="param" name="param" type="text" class="form-control input-sm" maxlength="8" value="<?php echo $parameters['MORE']; ?>"/>
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>
                            </fieldset> 

                            <div class="modal-footer">
                                <button style="float: left;" type="submit" id="update" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                                <span style="float: right"><a href="<?php echo PUERTO."://".HOST.'/dashboard/'; ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
                                    &nbsp;
                            </div>
                        </form>
                    </div>
                </div><br />
            </div>
        </div>
    </div>