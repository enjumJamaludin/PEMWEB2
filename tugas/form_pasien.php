<?php
include_once 'top.php';
$koneksi = new mysqli("localhost", "root", "", "dbklinik");
require_once 'dbkoneksi.php';

$_id = $_GET['id'] ?? ''; // Ambil id dari URL
$row = []; // Default kosong
$tombol = 'Simpan'; // Default tombol

if ($_id) {
    $sql = "SELECT * FROM pasien WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();
    $tombol = 'Ubah';
}

// Ambil row kelurahan
$query_kelurahan = "SELECT id, nama FROM kelurahan";
$result_kelurahan = $koneksi->query($query_kelurahan);
?>

<!-- begin::App Wrapper -->
<div class="app-wrapper">
  <!-- begin::Header -->
  <nav class="app-header navbar navbar-expand bg-body">
    <?php include_once 'menu.php'; ?>
  </nav>
  <!-- end::Header -->

  <!-- begin::Sidebar -->
  <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
      <a href="./index.html" class="brand-link">
        <img src="./dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
        <span class="brand-text fw-light">Enjum Jamaludin</span>
      </a>
    </div>
    <div class="sidebar-wrapper">
      <?php include_once 'sidebar.php'; ?>
    </div>
  </aside>
  <!-- end::Sidebar -->

  <!-- begin::App Main -->
  <main class="app-main">
    <!-- begin::App Content Header -->
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6"><h3 class="mb-0">Tambah Pasien</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Pasien</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- end::App Content Header -->

    <!-- begin::App Content -->
    <div class="app-content">
      <div class="card">
        <div class="card-header bg-primary text-white">
          <h5 class="card-title mb-0"><?= $tombol ?> Data Pasien</h5>
        </div>
        <form action="proses_pasien.php" method="POST">
          <div class="card-body">
            <input type="hidden" name="id" value="<?= $row['id'] ?? '' ?>">

            <div class="form-group row mb-3">
              <label for="kode" class="col-sm-2 col-form-label">Kode</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="kode" name="kode" value="<?= $row['kode'] ?? '' ?>" placeholder="Masukkan Kode Pasien" />
              </div>
            </div>

            <div class="form-group row mb-3">
              <label for="nama" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama'] ?? '' ?>" placeholder="Masukkan Nama Pasien" />
              </div>
            </div>

            <div class="form-group row mb-3">
              <label for="tmp_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" value="<?= $row['tmp_lahir'] ?? '' ?>" placeholder="Masukkan Tempat Lahir" />
              </div>
            </div>

            <div class="form-group row mb-3">
              <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $row['tgl_lahir'] ?? '' ?>" />
              </div>
            </div>

            <fieldset class="form-group row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="gender_l" value="L" <?= ($row['gender'] ?? '') === 'L' ? 'checked' : '' ?>>
                  <label class="form-check-label" for="gender_l">Laki-Laki</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="gender_p" value="P" <?= ($row['gender'] ?? '') === 'P' ? 'checked' : '' ?>>
                  <label class="form-check-label" for="gender_p">Perempuan</label>
                </div>
              </div>
            </fieldset>

            <div class="form-group row mb-3">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" value="<?= $row['email'] ?? '' ?>" placeholder="Masukkan Email Pasien" />
              </div>
            </div>

            <div class="form-group row mb-3">
              <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $row['alamat'] ?? '' ?>" placeholder="Masukkan Alamat Pasien" />
              </div>
            </div>

            <div class="form-group row mb-3">
              <label for="kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
              <div class="col-sm-10">
                <select id="kelurahan" name="kelurahan_id" class="form-control">
                  <option value="">-- Pilih Kelurahan --</option>
                  <?php while ($kel = $result_kelurahan->fetch_assoc()): ?>
                    <option value="<?= $kel['id'] ?>" <?= ($kel['id'] == ($row['kelurahan_id'] ?? '')) ? 'selected' : '' ?>>
                      <?= $kel['nama'] ?>
                    </option>
                  <?php endwhile; ?>
                </select>
              </div>
            </div>
          </div>

          <div class="card-footer text-end">
          <button type="submit" name="proses" value="<?= $tombol ?>" class="btn btn-primary me-2"><?= $tombol ?></button>
            <button type="reset" class="btn btn-secondary">Batal</button>
          </div>
        </form>
      </div>
    </div>
    <!-- end::App Content -->
  </main>
  <!-- end::App Main -->

  <!-- begin::Footer -->
  <footer class="app-footer">
    <div class="float-end d-none d-sm-inline">Anything you want</div>
    <strong>&copy; 2014-2024 <a href="https://adminlte.io" class="text-decoration-none">Enjum Jamaludin</a>.</strong> All rights reserved.
  </footer>
  <!-- end::Footer -->
</div>
<!-- end::App Wrapper -->

<?php include 'bottom.php'; ?>
