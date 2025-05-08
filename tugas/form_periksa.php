<?php
include_once 'top.php';
require_once 'dbkoneksi.php';

// Ambil ID dari URL (jika ada)
$_id = $_GET['id'] ?? '';
$row = [];
$tombol = 'Simpan';

if ($_id) {
    $sql = "SELECT * FROM periksa WHERE id = ?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();
    $tombol = 'Ubah';
}

// Ambil data pasien dan dokter
$query_pasien = "SELECT id, nama FROM pasien";
$query_dokter = "SELECT id, nama FROM paramedik";

$pasien_stmt = $dbh->query($query_pasien);
$dokter_stmt = $dbh->query($query_dokter);
?>

<!--begin::App Wrapper-->
<div class="app-wrapper">
  <!--begin::Header-->
  <nav class="app-header navbar navbar-expand bg-body">
    <?php include_once 'menu.php'; ?>
  </nav>
  <!--end::Header-->

  <!--begin::Sidebar-->
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
  <!--end::Sidebar-->

  <!--begin::App Main-->
  <main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6"><h3 class="mb-0"><?= $tombol ?> Pemeriksaan</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Form Pemeriksaan</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
      <div class="card shadow-sm">
        <!-- Apply bg-primary class here to make the background blue -->
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0"><?= $tombol ?> Data Pemeriksaan Pasien</h5>
        </div>
        <form action="proses_periksa.php" method="POST">
          <div class="card-body">

            <!-- Hidden input for ID -->
            <input type="hidden" name="id" value="<?= htmlspecialchars($row['id'] ?? '') ?>">

            <!-- Patient Selection -->
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label text-end">Nama Pasien</label>
              <div class="col-sm-6">
                <select name="pasien_id" class="form-select" required>
                  <option value="">-- Pilih Pasien --</option>
                  <?php while ($pasien = $pasien_stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <option value="<?= $pasien['id'] ?>" <?= ($pasien['id'] == ($row['pasien_id'] ?? '')) ? 'selected' : '' ?>>
                      <?= htmlspecialchars($pasien['nama']) ?>
                    </option>
                  <?php endwhile; ?>
                </select>
              </div>
            </div>

            <!-- Doctor Selection -->
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label text-end">Dokter</label>
              <div class="col-sm-6">
                <select name="dokter_id" class="form-select" required>
                  <option value="">-- Pilih Dokter --</option>
                  <?php while ($dokter = $dokter_stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <option value="<?= $dokter['id'] ?>" <?= ($dokter['id'] == ($row['dokter_id'] ?? '')) ? 'selected' : '' ?>>
                      <?= htmlspecialchars($dokter['nama']) ?>
                    </option>
                  <?php endwhile; ?>
                </select>
              </div>
            </div>

            <!-- Date of Checkup -->
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label text-end">Tanggal</label>
              <div class="col-sm-6">
                <input type="date" name="tanggal" class="form-control" value="<?= htmlspecialchars($row['tanggal'] ?? '') ?>" required>
              </div>
            </div>

            <!-- Weight (kg) -->
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label text-end">Berat Badan (kg)</label>
              <div class="col-sm-6">
                <input type="number" step="any" name="berat" class="form-control" value="<?= htmlspecialchars($row['berat'] ?? '') ?>" placeholder="Contoh: 60.5">
              </div>
            </div>

            <!-- Height (cm) -->
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label text-end">Tinggi Badan (cm)</label>
              <div class="col-sm-6">
                <input type="number" step="any" name="tinggi" class="form-control" value="<?= htmlspecialchars($row['tinggi'] ?? '') ?>" placeholder="Contoh: 170">
              </div>
            </div>

            <!-- Blood Pressure (Tensi) -->
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label text-end">Tensi</label>
              <div class="col-sm-6">
                <input type="text" name="tensi" class="form-control" value="<?= htmlspecialchars($row['tensi'] ?? '') ?>" placeholder="Contoh: 120/80">
              </div>
            </div>

            <!-- Remarks (Keterangan) -->
            <div class="mb-4 row">
              <label class="col-sm-3 col-form-label text-end">Keterangan</label>
              <div class="col-sm-6">
                <textarea name="keterangan" class="form-control" rows="3"><?= htmlspecialchars($row['keterangan'] ?? '') ?></textarea>
              </div>
            </div>

          </div>

          <!-- Submit and Cancel Buttons -->
          <div class="card-footer text-end">
          <button type="submit" name="proses" value="<?= $tombol ?>" class="btn btn-primary me-2"><?= $tombol ?></button>
          <button type="reset" class="btn btn-secondary">Batal</button>
         
          </div>
        </form>
      </div>
    </div>
    <!--end::App Content-->
  </main>
  <!--end::App Main-->

  <!--begin::Footer-->
  <footer class="app-footer">
    <div class="float-end d-none d-sm-inline">Anything you want</div>
    <strong>&copy; 2014-2024 <a href="#" class="text-decoration-none">Enjum Jamaludin</a>.</strong> All rights reserved.
  </footer>
  <!--end::Footer-->
</div>

<?php include_once 'bottom.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
