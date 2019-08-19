<?php
	require_once ("../../../controlador/func.php");
	require_once ("../../../datos/db/connect.php");
	$db = new DBSTART();
	$cc = $db::abrirDB();
    $empresa = $_SESSION['id_empresa'];
?>
<div class="col-lg-6 col-md-6">
    <div class="panel panel-yellow" style="border-bottom: 4px solid darkorange; border-top: 4px solid darkorange">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa  fa-folder-open-o fa-2x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?php contadorI($cc, "", $empresa) ?></div>
                    <div><a href="head.php?req=<?php echo '3' ?>">Accounting</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6 col-md-6">
    <div class="panel panel-primary" style="border-bottom: 4px solid darkblue; border-top: 4px solid darkblue">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-bank fa-2x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?php contadorA($cc, "", $empresa) ?></div>
                    <div>Banks</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6 col-md-6">
    <div class="panel panel-green" style="border-bottom: 4px solid darkgreen; border-top: 4px solid darkgreen">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-refresh fa-2x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?php contador($cc, "",$empresa) ?></div>
                    <div>Operations</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-6 col-md-6">
    <div class="panel panel-red" style="border-bottom: 4px solid darkred; border-top: 4px solid darkred">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-suitcase fa-2x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?php contador($cc, "c_clientes",$empresa) ?></div>
                    <div>Administrative Expenses</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-6 col-md-6">
    <div class="panel panel-info" style="border-bottom: 4px solid darkturquoise;border-top: 4px solid darkturquoise ">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-trello fa-2x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?php contador($cc, "c_mercaderia",$empresa) ?></div>
                    <div>Financial Planning</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-6 col-md-6">
    <div class="panel" style="background-color: turquoise; border-bottom: 4px solid darkcyan; border-top: 4px solid darkcyan">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-file-text fa-2x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?php contador($cc, "c_clientes",$empresa) ?></div>
                    <div>Prospect</div>
                </div>
            </div>
        </div>
    </div>
</div>