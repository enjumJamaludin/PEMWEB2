<?php
require_once "dbkoneksi2.php";

// Mengambil data pasien dan menghubungkannya dengan tabel kelurahan
$list_pasien = $dbh->query("SELECT pasien.*, kelurahan.nama AS kelurahan FROM pasien LEFT JOIN kelurahan ON pasien.kelurahan_id = kelurahan.id");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="mb-4">📄 Data Pasien</h2>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Pasien</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Kelurahan</th> <!-- Menambahkan kolom Kelurahan -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list_pasien as $idx => $pasien): ?>
                <tr>
                    <td><?= $idx + 1 ?></td>
                    <td><?= $pasien['kode'] ?></td>
                    <td><?= $pasien['nama'] ?></td>
                    <td><?= $pasien['gender'] ?></td>
                    <td><?= $pasien['email'] ?? '-' ?></td>
                    <td><?= $pasien['kelurahan'] ?? '-' ?></td> <!-- Menampilkan nama kelurahan -->
                    <td>
                        <a href="hapus_pasien.php?id=<?= $pasien['id'] ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin ingin menghapus pasien ini?')">
                            <i class="bi bi-trash"></i> Hapus
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
