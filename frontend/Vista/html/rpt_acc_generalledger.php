<div id="page-wrapper"><br />
  <div class="alert alert-info">
    <div class="row">
      <div class="col-md-6">
        <p>Accounting / Report / General Ledger</p>
      </div>
      <div class="col-md-6">
        <p class="text-right"><a href="<?php echo PUERTO."://".HOST."/dashboard/";?>">Back</a></p>
      </div>  
    </div>    
  </div>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <form action="<?php echo PUERTO."://".HOST."/report/generalledger/search/";?>" method="post" class="form-horizontal">
        <fieldset>
          <legend class="mibread" style="text-align: center;"><strong>General Ledger Report</strong></legend>
          
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
              <a href="<?php echo PUERTO."://".HOST."/report/generalledger/";?>" class="btn btn-success"><i class="fa fa-repeat"></i> Clean</a></span>            
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
    <span id="pdf_general" style="float: right; margin-left: 10px">
      <a href="<?php echo PUERTO."://".HOST."/report/generalledger/excel/".$url; ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a>
    </span>
    <span id="excel_general" style="float: right">
      <a href="<?php echo PUERTO."://".HOST."/report/generalledger/pdf/".$url; ?>" target="_blank" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a>
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
        <th class="style-th" width="7%">DATE</th>
        <th class="style-th" width="5%">TYPE</th>        
        <th class="style-th" width="7%">SEAT</th>        
        <th class="style-th" width="8%">REFERENCE</th>
        <th class="style-th" width="8%">SETTLEMENT</th>
        <th class="style-th" width="29%">CONCEPT</th>
        <th class="style-th" width="12%">DEBIT</th>
        <th class="style-th" width="12%">CREDIT</th>
        <th class="style-th" width="12%">BALANCE</th>
      </tr>
    </thead>
    <tbody>
    <tr><td colspan="9" class="style-td-special"></td></tr>
    <?php     
    $account = ''; 
    $sign = '';         
    foreach($results as $key=>$value){ 
      if ($account != $value["CODMOV"]){ 
        //get sign of the account
        $sign = Utils::getSign(trim($account),array("ACTIVO","EGRESOS"),$types_account);

        if (!empty($key)){          
          $showacumdebit = abs($acumdebit);
          $showacumcredit = abs($acumcredit);  
          $showbalance = round($balance,2);               
          $showbalance = ($sign) ? $showbalance : $showbalance * -1; 
          $showbalance = (empty($showbalance)) ? abs($showbalance) : $showbalance;         
          
          echo "<tr>               
                <td colspan='5'>&nbsp;</td>
                <td><strong>Current Balance:</strong></td>
                <td class='style-td-totals'>".number_format($showacumdebit,2)."</td>
                <td class='style-td-totals'>".number_format($showacumcredit,2)."</td>
                <td class='style-td-totals'>".number_format($showbalance,2)."</td>
              </tr>"; 
          echo "<tr><td colspan='9'>&nbsp;</td></tr>"; 
        }
        
        $infoaccount = Modelo_ChartAccount::getIndividual(trim($value["CODMOV"]));          
        $prevbalance = Modelo_Dpmovimi::reportLedger($_SESSION['acfSession']['id_empresa'],
                                                     date("Y-m-d",$dbdatefrom),
                                                     trim($value["CODMOV"]));                
        
        $sign = Utils::getSign(trim($value["CODMOV"]),array("ACTIVO","EGRESOS"),$types_account);
        $showprevbalance = round($prevbalance["balance"],2);               
        $showprevbalance = ($sign) ? $showprevbalance : $showprevbalance * -1;
        $showprevbalance = (empty($showprevbalance)) ? abs($showprevbalance) : $showprevbalance;
        
        echo "<tr class='style-tr-cab'>
                <td colspan='3'>".$value["CODMOV"]."</td>
                <td colspan='3'>".$infoaccount["NOMBRE"]."</td>
                <td colspan='2'>Previous Balance:</td>
                <td align='right'>".number_format($showprevbalance,2)."</td>
              </tr>";
        $account = $value["CODMOV"];    
        $acumdebit = 0;
        $acumcredit = 0;
        $acumbalance = 0;
        $balance = $prevbalance["balance"];               
      }        
        
      $debit = ($value["IMPORTE"] > 0) ? $value["IMPORTE"] : 0;
      $credit = ($value["IMPORTE"] <= 0) ? $value["IMPORTE"] : 0;
      $balance = $balance + $value["IMPORTE"];
      $acumdebit = $acumdebit + $debit;
      $acumcredit = $acumcredit + $credit;    
      $idmov = Utils::encriptar($value["IDCONT"]);
      $showdebit = abs($debit);  
      $showcredit = abs($credit);
      $showbalance = round($balance,2);
      $showbalance = ($sign) ? $showbalance : $showbalance * -1;      
      $showbalance = (empty($showbalance)) ? abs($showbalance) : $showbalance;      
      
      echo "<tr>               
              <td>".date("m/d/Y",strtotime($value["FECHA_ASI"]))."</td>
              <td>".$value["TIPO_ASI"]."</td>
              <td><a onclick=\"viewJournal('".$idmov."')\" style='cursor:pointer;'>".$value["ASIENTO"]."</a></td>                  
              <td>".$value["REFER"]."</td>
              <td>".$value["LIQUIDA_NO"]."</td>
              <td>".$value["CONCEPTO"]."</td>
              <td align='right'>".number_format($showdebit,2)."</td>
              <td align='right'>".number_format($showcredit,2)."</td>
              <td align='right'>".number_format($showbalance,2)."</td>
            </tr>";                     
    } 
    $showacumdebit = abs($acumdebit);
    $showacumcredit = abs($acumcredit);
    $showbalance = round($balance,2);     
    $showbalance = ($sign) ? $showbalance : $showbalance * -1;    
    $showbalance = (empty($showbalance)) ? abs($showbalance) : $showbalance;    
        
    echo "<tr>               
            <td colspan='5'>&nbsp;</td>
            <td><strong>Current Balance:</strong></td>
            <td class='style-td-totals'>".number_format($showacumdebit,2)."</td>
            <td class='style-td-totals'>".number_format($showacumcredit,2)."</td>
            <td class='style-td-totals'>".number_format($showbalance,2)."</td>
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