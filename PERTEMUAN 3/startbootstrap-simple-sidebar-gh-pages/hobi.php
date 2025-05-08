<?php
include './top.php';  
include './menu.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Hobi</title>

    <!-- Memanggil CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Memanggil CSS -->
    <link rel="stylesheet" href="./style.css"> 
</head>
<body>

    <!-- Halaman My Hobi -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">My Hobi</h2>

        <!-- Row untuk kartu -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Card 1: Hobi 1 -->
            <div class="col">
                <div class="card shadow-sm">
                    <img src="./voly.jpg" class="card-img-top" alt="Hobi 1">
                    <div class="card-body">
                        <h5 class="card-title">Bermain Voly</h5>
                        <p class="card-text">Volleyball adalah tempat di mana saya bisa melepaskan segala rasa lelah dan merasakan kebersamaan dengan tim.</p>
                        <a href="#" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
            </div>

            <!-- Card 2: Hobi 2 -->
            <div class="col">
                <div class="card shadow-sm">
                    <img src="./spedah.jpeg" class="card-img-top" alt="Hobi 2">
                    <div class="card-body">
                        <h5 class="card-title">Bersepeda</h5>
                        <p class="card-text">Bersepeda mengajarkan kita untuk selalu menjaga keseimbangan baik di jalanan maupun dalam hidup untuk menikmati indahnya dunia.</p>
                        <a href="#" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
            </div>

            <!-- Card 3: Hobi 3 -->
            <div class="col">
                <div class="card shadow-sm">
                    <img src="./badminton.jpg" class="card-img-top" alt="Hobi 3">
                    <div class="card-body">
                        <h5 class="card-title">Bermain Badminton</h5>
                        <p class="card-text">Setiap pukulan di lapangan bulu tangkis adalah tantangan untuk menjadi lebih baik, lebih cepat, dan lebih kuat.</p>
                        <a href="#" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
