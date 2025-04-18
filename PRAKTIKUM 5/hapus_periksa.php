<?php
require_once "dbkoneksi2.php";

// Periksa apakah parameter 'id' ada
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Mulai transaksi
        $dbh->beginTransaction();

        // Query untuk menghapus data berdasarkan id
        $sql = "DELETE FROM periksa WHERE id = ?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$id]);

        // Commit transaksi
        $dbh->commit();

        // Redirect setelah berhasil menghapus
        header("Location: periksa.php");
        exit;
    } catch (PDOException $e) {
        // Rollback jika terjadi kesalahan
        $dbh->rollBack();
        echo "Gagal menghapus data: " . $e->getMessage();
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
