<?php #echo date('Y-m-d', strtotime('08/31/2018')); ?>
<form role="form" name="formulario" id="formulario" action="#"  method="post" >
    <div id="page-wrapper"><br />
        <div class="alert alert-info"><p>Accounting / Activities / Journal Entries / <a style="float: right; color: #fff" href="<?php echo PUERTO."://".PREVIOUS_SYSTEM.DASHBOARD; ?>">Volver</a></p></div>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <div class="form-group col-md-3" style="padding-right: 0px;">
                        <span id="btnSearch1" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Search Journal">
                        <i class="fa fa-search"></i></span> 

                        <button type="button" id="save" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Save Journal">
                            <span><i class="glyphicon glyphicon-floppy-disk"></i></span>
                        </button>

                        <button type="button" id="update" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Update Journal" style="display:none">
                            <span><i class="glyphicon glyphicon-floppy-disk"></i></span>
                        </button>

                        <button type="button" id="memorice" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Save and Memorice Journal">
                            <span><i class="glyphicon glyphicon-folder-open"></i></span>
                        </button>

                        <button type="button" id="memoriceUpdate" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Update and Memorice Journal" style="display:none">
                            <span><i class="glyphicon glyphicon-folder-open"></i></span>
                        </button>

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
                            <textarea class="form-control input-sm" autocomplete="off" id="_memo" name="_memo" placeholder="Description" rows="2" cols="50" maxlength="200" style="margin: 0px; width: 100%; height: 48px;resize: none;"></textarea>
                        </div>
                    </div>

                    <div class="form-group col-md-5">
                        <label class="col-md-3 control-label" for="benef" style="margin-top: 10px;">Beneficiary: </label>
                        <div class="col-md-9" style="margin-top: 5px;">
                          <select id="benef" name="benef" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                            <option value="0" disabled selected>Select an option</option>
                            <?php foreach((array) $bene as $key => $dem) { ?>
                              <option value="<?php echo $dem ?>"><?php echo $key.' - '.$dem; ?></option>
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
                    <div class="panel-body" id="tableJournal" style="height:40%; overflow: auto">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="journal">
                            <thead>
                              <tr style="background: #ddd;">
                                <td align="center" width="220" style="padding: 3px 0px 3px 0px"><b>Account</b></td>
                                <td align="center" width="500" style="padding: 3px 0px 3px 0px"><b>Name</b></td>
                                <td align="center" style="display:none"></td>
                                <td align="center" width="220" style="padding: 3px 0px 3px 0px"><b>Debit</b></td>
                                <td align="center" width="220" style="padding: 3px 0px 3px 0px"><b>Credit</b></td>
                                <td align="center" width="140" style="padding: 3px 0px 3px 0px"><b>Action</b></td>
                                <td align="center" style="vertical-align: middle;"><button title="Add" id="open" type="button" name="register" class="btn btn-default btn-small" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-check"></i></button></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="num<?php echo $fila; ?>"><td align="center" colspan="9" style="padding-top: 8px; padding-bottom: 8px;background-color: #d9f2fa;">Empty Journal</td></tr>
                        </tbody>
                        </table>
                    </div> <!-- FIN DE COL-LG-12  -->
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="210"></td>
                                <td colspan="1" width="460" style="font-size: 16px;"><strong><span id="mensaje"></span>Balance: $<span id="balance" name="balance">0</span></strong>
                                </td>
                                <td width="210" style="text-align:left; font-size: 16px;">Total Debit: $<span id="tdebit" name="tdebit">0</span></td>
                                <td width="220" style="text-align:left; font-size: 16px;">Total Credit $<span id="tcredit" name="tcredit">0</span></td>
                                <td width="140" colspan="2"></td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
            </div>
        </div><!-- FIN DE ROW -->
            
        <input type="hidden" id="numRow" name="numRow" value="<?php echo $fila ?>">
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
                                                               <td align="center"><a data-toggle="tooltip" data-placement="bottom" title="View journal memorice" onclick="viewJournal('<?php echo Utils::encriptar($registro2['IDCONT']); ?>')"><i class="fa fa-eye"></i></a></td>
                                                               <td align="center"><a data-toggle="tooltip" data-placement="bottom" title="Update journal memorice" onclick="searchJournal('','<?php echo Utils::encriptar($registro2['IDCONT']); ?>')"><i class="fa fa-edit"></i></a></td>
                                                               <td align="center"><a data-toggle="tooltip" data-placement="bottom" title="Copy journal" onclick="copyJournal('<?php echo Utils::encriptar($registro2['IDCONT']); ?>')"><i class="fa fa-copy"></i></a></td>
                                                               <td align="center"><a data-toggle="tooltip" data-placement="bottom" title="Delete journal memorice" href="<?php echo PUERTO.'://'.HOST.'/deleteMemorice/'.Utils::encriptar($registro2['IDCONT']).'/'; ?>"><i class="fa fa-trash"></i></a></td>              
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
<div class="modal fade" id="myModalRow" tabindex="-1" role="dialog" aria-labelledby="myModalRow" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 550px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">New entry</h4>
            </div>
            <div class="modal-body" style="height:360px;">
                <div class="col-lg-12">
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
                                                <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('code1','name_',false,true,true)"><span style="padding-top: 1px; padding-bottom: 1px" class="glyphicon glyphicon-search"></span></button> 
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
                                    <label class="col-md-8 control-label" for="type">Type: </label>
                                    <div class="col-md-4" style="padding-left: 0px; width: 44px; padding-right: 0px;">
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

                                <div class="form-group col-md-6" id="seccion_debit">
                                    <label class="col-md-4 control-label" for="debit">Debit: </label>
                                    <div class="col-md-8">
                                        <div id="err_debit" class="help-block with-errors"></div>
                                        <input id="debit" name="debit" type="text" class="form-control input-sm" maxlength="30" value="0.00" onkeypress="return soloNumerosPunto(this);"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-6" id="seccion_credit">
                                    <label class="col-md-4 control-label" for="credit">Credit: </label>
                                    <div class="col-md-8">
                                        <div id="err_credit" class="help-block with-errors"></div>
                                        <input id="credit" name="credit" type="text" class="form-control input-sm" maxlength="30" value="0.00" onkeypress="return soloNumerosPunto(this);"/>
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
            </div>
            <div class="modal-footer" id="footer">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModalTrans" tabindex="-1" role="dialog" aria-labelledby="myModalTrans" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 550px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabelNotif">Notification</h4>
            </div>
            <div class="modal-body" style="height:80px; overflow:auto;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body" align="center">
                            <div id="mjs"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span id="excel" title="PDF" style="float: left"><a href="<?php echo PUERTO."://".HOST.'/journalVoucherReport/pdf/'; ?>" class="btn btn-default"><i class="fa fa-file-pdf-o"></i></a></span>
                <button type="button" class="btn btn-primary" id="btn_edit"><i class="glyphicon glyphicon-pencil"></i> Update</button>
                <button type="button" class="btn btn-warning" id="btn_annul"><i class="glyphicon glyphicon-remove"></i> To annul</button>
                <button type="button" class="btn btn-danger" id="btn_delete"><i class="glyphicon glyphicon-trash"></i> Delete</button>
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
            <div class="modal-body" style="height:50%; overflow:auto;">
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
                                            <button type="button" class="btn btn-primary" id="btnSearch2"><i class="glyphicon glyphicon-search" data-toggle="tooltip" data-placement="bottom" title="Search"></i></button>
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
                                            <?php foreach( $all_send2 as $r ){ ?>
                                               <tr>
                                                   <td><?php echo $r['TIPO_ASI'] ?></td>
                                                   <td><?php echo $r['ASIENTO'] ?></td>
                                                   <td><?php echo date('m/d/Y', strtotime($r['FECHA_ASI'])); ?></td>
                                                   <td><?php echo $r['BENEFICIAR']; ?></td>
                                                   <td align="center"><a data-toggle="tooltip" data-placement="bottom" title="View journal" onclick="viewJournal('<?php echo Utils::encriptar($r['IDCONT']); ?>')"><i class="fa fa-eye"></i></a></td>
                                                   <td align="center"><a data-toggle="tooltip" data-placement="bottom" title="Update journal" onclick="searchJournal('','<?php echo Utils::encriptar($r['IDCONT']); ?>')"><i class="fa fa-edit"></i></a></td>             
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
