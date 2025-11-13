<?php
session_start();
require_once '../koneksi.php';
$conn = get_pg_connection();

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

$result = pg_query($conn, "SELECT * FROM ulasan_pendaki ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Selamat Datang, <?= htmlspecialchars($_SESSION['admin_name']) ?></h2>
    <a href="logout.php" class="btn btn-danger">Logout</a>
  </div>

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-semibold">Data Ulasan Pendaki</h3>
    <a href="create.php" class="btn btn-success">
      <i class="bi bi-plus-circle"></i> Tambah Ulasan
    </a>
  </div>

  <div class="table-responsive shadow-sm">
    <table class="table table-bordered table-striped align-middle text-center bg-white">
      <thead class="table-success">
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Asal</th>
          <th>Ulasan</th>
          <th>Foto</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = pg_fetch_assoc($result)): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['nama']) ?></td>
          <td><?= htmlspecialchars($row['asal']) ?></td>
          <td><?= htmlspecialchars($row['ulasan']) ?></td>
          <td>
            <img src="../<?= htmlspecialchars($row['foto'] ?: 'img/default.jpg') ?>" width="60" class="rounded">
          </td>
          <td>
            <div class="d-flex justify-content-center gap-2">
              <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm text-dark">Edit</a>
              <form action="delete.php" method="post" onsubmit="return confirm('Hapus data ini?')" style="display:inline">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
              </form>
            </div>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
