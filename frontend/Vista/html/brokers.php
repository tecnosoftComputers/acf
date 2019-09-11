<div id="page-wrapper"><br />
    <div class="alert alert-info"><p>Operations / Files / Brokers / <?php echo $type; ?> <a style="float: right; color: #fff" href="<?php echo PUERTO."://".HOST.'/brokersList/'; ?>">Back</a></p></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form id="addForm" class="form-horizontal" method="post" action="<?php echo PUERTO."://".HOST.'/'.$view.'/'.Utils::encriptar($rows['NO_ID']).'/'; ?>" onsubmit="return validarFormulariobrokers()">

                            <fieldset>
                                <legend class="mibread"><strong>Broker</strong></legend>

                                <div class="form-row">
                                    <label for="name">Contact Information</label>
                                    <hr style="margin-top: 0px;">
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-8" id="seccion_name_inf">
                                        <label class="col-md-3 control-label" for="company_name">Name: </label>
                                        <div class="col-md-8">
                                            <div id="err_name_inf" class="help-block with-errors"></div>
                                            <input id="company_name" name="company_name" type="text" class="form-control input-sm" value="<?php echo $rows['NOM_CONY']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4" id="seccion_taxid">
                                        <label class="col-md-4 control-label" for="taxid">Tax Id: </label>
                                        <div class="col-md-8">
                                            <div id="err_taxid" class="help-block with-errors"></div>
                                            <input id="taxid" name="taxid" type="text" class="form-control input-sm" value="<?php echo $rows['TAXID']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                <br>

                                <div class="form-row">
                                    <label for="name">Bussiness Address</label>
                                    <hr style="margin-top: 0px;">
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6" id="seccion_addr">
                                        <label class="col-md-4 control-label" for="addr">Address: </label>
                                        <div class="col-md-8">
                                            <div id="err_addr" class="help-block with-errors"></div>
                                            <textarea id="addr" name="addr" col="2" rows="7" class="form-control input-sm" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>><?php echo $rows['DIRDOM']; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6" id="seccion_email">
                                        <label class="col-md-4 control-label" for="phone">Email: </label>
                                        <div class="col-md-8">
                                            <div id="err_email" class="help-block with-errors"></div>
                                            <input id="email" name="email" type="text" class="form-control input-sm" value="<?php echo $rows['EMAIL']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6" id="seccion_city">
                                        <label class="col-md-4 control-label" for="city">City: </label>
                                        <div class="col-md-8">
                                            <div id="err_city" class="help-block with-errors"></div>
                                            <input id="city" name="city" type="text" class="form-control input-sm" value="<?php echo $rows['CIUDAD']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6" id="seccion_state">
                                        <label class="col-md-4 control-label" for="state">State: </label>
                                        <div class="col-md-8">
                                            <div id="err_state" class="help-block with-errors"></div>
                                            <input id="state" name="state" type="text" class="form-control input-sm" value="<?php echo $rows['STATE']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6" id="seccion_country">
                                        <label class="col-md-4 control-label" for="country">Country: </label>
                                        <div class="col-md-8">
                                            <div id="err_country" class="help-block with-errors"></div>
                                            <input id="country" name="country" type="text" class="form-control input-sm" value="<?php echo $rows['COUNTRY']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6" id="seccion_zip">
                                        <label class="col-md-4 control-label" for="zip">Zip code: </label>
                                        <div class="col-md-8">
                                            <div id="err_zip" class="help-block with-errors"></div>
                                            <input id="zip" name="zip" type="text" class="form-control input-sm" value="<?php echo $rows['ZIPCODE']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6" id="seccion_phone">
                                        <label class="col-md-4 control-label" for="phone">Phone: </label>
                                        <div class="col-md-8">
                                            <div id="err_phone" class="help-block with-errors"></div>
                                            <input id="phone" name="phone" type="text" class="form-control input-sm" value="<?php echo $rows['TELEFONO']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
                                        </div>
                                    </div>

                                </div>

                                <div class="clearfix"></div>
                                <br>

                                <div class="form-row">
                                    <label for="name">Financial Information</label>
                                    <hr style="margin-top: 0px;">
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6" id="seccion_brok">
                                        <label class="col-md-7 control-label" for="name">% P. Broker Commision: </label>
                                        <div class="col-md-5">
                                            <div id="err_brok" class="help-block with-errors"></div>
                                            <input id="brok" name="brok" type="text" class="form-control input-sm" value="" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                <br>
                            </fieldset>

                            <div class="modal-footer">
                                <?php if($type == 'Update'){ ?>
                                    <input type="hidden" name="save" id="save" value="1">
                                    <button style="float: left;" type="submit" id="update" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a></button>
                                    <span style="float: right"><a href="<?php echo PUERTO."://".HOST.'/brokersList/'; ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
                                    &nbsp;
                                    <a id="clean" style="float: right; margin-right: 10px;" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a>
                                <?php }else if($type == 'Delete'){ ?>
                                    <input type="hidden" name="save" id="save" value="1">
                                    <button style="float: left;" type="submit" id="delete" name="delete" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-remove"></span> Delete</a></button>
                                    <span style="float: right"><a href="<?php echo PUERTO."://".HOST.'/brokersList/'; ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
                                    &nbsp;
                                <?php }else{ ?>
                                    <input type="hidden" name="create" id="create" value="1">
                                    <button style="float: left;" type="submit" id="update" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a></button>
                                    <span style="float: right"><a href="<?php echo PUERTO."://".HOST.'/brokersList/'; ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
                                    &nbsp;
                                    <a id="clean" style="float: right; margin-right: 10px;" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a>
                                <?php } ?>
                            </div>
                        </form>
                    </div>
                </div><br />
            </div>
        </div>
    </div>
</div>