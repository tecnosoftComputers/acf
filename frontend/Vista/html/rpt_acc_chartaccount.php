<div id="page-wrapper"><br />
  <div class="alert alert-info"><p>Accounting / Report / Chart of Accounts / <a style="float: right; color: #fff" href="<?php echo PUERTO."://".PREVIOUS_SYSTEM.DASHBOARD; ?>">Back</a></p></div>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <form action="<?php echo PUERTO."://".HOST."/report/chartaccount/search/";?>" method="post" class="form-horizontal">
        <fieldset>
          <legend class="mibread" style="text-align: center;"><strong>Chart Accounts Report</strong></legend>
          
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

          <div class="modal-footer">
            <?php
            if (isset($permission) && $permission["rd"] == 1){ 
            ?>             
            <button style="float: left;" type="submit" name="register" id="register" class="btn btn-primary"><i class="fa fa-eye"></i> Search</a></button>
            <?php }else{ ?>
              <button style="float: left;" type="button" class="btn btn-primary" onclick="viewMessage('You cannot execute this action');"><i class="fa fa-eye"></i> Search</a></button> 
            <?php } ?>  
            <span style="float: left; margin-left: 15px;">
              <a href="<?php echo PUERTO."://".HOST."/report/chartaccount/";?>" class="btn btn-success"><i class="fa fa-repeat"></i> Clean</a></span>            
            <span style="float: right"><a href="<?php echo PUERTO."://".HOST."/dashboard/";?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
          </div>
        </fieldset>
      </form> 
    </div> <!-- FIN DE COL-LG-12  -->
    <div class="col-md-3"></div>
  </div> <!-- FIN DE ROW -->

  <?php 
  if (isset($results) && !empty($results)) { 
    $url = (!empty($accfrom)) ? $accfrom."/" : "";
    $url .= (!empty($accto)) ? $accto."/" : "";    
  ?>
  <br>
  <!--<div class="form-group col-md-6">
    <label for="records" class="col-md-4 control-label">Number of records:</label>
    <div class="col-md-2">
      <select class="form-control" id="nrorecords" name="nrorecords">
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
      </select> 
    </div>    
  </div>-->
        
  <?php if (isset($permission) && $permission["pri"] == 1){  ?>
    <span id="pdf" style="float: right; margin-left: 10px;">
      <a href="<?php echo PUERTO."://".HOST."/report/chartaccount/excel/".$url; ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a>
    </span>
    <span id="excel" style="float: right">
      <a href="<?php echo PUERTO."://".HOST."/report/chartaccount/pdf/".$url; ?>" target="_blank" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a>
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
        <th class="style-th">ACCOUNT</th>
        <th class="style-th">NAME ACCOUNT</th>        
      </tr>
    </thead>
    <tbody>
    <tr><td colspan="2" class="style-td-special"></td></tr>
    <?php foreach( $results as $key=>$value ){ ?>
      <?php 
      $nro = substr_count($value["CODIGO"],".");   
      $lastc = substr($value["CODIGO"], -1);   
      ?>
      <tr>                 
        <?php 
        $blank_spaces = "";
        if ($nro>1){
          for($i=1;$i<$nro;$i++){
            $blank_spaces .= "&nbsp;&nbsp;";
          }
        }   
        if ($lastc == '.'){
          echo "<td><strong>".$value["CODIGO"]."</strong></td>";
          echo "<td><strong>".$blank_spaces.$value["NOMBRE"]."</strong></td>";
        }     
        else{
          $blank_spaces .= "&nbsp;&nbsp;&nbsp;";
          echo "<td>".$value["CODIGO"]."</td>";
          echo "<td>".$blank_spaces.$value["NOMBRE"]."</td>";
        }        
        ?>        
      </tr>            
    <?php } ?>      
    </tbody>    
    </table>  
   </div>
  </div>
  <br>
<?php 
} 
?>  
</div> <!-- FIN DE WRAPPER  -->