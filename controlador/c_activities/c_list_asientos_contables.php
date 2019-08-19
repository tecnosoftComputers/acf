<?php
    require_once ("../../../datos/db/connect.php");
    $usuario = $_SESSION['correo'];
        
    $stmt = DBSTART::abrirDB()->prepare("SELECT u.id_usuario, u.username, u.namesurname, r.nombre_rol, u.estado 
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
                                <th>ID</th>
                                <th>User name</th>
                                <th>Short Name</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
    <?php foreach($one as $registro2){ ?>
    <tr class="odd gradeX">
        <td><?php echo $registro2['id_usuario']; ?></td>
  		<td><?php echo $registro2['username']; ?></td>
  		<td><?php echo $registro2['namesurname']; ?></td>
        <td><?php echo $registro2['nombre_rol']; ?>&nbsp;&nbsp;&nbsp;<a style="float: right;" href="../../vistas/app/seguridad/asignar.php?cid=<?php echo $registro2['position'] ?>"><i class="fa fa-lock"></i> Ver</a></td>
    </tr>
    <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>