<?php
	require_once ("../../datos/db/connect.php");
	$env = new DBSTART;
	$db = $env->abrirDB();

	try{	
	    $sql = "SELECT * FROM empresa WHERE estado='A'";
	    foreach ($db->query($sql) as $row) { ?>
	    	<tr class="odd gradeX">
	    		<td><?php echo $row['id_empresa']; ?></td>
	    		<td><?php echo $row['nombre_empresa']; ?></td>
	    		<td>
	    			<button class="btn-sm edit" data-id="<?php echo $row['id_empresa']; ?>"><span class="glyphicon glyphicon-edit"></span> Edit</button>
	    			<button class="btn-sm delete" data-id="<?php echo $row['id_empresa']; ?>"><span class="glyphicon glyphicon-trash"></span> Deleted</button>
	    		</td>
	    	</tr>
	    	<?php
	    }
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}