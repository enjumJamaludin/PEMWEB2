<?php
include './top.php';
include './menu.php';
?>

<!-- Page content wrapper-->
<div id="page-content-wrapper">

    <?php
    include './nav.php';
    ?>

    <!-- Page content-->
    <div class="container-fluid">
        <h1 class="mt-4 text-center text-primary">Tentang Saya</h1>
        <p class="text-center text-muted">Halo! Saya seorang pengembang web yang memiliki passion dalam menciptakan solusi digital yang berguna. Di halaman ini, Anda dapat mengetahui lebih banyak tentang saya dan perjalanan saya di dunia teknologi!</p>

        <!-- Info About Section -->
        <div class="row mt-5">
            <!-- Gambar Profil -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <img src="./Poto Formal.jpeg" class="card-img-top rounded-circle" alt="Profil Anda">
                    <div class="card-body text-center">
                        <h5 class="card-title">ENJUM JAMALUDIN S.Kom</h5>
                        <p class="card-text">Saya adalah seorang web developer dengan pengalaman dalam berbagai teknologi web modern. Saya senang belajar hal baru dan berbagi pengetahuan dengan orang lain.</p>
                    </div>
                </div>
            </div>

            <!-- Deskripsi Diri -->
            <div class="col-lg-8 col-md-6 mb-4">
                <div class="card shadow-lg">
                    <div class="card-header bg-info text-white">
                        <h3 class="card-title">Perjalanan Saya</h3>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Saya memulai perjalanan saya di dunia teknologi dengan belajar pemrograman web. Setelah beberapa tahun bekerja di berbagai proyek, saya mulai merasa tertarik dengan dunia desain dan pengembangan front-end. 
                        </p>
                        <p class="card-text">
                            Saya percaya bahwa teknologi memiliki kekuatan untuk menyelesaikan masalah dan membantu banyak orang. Oleh karena itu, saya selalu berusaha untuk mengembangkan keterampilan saya dalam mengerjakan proyek-proyek yang dapat memberikan dampak positif bagi masyarakat.
                        </p>
                    </div>
                    <div class="card-footer text-center">
                        <p class="mb-0">Jika Anda ingin berkolaborasi atau bertanya lebih lanjut, jangan ragu untuk menghubungi saya!</p>
                        <a href="contact.php" class="btn btn-primary mt-3">Hubungi Saya</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fun Fact Section -->
        <div class="row mt-5 text-center">
            <div class="col-md-4">
                <h4><i class="fas fa-laptop-code"></i> 5+ Tahun Pengalaman</h4>
                <p>Dalam pengembangan website dan aplikasi web.</p>
            </div>
            <div class="col-md-4">
                <h4><i class="fas fa-cogs"></i> Keahlian Beragam</h4>
                <p>HTML, CSS, JavaScript, PHP, React, dan banyak lagi!</p>
            </div>
            <div class="col-md-4">
                <h4><i class="fas fa-heart"></i> Passion</h4>
                <p>Saya selalu bersemangat dalam menciptakan solusi digital yang inovatif!</p>
            </div>
        </div>

    </div>
</div>

<?php
include './bottom.php';
?>
