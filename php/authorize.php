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
    $gosterLinkler = array("elektrikOkuma.html", "suOkuma.html", "dogalgazOkuma.html", "telefonErisim.html","giderTipiBelirle.html", "kullaniciTanimlama.html", "tablolar.html", "tesisatTanimlama.html","yetkiVerme.html","yetkiler.html");
} else {
    // Diğer kullanıcılar için sadece belirli linkler gösterilir
    $gosterLinkler = array("telefonErisim.html", "elektrikOkuma.html", "suOkuma.html", "dogalgazOkuma.html");
}
?>