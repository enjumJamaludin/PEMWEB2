<?php
include_once 'top.php';
$koneksi = new mysqli("localhost", "root", "", "dbklinik");
require_once 'dbkoneksi.php';

$_id = $_GET['id'] ?? '';
$row = [];
$tombol = 'Simpan';

if ($_id) {
    $sql = "SELECT * FROM paramedik WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();
    $tombol = 'Ubah';
}

$query_unit_kerja = "SELECT id, nama FROM unit_kerja";
$result_unit_kerja = $koneksi->query($query_unit_kerja);
?>

<div class="app-wrapper">
  <!-- Header -->
  <nav class="app-header navbar navbar-expand bg-body">
    <?php include_once 'menu.php'; ?>
  </nav>

  <!-- Sidebar -->
  <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
      <a href="./index.php" class="brand-link">
        <img src="./dist/assets/img/AdminLTELogo.png" alt="Logo" class="brand-image opacity-75 shadow" />
        <span class="brand-text fw-light">Enjum Jamaludin</span>
      </a>
    </div>
    <div class="sidebar-wrapper">
      <?php include_once 'sidebar.php'; ?>
    </div>
  </aside>

  <!-- Main -->
  <main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6"><h3><?= $tombol ?> Paramedik</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Form Paramedik</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="app-content">
      <div class="card shadow">
        <!-- Apply bg-primary class here to make the background blue -->
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0"><?= $tombol ?> Data Paramedik</h5>
        </div>
        <form class="form-horizontal" action="proses_paramedik.php" method="POST">
          <div class="card-body">
            <input type="hidden" name="id" value="<?= $row['id'] ?? '' ?>">

            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label text-end">Nama Lengkap</label>
              <div class="col-sm-6">
                <input type="text" name="nama" class="form-control" value="<?= $row['nama'] ?? '' ?>" required>
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label text-end">Jenis Kelamin</label>
              <div class="col-sm-6">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="gender_l" value="L" <?= ($row['gender'] ?? '') === 'L' ? 'checked' : '' ?>>
                  <label class="form-check-label" for="gender_l">Laki-Laki</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="gender_p" value="P" <?= ($row['gender'] ?? '') === 'P' ? 'checked' : '' ?>>
                  <label class="form-check-label" for="gender_p">Perempuan</label>
                </div>
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label text-end">Tempat Lahir</label>
              <div class="col-sm-6">
                <input type="text" name="tmp_lahir" class="form-control" value="<?= $row['tmp_lahir'] ?? '' ?>">
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label text-end">Tanggal Lahir</label>
              <div class="col-sm-6">
                <input type="date" name="tgl_lahir" class="form-control" value="<?= $row['tgl_lahir'] ?? '' ?>">
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label text-end">Kategori</label>
              <div class="col-sm-6">
                <select name="kategori" class="form-control" required>
                  <option value="">-- Pilih Kategori --</option>
                  <option value="dokter" <?= ($row['kategori'] ?? '') === 'dokter' ? 'selected' : '' ?>>Dokter</option>
                  <option value="bidan" <?= ($row['kategori'] ?? '') === 'bidan' ? 'selected' : '' ?>>Bidan</option>
                  <option value="perawat" <?= ($row['kategori'] ?? '') === 'perawat' ? 'selected' : '' ?>>Perawat</option>
                </select>
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label text-end">Telpon</label>
              <div class="col-sm-6">
                <input type="text" name="telpon" class="form-control" value="<?= $row['telpon'] ?? '' ?>">
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label text-end">Unit Kerja</label>
              <div class="col-sm-6">
                <select name="unit_kerja_id" class="form-control" required>
                  <option value="">-- Pilih Unit Kerja --</option>
                  <?php while ($uk = $result_unit_kerja->fetch_assoc()) : ?>
                    <option value="<?= $uk['id'] ?>" <?= ($uk['id'] == ($row['unit_kerja_id'] ?? '')) ? 'selected' : '' ?>>
                      <?= htmlspecialchars($uk['nama']) ?>
                    </option>
                  <?php endwhile; ?>
                </select>
              </div>
            </div>

            <div class="mb-4 row">
              <label class="col-sm-3 col-form-label text-end">Alamat</label>
              <div class="col-sm-6">
                <textarea name="alamat" class="form-control" rows="3"><?= $row['alamat'] ?? '' ?></textarea>
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
  </main>

  <!-- Footer -->
  <footer class="app-footer">
    <div class="float-end d-none d-sm-inline">Anything you want</div>
    <strong>&copy; 2014-2024 <a href="#" class="text-decoration-none">Enjum Jamaludin</a>.</strong> All rights reserved.
  </footer>
</div>

<?php include_once 'bottom.php'; ?>
