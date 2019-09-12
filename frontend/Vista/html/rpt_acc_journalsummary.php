<div id="page-wrapper"><br />
  <div class="alert alert-info">
    <div class="row">
      <div class="col-md-6">
        <p>Accounting / Report / Journal Entry Summary</p>
      </div>
      <div class="col-md-6">
        <p class="text-right"><a href="<?php echo PUERTO."://".HOST."/dashboard/";?>">Back</a></p>
      </div>  
    </div>    
  </div>
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
              <input class="form-check-input" type="radio" name="typereport" id="typereport" value="S" <?php echo (isset($typereport) && $typereport == "S") ? 'checked="checked"' : ''; ?>>
              <label class="form-check-label" for="typereport">Summarized</label>
            </div>
            <div class="col-md-3">
              <input class="form-check-input" type="radio" name="typereport" id="typereport" value="D" <?php echo (isset($typereport) && $typereport == "D") ? 'checked="checked"' : ''; ?>>
              <label class="form-check-label" for="typereport">Detailed</label>
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
    $url = $dbdatefrom."/".$dbdateto."/".$typereport."/";
    $url .= (!empty($accfrom)) ? $accfrom."/" : ""; 
    $url .= (!empty($accto)) ? $accto."/" : "";   
    if ($typereport == "S"){     
  ?>
      <br>
      <?php if (isset($permission) && $permission["pri"] == 1){  ?>
        <span id="pdf" style="float: right; margin-left: 10px;">
          <a href="<?php echo PUERTO."://".HOST."/report/journalsummary/excel/".$url; ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a>
        </span>
        <span id="excel" style="float: right;">
          <a href="<?php echo PUERTO."://".HOST."/report/journalsummary/pdf/".$url; ?>" target="_blank" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a>
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
            <th class="style-th" width="60%">NAME ACCOUNT</th>        
            <th class="style-th" width="15%">DEBIT</th>
            <th class="style-th" width="15%">CREDIT</th>        
          </tr>
        </thead>
        <tbody>
        <tr><td colspan="8" class="style-td-special"></td></tr> 
        <?php             
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
                  <td align='right'>".number_format($showdebit,2,',','.')."</td>
                  <td align='right'>".number_format($showcredit,2,',','.')."</td>                
                </tr>";                     
         } 
         $showacumdebit = abs($acumdebit);
         $showacumcredit = abs($acumcredit);       
         echo "<tr>                             
                <td colspan='2' align='right'><strong>Total:</strong></td>
                <td class='style-td-totals'>".number_format($showacumdebit,2,',','.')."</td>
                <td class='style-td-totals'>".number_format($showacumcredit,2,',','.')."</td>
              </tr>";           
        ?>      
        </tbody>    
        </table>  
       </div>
      </div>
      <br>
<?php 
    }
    if ($typereport == "D"){ ?>
      <br>
      <?php if (isset($permission) && $permission["pri"] == 1){  ?>
        <span id="pdf" style="float: right; margin-left: 10px">
          <a href="<?php echo PUERTO."://".HOST."/report/journalsummary/excel/".$url; ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a>
        </span>
        <span id="excel" style="float: right">
          <a href="<?php echo PUERTO."://".HOST."/report/journalsummary/pdf/".$url; ?>" target="_blank" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a>
        </span>
      <?php } else{ ?>
        <span style="float: right; margin-left: 10px;">
          <a href="javascript:void(0);" onclick="viewMessage('You cannot execute this action');" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a>
        </span>
        <span id="excel" style="float: right;">
          <a href="javascript:void(0);" onclick="viewMessage('You cannot execute this action');" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a>
        </span>
      <?php } ?>     
      <br>
      <div class="tab-content">
        <div class="tab-pane fade in active" id="home-pills">
        <br> 
        <div class="table table-responsive">                    
        <table width="100%" class="table table-responsive table-striped style-table">
        <thead>
          <tr>        
            <th class="style-th" width="10%">TYPE SEAT</th>
            <th class="style-th" width="45%">DESCRIPTION</th>        
            <th class="style-th" width="15%">DEBIT</th>
            <th class="style-th" width="15%">CREDIT</th>        
            <th class="style-th" width="15%">(DB - CR)</th>        
          </tr>
        </thead>
        <tbody>
        <tr><td colspan="5" class="style-td-special"></td></tr> 
        <?php     
        $account = '';      
        $acumdebit = 0;
        $acumcredit = 0;
        $acumresta = 0;
        $totdebit = 0;
        $totcredit = 0;
        $totresta = 0;
        foreach($results as $key=>$value){ 
          if ($account <> $value["CODMOV"]){            
            if (!empty($key)){
              $sign = Utils::getSign(trim($account),array("ACTIVO","EGRESOS"),$types_account); 
              $totdebit = $totdebit + $acumdebit;
              $totcredit = $totcredit + $acumcredit;
              $totresta = $totresta + $acumresta;
              $showacumdebit = abs($acumdebit);
              $showacumcredit = abs($acumcredit);               
              $showacumresta = round($acumresta,2);               
              $showacumresta = ($sign) ? $showacumresta : $showacumresta * -1; 
              $showacumresta = (empty($showacumresta)) ? abs($showacumresta) : $showacumresta;     

              echo "<tr>                                  
                     <td colspan='2' align='right'><strong>Subtotal:</strong></td>       
                     <td class='style-td-totals'>".number_format($showacumdebit,2,',','.')."</td>
                     <td class='style-td-totals'>".number_format($showacumcredit,2,',','.')."</td> 
                     <td class='style-td-totals'>".number_format($showacumresta,2,',','.')."</td>
                    </tr>";    
              echo "<tr><td colspan='5'>&nbsp;</td></tr>";         
            }
            echo "<tr class='style-tr-cab'>               
                   <td>".$value["CODMOV"]."</td>
                   <td>".$value["NOMBRE"]."</td> 
                   <td colspan='3'>&nbsp;</td>                                      
                 </tr>";   
            $account = $value["CODMOV"];   
            $acumdebit = 0;
            $acumcredit = 0;
            $acumresta = 0;  
          }
          $sign = Utils::getSign(trim($value["CODMOV"]),array("ACTIVO","EGRESOS"),$types_account); 
          $acumdebit = $acumdebit + $value["debit"];
          $acumcredit = $acumcredit + $value["credit"]; 
          $acumresta = $acumresta + $value["debit"] + $value["credit"];           
          $showdebit = abs($value["debit"]);  
          $showcredit = abs($value["credit"]);  
          $showresta = $value["debit"] + $value["credit"];           
          $showresta = round($showresta,2);               
          $showresta = ($sign) ? $showresta : $showresta * -1; 
          $showresta = (empty($showresta)) ? abs($showresta) : $showresta;           
          echo "<tr>               
                  <td>".$value["TIPO_ASI"]."</td>
                  <td>".$value["nameseat"]."</td>                                                
                  <td align='right'>".number_format($showdebit,2,',','.')."</td>
                  <td align='right'>".number_format($showcredit,2,',','.')."</td>                
                  <td align='right'>".number_format($showresta,2,',','.')."</td>                
                </tr>";                     
         }
         $totdebit = $totdebit + $acumdebit;
         $totcredit = $totcredit + $acumcredit;
         $totresta = $totresta + $acumresta; 
         $showacumdebit = abs($acumdebit);
         $showacumcredit = abs($acumcredit); 
         $showacumresta = round($acumresta,2);               
         $showacumresta = ($sign) ? $showacumresta : $showacumresta * -1; 
         $showacumresta = (empty($showacumresta)) ? abs($showacumresta) : $showacumresta;
         
         $showtotdebit = abs($totdebit);
         $showtotcredit = abs($totcredit);         
         $showtotresta = round($totresta,2);               
         $showtotresta = ($sign) ? $showtotresta : $showtotresta * -1; 
         $showtotresta = (empty($showtotresta)) ? abs($showtotresta) : $showtotresta;
         echo "<tr>                                  
                 <td colspan='2' align='right'><strong>Subtotal:</strong></td>       
                 <td class='style-td-totals'>".number_format($showacumdebit,2,',','.')."</td>
                 <td class='style-td-totals'>".number_format($showacumcredit,2,',','.')."</td> 
                 <td class='style-td-totals'>".number_format($showacumresta,2,',','.')."</td>
               </tr>";
         echo "<tr><td colspan='5'>&nbsp;</td></tr>";       
         echo "<tr>                                  
                 <td colspan='2' align='right'><strong>Totals:</strong></td>       
                 <td class='style-td-totals'>".number_format($showtotdebit,2,',','.')."</td>
                 <td class='style-td-totals'>".number_format($showtotcredit,2,',','.')."</td>
                 <td class='style-td-totals'>".number_format($showtotresta,2,',','.')."</td>
               </tr>";      
        ?>      
        </tbody>    
        </table>
        </div>  
       </div>
      </div>
      <br>
<?php    
  }  
}       
?>  
</div> <!-- FIN DE WRAPPER  -->