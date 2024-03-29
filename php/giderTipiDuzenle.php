<?php
include "connection.php";

// Hata iletisini gösterme 
error_reporting(E_ALL);
ini_set('display_errors', 1);

// POST isteği ile gelen verileri alma
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // POST verilerini doğru anahtarlarla alın
    $GiderTipiId = intval($_POST["GiderTipiId"]); 
    $Tip = $_POST["Tip"]; 

    try {
        // SQL sorgusunu hazırlama
        $sql = "UPDATE gidertipis SET tip = :Tip WHERE gidertipiId = :GiderTipiId";
    
        // Sorguyu hazırlama
        $stmt = $db->prepare($sql);
    
        // Parametreleri bağlama
        $stmt->bindValue(":Tip", $Tip);
        $stmt->bindValue(":GiderTipiId", $GiderTipiId);
    
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
?>  