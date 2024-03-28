<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "giderler";

try{
    $db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $user, $pass);
} catch(PDOException $hata){
    die($hata->getMessage());
}
?>