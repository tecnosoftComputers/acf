<?php
 session_start();
 if(isset($_SESSION['acfSession']["correo"])) {

    require_once ("../head_unico.php");
    require_once ("../../../../datos/db/connect.php");
	$env = new DBSTART;
	$cc = $env::abrirDB();
    
    if (isset($_REQUEST['cid'])){
        $laid = $_REQUEST['cid'];
        
        // Consultar si hay un asiento superior al anterior
        $superior = $cc->prepare("SELECT m.ASIENTO, m.FECHA_ASI, m.CONCEPTO, m.TIPO_ASI, m.BENEFICIAR FROM dpmovimi as m LEFT JOIN dpcabtra c ON c.ASIENTO = m.ASIENTO WHERE m.ASIENTO = '$laid'");
        $superior->execute();
        $cant = $superior->rowCount();
        $datoscabecera = $superior->fetchAll(PDO::FETCH_ASSOC);
        
        if ($cant > 0) {
            foreach((array) $datoscabecera as $datitos) {
                $tip = $datitos['TIPO_ASI'];
                $fec = $datitos['FECHA_ASI'];
                $con = $datitos['CONCEPTO'];
                $asi = $datitos['ASIENTO'];
                $bene = $datitos['BENEFICIAR'];
            }
        }else{
            $asi = $laid;
        }
        
        //$sing = $cc->prepare("SELECT * FROM dpcabtra c INNER JOIN dpmovimi m ON m.ASIENTO = c.ASIENTO WHERE m.ASIENTO='$asi' ");
        $sing = $cc->prepare("SELECT * FROM dpcabtra WHERE ASIENTO='$asi' ");
        $sing->execute();
        $all_sing = $sing->fetchAll(PDO::FETCH_ASSOC);
    }
?>
<style> .unselectable{background-color: #ddd;cursor: not-allowed;}

.isDisabled {
  color: currentColor;
  cursor: not-allowed;
  opacity: 0.5;
  text-decoration: none;
} </style>
<?php
    $userid = $_SESSION['acfSession']['usuario'];
    $stmt = $cc->prepare("SELECT * FROM dp01a110 ");
    $stmt->execute();
    $one = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $sql = $cc->prepare("SELECT * FROM usuarios WHERE id_usuario='$userid' AND estado='A' ");
    $sql->execute();
    $fetch = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    $dp = $cc->prepare("SELECT * FROM DPNUMERO WHERE status='A'");
    $dp->execute();
    $fetch_dp = $dp->fetchAll(PDO::FETCH_ASSOC);
  
    foreach((array) $fetch as $results) {
        $laid = $results['id_usuario'];
        $username = $results['namesurname'];
    }
    
    // Sumas
    $suma = $cc->prepare("SELECT SUM(DEBITOS) AS sum_debitos, SUM(CREDITOS) AS sum_creditos FROM dpcabtra WHERE ASIENTO='$asi'");
    $suma->execute();
    $all_suma = $suma->fetchAll(PDO::FETCH_ASSOC);
    
    foreach((array) $all_suma as $suma_datos) {
        $s1 = $suma_datos['sum_debitos'];
        $s2 = $suma_datos['sum_creditos'];
        
        
        if ($s1 > $s2) { // El debito es mayor a credito
            $mensaje = "Credito";
            $resta = ($s1 - $s2);
        }else{
            $mensaje = "Debito";
            $resta = ($s2 - $s1);
        }
    }

    $ben = $cc->prepare("SELECT * FROM finacli");
    $ben->execute();
    $benes = $ben->fetchAll(PDO::FETCH_ASSOC);

   $cerrado = $cc->prepare("SELECT * FROM dpmovimi WHERE ASIENTO='$asi' AND DB=1 AND CR=0");
   $cerrado->execute();
   $co = $cerrado->rowCount();

   if ($co == 0) {
      $message_context = "";
      $disabled = "";
   }else{
      $message_context = '<h4 style="color: coral; font-weight:bold">Journal Closed</h4>';
      $disabled = "disabled";
   }

?>
<!--<script type="text/javascript" src="../../../js/files_banks.js"></script>-->
<!--<script type="text/javascript" src="../../../js/jsFunctions.js"></script>-->
<script type="text/javascript" src="../../../js/activities_journal.js"></script>
<script language="JavaScript" src="../../../jquery/jquery-1.5.1.min.js"></script>
<script src="../../../jquery/jquery-1.12.1.min.js"></script>
<script src="../../../query/jquery-ui.js"></script>

<script type="text/javascript">
    function updateJournal(){
        var rp = confirm("Update?");

        if (rp == true) {
            return true;
        }else{
            return false;
        }
    }
</script>

<div id="page-wrapper">

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
                        <th width=450>Cuenta</th>
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
            <?php echo '<td width=40 data-toggle="modal" data-target="#myModal"> <a href="javascript:param_edit_banks(\''.$registro2['CODIGO'].'\');"><span class="badge" style="background-color:#1e6cb6; width:120px"><i class="fa fa-check"> Select</i></span></a></td>'; ?>
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

<!-- MODAL  SEARCH -->

<div class="panel-body">
    <div class="modal" id="myModalJournal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="height:500px;overflow:auto; width: 1000px; margin-left: -210px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Journal List</h4>
                </div>
                <div class="modal-body" >
                    <?php require_once ("../../../../controlador/c_activities/c_list_journal.php"); ?>
                </div>
            </div>
        </div>
    </div>
</div>
                        
                        
<!-- MODAL  MEMORIZED -->
<div class="panel-body">
    <div class="modal" id="myModalMemorized" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="height:500px;overflow:auto; width: 830px; margin-left: -110px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">List Journal Memorize</h4>
                </div>
                <div class="modal-body">
                    <?php require_once ("../../../../controlador/c_activities/c_list_memorized.php"); ?>
                </div>
            </div>
        </div>
    </div>
</div>




<!--<div class="alert alert-info"><p>Accounting / Activities / Journal Entries </p></div>--><br>
    <div class="row" id="content" style="margin-top: -60px">
        <div class="col-lg-12">
        
    <form id="formulario" action="../../../../controlador/c_activities/c_add_journal_entries.php" method="post">
        <div class="form-row">
        
            <div class="form-group col-md-4">
                &nbsp;<a href="../../../../controlador/c_activities/op1.php">
                <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Previous">
                <i class="fa fa-arrow-circle-left" style="font-size: 15px;"></i></button></a>&nbsp;
               <a href="../../../../controlador/c_activities/op2.php">
               <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="After">
               <i class="fa fa-arrow-circle-right" style="font-size: 15px;"></i></button></a> &nbsp;&nbsp;&nbsp;
            
        <?php if ($co > 0) {
            
        }else{ ?>
            <a class="btn btn-primary" title="Memorize" data-toggle="collapse" data-target="#footwear" aria-expanded="false" aria-controls="footwear">
                <span><i class="fa fa-star-o"></i></span>
            </a>&nbsp;&nbsp;
            


        <?php if ($resta == 0 AND $s1 > 0 AND $s2 > 0) { ?>
            <a href="../../../../controlador/c_activities/save_journal.php?cid=<?php echo $asi ?>">
                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Save Journal">
            <span><i class="glyphicon glyphicon-floppy-disk"></i></span>
            </button>&nbsp;</a>
            </button>&nbsp;</a>
        <?php }else{ ?>
            <a >
                <button type="button" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Save Journal">
            <span><i class="glyphicon glyphicon-floppy-disk"></i></span>
            </button>&nbsp;</a>
        <?php } ?>
            <a style="text-decoration: none;" href="../../../../controlador/c_activities/save_journal.php?cid=<?php echo $asi ?>">
                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Reverse Transaction">
            <i class="fa fa-refresh"></i>
            </button>&nbsp;</a>
    <?php } ?>
            </button>
            <!--<a style="text-decoration: none;">
                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Print Journal">
            <span><i class="fa fa-print"></i></span>
            </button>&nbsp;</a>-->
            
            <span class="btn btn-primary" data-toggle="modal" data-target="#myModalJournal">
                <i class="fa fa-search"></i></span>
            
    <?php if ($co > 0) { ?>
            
        <a href="../../../../controlador/c_activities/updateJournalParam.php?cid=<?php echo $asi ?>">
        <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Update Journal" onclick="return updateJournal()">
            <span><i class="fa fa-rotate-right"></i></span>
        </button>&nbsp;&nbsp;</a>
        
        <button type="button" class="btn btn-primary" onclick="deleteJournal(<?php echo $asi; ?>)">
            <i class="fa fa-trash"></i>
        </button>&nbsp;&nbsp;
        
        <?php } ?>        
        
            </div>
            <div class="form-group col-md-2">
                <label class="col-md-3 control-label" for="name">Type: </label>
                <div class="col-md-9">
                    <select id="_seleccion" name="typejournal" class="form-control" style="font-size: 11px" <?php echo $disabled ?>>
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
                    <input readonly="" autocomplete="off" value="<?php echo $asi ?>" name="actual" type="text" class="form-control input-sm" />                    
                  </div>
                </div>
    
                <div class="form-group col-md-2">
                  <label class="col-md-2 control-label" for="name"> Date </label>
                  <div class="col-md-10">
                    <input required="" data-date-format="MMMM DD YYYY" style="width: 150px;" value="<?php echo $fec ?>" autocomplete="off" name="date" placeholder="COMPRAS" type="date" class="form-control input-sm" <?php echo $disabled ?> />
                  </div>
                </div>
            </div>

            <div style="clear: both;"></div>
            <div class="collapse" id="footwear" style="margin-right: 200px">
                <button type="submit" name="memor" class="btn btn-primary">Memorize Journal</button>
                <span class="btn btn-primary" data-toggle="modal" data-target="#myModalMemorized">
                List Memorize</span>
            </div><br />

        <div class="form-row">
            <div class="form-group col-md-8">
                <label class="col-md-1 control-label" for="name"> Memo</label>
              <div class="col-md-11">
                <input autocomplete="off" name="memo" value="<?php echo @$con ?>" id="_memo" placeholder="" type="text" class="form-control input-sm" <?php echo $disabled ?> />
              </div>
            </div>
            
            <div class="form-group col-md-4">
                <label class="col-md-3 control-label" for="name"> Beneficiary</label>
                <div class="col-md-9">
                <select class="form-control" name="benef" <?php echo $disabled ?>>
                    <?php if ($bene == "") {
                        foreach((array) $benes as $dem) { ?>
                            <option value="<?php echo $dem["NOMEMP"] ?>"><?php echo $dem["NOMEMP"] ?></option>
                       <?php }

                    }else{
                        foreach((array) $benes as $dem) { ?>
                            <?php if ($bene == $dem["NOMEMP"]){ ?>
                            <option style="background-color: turquoise" value="<?php echo $dem["NOMEMP"] ?>" selected="">
                                <?php echo $dem["NOMEMP"] ?></option>
                        <?php }else{ ?>
                      <option value="<?php echo $dem["NOMEMP"] ?>"><?php echo $dem["NOMEMP"] ?></option>
                    <?php } } } ?>
                  </select>
                  </div>
            </div>
        </div>
    
        <!--<div class="form-row">
            <div class="form-group col-md-3">
               <button type="button" style="border: none; background-color: #fff; cursor: not-allowed;" href="#"><?php // echo $message_context ?></button>
               
        
            </div>
            <div class="form-group col-md-3">
                <h3 style="float: right; margin-top: 0px; font-weight: bold; ">Journal&nbsp;
                <span class="badge" style="font-size:18px; background-color: #1e6cb6 "><?php // echo $asi ?></span></h3>
            </div>
        </div>-->
    
    
    </div> <!-- FIN COL-LG-12 -->
    </div> <!-- FIN ROW -->
    <br />
        
    <div class="row">
    <div class="col-lg-12">    
        <div class="panel panel-default" style="border: 3px solid darkgray; margin-top: -30px">
                <div class="panel-body">
                    <table width="100%" class="" id="dataTables-example">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Account</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>References</th>
                                <th>Memo</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                             foreach ((array) $all_sing as $send) { ?>
                                <tr class="odd gradeX" >
                                <td></td>
                                <input type="hidden" name="asiento" value="<?php echo $asi ?>" />
                                <input name="punto" style="width: 140px; font-size: 12px" type="hidden" value="<?php echo $send['IDCONT'] ?>" />
                                <td><input style="width: 140px; font-size: 12px" type="" value="<?php echo $send['account_aux'] ?>" name="account" autocomplete="off" <?php echo $disabled ?> /></td>
                                <td><input type="text" name="name_account" <?php echo $disabled ?> value="<?php echo $send['account_n_aux'] ?>" style="width: 240px; font-size: 12px" /></td>
                                <td><input type="text" <?php echo $disabled ?> style="width: 50px; font-size: 12px" value="<?php echo $send['TIPO_ASI'] ?>" /></td>
                                <td><input type="text" <?php echo $disabled ?> style="width: 170px;" id="_references" name="el_ref" /> </td>
                                <td><input type="text" <?php echo $disabled ?> style="width: 340px; font-size: 12px" name="memos" value="<?php echo $send['DESC_ASI'] ?>" /></td>
                                <td><input <?php echo $disabled ?> style="width: 70px; text-align:right; font-size: 12px" type="text" name="dd" value="<?php echo $send['DEBITOS'] ?>" /></td>
                                <td><input <?php echo $disabled ?> type="text" name="cc" style="width: 70px; text-align:right; font-size: 12px" value="<?php echo $send['CREDITOS'] ?>" /></td>
                                
                                <?php if ($co == 0) { ?>
                                <td><a href="../../../../controlador/c_activities/c_add_journal_transact.php?reverse=<?php echo $send['IDCONT'] ?>"  type="submit"><i class="fa fa-refresh" style="font-size: 13px;"></i></button></td>
                                <td><button style="border: none; background: #fff;;" type="button" onclick="ConfirmDelete(<?php echo $send['IDCONT'] ?>)" name="deleted"><i class="fa fa-trash" style="font-size: 13px;"></i></button></td>
                                <?php }else{ ?>
                                 
                            <?php } } ?>
                        </tbody>
                        <br />
        <?php if ($co == 0) { ?>
            <tbody>
                <tr class="odd gradeX">                    
                    <input type="hidden" name="asientos" value="<?php echo $asi ?>" />
                    <td><span class="input-group-btn" style="margin-top: 5px;"> 
                            <button style="height: 20px;" type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-search" style="font-size: 10px;"></i>
                        </button> </span></td>
                    <td><input <?php echo $disabled ?> required="" style="width: 140px; font-size: 12px" autocomplete="off" type="text" id="_accountycode" name="account" /></span></td>
                    <td><input <?php echo $disabled ?> type="text" id="_accountyname" name="el_name" style="width: 240px; font-size: 12px" autocomplete="off" /></td>
                    <td><input <?php echo $disabled ?> style="width: 50px; font-size: 12px" type="text" name="el_type" /></td>
                    <td><input <?php echo $disabled ?> type="text" style="width: 170px; font-size: 12px" id="_references" name="el_ref" /> </td>
                    <td><input <?php echo $disabled ?> type="text" name="memo" value="<?php echo $con ?>" style="width: 340px; font-size: 12px" /></td>
                    <td><input <?php echo $disabled ?> style="width: 70px; text-align:right; font-size: 12px" id="texto1" name="el_debit" value="0.00" /></td>
                    <td><input <?php echo $disabled ?> style="width: 70px; text-align:right; font-size: 12px" id="texto2" name="el_credit" value="0.00" /></td>
                    <td><button style="border: none; background: #fff;" title="Add" type="submit" name="register"><i class="fa fa-check" style="font-size: 13px;"></i></button></td>
                </tr>
            </tbody>
        <?php }else{ ?>

        <?php } ?>
            
                    </table>
                    </form> <!--*** FIN FORMULARIO ***-->
                </div>
            </div>
    
    </div><!-- FIN COL-LG-12 -->
    <div class="col-lg-12">
        <form id="formulario" name="formulario">
        <?php if ($co == 0) { ?>
        <table class="table">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                            <th></th>
                            <th></th>

                        </thead>
                        <tbody>
                <tr>
                    <td style="width: 140px; font-size: 12px"></td>
                    <td style="width: 240px; font-size: 12px"><h4><strong>Saldo al <?php echo $mensaje; ?>: $ 
                        <span name="saldo"><?php echo $resta ?></span></strong></h4></td>
                    <td style="width: 50px; font-size: 12px"></td>
                    <td style="width: 170px; font-size: 12px"></td>
                    
                    <td style="width: 270px; text-align:right; font-size: 12px"><h4>Total Debito: $ <?php echo $s1 ?></h4></td>
                    <td style="width: 270px; text-align:right; font-size: 12px"><h4>Total Credito $ <?php echo $s2 ?> </h4></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        
        <?php }else{ ?>
        <?php  echo '<div class="alert alert-danger" style="text-align:center; color:#fff">'.$message_context.'</div>'; ?>
        <?php } ?>
        </form>
    </div>  
</div><!-- FIN DE ROW -->

</div> <!-- FIN DE WRAPPER  -->
<!--<script type="text/javascript">
	$(document).ready(function(){
		$('#busca_journal').blur(function(){
			$.ajax({
				type:"POST",
				data:"idpro=" + $('#busca_journal').val(),
				url:"../../../../controlador/c_activities/busca_journal.php",
				success:function(r){
					dato=jQuery.parseJSON(r);
					$('#_references').val(dato['TIPO_ASI']);
                    $('#_memo').val(dato['CONCEPTO']);
				}
			});
		});
	});
</script>--> 

<script type="text/javascript">
	$(document).ready(function(){
		$('#_seleccion').click(function(){
			$.ajax({
				type:"POST",
				data:"idpro=" + $('#_seleccion').val(),
				url:"../../../../controlador/c_activities/busca_actual.php",
				success:function(r){
					dato=jQuery.parseJSON(r);
               $('#_actual').val(dato['ASIENTO']);
				}
			});
		});
	});
</script>

<?php
require_once ("../foot_unico.php");

}else{
    session_unset();
    session_destroy();
    header('Location:  ../../../../login.php');
} 
?>

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

<script type="text/javascript">
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<script type="text/javascript">
      function ConfirmDelete(delid){
            if (confirm("Delete Transaction?")){
                 window.location.href='../../../../controlador/c_activities/delete_tran.php?delid=' + delid+ '';
                 return true;
            }
      }
</script>
<script type="text/javascript">
    function deleteJournal(delj){
        if (confirm("Delete?")){
            window.location.href='../../../../controlador/c_activities/deleteJournalParam.php?delj='+delj+'';
            return true;
        }
    }
</script>