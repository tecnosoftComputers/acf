<div class="container-fluid">
	<!-- <?php
		print_r($results);
	?> -->
	<style type="text/css">
		td{
			font-size: 12px;
		}
	</style>
	<br>
	<div class="table-responsive">
		<table class="table table-default table-bordered">
			<thead>
				<tr>
					<th>Account</th>
					<th>Name</th>
					<?php 
						foreach (MONTHS as $key => $value) {
							echo "<th>$value</th>";				
						}
					?>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($results as $key => $value) {
						// $style = "style='font-weight: bold;'";
						// $style = ($value["PLANMARCA"] == 1) ? "" : $style;
						echo "<tr>";
							echo "<td>".$value["CODIGO"]."</td>";
							echo "<td>".$value["NOMBRE"]."</td>";
							for ($i=0; $i < count(MONTHS); $i++) { 
								echo "<td><input class='form-control'/></td>";	
							}

						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</div>