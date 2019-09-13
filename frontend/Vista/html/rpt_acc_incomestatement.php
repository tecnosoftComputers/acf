<div id="page-wrapper"><br />
  <div class="alert alert-info">
    <div class="row">
      <div class="col-md-6">
        <p>Accounting / Report / Income Statement</p>
      </div>
      <div class="col-md-6">
        <p class="text-right"><a href="<?php echo PUERTO."://".HOST."/dashboard/";?>">Back</a></p>
      </div>  
    </div>    
  </div>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <form action="<?php echo PUERTO."://".HOST."/report/incomestatement/search/";?>" method="post" class="form-horizontal">
        <fieldset>
          <legend class="mibread" style="text-align: center;"><strong>Income Statement Report</strong></legend>
          
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Level Account:</label>
            <div class="col-md-4">
              <div class="input-group"> 
                <input maxlength="8" id="acclevel" name="acclevel" type="text" value="<?php echo (isset($acclevel) && !empty($acclevel)) ? $acclevel : ''; ?>" class="form-control input-sm"> 
              </div>
            </div>
          </div>                                              
                      
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Date:</label>
            <div class="col-md-3">
              <input type="text" name="dateto" id="dateto" class="form-control myDatepicker" maxlength="10" size="10" value="<?php echo (isset($dateto) && !empty($dateto)) ? $dateto : date("m/d/Y"); ?>" readonly />  
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Type:</label>
            <div class="col-md-3">
              <input class="form-check-input" type="radio" name="typereport" id="typereport" value="A" <?php echo (isset($typereport) && $typereport == "A") ? 'checked="checked"' : ''; ?>>
              <label class="form-check-label" for="typereport">Accumulated</label>
            </div>
            <div class="col-md-3">
              <input class="form-check-input" type="radio" name="typereport" id="typereport" value="M" <?php echo (isset($typereport) && $typereport == "M") ? 'checked="checked"' : ''; ?>>
              <label class="form-check-label" for="typereport">Monthly</label>
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
              <a href="<?php echo PUERTO."://".HOST."/report/incomestatement/";?>" class="btn btn-success"><i class="fa fa-repeat"></i> Clean</a></span>            
            <span style="float: right"><a href="<?php echo PUERTO."://".HOST."/dashboard/";?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
          </div>
        </fieldset>
      </form> 
    </div> <!-- FIN DE COL-LG-12  -->
    <div class="col-md-3"></div>
  </div> <!-- FIN DE ROW -->

  <?php 
  if (isset($results) && !empty($results)) {
    $url = $dbdatefrom."/".$dbdateto."/".$typereport."/";
    $url .= (!empty($accfrom)) ? $accfrom."/" : ""; 
    $url .= (!empty($accto)) ? $accto."/" : "";       
  ?>
    <br>
    <?php if (isset($permission) && $permission["pri"] == 1){  ?>
      <span id="pdf" style="float: right; margin-left: 10px;">
        <a href="<?php echo PUERTO."://".HOST."/report/incomestatement/excel/".$url; ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a>
      </span>
      <span id="excel" style="float: right;">
        <a href="<?php echo PUERTO."://".HOST."/report/incomestatement/pdf/".$url; ?>" target="_blank" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a>
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
      <table width="100%" class="table table-responsive style-table">
      <thead>
        <tr>        
          <th class="style-th" width="10%">ACCOUNT</th>
          <th class="style-th" width="50%">NAME ACCOUNT</th>        
          <th class="style-th" width="20%">BALANCE</th>
          <th class="style-th" width="20%">TOTAL</th>        
        </tr>
      </thead>
      <tbody>
      <tr><td colspan="8" class="style-td-special"></td></tr> 
      <?php
      $total = 0; 
      $printblank = 0;        
      $acumingresos = 0;
      $acumegresos = 0;
      foreach($results as $key=>$value){                    
        if (empty($value["ingreso"]) && $printblank == 0){
          echo "<tr>               
                <td colspan='4'>&nbsp;</td>                  
                </tr>";                                 
          $printblank = 1;      
        } 
        if ($value["level"] == 1){
          $cod = str_replace(".","",$value["CODIGO"]);
          if (in_array($cod,$types_account["INGRESOS"])){
            $acumingresos = $acumingresos + $value["ingreso"];
          } 
          if (in_array($cod,$types_account["EGRESOS"])){
            $acumegresos = $acumegresos + $value["egreso"];
          }
        }         
        $balance = (!empty($value["ingreso"])) ? $value["ingreso"] * -1 : $value["egreso"];           
        $total = ($value["level"] != 3) ? $balance : 0;   
        $balance = ($value["level"] == 3) ? $balance : 0;          
        echo "<tr>               
                <td>".$value["CODIGO"]."</td>
                <td>".$value["NOMBRE"]."</td>                                                
                <td align='right'>".number_format($balance,2,',','.')."</td>
                <td align='right'>".number_format($total,2,',','.')."</td>                
              </tr>";                     
       }   
       echo "<tr>               
               <td colspan='4'>&nbsp;</td>                  
             </tr>";                     
       $total = abs($acumingresos) - abs($acumegresos);
       if ($total > 0){
         foreach($accdeudora as $deudora){
           echo "<tr>                             
              <td>".$deudora["CODIGO"]."</td>                
              <td>".$deudora["NOMBRE"]."</td>                
              <td>&nbsp;</td>                
              <td class='style-td-totals'>".number_format($total,2,',','.')."</td>
            </tr>";             
         }
       }
       else{
         foreach($accacreedora as $acreedora){
           echo "<tr>                             
              <td>".$acreedora["CODIGO"]."</td>                
              <td>".$acreedora["NOMBRE"]."</td>                
              <td>&nbsp;</td>                
              <td class='style-td-totals'>".number_format($total,2,',','.')."</td>
            </tr>";           
        }
       }         
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