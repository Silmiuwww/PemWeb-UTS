<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Perlengkapan | Gunung Argopuro</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a2e0bf0f5a.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top bg-white bg-opacity-75 shadow-sm py-2">
  <div class="container d-flex justify-content-between align-items-center">
    <a class="navbar-brand" href="beranda.php">
      <img src="img/logo.png" alt="Logo Argopuro" class="me-2" style="height:50px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav fw-semibold">
        <li class="nav-item"><a class="nav-link text-success active" href="beranda.php">Beranda</a></li>
        <li class="nav-item"><a class="nav-link text-success" href="jalur.php">Jalur</a></li>
        <li class="nav-item"><a class="nav-link text-success" href="destinasi.php">Destinasi</a></li>
        <li class="nav-item"><a class="nav-link text-success" href="packing.php">Perlengkapan</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
          <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link text-success" href="login.php">Login</a></li>
        <?php endif; ?>
        <li class="nav-item"><a class="nav-link text-success" href="admin/login.php">Admin</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Konten -->
<section class="container text-center py-5 mt-5">
  <h2 class="text-success fw-bold mb-3">Checklist Pendakian Argopuro</h2>
  <p class="text-muted mb-5">Susun perlengkapan berdasarkan tahap pendakianmu.</p>

  <div class="position-relative mx-auto" style="max-width:800px;">
    <div class="border-start border-3 border-success position-absolute top-0 start-50 translate-middle-x" style="height:100%;"></div>

    <!-- Item kiri -->
    <div class="row mb-5">
      <div class="col-md-6 text-md-end pe-md-4">
        <div class="card shadow-sm border-0 text-start d-inline-block">
          <div class="card-body">
            <h5 class="text-success fw-semibold">Sebelum Berangkat</h5>
            <ul class="list-unstyled mb-0 text-muted small">
              <li><i class="fa-solid fa-check text-success me-2"></i>Cek cuaca & izin pendakian</li>
              <li><i class="fa-solid fa-check text-success me-2"></i>Siapkan logistik</li>
              <li><i class="fa-solid fa-check text-success me-2"></i>Isi ulang baterai & powerbank</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-6"></div>
    </div>

    <!-- Item kanan -->
    <div class="row mb-5">
      <div class="col-md-6"></div>
      <div class="col-md-6 text-md-start ps-md-4">
        <div class="card shadow-sm border-0 text-start d-inline-block">
          <div class="card-body">
            <h5 class="text-success fw-semibold">Saat Pendakian</h5>
            <ul class="list-unstyled mb-0 text-muted small">
              <li><i class="fa-solid fa-check text-success me-2"></i>Bawa air & makanan ringan</li>
              <li><i class="fa-solid fa-check text-success me-2"></i>Pakai pakaian berlapis</li>
              <li><i class="fa-solid fa-check text-success me-2"></i>Gunakan trekking pole</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Item kiri lagi -->
    <div class="row mb-5">
      <div class="col-md-6 text-md-end pe-md-4">
        <div class="card shadow-sm border-0 text-start d-inline-block">
          <div class="card-body">
            <h5 class="text-success fw-semibold">Setelah Pendakian</h5>
            <ul class="list-unstyled mb-0 text-muted small">
              <li><i class="fa-solid fa-check text-success me-2"></i>Jaga kebersihan area</li>
              <li><i class="fa-solid fa-check text-success me-2"></i>Sortir barang bawaan</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-6"></div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-light text-center py-3 mt-5">
  <p class="mb-0 small">&copy; 2025 Gunung Argopuro. Semua hak dilindungi.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
