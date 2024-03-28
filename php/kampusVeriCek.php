<?php
include "connection.php";
$kampus = array();
$q = $db->query("SELECT * FROM kampuss", PDO::FETCH_ASSOC);

if($q->rowCount()){
    foreach($q as $r){
        $kampus[] = array(
            "kampusId" => $r["KampusId"],
            "kampusAd" => $r["KampusAd"]   
        );
    }
    echo json_encode($kampus);
} 
?>

