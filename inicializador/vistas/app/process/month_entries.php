<?php
require_once ("../../../datos/db/connect.php");
$env = new DBSTART;
$cc = $env::abrirDB();
?>

<?php
$userid = $_SESSION['acfSession']['usuario'];
$sql = $cc->prepare("SELECT * FROM usuarios WHERE id_usuario='$userid' AND estado='A' ");
$sql->execute();

$fetch = $sql->fetchAll(PDO::FETCH_ASSOC);
foreach ((array )$fetch as $results){
    $laid = $results['id_usuario'];
    $username = $results['namesurname'];
}
?>

<div id="page-wrapper"><br />
    <div class="alert alert-info"><p>Accounting / Processes / Month end Entries</p></div>
    <div class="row">
        <div class="col-lg-5">
    <form action="../../../controlador/c_files/add_bank.php" method="post" class="form-horizontal">
        <fieldset>
    <legend class="mibread"><strong>Month end Entries</strong></legend>         

            <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Fecha del cierre</label>
                  <div class="col-md-8">
                    <input name="accountycode" type="date" class="form-control input-sm" />
                  </div>
            </div>
                      

            <div class="modal-footer">
                <button style="float: left;" type="submit" name="register" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a></button>&nbsp;
                <button style="float: left;" type="reset" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a></button>
                <span style="float: right"><a href="#list-pills" data-toggle="tab" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
            </div>
        </fieldset>
    </form> 

</div> <!-- FIN DE COL-LG-12  -->
</div> <!-- FIN DE ROW -->
</div> <!-- FIN DE WRAPPER  -->
<script>
    function preguntar(id) {
        if (confirm('Esta seguro que desea inactivar este usuario ' )){
            window.location.href = "../../../controlador/c_company_users/delete.php?id="+ id;
        }
    }
</script>

<script>
    function preguntarActivar(id) {
        if (confirm('Esta seguro que desea activar este usuario ' )){
            window.location.href = "../../../controlador/c_company_users/activar_user.php?id="+ id;
        }
    }
</script>