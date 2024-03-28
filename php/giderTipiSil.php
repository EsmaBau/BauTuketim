<?php

include "connection.php";

if(isset($_POST['sil'])){
    $id = $_POST['sil'];

    $q = $db->prepare("DELETE FROM gidertipis WHERE GiderTipiId = $id");
    $r = $q->execute();

    if($r){
        echo "1";
    }else{
        echo "0";
    }
} else {
    echo "Geçersiz silme isteği";
}
?>