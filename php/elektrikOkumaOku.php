<?php
include "connection.php";

$elektrikOkuma = array();
$query = $db->query("SELECT * FROM elektrikokuma", PDO::FETCH_ASSOC);

if($query->rowCount()){
    foreach($query as $row){
        $elektrikOkuma[] = array(
            "kampusAd" => $row["KampusAd"],
            "tip" => $row["Tip"],
            "tesisatNo" => $row["TesisatNo"],
            "okumaTarihi" => $row["OkumaTarihi"],
            "t1" => $row["T1"],
            "t2" => $row["T2"],
            "t3" => $row["T3"]
        );
    }
    echo json_encode($elektrikOkuma);
} 
?>
   