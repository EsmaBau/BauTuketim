<?php
session_start(); // Oturumu başlat

// Oturumda kullanıcı yetkisi kontrol edilir
if (!isset($_SESSION['yetkiId'])) {
    // Kullanıcı oturumu yoksa, giriş sayfasına yönlendir
    header("Location: php/giris.php");
    exit(); // Kodun daha fazla çalışmasını engelle
}
// YetkiId'ye göre linklerin hangilerinin gösterileceğini belirle
$gosterLinkler = array();
if ($_SESSION['yetkiId'] === 5) {
    // Admin yetkisi varsa, tüm linkler gösterilir
    $gosterLinkler = array("elektrikOkuma.php", "suOkuma.php", "dogalgazOkuma.php", "telefonErisim.html","giderTipiBelirle.php", "kullaniciTanimlama.php", "tablolar.html", "tesisatTanimlama.php","yetkiVerme.php","yetkiler.php");
} else {
    // Diğer kullanıcılar için sadece belirli linkler gösterilir
    $gosterLinkler = array("telefonErisim.html", "elektrikOkuma.php", "suOkuma.php", "dogalgazOkuma.php");
}
?>