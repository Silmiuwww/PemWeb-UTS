<?php
// register.php
session_start();

// jika sudah login, redirect ke dashboard
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}

// buat CSRF token sederhana jika belum ada
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// ambil pesan error/sukses dari query string (opsional)
$error = isset($_GET['error']) ? $_GET['error'] : '';
$success = isset($_GET['success']) ? $_GET['success'] : '';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Daftar Akun</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card shadow-lg border-0">
          <div class="card-body p-4">
            <h2 class="text-center text-primary mb-4 fw-bold">Buat Akun Baru</h2>

            <?php if ($error): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($error) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>

            <?php if ($success): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($success) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>

            <form action="register_process.php" method="post" autocomplete="off" novalidate>
              <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">

              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input id="username" name="username" type="text" class="form-control" required minlength="3" maxlength="100" placeholder="Masukkan username">
              </div>

              <div class="mb-3">
                <label for="full_name" class="form-label">Nama Lengkap</label>
                <input id="full_name" name="full_name" type="text" class="form-control" maxlength="200" placeholder="Masukkan nama lengkap">
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" name="password" type="password" class="form-control" required minlength="6" placeholder="Minimal 6 karakter">
              </div>

              <div class="mb-3">
                <label for="password_confirm" class="form-label">Konfirmasi Password</label>
                <input id="password_confirm" name="password_confirm" type="password" class="form-control" required minlength="6" placeholder="Ulangi password">
              </div>

              <div class="form-text mb-3 text-muted">Minimal 6 karakter untuk password.</div>

              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Daftar</button>
                <a href="login.php" class="btn btn-outline-secondary">Kembali ke Login</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
