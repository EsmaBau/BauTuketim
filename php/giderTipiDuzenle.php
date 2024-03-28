<?php
include "connection.php";

// Hata iletisini gösterme 
error_reporting(E_ALL);
ini_set('display_errors', 1);

// POST isteği ile gelen verileri alma
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // POST verilerini doğru anahtarlarla alın
    $GiderTipid = intval($_POST["GiderTipiId"]);
    $Tip = $_POST["Tip"];

        try {
        // SQL sorgusunu hazırlama
        $sql = "UPDATE gidertipis SET Tip = :Tip WHERE GiderTipiId = :GiderTipiId";

        // Sorguyu hazırlama
        $stmt = $db->prepare($sql);

        // Parametreleri bağlama
        $stmt->bindParam(":Tip", $Tip);
        $stmt->bindParam(":GiderTipiId", $GiderTipiId);

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