<?php

    require_once ("../../../datos/db/connect.php");

    $usuario = $_SESSION['correo'];

    

    $send = DBSTART::abrirDB()->prepare("SELECT * FROM dpmovimi");

    $send->execute();

    $all_send = $send->fetchAll(PDO::FETCH_ASSOC);

?>



<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

        <thead>

            <tr>

                <th align="center">TYPE</th>

                <th align="center" width=300>JOURNAL</th>

                <th align="center"  width=300>DATE</th>

                <th align="center"  width=300>BENEFICIARY</th>

                <th align="center"></th>

            </tr>

        </thead>



        

            <tbody>

            <?php foreach( $all_send as $registro2 ){ ?>

                 <tr class='odd gradeX'>

                     <td><?php echo $registro2['TIPO_ASI'] ?></td>

                     <td><?php echo $registro2['ASIENTO'] ?></td>

                     <td><?php echo $registro2['FECHA_ASI'] ?></td>

                     <td><?php echo $registro2['BENEFICIAR']; ?></td>

                     <td><a href="activities/journal.php?cid=<?php echo $registro2['ASIENTO'] ?>"><i class="fa fa-check"></i></a></td>                 

                 </tr>

        <?php } ?>

            </tbody>

    </table>