<div id="page-wrapper"><br />
  <div class="alert alert-info">
    <div class="row">
      <div class="col-md-6">
        <p>Accounting / Processes / Year End Entries</p>
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
          
            <form action="<?php echo PUERTO."://".HOST."/proccess/yearendentries/endyear/"; ?>" method="POST" id="formYearEndEntries">
              <div class="panel panel-default col-md-6">
                <!-- <div class="panel-heading">
                  eder
                </div> -->
                <br>
                <legend class="mibread" style="text-align: center;"><strong>Year End Entries</strong></legend>
                <div class="panel-body">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>accounting closing date: </label>
                        <input type="text" name="closingdate" id="closingdate" class="form-control myDatepicker" value="<?php echo date("m/d/Y"); ?>">
                      </div>
                      <div class="form-group">
                        <label>closing seat detail: </label>
                        <input type="text" name="closingseatdetail" readonly id="closingseatdetail" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Seat number: </label>
                        <input type="text" readonly name="seatnumber" id="seatnumber" class="form-control">
                      </div>
                    </div>
                </div>
                  <div class="modal-footer">
                      <input type="hidden" name="create" id="create" value="1">
                      <?php 
                        if($permission["sav"] == 1){
                          ?>
                            <button style="float: left;" type="button" id="update" name="update" class="btn btn-primary"><span class="fa fa-check"></span> Accept</button>
                          <?php
                        }
                      ?>
                      <span style="float: right"><a href="<?php echo PUERTO."://".HOST.'/dashboard/'; ?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
                  </div>
                
              </div>
            </form>
          </div>  
        </div>
      </div>
      
    </div>
  </div>


  <div class="modal fade" id="yearendentriesModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Confirm Year End Entries</h4>
        </div>
        <div class="modal-body">
          <p>There is already a year end with this date. Are you sure you want to run the process again?.</p>
        </div>
        <div class="modal-footer">
          <button type="button" id="modalSubmit" class="btn btn-primary" data-dismiss="modal">Accept</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


</div>