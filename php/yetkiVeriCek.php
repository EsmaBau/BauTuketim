<?php
include "connection.php";
$yetki = array();
$q = $db->query("SELECT * FROM yetkis", PDO::FETCH_ASSOC);

if($q->rowCount()){
    foreach($q as $r){
        $yetki[] = array(
            "YetkiId" => $r["YetkiId"],
            "YetkiAd" => $r["YetkiAd"]   
        );
    }
    echo json_encode($yetki);
} 
?>