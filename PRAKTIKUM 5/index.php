<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Klinik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .card-menu {
            text-decoration: none;
            color: inherit;
        }
        .card:hover {
            transform: scale(1.02);
            transition: 0.3s;
        }
    </style>
    <?php require_once "dbkoneksi2.php"; ?>
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="text-center mb-4">📊 Selamat Datang Diklinik</h1>

    <div class="menu-grid">
        <a href="list_pasien.php" class="card-menu">
            <div class="card shadow text-center p-3">
                <h4>🧍 Pasien</h4>
            </div>
        </a>
        <a href="paramedik.php" class="card-menu">
            <div class="card shadow text-center p-3">
                <h4>🩺 Paramedik</h4>
            </div>
        </a>
        <a href="kelurahan.php" class="card-menu">
            <div class="card shadow text-center p-3">
                <h4>🏘️ Kelurahan</h4>
            </div>
        </a>
        <a href="unit_kerja.php" class="card-menu">
            <div class="card shadow text-center p-3">
                <h4>🏥 Unit Kerja</h4>
            </div>
        </a>
        <a href="periksa.php" class="card-menu">
            <div class="card shadow text-center p-3">
                <h4>📋 Pemeriksaan</h4>
            </div>
        </a>
        <a href="form_tambah_pasien.php" class="card-menu">
            <div class="card shadow text-center p-3">
                <h4>➕ Tambah Pasien</h4>
            </div>
        </a>

        
        <a href="form_tambah_paramedik.php" class="card-menu">
            <div class="card shadow text-center p-3">
                <h4>🩺 Tambah Paramedik</h4>
            </div>
        </a>
        <a href="form_tambah_periksa.php" class="card-menu">
            <div class="card shadow text-center p-3">
                <h4>📋 Tambah Pemeriksaan</h4>
            </div>
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
