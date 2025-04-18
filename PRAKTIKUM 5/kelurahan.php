<?php
require_once "dbkoneksi2.php";
$list_kelurahan = $dbh->query("SELECT * FROM kelurahan");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kelurahan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="mb-4">🏘️ Data Kelurahan</h2>

    <table class="table table-bordered table-hover table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Kelurahan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list_kelurahan as $idx => $kel): ?>
                <tr>
                    <td><?= $idx + 1 ?></td>
                    <td><?= $kel['nama'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
