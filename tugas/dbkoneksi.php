<?php
$dsn = "mysql:host=localhost;dbname=dbklinik";
$dbuser = "root";
$dbpass = "";

try {
    $dbh = new PDO($dsn, $dbuser, $dbpass);
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
    die();
}


?>
