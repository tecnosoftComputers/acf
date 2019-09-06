    
    
    <script src="<?php echo PUERTO."://".HOST;?>/js/jquery-3.0.0.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/metisMenu/metisMenu.min.js"></script>

    <script src="<?php echo PUERTO."://".HOST;?>/js/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/datatables-responsive/dataTables.responsive.js"></script>
    
    <script src="<?php echo PUERTO."://".HOST;?>/js/sb-admin-2.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/flot/excanvas.min.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/flot/jquery.flot.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/flot/jquery.flot.time.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/flot-data.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/sweetalert.v2.js"></script>
    
    <script src="<?php echo PUERTO."://".HOST;?>/js/jquery-ui.min.js"></script> 
    <script src="<?php echo PUERTO."://".HOST;?>/js/valida.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/bootstrap-select.min.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/moment.min.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/daterangepicker.min.js"></script>

    <?php
        if (isset($template_js) && is_array($template_js)){
          foreach($template_js as $file_js){
            if(!empty($file_js)){
                echo '<script type="text/javascript" src="'.PUERTO.'://'.HOST.'/js/'.$file_js.'.js"></script>';
            }
          }  
        }
    ?>

    <?php if(isset($sess_suc_msg) && !empty($sess_suc_msg) && isset($_SESSION['acfSession']['idCont']) && !empty($_SESSION['acfSession']['idCont'])){ 
        echo "<script type='text/javascript'>
            $(document).ready(function(){  
               $('#mjs4').html('".$sess_suc_msg."');        
               $('#myModalExist').modal('show');";

        if($_SESSION['acfSession']['permission'][$item]['pri'] == 1){
            echo "$('#pdf_pie').attr('href','".$_SESSION['acfSession']['rule']."/pdf/".$_SESSION['acfSession']['idCont']."/');";
            echo "$('#pdf_pie').attr('target','_blank');";
            echo "$('#excel_pie').attr('href','".$_SESSION['acfSession']['rule']."/excel/".$_SESSION['acfSession']['idCont']."/');";
        }else{
          echo "$('#pdf_pie').removeAttr('target');
          $('#pdf_pie').removeAttr('href');
          $('#excel_pie').removeAttr('href');
          $('#pdf_pie').attr('onclick','viewMessage(\"You cannot execute this action\")');
          $('#excel_pie').attr('onclick','viewMessage(\"You cannot execute this action\")')";
        }
        
        echo "});
        </script>";
    } ?>

    <!--mensajes de error y exito-->
    <?php if (isset($sess_err_msg) && !empty($sess_err_msg)){
      echo "<script type='text/javascript'>
            $(document).ready(function(){          
              Swal.fire({            
                text: '".$sess_err_msg."',
                imageUrl: '".PUERTO."://".HOST."/imagenes/wrong-04.png',
                imageWidth: 75,
                confirmButtonText: 'OK',
                animation: true
              });     
            });
          </script>";
    }?>

    <?php if (isset($sess_suc_msg) && !empty($sess_suc_msg) && !isset($_SESSION['acfSession']['idCont']) && !isset($_SESSION['acfSession']['idCont'])){
        echo "<script type='text/javascript'>
            $(document).ready(function(){
              Swal.fire({            
                text: '".$sess_suc_msg."',
                imageUrl: '".PUERTO."://".HOST."/imagenes/check-01.png',
                imageWidth: 75,
                confirmButtonText: 'OK',
                animation: true
              });          
            });
          </script>";
        unset($_SESSION['acfSession']['idCont']);
        unset($_SESSION['acfSession']['rule']);
    }?> 
      

    <script>

        function openNav() {
          document.getElementById("mySidenav").style.width = "250px";
          $('ul.nav').removeClass('collapse');
        }

        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
        }

    </script>

<input type="hidden" name="field_name" id="field_name" value="" >
<input type="text" hidden id="puerto_host" value="<?php echo PUERTO."://".HOST ;?>">

<div class="modal" tabindex="-1" aria-hidden="true" role="dialog" id="loading">
  <div class="modal-dialog modal-dialog-centered justify-content-center" role="document" >
    <img src="<?php echo PUERTO."://".HOST."/imagenes/loader.gif"?>" width="30%" height="30%">    
  </div>
</div>

<div class="modal" id="myModalJournal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabelList">Memorice Journal List</h4>
            </div>
            <div class="modal-body"  style="height:60%; overflow:auto;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                           <div class="tab-content">
                                <div class="tab-pane fade in active">
                                    <div class="table table-responsive">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="journalList" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <td align="center"><b>Type</b></td>
                                                    <td align="center"><b>Journal</b></td>
                                                    <td align="center" width="95"><b>Date</b></td>
                                                    <td align="center" width="400"><b>Beneficiary</b></td>
                                                    <td colspan="4" align="center"><b>Action</b></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach( $all_send as $registro2 ){ ?>
                                                   <tr class='odd gradeX'>
                                                       <td><?php echo $registro2['TIPO_ASI'] ?></td>
                                                       <td><?php echo $registro2['ASIENTO'] ?></td>
                                                       <td><?php echo date('m/d/Y', strtotime($registro2['FECHA_ASI'])); ?></td>
                                                       <td><?php echo $registro2['BENEFICIAR']; ?></td>

                                                       <?php

                                                        $f1 = $f2 = $f3 = $f4 = "onclick=\"viewMessage('You cannot execute this action')\"";

                                                        if($_SESSION['acfSession']['permission'][$item]['rd'] == 1){
                                                            $f1 = "onclick=\"viewJournal('".Utils::encriptar($registro2['IDCONT'])."')\"";
                                                        }

                                                        if($_SESSION['acfSession']['permission'][$item]['edi'] == 1){
                                                            $f2 = "onclick=\"searchJournal('','".Utils::encriptar($registro2['IDCONT'])."')\"";
                                                            $f4 = 'href="'.PUERTO.'://'.HOST.'/deleteMemorice/'.Utils::encriptar($registro2['IDCONT']).'/"';
                                                        }

                                                        if($_SESSION['acfSession']['permission'][$item]['sav'] == 1){
                                                            $f3 = "onclick=\"copyJournal('".Utils::encriptar($registro2['IDCONT'])."')\"";
                                                        }

                                                       ?>
                                                       <td align="center"><a data-toggle="tooltip" data-placement="bottom" title="View journal memorice" <?php echo $f1; ?>><i class="fa fa-eye"></i></a></td>
                                                       <td align="center"><a data-toggle="tooltip" data-placement="bottom" title="Update journal memorice" <?php echo $f2; ?>><i class="fa fa-edit"></i></a></td>
                                                       <td align="center"><a data-toggle="tooltip" data-placement="bottom" title="Copy journal" <?php echo $f3; ?>><i class="fa fa-copy"></i></a></td>
                                                       <td align="center"><a data-toggle="tooltip" data-placement="bottom" title="Delete journal memorice" <?php echo $f4; ?>><i class="fa fa-trash"></i></a></td>              
                                                   </tr>
                                               <?php } ?>
                                           </tbody>
                                       </table>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="buttonClose">Close</button>
            </div>
       </div>
   </div>
</div>

<div class="modal" id="myModalTrans" tabindex="-1" role="dialog" aria-labelledby="myModalTrans" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabelNotif">Notification</h4>
            </div>
            <div class="modal-body" style="height:20%; overflow:auto;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body" align="center">
                            <div id="mjs"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span title="PDF" style="float: left"><a id="pdf_notif" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a></span>
                <span title="EXCEL" style="float: left"><a id="excel_notif" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a></span>
                <button type="button" class="btn btn-primary" id="btn_edit"><i class="glyphicon glyphicon-pencil"></i> Update</button>
                <button type="button" class="btn btn-warning" id="btn_annul"><i class="glyphicon glyphicon-remove"></i> Void</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="myModalConf" tabindex="-1" role="dialog" aria-labelledby="myModalConf" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabelConf">Confirmation</h4>
            </div>
            <div class="modal-body" style="height:20%; overflow:auto;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body" align="center">
                            <div id="mjs2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" id="btn_conf"><i class="fa fa-check"></i> Ok</a>
                <a class="btn btn-danger" id="btn_cancel" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cancel</a>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="myModalList" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalListLabel">Journal List</h4>
            </div>
            <div class="modal-body"  style="height:70%; overflow:auto;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                           <div class="tab-content">
                                <div class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label style="float:left" class="col-md-4 control-label" for="datefilter1">Range(date): </label>
                                            <div class="col-md-7" style="float:left">
                                                <input type="text" class="form-control" id="datefilter" name="datefilter" value="<?php echo date("m/d/Y",strtotime(date('m/d/Y')."- 1 year")).' - '.date('m/d/Y'); ?>" style="font-size: 11px" />
                                            </div>
                                            <div class="col-md-1" style="float:right;padding-left: 0px;padding-right: 0px;padding-top: 8px; cursor:pointer">
                                                <i id="cleanFecha" class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="bottom" title="Clear date"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <label class="col-md-2 control-label" for="datefilter1">Type: </label>
                                            <div class="col-md-10">
                                                <select id="type_select" name="type_select" class="form-control" style="font-size: 11px">
                                                    <option value="" selected>Select an option</option>
                                                <?php foreach((array) $fetch_dp as $rest) {
                                                    echo '<option value="'.$rest['TIPO_ASI'].'"';
                                                    if($type_default == $rest['TIPO_ASI']){
                                                        echo ' selected';
                                                    } 
                                                    echo '>'.$rest['TIPO_ASI'].' - '.$rest['NOMBRE'].'</option>';
                                                } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1" align="center">
                                            <?php 
                                                if($_SESSION['acfSession']['permission'][$item]['rd'] == 1){ ?>
                                                    <button type="button" class="btn btn-primary" id="btnSearch2"><i class="glyphicon glyphicon-search" data-toggle="tooltip" data-placement="bottom" title="Search"></i></button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="table table-responsive">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="journalListAll" style="text-align:center">
                                        <thead>
                                            <tr>
                                                <td align="center"><b>Type</b></td>
                                                <td align="center"><b>Journal</b></td>
                                                <td align="center" width="95"><b>Date</b></td>
                                                <td align="center" width="400"><b>Beneficiary</b></td>
                                                <td colspan="2" align="center"><b>Action</b></td>
                                            </tr>
                                        </thead>
                                        <tbody id="bodyContent">
                                            
                                       </tbody>
                                   </table>
                               </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="buttonClose">Close</button>
            </div>
       </div>
   </div>
</div>

<div class="modal" id="viewJournal" tabindex="-1" role="dialog" aria-labelledby="viewJournal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabelNotif">View Journal</h4>
            </div>
            <div class="modal-body" style="height:70%; overflow:auto;">
                <div class="col-lg-12">
                    <div class="panel panel-default" id="body_view">
                        <div class="panel-body" align="center">
                            <div>
                                <div class="form-group col-md-12">
                                  <label class="col-md-2 control-label" for="number">Journal:</label>
                                  <div class="col-md-5">
                                      <input disabled readonly autocomplete="off" value="" id="_number" name="_number" type="text" class="form-control input-sm"/>               
                                  </div>
                                  <label class="col-md-1 control-label" for="name">Date: </label>
                                  <div class="col-md-4">
                                    <input disabled readonly value="<?php echo date("m/d/Y"); ?>" autocomplete="off" name="_date" id="_date" type="text" class="form-control"/>
                                  </div>
                                </div>
                            </div>
                            <div>
                                <div class="form-group col-md-12">
                                    <label class="col-md-2 control-label" for="name">Memo: </label>
                                    <div class="col-md-10">
                                        <textarea class="form-control input-sm" disabled readonly autocomplete="off" id="_memo2" name="_memo2" placeholder="Description" rows="2" cols="50" maxlength="200" style="margin: 0px; width: 100%; height: 48px;resize: none;"></textarea>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="col-md-2 control-label" for="name">Beneficiary: </label>
                                    <div class="col-md-10">
                                        <input autocomplete="off" id="_benef" name="_benef" type="text" class="form-control input-sm" disabled readonly/>  
                                    </div>
                                </div>                        
                            </div>
                            <div>
                                <div class="form-group col-md-12">
                                    <label class="col-md-2 control-label" for="name">Document: </label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control input-sm" disabled readonly autocomplete="off" id="_doc2" name="_doc2" maxlength="19"/>
                                    </div>
                                    <label class="col-md-2 control-label" for="name">Settlement: </label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control input-sm" disabled readonly autocomplete="off" id="_settlement2" name="_settlement2" maxlength="19"/> 
                                    </div>
                                </div>              
                            </div>
                            <div id="table_view">
                                <table width="100%" class="table table-bordered table-hover" id="journalView"></table>
                            </div>
                        </div>
                    </div>
                    <div id="body_view_loader" style="display: none; height: 70%; vertical-align: middle;">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span title="PDF" style="float: left"><a id="pdf" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a></span>
                <span title="EXCEL" style="float: left"><a id="excel" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a></span>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="myModalRow" tabindex="-1" role="dialog" aria-labelledby="myModalRow" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">New entry</h4>
            </div>
            <div class="modal-body" style="height:70%; overflow: auto">
                <div class="col-lg-12" id="entry">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-md-12" id="seccion_accountycode">
                                    <label class="col-md-2 control-label" for="code1">Account: </label>
                                    <div class="col-md-10">
                                        <div id="err_accountycode" class="help-block with-errors"></div>
                                        <div class="input-group"> 
                                            <input class="form-control input-sm" autocomplete="off" style="font-size: 12px" type="text" id="code1"/>
                                            <span class="input-group-btn"> 
                                                <button id="btn_search" class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('code1','name_',false,true,true)"><span style="padding-top: 1px; padding-bottom: 1px" class="glyphicon glyphicon-search"></span></button> 
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="codepp" id="codepp">

                                <div class="form-group col-md-12" id="seccion_accountyname">
                                    <label class="col-md-2 control-label" for="name_">Name: </label>
                                    <div class="col-md-10" style="padding-left: 10px;">
                                        <div id="err_accountyname" class="help-block with-errors"></div>
                                        <input id="name_" type="text" class="form-control input-sm" maxlength="30" value=""/>
                                    </div>
                                </div>

                                <div class="form-group col-md-12" id="seccion_trans">
                                    <label class="col-md-4 control-label" for="trans">Type transaction: </label>
                                    <div class="col-md-8">
                                        <div id="err_trans" class="help-block with-errors"></div>
                                        <select class="form-control" id="trans" name="trans">
                                            <option value="0" selected>Select an option</option>
                                            <?php foreach ( $typeTrans as $key => $value ){ 
                                                echo '<option value="'.$value['CODIGO'].'">'.$value['CODIGO'].' - '.$value['NOMBRE'].'</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group col-md-4" id="seccion_type">
                                    <label class="col-md-6 control-label" for="type">Type: </label>
                                    <div class="col-md-6">
                                        <div id="err_type" class="help-block with-errors"></div>
                                        <input id="type" name="type" type="text" class="form-control input-sm" maxlength="2" value="" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-8" id="seccion_referencia">
                                    <label class="col-md-4 control-label" for="referencia">Reference: </label>
                                    <div class="col-md-8">
                                        <div id="err_referencia" class="help-block with-errors"></div>
                                        <input id="referencia" name="referencia" type="text" class="form-control input-sm" maxlength="10" value=""/>
                                    </div>
                                </div>

                                <div class="form-group col-md-6" id="seccion_docu">
                                    <label class="col-md-4 control-label" for="documento">Document: </label>
                                    <div class="col-md-8">
                                        <div id="err_docu" class="help-block with-errors"></div>
                                        <input id="documento" name="documento" type="text" class="form-control input-sm" maxlength="19" value=""/>
                                    </div>
                                </div>

                                <div class="form-group col-md-6" id="seccion_liq">
                                    <label class="col-md-4 control-label" for="liq">Settlement: </label>
                                    <div class="col-md-8">
                                        <div id="err_liq" class="help-block with-errors"></div>
                                        <input id="liq" name="liq" type="text" class="form-control input-sm" maxlength="8" value=""/>
                                    </div>
                                </div>

                                <div class="form-group col-md-6" id="seccion_debit">
                                    <label class="col-md-4 control-label" for="debit">Debit: </label>
                                    <div class="col-md-8">
                                        <div id="err_debit" class="help-block with-errors"></div>
                                        <input id="debit" name="debit" type="text" class="form-control input-sm" maxlength="16" value="0.00"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-6" id="seccion_credit">
                                    <label class="col-md-4 control-label" for="credit">Credit: </label>
                                    <div class="col-md-8">
                                        <div id="err_credit" class="help-block with-errors"></div>
                                        <input id="credit" name="credit" type="text" class="form-control input-sm" maxlength="16" value="0.00"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-12" id="seccion_description">
                                    <label class="col-md-2 control-label" for="description">Concept: </label>
                                    <div class="col-md-10" style="padding-left: 9px;">
                                        <div id="err_description" class="help-block with-errors"></div>
                                        <textarea class="form-control input-sm memo" autocomplete="off" id="description" name="description" placeholder="Description" rows="2" cols="20" style="resize: none;" maxlength="200"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div align="center" id="entry1">
                </div>
            </div>
            <div class="modal-footer" id="footer">
            </div>
        </div>
    </div>
</div>

<div class="modal" id="myModalExist" tabindex="-1" role="dialog" aria-labelledby="myModalExist" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myM">Notification</h4>
            </div>
            <div class="modal-body" style="height:20%; overflow:auto;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body" align="center">
                            <div id="mjs4"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span title="PDF" style="float: left"><a id="pdf_pie" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a></span>
                <span title="EXCEL" style="float: left"><a id="excel_pie" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a></span>
                <a class="btn btn-primary" id="btn_cancel" data-dismiss="modal">Ok</a>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 750px; margin-left:-100px">
        
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Chart of Accounts</h4>
            </div>
            
            <div class="modal-body"  style="height:460px; overflow:auto;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                           <div class="tab-content">
                                <div class="tab-pane fade in active" id="contentBody">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="buttonClose">Close</button>
            </div>
        </div>
    </div>
</div> 

</body>
</html>