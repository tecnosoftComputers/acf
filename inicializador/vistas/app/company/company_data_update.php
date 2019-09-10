<?php
 require_once "../../../../constantes.php";
require_once FRONTEND_RUTA."init.php";
 if(isset($_SESSION['acfSession']["correo"]))  {

    require_once ("../head_unico.php");
    require_once ("../../../../datos/db/connect.php");
    //$emp = $_SESSION['acfSession']['id_empresa'];

    if (isset($_REQUEST['cid'])){
        $laid = $_REQUEST['cid'];

        $sql = DBSTART::abrirDB()->prepare("SELECT * FROM empresa WHERE id_empresa = '$laid' ");
        $sql->execute();
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $key => $value) {
            $p_id           = $value['id_empresa'];
            $p_name_emp     = $value['nombre_empresa'];
            $p_ciudad       = $value['ciudad'];
            $p_direccion    = $value['direccion_empresa'];
            $p_phone        = $value['telefono_empresa'];
            $p_fax          = $value['fax_empresa'];
            
            $p_correo       = $value['rentas_correo'];
            $p_tel          = $value['rentas_telefono'];
            $p_rep_l        = $value['rentas_rep_legal'];
            $p_rep_fax      = $value['rentas_fax'];
            $p_rep_ruc      = $value['rentas_ruc'];
            $p_rep_con      = $value['rentas_contador'];
            $p_rep_rco      = $value['rentas_ruc_contador'];
            $p_rep_aut      = $value['rentas_aut_sri'];
            $p_rep_tip      = $value['rentas_tipo_id'];
            $p_rep_idd      = $value['rentas_id'];
            $p_log          = $value['rentas_logo'];
            //$param = $value['empresas'];
        }
    //Consultar los dos permisos: accounting / operations
    //$new = $cc->prepare("SELECT * FROM config WHERE NOT id_config=2 AND NOT id_config=4 AND NOT id_config=5 AND NOT id_config=6 ");
    $new = DBSTART::abrirDB()->prepare("SELECT * FROM config");
    $new->execute();
    $all_new = $new->fetchAll(PDO::FETCH_ASSOC);
}
?>
<div id="page-wrapper"><br />
<div class="alert alert-info"><p>Company / Users / Update  <a style="float: right; color: #fff" href="../../../../inicializador/vistas/app/in.php?cid=company/company_data">Volver</a></p></div>
    <div class="row">
        <div class="col-lg-12">
        <h2>Update Company</h2>
        <div class="col-lg-7">
        <div class="panel panel-default">

    <div class="panel-body">
    <form action="../../../../controlador/c_company/company_edit.php" method="post" class="form-horizontal">
        <input type="hidden" name="laid" value="<?php echo $p_id ?>" />
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Nombre: </label>
              <div class="col-md-8">
                <input name="nombres" type="text" class="form-control input-sm" value="<?php echo $p_name_emp ?>" onkeypress="return caracteres(event)" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Ciudad: </label>
              <div class="col-md-8">
                <input name="ciudad" type="text" class="form-control input-sm" value="<?php echo $p_ciudad ?>" onkeypress="return caracteres(event)" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Dirección: </label>
              <div class="col-md-8">
                <input name="direccion" type="text" class="form-control input-sm" value="<?php echo $p_direccion ?>" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Teléfono No: </label>
              <div class="col-md-8">
                <input name="tel" type="text" class="form-control input-sm" value="<?php echo $p_phone ?>" onkeypress="return soloNumeros(event)" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Fax No: </label>
              <div class="col-md-8">
                <input name="fax" type="text" class="form-control input-sm" value="<?php echo $p_fax ?>" />
              </div>
            </div>

            <!--<nav aria-label="breadcrumb" > 
              <ol class="breadcrumb" style="background-color: #bdb8b8bf; ">
                <li class="breadcrumb-item" style="color: #333;">Datos para el servicio de Rentas</li>
              </ol>
            </nav>


            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Correo Electrónico: </label>
              <div class="col-md-8">
                <input name="r_correo" type="text" class="form-control input-sm" value="<?php // echo $p_correo ?>" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Telefono: </label>
              <div class="col-md-8">
                <input name="r_telefono" type="text" class="form-control input-sm" value="<?php // echo $p_tel ?>" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Representante Legal: </label>
              <div class="col-md-8">
                <input name="r_rep_legal" type="text" class="form-control input-sm" value="<?php // echo $p_rep_l ?>" />
              </div>
            </div>
        
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Fax: </label>
              <div class="col-md-8">
                <input name="r_fax" type="text" class="form-control input-sm" value="<?php // echo $p_rep_fax ?>" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Ruc: </label>
              <div class="col-md-8">
                <input name="r_ruc" type="text" class="form-control input-sm" value="<?php // echo $p_rep_ruc ?>" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Contador: </label>
              <div class="col-md-8">
                <input name="r_contador" type="text" class="form-control input-sm" value="<?php // echo $p_rep_con ?>" />
              </div>
            </div>
        
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Ruc Contador: </label>
              <div class="col-md-8">
                <input name="r_ruc_contador" type="text" class="form-control input-sm" value="<?php // echo $p_rep_rco ?>" />
              </div>
            </div>
                  
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Autorización S.R.I..: </label>
              <div class="col-md-8">
                <input name="r_aut_sri" type="text" class="form-control input-sm" value="<?php // echo $p_rep_aut ?>" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Tipo Identificación: </label>
              <div class="col-md-8">
                <input name="r_tipo_i" type="text" class="form-control input-sm" value="<?php // echo $p_rep_tip ?>" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Identificación: </label>
              <div class="col-md-8">
                <input name="r_iden" type="text" class="form-control input-sm" value="<?php // echo $p_rep_idd ?>" />
              </div>
            </div>-->
            
            
            
            <div class="form-group" style="margin-top: 18px; clear:both; float:right">
                <button type="submit" name="update" class="btn btn-success btn-small"> <i class="fa fa-check"> Save</i> </button>
            </div>
	</form>
        </div>
        </div>
<br />
        </div>
        
        <div class="col-lg-5">
            <center> <h3>Image Company</h3>
            
            <?php if ($p_log == '') { ?>
                <img style="border:  3px solid lightblue;" src="../../../../inicializador/img/sinfoto.png" class="img" width="250" /></center>
                
                <form action="../../../../controlador/c_company/company_edit_img.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="empresa" value="<?php echo $p_id ?>" />
                <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Cambiar Imagen: </label>
                  <div class="col-md-8">
                    <input type="file" name="img" class="form-control input-sm" />
                  </div>
                </div>  
                
                <input type="submit" name="upd" class="btn btn-success" value="Edit Image" style="float: right;" />  
            </form>    
            <?php }else{ ?>
            <img style="border:  3px solid lightblue;" src="../../../../inicializador/img/<?php echo $p_log ?>" class="img" width="350" /></center>
            
            <form action="../../../../controlador/c_company/company_edit_img.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="empresa" value="<?php echo $p_id ?>" />
                <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Cambiar Imagen: </label>
                  <div class="col-md-8">
                    <input type="file" name="img" class="form-control input-sm" />
                  </div>
                </div>  
                
                <input type="submit" name="upd" class="btn btn-success" value="Edit Image" style="float: right;" />  
            </form>
            
            <?php } ?>
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