<style>
    
    .inputs_small{
        padding-left: 0px;
        padding-right: 0px;
        width: 22px;
        text-align:center;
    }

</style>
<div id="page-wrapper"><br />
    <div class="alert alert-info"><p>Operations / Files / Products Parameters <a style="float: right; color: #fff" href="<?php echo PUERTO."://".HOST.'/dashboard/'; ?>">Back</a></p></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body" style="height: 500px; overflow: auto;">

                    <div id="export" <?php if($error){ echo 'style="display:none"'; } ?>>
                        <span id="pdf" style="float: right; margin-left: 10px"><a href="<?php echo PUERTO."://".HOST.'/productsParametersReport/excel/'; ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a></span>
                        <span id="excel" style="float: right"><a href="<?php echo PUERTO."://".HOST.'/productsParametersReport/pdf/'; ?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a></span>
                    </div>
                    
                    <ul class="nav nav-pills">
                        <li style="width: auto;" <?php if(!$error){ echo 'class="active"'; } ?>><a id="list" href="#home-pills" data-toggle="tab"><i class="fa fa-th-list"></i> List Products Parameters</a></li>
                        <li style="width: auto;" <?php if($error){ echo 'class="active"'; } ?>><a id="new" href="#form-pills" data-toggle="tab"><i class="fa fa-plus-square-o"></i> New Parameter </a></li>
                    </ul>

                    <!-- Tab panes -->  
                    <div class="tab-content">
                        <div class="tab-pane fade <?php if(!$error){ echo 'in active'; } ?>" id="home-pills">
                            <br>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="productsParameters">
                                <thead>
                                    <tr>
                                        <th align="center" width=100>Product</th>
                                        <th align="center" width=220>Name</th>
                                        <th align="center" >Placement</th>
                                        <th align="center" >Catchment</th>
                                        <th align="center" >Number</th>
                                        <th align="center" >Factoring</th>
                                        <th align="center" width=50>Update</th>
                                        <th align="center" width=50>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach( (array) $productsParameters as $registro2 ){ ?>
                                        <tr class='odd gradeX' data-toggle="collapse" data-target="#demo<?php echo $registro2['PRODUCTO']; ?>" class="accordion-toggle">
                                            <td><?php echo $registro2['PRODUCTO'] ?></td>
                                            <td><?php echo $registro2['NOMBRE'] ?></td>
                                            <td align="center"><?php if($registro2['COLOCACION'] == 1){ echo '<i class="fa fa-check"></i>'; }else{ echo '-'; } ?></td>
                                            <td align="center"><?php if($registro2['CAPTACION'] == 1){ echo '<i class="fa fa-check"></i>'; }else{ echo '-'; } ?></td>
                                            <td align="center"><?php echo $registro2['NUMERO'] ?></td>
                                            <td align="center"><?php if($registro2['FACTORING'] == 1){ echo '<i class="fa fa-check"></i>'; }else{ echo '-'; } ?></td>
                                            <td align="center"><a href="<?php echo PUERTO."://".HOST.'/productsParametersUpdate/'.Utils::encriptar($registro2['PRODUCTO']).'/'; ?>"><i class="fa fa-edit"></i></a></td>
                                            <td align="center"><a href="<?php echo PUERTO."://".HOST.'/productsParametersDelete/'.Utils::encriptar($registro2['PRODUCTO']).'/'; ?>"><i class="fa fa-trash"></i></a></td>    
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade <?php if($error){ echo 'in active'; } ?>" id="form-pills">
                            <br>
                            <div class="col-lg-8">
                                <div class="panel panel-default">

                                    <div class="panel-body">

                                        <form id="addForm" class="form-horizontal" method="post" action="<?php echo PUERTO."://".HOST.'/'.$view.'/'; ?>" onsubmit="return validarFormulario()">

                                            <fieldset>
                                                <legend class="mibread"><strong>Parameter</strong></legend>

                                                <div class="form-group col-md-12" id="seccion_product">
                                                    <label class="col-md-4 control-label" for="product">Product: </label>

                                                    <div class="col-md-2">
                                                        <div id="err_product" class="help-block with-errors"></div>
                                                        <input style="width: 50px;" id="product" name="product" type="text" class="form-control input-sm" maxlength="3"/>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12" id="seccion_nombre">
                                                    <label class="col-md-4 control-label" for="nombre">Name: </label>
                                                    <div class="col-md-8">
                                                        <div id="err_nombre" class="help-block with-errors"></div>
                                                        <input id="nombre" name="nombre" type="text" class="form-control input-sm" maxlength="30"/>
                                                    </div>
                                                </div>

                                                <div class="col-md-offset-4 form-group col-md-12" id="seccion_currency">
                                                    <label class="col-md-4 control-label" for="currency">Currency: </label>
                                                    <div class="col-md-8">
                                                        <div id="err_currency" class="help-block with-errors"></div>
                                                        <select class="form-control" id="currency" name="currency">
                                                            <option value="0" disabled selected>Select an option</option>
                                                            <?php foreach ( $currency as $key => $value ){ 
                                                                echo '<option value="'.$value['TIPO_MON'].'"';
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
                                                                <input id="int" name="int" type="text" class="form-control input-sm inputs_small" maxlength="1"/>

                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-4" id="seccion_com">
                                                            <label class="col-md-6 control-label" for="com">Commision: </label>
                                                            <div class="col-md-1">
                                                                <div id="err_com" class="help-block with-errors"></div>
                                                                <input id="com" name="com" type="text" class="form-control input-sm inputs_small" maxlength="1"/>

                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-3" id="seccion_ins">
                                                            <label class="col-md-5 control-label" for="ins">Insure: </label>
                                                            <div class="col-md-1">
                                                                <div id="err_ins" class="help-block with-errors"></div>
                                                                <input id="ins" name="ins" type="text" class="form-control input-sm inputs_small" maxlength="1"/>

                                                            </div>
                                                        </div> 

                                                        <div class="form-group col-md-4" id="seccion_wire">
                                                            <label class="col-md-7 control-label" for="wire">Wire fee: </label>
                                                            <div class="col-md-1">
                                                                <div id="err_wire" class="help-block with-errors"></div>
                                                                <input id="wire" name="wire" type="text" class="form-control input-sm inputs_small" maxlength="1"/>
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
                                                                <input id="desc" name="desc" type="text" class="form-control input-sm inputs_small" maxlength="1"/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-4" id="seccion_otro">
                                                            <label class="col-md-6 control-label" for="otro">Other: </label>
                                                            <div class="col-md-1">
                                                                <div id="err_otro" class="help-block with-errors"></div>
                                                                <input id="otro" name="otro" type="text" class="form-control input-sm inputs_small" maxlength="1"/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-3" id="seccion_otro2">
                                                            <label class="col-md-5 control-label" for="otro2">Other2: </label>
                                                            <div class="col-md-1">
                                                                <div id="err_otro2" class="help-block with-errors"></div>
                                                                <input id="otro2" name="otro2" type="text" class="form-control input-sm inputs_small" maxlength="1" />
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
                                                                <input id="clie" name="clie" type="text" class="form-control input-sm inputs_small" maxlength="1"/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6" id="seccion_mark">
                                                            <label class="col-md-10 control-label" for="mark">Marketing conmission fees: </label>
                                                            <div class="col-md-1">
                                                                <div id="err_mark" class="help-block with-errors"></div>
                                                                <input id="mark" name="mark" type="text" class="form-control input-sm inputs_small" maxlength="1" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12" id="seccion_type">
                                                    <label class="col-md-4 control-label" for="type">Type Rent: </label>
                                                    <div class="col-md-4">
                                                        <div id="err_type" class="help-block with-errors"></div>
                                                        <select class="form-control" id="type" name="type">
                                                            <option value="0" disabled selected>Select an option</option>
                                                            <?php foreach ( $type_rent as $key => $value ){ 
                                                                echo '<option value="'.$key.'"';
                                                                echo '>'.$key.' - '.$value.'</option>';
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-offset-4"> 
                                                    <div class="col-md-4 form-group">
                                                      <input class="form-check-input" type="checkbox" name="factoring" id="factoring" value="1">
                                                      <label class="form-check-label" for="inlineCheckbox2">Factoring</label>
                                                    </div>

                                                    <div class="col-md-4 form-group">
                                                      <input class="form-check-input" type="checkbox" id="po" name="po" value="1">
                                                      <label class="form-check-label" for="inlineCheckbox2">Po</label>
                                                    </div>

                                                    <div class="col-md-4 form-group">
                                                      <input class="form-check-input" type="checkbox" name="reserved" id="reserved" value="1">
                                                      <label class="form-check-label" for="inlineCheckbox2">Reserved</label>
                                                    </div>

                                                    <div class="col-md-2 form-group">
                                                      <input class="form-check-input" type="checkbox" name="table" id="table" value="1">
                                                      <label class="form-check-label" for="inlineCheckbox2">Table</label>
                                                    </div>

                                                    <div class="col-md-2 form-group">
                                                      <input class="form-check-input" type="checkbox" name="abl" id="abl" value="1">
                                                      <label class="form-check-label" for="inlineCheckbox2">Abl</label>
                                                    </div>
                                                </div>
                      
                                                <div class="form-group col-md-12" id="seccion_ttable">
                                                    <label class="col-md-4 control-label" for="ttable">Type Table: </label>
                                                    <div class="col-md-4">
                                                        <div id="err_ttable" class="help-block with-errors"></div>
                                                        <select class="form-control" id="ttable" name="ttable">
                                                            <option value="0" disabled selected>Select an option</option>
                                                            <?php foreach ( $type_table as $key => $value ){ 
                                                                echo '<option value="'.$key.'"';
                                                                echo '>'.$key.' - '.$value.'</option>';
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-offset-4"> 
                                                    <div class="col-md-3 form-group">
                                                      <input class="form-check-input" type="checkbox" name="col" id="col" value="1">
                                                      <label class="form-check-label" for="inlineCheckbox1">Placement</label>
                                                    </div>

                                                    <div class="col-md-3 form-group">
                                                      <input class="form-check-input" type="checkbox" name="cap" id="cap" value="1">
                                                      <label class="form-check-label" for="inlineCheckbox2">Catchment</label>
                                                    </div>

                                                    <div class="col-md-3 form-group">
                                                      <input class="form-check-input" type="checkbox" name="con" id="con" value="1">
                                                      <label class="form-check-label" for="inlineCheckbox3">Quota</label>
                                                    </div>

                                                    <div class="col-md-4 form-group">
                                                      <input class="form-check-input" type="checkbox" name="cm" id="cm" value="1">
                                                      <label class="form-check-label" for="inlineCheckbox3">Calculate Mora</label>
                                                    </div>

                                                    <div class="col-md-3 form-group">
                                                      <input class="form-check-input" type="checkbox" name="lc" id="lc" value="1">
                                                      <label class="form-check-label" for="inlineCheckbox3">Credit line</label>
                                                    </div>

                                                    <div class="col-md-4 form-group">
                                                      <input class="form-check-input" type="checkbox" name="part" id="part" value="1">
                                                      <label class="form-check-label" for="inlineCheckbox3">Participation</label>
                                                    </div>
                                                </div>

                                            </fieldset>

                                            <div class="modal-footer">
                                                <input type="hidden" name="create" id="create" value="1">
                                                <button style="float: left;" type="submit" id="update" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                                                <span style="float: right"><a href="<?php echo PUERTO."://".HOST.'/productsParametersList/'; ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
                                                &nbsp;
                                                <a id="clean1" style="float: right; margin-right: 10px;" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a>
                                            </div>
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