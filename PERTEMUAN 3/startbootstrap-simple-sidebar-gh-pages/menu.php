<?php
// Array daftar halaman
$halaman = [
    "home" => "home.php",
    "about" => "about.php",
    "contact" => "contact.php",
    "propile" => "propile.php"
];

// Cek parameter "page" dari URL
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    // Jika halaman ada dalam array, redirect
    if (array_key_exists($page, $halaman)) {
        header("Location: " . $halaman[$page]);
        exit();
    } else {
        echo "<h2>Halaman tidak ditemukan!</h2>";
        echo '<a href="index.php">Kembali ke Menu</a>';
    }
}
?>

<!-- Sidebar-->
<div class="border-end bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom bg-light">WEBSITEKU</div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php">Home</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="about.php">About</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="contact.php">Contact</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="hobi.php">My Hobi</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="status.php">Status</a>
    </div>
</div>
