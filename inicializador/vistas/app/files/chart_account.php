<?php

require_once FRONTEND_RUTA."/datos/db/connect.php";
$env   = new DBSTART;
$cc    = $env::abrirDB();

$userid = $_SESSION['acfSession']['usuario'];
$sql = $cc->prepare("SELECT * FROM usuarios WHERE id_usuario='$userid' AND estado='A' ");
$sql->execute();
$fetch = $sql->fetchAll(PDO::FETCH_ASSOC);

foreach((array) $fetch as $results) {
    $laid       = $results['id_usuario'];
    $username   = $results['namesurname'];
}

    // Type of account
$type = $cc->prepare("SELECT * FROM s01tab110");
$type->execute();
$all_type = $type->fetchAll(PDO::FETCH_ASSOC);

$stmt = $cc->prepare("SELECT * FROM dp01a110");
$stmt->execute();
$one = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div id="page-wrapper"><br />
    <div class="alert alert-info"><p>Accounting / Files / Accounting Accounts</p></div>
    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-default">
                <ul class="nav nav-pills">
                    <li class="active"><a href="#list" data-toggle="tab"><i class="fa fa-th-list"></i> List Accounts</a></li>
                    <li><a href="#new" data-toggle="tab"><i class="fa fa-plus-square-o"></i> New Account</a></li>
                </ul><br>
                <div class="panel-body" style="height:500px;overflow:auto;">

                    <!-- Tab panes -->  
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="list">
                            <div class="col-lg-12">
                                <?php  require_once FRONTEND_RUTA."/controlador/c_files/c_list_charts_account.php"; ?>
                            </div>
                        </div>


                        <div class="tab-pane fade in" id="new">
                            <div class="col-lg-6">
                                <fieldset>
                                    <legend class="mibread"><strong>Charts Account</strong></legend>
                                    <form id="addForm" class="form-horizontal" method="post" action="<?php echo PUERTO.'://'.HOST; ?>/controlador/c_files/add_accounts.php">
                                        <input type="hidden" name="laempresaid" value="<?php echo $laempresa; ?>" />
                                        <fieldset>


                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="name">Account Number: </label>
                                                <div class="col-md-8">
                                                    <input name="number" type="text" class="form-control input-sm" required="" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="name">Account Name: </label>
                                                <div class="col-md-8">
                                                    <input name="name" type="text" class="form-control input-sm" required="" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="name">Account Type: </label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="type">
                                                        <?php foreach ( $all_type as $key => $value ): ?>
                                                            <option value="<?php echo $value['codtipcta'] ?>"><?php echo $value['nomtipcta'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="name">Account Description: </label>
                                                <div class="col-md-8">
                                                    <textarea name="desc" class="form-control input-sm"></textarea>
                                                </div>
                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" href="#list" class="btn btn-warning" data-dismiss="modal">Exit</button>
                                                <button style="float: left;" type="submit" name="register" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                                                <button type="reset" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</button>
                                            </div>


                                        </fieldset>

                                    </form> 
                                </div>
                            </div><!-- FIN TAB NEW -->

                        </div><!-- FIN TAB CONTENT -->
                    </div><!-- fin PANEL BODY -->
                </div><!-- PANEL DEFAULT-->
            </div><!-- FIN 12-->
        </div>
    </div>