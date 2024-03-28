<?php
include "connection.php";

$kullanici = array();
$q = $db->query("SELECT kullaniciis.*, yetkis.YetkiAd
                FROM kullaniciis
                JOIN yetkis ON kullaniciis.YetkiId = yetkis.YetkiId")->fetchAll(PDO::FETCH_ASSOC);

if(count($q) > 0){
    foreach($q as $r){
        $kullanici[] = array(
            "kullaniciId" => $r["KullaniciId"],
            "kullaniciAd" => $r["KullaniciAd"],
            "kullaniciSoyad" => $r["KullaniciSoyad"],
            "yetkiId" => $r["YetkiId"],
            "yetkiAd" => $r["YetkiAd"],
            "email" => $r["Email"],
            "sifre" => $r["Sifre"],
            "kullaniciTelefon" => $r["KullaniciTelefon"]  
        );
    }
    echo json_encode($kullanici);
} 
?>