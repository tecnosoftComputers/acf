<?php
    require_once ("../../../datos/db/connect.php");
    $usuario = $_SESSION['correo'];        

    $stmt = DBSTART::abrirDB()->prepare("SELECT * FROM dp01a110");
    $stmt->execute();
    $one = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="row">
    <div class="col-lg-12">
    <div class="panel panel-default">
    <div class="panel-body">
    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="border-collapse:collapse;">
        <thead>
            <tr>
                <th align="center">Cuenta</th>
                <th align="center">Saldo</th>
            </tr>
        </thead>
        
        <?php foreach($one as $registro2) { ?>
            <tbody data-toggle="collapse" data-target="#made1" class="accordion-toggle">
            <tr class="odd gradeX" >
                <td><?php echo $registro2['CODIGO'].' ' . $registro2['NOMBRE']; ?></td>
          		<td>$0.00</td>
            </tr><tr><td colspan="6" class="hiddenRow">
            <div class="accordian-body collapse" id="made1"> Probando </div></td></tr>
            </tbody>
        <?php } ?>
        

        
    </table>
    </div>
    </div>
    </div>
</div>