<?php
require_once "dbkoneksi2.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $dbh->prepare("DELETE FROM pasien WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: list_pasien.php"); // Ganti sesuai nama file data pasien
exit;
