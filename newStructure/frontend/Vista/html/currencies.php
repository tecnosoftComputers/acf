<div id="page-wrapper"><br />
    <div class="alert alert-info"><p>Operations / Files / Currencies / <?php echo $type; ?> <a style="float: right; color: #fff" href="<?php echo PUERTO."://".HOST.'/currenciesList/'; ?>">Volver</a></p></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-5">
                <div class="panel panel-default">

                    <div class="panel-body">

                        <form id="addForm" class="form-horizontal" method="post" action="<?php echo PUERTO."://".HOST.'/'.$view.'/'.Utils::encriptar($rows['IDMON']).'/'; ?>" onsubmit="return validarFormularioCurrencies()">

                            <fieldset>
                                <legend class="mibread"><strong>Currency</strong></legend>

                                <div class="form-group" id="seccion_number">
                                    <label class="col-md-4 control-label" for="type">Type: </label>
                                    <div class="col-md-8">
                                        <div id="err_number" class="help-block with-errors"></div>
                                        <input id="type" name="type" type="text" class="form-control input-sm" maxlength="11" value="<?php echo $rows['TIPO_MON']; ?>" />
                                    </div>
                                </div>

                                <div class="form-group" id="seccion_name">
                                    <label class="col-md-4 control-label" for="name">Name: </label>
                                    <div class="col-md-8">
                                        <div id="err_name" class="help-block with-errors"></div>
                                        <input id="name" name="name" type="text" class="form-control input-sm" maxlength="30" value="<?php echo $rows['NOMBREMON']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
                                    </div>
                                </div>

                                <div class="form-group" id="seccion_factor">
                                    <label class="col-md-4 control-label" for="factor">Factor: </label>
                                    <div class="col-md-8">
                                        <div id="err_factor" class="help-block with-errors"></div>
                                        <input id="factor" name="factor" type="text" class="form-control input-sm" maxlength="30" value="<?php echo $rows['FACTOR']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
                                    </div>
                                </div>

                                <div class="form-group" id="seccion_symbol">
                                    <label class="col-md-4 control-label" for="symbol">Symbol: </label>
                                    <div class="col-md-8">
                                        <div id="err_symbol" class="help-block with-errors"></div>
                                        <input id="symbol" name="symbol" type="text" class="form-control input-sm" maxlength="30" value="<?php echo $rows['SIMBOLO']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
                                    </div>
                                </div>

                                <div class="form-group" id="seccion_tenth">
                                    <label class="col-md-4 control-label" for="tenth">Tenth: </label>
                                    <div class="col-md-8">
                                        <div id="err_tenth" class="help-block with-errors"></div>
                                        <input id="tenth" name="tenth" type="text" class="form-control input-sm" maxlength="30" value="<?php echo $rows['DECIMA']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
                                    </div>
                                </div>

                                <div class="form-group" id="seccion_state">
                                    <label class="col-md-4 control-label" for="state">State</label>
                                    <div class="col-md-8">
                                        <div id="err_state" class="help-block with-errors"></div>
                                        <select class="form-control" id="state" name="state">
                                            <?php foreach ($state as $key => $value) {
                                                echo '<option value="'.$key.'"php';
                                                if($key == $rows['ESTADOMON']){
                                                    echo ' selected="selected"';
                                                }
                                                echo '>'.$value.'</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    
                                    <?php if($type == 'Update'){ ?>
                                        <input type="hidden" name="save" id="save" value="1">
                                        <button style="float: left;" type="submit" id="update" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                                        <span style="float: right"><a href="<?php echo PUERTO."://".HOST.'/currenciesList/'; ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
                                        &nbsp;
                                        <a id="clean" style="float: right; margin-right: 10px;" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a>
                                    <?php }else if($type == 'Delete'){ ?>
                                        <input type="hidden" name="save" id="save" value="1">
                                        <button style="float: left;" type="submit" id="delete" name="delete" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-remove"></span> Delete</button>
                                        <span style="float: right"><a href="<?php echo PUERTO."://".HOST.'/currenciesList/'; ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
                                        &nbsp;
                                    <?php }else{ ?>
                                        <input type="hidden" name="create" id="create" value="1">
                                        <button style="float: left;" type="submit" id="update" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                                        <span style="float: right"><a href="<?php echo PUERTO."://".HOST.'/currenciesList/'; ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
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