<?php

include "connection.php";

$tesisatNo = isset($_POST['TesisatNo']) ? trim($_POST['TesisatNo']) : null;
$giderTipiId = isset($_POST['GiderTipiId']) ? $_POST['GiderTipiId'] : null;

try {
    // Değerlerin boş olup olmadığını kontrol et
    if (empty($tesisatNo) || empty($giderTipiId)) {
        echo "Sayaç numarası veya gider türü boş olamaz!";
    } else {
        // Veritabanında belirtilen kampüs ve gider tipi için tesisat numarası zaten tanımlı mı diye kontrol et
        $query_check = $db->prepare("SELECT COUNT(*) AS count FROM tesisats WHERE GiderTipiId = ? AND TesisatStatus = 1");
        $query_check->execute(array($giderTipiId));
        $result = $query_check->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] > 0) {
            echo "Bu gider tipine ait tesisat numarası zaten tanımlı.";
        } else {
            // Gider tipine ait tesisat numarası ekleniyor
            $query_insert = $db->prepare("INSERT INTO tesisats (TesisatNo, GiderTipiId, TesisatStatus) VALUES (?, ?, ?)");
            $r = $query_insert->execute(array($tesisatNo, $giderTipiId, 1));

            if ($r) {
                echo "Veri başarıyla eklendi.";
            } else {
                echo "Hata: Veri eklenemedi. " . $query_insert->errorInfo()[2];
            }
        }
    }
} catch (PDOException $e) {
    echo "Hata: " . $e->getMessage();
}
$db = null;

?>
