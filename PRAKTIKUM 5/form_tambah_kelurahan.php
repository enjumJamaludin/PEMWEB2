<?php
require_once "dbkoneksi2.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];

    $sql = "INSERT INTO kelurahan (nama) VALUES (?)";
    $stmt = $dbh->prepare($sql);

    try {
        $stmt->execute([$nama]);
        $success = true;
    } catch (PDOException $e) {
        $error = "Gagal menambahkan kelurahan: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Tambah Kelurahan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Form Tambah Kelurahan</h4>
                </div>
                <div class="card-body">

                    <?php if (!empty($success)) : ?>
                        <div class="alert alert-success">✅ Kelurahan berhasil ditambahkan!</div>
                    <?php elseif (!empty($error)) : ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kelurahan</label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
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

<!-- Bootstrap JS (opsional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
