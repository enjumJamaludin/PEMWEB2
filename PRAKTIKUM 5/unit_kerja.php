<?php
require_once "dbkoneksi2.php";

// Mengecek apakah ada permintaan hapus
if (isset($_GET['hapus_id'])) {
    $hapus_id = $_GET['hapus_id'];
    // Menghapus unit kerja yang memiliki ID tersebut
    $stmt = $dbh->prepare("DELETE FROM unit_kerja WHERE id = :id");
    $stmt->bindParam(':id', $hapus_id);
    $stmt->execute();
}

// Ambil data unit kerja beserta nama dokter
$sql = "
    SELECT uk.id, uk.nama AS unit_nama, GROUP_CONCAT(p.nama SEPARATOR ', ') AS nama_dokter
    FROM unit_kerja uk
    LEFT JOIN paramedik p ON uk.id = p.unit_kerja_id
    GROUP BY uk.id, uk.nama
";
$list_unit = $dbh->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Unit Kerja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="mb-4">🏥 Data Unit Kerja</h2>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Unit Kerja</th>
                <th>Nama Dokter / Paramedik</th>
                <th>Aksi</th> <!-- Kolom Aksi -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list_unit as $idx => $uk): ?>
                <tr>
                    <td><?= $idx + 1 ?></td>
                    <td><?= $uk['unit_nama'] ?></td>
                    <td><?= $uk['nama_dokter'] ?? '-' ?></td>
                    <td>
                        <!-- Tombol hapus dengan ikon -->
                        <a href="?hapus_id=<?= $uk['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus unit kerja ini?');" class="text-danger">
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
