<?php
include "connection.php";

// POST yöntemiyle gelen kampus değerini al
$kampus = $_POST["kampus"];

// Kampüs adı boş mu kontrolü
if(empty($kampus)) {
    echo "Kampüs Adı boş olamaz!";
} else {
    // Kampüs adı boş değilse veritabanına ekleme işlemi yap
    $query = $db->prepare("INSERT INTO kampuss SET KampusAd=?, KampusStatus=?");
    $r= $query->execute(array($kampus, 1));

    // Ekleme işlemi başarılı mı kontrolü
    if ($r) {
        echo "Veri başarıyla eklendi.";
    } else {
        echo "Kampüs eklenirken bir hata oluştu.";
    }
}
?>