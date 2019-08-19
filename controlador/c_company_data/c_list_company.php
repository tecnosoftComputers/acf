<?php
    require_once ("../../../datos/db/connect.php");
    $usuario = $_SESSION['correo'];
    
    $stmt = DBSTART::abrirDB()->prepare("SELECT * FROM empresa e ORDER BY id_empresa DESC");
    $stmt->execute();
    $one = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Empresa</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php foreach($one as $registro2){ ?>
                            <tr class="odd gradeX">
                                <td><?php echo $registro2['id_empresa']; ?></td>
                	    		<td><?php echo $registro2['nombre_empresa']; ?></td>
                	    	      <?php if ($registro2['estado'] == 'A'){
                $st = 'Active';
                }else{
                    $st = 'Inactive';
                }
        ?>
        <td align="center"><?php echo $st ?></td>
        
  		<?php if ($registro2['estado'] == 'A') { ?>
            <td align="center"> <button class="btn btn-danger btn-small" onclick="preguntar(<?php echo $registro2['id_empresa'] ?>)"> <i class="fa fa-times-circle"></i> Inactivate</button> </td>
            <td align="center"> <a class="btn btn-info" name="edit" href="../../vistas/app/company/company_data_update.php?cid=<?php echo $registro2["id_empresa"] ?>" class="btn btn-info edit_data"> <i class="fa fa-edit"></i> Edit Company</a> </td>
        <?php }else if ($registro2['estado'] == 'I'){ ?>
            <td align="center"> <button class="btn btn-primary btn-small" onclick="preguntarActivar(<?php echo $registro2['id_empresa'] ?>)"> <i class="fa fa-check-circle"></i> Activate</button> </td>
            <td align="center"> <a class="btn btn-info" name="edit" href="#" class="btn btn-info edit_data" disabled> <i class="fa fa-edit"></i> Edit Company</a> </td>
        <?php } ?>
                    <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>