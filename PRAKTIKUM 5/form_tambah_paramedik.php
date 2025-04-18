<?php
require_once "dbkoneksi2.php";

// Ambil data unit kerja untuk dropdown
$list_unit = $dbh->query("SELECT * FROM unit_kerja");

// Handle form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $kategori = $_POST['kategori']; // Pastikan ini tidak kosong
    $telpon = $_POST['telpon'];
    $alamat = $_POST['alamat'];
    $unit_kerja_id = $_POST['unit_kerja_id'];

    $sql = "INSERT INTO paramedik (nama, gender, tmp_lahir, tgl_lahir, kategori, telpon, alamat, unit_kerja_id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $dbh->prepare($sql);

    try {
        // Pastikan kategori tidak kosong sebelum menambahkan data
        if (!empty($kategori)) {
            $stmt->execute([$nama, $gender, $tmp_lahir, $tgl_lahir, $kategori, $telpon, $alamat, $unit_kerja_id]);
            $success = true;
        } else {
            $error = "Kategori tidak boleh kosong.";
        }
    } catch (PDOException $e) {
        $error = "Gagal menyimpan data: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Tambah Paramedik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Form Tambah Paramedik</h4>
                </div>
                <div class="card-body">

                    <?php if (!empty($success)) : ?>
                        <div class="alert alert-success">✅ Data paramedik berhasil ditambahkan!</div>
                    <?php elseif (!empty($error)) : ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
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
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" class="form-control" name="kategori" id="kategori" required>
                        </div>

                        <div class="mb-3">
                            <label for="telpon" class="form-label">Telepon</label>
                            <input type="text" class="form-control" name="telpon" id="telpon">
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="unit_kerja_id" class="form-label">Unit Kerja</label>
                            <select class="form-select" name="unit_kerja_id" id="unit_kerja_id" required>
                                <option value="">-- Pilih Unit Kerja --</option>
                                <?php foreach ($list_unit as $uk): ?>
                                    <option value="<?= $uk['id'] ?>"><?= $uk['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small>
                                <a href="form_tambah_unit_kerja.php" target="_blank">[Tambah Unit Kerja Baru]</a><br>
                                <span class="text-muted">Setelah menambahkan, <strong>refresh halaman ini</strong> agar data terbaru muncul.</span>
                            </small>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                    <!-- Tombol Refresh Halaman -->
                    <div class="mt-3 text-center">
                        <a href="form_tambah_paramedik.php" class="btn btn-outline-secondary btn-sm">🔁 Refresh Halaman</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
