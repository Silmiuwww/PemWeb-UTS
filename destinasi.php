<?php
session_start();
require_once 'koneksi.php';
$conn = get_pg_connection();
$result = pg_query($conn, "SELECT * FROM ulasan_pendaki ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Destinasi | Gunung Argopuro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">

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

<section class="pt-5 mt-5 text-center">
  <div class="container py-4">
    <h2 class="fw-bold text-success mb-3">Destinasi Utama</h2>
    <p class="text-muted mb-5">Tiga tempat paling ikonik yang wajib dikunjungi saat mendaki Gunung Argopuro.</p>

    <div class="row justify-content-center g-4">
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <img src="img/taman-hidup.jpg" class="card-img-top rounded-top" alt="Danau Taman Hidup" style="height: 280px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title text-success fw-semibold">Danau Taman Hidup</h5>
            <p class="card-text text-muted">Danau alami dengan suasana tenang dan kabut tipis di pagi hari.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <img src="img/cikasur.jpg" class="card-img-top rounded-top" alt="Sabana Cikasur" style="height: 280px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title text-success fw-semibold">Sabana Cikasur</h5>
            <p class="card-text text-muted">Sabana luas di bekas landasan Belanda, tempat favorit berkemah.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <img src="img/rengganis.jpg" class="card-img-top rounded-top" alt="Puncak Rengganis" style="height: 280px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title text-success fw-semibold">Puncak Rengganis</h5>
            <p class="card-text text-muted">Puncak legendaris yang dipercaya sebagai tempat bersemayam Dewi Rengganis.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5 bg-white">
  <div class="container text-center">
    <h2 class="fw-bold text-success mb-4">Ulasan Pendaki</h2>

    <?php if (isset($_SESSION['user_id'])): ?>
      <a href="create.php" class="btn btn-success mb-4">+ Tambah Ulasan</a>
    <?php else: ?>
      <a href="login.php" class="btn btn-success mb-4">Login untuk Tambah Ulasan</a>
    <?php endif; ?>

    <div class="row justify-content-center g-4">
      <?php while ($row = pg_fetch_assoc($result)): ?>
        <div class="col-md-4 col-sm-6">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
              <img src="<?= htmlspecialchars($row['foto'] ?: 'img/default.jpg') ?>" 
                   alt="<?= htmlspecialchars($row['nama']) ?>" 
                   class="rounded-circle mb-3" width="80" height="80" style="object-fit:cover;">
              <blockquote class="blockquote mb-2">“<?= htmlspecialchars($row['ulasan']) ?>”</blockquote>
              <footer class="blockquote-footer" style="margin-top: -5px;"><?= htmlspecialchars($row['nama']) ?>, <?= htmlspecialchars($row['asal']) ?></footer>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>

<footer class="bg-dark text-center text-light py-3 small">
  <div>© 2025 Gunung Argopuro | Semua hak cipta dilindungi</div>
</footer>

</body>
</html>
