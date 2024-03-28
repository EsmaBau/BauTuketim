<?php
    include "connection.php";

    // Yetki bilgilerini, ilişkili kampusId bilgilerini ve KampusAd bilgilerini almak için bir sorgu yapın
    $query = "SELECT yetkis.YetkiId, yetkis.YetkiAd, kampus_yetkis.KampusId, kampuss.KampusAd
          FROM yetkis
          JOIN kampus_yetkis ON yetkis.YetkiId = kampus_yetkis.YetkiId
          JOIN kampuss ON kampus_yetkis.KampusId = kampuss.KampusId";

    $statement = $db->query($query);

    // Verileri bir diziye alın
    $yetkiler = array();
    foreach ($statement as $row) {
        $yetkiler[] = array(
            "YetkiId" => $row["YetkiId"],
            "KampusId" => $row["KampusId"],
            "YetkiAd" => $row["YetkiAd"],
            "KampusAd" => $row["KampusAd"]
        );
    }

    // JSON formatında verileri döndürün
    echo json_encode($yetkiler);
?>      