<form role="form" name="formulario" id="formulario" action="#"  method="post" >
    <div id="page-wrapper2" style="    padding: 0 30px;"><br />
        <div class="alert alert-info"><p>Accounting / Activities / Journal Entries / <a style="float: right; color: #fff" href="<?php echo PUERTO."://".HOST.'/dashboard/'; ?>">Back</a></p></div>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <div class="form-group col-md-3" style="padding-right: 0px;">

                        <?php if($_SESSION['acfSession']['permission'][$item]['rd'] == 1){ ?>
                            <span id="btnSearch1" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Search Journal"><i class="fa fa-search"></i></span> 
                        <?php }else{ ?>
                            <span class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Search Journal" onclick="viewMessage('You cannot execute this action')"><i class="fa fa-search"></i></span>
                        <?php } ?>

                        <?php if($_SESSION['acfSession']['permission'][$item]['sav'] == 1){ ?>
                            <span id="save" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Save Journal"><i class="glyphicon glyphicon-floppy-disk"></i></span>

                            <span id="memorice" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Save and Memorice Journal"><i class="glyphicon glyphicon-folder-open"></i></span>
                        <?php }else{ ?>
                            <span class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Save Journal" onclick="viewMessage('You cannot execute this action')"><i class="glyphicon glyphicon-floppy-disk"></i></span>

                            <span class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Save and Memorice Journal" onclick="viewMessage('You cannot execute this action')"><i class="glyphicon glyphicon-folder-open"></i></span>
                        <?php } ?>

                        <?php if($_SESSION['acfSession']['permission'][$item]['edi'] == 1){ ?>
                            <span id="update" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Update Journal" style="display:none"><i class="glyphicon glyphicon-floppy-disk"></i></span>

                            <span id="memoriceUpdate" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Update and Memorice Journal" style="display:none"><i class="glyphicon glyphicon-folder-open"></i></span>
                        <?php }else{ ?>
                            <span class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Update Journal" style="display:none" onclick="viewMessage('You cannot execute this action')"><i class="glyphicon glyphicon-floppy-disk"></i></span>

                            <span class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Update and Memorice Journal" style="display:none" onclick="viewMessage('You cannot execute this action')"><i class="glyphicon glyphicon-folder-open"></i></span>
                        <?php } ?>

                        <span id="reverseAll" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Reverse all Journal" style="display:none"><i class="glyphicon glyphicon-refresh"></i></span>

                        <span id="clear" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Clear Journal"><i class="glyphicon glyphicon-repeat"></i></span>

                        <span id="btnSearch" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Search Journal Memorice">
                        <i class="fa fa-cloud"></i></span> 

                        <span id="btn_annul1" class="btn btn-danger disabled" data-toggle="tooltip" data-placement="bottom" title="Journal Void" style="display:none">
                        <i class="fa fa-ban"></i></span> 
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
                        <div class="col-md-7">
                            <input autocomplete="off" id="_actual" name="_actual" type="text" class="form-control input-sm" value="" maxlength="8" style=" padding-right: 5px; padding-left: 5px;"/>

                        </div>
                        <div class="col-md-1" style="float:right;padding-left: 0px;padding-right: 0px;padding-top: 8px; cursor:pointer">
                            <i id="cleanSeat" class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="bottom" title="Clear seat"></i>
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
                        <label class="col-md-3 control-label" for="_liq">Liquidation: </label>
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
                    <div class="panel-body" id="tableJournal" style="height:35%; overflow-y: scroll">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="journal">
                            <tr style="background: #ddd;">
                                <td align="center" width="220" style="padding: 3px 0px 3px 0px"><b>Account</b></td>
                                <td align="center" width="400" style="padding: 3px 0px 3px 0px"><b>Name</b></td>
                                <td align="center" style="display:none"></td>
                                <td colspan="2" align="center" width="320" style="padding: 3px 0px 3px 0px"><b>Debit</b></td>
                                <td colspan="2" align="center" width="320" style="padding: 3px 0px 3px 0px"><b>Credit</b></td>
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
                    
                    </div> <!-- FIN DE COL-LG-12  -->
                    <table width="100%" style="padding: 3px 0px 3px 0px; font-size:14px;" class="table table-striped">
                        <tr>
                            <td align="center" width="232"></td>
                            <td align="center" style="text-align: left;" width="120">
                                <span id="_mensaje"></span>Balance:</td>
                            <td width="282"><?php echo $_SESSION['acfSession']['simbolo']; ?><span id="balance" name="balance">0.00</span>
                            </td>
                            <td align="center" style="display:none"></td>
                            <td align="center" width="100"><b>Total Debit:</b></td>
                            <td align="right" style="padding-right: 0px;" width="130"><?php echo $_SESSION['acfSession']['simbolo']; ?><span id="tdebit" name="tdebit">0.00</span></td>
                            <td align="center" width="100"><b>Total Credit:</b></td>
                            <td align="right" style="padding-right: 0px;" width="142"><?php echo $_SESSION['acfSession']['simbolo']; ?><span id="tcredit" name="tcredit">0.00</span></td>
                            <td align="center" style="display:none"></td>
                            <td colspan="2" align="center" width="140"></td>
                        </tr>
                    </table>
                </div> 
            </div>
        </div><!-- FIN DE ROW -->
            
        <input type="hidden" id="numRow" name="numRow" value="<?php echo $fila ?>">
        <input type="hidden" id="annul" name="annul" value="">
    </div> <!-- FIN DE WRAPPER  -->
    <input type="hidden" name="idcont" id="idcont" value="">
</form>
<input type="hidden" name="window" id="window" value="save">
<input type="hidden" name="item" id="item" value="<?php echo $item; ?>">

