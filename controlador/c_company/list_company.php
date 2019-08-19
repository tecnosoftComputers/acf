<?php
    require_once ("../../../datos/db/connect.php");
    $usuario = $_SESSION['correo'];
    
    $stmt = $cc->prepare("SELECT * FROM roles WHERE id_rol='$usuario' AND nombre_rol='Administrador'");
    $stmt->execute();
    $cant = $stmt->rowCount();
    
    if ($cant == 0) { // El usuario no es administrador
        $one = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else{
        $statement = $cc->prepare("SELECT * FROM empresa WHERE estado='A'");
        $statement->execute();
        $one = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /* Esta segunda consulta, muestra los datos segun la primera lista asignada del paginador*/
  	$registro = DBSTART::abrirDB()->prepare("select * from empresa e inner join usuarios u on u.id_empresa = e.id_empresa
                      where u.id_usuario='$usuario' AND u.estado = 'A' ORDER BY u.id_empresa DESC");
    $registro->execute();
    $all = $registro->fetchAll(PDO::FETCH_ASSOC);
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Mostrando Compa&ntilde;ias
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Company</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php foreach($one as $registro2){ ?>
                            <tr class="odd gradeX">
                                <td class="center"><b><?php echo $registro2['nombre_empresa'] ?></b></td>
                                <td class="center">
                                <a href="../../../controlador/c_sesion/generar.php?x=<?php echo $registro2['id_empresa'] ?>">  Accept </a></td>
                            </tr>
                    <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  	