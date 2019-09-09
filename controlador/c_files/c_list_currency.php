<?php
    require_once FRONTEND_RUTA."datos/db/connect.php";
    $usuario = $_SESSION['correo'];
    
    $stmt = DBSTART::abrirDB()->prepare("SELECT * FROM fimoneda WHERE ESTADOMON = 1");
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
                                <th>TIPO</th>
                                <th>NOMBRE MONEDA</th>
                                <th>FACTOR</th>
                                <th>SIMBOLO</th>
                                <th>DECIMAL</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php foreach($one as $registro2){ ?>
                            <tr class="odd gradeX">
                                <td><?php echo $registro2['TIPO_MON']; ?></td>
                	    		<td><?php echo $registro2['NOMBREMON']; ?></td>
                	    		<td><?php echo $registro2['FACTOR']; ?></td>
                	    		<td><?php echo $registro2['SIMBOLO']; ?></td>
                	    		<td><?php echo $registro2['DECIMA']; ?></td>
        
            <td align="center"> <a class="btn btn-info" href="<?php echo PUERTO.'://'.HOST; ?>/vistas/app/files/view_currency_update.php?cid=<?php echo $registro2["IDMON"] ?>"> <i class="fa fa-edit"></i></a> </td>
            <td align="center"> <a class="btn btn-info" href="<?php echo PUERTO.'://'.HOST; ?>/vistas/app/files/view_currency_delete.php?cid=<?php echo $registro2["IDMON"] ?>"> <i class="fa fa-trash"></i></a> </td>
                    	</tr>
                    <?php } ?>
                        </tbody>
                    
                    </table>
                </div>
            </div>
        </div>
    </div>