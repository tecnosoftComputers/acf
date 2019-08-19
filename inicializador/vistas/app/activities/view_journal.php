<?php
    require_once ("../../../datos/db/connect.php");
    $env = new DBSTART;
    $cc = $env::abrirDB();
?>
<style> .unselectable{background-color: #ddd;cursor: not-allowed;} </style>
<?php
    $userid = $_SESSION['usuario'];
    $stmt = $cc->prepare("SELECT * FROM dp01a110 ");
    $stmt->execute();
    $one = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $dp = $cc->prepare("SELECT * FROM DPNUMERO WHERE status='A'");
    $dp->execute();
    $fetch_dp = $dp->fetchAll(PDO::FETCH_ASSOC);

    // last
    $stmt2 = $cc->prepare("SELECT MAX(ASIENTO) as final FROM dpcabtra ");
    $stmt2->execute();
    $rows = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    foreach((array) $rows as $val) {
      $data_last  = $val['final'];
    }

     $superior = $cc->prepare("SELECT MIN(ASIENTO) AS minimo FROM dpmovimi");
        $superior->execute();
        $datoscabecera = $superior->fetchAll(PDO::FETCH_ASSOC);
        
        foreach((array) $datoscabecera as $datitos) {
          $asi = $datitos['minimo'];

        }

    $ben = $cc->prepare("SELECT * FROM finacli");
    $ben->execute();
    $bene = $ben->fetchAll(PDO::FETCH_ASSOC);


    // Rueda transaccional

    $tran = $cc->prepare("SELECT MAX(AUX) AS favorito FROM dpmovimi");
    $tran->execute();
    $fetch_tran = $tran->fetchAll(PDO::FETCH_ASSOC);
    foreach ((array) $fetch_tran as $key => $fetch_tran) {
      $fav = $fetch_tran['favorito'];
    }

    if ($fav == "" || $fav == 0) {
      $lande = 1;
      $land = str_pad($lande,8, "0", STR_PAD_LEFT);
    }else{
      //$lande = $fav + 1;
      $lande = $fav;
      $land = str_pad($lande,8, "0", STR_PAD_LEFT);
    }
?>


<div class="panel-body">
    <div class="modal fade" id="myModalJournal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="height:500px;overflow:auto; width: 830px; margin-left: -110px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Journal List</h4>
                </div>
                <div class="modal-body" >
                    <?php require_once ("../../../controlador/c_activities/c_list_journal_view.php"); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL  1 -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 850px; margin-left:-100px">
        
            <div class="modal-header">
                <h4>Plan de Cuentas</h4>
                <button type="button" class="close"  data-dismiss="modal">&times;</button>
            </div>
            
            <div class="modal-body">
    <div class="col-lg-12">
            <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body"> <!-- Nav tabs -->

                <!-- Tab panes -->  
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home-pills">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th width=100>Cuenta</th>
                        <th width=300>Nombre</th>
                        <th width=50>Select</th>
                    </tr>
                </thead>
<?php foreach( (array) $one as $registro2 ){ ?>
    <tbody>
        <tr class='odd gradeX'>
        <?php
            $var = $registro2['CODIGO'];
            $newvar = substr($var, -1);
            if ($newvar == '.'){ ?>
                <td><strong><?php echo $registro2['CODIGO'] ?></strong></td>
                <td><strong><?php echo $registro2['NOMBRE'] ?></strong></td>
                <?php echo '<td width=40> <a title="Error, no puede seleccionar una cuenta mayor" class="unselectable" href="#"><span class="badge" style="background-color:#1e6cb6; width:120px"><i class="fa fa-check"> Select</i></span></a></td>'; ?>     
            <?php }else{ ?>
                <!--$registro2['CODIGO'].-->
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $registro2['CODIGO'] ?></td>
                <td><?php echo $registro2['NOMBRE'] ?></td>
                <?php echo '<td width=40 data-toggle="modal" data-target="#myModal"> <a href="javascript:param_edit_banks_p(\''.$registro2['CODIGO'].'\');"><span class="badge" style="background-color:#1e6cb6; width:120px"><i class="fa fa-check"> Select</i></span></a></td>'; ?>
        <?php } ?>
        </tr>
    </tbody>
<?php } ?>
            </table>
        </div>
            </div>
        </div>
    </div><!--FIN PANEL DEFAULT-->
</div><!-- FIN COL 12 -->
            </div><!--FIN PANEL BODY-->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="buttonClose">Close</button>
            </div>
        </div><!-- FIN CONTENT-->
    </div><!-- FIN DIALOG -->
</div> <!--  FIN MODAL 1 -->

<script type="text/javascript" src="../../js/activities_journal.js"></script>
<script language="JavaScript" src="../../jquery/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../../jquery/jquery-1.9.1.min.s"></script>
<script src="../../jquery/jquery-1.12.1.min.js"></script>
<script src="../../query/jquery-ui.js"></script>
<div id="page-wrapper"><br />
<!--<div class="alert alert-info"><p>Accounting / Activities / Journal</p></div>-->
  <div class="row">
    <div class="col-lg-12">
      <!--<form action="../../../controlador/c_activities/c_add_journal_entries.php" method="post">
        
        <div class="form-group col-md-2">
                <label class="col-md-3 control-label" for="name">Buscar &nbsp;</label>
                    <div class="col-md-9">                    
                        <input placeholder="Number Journal" autocomplete="off" id="busca_journal" name="number" type="text" class="form-control input-sm" />
                    </div>
                </div>
      </form>-->
      <form id="formulario" action="../../../controlador/c_activities/c_add_journal_entries.php" method="post" >
        <div class="form-row">
          <div class="form-group col-md-3">
            &nbsp;
            &nbsp;<a href="../../../controlador/c_activities/op1.php">
                <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Previous">
                <i class="fa fa-arrow-circle-left" style="font-size: 15px;"></i></button></a>&nbsp;
               <a href="../../../controlador/c_activities/op2.php">
               <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="After">
               <i class="fa fa-arrow-circle-right" style="font-size: 15px;"></i></button></a>   &nbsp;&nbsp;&nbsp;

             <span class="btn btn-primary" data-toggle="modal" data-target="#myModalJournal">
                <i class="fa fa-search"></i></span> 
          </div>
          <div class="form-group col-md-2">
                  <label class="col-md-3 control-label" for="name">Type: </label>
                  <div class="col-md-9">
                    <select id="_seleccion" name="typejournal" class="form-control" style="font-size: 11px">
                        <?php foreach((array) $fetch_dp as $rest) { ?>              
                            <?php if ($tip == $rest['TIPO_ASI']){ ?>
                                <option value="<?php echo $rest['TIPO_ASI'] ?>" selected="" style="font-size: 11px"> <?php echo $rest['NOMBRE'] ?></option>
                            <?php }else{ ?>
                            <option value="<?php echo $rest['TIPO_ASI'] ?>" style="font-size: 11px"> <?php echo $rest['NOMBRE'] ?></option>
                        <?php } } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-1">
                    <input readonly="" autocomplete="off" id="_actual" name="actual" type="text" class="form-control input-sm" />
                </div>

                <div class="form-group col-md-3">
                  <label class="col-md-6 control-label" for="name">Number Journal </label>
                  <div class="col-md-6">
                      <input readonly="" autocomplete="off" value="<?php echo $land ?>" name="actual" type="text" class="form-control input-sm" />                    
                  </div>
                </div>
    
                <div class="form-group col-md-3">
                  <label class="col-md-3 control-label" for="name"> Date </label>
                  <div class="col-md-9">
                    <input required="" value="<?php echo date('Y-m-d'); ?>" autocomplete="off" name="date" type="date" class="form-control" />
                  </div>
            </div>
        </div> <!--FIN FORM ROW-->
            
        <div class="form-row">
            <div class="form-group col-md-8">
                <label class="col-md-1 control-label" for="name"> Memo</label>
              <div class="col-md-11">
                <input autocomplete="off" value="<?php echo @$con ?>" required="" id="_memo" name="memo" placeholder="" type="text" class="form-control input-sm" />
              </div>
            </div>

            <div class="form-group col-md-4">
                <label class="col-md-3 control-label" for="name"> Beneficiary</label>
                <div class="col-md-9">
                  <select class="form-control" name="benef">
                    <?php foreach((array) $bene as $dem) { ?>
                      <option value="<?php echo $dem["NOMEMP"] ?>"><?php echo $dem["NOMEMP"] ?></option>
                    <?php } ?>
                  </select>
                </div>
            </div>                        
        </div>

        <center><div class="form-group" style="margin-top: 18px; clear:both;">
        </div><h3 style="float: right; margin-top: -35px; font-weight: bold; ">&nbsp;<span class="badge badge-success" style="font-size:18px;"><?php  ?></span></h3></center>  
    </div> <!-- FIN COL-LG-12 -->
    </div> <!-- FIN ROW -->
    
    
    <div class="row">
    <div class="col-lg-12">    
      <div class="panel panel-default">
        <div class="panel-body">
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th></th>
                <th>Account</th>
                <th>Name</th>
                <th width=10>Type</th>
                <th>References</th>
                <th>Memo</th>
                <th>Debit</th>
                <th>Credit</th>
              </tr>
            </thead>
            <tbody>
                <tr class="odd gradeX">
                <td><span class="input-group-btn" style="margin-top: 5px;"> 
                    <button style="height: 20px;" type="button"  data-toggle="modal" data-target="#myModal"><i class="fa fa-search" style="font-size: 10px;"></i>
                </button> </span></td>
                  <input type="hidden" name="fav" value="<?php echo $lande ?>" />
                  <input type="hidden" name="asiento" value="<?php echo $land ?>" />
                  <td><input autocomplete="off" style="width: 140px; font-size: 12px" type="text" id="_accountycode" name="account" required="" /></td>
                    <td><input type="text" id="_accountyname" name="el_name" style="width: 240px; font-size: 12px" autocomplete="off" /></td>
                    <td><input style="width: 50px; font-size: 12px" type="text" name="el_type" /></td>
                    <td><input type="text" style="width: 170px; font-size: 12px" id="_references" name="el_ref" /> </td>
                    <td><input type="text" name="el_memo" id="_elmemo" style="width: 340px; font-size: 12px" /></td>
                    <td><input style="width: 70px; text-align:right; font-size: 12px" id="texto1" name="el_debit" value="0.00" /></td>
                    <td><input style="width: 70px; text-align:right; font-size: 12px" id="texto2" name="el_credit" value="0.00" /></td>
                    <td><button title="Add" type="submit" name="register"><i class="fa fa-check"></i></button></td>
                </tr>
            </tbody>
          </table>
        </form> <!--*** FIN FORMULARIO ***-->
    </div> <!-- FIN DE COL-LG-12  -->
  </div> <!-- FIN DE ROW -->
</div> <!-- FIN DE WRAPPER  -->

<script type="text/javascript">
  $(document).ready(function(){
    $('#busca_journal').blur(function(){
      $.ajax({
        type:"POST",
        data:"idpro=" + $('#busca_journal').val(),
        url:"../../../controlador/c_activities/busca_journal.php",
        success:function(r){
          dato=jQuery.parseJSON(r);
          $('#_references').val(dato['TIPO_ASI']);
          $('#_memo').val(dato['CONCEPTO']);
        }
      });
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#_seleccion').click(function(){
      $.ajax({
        type:"POST",
        data:"idpro=" + $('#_seleccion').val(),
        url:"../../../controlador/c_activities/busca_actual.php",
        success:function(r){
          dato=jQuery.parseJSON(r);
          $('#_actual').val(dato['ASIENTO']);
          $('#_actuali').val(dato['ASIENTO']);
        }
      });
    });
  });
</script>

<script>
  $(document).ready(function () {
    $("#texto1").keyup(function () {
      var value = $(this).val();
      $("#texto2").val('0.00');
    });

    $("#texto2").keyup(function () {
      var value = $(this).val();
      $("#texto1").val('0.00');
    });
  });
</script>

<script src="http://code.jquery.com/jquery-1.0.4.js"></script>
<script>
      $(document).ready(function () {
          $("#_memo").keyup(function () {
              var value = $(this).val();
              $("#_elmemo").val(value);
          });
      });
</script>