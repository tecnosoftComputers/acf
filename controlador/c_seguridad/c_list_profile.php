<?php
require_once "../../../constantes.php";
require_once FRONTEND_RUTA."init.php"; 
    require_once ("../../../datos/db/connect.php");
    $usuario = $_SESSION['acfSession']['correo'];
        
    $stmt = DBSTART::abrirDB()->prepare("SELECT u.id_rol, u.nombre_rol, u.fecha_registro, u.fecha_modificacion, u.estado 
                                            FROM roles u ORDER BY u.id_rol DESC");
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
                                <th>Name Profile</th>
                                <th>Date Register</th>
                                <th>Date Updated</th>
                                <th align="center">Status</th>
                                <th align="center">Action</th>
                                <th align="center">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
    <?php foreach($one as $registro2){ ?>
        <tr class="odd gradeX">
      		<td><?php echo $registro2['nombre_rol']; ?> &nbsp;<a style="float: right;" href="../../vistas/app/seguridad/asignar.php?cid=<?php echo $registro2['id_rol'] ?>"><i class="fa fa-lock"></i> View Profile</a></td>
      		<td><?php echo $registro2['fecha_registro']; ?></td>
            <td><?php echo $registro2['fecha_modificacion']; ?></td>
            <?php if ($registro2['estado'] == 'A') { 
                $st = 'Active';
                }else{
                    $st = 'Inactive';
                }
        ?>
          <td align="center"><?php echo $st ?></td>
            <?php if ($registro2['estado'] == 'A') { ?>
                <td align="center"> <button class="btn btn-danger btn-small" onclick="preguntar(<?php echo $registro2['id_rol'] ?>)"> <i class="fa fa-times-circle"></i> Inactivate</button> </td>
                <td align="center"> <a class="btn btn-info" name="edit" href="../../vistas/app/seguridad/profile_update.php?cid=<?php echo $registro2["id_rol"] ?>" class="btn btn-info edit_data"> <i class="fa fa-edit"></i> Edit Profile</a> </td>
            <?php }else if ($registro2['estado'] == 'I'){ ?>
                <td align="center"> <button class="btn btn-primary btn-small" onclick="preguntarActivar(<?php echo $registro2['id_rol'] ?>)"> <i class="fa fa-check-circle"></i> Activate</button> </td>
                <td align="center"> <a class="btn btn-info" name="edit" href="#" class="btn btn-info edit_data" disabled> <i class="fa fa-edit"></i> Edit Profile</a> </td>
            <?php } ?>
        </tr>
    <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>