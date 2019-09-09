<?php
    require_once FRONTEND_RUTA."datos/db/connect.php";
    $usuario = $_SESSION['correo'];
        
    $stmt = DBSTART::abrirDB()->prepare("SELECT * FROM dp02a110 WHERE STATUS='A'");
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
                <th>Cod</th>
                                <th>Account Number</th>
                                <th>Bank Name</th>
                                <th>Check No</th>
                                <th>Edit</th>
                                <th>Deleted</th>
            </tr>
        </thead>

        
            <tbody>
            <?php foreach( $one as $registro2 ){ ?>
                 <tr class='odd gradeX'>
                     <td><?php echo $registro2['CODIGOBCO']; ?></td>
                            <td><?php echo $registro2['CODMOV']; ?></td>
                            <td><?php echo $registro2['NOMBREBCO']; ?></td>
                            <td><?php echo $registro2['NUMEROCH']; ?></td>
                            <td><a href="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vistas/app/files/view_banks_edit.php?cid=<?php echo $registro2['CODIGOBCO'] ?>"><i class="fa fa-edit"></i></a></td>
                            <td><a href="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vistas/app/files/view_banks_del.php?cid=<?php echo $registro2['CODIGOBCO'] ?>"><i class="fa fa-trash"></i></a></td>   
                 </tr>
        <?php } ?>
            </tbody>
        
    </table>
                </div>
            </div>
        </div>
    </div>