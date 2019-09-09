<?php
    require_once FRONTEND_RUTA."datos/db/connect.php";
    $usuario = $_SESSION['correo'];
    
    $send = DBSTART::abrirDB()->prepare("SELECT * FROM DPNUMERO WHERE status = 'A'");
    $send->execute();
    $all_send = $send->fetchAll(PDO::FETCH_ASSOC);
?>

<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th align="center" width=300>CODE</th>
                <th align="center"  width=300>ENTRY NAME</th>
                <th align="center">NUMBER</th>
                <th align="center">EDIT</th>
                <th align="center">DELETED</th>
            </tr>
        </thead>

        
            <tbody>
            <?php foreach( $all_send as $registro2 ){ ?>
                 <tr class='odd gradeX'>
                     <td><?php echo $registro2['TIPO_ASI'] ?></td>
                     <td><?php echo $registro2['NOMBRE'] ?></td>
                     <td><?php echo $registro2['ASIENTO']; ?></td>
                     <td><a href="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vistas/app/files/view_voucher_edit.php?cid=<?php echo $registro2['ns'] ?>"><i class="fa fa-edit"></i></a></td>
                     <td><a href="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vistas/app/files/view_voucher_del.php?cid=<?php echo $registro2['ns'] ?>"><i class="fa fa-trash"></i></a></td>                 
                 </tr>
        <?php } ?>
            </tbody>
        
    </table>