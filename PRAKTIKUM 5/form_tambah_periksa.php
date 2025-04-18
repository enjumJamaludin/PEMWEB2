<?php
require_once "dbkoneksi2.php";

// Ambil data pasien dan paramedik (dokter) untuk dropdown
$list_pasien = $dbh->query("SELECT id, nama FROM pasien");
$list_dokter = $dbh->query("SELECT id, nama FROM paramedik");

// Proses form jika disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal = $_POST['tanggal'];
    $berat = $_POST['berat'];
    $tinggi = $_POST['tinggi'];
    $tensi = $_POST['tensi'];
    $keterangan = $_POST['keterangan'];
    $pasien_id = $_POST['pasien_id'];
    $dokter_id = $_POST['dokter_id'];

    $sql = "INSERT INTO periksa (tanggal, berat, tinggi, tensi, keterangan, pasien_id, dokter_id)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $dbh->prepare($sql);

    try {
        $stmt->execute([$tanggal, $berat, $tinggi, $tensi, $keterangan, $pasien_id, $dokter_id]);
        $success = true;
    } catch (PDOException $e) {
        $error = "Gagal menyimpan data: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Tambah Pemeriksaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Form Tambah Pemeriksaan</h4>
                </div>
                <div class="card-body">

                    <?php if (!empty($success)) : ?>
                        <div class="alert alert-success">✅ Data pemeriksaan berhasil ditambahkan!</div>
                    <?php elseif (!empty($error)) : ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                        </div>

                        <div class="mb-3">
                            <label for="berat" class="form-label">Berat (kg)</label>
                            <input type="number" step="0.1" class="form-control" name="berat" id="berat" required>
                        </div>

                        <div class="mb-3">
                            <label for="tinggi" class="form-label">Tinggi (cm)</label>
                            <input type="number" step="0.1" class="form-control" name="tinggi" id="tinggi" required>
                        </div>

                        <div class="mb-3">
                            <label for="tensi" class="form-label">Tensi</label>
                            <input type="text" class="form-control" name="tensi" id="tensi" required>
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="pasien_id" class="form-label">Pasien</label>
                            <select class="form-select" name="pasien_id" id="pasien_id" required>
                                <option value="">-- Pilih Pasien --</option>
                                <?php foreach ($list_pasien as $ps): ?>
                                    <option value="<?= $ps['id'] ?>"><?= $ps['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="dokter_id" class="form-label">Dokter (Paramedik)</label>
                            <select class="form-select" name="dokter_id" id="dokter_id" required>
                                <option value="">-- Pilih Paramedik --</option>
                                <?php foreach ($list_dokter as $dr): ?>
                                    <option value="<?= $dr['id'] ?>"><?= $dr['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
