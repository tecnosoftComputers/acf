<div id="page-wrapper"><br />
  <div class="alert alert-info"><p>Accounting / Report / Balance Sheet</p></div>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <form action="<?php echo PUERTO."://".HOST."/report/accountrevision/search/";?>" method="post" class="form-horizontal" id="frmreport">
        <fieldset>
          <legend class="mibread" style="text-align: center;"><strong>Balance Sheet Report</strong></legend>
          <input type="hidden" name="limit" id="limit" value="<?php echo $limit;?>">
                                 
            
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Checks seats date:</label>
            <div class="col-md-3">
              <input type="text" name="dateaccount" id="dateaccount" class="form-control myDatepicker" maxlength="10" size="10" value="<?php echo (isset($dateto)) ? $dateto : date("m/d/Y"); ?>" readonly />  
            </div>
          </div>                                           

          <div class="modal-footer">            
            <button style="float: left;" type="submit" name="register" id="register" class="btn btn-primary"><i class="fa fa-eye"></i> Search</a></button>
            <span style="float: left; margin-left: 15px;">
              <a href="<?php echo PUERTO."://".HOST."/report/accountrevision/";?>" class="btn btn-success"><i class="fa fa-repeat"></i> Clean</a></span>            
            <span style="float: right"><a href="<?php echo PUERTO."://".HOST."/dashboard/";?>" class="btn btn-warning"><i class="fa fa-sign-out"></i> Exit</a></span>
          </div>
        </fieldset>
      </form> 
    </div> <!-- FIN DE COL-LG-12  -->
    <div class="col-md-3"></div>
  </div> <!-- FIN DE ROW -->

      

  <br>

  <!-- <span>eder</span> -->

  <div class="tab-content">
    <div class="tab-pane fade in active" id="home-pills">
    <br> 

    <?php 
      // print_r($results);
      if(isset($results) && !empty($results)){
        $url = (!empty($dateto)) ? strtotime($dateto)."/" : ""; 
        ?>
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
        <?php  

         if (isset($permission) && $permission["pri"] == 1){  ?>
            <span id="pdf" style="float: right; margin-left: 10px;">
              <a href="<?php echo PUERTO."://".HOST."/report/accountrevision/excel/".$url; ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a>
            </span>
            <span id="excel" style="float: right">
              <a href="<?php echo PUERTO."://".HOST."/report/accountrevision/pdf/".$url; ?>" target="_blank" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a>
            </span> 
          <?php } else{ ?>
            <span style="float: right; margin-left: 10px;">
              <a href="javascript:void(0);" class="btn btn-success" onclick="viewMessage('You cannot execute this action');"><i class="fa fa-file-excel-o"></i></a>
            </span>
            <span style="float: right;">
              <a href="javascript:void(0);" class="btn btn-danger" onclick="viewMessage('You cannot execute this action');"><i class="fa fa-file-pdf-o"></i></a>
            </span> 
          <?php }


        echo "<table width='100%' class='table table-responsive style-table'>
                <thead>
                  <tr>
                    <th>SEAT</th>
                    <th>MESSAGE</th>
                  </tr>
                </thead>";
        foreach ($results as $key => $value) {
          echo "<tr>
                  <td width='40%'><h5>".$value["TIPO_ASI"]." ".$value["ASIENTO"]."</h5></td>
                  
                  <td width='60%'>";
                  if($value["IMPORTE"] != 0){
                    echo "<h5>The accounting entry is not square. Check.<br></h5>";
                  }
                  if(!empty($value["NOEXIST"])){
                    echo "<h5>The accounts <b>".$value["NOEXIST"]."</b> do not exist in the account plan</h5>";
                  }
                  echo "</td>
                </tr>";
          // echo "<tr>";
        }
        echo "</table>";
      }
    ?>                    
   </div>
  </div>
  <br>
  <center>
    <?php
     if (!empty($pagination)){
      echo $pagination;
    }?>
  </center>
</div> <!-- FIN DE WRAPPER  -->