<?php
include "connection.php";

$gidertipis = array();
$q = $db->query("SELECT * FROM gidertipis 
                 INNER JOIN kampuss ON kampuss.KampusId = gidertipis.KampusId", PDO::FETCH_ASSOC);

if($q->rowCount()){
    foreach($q as $r){
        $gidertipis[] = ["kampusAd"=>$r["KampusAd"], "tip"=>$r["Tip"] ,"giderTipiId"=>$r["GiderTipiId"]];
    }
    echo json_encode(array($gidertipis));
} 
?>


