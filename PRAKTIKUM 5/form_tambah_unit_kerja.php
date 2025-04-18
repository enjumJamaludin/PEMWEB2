<?php
require_once "dbkoneksi2.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_unit = $_POST['nama_unit'];
    $nama_dokter = $_POST['nama_dokter']; // Menyimpan nama dokter (jika ada)

    try {
        $dbh->beginTransaction();

        // Simpan unit kerja
        $sql_unit = "INSERT INTO unit_kerja (nama) VALUES (?)";
        $stmt_unit = $dbh->prepare($sql_unit);
        $stmt_unit->execute([$nama_unit]);

        $unit_kerja_id = $dbh->lastInsertId(); // Ambil ID unit kerja yang baru dimasukkan

        // Simpan nama dokter jika ada
        if (!empty($nama_dokter)) {
            // Simpan nama dokter ke tabel paramedik yang terkait dengan unit kerja
            $sql_dokter = "INSERT INTO paramedik (nama, unit_kerja_id) VALUES (?, ?)";
            $stmt_dokter = $dbh->prepare($sql_dokter);
            $stmt_dokter->execute([$nama_dokter, $unit_kerja_id]);
        }

        $dbh->commit();

        header("Location: unit_kerja.php"); // Arahkan kembali ke halaman daftar unit kerja
        exit;
    } catch (PDOException $e) {
        $dbh->rollBack();
        $error = "Gagal menyimpan data: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Unit Kerja dan Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Tambah Unit Kerja dan Dokter</h4>
                </div>
                <div class="card-body">

                    <?php if (!empty($error)) : ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>

                    <form method="POST">
                        <h5 class="text-success mb-3">🧱 Data Unit Kerja</h5>
                        <div class="mb-3">
                            <label for="nama_unit" class="form-label">Nama Unit Kerja</label>
                            <input type="text" name="nama_unit" id="nama_unit" class="form-control" required>
                        </div>

                        <hr>

                        <h5 class="text-success mb-3">🧑‍⚕️ Nama Dokter (Opsional)</h5>
                        <div class="mb-3">
                            <label for="nama_dokter" class="form-label">Nama Dokter</label>
                            <input type="text" name="nama_dokter" id="nama_dokter" class="form-control">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>

                    <div class="mt-3">
                        <a href="unit_kerja.php" class="btn btn-secondary btn-sm">← Kembali ke Daftar Unit Kerja</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
