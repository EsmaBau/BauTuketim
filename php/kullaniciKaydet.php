<?php
// Bağlantımızı ekliyoruz
include "connection.php";

// POST verilerini alıyoruz
$KullaniciAd = isset($_POST['KullaniciAd']) ? $_POST['KullaniciAd'] : '';
$KullaniciSoyad = isset($_POST['KullaniciSoyad']) ? $_POST['KullaniciSoyad'] : '';
$YetkiId = isset($_POST['YetkiId']) ? $_POST['YetkiId'] : '';
$Email = isset($_POST['Email']) ? $_POST['Email'] : '';
$Sifre = isset($_POST['Sifre']) ? $_POST['Sifre'] : '';
$KullaniciTelefon = isset($_POST['Telefon']) ? $_POST['Telefon'] : '';

// Veritabanında bu e-posta adresine ait bir hesap var mı kontrol ediyoruz
$query = $db->prepare("SELECT COUNT(*) AS count FROM kullaniciis WHERE Email = ?");
$query->execute(array($Email));
$result = $query->fetch(PDO::FETCH_ASSOC);

// E-posta adresine ait hesap varsa hata mesajı göster
if ($result['count'] > 0) {
    echo "Bu e-posta adresine ait hesap zaten mevcut.";
} else {
    // E-posta adresine ait hesap yoksa yeni kaydı ekleyebiliriz
    $query = $db->prepare("INSERT INTO kullaniciis (KullaniciAd, KullaniciSoyad, YetkiId, Email, Sifre, KullaniciTelefon, KullaniciStatus) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $r = $query->execute(array($KullaniciAd, $KullaniciSoyad, $YetkiId, $Email, $Sifre, $KullaniciTelefon, 1));

    if ($r) {
        echo "Veri başarıyla eklendi.";
    } else {
        echo "Hata: Veri eklenemedi.";
    }
}
?>
