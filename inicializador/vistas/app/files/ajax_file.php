<?php
    require_once ("../../../datos/db/connect.php");
    $userid = $_POST['userid'];
    
    $sql = DBSTART::abrirDB()->prepare("SELECT * FROM dp01a110 where CODIGO='$userid'");
    $sql->execute();
    $rows = $sql->fetchAll(PDO::FETCH_BOTH);
?>
<table border='0' width='100%'>
    <?php foreach( $rows as $row ){ ?>
         <tr><td>City : </td><td><?php echo $row['CODIGO'] ?></td></tr>
    <?php } ?>
</table>