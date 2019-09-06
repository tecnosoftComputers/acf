<div id="page-wrapper"><br />
<div class="alert alert-info"><p>Accounting / Files / Chart Account / <?php echo $type; ?> <a style="float: right; color: #fff" href="<?php echo PUERTO."://".HOST.'/accountsList/'; ?>">Back</a></p></div>
    <div class="row">
        <div class="col-lg-12">
        <div class="col-lg-7">
        <div class="panel panel-default">

    <div class="panel-body">

    <form id="addForm" class="form-horizontal" method="post" action="<?php echo PUERTO."://".HOST.'/'.$view.'/'.Utils::encriptar($rows['CODIGO']).'/'; ?>">

        <fieldset>
        <legend class="mibread"><strong>Chart of Accounts</strong></legend>

        <div class="form-group" id="seccion_number">
            <label class="col-md-4 control-label" for="name">Account Number: </label>
            <div class="col-md-8">
                <div id="err_number" class="help-block with-errors"></div>
                <input id="number" name="number" type="text" class="form-control input-sm" value="<?php echo $rows['CODIGO']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?> />
            </div>
        </div>

        <div class="form-group" id="seccion_name">
            <label class="col-md-4 control-label" for="name">Account Name: </label>
            <div class="col-md-8">
                <div id="err_name" class="help-block with-errors"></div>
                <input id="name" name="name" type="text" class="form-control input-sm" value="<?php echo $rows['NOMBRE']; ?>" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>/>
            </div>
        </div>

        <div class="form-group" id="seccion_type">
            <label class="col-md-4 control-label" for="type">Account Type: </label>
            <div class="col-md-8">
                <div id="err_type" class="help-block with-errors"></div>
                <select class="form-control" id="type" name="type" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>>
                    <option value="0" disabled selected>Seleccione una opci&oacute;n</option>
                    <?php foreach ( $all_type as $key => $value ){ 
                        echo '<option value="'.$value['codtipcta'].'"';
                        if($rows['CODTIPCTA'] == $value['codtipcta']){
                            echo ' selected=selected';
                        }
                        echo '>'.$value['nomtipcta'].'</option>';
                    } ?>
                </select>
            </div>
        </div>

        <div class="form-group" id="seccion_desc">
            <label class="col-md-4 control-label" for="desc">Account Description: </label>
            <div class="col-md-8">
                <div id="err_desc" class="help-block with-errors"></div>
                <textarea id="desc" name="desc" class="form-control input-sm" <?php if($type == 'Delete'){ echo 'disabled="true" readonly="true"'; } ?>><?php echo $rows['CTADES'] ?></textarea>
            </div>
        </div>

        <div class="modal-footer">
            
            <?php if($type == 'Update'){ ?>
                <input type="hidden" name="save" id="save" value="1">
                <button style="float: left;" type="submit" id="update" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a></button>
                <span style="float: right"><a href="<?php echo PUERTO."://".HOST.'/accountsList/'; ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
                &nbsp;
                <button style="float: right; margin-right: 10px;" type="reset" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a></button>
            <?php }else if($type == 'Delete'){ ?>
                <input type="hidden" name="save" id="save" value="1">
                <button style="float: left;" type="submit" id="delete" name="delete" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-remove"></span> Delete</a></button>
                <span style="float: right"><a href="<?php echo PUERTO."://".HOST.'/accountsList/'; ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
                &nbsp;
            <?php }else{ ?>
                <input type="hidden" name="create" id="create" value="1">
                <button style="float: left;" type="submit" id="update" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a></button>
                <span style="float: right"><a href="<?php echo PUERTO."://".HOST.'/accountsList/'; ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
                &nbsp;
                <button style="float: right; margin-right: 10px;" type="reset" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a></button>
            <?php } ?>
        </div>

        </fieldset>
    </form>
        </div>
        </div><br />
</div>
    </div>
</div>