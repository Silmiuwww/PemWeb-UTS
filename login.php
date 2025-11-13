<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: destinasi.php');
    exit;
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">
        <div class="card shadow border-0">
          <div class="card-body p-4">
            <h2 class="text-center text-success mb-4 fw-bold">Masuk</h2>

            <?php if (!empty($_GET['error'])): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_GET['error']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>

            <form action="authenticate.php" method="post" autocomplete="off">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input id="username" name="username" type="text" class="form-control" required autofocus placeholder="Masukkan username">
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" name="password" type="password" class="form-control" required placeholder="Masukkan password">
              </div>

              <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-success">Login</button>
                <a href="register.php" class="btn btn-outline-success">Register</a>
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
