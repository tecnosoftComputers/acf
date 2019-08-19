<style> .unselectable{background-color: #ddd;cursor: not-allowed;} </style>
<?php
 session_start();  
 if(isset($_SESSION["correo"])) {

    require_once ("../head_unico.php");
    require_once ("../../../../datos/db/connect.php");
    
    $stmt = DBSTART::abrirDB()->prepare("SELECT * FROM dp01a110 ");
    $stmt->execute();
    $one = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $stmt = DBSTART::abrirDB()->prepare("SELECT * FROM DPNUMERO WHERE status = 'A'");
    $stmt->execute();
    $all = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Moneda
    $money = DBSTART::abrirDB()->prepare("SELECT * FROM fimoneda");
    $money->execute();
    $dinero = $money->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_REQUEST['cid'])){
        $laid = $_REQUEST['cid'];

        $sql = DBSTART::abrirDB()->prepare("SELECT * FROM dp02a110 WHERE CODIGOBCO = '$laid' ");
        $sql->execute();
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $key => $value) {
            $upd_cod = $value['CODIGOBCO'];
            $upd_mov = $value['CODMOV'];
            $upd_nom = $value['NOMBREBCO'];
            $upd_cue = $value['CUENTANO'];
            $upd_che = $value['CHEQUE'];
            $upd_num = $value['NUMEROCH'];
            $upd_tim = $value['TIPO_MON'];
            $upd_tic = $value['TIPO_CTA'];
            $upd_for = $value['FORMATOCH'];
            $upd_tie = $value['TIPOEGRESO'];
        };
    }
?>
<!-- MODAL  1 -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 850px; margin-left:-100px">
        
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
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th width=450>Cuenta</th>
                        <th width=300>Nombre</th>
                        <th width=50>Select</th>
                    </tr>
                </thead>
<?php foreach( (array) $one as $registro2 ){ ?>
    <tbody>
    <tr class='odd gradeX'>
    <?php
        $var = $registro2['CODIGO'];
        $newvar = substr($var, -1);
        if ($newvar == '.'){ ?>

            <td><strong><?php echo $registro2['CODIGO'] ?></strong></td>
            <td><strong><?php echo $registro2['NOMBRE'] ?></strong></td>
            <?php echo '<td width=40> <a title="Error, no puede seleccionar una cuenta mayor" class="unselectable" href="#"><span class="badge" style="background-color:#1e6cb6; width:120px"><i class="fa fa-check"> Select</i></span></a></td>'; ?>     
        <?php }else{ ?>
<!--$registro2['CODIGO'].-->
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $registro2['CODIGO'] ?></td>
            <td><?php echo $registro2['NOMBRE'] ?></td>
            <?php echo '<td width=40 data-toggle="modal" data-target="#myModal"> <a href="javascript:param_edit_banks(\''.$registro2['CODIGO'].'\');"><span class="badge" style="background-color:#1e6cb6; width:120px"><i class="fa fa-check"> Select</i></span></a></td>'; ?>                      
        <?php } ?>
    </tr>
    
    </tbody>
<?php } ?>
            </table>
        </div>
            </div>
        </div>
    </div><!--FIN PANEL DEFAULT-->
</div><!-- FIN COL 12 -->
            </div><!--FIN PANEL BODY-->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="buttonClose">Close</button>
            </div>
        </div><!-- FIN CONTENT-->
    </div><!-- FIN DIALOG -->
</div> <!--  FIN MODAL 1 -->

<script type="text/javascript" src="../../../js/activities_journal.js"></script>
<script language="JavaScript" src="../../../jquery/jquery-1.5.1.min.js"></script>
<script src="../../../jquery/jquery-1.12.1.min.js"></script>
<div id="page-wrapper"><br />

<!-- MODAL  1 -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 850px; margin-left:-100px">
        
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
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="border-collapse:collapse;">
                <thead>
                    <tr>
                        <th align="center" width=450>Cuenta</th>
                        <th align="center" width=300>Nombre</th>
                        <th align="center" width=50></th>
                    </tr>
                </thead>
        
    <?php foreach( (array) $one as $registro2 ){ ?>
    <tbody>
    <tr class='odd gradeX' data-toggle="collapse" data-target="#demo<?php echo $registro2['CODIGO_AUX']; ?>" class="accordion-toggle">
    <?php
        $var = $registro2['CODIGO'];
        $newvar = substr($var, -1);
        if ($newvar == '.'){ ?>
            <td><strong><?php echo $registro2['CODIGO'] ?></strong></td>
            <td><strong><?php echo $registro2['NOMBRE'] ?></strong></td>
            <?php echo '<td width=40 data-toggle="modal" data-target="#myModal"> <a href="javascript:param_edit_banks('.$registro2['CODIGO'].');"><span class="badge" style="background-color:#1e6cb6; width:120px"><i class="fa fa-check"> Select</i></span></a></td>'; ?>
        <?php }else{ ?>
            <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $registro2['CODIGO'] ?></td>
            <td><?php echo $registro2['NOMBRE'] ?></td>
            <?php echo '<td width=40 data-toggle="modal" data-target="#myModal"> <a href="javascript:param_edit_banks('.$registro2['CODIGO'].');"><span class="badge" style="background-color:#1e6cb6; width:120px"><i class="fa fa-check"> Select</i></span></a></td>'; ?>                 
        <?php } ?>
    </tr>    
    </tbody>
    <?php } ?>
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

<div class="alert alert-info"><p>Accounting / Files / Banks / Edit  </p></div>
    <div class="row">
        <div class="col-lg-12">
        <div class="col-lg-7">
        <div class="panel panel-default">

    <div class="panel-body">
    <form id="addForm" class="form-horizontal" method="post" action="../../../../controlador/c_files/edit_bank.php">

        <fieldset>
        <legend class="mibread"><strong>Banks</strong></legend>
    <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Bank Code: </label>
                  <div class="col-md-8">
                    <input maxlength="4" style="width: 58px" readonly="" value="<?php echo $upd_cod ?>" autocomplete="off" name="bankcode" type="text" class="form-control input-sm" />
                  </div>
            </div>            

            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Accounting Code</label>
                  <div class="col-md-8">
                    <div class="input-group"> 
                        <input autocomplete="off" maxlength="20" onkeypress="return soloNumeros(event)" id="_accountycode" name="accountycode" type="text" class="form-control input-sm" readonly="" value="<?php echo $upd_mov ?>"> 
                        <span class="input-group-btn"> 
                            <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('_accountycode',true,true)" ><span style="padding-top: 1px; padding-bottom: 1px" class="glyphicon glyphicon-search"></span></button> 
                        </span>
                    </div>
                  </div>
            </div>             

            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Bank Name: </label>
                  <div class="col-md-8">
                    <input value="<?php echo $upd_nom ?>" maxlength="50" autocomplete="off" name="bankname" type="text" class="form-control input-sm" />
                  </div>
            </div>

            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Account Number: </label>
                  <div class="col-md-8">
                    <input value="<?php echo $upd_cue ?>" maxlength="20" autocomplete="off" name="accountnumber" type="text" class="form-control input-sm" />
                  </div>
            </div>
            
            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Generates Check: </label>
                  <div class="col-md-8">
                  <?php if (ord($upd_che) == 0) { ?>
                    <input type="checkbox" name="check" />
                  <?php }else{ ?>
                    <input type="checkbox" name="check" checked="" />
                  <?php } ?>
                  </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Last Check: </label>
                <div class="col-md-8">
                    <input value="<?php echo $upd_num ?>" autocomplete="off" name="lastchecks" type="text" class="form-control input-sm" />
                </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Currency </label>
              <div class="col-md-8">
                <select name="currency" class="form-control">
                    <?php foreach ($dinero as $key => $value_money): ?>
                        <?php if ($upd_tim == $value_money['TIPO_MON']) { ?>
                            <option style="background-color: turquoise" value="<?php echo $value_money['TIPO_MON'] ?>" selected><?php echo $value_money['NOMBREMON'] ?></option>
                        <?php }else{ ?>
                        <option value="<?php echo $value_money['TIPO_MON'] ?>"><?php echo $value_money['NOMBREMON'] ?></option>
                    <?php } ?>
                    <?php endforeach ?>
                </select>
              </div>
            </div>
            
            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Account Type: </label>
                  <div class="col-md-8">
                    <input value="<?php echo $upd_tic ?>" autocomplete="off" name="accountype" type="text" class="form-control input-sm" />
                  </div>
            </div>

            
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Format </label>
              <div class="col-md-8">
                <input value="<?php echo $upd_for ?>" autocomplete="off" name="format" type="text" class="form-control input-sm" />
              </div>
            </div>

            
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Type of accounting entry </label>
              <div class="col-md-8">
                <select name="typeaccountentry" class="form-control">
                    <?php foreach ((array) $all as $data) { ?>
                    <?php if ($data['TIPO_ASI'] == $upd_tie ){ ?>
                        <option style="background: turquoise;" value="<?php echo $data['TIPO_ASI'] ?>" selected=""><?php echo $data['TIPO_ASI'].' - '.$data['NOMBRE']; ?></option>
                    <?php }else{ ?>
                    <option value="<?php echo $data['TIPO_ASI'] ?>"><?php echo $data['TIPO_ASI'].' - '.$data['NOMBRE']; ?></option>
                    <?php }} ?>
                </select>
              </div>
            </div>  

        <div class="modal-footer">
            <button style="float: left;" type="submit" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a></button>
            <span style="float: right"><a href="../../../../inicializador/vistas/app/in.php?cid=files/view_banks" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
            <button style="float: right;" type="reset" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a></button>
            
        </div>

        </fieldset>
    </form>
        </div>
        </div><br />
</div>
    </div>
</div>

<?php 
require_once ("../foot_unico.php");

}else{
    session_unset();
    session_destroy();
    header('Location:  ../../../../login.php');
} 

 ?>