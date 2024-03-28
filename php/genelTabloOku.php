<?php
include "connection.php";
$kampus = array();
$q = $db->query("SELECT * FROM kampuss 
                 INNER JOIN gidertipis ON kampuss.KampusId = gidertipis.KampusId
                 INNER JOIN tesisats ON tesisats.GiderTipiId = gidertipis.GiderTipiId", PDO::FETCH_ASSOC);

if($q->rowCount()){
    foreach($q as $r){
        $kampus[] = ["kampusAd"=>$r["KampusAd"], "tip"=>$r["Tip"], "tesisatNo"=>$r["TesisatNo"]];
    }
    echo json_encode(array($kampus));
} 
?>   