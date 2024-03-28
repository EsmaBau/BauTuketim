<?php
include "connection.php";
$kampus = array();
$q = $db->query("SELECT * FROM kampuss 
                 INNER JOIN gidertipis ON kampuss.KampusId = gidertipis.KampusId
                 INNER JOIN tesisats ON tesisats.GiderTipiId = gidertipis.GiderTipiId", PDO::FETCH_ASSOC);

if($q->rowCount()){
    foreach($q as $r){
        $kampus[] = array(
            "kampusAd" => $r["KampusAd"],
            "giderTuru" => $r["Tip"],
            "tesisatNo" => $r["TesisatNo"],
            "tesisatId" => $r["TesisatId"]
        );
    }
    echo json_encode($kampus);
} 
?>
