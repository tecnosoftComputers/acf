<?php
	require_once ("../../../datos/db/connect.php");
	$env = new DBSTART;
	$cc = $env::abrirDB();
?>

<script type="text/javascript" src="../../js/cs_company_data.js"></script>
<div id="page-wrapper"><br />
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Company</li>
        <li class="breadcrumb-item active"> Company Data</li>
      </ol>
    </nav>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-pills">
                    <li class="active"><a href="#home-pills" data-toggle="tab"><i class="fa fa-list-alt"></i> List Company</a></li>
                    <li><a href="#profile-pills" data-toggle="tab"><i class="fa fa-check"></i> New Company</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home-pills"><br />              
                        <?php require_once ("../../../controlador/c_company_data/c_list_company.php"); ?>
                    </div>
                    
<!-- /. New Company -->
<div class="tab-pane fade" id="profile-pills"><br />
    <div class="panel panel-default">

<div class="panel-body">
    <div class="row">
        <div class="col-lg-7">

        <form action="../../../controlador/c_company/company_add.php" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Nombre: </label>
              <div class="col-md-8">
                <input id="_nombres" name="nombres" type="text" class="form-control input-sm" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Ciudad: </label>
              <div class="col-md-8">
                <input id="_ciudad" name="ciudad" type="text" class="form-control input-sm" onkeypress="return caracteres(event)" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Dirección: </label>
              <div class="col-md-8">
                <input id="_direccion" name="direccion" type="text" class="form-control input-sm" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Teléfono No: </label>
              <div class="col-md-8">
                <input id="_tel" name="tel" type="text" class="form-control input-sm" onkeypress="return soloNumeros(event)" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Fax No: </label>
              <div class="col-md-8">
                <input id="_fax" name="fax" type="text" class="form-control input-sm" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Logo: </label>
              <div class="col-md-8">
                <input type="file" name="img" class="form-control input-sm" />
              </div>
            </div>
            
            <div class="form-group" style="margin-top: 18px; clear:both; float:right">
                <button type="submit" name="register" class="btn btn-success btn-small"> <i class="fa fa-check"> Save</i> </button>
            </div>
	</form>
        </div><!-- FIN COL-LG-7-->
        
	</div> <!-- ./ F I N   R O W   F O R M -->
 
    
                                    </div> <!-- F I N  P A N E L   B O D Y -->
                                </div>
                            </div> <!-- F I N   T A B  -->
                        </div> <!-- F I N     T A B    C O N T E N T -->
                    </div>
                    </div>
                </div> <!-- col sm 12 -->
            </div><!-- ROW -->
        </div>
<script>
    function preguntar(id) {
            if (confirm('Esta seguro que desea eliminar ' + id + '?')){
                window.location.href = "../../../controlador/c_company_data/delete.php?id="+ id;
            }
        }
    </script>
    
    <script>
    function preguntarActivar(id) {
        if (confirm('Esta seguro que desea activar esta empresa ' )){
            window.location.href = "../../../controlador/c_company_data/activar_company.php?id="+ id;
        }
    }
    </script>