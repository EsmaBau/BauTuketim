<?php
// Veritabanı bağlantısını sağlayın (connection.php dosyanızı dahil edin)
include "connection.php";
// POST isteği ile gelen verileri alma
//$tesisatId = $_POST["tesisatId"]; // Burada kampusId'yi aldık
$YetkiId = $_POST["YetkiId"];
$YetkiAd = $_POST["YetkiAd"];

// SQL sorgusu oluşturma
$sql = "UPDATE yetkis SET YetkiAd = '$YetkiAd' WHERE YetkiId = $YetkiId";

// Sorguyu çalıştırma ve sonucu kontrol etme
if ($db->query($sql) == TRUE) {
    echo "Veri başarıyla güncellendi.";
} else {
    echo "Hata";
}
// Bağlantıyı kapatma
//$db->close();
?>