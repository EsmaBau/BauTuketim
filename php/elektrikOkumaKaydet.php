<?php
// Veritabanı bağlantısını içe aktar
include "connection.php";

// POST verilerini al
$kampusAd = isset($_POST['kampusAd']) ? $_POST['kampusAd'] : null;
$tip = isset($_POST['tip']) ? $_POST['tip'] : null;
$tesisatNo = isset($_POST['tesisatNo']) ? $_POST['tesisatNo'] : null;
$okumaTarihi = isset($_POST['okumaTarihi']) ? $_POST['okumaTarihi'] : null;
$t1 = isset($_POST['t1']) ? $_POST['t1'] : null;
$t2 = isset($_POST['t2']) ? $_POST['t2'] : null;
$t3 = isset($_POST['t3']) ? $_POST['t3'] : null;

try {
    // Veritabanına veri eklemek için SQL sorgusu hazırla
    $query = $db->prepare("INSERT INTO elektrikokuma (KampusAd,Tip, TesisatNo, OkumaTarihi, T1, T2, T3) VALUES (?,?, ?, ?, ?, ?, ?)");
    // Sorguyu çalıştır
    $result = $query->execute(array($kampusAd,$tip, $tesisatNo, $okumaTarihi, $t1, $t2, $t3));

    // Ekleme başarılı ise kullanıcıya mesaj göster
    if ($result) {
        echo "Veri başarıyla kaydedildi.";
    } else {
        echo "Hata: Veri kaydedilemedi.";
    }
} catch (PDOException $e) {
    // Hata oluştuğunda hata mesajını göster
    echo "Hata: " . $e->getMessage();
}

?>
