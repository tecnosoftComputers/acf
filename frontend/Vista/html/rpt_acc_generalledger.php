<div id="page-wrapper"><br />
  <div class="alert alert-info"><p>Accounting / Report / General Ledger</p></div>
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
            <button style="float: left;" type="submit" name="register" class="btn btn-primary"><i class="fa fa-eye"></i> Search</a></button>
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
    //$url = (!empty($accfrom)) ? $accfrom."/" : "";
    //$url .= (!empty($accto)) ? $accto."/" : "";    
  ?>
  <br>
  <!--<span id="pdf" style="float: right; margin-left: 10px">
    <a href="<?php echo PUERTO."://".HOST."/report/chartaccount/excel/".$url; ?>" target="_blank" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a>
  </span>
  <span id="excel" style="float: right">
    <a href="<?php echo PUERTO."://".HOST."/report/chartaccount/pdf/".$url; ?>" target="_blank" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a>
  </span> 
  <br>-->                   
  <div class="tab-content">
    <div class="tab-pane fade in active" id="home-pills">
    <br>                     
    <table width="100%" class="table table-striped table-bordered table-hover style-table" >
    <thead>
      <tr>        
        <th class="style-th">DATE</th>
        <th class="style-th">SEAT</th>        
        <th class="style-th">TYPE SEAT</th>        
        <th class="style-th">REFERENCE</th>
        <th class="style-th">CONCEPT</th>
        <th class="style-th">DEBIT</th>
        <th class="style-th">CREDIT</th>
        <th class="style-th">BALANCE</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    if (!empty($results)){ 
      $account = '';      
    ?>    
      <?php foreach($results as $key=>$value){ ?>      
        <?php 
        if ($account != $value["CODMOV"] && !empty(trim($value["CODMOV"]))){          
          $infoaccount = Modelo_ChartAccount::getIndividual($value["CODMOV"]);
          echo "<tr style='background-color:#e5e6ed;''>
                  <td colspan='3'><strong>".$value["CODMOV"]."</strong></td>
                  <td colspan='2'><strong>".$infoaccount["NOMBRE"]."</strong></td>
                  <td colspan='2'><strong>Previous Balance:</strong></td>
                  <td align='right'><strong>".number_format(abs($value["balance"]),2)."</strong></td>
                </tr>";
          $account = $value["CODMOV"];  
          $infomov = Modelo_Dpmovimi::report($_SESSION['acfSession']['id_empresa'],
                     $dbdatefrom,$dbdateto,'','','',$value["CODMOV"],array("c.FECHA_ASI","m.ASIENTO")); 
          $balance = $value["balance"];
          $acumdebit = 0;
          $acumcredit = 0;
          $acumbalance = 0;
          if (!empty($infomov)){
            foreach($infomov as $mov){
              $debit = ($mov["IMPORTE"] > 0) ? $mov["IMPORTE"] : 0;
              $credit = ($mov["IMPORTE"] <= 0) ? $mov["IMPORTE"] : 0;
              $balance = $balance + $mov["IMPORTE"];
              $acumdebit = $acumdebit + $debit;
              $acumcredit = $acumcredit + $credit; 
              $idmov = Utils::encriptar($mov["IDCONT"]);                      
              echo "<tr>               
                      <td>".date("m/d/Y",strtotime($mov["FECHA_ASI"]))."</td>
                      <td><a onclick=\"viewJournal('".$idmov."')\" style='cursor:pointer;'>".$mov["ASIENTO"]."</a></td>
                      <td>".$mov["TIPO_ASI"]."</td>
                      <td>".$mov["REFER"]."</td>
                      <td>".$mov["CONCEPTO"]."</td>
                      <td align='right'>".number_format($debit,2)."</td>
                      <td align='right'>".number_format(abs($credit),2)."</td>
                      <td align='right'>".number_format(abs($balance),2)."</td>
                    </tr>";             
            }            
          } 
          $acumcredit = ($acumcredit >=0) ? 0 : $acumcredit*-1;
          echo "<tr>               
                  <td colspan='4'>&nbsp;</td>
                  <td><strong>Current Balance:</strong></td>
                  <td align='right'><strong>".number_format($acumdebit,2)."</strong></td>
                  <td align='right'><strong>".number_format(abs($acumcredit),2)."</strong></td>
                  <td align='right'><strong>".number_format(abs($balance),2)."</strong></td>
                </tr>"; 
          echo "<tr><td colspan='8'>&nbsp;</td></tr>";
        }  
        ?>        
      <?php } ?>
    <?php } ?>      
    </tbody>    
    </table>  
   </div>
  </div>
  <br>
<?php } ?>  
</div> <!-- FIN DE WRAPPER  -->