<style>
    
    .inputs_small{
        padding-left: 0px;
        padding-right: 0px;
        width: 22px;
        text-align:center;
    }

</style>
<div id="page-wrapper"><br />
    <div class="alert alert-info"><p>Operations / Files / Products Parameters / <?php echo $type; ?> <a style="float: right; color: #fff" href="<?php echo PUERTO."://".HOST.'/productsParametersList/'; ?>">Back</a></p></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-8">
                <div class="panel panel-default">

                    <div class="panel-body">

                        <form id="addForm" class="form-horizontal" method="post" action="<?php echo PUERTO."://".HOST.'/'.$view.'/'.Utils::encriptar($rows['PRODUCTO']).'/'; ?>" onsubmit="return validarFormulario()">

                            <fieldset>
                                <legend class="mibread"><strong>Parameter</strong></legend>

                                <div class="form-group col-md-12" id="seccion_product">
                                    <label class="col-md-4 control-label" for="product">Product: </label>

                                    <div class="col-md-2">
                                        <div id="err_product" class="help-block with-errors"></div>
                                        <input style="width: 50px;" id="product" name="product" type="text" class="form-control input-sm" maxlength="3" value="<?php echo $rows['PRODUCTO']; ?>" disabled readonly/>
                                    </div>
                                </div>

                                <div class="form-group col-md-12" id="seccion_nombre">
                                    <label class="col-md-4 control-label" for="nombre">Name: </label>
                                    <div class="col-md-8">
                                        <div id="err_nombre" class="help-block with-errors"></div>
                                        <input id="nombre" name="nombre" type="text" class="form-control input-sm" maxlength="30" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?> value="<?php echo $rows['NOMBRE']; ?>"/>
                                    </div>
                                </div>

                                <div class="col-md-offset-4 form-group col-md-12" id="seccion_currency">
                                    <label class="col-md-4 control-label" for="currency">Currency: </label>
                                    <div class="col-md-8">
                                        <div id="err_currency" class="help-block with-errors"></div>
                                        <select class="form-control" id="currency" name="currency" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>>
                                            <option value="0" disabled >Select an option</option>
                                            <?php foreach ( $currency as $key => $value ){ 
                                                echo '<option value="'.$value['TIPO_MON'].'"';
                                                if($rows['MONEDA'] == $value['TIPO_MON']){
                                                    echo ' selected';
                                                }
                                                echo '>'.$value['TIPO_MON'].' - '.$value['NOMBREMON'].'</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <div class="col-md-offset-3 col-md-10">

                                        <div class="form-group col-md-3" id="seccion_int">
                                            <label class="col-md-7 control-label" for="int">Interest: </label>
                                            <div class="col-md-1">
                                                <div id="err_int" class="help-block with-errors"></div>
                                                <input id="int" name="int" type="text" class="form-control input-sm inputs_small" maxlength="1" value="<?php echo $rows['INTERES']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>

                                            </div>
                                        </div>

                                        <div class="form-group col-md-4" id="seccion_com">
                                            <label class="col-md-6 control-label" for="com">Commision: </label>
                                            <div class="col-md-1">
                                                <div id="err_com" class="help-block with-errors"></div>
                                                <input id="com" name="com" type="text" class="form-control input-sm inputs_small" maxlength="1" value="<?php echo $rows['COMISION']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>

                                            </div>
                                        </div>

                                        <div class="form-group col-md-3" id="seccion_ins">
                                            <label class="col-md-5 control-label" for="ins">Insure: </label>
                                            <div class="col-md-1">
                                                <div id="err_ins" class="help-block with-errors"></div>
                                                <input id="ins" name="ins" type="text" class="form-control input-sm inputs_small" maxlength="1" value="<?php echo $rows['SEGUROS']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>

                                            </div>
                                        </div> 

                                        <div class="form-group col-md-4" id="seccion_wire">
                                            <label class="col-md-7 control-label" for="wire">Wire fee: </label>
                                            <div class="col-md-1">
                                                <div id="err_wire" class="help-block with-errors"></div>
                                                <input id="wire" name="wire" type="text" class="form-control input-sm inputs_small" maxlength="1" value="<?php echo $rows['TRANSFERE']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
                                            </div>
                                        </div> 
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <div class="col-md-offset-3 col-md-10">

                                        <div class="form-group col-md-3" id="seccion_desc">
                                            <label class="col-md-7 control-label" for="desc">Discount: </label>
                                            <div class="col-md-1">
                                                <div id="err_desc" class="help-block with-errors"></div>
                                                <input id="desc" name="desc" type="text" class="form-control input-sm inputs_small" maxlength="1" value="<?php echo $rows['DESCUENTO']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4" id="seccion_otro">
                                            <label class="col-md-6 control-label" for="otro">Other: </label>
                                            <div class="col-md-1">
                                                <div id="err_otro" class="help-block with-errors"></div>
                                                <input id="otro" name="otro" type="text" class="form-control input-sm inputs_small" maxlength="1" value="<?php echo $rows['OTROS']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3" id="seccion_otro2">
                                            <label class="col-md-5 control-label" for="otro2">Other2: </label>
                                            <div class="col-md-1">
                                                <div id="err_otro2" class="help-block with-errors"></div>
                                                <input id="otro2" name="otro2" type="text" class="form-control input-sm inputs_small" maxlength="1" value="<?php echo $rows['OTROS2']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <div class="col-md-offset-3 col-md-10">

                                        <div class="form-group col-md-6" id="seccion_clie">
                                            <label class="col-md-9 control-label" for="clie">Customer analysis cost: </label>
                                            <div class="col-md-1">
                                                <div id="err_clie" class="help-block with-errors"></div>
                                                <input id="clie" name="clie" type="text" class="form-control input-sm inputs_small" maxlength="1" value="<?php echo $rows['COSTCLIEN']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6" id="seccion_mark">
                                            <label class="col-md-10 control-label" for="mark">Marketing conmission fees: </label>
                                            <div class="col-md-1">
                                                <div id="err_mark" class="help-block with-errors"></div>
                                                <input id="mark" name="mark" type="text" class="form-control input-sm inputs_small" maxlength="1" value="<?php if($rows['MARKETING']=='0'){ echo ''; }else{ echo $rows['MARKETING']; } ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12" id="seccion_type">
                                    <label class="col-md-4 control-label" for="type">Type Rent: </label>
                                    <div class="col-md-4">
                                        <div id="err_type" class="help-block with-errors"></div>
                                        <select class="form-control" id="type" name="type" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>>
                                            <option value="0" disabled>Select an option</option>
                                            <?php foreach ( $type_rent as $key => $value ){ 
                                                echo '<option value="'.$key.'"';
                                                if($rows['TRENTA'] == $key){
                                                    echo ' selected';
                                                }
                                                echo '>'.$key.' - '.$value.'</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-offset-4"> 
                                    <div class="col-md-4 form-group">
                                      <input class="form-check-input" type="checkbox" name="factoring" id="factoring" value="1" <?php if($rows['FACTORING']==1){ echo 'checked'; } ?> <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>>
                                      <label class="form-check-label" for="inlineCheckbox2">Factoring</label>
                                    </div>

                                    <div class="col-md-4 form-group">
                                      <input class="form-check-input" type="checkbox" id="po" name="po" value="1" <?php if($rows['PO']==1){ echo 'checked'; } ?> <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>>
                                      <label class="form-check-label" for="inlineCheckbox2">Po</label>
                                    </div>

                                    <div class="col-md-4 form-group">
                                      <input class="form-check-input" type="checkbox" name="reserved" id="reserved" value="1" <?php if($rows['RESERVA']==1){ echo 'checked'; } ?> <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>>
                                      <label class="form-check-label" for="inlineCheckbox2">Reserved</label>
                                    </div>

                                    <div class="col-md-2 form-group">
                                      <input class="form-check-input" type="checkbox" name="table" id="table" value="1" <?php if($rows['TABLA']==1){ echo 'checked'; } ?> <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>>
                                      <label class="form-check-label" for="inlineCheckbox2">Table</label>
                                    </div>

                                    <div class="col-md-2 form-group">
                                      <input class="form-check-input" type="checkbox" name="abl" id="abl" value="1" <?php if($rows['ESABL']==1){ echo 'checked'; } ?> <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>>
                                      <label class="form-check-label" for="inlineCheckbox2">Abl</label>
                                    </div>
                                </div>
      
                                <div class="form-group col-md-12" id="seccion_ttable">
                                    <label class="col-md-4 control-label" for="ttable">Type Table: </label>
                                    <div class="col-md-4">
                                        <div id="err_ttable" class="help-block with-errors"></div>
                                        <select class="form-control" id="ttable" name="ttable" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>>
                                            <option value="0" disabled>Select an option</option>
                                            <?php foreach ( $type_table as $key => $value ){ 
                                                echo '<option value="'.$key.'"';
                                                if($rows['TT'] == $key){
                                                    echo ' selected';
                                                }
                                                echo '>'.$key.' - '.$value.'</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-offset-4"> 
                                    <div class="col-md-3 form-group">
                                      <input class="form-check-input" type="checkbox" name="col" id="col" value="1" <?php if($rows['COLOCACION']==1){ echo 'checked'; } ?> <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>>
                                      <label class="form-check-label" for="inlineCheckbox1">Placement</label>
                                    </div>

                                    <div class="col-md-3 form-group">
                                      <input class="form-check-input" type="checkbox" name="cap" id="cap" value="1" <?php if($rows['CAPTACION']==1){ echo 'checked'; } ?> <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>>
                                      <label class="form-check-label" for="inlineCheckbox2">Catchment</label>
                                    </div>

                                    <div class="col-md-3 form-group">
                                      <input class="form-check-input" type="checkbox" name="con" id="con" value="1" <?php if($rows['CONTIGENTE']==1){ echo 'checked'; } ?> <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>>
                                      <label class="form-check-label" for="inlineCheckbox3">Quota</label>
                                    </div>

                                    <div class="col-md-4 form-group">
                                      <input class="form-check-input" type="checkbox" name="cm" id="cm" value="1" <?php if($rows['CALMORA']==1){ echo 'checked'; } ?> <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>>
                                      <label class="form-check-label" for="inlineCheckbox3">Calculate Late</label>
                                    </div>

                                    <div class="col-md-3 form-group">
                                      <input class="form-check-input" type="checkbox" name="lc" id="lc" value="1" <?php if($rows['LC']==1){ echo 'checked'; } ?> <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>>
                                      <label class="form-check-label" for="inlineCheckbox3">Credit line</label>
                                    </div>

                                    <div class="col-md-4 form-group">
                                      <input class="form-check-input" type="checkbox" name="part" id="part" value="1" <?php if($rows['PARTICIPA']==1){ echo 'checked'; } ?> <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>>
                                      <label class="form-check-label" for="inlineCheckbox3">Participation</label>
                                    </div>
                                </div>

                            </fieldset>

                            <div class="modal-footer">
                            <?php if($type == 'Update'){ ?>
                                <input type="hidden" name="save" id="save" value="1">
                                <button style="float: left;" type="submit" id="update" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                                <span style="float: right"><a href="<?php echo PUERTO."://".HOST.'/productsParametersList/'; ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
                                &nbsp;
                                <a id="clean1" style="float: right; margin-right: 10px;" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a>
                            <?php }else if($type == 'Delete'){ ?>
                                <input type="hidden" name="save" id="save" value="1">
                                <button style="float: left;" type="submit" id="delete" name="delete" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-remove"></span> Delete</button>
                                <span style="float: right"><a href="<?php echo PUERTO."://".HOST.'/productsParametersList/'; ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
                                &nbsp;
                            <?php } ?>
                            </div>
                        </form>
                    </div>
                </div><br />
            </div>
        </div>
    </div>
</div>