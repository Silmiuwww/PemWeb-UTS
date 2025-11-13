<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Beranda | Gunung Argopuro</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a2d9d6a1b2.js" crossorigin="anonymous"></script>
</head>
<body class="bg-white text-dark">

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

<!-- Hero Section -->
<section class="position-relative d-flex align-items-center justify-content-center text-center text-white" style="height:100vh;">
  <video autoplay muted loop playsinline class="position-absolute top-0 start-0 w-100 h-100" style="object-fit:cover; filter:brightness(65%); z-index:-1;">
    <source src="video/argopuro.mp4" type="video/mp4">
  </video>
  <div class="container">
    <h1 class="fw-bold display-4 text-white mb-3">Selamat Datang di Gunung Argopuro</h1>
    <h2 class="fw-normal fs-4 mb-4 text-white">Menjelajahi Jalur Pendakian Terpanjang di Pulau Jawa</h2>
    <a href="#about" class="btn btn-success btn-lg px-4 py-2"><i class="fa-solid fa-mountain me-2"></i> Tentang Argopuro</a>
  </div>
</section>

<!-- About Section -->
<section id="about" class="py-5 bg-white">
  <div class="container">
    <h2 class="text-center fw-bold text-success mb-5">Tentang Gunung Argopuro</h2>
    <div class="row align-items-center gy-4">
      <div class="col-lg-6">
        <p class="text-muted">Gunung Argopuro terletak di Jawa Timur, dikenal sebagai jalur pendakian terpanjang di Pulau Jawa dengan panjang rute mencapai lebih dari 40 km. Gunung ini memiliki pesona hutan, savana, dan legenda yang memikat.</p>
        <p class="text-muted">Pendaki akan melewati tempat ikonik seperti <strong>Danau Taman Hidup</strong> yang berkabut, <strong>Savana Cikasur</strong> bekas landasan Belanda, dan <strong>Puncak Rengganis</strong> yang sarat legenda.</p>
        <p class="text-muted">Dengan ketinggian 3.088 mdpl, Argopuro bukan hanya tempat petualangan, tapi juga perjalanan spiritual dan alam yang menenangkan.</p>
      </div>
      <div class="col-lg-6 text-center">
        <img src="img/argopuro.jpg" class="img-fluid rounded shadow-lg" alt="Pemandangan Gunung Argopuro">
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
  <p class="mb-0">&copy; 2025 Gunung Argopuro. Semua Hak Dilindungi.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
