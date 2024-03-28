<?php
    include "connection.php";

    $kampusId =  $_POST["kampusId"];

    $giderTuru = array();

    $q = $db->query("SELECT * FROM (gidertipis INNER JOIN kampuss ON gidertipis.KampusId = kampuss.KampusId) WHERE kampuss.KampusId= $kampusId", PDO::FETCH_ASSOC);
    if($q->rowCount()){
        foreach($q as $r){
            $kampus[] = ["GiderTipiId"=>$r["GiderTipiId"], "Tip"=>$r["Tip"]];
        }
        echo json_encode(array($kampus));
    }
 ?>