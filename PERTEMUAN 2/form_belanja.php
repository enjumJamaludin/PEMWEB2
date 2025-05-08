<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belanja Online</title>

    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container bg-white shadow-sm rounded-lg p-4">
        <h2 class="text-primary mb-4">Belanja Online</h2>
        
        <div class="row">
            <!-- Daftar Harga Section moved to the top -->
            <div class="col-md-4 bg-primary text-white rounded-lg p-4">
                <h3 class="font-weight-bold mb-2">Daftar Harga</h3>
                <ul class="list-unstyled">
                    <li>TV: Rp 4.200.000</li>
                    <li>Kulkas: Rp 3.100.000</li>
                    <li>Mesin Cuci: Rp 3.800.000</li>
                </ul>
                <p class="mt-4">Harga Dapat Berubah Setiap Saat</p>
            </div>

            <div class="col-md-8">
                <form method="POST" action="" class="mb-4" id="shoppingForm">
                    <div class="form-group">
                        <label for="customer">Customer</label>
                        <input type="text" id="customer" name="customer" placeholder="Nama Customer" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Pilih Produk</label>
                        <div class="form-check">
                            <input type="radio" id="tv" name="produk" value="TV" class="form-check-input" required>
                            <label for="tv" class="form-check-label">TV</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="kulkas" name="produk" value="KULKAS" class="form-check-input" required>
                            <label for="kulkas" class="form-check-label">KULKAS</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="mesin-cuci" name="produk" value="MESIN CUCI" class="form-check-input" required>
                            <label for="mesin-cuci" class="form-check-label">MESIN CUCI</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" id="jumlah" name="jumlah" placeholder="Jumlah" class="form-control" min="1" required>
                    </div>
                    <button type="submit" name="proses" class="btn btn-success">Kirim</button>
                </form>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $customer = htmlspecialchars(trim($_POST['customer']));
                    $produk = htmlspecialchars(trim($_POST['produk']));
                    $jumlah = intval($_POST['jumlah']);
                    $harga = 0;

                    switch ($produk) {
                        case "TV":
                            $harga = 4200000;
                            break;
                        case "KULKAS":
                            $harga = 3100000;
                            break;
                        case "MESIN CUCI":
                            $harga = 3800000;
                            break;
                        default:
                            echo "<p class='text-danger'>Produk tidak valid.</p>";
                            exit;
                    }

                    $total = $harga * $jumlah;

                    echo "<p>Nama Customer: $customer</p>";
                    echo "<p>Produk Pilihan: $produk</p>";
                    echo "<p>Jumlah Beli: $jumlah</p>";
                    echo "<p>Total Belanja: Rp " . number_format($total, 0, ',', '.') . ",-</p>";
                }
                ?>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
