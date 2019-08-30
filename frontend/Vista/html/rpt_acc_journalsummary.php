<div id="page-wrapper"><br />
  <div class="alert alert-info"><p>Accounting / Report / Journal Entry Summary</p></div>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <form action="<?php echo PUERTO."://".HOST."/report/journalsummary/search/";?>" method="post" class="form-horizontal">
        <fieldset>
          <legend class="mibread" style="text-align: center;"><strong>Journal Entry Summary Report</strong></legend>
          
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Account From:</label>
            <div class="col-md-4">
              <div class="input-group"> 
                <input maxlength="8" id="accfrom" name="accfrom" type="text" value="<?php echo (isset($accfrom) && !empty($accfrom)) ? $accfrom : ''; ?>" class="form-control input-sm"> 
                <span class="input-group-btn"> 
                  <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('accfrom','name_',true,true,true);" ><span style="padding-top: 1px; padding-bottom: 1px" class="glyphicon glyphicon-search"></span></button> 
                </span>
              </div>
            </div>
          </div>                        
            
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Account To:</label>
            <div class="col-md-4">
              <div class="input-group"> 
                <input maxlength="8" id="accto" name="accto" type="text" value="<?php echo (isset($accto) && !empty($accto)) ? $accto : ''; ?>" class="form-control input-sm"> 
                <span class="input-group-btn"> 
                  <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('accto','name_',true,true,true);" ><span style="padding-top: 1px; padding-bottom: 1px" class="glyphicon glyphicon-search"></span></button> 
                </span>
              </div>              
            </div>
          </div>                                            

          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Date From:</label>
            <div class="col-md-3">
              <input type="text" name="datefrom" id="datefrom" class="form-control myDatepicker" maxlength="10" size="10" value="<?php echo (isset($datefrom) && !empty($datefrom)) ? $datefrom : date("m/01/Y");?>" readonly />
            </div>
          </div>
            
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Date To:</label>
            <div class="col-md-3">
              <input type="text" name="dateto" id="dateto" class="form-control myDatepicker" maxlength="10" size="10" value="<?php echo (isset($dateto) && !empty($dateto)) ? $dateto : date("m/t/Y"); ?>" readonly />  
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Type:</label>
            <div class="col-md-3">
              <input class="form-check-input" type="radio" name="typereport" id="typereport" value="R" <?php echo (isset($typereport) && $typereport == "R") ? 'checked="checked"' : ''; ?>>
              <label class="form-check-label" for="typereport">Summarized</label>
            </div>
            <div class="col-md-3">
              <input class="form-check-input" type="radio" name="typereport" id="typereport" value="D" <?php echo (isset($typereport) && $typereport == "D") ? 'checked="checked"' : ''; ?>>
              <label class="form-check-label" for="typereport">Detailed</label>
            </div>
          </div>

          <div class="modal-footer">            
            <button style="float: left;" type="submit" name="register" class="btn btn-primary"><i class="fa fa-eye"></i> Search</a></button>
            <span style="float: left; margin-left: 15px;">
              <a href="<?php echo PUERTO."://".HOST."/report/journalsummary/";?>" class="btn btn-success"><i class="fa fa-repeat"></i> Clean</a></span>            
            <span style="float: right"><a href="<?php echo PUERTO."://".HOST."/dashboard/";?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
          </div>
        </fieldset>
      </form> 
    </div> <!-- FIN DE COL-LG-12  -->
    <div class="col-md-3"></div>
  </div> <!-- FIN DE ROW -->

  <?php 
  if (isset($results) && !empty($results)) { 
    //$url = $dbdatefrom."/".$dbdateto."/";
    //$url .= (!empty($accfrom)) ? $accfrom."/" : ""; 
    //$url .= (!empty($accto)) ? $accto."/" : "";    
  ?>
  <br>
  <span id="pdf" style="float: right; margin-left: 10px">
    <a href="<?php echo PUERTO."://".HOST."/report/generalledger/excel/".$url; ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a>
  </span>
  <span id="excel" style="float: right">
    <a href="<?php echo PUERTO."://".HOST."/report/generalledger/pdf/".$url; ?>" target="_blank" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a>
  </span> 
  <br>
  <div class="tab-content">
    <div class="tab-pane fade in active" id="home-pills">
    <br>                     
    <table width="100%" class="table table-striped table-bordered table-hover style-table" >
    <thead>
      <tr>        
        <th class="style-th">ACCOUNT</th>
        <th class="style-th">NAME ACCOUNT</th>        
        <th class="style-th">DEBIT</th>
        <th class="style-th">CREDIT</th>        
      </tr>
    </thead>
    <tbody>
    <?php 
    if (!empty($results)){ 
      $account = '';      
      $acumdebit = 0;
      $acumcredit = 0;
      foreach($results as $key=>$value){                         
        $acumdebit = $acumdebit + $value["debit"];
        $acumcredit = $acumcredit + $value["credit"];            
        $showdebit = abs($value["debit"]);  
        $showcredit = abs($value["credit"]);           
        echo "<tr>               
                <td>".$value["CODMOV"]."</td>
                <td>".$value["NOMBRE"]."</td>                                                
                <td align='right'>".number_format($showdebit,2)."</td>
                <td align='right'>".number_format($showcredit,2)."</td>                
              </tr>";                     
       } 
       $showacumdebit = abs($acumdebit);
       $showacumcredit = abs($acumcredit);       
       echo "<tr>                             
              <td colspan='2'><strong>Total:</strong></td>
              <td align='right'><strong>".number_format($showacumdebit,2)."</strong></td>
              <td align='right'><strong>".number_format($showacumcredit,2)."</strong></td>
            </tr>";       
    } 
    ?>      
    </tbody>    
    </table>  
   </div>
  </div>
  <br>
<?php } ?>  
</div> <!-- FIN DE WRAPPER  -->