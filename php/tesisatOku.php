<?php
    include "connection.php";

    $kampusId =  $_POST["kampusId"];

    $tesisatNos = array();

    // Tablo adlarını ve birleştirme koşulunu düzeltin
    $q = $db->query("SELECT tesisats.TesisatId, tesisats.tesisatNo FROM elektrikokuma INNER JOIN tesisatlar ON elektrikokuma.KampusId = tesisatlar.KampusId WHERE tesisatlar.KampusId= $kampusId", PDO::FETCH_ASSOC);
    if($q->rowCount()){
        foreach($q as $r){
            $tesisatNos[] = ["TesisatId"=>$r["TesisatId"], "tesisatNo"=>$r["tesisatNo"]];
        }
        echo json_encode(array($tesisatNos));
    }
?>
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
 <?php
    include "connection.php";

    $kampusId =  $_POST["kampusId"];

    $tesisatNos = array();

    $q = $db->query("SELECT * FROM (gidertipis INNER JOIN kampuss ON gidertipis.KampusId = kampuss.KampusId) WHERE kampuss.KampusId= $kampusId", PDO::FETCH_ASSOC);
    if($q->rowCount()){
        foreach($q as $r){
            $kampus[] = ["GiderTipiId"=>$r["GiderTipiId"], "Tip"=>$r["Tip"]];
        }
        echo json_encode(array($kampus));
    }
 ?>
