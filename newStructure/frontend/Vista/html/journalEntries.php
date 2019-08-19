<form id="formulario" action="<?php echo PUERTO."://".HOST.'/saveJournal/'; ?>"  method="post" >
    <div id="page-wrapper"><br />
        <div class="alert alert-info"><p>Accounting / Activities / Journal Entries</p></div>

        <div class="row">
            <div class="col-lg-12">
                <!--onsubmit="return validateRows()"-->
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <a href="../../../controlador/c_activities/op1.php">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Previous">
                                <i class="fa fa-arrow-circle-left" style="font-size: 15px;"></i>
                            </button>
                        </a>
                        <a href="../../../controlador/c_activities/op2.php">
                         <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="After">
                             <i class="fa fa-arrow-circle-right" style="font-size: 15px;"></i>
                         </button>
                        </a>   

                        <button type="submit" id="save" class="btn btn-primary disabled" disabled data-toggle="tooltip" data-placement="bottom" title="Save Journal" >
                            <span><i class="glyphicon glyphicon-floppy-disk"></i></span>
                        </button>

                        <button type="button" id="update" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Update Journal" style="display:none">
                            <span><i class="glyphicon glyphicon-edit"></i></span>
                        </button>
                        <button type="button" id="delete" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Delete Journal" style="display:none">
                            <span><i class="glyphicon glyphicon-trash"></i></span>
                        </button>

                        <button type="button" id="memorice" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Delete Journal" style="display:none">
                            <span><i class="glyphicon glyphicon-folder-open"></i></span>
                        </button>

                        <button type="button" id="reverseAll" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="bottom" title="Delete Journal" style="display:none">
                            <span><i class="glyphicon glyphicon-refresh"></i></span>
                        </button>

                        <span class="btn btn-primary" data-toggle="modal" data-target="#myModalJournal">
                        <i class="fa fa-search"></i></span> 
                    </div>
                    <div class="form-group col-md-2" style="padding-right: 0px;">
                      <label class="col-md-3 control-label" for="name">Type: </label>
                      <div class="col-md-9">
                        <select id="_seleccion" name="_seleccion" class="form-control" style="font-size: 11px">
                            <?php foreach((array) $fetch_dp as $rest) { ?>              
                                <?php if ($tip == $rest['TIPO_ASI']){ ?>
                                    <option value="<?php echo $rest['TIPO_ASI'] ?>" selected="" style="font-size: 11px"> <?php echo $rest['NOMBRE'] ?></option>
                                <?php }else{ ?>
                                    <option value="<?php echo $rest['TIPO_ASI'] ?>" style="font-size: 11px"> <?php echo $rest['NOMBRE'] ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-1" style="padding-left: 0px;">
                        <input readonly="" autocomplete="off" id="_actual" name="_actual" type="text" class="form-control input-sm" />
                    </div>

                    <div class="form-group col-md-3">
                      <label class="col-md-6 control-label" for="number">Number Journal:</label>
                      <div class="col-md-5">
                          <input readonly="" autocomplete="off" value="<?php echo $land ?>" id="number" name="number" type="text" class="form-control input-sm" />               
                      </div>
                    </div>

                    <div class="form-group col-md-2">
                      <label class="col-md-3 control-label" for="name">Date: </label>
                      <div class="col-md-9">
                        <input readonly="readonly" value="<?php echo date("m/d/Y"); ?>" autocomplete="off" name="date" id="date" type="text" class="form-control myDatepicker" />
                      </div>
                    </div>
                </div> <!--FIN FORM ROW-->

                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label class="col-md-1 control-label" for="name">Memo: </label>
                        <div class="col-md-11">
                            <textarea class="form-control input-sm" autocomplete="off" id="_memo" name="_memo" placeholder="Description" rows="2" cols="50" style="margin: 0px; width: 649px; height: 48px;resize: none;"><?php echo @$con ?></textarea>
                        </div>
                    </div>

                    <div class="form-group col-md-5">
                        <label class="col-md-2 control-label" for="benef" style="margin-top: 10px;">Beneficiary: </label>
                        <div class="col-md-10" style="margin-top: 5px;">
                          <select id="benef" name="benef" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                            <option value="0" disabled selected>Select an option</option>
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
                    <div class="panel-body" id="tableJournal">
                        <input type="hidden" name="fav" value="<?php echo $lande ?>" />
                        <input type="hidden" name="asiento" value="<?php echo $land ?>" />
                        <table width="100%" class="table table-striped table-bordered table-hover" id="journal">
                            <thead>
                              <tr style="background: #ddd;">
                                <td align="center"><b>Account</b></td>
                                <td align="center" width="290"><b>Name</b></td>
                                <td align="center"><b>Type</b></td>
                                <td align="center"><b>References</b></td>
                                <td align="center" width="330"><b>Memo</b></td>
                                <td align="center" width="30"><b>Debit</b></td>
                                <td align="center" width="30"><b>Credit</b></td>
                                <td align="center" style="padding-right: 4px; padding-left: 4px;"><b>Action</b></td>
                                <td align="center" style="vertical-align: middle;"><button title="Add" data-toggle="tooltip" data-placement="bottom" type="button" name="register" onclick="insertRow()" class="btn btn-default btn-small"><i class="fa fa-check"></i></button></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" id="num<?php echo $fila; ?>">
                                <td>
                                    <div class="input-group"> 
                                        <input class="form-control control2" autocomplete="off" style="width: 140px; font-size: 12px" type="text" id="_accountycode<?php echo $fila; ?>" name="_accountycode[]" onkeyup="autocompleteRow(<?php echo $fila; ?>)" required />
                                        <span class="input-group-btn"> 
                                            <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('_accountycode<?php echo $fila; ?>','_accountyname<?php echo $fila; ?>',false,true,true)" style="padding-bottom: 4px; padding-top: 5px;"><span style="padding-top: 1px; padding-bottom: 1px" class="glyphicon glyphicon-search"></span></button> 
                                        </span>
                                    </div>
                                </td>
                                <td><input class="form-control control2" type="text" id="_accountyname<?php echo $fila; ?>" name="_accountyname[]" autocomplete="off" required /></td>
                                <td><input class="form-control control2 type" type="text" id="el_type<?php echo $fila; ?>" name="el_type[]" value="EGRE"/></td>
                                <td><input class="form-control control2" type="text" id="_references<?php echo $fila; ?>" name="el_ref[]" /> </td>
                                <td><input class="form-control control2 memo" type="text" name="el_memo[]" id="el_memo<?php echo $fila; ?>" required /></td>
                                <td ><input class="form-control control2" type="text" id="el_debit<?php echo $fila; ?>" name="el_debit[]" onkeyup="debit(<?php echo $fila; ?>)" value="0.00" required/></td>
                                <td><input class="form-control control2" type="text" id="el_credit<?php echo $fila; ?>" name="el_credit[]" onkeyup="credit(<?php echo $fila; ?>)" value="0.00" required/></td>
                                <td colspan="2">
                                    <button title="Reverse" data-toggle="tooltip" data-placement="bottom" type="button" id="reverse" name="reverse" onclick="reverseInput(<?php echo $fila; ?>)" class="btn btn-default"><i class="fa fa-refresh"></i></button>

                                    <button title="Delete" data-toggle="tooltip" data-placement="bottom" type="button" name="delete" onclick="deleteRow(<?php echo $fila ?>)" class="btn btn-default"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                        </tbody>
                        </table>

                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="width: 240px; font-size: 16px;"><strong><span id="mensaje"></span>balance: $<span id="balance" name="balance">0</span></strong>
                                    </td>
                                    <td style="width: 270px; text-align:right; font-size: 16px;">Total Debit: $<span id="tdebit" name="tdebit">0</span></td>
                                    <td style="width: 270px; text-align:right; font-size: 16px;">Total Credit $<span id="tcredit" name="tcredit">0</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- FIN DE COL-LG-12  -->
                </div> 
            </div>
        </div><!-- FIN DE ROW -->
            
        <input type="hidden" id="numRow" name="numRow" value="<?php echo $fila ?>">
        <div class="panel-body">
                <div class="modal fade" id="myModalJournal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="height:500px;overflow:auto; width: 830px; margin-left: -110px;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Journal List</h4>
                            </div>
                            <div class="modal-body" >
                                <table width="100%" class="table table-striped table-bordered table-hover" id="journalList">
                                    <thead>
                                        <tr>
                                            <td align="center"><b>Type</b></td>
                                            <td align="center"><b>Journal</b></td>
                                            <td align="center"><b>Date</b></td>
                                            <td align="center" width="400"><b>Beneficiary</b></td>
                                            <td align="center"><b>Action</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach( $all_send as $registro2 ){ ?>
                                           <tr class='odd gradeX'>
                                               <td><?php echo $registro2['TIPO_ASI'] ?></td>
                                               <td><?php echo $registro2['ASIENTO'] ?></td>
                                               <td><?php echo $registro2['FECHA_ASI'] ?></td>
                                               <td><?php echo $registro2['BENEFICIAR']; ?></td>
                                               <td align="center"><a href="activities/journal.php?cid=<?php echo $registro2['ASIENTO'] ?>"><i class="fa fa-check"></i></a></td>                 
                                           </tr>
                                       <?php } ?>
                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
        </div>
    </div> <!-- FIN DE WRAPPER  -->
</form>
