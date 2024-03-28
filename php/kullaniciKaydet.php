<?php
// Bağlantımızı ekliyoruz
include "connection.php";

// POST verilerini alıyoruz
$KullaniciAd = isset($_POST['KullaniciAd']) ? $_POST['KullaniciAd'] : '';
$KullaniciSoyad = isset($_POST['KullaniciSoyad']) ? $_POST['KullaniciSoyad'] : '';
$Email = isset($_POST['Email']) ? $_POST['Email'] : '';
$Sifre = isset($_POST['Sifre']) ? $_POST['Sifre'] : '';
$KullaniciTelefon = isset($_POST['Telefon']) ? $_POST['Telefon'] : '';

// YetkiId'yi bir JSON string olarak alıyoruz
$selectedYetkiIdJSON = isset($_POST['YetkiId']) ? $_POST['YetkiId'] : '[]';

// JSON stringini PHP dizisine dönüştür
$YetkiIdArray = json_decode($selectedYetkiIdJSON, true);

// Veritabanında bu e-posta adresine ait bir hesap var mı kontrol ediyoruz
$query = $db->prepare("SELECT COUNT(*) AS count FROM kullaniciis WHERE Email = ?");
$query->execute(array($Email));
$result = $query->fetch(PDO::FETCH_ASSOC);

// E-posta adresine ait hesap varsa hata mesajı göster
if ($result['count'] > 0) {
    echo "Bu e-posta adresine ait hesap zaten mevcut.";
} else {
    // E-posta adresine ait hesap yoksa yeni kaydı ekleyebiliriz
    // Birden fazla yetki seçilebileceği için foreach döngüsüyle her bir yetkiyi ekliyoruz
    foreach ($YetkiIdArray as $YetkiId) {
        $query = $db->prepare("INSERT INTO kullaniciis (KullaniciAd, KullaniciSoyad, YetkiId, Email, Sifre, KullaniciTelefon, KullaniciStatus) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $r = $query->execute(array($KullaniciAd, $KullaniciSoyad, $YetkiId, $Email, $Sifre, $KullaniciTelefon, 1));

        if (!$r) {
            // Hata durumunda hemen işlemi sonlandırıp hata mesajını gönder
            echo "Hata: Veri eklenemedi.";
            exit; // Kodun devamını çalıştırmamak için
        }
    }

    // Tüm yetkiler başarıyla eklenirse başarılı mesajını gönder
    echo "Veri başarıyla eklendi.";
}
?>
