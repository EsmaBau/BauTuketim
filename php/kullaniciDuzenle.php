<?php
include "connection.php";

// Hata iletisini gösterme 
error_reporting(E_ALL);
ini_set('display_errors', 1);

// POST isteği ile gelen verileri alma
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // POST verilerini doğru anahtarlarla alın
    $KullaniciId = $_POST["KullaniciId"];
    $KullaniciAd = $_POST["KullaniciAd"];
    $KullaniciSoyad = $_POST["KullaniciSoyad"];
    $YetkiId = $_POST["YetkiId"];
    $Email = $_POST["Email"];
    $Sifre = $_POST["Sifre"];
    $KullaniciTelefon = $_POST["KullaniciTelefon"];

    try {
        // SQL sorgusunu hazırlama
        $sql = "UPDATE kullaniciis SET KullaniciAd = :KullaniciAd, KullaniciSoyad = :KullaniciSoyad, YetkiId = :YetkiId, Email = :Email, Sifre = :Sifre, KullaniciTelefon = :KullaniciTelefon WHERE KullaniciId = :KullaniciId";

        // Sorguyu hazırlama
        $stmt = $db->prepare($sql);

        // Parametreleri bağlama
        $stmt->bindParam(":KullaniciAd", $KullaniciAd);
        $stmt->bindParam(":KullaniciSoyad", $KullaniciSoyad);
        $stmt->bindParam(":YetkiId", $YetkiId);
        $stmt->bindParam(":Email", $Email);
        $stmt->bindParam(":Sifre", $Sifre);
        $stmt->bindParam(":KullaniciTelefon", $KullaniciTelefon);
        $stmt->bindParam(":KullaniciId", $KullaniciId);

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