<?php

	require_once ("../../../datos/db/connect.php");

	$env = new DBSTART;

	$cc = $env::abrirDB();

    $userid     = $_SESSION['acfSession']['usuario'];

    

    $sql = $cc->prepare("SELECT * FROM company_business_date WHERE id_business=1");

    $sql->execute();

    $fetch = $sql->fetchAll(PDO::FETCH_ASSOC);

    

    foreach((array) $fetch as $results) {

        $acc_mod    = $results['module'];

        $acc_since  = $results['since'];

        $acc_util   = $results['util'];

    }

    

    

    // Banks    

    $sql2 = $cc->prepare("SELECT * FROM company_business_date WHERE id_business=2");

    $sql2->execute();

    $fetch2 = $sql2->fetchAll(PDO::FETCH_ASSOC);

    

    foreach((array) $fetch2 as $results2) {

        $acc_mod2    = $results2['module'];

        $acc_since2  = $results2['since'];

        $acc_util2   = $results2['util'];

    }

    

    // Operations

    

    $sql3 = $cc->prepare("SELECT * FROM company_business_date WHERE id_business=3");

    $sql3->execute();

    $fetch3 = $sql3->fetchAll(PDO::FETCH_ASSOC);

    

    foreach((array) $fetch3 as $results3) {

        $acc_mod3    = $results3['module'];

        $acc_since3  = $results3['since'];

        $acc_util3   = $results3['util'];

    }

?>



<div id="page-wrapper"><br />    

    <div class="alert alert-info"><p>Company / Business Date</p></div>

    <div class="row">

        <div class="col-md-12" style="margin-top: -20px"><h2><i class="fa fa-eye"></i> Business</h2></div>

    </div><br />

<div class="row">

    <div class="col-lg-6">





<!--  INICIO     FORMULARIO PARA EL REGISTRO-->

  <fieldset class="field">

    <form method="post" class="form-horizontal" action="../../../controlador/c_company/c_business_upd.php">

    

    <table class="table table-striped table-condensed">

        <thead>

            <th>Module</th>

            <th>Since</th>

            <th>Util</th>

        </thead>

        

        <tbody>

            <tr>

            <td><?php echo $acc_mod ?></td>

            <td><input name="acc_since" type="date" class="form-control input-sm" value="<?php echo $acc_since ?>" /></td>

            <td><input name="acc_util" type="date" class="form-control input-sm" value="<?php echo $acc_util ?>" /></td>

            </tr>

            

            <tr>

            <td><?php echo $acc_mod2 ?></td>

            <td><input name="bak_since" type="date" class="form-control input-sm" value="<?php echo $acc_since2 ?>" /></td>

            <td><input name="bak_util" type="date" class="form-control input-sm" value="<?php echo $acc_util2 ?>" /></td>

            </tr>

            

            <tr>

            <td><?php echo $acc_mod3 ?></td>

            <td><input name="ope_since" type="date" class="form-control input-sm" value="<?php echo $acc_since3 ?>" /></td>

            <td><input name="ope_util" type="date" class="form-control input-sm" value="<?php echo $acc_util3 ?>" /></td>

            </tr>

        </tbody>

    </table>

    

    <input type="submit" name="changes" class="btn btn-success" value="Save" />

    </form>

</fieldset>

<!--FIN   FORMULARIO PARA EL REGISTRO-->

</div>

    <div class="col-lg-2">

    </div>



    <div class="col-lg-4" style="margin-top: 0px;">

        <?php include ("default/notify.php") ?>

    </div>

</div>

</div>

<br /><br /><br />