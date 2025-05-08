<?php
include_once 'top.php';
// Koneksi database
require_once 'dbkoneksi.php';

// Ambil data pasien
$rows = $dbh->query("SELECT * FROM pasien")->fetchAll(PDO::FETCH_ASSOC);
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
      <a href="./index.html" class="brand-link">
        <img src="./dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
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
          <div class="col-sm-6"><h3 class="mb-0">Data Pasien</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Pasien</li>
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
              <h5 class="mb-0">Daftar Pasien</h5>
              <a href="form_pasien.php" class="btn btn-success">
                <i class="bi bi-person-plus-fill"></i> Tambah Pasien
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-striped align-middle text-center">
                  <thead class="table-dark">
                    <tr>
                      <th style="width: 5%;">No</th>
                      <th style="width: 10%;">Kode</th>
                      <th>Nama Pasien</th>
                      <th>Alamat</th>
                      <th>Email</th>
                      <th style="width: 15%;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach ($rows as $row): 
                    ?>
                    <tr>
                      <td><span class="badge bg-primary"><?= $no++; ?></span></td>
                      <td><strong><?= htmlspecialchars($row['kode']); ?></strong></td>
                      <td><?= htmlspecialchars($row['nama']); ?></td>
                      <td><?= htmlspecialchars($row['alamat']); ?></td>
                      <td><a href="mailto:<?= $row['email'] ?>" class="text-decoration-none"><?= htmlspecialchars($row['email']); ?></a></td>
                      <td>
                        <a href="form_pasien.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-warning me-1" title="Edit">
                          <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="proses_pasien.php?proses=Hapus&idx=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus?')">
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
    <!--end::App Content-->
  </main>
  <!--end::App Main-->

  <!--begin::Footer-->
  <footer class="app-footer">
    <div class="float-end d-none d-sm-inline">Anything you want</div>
    <strong>&copy; 2014-2024 <a href="#" class="text-decoration-none">Enjum Jamaludin</a>.</strong> All rights reserved.
  </footer>
  <!--end::Footer-->

<?php include 'bottom.php'; ?>
