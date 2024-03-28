<?php
// giris.php

session_start(); // Oturumu başlat

include "connection.php";

// POST ile gelen kullanıcı adı ve şifre
$email = $_POST['email'];
$sifre = $_POST['sifre'];

// Veritabanında kullanıcıyı kontrol etme sorgusu
$q = "SELECT * FROM kullaniciis WHERE Email='$email' AND Sifre='$sifre'";
$sonuc = $db->query($q);

// Kullanıcı bulunduysa giriş başarılı
if ($sonuc->rowCount() > 0) {
    // Kullanıcının yetki bilgisini al
    $kullaniciis = $sonuc->fetch(PDO::FETCH_ASSOC);
    $yetkiId = $kullaniciis['YetkiId']; 

    // Oturumda yetki bilgisini sakla
    $_SESSION['yetkiId'] = $yetkiId;

    // Başarılı giriş durumunda yetki bilgisini ve giriş durumunu JSON formatında dön
    echo json_encode(array('status' => 'success', 'YetkiId' => $yetkiId));
} else {
    // Kullanıcı tanımlı değilse veya hatalı giriş bilgileri varsa hata mesajı döndür
    echo json_encode(array('status' => 'error', 'message' => 'Kullanıcı tanımlı değil veya hatalı giriş bilgileri.'));
}
?>
