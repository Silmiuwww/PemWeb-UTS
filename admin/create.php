<?php
require __DIR__ . '/../koneksi.php';

$err = '';
$nama = $asal = $foto = $ulasan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama   = trim($_POST['nama'] ?? '');
    $asal   = trim($_POST['asal'] ?? '');
    $foto   = trim($_POST['foto'] ?? '');
    $ulasan = trim($_POST['ulasan'] ?? '');

    if ($nama === '' || $asal === '' || $ulasan === '') {
        $err = 'Nama, Asal, dan Ulasan wajib diisi.';
    } else {
        try {
            qparams(
                'INSERT INTO public.ulasan_pendaki (nama, asal, foto, ulasan) VALUES ($1, $2, NULLIF($3, \'\'), NULLIF($4, \'\'))',
                [$nama, $asal, $foto, $ulasan]
            );
            header('Location: dashboard.php');
            exit;
        } catch (Throwable $e) {
            $err = $e->getMessage();
        }
    }
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Tambah Ulasan Pendaki</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">

<div class="container py-5">
  <div class="card shadow-sm mx-auto" style="max-width: 600px;">
    <div class="card-body">
      <h3 class="card-title mb-4 text-center fw-semibold">Tambah Ulasan Pendaki</h3>

      <?php if ($err): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($err) ?></div>
      <?php endif; ?>

      <form method="post">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input id="nama" name="nama" type="text" class="form-control" value="<?= htmlspecialchars($nama) ?>" required>
        </div>

        <div class="mb-3">
          <label for="asal" class="form-label">Asal</label>
          <input id="asal" name="asal" type="text" class="form-control" value="<?= htmlspecialchars($asal) ?>" required>
        </div>

        <div class="mb-3">
          <label for="foto" class="form-label">Foto (opsional)</label>
          <input id="foto" name="foto" type="text" class="form-control" placeholder="img/namafoto.jpg" value="<?= htmlspecialchars($foto) ?>">
        </div>

        <div class="mb-3">
          <label for="ulasan" class="form-label">Ulasan</label>
          <textarea id="ulasan" name="ulasan" rows="4" class="form-control" required><?= htmlspecialchars($ulasan) ?></textarea>
        </div>

        <div class="d-flex justify-content-between">
          <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
