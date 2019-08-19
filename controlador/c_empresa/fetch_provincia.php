<?php

    require_once ("../../datos/db/connect.php");
    $country_id = ($_REQUEST["country_id"] <> "") ? trim($_REQUEST["country_id"]) : "";
    if ($country_id <> "") {
        $sql = DBSTART::abrirDB()->prepare("SELECT * FROM c_provincia WHERE id_pais = :cid ORDER BY provincia");
        try {
            $sql->bindValue(":cid", trim($country_id));
            $sql->execute();
            $results = $sql->fetchAll();
        } catch (Exception $ex) {
            echo($ex->getMessage());
        }
        if (count($results) > 0) { ?>
                
                <select name="provincia" id="provincia"  onchange="showCity(this);" class="form-control">
                    <option value="">Please Select</option>
                    <?php foreach ($results as $rs) { ?>
                        <option value="<?php echo $rs["id_provincia"]; ?>"><?php echo $rs["provincia"]; ?></option>
                    <?php } ?>
                </select>
            <?php
        }else{ ?>
            <select name="state" class="form-control">
                    <option value="">Please Select</option>
            </select>
      <?php } } ?>