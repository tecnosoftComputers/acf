<?php
    require_once ("../../../datos/db/connect.php");
    $usuario = $_SESSION['correo']; 

    $stmt = DBSTART::abrirDB()->prepare("SELECT u.id_usuario, u.username, u.namesurname, r.nombre_rol, u.estado, u.position
                                            FROM usuarios u LEFT JOIN roles r ON r.id_rol = u.position ORDER BY u.id_usuario DESC");
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
                                <th>User name</th>
                                <th>Short Name</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
    <?php foreach($one as $registro2){ ?>
    <tr class="odd gradeX">
  		<td><?php echo $registro2['username']; ?></td>
  		<td><?php echo $registro2['namesurname']; ?></td>
        <td><?php echo $registro2['nombre_rol']; ?>&nbsp;&nbsp;&nbsp;<a style="float: right;" href="../../vistas/app/seguridad/asignar.php?cid=<?php echo $registro2['position'] ?>"><i class="fa fa-lock"></i> View Profile</a></td>
        <?php if ($registro2['estado'] == 'A'){ // estado cs fetchAll(PDO::FETCH_ASSOC)
                $st = 'Active'; // Active para mostrar el estado en activo
                }else{
                    $st = 'Inactive'; // El estado inactivo para mostrar el estado inactivo
                }
        ?>
        <td align="center"><?php echo $st ?></td>
  		<?php if ($registro2['estado'] == 'A') { ?>
            <td align="center"> <button class="btn btn-danger btn-small" onclick="preguntar(<?php echo $registro2['id_usuario'] ?>)"> <i class="fa fa-times-circle"></i> Inactivate</button> </td>
            <td align="center"> <a class="btn btn-info" name="edit" href="../../vistas/app/company-users/users_update.php?cid=<?php echo $registro2["id_usuario"] ?>" class="btn btn-info edit_data"> <i class="fa fa-edit"></i> Edit User</a> </td>
        <?php }else if ($registro2['estado'] == 'I'){ ?>
            <td align="center"> <button class="btn btn-primary btn-small" onclick="preguntarActivar(<?php echo $registro2['id_usuario'] ?>)"> <i class="fa fa-check-circle"></i> Activate</button> </td>
            <td align="center"> <a class="btn btn-info" name="edit" href="#" class="btn btn-info edit_data" disabled> <i class="fa fa-edit"></i> Edit User</a> </td>
        <?php } ?>
    </tr>
    <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>