<?php
require_once "dbkoneksi2.php";

// Mengecek apakah ada permintaan hapus
if (isset($_GET['hapus_id'])) {
    $hapus_id = $_GET['hapus_id'];
    $stmt = $dbh->prepare("DELETE FROM paramedik WHERE id = :id");
    $stmt->bindParam(':id', $hapus_id);
    $stmt->execute();
}

// Mengambil daftar paramedik
$list_paramedik = $dbh->query("SELECT * FROM paramedik");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Paramedik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="mb-4">🩺 Daftar Paramedik</h2>

    <table class="table table-bordered table-hover table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Kategori</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Unit Kerja ID</th>
                <th>Aksi</th> <!-- Kolom Aksi -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list_paramedik as $idx => $p): ?>
                <tr>
                    <td><?= $idx + 1 ?></td>
                    <td><?= $p['nama'] ?></td>
                    <td><?= $p['gender'] ?></td>
                    <td><?= $p['tmp_lahir'] ?></td>
                    <td><?= $p['tgl_lahir'] ?></td>
                    <td><?= $p['kategori'] ?></td>
                    <td><?= $p['telpon'] ?></td>
                    <td><?= $p['alamat'] ?></td>
                    <td><?= $p['unit_kerja_id'] ?></td>
                    <td>
                        <!-- Tombol hapus dengan ikon -->
                        <a href="?hapus_id=<?= $p['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" class="text-danger">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
