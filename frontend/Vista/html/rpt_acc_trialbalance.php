<div id="page-wrapper"><br />
  <div class="alert alert-info"><p>Accounting / Report / Trial Balance</p></div>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <form action="<?php echo PUERTO."://".HOST."/report/trialbalance/search/";?>" method="post" class="form-horizontal">
        <fieldset>
          <legend class="mibread" style="text-align: center;"><strong>Trial Balance Report</strong></legend>
          
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

          <div class="modal-footer"> 
            <?php if (isset($permission) && $permission["rd"] == 1){ ?>           
              <button style="float: left;" type="submit" name="register" id="register" class="btn btn-primary"><i class="fa fa-eye"></i> Search</a></button>
            <?php }else{ ?>
              <button style="float: left;" type="button" class="btn btn-primary" onclick="viewMessage('You cannot execute this action');"><i class="fa fa-eye"></i> Search</a></button>  
            <?php } ?>  
            <span style="float: left; margin-left: 15px;">
              <a href="<?php echo PUERTO."://".HOST."/report/trialbalance/";?>" class="btn btn-success"><i class="fa fa-repeat"></i> Clean</a></span>            
            <span style="float: right"><a href="<?php echo PUERTO."://".HOST."/dashboard/";?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
          </div>
        </fieldset>
      </form> 
    </div> <!-- FIN DE COL-LG-12  -->
    <div class="col-md-3"></div>
  </div> <!-- FIN DE ROW -->

  <?php 
  if (isset($results) && !empty($results)) { 
    $url = $dbdatefrom."/".$dbdateto."/";
    $url .= (!empty($accfrom)) ? $accfrom."/" : ""; 
    $url .= (!empty($accto)) ? $accto."/" : "";    
  ?>
  <br>
  <?php if (isset($permission) && $permission["pri"] == 1){  ?>
    <span id="pdf" style="float: right; margin-left: 10px">
      <a href="<?php echo PUERTO."://".HOST."/report/trialbalance/excel/".$url; ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a>
    </span>
    <span id="excel" style="float: right">
      <a href="<?php echo PUERTO."://".HOST."/report/trialbalance/pdf/".$url; ?>" target="_blank" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a>
    </span>
  <?php } else{ ?>
    <span style="float: right; margin-left: 10px;">
      <a href="javascript:void(0);" class="btn btn-success" onclick="viewMessage('You cannot execute this action');"><i class="fa fa-file-excel-o"></i></a>
    </span>
    <span style="float: right;">
      <a href="javascript:void(0);" class="btn btn-danger" onclick="viewMessage('You cannot execute this action');"><i class="fa fa-file-pdf-o"></i></a>
    </span> 
  <?php } ?>     
  <br>
  <div class="tab-content">
    <div class="tab-pane fade in active" id="home-pills">
    <br>                     
    <table width="100%" class="table table-responsive table-striped style-table">
    <thead>
      <tr>        
        <th class="style-th" width="8%">ACCOUNT</th>
        <th class="style-th" width="32%">ACCOUNT NAME</th>        
        <th class="style-th" width="15%">PREVIOUS BALANCE</th>        
        <th class="style-th" width="15%">DEBIT</th>
        <th class="style-th" width="15%">CREDIT</th>
        <th class="style-th" width="15%">CURRENT BALANCE</th>        
      </tr>
    </thead>
    <tbody>
    <tr><td colspan="9" class="style-td-special"></td></tr>
    <?php   
    $acumbalance = 0;
    $acumdebit = 0;
    $acumcredit = 0;      
    foreach($results as $key=>$value){                               
      $acumbalance = $acumbalance + $value["balance"];
      $acumdebit = $acumdebit + $value["debit"];
      $acumcredit = $acumcredit + $value["credit"];    
      
      $showdebit = abs($value["debit"]);  
      $showcredit = abs($value["credit"]);   
      $showbalance = $value["balance"];
      echo "<tr>               
              <td>"." ".$value["CODIGO"]."</td>
              <td>".$value["NOMBRE"]."</td>
              <td align='right'>".number_format($showbalance,2)."</td>
              <td align='right'>".number_format($showdebit,2)."</td>
              <td align='right'>".number_format($showcredit,2)."</td>              
            </tr>";                     
    } 
    $showacumdebit = abs($acumdebit);
    $showacumcredit = abs($acumcredit);
    $showbalance = $acumbalance;
    echo "<tr>                           
            <td colspan='2'><strong>Totals:</strong></td>
            <td class='style-td-totals'>".number_format($showbalance,2)."</td>
            <td class='style-td-totals'>".number_format($showacumdebit,2)."</td>
            <td class='style-td-totals'>".number_format($showacumcredit,2)."</td>            
          </tr>";       
    ?>      
    </tbody>    
    </table>  
   </div>
  </div>
  <br>
<?php 
}
?>  
</div> <!-- FIN DE WRAPPER  -->