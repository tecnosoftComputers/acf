<div id="page-wrapper"><br />
  <div class="alert alert-info"><p>Accounting / Proccess / Account Revision</p></div>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <form action="<?php echo PUERTO."://".HOST."/report/accountrevision/search/";?>" method="post" class="form-horizontal" id="frmreport">
        <fieldset>
          <legend class="mibread" style="text-align: center;"><strong>Account Revision</strong></legend>
          <input type="hidden" name="limit" id="limit" value="<?php echo $limit;?>">
                                 
            
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Checks seats date:</label>
            <div class="col-md-3">
              <input type="text" name="dateaccount" id="dateaccount" value= "<?php echo (!empty($dateto)) ? date("m/Y",strtotime($dateto)): date("m/Y"); ?>" data-min-view="months" data-view="months" readonly />  
            </div>
          </div>                                           

          <div class="modal-footer">            
            <button style="float: left;" type="submit" name="register" id="register" class="btn btn-primary"><i class="fa fa-eye"></i> Search</a></button>
            <span style="margin-right: 15px;">
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
          $idmov = Utils::encriptar($value["IDCONT"]);
          echo "<tr>
                  <form method='post' action='".PUERTO.'://'.HOST."/journalEntries/'>
                    <input type='hidden' value='".$idmov."' id='fromAccountRevision' name='fromAccountRevision'/>
                    <td width='30%'><h5>".$value["TIPO_ASI"]." <input type='submit' style='background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; text-decoration: underline;'  value='".$value["ASIENTO"]."'/></h5></td>
                  </form>
                  
                  <td width='70%'>";
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