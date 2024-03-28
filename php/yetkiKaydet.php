<?php
include "connection.php";

$yetki = isset($_POST["yetki"]) ? trim($_POST["yetki"]) : null;

try {
    // Değerlerin boş olup olmadığını kontrol et
    if (empty($yetki)) {
        echo "Yetki adı boş olamaz.";
    } else {
        // Yetki adını ekleyin
        $query = $db->prepare("INSERT INTO yetkis (YetkiAd, YetkiStatus) VALUES (?, ?)");
        $r= $query->execute(array($yetki, 1));

        if ($r) {
            echo "Veri başarıyla eklendi.";
        } else {
            echo "Hata: Veri eklenemedi.";
        }
    }
} catch (PDOException $e) {
    echo "Hata: " . $e->getMessage();
}
?>
