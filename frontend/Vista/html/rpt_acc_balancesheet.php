<div id="page-wrapper"><br />
  <div class="alert alert-info"><p>Accounting / Report / Balance Sheet</p></div>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <form action="<?php echo PUERTO."://".HOST."/report/balancesheet/search/";?>" method="post" class="form-horizontal" id="frmreport">
        <fieldset>
          <legend class="mibread" style="text-align: center;"><strong>Balance Sheet Report</strong></legend>
          <input type="hidden" name="limit" id="limit" value="<?php echo $limit;?>">
          
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Account Level:</label>
            <div class="col-md-3">
              <div class="input-group"> 
                <input maxlength="8" id="acclevel" name="acclevel" type="text" value="<?php echo (isset($acclevel) && !empty($acclevel)) ? $acclevel : ''; ?>" class="form-control input-sm">                
              </div>
            </div>
          </div>                        
            
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Date:</label>
            <div class="col-md-3">
              <input type="text" name="datebalance" id="datebalance" class="form-control myDatepicker" maxlength="10" size="10" value="<?php echo (isset($datebalance) && !empty($datebalance)) ? $datebalance : date("m/d/Y"); ?>" readonly />  
            </div>
          </div>                                           

          <div class="modal-footer">            
            <button style="float: left;" type="submit" name="register" id="register" class="btn btn-primary"><i class="fa fa-eye"></i> Search</a></button>
            <span style="float: left; margin-left: 15px;">
              <a href="<?php echo PUERTO."://".HOST."/report/balancesheet/";?>" class="btn btn-success"><i class="fa fa-repeat"></i> Clean</a></span>            
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
  <div class="form-group col-md-6">
    <label for="records" class="col-md-4 control-label">Number of records:</label>
    <div class="col-md-2">
      <select class="form-control" id="optrecords" name="optrecords">        
      <?php 
      foreach($vlrecords as $nro){  
        if ($nro == $limit){
          echo '<option value="'.$nro.'" selected="selected">'.$nro.'</option>';
        } 
        else{
          echo '<option value="'.$nro.'">'.$nro.'</option>';          
        } 
      } 
      ?>                  
      </select> 
    </div>    
  </div>
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
    <table width="100%" class="table table-responsive style-table" >
    <thead>
      <tr>        
        <th class="style-th">ACCOUNT</th>
        <th class="style-th">NAME ACCOUNT</th>  
        <th class="style-th">BALANCES</th>
        <th class="style-th">TOTAL</th>      
      </tr>
    </thead>
    <tbody>
    <?php
    $acumactivo = 0;
    $acumpasivo = 0;
    $acumcapital = 0;
    foreach( $results as $key=>$value ){ 
    // echo $value["activo"]." -- ".$value["pasivo"]." -- ".$value["capital"]."<br>"; 
      ?>
      <?php 
      $nro = substr_count($value["CODIGO"],".");   
      $lastc = substr($value["CODIGO"], -1);   
      ?>
      <tr>                 
        <?php 
        $blank_spaces = "";

        if($value["level"] == 1){
          echo "<tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>";
        }

        // $balance = (!empty($value["activo"])) ? $value["activo"]  : $value["pasivo"] * -1;  
        if(!empty($value["activo"])){
          $balance = $value["activo"];
        }
        elseif(!empty($value["pasivo"])){
          $balance = $value["pasivo"] * -1;
        } 
        else{
          $balance = $value["capital"] * -1;
        }        
        $total = ($value["level"] != 3) ? $balance : 0;   
        $balance = ($value["level"] == 3) ? $balance : 0;
        // echo "eder. ".$balance;
        if ($nro>1){
          for($i=1;$i<$nro;$i++){
            $blank_spaces .= "&nbsp;&nbsp;";
          }
        }   
        if ($lastc == '.'){
          echo "<td><strong>".$value["CODIGO"]."</strong></td>";
          echo "<td><strong>".$blank_spaces.$value["NOMBRE"]."</strong></td>";
          echo "<td align='right'><strong>".number_format(bcdiv($balance,1,2),2,',','.')."</strong></td>";
          echo "<td align='right'><strong>".number_format(bcdiv($total,1,2),2,',','.')."</strong></td>";
        }     
        else{
          $blank_spaces .= "&nbsp;&nbsp;&nbsp;";
          echo "<td>".$value["CODIGO"]."</td>";
          echo "<td>".$blank_spaces.$value["NOMBRE"]."</td>";
          echo "<td align='right'><strong>".number_format(bcdiv($balance,1,2),2,',','.')."</strong></td>";
          echo "<td align='right'><strong>".number_format(bcdiv($total,1,2),2,',','.')."</strong></td>";
        }        
        ?>        
      </tr>            
    <?php } 

      if(isset($totalresult)){
        echo "<tr>               
               <td colspan='4'>&nbsp;</td>                  
             </tr>"; 
        echo "<tr>
                <td></td>
                <td><strong><h5>".$totalresult["labelthis"]."</h5></strong></td>
                <td></td>
                <td align='right'><strong><h5>".number_format(bcdiv($totalresult["valuethis"],1,2),2,',','.')."</h5></strong></td>
              </tr>";
      }

    ?>      
    </tbody>    
    </table>  
   </div>
  </div>
  <center>
      <?php
       if (!empty($pagination)){
        echo $pagination;
      }?>
      </center>
  <br>
<?php } ?>  
</div> <!-- FIN DE WRAPPER  -->