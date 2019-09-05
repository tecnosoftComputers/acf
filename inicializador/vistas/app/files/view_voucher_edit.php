<?php
 session_start();  
 if(isset($_SESSION["correo"])) {

    require_once ("../head_unico.php");
    require_once ("../../../../datos/db/connect.php");
    
    $sql = DBSTART::abrirDB()->prepare("SELECT * FROM tab_asientos");
    $sql->execute();
    $all = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_REQUEST['cid'])){
        $laid = $_REQUEST['cid'];

        $sql = DBSTART::abrirDB()->prepare("SELECT * FROM DPNUMERO WHERE ns = '$laid' ");
        $sql->execute();
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $key => $value) {
            $ent = $value['TIPO_ASI'];
            $nom = $value['NOMBRE'];
            $asi = $value['ASIENTO'];
            
            $idasi      = $value['IDASI'];
            $form       = $value['FORMATOCOM'];
            $ns         = $value['ns'];
        }

        $sql = DBSTART::abrirDB()->prepare("SELECT * FROM templates");
        $sql->execute();
        $formats = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
?>
<div id="page-wrapper"><br />
<div class="alert alert-info"><p>Accounting / Files / Voucher / Edit </p></div>
    <div class="row">
        <div class="col-lg-12">
        <div class="col-lg-7">
        <div class="panel panel-default">

    <div class="panel-body">
    <form id="addForm" class="form-horizontal" method="post" action="../../../../controlador/c_files/edit_voucher.php">

        <fieldset>
        <legend class="mibread"><strong>Voucher</strong></legend>
    <input name="id" type="hidden" class="form-control input-sm" required="" value="<?php echo $ns ?>" />
        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Type of accounty entry: </label>
              <div class="col-md-8">
                <input autocomplete="off" style="width: 60px;" maxlength="4" name="entry" type="text" class="form-control input-sm" required="" value="<?php echo $ent ?>" />
              </div>
        </div>
        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Name: </label>
              <div class="col-md-8">
                <input autocomplete="off" name="name" type="text" class="form-control input-sm" value="<?php echo $nom ?>"/>
              </div>
        </div>

        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Number: </label>
              <div class="col-md-8">
                <input autocomplete="off" name="number" type="text" class="form-control input-sm" onkeypress="return soloNumeros(event)" value="<?php echo $asi ?>" />
              </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Print: </label>
            <div class="col-md-8">
                <div class="input-group">
                    <select id="print" name="print" class="form-control input-sm">
                        <?php 
                            foreach ($formats as $key => $f) {
                                echo '<option value="'.$f['description'].'"';
                                if($f['description'] == $form){
                                    echo ' selected';
                                }

                                if($f['type_seat'] == ''){
                                    $type = 'Generic';
                                }else{
                                    $type = $f['type_seat'];
                                }
                                echo '>Type: '.$type.' - '.$f['description'].'</option>';
                            }
                        ?>
                    </select>
                    <div class="input-group-btn">
                        <buttom type="button" id="template" data-toggle="modal" data-target="#modalViewTemplate" class="btn btn-default input-sm" title="View Template"><i class="fa fa-eye"></i></buttom>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-group">
              <label class="col-md-4 control-label" for="name">Classification </label>
              <div class="col-md-8">
                <select class="form-control" name="idasi">
                    <?php foreach ((array)  $all as $data ) { ?>
                    <?php if ($idasi == $data['codasi'] ) {  ?>
                        <option style="background: turquoise;" value="<?php echo $data['codasi'] ?>" selected ><?php echo $data['nomasi'] ?> </option>
                    <?php }else{ ?>
                            <option value="<?php echo $data['codasi'] ?>" ><?php echo $data['nomasi'] ?> </option>
                    <?php  } } ?>
                </select>
              </div>
        </div>

        <div class="modal-footer">
            <button style="float: left;" type="submit" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a></button>
            <button style="float: right;" type="reset" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a></button>
            <span style="float: right"><a href="../../../../inicializador/vistas/app/in.php?cid=files/view_voucher" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
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