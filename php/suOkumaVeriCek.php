<?php
include "connection.php";
$elektrikOkuma = array();
$q = $db->query("SELECT * FROM elektrikokuma", PDO::FETCH_ASSOC);

if($q->rowCount()){
    foreach($q as $r){
        $elektrikOkuma[] = array(
            "elektrikOkumaId" => $r["ElektrikOkumaId"],
            "kampusAd" => $r["KampusAd"],
            "tip" => $r["Tip"],
            "tesisatNo" => $r["TesisatNo"],
            "okumaTarihi" => $r["OkumaTarihi"],
            "t1" => $r["T1"],
            "t2" => $r["T2"],
            "t3" => $r["T3"]

        );
    }
    echo json_encode($elektrikOkuma);
} 
?>