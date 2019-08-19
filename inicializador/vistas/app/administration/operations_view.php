<?php
	require_once ("../../../datos/db/connect.php");
	$env = new DBSTART;
	$cc = $env::abrirDB();
?>

<style>.ast{color:red}</style>

<?php $empresa = $_SESSION['id_empresa']; ?>

<script type="text/javascript" src="../../js/cs_users.js"></script>

<div id="page-wrapper"><br />
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Administration</li>
        <li class="breadcrumb-item active"> Operations</li>
      </ol>
    </nav>

    <div class="row">
        <div class="col-md-6" style="margin-top: -20px"><h2><i class="fa fa-random"></i> Operations</h2></div>
        <div class="col-md-6">
            <button class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModal2" style="float: right;">Nuevo</button></span>
        </div>
    </div>

<div class="row">
    <div class="col-lg-12">
<?php
	if (isset($_POST['update'])) {
	   require_once ("../../../controlador/c_users/act_users.php");
    }

?>

<?php

	if (isset($_POST['newuser'])) {

	   require_once ("../../../controlador/c_users/reg_users.php");

    }

?>

<!--  INICIO     FORMULARIO PARA EL REGISTRO-->

<div class="panel-body">
    <!-- Modal -->

    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title" id="myModalLabel">New User</h4>

                </div>

                <div class="modal-body">

<fieldset class="field">

    <legend class="ley">LLenar el formulario</legend>

    <form method="post">

        <input type="hidden" name="id_empresa" value="<?php echo $empresa ?>" />

        <div class="form-row">

            <div class="form-group col-md-6">

                <label><span class="ast">*</span> User Name</label>

                <input type="text" name="username" class="form-control" required="" />

            </div>

            <div class="form-group col-md-6">

                <label> Password</label>

                <input type="password" name="passw" class="form-control" />

            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-12">

                <label> Name and Surname</label>

                <input type="text" name="nameuser" class="form-control" />

            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-6">

                <label> Position</label>

                <input type="text" name="position" class="form-control" />

            </div>

        

            <div class="form-group col-md-6">

                <label> Phone</label>

                <input type="text" name="phone" class="form-control" onkeypress="return soloNumeros(event)"  />

            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-6">

                <label> E-amil:</label>

                <input type="text" name="mail" class="form-control" />

            </div>

            <div class="form-group col-md-6">

                <label> Initial System</label>

                <input type="text" name="initial" class="form-control" />

            </div>

        </div>

        <div class="form-group col-lg-8" style="margin-top: 18px;">

            <input type="submit" value="Save" name="newuser" class="btn btn-info btn-small"/>

            <input type="reset" value="Devolver" class="btn btn-warning btn-small"/>

        </div>

    </form>

</fieldset>

    </div>

    </div>

    </div></div></div>

<!--FIN   FORMULARIO PARA EL REGISTRO-->





</div>

 </div>



 <div class="row">

    <div class="col-lg-8">
        <input style="background-color: #a8f1b859" class="form-control" type="text" placeholder="Busca por cédula, nombres, celular, correo.." id="bs-prod"/><br>
        <div class="form-group">

            <div class="registros" id="agrega-registros"></div>            

            <center>

                <ul class="pagination" id="pagination"></ul>

            </center>

     	</div>

	</div>

    <div class="col-lg-4" style="margin-top: 0px;">
        <?php include ("default/notify.php") ?>
    </div>
    

    
<div class="panel-body">
    <!-- Modal -->
    <div class="modal fade" id="myModa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">New User</h4>
                </div>
                <div class="modal-body">
    <fieldset class="field">

    <legend class="ley">LLenar el formulario</legend>

    <form id="formulario" method="post">

        <input type="hidden" readonly="readonly" id="pro" name="pro"/>

        <input type="hidden" name="id_empresa" value="<?php echo $empresa ?>" />

        <input type="hidden" id="_id_user" name="id_user" />

        <div class="form-row">

            <div class="form-group col-md-6">

                <label><span class="ast">*</span> User Name</label>

                <input type="text" id="_username" name="username" class="form-control" required="" />

            </div>

            <div class="form-group col-md-6">

                <label> Password</label>

                <input type="text" id="_password" name="passw" class="form-control" onkeypress="return caracteres(event)" />

            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-12">

                <label> Name and Surname</label>

                <input type="text" id="_nameusername" name="namesurname" class="form-control" />

            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-6">

                <label> Position</label>

                <input type="text" id="_position" name="position" class="form-control"  />

            </div>

        

            <div class="form-group col-md-6">

                <label> Phone</label>

                <input type="text" id="_phone" name="phone" class="form-control" onkeypress="return soloNumeros(event)"  />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label> E-amil:</label>
                <input type="text" id="_email" name="mail" class="form-control" />
            </div>
            <div class="form-group col-md-6">
                <label> Initial System</label>
                <input type="text" id="_initial" name="initial" class="form-control" />
            </div>
        </div>

        <div class="form-group col-lg-8" style="margin-top: 18px;">
            <input type="submit" value="Edit" name="update" class="btn btn-info btn-small"/>
            <input type="reset" value="New" class="btn btn-warning btn-small"/>
        </div>
    </form>
</fieldset>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
</div>
<br /><br /><br />