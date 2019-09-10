<?php
    require_once ("../../../datos/db/connect.php");
    $usuario = $_SESSION['acfSession']['correo'];
    
    $send = DBSTART::abrirDB()->prepare("SELECT * FROM Finacli as f INNER JOIN tab_tclient c ON c.codtipo = f.CLASIFICA WHERE f.STATUS='A'");
    $send->execute();
    $all_send = $send->fetchAll(PDO::FETCH_ASSOC);
?>

<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th align="center">CLIENT</th>
                <th align="center" width=300>NAME</th>
                <th align="center"  width=300>COUNTRY</th>
                <th align="center"  width=300>ADRESS</th>
                
                <th align="center">EDIT</th>
                <th align="center">DELETED</th>
            </tr>
        </thead>

        
            <tbody>
            <?php foreach( $all_send as $registro2 ){ ?>
                 <tr class='odd gradeX'>
                     <td><?php echo $registro2['nomtipo'] ?></td>
                     <td><?php echo $registro2['NOMEMP'] ?></td>
                     <td><?php echo $registro2['COUNTRY'] ?></td>
                     <td><?php echo $registro2['DIRDOM']; ?></td>
                     <td><a href="../../../inicializador/vistas/app/files/view_directory_edit.php?cid=<?php echo $registro2['NO_ID'] ?>"><i class="fa fa-edit"></i></a></td>
                     <td><a href="../../../inicializador/vistas/app/files/view_directory_del.php?cid=<?php echo $registro2['NO_ID'] ?>"><i class="fa fa-trash"></i></a></td>                 
                 </tr>
        <?php } ?>
            </tbody>
    </table>