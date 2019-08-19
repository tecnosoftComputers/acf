<?php
	require_once ("../../../datos/db/connect.php");
	$env = new DBSTART;
	$cc = $env::abrirDB();
?>

<div id="page-wrapper"><br />
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Company</li>
        <li class="breadcrumb-item active"> Select Company</li>
      </ol>
    </nav>

    <div class="row">
        <div class="col-lg-10"><br />
            <?php require_once ("../../../controlador/c_company/list_company.php"); ?>
        </div>
    </div>
</div> 