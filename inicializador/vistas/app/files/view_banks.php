<?php
    require_once ("../../../datos/db/connect.php");
    $env = new DBSTART;
    $cc = $env::abrirDB();

    $userid = $_SESSION['usuario'];
    $sql = $cc->prepare("SELECT * FROM usuarios WHERE id_usuario='$userid' AND estado='A' ");
    $sql->execute();
    
    $fetch = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ((array )$fetch as $results){
        $laid       = $results['id_usuario'];
        $username   = $results['namesurname'];
    }

    $stmt = $cc->prepare("SELECT * FROM DPNUMERO WHERE status = 'A'");
    $stmt->execute();
    $all = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $cc->prepare("SELECT * FROM dp01a110 ");
    $stmt->execute();
    $one = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // lAS CHECK
    
    $last = $cc->prepare("SELECT MAX(NUMEROCH) AS thelast FROM dp02a110");
    $last->execute();
    $in = $last->fetchAll(PDO::FETCH_ASSOC);
    
    foreach((array) $in as $loco) {
        $num = $loco['thelast'];
    }

    // Moneda
    $money = $cc->prepare("SELECT * FROM fimoneda");
    $money->execute();
    $dinero = $money->fetchAll(PDO::FETCH_ASSOC);

?>
<script type="text/javascript" src="../../js/files_banks.js"></script>
<script type="text/javascript" src="../../js/jsFunctions.js"></script>
<div id="page-wrapper"><br /><br />

    <div class="alert alert-info"><p>Accounting / Files / Banks</p></div>
    <div class="row">
        <div class="col-lg-12">
<div class="panel panel-default"> <!-- /.panel-heading -->
  <div class="panel-body"> <!-- Nav tabs -->
    <ul class="nav nav-pills">
        <li class="active"><a href="#list-pills" data-toggle="tab"><i class="fa fa-th-list"></i> List Banks</a></li>
        <li style="width: 300px;"><a href="#form-pills" data-toggle="tab"><i class="fa fa-plus-square-o"></i> New Bank</a></li>
    </ul>

<div class="tab-content"> <!-- Tab panes -->
    <div class="tab-pane fade in active" id="list-pills"><br>
        <div class="col-lg-12">
<?php require_once ("../../../controlador/c_files/c_list_banks.php"); ?>
        </div>
    </div> <!-- FIN DE TIPOS DE ASIENTOS -->

  <div class="tab-pane fade" id="form-pills"><br />
<div class="col-lg-5">
    <form action="../../../controlador/c_files/add_bank.php" method="post" class="form-horizontal">
        <fieldset>
    <legend class="mibread"><strong>Banks</strong></legend>
            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Bank Code: </label>
                  <div class="col-md-2">
                    <input maxlength="4" style="width: 58px" autocomplete="off" name="bankcode" type="text" class="form-control input-sm" />
                  </div>
            </div>

            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Accounting Code</label>
                  <div class="col-md-8">
                    <div class="input-group"> 
                        <input autocomplete="off" readonly="" maxlength="20" onkeypress="return soloNumeros(event)" id="_accountycode" name="accountycode" type="text" class="form-control input-sm"> 
                        <span class="input-group-btn"> 
                            <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('_accountycode',true,true)" ><span style="padding-top: 1px; padding-bottom: 1px" class="glyphicon glyphicon-search"></span></button> 
                        </span>
                    </div>
                  </div>
            </div>

            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Bank Name: </label>
                  <div class="col-md-8">
                    <input maxlength="50" autocomplete="off" name="bankname" type="text" class="form-control input-sm" />
                  </div>
            </div>

            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Account Number: </label>
                  <div class="col-md-8">
                    <input maxlength="20" autocomplete="off" name="accountnumber" type="text" class="form-control input-sm" />
                  </div>
            </div>
            
            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Generates Check: </label>
                  <div class="col-md-8">
                    <input type="checkbox" name="check" />
                  </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Last Check: </label>
              <div class="col-md-8">
                <input autocomplete="off" name="lastchecks" type="text" class="form-control input-sm"  value="<?php echo $num ?>" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Currency </label>
              <div class="col-md-8">
                
                <select name="currency" class="form-control">
                    <?php foreach ($dinero as $key => $value_money): ?>
                        <option value="<?php echo $value_money['TIPO_MON'] ?>"><?php echo strtoupper($value_money['NOMBREMON']) ?></option>
                    <?php endforeach ?>
                </select>
              </div>
            </div>
            
            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Account Type: </label>
                  <div class="col-md-8">
                    <select name="accountype" class="form-control">
                      <option>SAVINGS ACCOUNTS</option>
                      <option>CHECKING ACCOUNTS</option>
                      <option>CERTIFICATES OF DEPOSIT</option>
                      <option>MONEY MARKET ACCOUNTS</option>
                      <option>RETIREMENT ACCOUNTS</option>
                    </select>
                  </div>
            </div>

            
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Format </label>
              <div class="col-md-8">
                <input autocomplete="off" name="format" type="text" class="form-control input-sm" />
              </div>
            </div>

            
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Type of accounting entry </label>
              <div class="col-md-8">
                <select name="typeaccountentry" class="form-control">
                    <?php foreach ((array) $all as $data) { ?>
                        <option value="<?php echo $data['TIPO_ASI'] ?>"><?php echo $data['TIPO_ASI'].' - '.$data['NOMBRE']; ?></option>
                    <?php } ?>
                </select>
              </div>
            </div>                        

            <div class="modal-footer">
                <button style="float: left;" type="submit" name="register" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a></button>&nbsp;
                <button style="float: right" href="#list-pills" data-toggle="tab" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></button>
                <button style="float: right;" type="reset" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a></button>
                
            </div>
        </fieldset>
    </form> 
    </div>
</div><!-- FIN DE ASIENTOS CONTABLES-->
            </div> <!-- FIN DE TAB CONTENT-->    
        </div> <!-- FIN DE PANEL BODY -->
    </div> <!-- FIN DE PANEL DEFAULT -->
</div> <!-- FIN DE COL-LG-12  -->
</div> <!-- FIN DE ROW -->
</div> <!-- FIN DE WRAPPER  -->
