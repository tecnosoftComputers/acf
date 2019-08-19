<?php
    require_once ("../../../datos/db/connect.php");
    $usuario = $_SESSION['correo'];
        
    $stmt = DBSTART::abrirDB()->prepare("SELECT * FROM activities_directorio");
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
                                <th>No. ID</th>
                                <th>Nombres</th>
                            </tr>
                        </thead>
                        <tbody>
    <?php foreach($one as $registro2){ ?>
    <tr class="odd gradeX">
        <td><?php echo $registro2['num_id']; ?></td>
  		<td><?php echo $registro2['directorio_nombres']; ?></td>
    </tr>
    <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>