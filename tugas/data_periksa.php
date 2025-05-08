<?php
include_once 'top.php';
require_once 'dbkoneksi.php';

$rows = $dbh->query("
    SELECT 
        periksa.*, 
        pasien.nama AS nama_pasien, 
        paramedik.nama AS nama_dokter
    FROM periksa
    JOIN pasien ON periksa.pasien_id = pasien.id
    JOIN paramedik ON periksa.dokter_id = paramedik.id
")->fetchAll(PDO::FETCH_ASSOC);
?>

<!--begin::App Wrapper-->
<div class="app-wrapper">

  <!--begin::Header-->
  <nav class="app-header navbar navbar-expand bg-body">
    <?php include_once 'menu.php'; ?>
  </nav>

  <!--begin::Sidebar-->
  <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
      <a href="./index.html" class="brand-link">
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
          <div class="col-sm-6"><h3 class="mb-0">Data Pemeriksaan Pasien</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Periksa</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
      <div class="row">
        <div class="col-md-12">
          <div class="card mb-4 shadow-sm">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Riwayat Pemeriksaan</h5>
              <a href="form_periksa.php" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Tambah Pemeriksaan
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-striped align-middle text-center">
                  <thead class="table-dark">
                    <tr>
                      <th>No</th>
                      <th>Pasien</th>
                      <th>Dokter</th>
                      <th>Tanggal</th>
                      <th>Berat (kg)</th>
                      <th>Tinggi (cm)</th>
                      <th>Tensi</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach ($rows as $row): 
                    ?>
                      <tr>
                        <td><span class="badge bg-primary"><?= $no++; ?></span></td>
                        <td><?= htmlspecialchars($row['nama_pasien']); ?></td>
                        <td><?= htmlspecialchars($row['nama_dokter']); ?></td>
                        <td><?= htmlspecialchars($row['tanggal']); ?></td>
                        <td><?= htmlspecialchars($row['berat']); ?></td>
                        <td><?= htmlspecialchars($row['tinggi']); ?></td>
                        <td><?= htmlspecialchars($row['tensi']); ?></td>
                        <td><?= htmlspecialchars($row['keterangan']); ?></td>
                        <td>
                          <a href="form_periksa.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-warning me-1" title="Edit">
                            <i class="bi bi-pencil-square"></i>
                          </a>
                          <a href="proses_periksa.php?proses=Hapus&idx=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">
                            <i class="bi bi-trash"></i>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>
  <!--end::App Main-->

  <!--begin::Footer-->
  <footer class="app-footer">
    <div class="float-end d-none d-sm-inline">Anything you want</div>
    <strong>&copy; 2014-2024 <a href="#" class="text-decoration-none">Enjum Jamaludin</a>.</strong> All rights reserved.
  </footer>
</div>

<?php include_once 'bottom.php'; ?>
