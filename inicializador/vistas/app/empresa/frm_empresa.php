<?php require_once ("../../../datos/db/connect.php"); ?>

<?php $empresa = $_SESSION['id_empresa']; ?>
<?php 

    $stmt = DBSTART::abrirDB()->prepare("SELECT * FROM c_roles");
    $stmt->execute();
    $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
    $sql = DBSTART::abrirDB()->prepare("SELECT * FROM c_pais ORDER BY nom_pais");
    try {
        $sql->execute();
        $results = $sql->fetchAll();
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
?>

<?php
    $prov = DBSTART::abrirDB()->prepare("SELECT * FROM c_provincia ORDER BY provincia");
    try {
        $prov->execute();
        $results_prov = $prov->fetchAll();
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
?>

<?php
    $ciu = DBSTART::abrirDB()->prepare("SELECT * FROM c_ciudad ORDER BY ciudad");
    try {
        $ciu->execute();
        $results_ciu = $ciu->fetchAll();
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
?>
<script type="text/javascript" src="../../js/consulta_empresa.js"></script>
<div id="page-wrapper"><br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Config. y Administración</li>
    <li class="breadcrumb-item active">Empresa</li>
  </ol>
</nav>
    <div class="row">
        <div class="col-lg-4">
            <p>Los campos con (*) son obligatorios</p><hr />

            <form id="formulario" method="post">
            <input type="hidden" required="required" readonly="readonly" id="pro" name="pro"/>
            
            <div class="form-row">
                 <div class="form-group col-md-12">
                        <label><span class="ast">*</span> País</label>
                                <select id="pais" name="pais" onChange="showState(this);" class="form-control">
                                    <option value="">Seleccione</option>
                                    <?php foreach ($results as $rs) { ?>
                                        <option value="<?php echo $rs["id_pais"]; ?>"><?php echo $rs["nom_pais"]; ?></option>
                                    <?php } ?>
                                </select>
                        </div>
                 </div>
                 <div class="form-row">
                    <div class="form-group col-md-12">
                    <label><span class="ast">*</span> Provincia</label>
                    <select name="miprovincia" id="miprovincia" class="form-control">                    
                        <option value="0">Seleccione</option>
                        <?php
	                       foreach ( (array) $results_prov as $content ) { ?>
                            <option value="<?php echo $content['id_provincia']?>"><?php echo $content['provincia']?></option>
                        <?php } ?>                    
                    </select>
                        <td align="center" height="50"><div id="output1"></div> </td>
                    </div>
                    
                     <div class="form-group col-md-12">
                     <label><span class="ast">*</span> Ciudad</label>
                     <select name="ciudad" id="ciudad" class="form-control">                    
                        <option value="0">Seleccione</option>
                        <?php
	                       foreach ( (array) $results_ciu as $con ) { ?>
                            <option value="<?php echo $con['id_ciudad']?>"><?php echo $con['ciudad']?></option>
                        <?php } ?>                    
                    </select>
                        <td align="center" height="50"><div id="output2"></div> </td>
                    </div>                   
                    
                 </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label><span class="ast">*</span> Ruc</label>
                    <input type="text" id="ruc" name="ruc" class="form-control" required="" onkeypress="return soloNumeros(event)" />
                </div>

                <div class="form-group col-md-6">
                    <label><span class="ast">*</span> Nombre</label>
                    <input type="text" id="nombres" name="nombres" class="form-control" required="" />
                </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label><span class="ast">*</span> Dirección</label>
                        <input type="text" id="direccion" name="direccion" class="form-control" required="" />
                    </div>
    
                    
                    <div class="form-group col-md-6">
                        <label><span class="ast">*</span> Teléfono</label>
                        <input type="text" id="telefono" maxlength="13" name="telefono" class="form-control" required="" onkeypress="return soloNumeros(event)" />
                    </div>
                </div>
                
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label><span class="ast">*</span> Correo de Contacto</label>
                        <input type="email" id="correo" name="correo" class="form-control" required="" />
                    </div>
                </div>                
                
                
                <!--
                <div class="form-row">   
                <div class="form-group col-md-12">
                    <label> Observacion</label>
                    <input type="text" id="observacion" name="observacion" class="form-control" required="" />
                </div>
              </div>
-->
              <hr />
              
               
              <div class="form-group">
                <input type="submit" value="Registrar" id="register" name="register" class="btn btn-primary btn-small" id="reg"/>
                <input type="reset" value="Nuevo" name="register" class="btn btn-warning btn-small"/>
              </div>
              
            </form>
            
<?php

    if (isset($_POST['register'])) {
        require_once ("../../../controlador/c_empresa/reg_empresa.php");
    }
    
?>

<div class="modal fade" id="successModal" tabindex="-1" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content" style="box-shadow: 0 5px 15px rgba(111, 99, 57, 0.9); margin-top:150px">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">TECNICENTRO SAN GABRIEL</h4>
              </div>
              <div class="modal-body">
                  <p>Empresa registrada con exito!</p>                     
              </div>    
            </div>
          </div>
        </div>

            <br />
        </div>

        <div class="col-lg-8">
            





        <div class="panel panel-default">                
            <div class="panel-body">
                <img src="../../../inicializador/img/fondo.JPG" class="img" width="100% " />
            </div>
        </div>

      <div data-spy="scroll" class="tabbable-panel">
        <div class="tabbable-line">
          <ul class="nav nav-tabs ">
            <li class="active">
              <a href="#tab_default_1" data-toggle="tab">
              Datos Principales </a>
            </li>
            <li>
              <a href="#tab_default_2" data-toggle="tab">
             Misión</a>
            </li>
            <li>
              <a href="#tab_default_3" data-toggle="tab">
             Visión</a>
            </li>
             <li>
              <a href="#tab_default_4" data-toggle="tab">
             Contacto</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_default_1">
 
              <p>
                My daughter  is good looking, with pleasant personality, smart, well educated, from well cultural and  a religious family background. having respect in heart for others.  
                would like to thanks you for visiting through my daughter;s profile. 
                She has done PG in Human Resources after her graduation. 
                At present working IN INSURANCE sector as Manager Training .
              </p>
              <h4>About her Family</h4>
              <p>
                About her family she belongs to a religious and a well cultural family background. 
                Father - Retired from a Co-operate Bank as a Manager. 
                Mother - she is a home maker. 
                1 younger brother - works for Life Insurance n manages cluster. 
              </p>
              <h4>Education </h4>
              <p>I have done PG in Human Resourses</p>
              <h4>Occupation</h4>
              <p>At present Working in Insurance sector</p>
           
            </div>
            <div class="tab-pane" id="tab_default_2">
              <p>
                Education& Career
              </p>
              <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                     <label for="email">Highest Education:</label>
                      <p> MBA/PGDM</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
              </div>
              <div class="col-sm-6">
                 <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>

               </div>
              </div>

             
           
            </div>
            <div class="tab-pane" id="tab_default_3">
              <p>
                Family Details
              </p>
              <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                     <label for="email">Highest Education:</label>
                      <p> MBA/PGDM</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
              </div>
              <div class="col-sm-6">
                 <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>

               </div>
              </div>
            </div>
             <div class="tab-pane" id="tab_default_4">
              <p>
               Lifestyle

              </p>
               <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                     <label for="email">Highest Education:</label>
                      <p> MBA/PGDM</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
              </div>
              <div class="col-sm-6">
                 <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>

               </div>
              </div>
            </div>
          </div>
        </div>









































            <div class="registros" id="agrega-registros"></div>
            
            <center>
                <ul class="pagination" id="pagination"></ul>
            </center>
     	</div>
	</div>
</div><br /><br /><br />

<script src="../../js/jquery-1.9.0.min.js"></script>
<script>
    function showState(sel) {
        var country_id = sel.options[sel.selectedIndex].value;
        $("#output1").html("");
        $("#output2").html("");
        if (country_id.length > 0) {
            $.ajax({
                type: "POST",
                url: "../../../controlador/c_empresa/fetch_provincia.php",
                data: "country_id=" + country_id,
                cache: false,
                beforeSend: function() {
                //$('#output1').html('<img src="loader.gif" alt="" width="24" height="24">');
                },
                success: function(html) {
                    $("#output1").html(html);
                }
            });
        }
    }
    
    function showCity(sel) {
        var state_id = sel.options[sel.selectedIndex].value;
        if (state_id.length > 0) {
            $.ajax({
                type: "POST",
                url: "../../../controlador/c_empresa/fetch_ciudad.php",
                data: "state_id=" + state_id,
                cache: false,
                beforeSend: function() {
                    //$('#output2').html('<img src="loader.gif" alt="" width="24" height="24">');
                },
                success: function(html) {
                    $("#output2").html(html);
                }
            });
        } else {
            $("#output2").html("");
        }
    }
</script>


<script>
function ActDesactCampotipoFiltro(){
    
   var filtro=document.frm.miprovincia.value;
   //alert(filtro);
   if(filtro != "")
     {
     // alert(filtro);
      document.frm.register.disabled=false;
      document.frm.medida.disabled=false;
    } else {
      document.frm.filtro.value='';
      document.frm.medida.value='';
      document.frm.filtro.disabled=true;
      document.frm.medida.disabled=true;  
     }   
  }
</script>
