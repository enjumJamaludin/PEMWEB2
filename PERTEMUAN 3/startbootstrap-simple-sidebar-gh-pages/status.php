<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Diri Saya</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Card untuk Status Diri -->
            <div class="card shadow-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h3>Status Diri Saya</h3>
                </div>
                <div class="card-body">
                    
                    <?php
                    // Misalnya status diri
                    $status_diri = "Sedang menikmati waktu bersama keluarga dan belum menikah wkwk";
                    $status_warna = "info"; 

                    // Menampilkan status
                    echo "<h5 class='card-title'>Selamat datang, <span class='font-weight-bold'>John Doe</span></h5>";
                    echo "<p class='card-text'>Status Saat Ini: <span class='badge badge-$status_warna'>$status_diri</span></p>";
                    ?>

                    <!-- Button untuk memperbarui status -->
                    <button class="btn btn-warning btn-block" data-toggle="modal" data-target="#statusModal">Perbarui Status</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk mengubah status -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusModalLabel">Ubah Status Diri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="statusInput">Masukkan Status Baru</label>
                        <input type="text" class="form-control" id="statusInput" name="status" placeholder="Contoh: Lagi sibuk bekerja..." required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Simpan Status</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS dan jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
// Mengecek apakah form status dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_status = $_POST['status'];
    // Ganti status dengan yang baru
    $status_diri = $new_status;
    echo "<script>alert('Status telah diperbarui!');</script>";
}
?>

</body>
</html>
