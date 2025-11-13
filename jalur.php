<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Jalur Pendakian | Gunung Argopuro</title>
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

<!-- Isi Halaman -->
<section class="container text-center py-5 mt-5">
  <h2 class="text-success fw-bold mb-3">Jalur Pendakian</h2>
  <p class="text-muted mb-5">Kenali tiga jalur utama menuju puncak Argopuro yang terkenal dengan panjang lintasan dan keindahan alamnya.</p>

  <div class="row g-4 justify-content-center">
    <div class="col-md-4">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body">
          <h5 class="card-title text-success">Jalur Baderan (Situbondo)</h5>
          <p class="card-text text-muted">Rute klasik melewati Savana Cikasur dan Puncak Rengganis.</p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body">
          <h5 class="card-title text-success">Jalur Bremi (Probolinggo)</h5>
          <p class="card-text text-muted">Rute populer untuk pendaki yang ingin turun dari arah barat.</p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body">
          <h5 class="card-title text-success">Rute Gabungan</h5>
          <p class="card-text text-muted">Rute lintas jalur dari Baderan menuju Bremi — favorit para petualang sejati.</p>
        </div>
      </div>
    </div>
  </div>

  <h3 class="fw-semibold text-success mt-5 mb-3">Peta Jalur Pendakian</h3>
  <div class="ratio ratio-16x9">
    <iframe src="peta-jalur-pendakian-gunung-argopuro.pdf" title="Peta Jalur" allowfullscreen></iframe>
  </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-light text-center py-3 mt-5">
  <p class="mb-0 small">&copy; 2025 Gunung Argopuro. Semua hak dilindungi.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
