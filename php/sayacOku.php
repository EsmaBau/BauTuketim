<?php
include "connection.php";
$sayacNo = array();

$kampusId = $_POST["kampusId"]; // AJAX isteğiyle gönderilen kampusId'yi al
$giderTuruId = $_POST["giderTuruId"]; // AJAX isteğiyle gönderilen giderTuruId'yi al

// Veritabanı sorgusu, belirli bir kampusId ve giderTuruId ile sorgulanacak şekilde düzenlendi
$query = $db->prepare("SELECT tesisats.TesisatId, tesisats.TesisatNo FROM kampuss 
                       INNER JOIN gidertipis ON kampuss.KampusId = gidertipis.KampusId
                       INNER JOIN tesisats ON tesisats.GiderTipiId = gidertipis.GiderTipiId
                       WHERE kampuss.KampusId = ? AND gidertipis.GiderTipiId = ?");
$query->execute([$kampusId, $giderTuruId]);
$result = $query->fetchAll(PDO::FETCH_ASSOC);

if ($result) {
    foreach ($result as $row) {
        $sayacNo[] = ["TesisatId" => $row["TesisatId"], "TesisatNo" => $row["TesisatNo"]];
    }
    echo json_encode($sayacNo);
} else {
    echo json_encode(["error" => "Veri bulunamadı"]); // Veri bulunamazsa hata mesajı döndür
}
?>
