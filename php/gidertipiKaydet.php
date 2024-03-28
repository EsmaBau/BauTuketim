<?php
include "connection.php";

$kampusId = $_POST['kampusId'];
$giderTuru = $_POST['giderTuru'];

// Gerekli kontrolleri yap
if (empty($kampusId) || empty($giderTuru)) {
    echo "Kampüs veya gider türü boş olamaz.";
} else {
    // Veritabanında belirli bir kampüs için zaten var olan gider tiplerini sorgula
    $query_check = $db->prepare("SELECT COUNT(*) AS count FROM gidertipis WHERE KampusId = ? AND Tip = ?");
    $query_check->bindParam(1, $kampusId);
    $query_check->bindParam(2, $giderTuru);
    $query_check->execute();
    $result = $query_check->fetch(PDO::FETCH_ASSOC);

    if ($result['count'] > 0) {
        echo "Giriş yaptığınız gider türü bu kampüste zaten tanımlı.";
    } else {
        // Gider tipini ekle
        $query_insert = $db->prepare("INSERT INTO gidertipis (KampusId, Tip, GiderTipiStatus) VALUES (?, ?, ?)");
        $query_insert->bindParam(1, $kampusId);
        $query_insert->bindParam(2, $giderTuru);    
        $giderTipiStatus = 1; // varsayılan değeri
        $query_insert->bindParam(3, $giderTipiStatus);
        $r = $query_insert->execute();
        if ($r) {
            echo "Veri başarıyla eklendi.";
        } else {
            echo "Gider türü eklenirken bir hata oluştu.";
        }
    }
}

$db = null;
?>