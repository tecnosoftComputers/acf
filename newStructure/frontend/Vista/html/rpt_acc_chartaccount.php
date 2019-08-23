<div id="page-wrapper"><br />
  <div class="alert alert-info"><p>Accounting / Report / Chart of Accounts</p></div>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <form action="<?php echo PUERTO."://".HOST."/report/chartaccount/search/";?>" method="post" class="form-horizontal">
        <fieldset>
          <legend class="mibread"><strong>Chart Accounts Report</strong></legend>
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Account From:</label>
            <div class="col-md-3">
              <input type="text" name="accfrom" id="accfrom" class="form-control" maxlength="8" size="8" value="<?php echo (isset($accfrom) && !empty($accfrom)) ? $accfrom : ''; ?>" />
            </div>
          </div>
            
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Account To:</label>
            <div class="col-md-3">
              <input type="text" name="accto" id="accto" class="form-control" maxlength="8" size="8" value="<?php echo (isset($accto) && !empty($accto)) ? $accto : ''; ?>" />  
            </div>
          </div>                                            

          <div class="modal-footer">            
            <button style="float: left;" type="submit" name="register" class="btn btn-primary"><i class="fa fa-eye"></i> Search</a></button>
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
  <span id="pdf" style="float: right; margin-left: 10px">
    <a href="<?php echo PUERTO."://".HOST."/report/chartaccount/excel/".$url; ?>" target="_blank" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a>
  </span>
  <span id="excel" style="float: right">
    <a href="<?php echo PUERTO."://".HOST."/report/chartaccount/pdf/".$url; ?>" target="_blank" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a>
  </span> 
  <br>                   
  <div class="tab-content">
    <div class="tab-pane fade in active" id="home-pills">
    <br>                     
    <table width="100%" class="table table-striped table-bordered table-hover" >
    <thead>
      <tr>        
        <th align="center">ACCOUNT</th>
        <th align="center">NAME ACCOUNT</th>        
      </tr>
    </thead>
    <tbody>
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
<?php } ?>  
</div> <!-- FIN DE WRAPPER  -->