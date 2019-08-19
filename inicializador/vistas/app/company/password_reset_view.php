<?php
	require_once ("../../../datos/db/connect.php");
	$env = new DBSTART;
	$cc = $env::abrirDB();
?>

<?php 

    $userid = $_SESSION['usuario'];
    $sql = $cc->prepare("SELECT * FROM usuarios WHERE id_usuario='$userid' AND estado='A' ");
    $sql->execute();
    $fetch = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    foreach((array) $fetch as $results) {
        $laid = $results['id_usuario'];
        $username = $results['namesurname'];
    }
?>

<script type="text/javascript" src="../../js/cs_company_system_admin.js"></script>

<div id="page-wrapper"><br />
    
    <div class="alert alert-info"><p>Company / Password Reset</p></div>

    <div class="row">
        <div class="col-md-12" style="margin-top: -20px"><h2><i class="fa fa-lock"></i> Password Reset</h2></div>
    </div><br />

<div class="row">
    <div class="col-lg-6">

<?php
	if (isset($_POST['newpassw'])) {
	   require_once ("../../../controlador/c_company_passw_reset/act_passw_reset.php");
    }
?>

<!--  INICIO     FORMULARIO PARA EL REGISTRO-->
  <fieldset class="field">  
    <form method="post">
        
        <input type="hidden" name="id_user" value="<?php echo $laid ?>" />
            <input type="hidden" name="id_empresa" value="<?php echo $empresa ?>" />
            <div class="form-group">
                <label><span class="ast">*</span> User Name</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username ?>" readonly="" />
            </div>

            <div class="form-group">
                <label> New Password</label>
                <input type="password" name="new_passw" class="form-control" />
            </div>
            <div class="form-group">
                <label> Repeat Password</label>
                <input type="password" name="rep_passw" class="form-control" />
            </div>
        <div class="form-group col-lg-12" style="margin-top: 18px; float:right">
            <input type="submit" value="Save" name="newpassw" class="btn btn-info btn-small"/>
            <input type="reset" value="Clear" class="btn btn-warning btn-small"/>
        </div>
    </form>
</fieldset>


<!--   FIN   FORMULARIO PARA EL REGISTRO-->
</div>
    <div class="col-lg-2">
    </div>

    <div class="col-lg-4" style="margin-top: 0px;">
        <?php include ("default/notify.php") ?>
    </div>
</div>
</div>
<br /><br /><br />