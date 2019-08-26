<div id="page-wrapper"><br />
  <div class="alert alert-info"><p>Accounting / Report / Journal Entries</p></div>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <form action="<?php echo PUERTO."://".HOST."/report/journalentries/search/";?>" method="post" class="form-horizontal">
        <fieldset>
          <legend class="mibread" style="text-align: center;"><strong>Journal Entries Report</strong></legend>
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
            <label class="col-md-4 control-label" for="name">Seat From:</label>
            <div class="col-md-4">
              <select name="typeseatfrom" id="typeseatfrom" class="form-control">
                <?php if (!empty($type_seats)) { ?>
                  <?php foreach($type_seats as $val){ ?>
                    <option value="<?php echo $val['TIPO_ASI'];?>" <?php echo (isset($typeseat) && $typeseat == $val["TIPO_ASI"]) ? "selected=selected" : ""; ?>><?php echo $val['TIPO_ASI']."-".$val['NOMBRE'];?></option>
                  <?php } ?>
                <?php } ?>
              </select>
            </div>
            
            <div class="col-md-3">
              <input type="text" autocomplete="off" id="seatfrom" name="seatfrom" class="form-control" maxlength="8" size="8" value="<?php echo (isset($seatfrom) && !empty($seatfrom)) ? $seatfrom : ''; ?>" />
            </div>
          </div>
            
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Seat To:</label>
            <div class="col-md-4">
              <select name="typeseatto" id="typeseatto" class="form-control">
                <?php if (!empty($type_seats)) { ?>
                  <?php foreach($type_seats as $val){ ?>
                    <option value="<?php echo $val['TIPO_ASI'];?>" <?php echo (isset($typeseat) && $typeseat == $val["TIPO_ASI"]) ? "selected=selected" : ""; ?>><?php echo $val['TIPO_ASI']."-".$val['NOMBRE'];?></option>
                  <?php } ?>
                <?php } ?>
              </select>
            </div>
            
            <div class="col-md-3">
              <input type="text" autocomplete="off" id="seatto" name="seatto" class="form-control" maxlength="8" size="8" value="<?php echo (isset($seatto) && !empty($seatto)) ? $seatto : ''; ?>" />
            </div>
          </div>

          <div class="modal-footer">            
            <button style="float: left;" type="submit" name="register" class="btn btn-primary"><i class="fa fa-eye"></i> Search</a></button>
            <span style="float: left; margin-left: 15px;">
              <a href="<?php echo PUERTO."://".HOST."/report/journalentries/";?>" class="btn btn-success"><i class="fa fa-repeat"></i> Clean</a></span>            
            <span style="float: right"><a href="<?php echo PUERTO."://".HOST."/dashboard/";?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
          </div>
        </fieldset>
      </form> 
    </div> <!-- FIN DE COL-LG-12  -->
    <div class="col-md-3"></div>
  </div> <!-- FIN DE ROW -->

  <?php 
  if (isset($result) && !empty($result)) { 
    $acum_debit = 0;
    $acum_credit = 0;
    $seataux = '';    
    $url = $typeseat."/".$datefromdb."/".$datetodb."/";
    $url .= (!empty($seatfrom)) ? $seatfrom."/" : "";
    $url .= (!empty($seatto)) ? $seatto."/" : "";    
  ?>
  <br>
  <span id="pdf" style="float: right; margin-left: 10px">
    <a href="<?php echo PUERTO."://".HOST."/report/journalentries/excel/".$url; ?>" target="_blank" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a>
  </span>
  <span id="excel" style="float: right">
    <a href="<?php echo PUERTO."://".HOST."/report/journalentries/pdf/".$url; ?>" target="_blank" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a>
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
        <th class="style-th">TYPE</th>
        <th class="style-th">REFERENCE</th>
        <th class="style-th">DOCUMENT</th>
        <th class="style-th">CONCEPT</th>
        <th class="style-th">DEBIT</th>
        <th class="style-th">CREDIT</th>          
      </tr>
    </thead>
    <tbody>
      <?php foreach( $result as $key=>$value ){ ?>
      <?php if ($value["ASIENTO"] != $seataux){ ?>
          <?php if (!empty($key)){ ?>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="right"><?php echo number_format($acum_debit,2);?></td>
              <td align="right"><?php echo number_format($acum_credit*-1,2);?></td>
            </tr> 
            <tr><td colspan="8">&nbsp;</td></tr>
          <?php } ?>          
          <tr style="background-color:#e5e6ed;">
           <td colspan="8">
             <strong>Date: <?php echo date("m/d/Y",strtotime($value["FECHA_ASI"])); ?>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             No. <?php echo $typeseat." ".$value["ASIENTO"]; ?>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <?php echo $value["DESC_ASI"]; ?></strong>
           </td>           
         </tr>
        <?php 
          $seataux = $value["ASIENTO"]; 
          $acum_debit = 0;
          $acum_credit = 0; 
        }        
      ?>              
      <tr> 
         <td><a href="javascript:void(0);"><?php echo $value["CODMOV"];?></a></td>
         <td><?php echo $value["NOMBRE"];?></td>   
         <td><?php echo $value["TIPO"];?></td>
         <td><?php echo $value["REFER"];?></td>
         <td><a href="javascript:void(0);"><?php echo $value["DOCUMENTO"];?></a></td>
         <td><?php echo $value["CONCEPTO"];?></td>                  
         
         <?php 
         if ($value["IMPORTE"] > 0){ 
           $acum_debit = $value["IMPORTE"] + $acum_debit;  
         ?>
           <td align="right"><?php echo number_format($value["IMPORTE"],2);?></td>   
           <td align="right"><?php echo number_format(0,2); ?></td>    
         <?php 
         } else{ 
           $acum_credit = $value["IMPORTE"] + $acum_credit;
         ?>
           <td align="right"><?php echo number_format(0,2); ?></td>   
           <td align="right"><?php echo number_format($value["IMPORTE"],2);?></td>    
         <?php } ?>            
      </tr>            
      <?php } ?>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right"><?php echo number_format($acum_debit,2);?></td>
        <td align="right"><?php echo number_format($acum_credit*-1,2);?></td>
      </tr> 
    </tbody>    
    </table>  
   </div>
  </div>
  <br>
<?php } ?>  
</div> <!-- FIN DE WRAPPER  -->