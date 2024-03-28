<?php
include "connection.php";

// Hata iletisini gösterme 
error_reporting(E_ALL);
ini_set('display_errors', 1);

// POST isteği ile gelen verileri alma
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // POST verilerini doğru anahtarlarla alın
    $KampusId = intval($_POST["KampusId"]);
    $KampusAd = $_POST["KampusAd"];



    try {
        // SQL sorgusunu hazırlama
        $sql = "UPDATE kampuss SET kampusAd = :kampusAd WHERE kampusId = :kampusId";

        // Sorguyu hazırlama
        $stmt = $db->prepare($sql);

        // Parametreleri bağlama
        $stmt->bindParam(":kampusAd", $KampusAd);
        $stmt->bindParam(":kampusId", $KampusId);

        // Sorguyu çalıştırma ve sonucu kontrol etme
        if ($stmt->execute()) {
            echo "Veri başarıyla güncellendi.";
        } else {
            echo "Hata: Veri güncellenemedi.";
        }
    } catch (PDOException $e) {
        echo "Hata: " . $e->getMessage();
    }
}