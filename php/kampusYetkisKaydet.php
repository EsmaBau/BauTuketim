<?php
// Veritabanı bağlantısı
include "connection.php"; // veritabanı bağlantısını sağlayan dosya

// POST isteğinden gelen verileri al
$KampusId = $_POST['kampusAdi']; // Birden fazla kampus id'si alındığı için bir dizi olacak
$YetkiId = $_POST['yetkiAdi'][0]; // Yetki id'si tek bir değer olduğu için direkt alıyoruz

// Değişkenleri kontrol etmek için


// Tanımlı olan kampüsleri tutacak dizi
$existingCampuses = array();

// Her bir kampus için işlem yap
foreach ($KampusId as $KampusId) {
    // Öncelikle aynı KampusId ve YetkiId ile kayıt olup olmadığını kontrol et
    $query = $db->prepare("SELECT COUNT(*) as count FROM kampus_yetkis WHERE KampusId = ? AND YetkiId = ?");
    $query->execute(array($KampusId, $YetkiId));
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result['count'] == 0) {
        // Belirtilen KampusId ve YetkiId ile hiç kayıt yok, yeni kaydı ekleyebiliriz
        $query = $db->prepare("INSERT INTO kampus_yetkis (KampusId, YetkiId, KampusYetkiStatus) VALUES (?, ?, ?)");
        $r = $query->execute(array($KampusId, $YetkiId, 1));

        if ($r) {
            echo "Veri başarıyla eklendi.";
        } else {
            echo "Hata: Veri eklenemedi.";
        }
    } else {
        // Yetki zaten bu kampüste tanımlı, tanımlı olan kampüsü diziye ekle
        $query = $db->prepare("SELECT KampusAd FROM kampuss WHERE KampusId = ?");
        $query->execute(array($KampusId));
        $kampus = $query->fetch(PDO::FETCH_ASSOC);

        $existingCampuses[] = $kampus['KampusAd'];
    }
}

// Tanımlı olan kampüsleri ekrana yazdır
if (!empty($existingCampuses)) {
    $existingCampusesString = implode(", ", $existingCampuses);
    echo "Seçtiğiniz yetki zaten şu kampüslerde tanımlı: " . $existingCampusesString;
}
?>
