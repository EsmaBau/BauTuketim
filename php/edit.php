<?php
// Veritabanı bağlantısını sağlayın (connection.php dosyanızı dahil edin)
include "connection.php";
// POST isteği ile gelen verileri alma
//$tesisatId = $_POST["tesisatId"]; // Burada kampusId'yi aldık
$tesisatId = $_POST["tesisatId"];
$tesisatNo = $_POST["tesisatNo"];

// SQL sorgusu oluşturma
$sql = "UPDATE tesisats SET TesisatNo = '$tesisatNo' WHERE TesisatId = $tesisatId";

// Sorguyu çalıştırma ve sonucu kontrol etme
if ($db->query($sql) == TRUE) {
    echo "Veri başarıyla güncellendi.";
} else {
    echo "Hata";
}
// Bağlantıyı kapatma
//$db->close();
?>