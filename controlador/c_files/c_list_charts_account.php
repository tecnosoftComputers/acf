<?php
    require_once ("../../../datos/db/connect.php");
    $usuario = $_SESSION['acfSession']['correo'];
    
    $send = DBSTART::abrirDB()->prepare("SELECT * FROM dp01a110");
    $send->execute();
    $all_send = $send->fetchAll(PDO::FETCH_ASSOC);
?>

<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th></th>
                <th align="center">ACCOUNT</th>
                <th align="center" width=300>NAME</th>                
                <th align="center" colspan="2"></th>

            </tr>
        </thead>

        
        <tbody>
            <?php foreach( $all_send as $registro2 ){ ?>
                 <tr class='odd gradeX'>
                    <?php
                        $var = $registro2['CODIGO'];
                        $newvar = substr($var, -1);
                        if ($newvar == '.'){ ?>
                    <td><a href="../../../inicializador/vistas/app/files/char.php?cid=<?php echo $registro2['CODIGO'] ?>" class='userinfo'><i class="fa fa-check"> Add</i></a></td>
                     <td><strong><?php echo $registro2['CODIGO'] ?></strong></td>
                     <td><strong><?php echo $registro2['NOMBRE'] ?></strong></td>
                     <td><a href="../../../inicializador/vistas/app/files/char_update.php?cid=<?php echo $registro2['CODIGO'] ?>"><i class="fa fa-edit"></i></a></td>
                     <td><a href="../../../inicializador/vistas/app/files/char_delete.php?cid=<?php echo $registro2['CODIGO'] ?>"><i class="fa fa-trash"></i></a></td>   

                <?php }else{ ?>
                    <td><a href="../../../inicializador/vistas/app/files/char.php?cid=<?php echo $registro2['CODIGO'] ?>" class='userinfo'><i class="fa fa-check"> Add</i></a></td>
                     <td><?php echo $registro2['CODIGO'] ?></td>
                     <td><?php echo $registro2['NOMBRE'] ?></td>
                     <td><a href="../../../inicializador/vistas/app/files/char_update.php?cid=<?php echo $registro2['CODIGO'] ?>"><i class="fa fa-edit"></i></a></td>
                     <td><a href="../../../inicializador/vistas/app/files/char_delete.php?cid=<?php echo $registro2['CODIGO'] ?>"><i class="fa fa-trash"></i></a></td> 

                  <?php } ?>
                 </tr>
        <?php } ?>
            </tbody>
    </table>