<?php

require_once ("../../datos/db/connect.php");
$state_id = ($_REQUEST["state_id"] <> "") ? trim($_REQUEST["state_id"]) : "";
if ($state_id <> "") {
    $sql = DBSTART::abrirDB()->prepare("SELECT * FROM c_ciudad WHERE id_provincia = :sid");
    try {
        $sql->bindValue(":sid", trim($state_id));
        $sql->execute();
        $results = $sql->fetchAll();
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
     if (count($results) > 0) { ?>
            
            <select name="ciudad" name="box" class="form-control">
                <option value="">Please Select</option>
                <?php foreach ($results as $rs) { ?>
                    <option value="<?php echo $rs["id_ciudad"]; ?>"><?php echo $rs["ciudad"]; ?></option>
                <?php } ?>
            </select>
        <?php
    }
}else{ ?>
<select name="city" name="box" class="form-control">
                <option value="">Please Select</option>
            </select>
    
<?php } ?>