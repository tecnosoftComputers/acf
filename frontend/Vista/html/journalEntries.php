<form role="form" name="formulario" id="formulario" action="#"  method="post" >
    <div id="page-wrapper"><br />
        <div class="alert alert-info"><p>Accounting / Activities / Journal Entries / <a style="float: right; color: #fff" href="<?php echo PUERTO."://".PREVIOUS_SYSTEM.DASHBOARD; ?>">Volver</a></p></div>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <div class="form-group col-md-3" style="padding-right: 0px;">

                        <?php if($_SESSION['acfSession']['permission'][$item]['rd'] == 1){ ?>
                            <span id="btnSearch1" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Search Journal"><i class="fa fa-search"></i></span> 
                        <?php }else{ ?>
                            <a onclick="viewMessage('You cannot execute this action')"><span class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Search Journal"><i class="fa fa-search"></i></span></a>
                        <?php } ?>

                        <?php if($_SESSION['acfSession']['permission'][$item]['sav'] == 1){ ?>
                            <a id="save" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Save Journal"><span><i class="glyphicon glyphicon-floppy-disk"></i></span></a>

                            <a id="memorice" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Save and Memorice Journal"><span><i class="glyphicon glyphicon-folder-open"></i></span></a>
                        <?php }else{ ?>
                            <a onclick="viewMessage('You cannot execute this action')"><span class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Save Journal"><i class="glyphicon glyphicon-floppy-disk"></i></span></a>

                            <a onclick="viewMessage('You cannot execute this action')"><span class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Save and Memorice Journal"><i class="glyphicon glyphicon-folder-open"></i></span></a>
                        <?php } ?>

                        <?php if($_SESSION['acfSession']['permission'][$item]['edi'] == 1){ ?>
                            <a id="update" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Update Journal" style="display:none"><span><i class="glyphicon glyphicon-floppy-disk"></i></span></a>

                            <a id="memoriceUpdate" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Update and Memorice Journal" style="display:none"><span><i class="glyphicon glyphicon-folder-open"></i></span></a>
                        <?php }else{ ?>
                            <a onclick="viewMessage('You cannot execute this action')"><span class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Update Journal" style="display:none"><i class="glyphicon glyphicon-floppy-disk"></i></span></a>

                            <a onclick="viewMessage('You cannot execute this action')"><span class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Update and Memorice Journal" style="display:none"><i class="glyphicon glyphicon-folder-open"></i></span></a>
                        <?php } ?>

                        <button type="button" id="reverseAll" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Reverse all Journal" style="display:none">
                            <span><i class="glyphicon glyphicon-refresh"></i></span>
                        </button>

                        <button type="button" id="clear" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Clear Journal">
                            <span><i class="glyphicon glyphicon-repeat"></i></span>
                        </button>

                        <span id="btnSearch" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Search Journal Memorice">
                        <i class="fa fa-cloud"></i></span> 
                    </div>
                    <div class="form-group col-md-2">
                      <label class="col-md-4 control-label" for="name">Type: </label>
                        <div class="col-md-8">
                            <select id="_seleccion" name="_seleccion" class="form-control">
                            <?php foreach((array) $fetch_dp as $rest) { ?>              
                                <option value="<?php echo $rest['TIPO_ASI'] ?>" style="font-size: 11px"> <?php echo $rest['TIPO_ASI']; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="col-md-4 control-label" for="_actual">Search: </label>
                        <div class="col-md-8">
                            <input autocomplete="off" id="_actual" name="_actual" type="text" class="form-control input-sm" value=""/>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label class="col-md-3 control-label" for="number">Journal:</label>
                      <div class="col-md-9">
                          <input disabled readonly autocomplete="off" value="" id="number" name="number" type="text" class="form-control input-sm" style="font-size: 9px;padding-right: 2px;padding-left: 2px;"/>               
                      </div>
                    </div>

                    <div class="form-group col-md-2">
                      <label class="col-md-3 control-label" for="name">Date: </label>
                      <div class="col-md-9">
                        <input readonly="readonly" value="<?php echo date("m/d/Y"); ?>" autocomplete="off" name="date" id="date" type="text" class="form-control" style=" padding-right: 10px; padding-left: 10px;" />
                      </div>
                    </div>
                </div> <!--FIN FORM ROW-->

                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label class="col-md-1 control-label" for="name">Memo: </label>
                        <div class="col-md-11">
                            <textarea class="form-control input-sm" autocomplete="off" id="_memo" name="_memo" placeholder="Description" rows="6" cols="50" maxlength="200" style="margin: 0px; width: 100%; resize: none;"></textarea>
                        </div>
                    </div>

                    <div class="form-group col-md-5">
                        <label class="col-md-3 control-label" for="benef" style="margin-top: 10px;">Beneficiary: </label>
                        <div class="col-md-9" style="margin-top: 5px;">
                          <select id="benef" name="benef" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                            <option value="0" disabled selected>Select an option</option>
                            <?php foreach($bene as $key => $dem) { ?>
                              <option value="<?php echo $key; ?>"><?php echo $key.' - '.$dem; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                    </div>   

                    <div class="form-group col-md-5">
                        <label class="col-md-3 control-label" for="_documento">Document: </label>
                        <div class="col-md-9">
                            <div id="err_docu" class="help-block with-errors"></div>
                            <input id="_documento" name="_documento" type="text" class="form-control input-sm" maxlength="19" value=""/>
                        </div>
                    </div>   

                    <div class="form-group col-md-5">
                        <label class="col-md-3 control-label" for="_liq">Settlement: </label>
                        <div class="col-md-9">
                            <div id="err_docu" class="help-block with-errors"></div>
                            <input id="_liq" name="_liq" type="text" class="form-control input-sm" maxlength="8" value=""/>
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
                    <div class="panel-body" id="tableJournal" style="height:35%; overflow: auto">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="journal">
                            <tr style="background: #ddd;">
                                <td align="center" width="220" style="padding: 3px 0px 3px 0px"><b>Account</b></td>
                                <td align="center" width="500" style="padding: 3px 0px 3px 0px"><b>Name</b></td>
                                <td align="center" style="display:none"></td>
                                <td align="center" width="220" style="padding: 3px 0px 3px 0px"><b>Debit</b></td>
                                <td align="center" width="220" style="padding: 3px 0px 3px 0px"><b>Credit</b></td>
                                <td align="center" style="display:none"></td>
                                <td align="center" width="140" style="padding: 3px 0px 3px 0px"><b>Action</b></td>
                                <?php 
                                    if($_SESSION['acfSession']['permission'][$item]['sav'] == 0){ ?>
                                        <td align="center" style="vertical-align: middle;"><a title="Add" onclick="viewMessage('You cannot execute this action')" disabled name="register" class="btn btn-default btn-small" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-check"></i></a></td>
                                    <?php }else{ ?>
                                        <td align="center" style="vertical-align: middle;"><button title="Add" id="open" type="button" name="register" class="btn btn-default btn-small" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-check"></i></button></td>
                                    <?php } 
                                ?>
                            </tr>
                            <tr id="num<?php echo $fila; ?>"><td align="center" colspan="9" style="padding-top: 8px; padding-bottom: 8px;background-color: #d9f2fa;">Empty Journal</td></tr>
                        </table>
                    
                        <table width="100%" style="padding: 3px 0px 3px 0px: font-size:12px;" class="table table-striped">
                            <tr>
                                <td align="center" width="210"></td>
                                <td align="center" width="460" style="text-align: left;"><strong><span id="_mensaje"></span>Balance:&nbsp;&nbsp; $<span id="balance" name="balance">0</span></td>
                                <td align="center" style="display:none"></td>
                                <td align="center" width="205" style="text-align: right;"><b>Total Debit:</b>&nbsp;&nbsp; $<span id="tdebit" name="tdebit">0</span></td>
                                <td align="center" width="205" style="text-align: right;"><b>Total Credit:</b>&nbsp;&nbsp; $<span id="tcredit" name="tcredit">0</span></td>
                                <td align="center" style="display:none"></td>
                                <td colspan="2" align="center" width="140"></td>
                            </tr>
                        </table>
                    </div> <!-- FIN DE COL-LG-12  -->
                </div> 
            </div>
        </div><!-- FIN DE ROW -->
            
        <input type="hidden" id="numRow" name="numRow" value="<?php echo $fila ?>">
        <input type="hidden" id="annul" name="annul" value="">
        <div class="modal fade" id="myModalJournal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                <table width="100%" class="table table-striped table-bordered table-hover" id="journalList">
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
    </div> <!-- FIN DE WRAPPER  -->
    <input type="hidden" name="idcont" id="idcont" value="">
</form>
<input type="hidden" name="window" id="window" value="save">
<input type="hidden" name="item" id="item" value="<?php echo $item; ?>">
<div class="modal fade" id="myModalTrans" tabindex="-1" role="dialog" aria-labelledby="myModalTrans" aria-hidden="true">
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

<div class="modal fade" id="myModalConf" tabindex="-1" role="dialog" aria-labelledby="myModalConf" aria-hidden="true">
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

<div class="modal fade" id="myModalList" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="journalListAll">
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
