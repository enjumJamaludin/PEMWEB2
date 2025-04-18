<?php
require_once "dbkoneksi2.php";

// Ambil semua data periksa
$list_periksa = $dbh->query("SELECT * FROM periksa");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pemeriksaan Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="mb-4 text-center">📋 Data Pemeriksaan Pasien</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Berat (kg)</th>
                    <th>Tinggi (cm)</th>
                    <th>Tensi</th>
                    <th>Keterangan</th>
                    <th>ID Pasien</th>
                    <th>ID Dokter</th>
                    <th>Aksi</th> <!-- Menambahkan kolom untuk tombol aksi -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list_periksa as $idx => $px) { ?>
                <tr>
                    <td><?= $idx + 1 ?></td>
                    <td><?= $px['tanggal'] ?></td>
                    <td><?= $px['berat'] ?></td>
                    <td><?= $px['tinggi'] ?></td>
                    <td><?= $px['tensi'] ?></td>
                    <td><?= $px['keterangan'] ?></td>
                    <td><?= $px['pasien_id'] ?></td>
                    <td><?= $px['dokter_id'] ?></td>
                    <td>
                        <!-- Tombol Hapus -->
                        <a href="hapus_periksa.php?id=<?= $px['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <i class="bi bi-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
