<?php
require_once "dbkoneksi2.php";

$list_kelurahan = $dbh->query("SELECT * FROM kelurahan");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $kelurahan_id = $_POST['kelurahan_id'];

    $sql = "INSERT INTO pasien (kode, nama, gender, tmp_lahir, tgl_lahir, email, alamat, kelurahan_id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$kode, $nama, $gender, $tmp_lahir, $tgl_lahir, $email, $alamat, $kelurahan_id]);

    $success = true;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Tambah Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Form Tambah Pasien</h4>
        </div>
        <div class="card-body">
            <?php if (!empty($success)) : ?>
                <div class="alert alert-success">✅ Data pasien berhasil ditambahkan!</div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label for="kode" class="form-label">Kode Pasien</label>
                    <input type="text" class="form-control" name="kode" id="kode" required>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" name="gender" id="gender" required>
                        <option value="">-- Pilih Gender --</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tmp_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir" required>
                </div>

                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email (opsional)</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="kelurahan_id" class="form-label">Kelurahan</label>
                    <select class="form-select" name="kelurahan_id" id="kelurahan_id" required>
                        <option value="">-- Pilih Kelurahan --</option>
                        <?php foreach ($list_kelurahan as $kel): ?>
                            <option value="<?= $kel['id'] ?>"><?= $kel['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="form-text">
                        Belum ada? <a href="form_tambah_kelurahan.php" target="_blank">Tambah Kelurahan Baru</a>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS (opsional, untuk interaktif) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
