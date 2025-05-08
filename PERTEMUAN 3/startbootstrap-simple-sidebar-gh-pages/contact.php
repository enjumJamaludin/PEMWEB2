<?php
include './top.php';  // Include bagian atas halaman (misalnya, header)
include './menu.php'; // Include menu navigasi
?>

<!-- HTML untuk Konten Halaman Contact -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <!-- Memanggil CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Memanggil CSS -->
    <link rel="stylesheet" href="./style.css"> 
</head>
<body>


    <!-- Halaman Contact -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Hubungi Kami</h2>

        <div class="row">
            <div class="col-md-6">
                <!-- Form Kontak -->
                <form action="contact_process.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="subject" class="form-label">Subjek</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                </form>
            </div>

            <!-- kontak -->
            <div class="col-md-6">
                <h4>Kontak Kami</h4>
                <ul class="list-unstyled">
                    <li><strong>Alamat:</strong> Jl. Material No. 123, Jakarta, Indonesia</li>
                    <li><strong>Telepon:</strong> +62 85770765809</li>
                    <li><strong>Email:</strong> <a href="mailto:info@websitekami.com">info@websitekami.com</a></li>
                </ul>

                <!-- Peta Lokasi -->
                <div class="mt-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.106158169834!2d106.84544301527586!3d-6.208763995453028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6993f5b47f57bb%3A0x1f2b079c32fcb052!2sBundaran%20HI%2C%20Jalan%20Thamrin%20No.1%2C%20Menteng%2C%20Central%20Jakarta%2C%20Jakarta!5e0!3m2!1sen!2sid!4v1643124547571!5m2!1sen!2sid" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Memanggil JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>

<?php
include './bottom.php'; 
?>
