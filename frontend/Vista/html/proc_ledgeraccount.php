<div id="page-wrapper"><br />
  <div class="alert alert-info">
    <div class="row">
      <div class="col-md-6">
        <p>Accounting / Processes / Add-Edit Ledger Accounts</p>
      </div>
      <div class="col-md-6">
        <p class="text-right"><a href="<?php echo PUERTO."://".HOST."/dashboard/";?>">Back</a></p>
      </div>  
    </div>    
  </div>

  <div class="container-fluid">
        <div class="panel panel-default">

          <div class="panel-body">
            <div class="col-md-12">
          <div class="">
          
            <form action="<?php echo PUERTO."://".HOST."/proccess/ledgeraccount/changeLedAcc/"; ?>" method="POST" id="formLedAcc">
              <div class="panel panel-default col-md-6">
                <!-- <div class="panel-heading">
                  eder
                </div> -->
                <br>
                <legend class="mibread" style="text-align: center;"><strong>Add-Edit Ledger Accounts</strong></legend>
                <div class="panel-body">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Previous Account: </label>
                        <select class="form-control" name="prevaccount" id="prevaccount">
                          <?php 
                            if(!empty($listAccounts)){

                              foreach ($listAccounts as $key => $value) {
                                $disabled = ($value["PLANMARCA"] != 1) ? $disabled = "disabled = 'disabled' style='font-weight: bold;'" : "";
                                echo "<option value='".trim($value["CODIGO"])."' ".$disabled.">".trim($value["CODIGO"])." | ".$value["NOMBRE"]."</option>";
                              }
                            }
                            else{
                              echo "<option>Not found records</option>";
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>New Account: </label>
                        <select class="form-control" name="newaccount" id="newaccount">
                          <?php 
                            if(!empty($listAccounts)){
                              foreach ($listAccounts as $key => $value) {
                                $disabled = ($value["PLANMARCA"] != 1) ? $disabled = "disabled = 'disabled' style='font-weight: bold;'" : "";
                                echo "<option value='".trim($value["CODIGO"])."' ".$disabled.">".trim($value["CODIGO"])." | ".$value["NOMBRE"]."</option>";
                              }
                            }
                            else{
                              echo "<option>Not found records</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                </div>
                  <div class="modal-footer">
                      <input type="hidden" name="create" id="create" value="1">
                      <?php 
                        if($permission["edi"] == 1){
                          ?>
                            <button style="float: left;" type="submit" id="update" name="update" class="btn btn-primary"><span class="fa fa-retweet"></span> Update</button>
                          <?php
                        }
                      ?>
                      <span style="float: right"><a href="<?php echo PUERTO."://".HOST.'/dashboard/'; ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
                      &nbsp;
                      <a id="clean1" style="float: right; margin-right: 10px;" href="<?php echo PUERTO.'://'.HOST.'/proccess/ledgeraccount/';?>" class="btn btn-success"><span class="fa fa-repeat"></span> Clean</a>
                  </div>
                
              </div>
            </form>
          </div>  
        </div>
      </div>
      
    </div>
  </div>
</div>