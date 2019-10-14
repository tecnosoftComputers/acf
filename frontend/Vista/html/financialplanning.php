<div class="container-fluid">
	<style type="text/css">
		td{
			font-size: 12px;
		}
		.form-control{
			/*border-color: transparent;*/
			min-width: 100px;
			/*max-width: 100px;*/
			/*max-height: 25px;*/
			font-size: 10px;
			text-align: right;
		}
		/*tr.form-control*/
	</style>

	<br>

	<div class="form-group">
		<div class="col-md-2">
			<form id="searchyearForm" action="<?php echo PUERTO.'://'.HOST.'/financialplanning/' ?>" method="POST">
				<div class="input-group">
					<input type="text" min="1901" max="3000" maxlength="4" minlength="4" pattern="\d{4}" class="form-control  input-sm" value="<?php echo (!empty($yearFinancial)) ? $yearFinancial: date('Y'); ?>" name='yearFinancial' id='yearFinancial'>
					<span class="input-group-btn"> 
			         	<button class="btn btn-default" type="button" id="searchButton">
			        		<span style="padding-top: 1px; padding-bottom: 1px" class="glyphicon glyphicon-search"></span>
			       		</button> 
			        </span>
				</div>
			</form>
		</div>
	    <!-- <label class="col-md-4 control-label" for="name">Account From:</label> -->
	    <div class="col-md-4">
	      <div class="input-group"> 

	        <input maxlength="8" id="accfrom" name="accfrom" type="text" value="<?php echo (isset($accfrom) && !empty($accfrom)) ? $accfrom : ''; ?>" class="form-control input-sm"> 
	        <span class="input-group-btn"> 
	          <button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal('accfrom','name_',false,true,true);" ><span style="padding-top: 1px; padding-bottom: 1px" class="glyphicon glyphicon-search"></span></button> 
	        </span>
	      </div>
	    </div>
	    
	</div>
<form action="<?php echo PUERTO.'://'.HOST.'/saveFP/' ?>" method="POST">
	
		<span id="pdf" style="float: right; margin-left: 10px;">
        	<a href="" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a>
      	</span>
		<span id="excel" style="float: right; margin-left: 10px;">
			<a href="" target="_blank" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a>
		</span> 
	 	<span class="" style="float: right;">
	   		<input type="submit" class="btn btn-warning btn-sm" name="saveFP" value="Save">
		</span>
	<br>

	<input type="hidden" name="yearFinan" id="yearfinan" value="<?php echo (!empty($yearFinancial)) ? $yearFinancial: date('Y'); ?>">
	<br>
	<div class="table-responsive">
		<div class="panel">
			<div class="panel-body">
				<table class="table table-default table-bordered text-nowrap">
					<!-- <table class="table table-default table-bordered"> -->
					<thead>
						<tr>
							<th>Account</th>
							<th>Name</th>

							<?php 
								foreach ($months as $key => $value) {
									echo "<th>$value</th>";				
								}
							?>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<div>

						<?php
						// echo count($results);
							foreach ($results as $key => $value) {
								// echo "";
								// just show details account
								if($value['PLANMARCA'] != 1){
									continue;
								} 

								echo "<tr id='".$value['CODIGOMAIN']."'>";
									echo "<td>".$value['CODIGOMAIN']."</td>";
									echo "<td>".$value['NOMBRE']."</td>";
										for ($i=0; $i < count($months); $i++) {
											$indice = "VALPRE0";
											$indice = (strlen((string) ($i + 1)) >= 2) ? substr($indice, 0, -1) : $indice ;
											// echo $indice."<br>";
											$valueInput = (!empty($value[$indice.($i + 1)])) ? number_format($value[$indice.($i + 1)],3,',','.'): '';
											$valueTotal = (!empty($value['TOTAL'])) ? $value['TOTAL']: '';
											echo "<td><input type='text' class='form-control partialres numberValue' name='var_".str_replace(".", "", $value['CODIGOMAIN'])."[]' value='".$valueInput."'/></td>";
											
										}
									$valueTotal = (!empty($value['TOTAL'])) ? number_format($value['TOTAL'],3,',','.'): '';
									echo "<td><input type='text' readonly class='form-control resultValue' name='var_".str_replace(".", "", $value['CODIGOMAIN'])."[]' value='".$valueTotal."'/>
										<input type='hidden' name='var_".str_replace(".", "", $value['CODIGOMAIN'])."[]' value='".$value['CODIGOMAIN']."'/>
									</td>";
								echo "</tr>";
							}
						?>
					</div>
					</tbody>
				</table>
			</div>
			
		</div>
	</div>
	</form>
</div>