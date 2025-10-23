<?php
$conn = pg_connect("host=localhost port=5432 dbname=argopuro user=postgres password=bakmi1");

if (!$conn) {
    die("Koneksi ke database gagal: " . pg_last_error());
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <title>Destinasi | Gunung Argopuro</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/destinasi.css">
</head>
<body>
  
<header>
<nav>
  <div class="nav-logo">
    <img src="img/logo.png" alt="Logo Argopuro">
  </div>
  <div class="nav-links">
    <a href="index.php">Beranda</a>
    <a href="jalur.php">Jalur Pendakian</a>
    <a href="destinasi.php">Destinasi</a>
    <a href="packing.php">Perlengkapan</a>
  </div>
</nav>
</header>

<section class="content">
  <h2>Destinasi Utama</h2>
  <p>Tiga tempat paling ikonik yang wajib dikunjungi saat mendaki Gunung Argopuro.</p>

  <div class="dest-container">
    <div class="dest">
      <img src="img/taman-hidup.jpg" alt="Danau Taman Hidup">
      <h3>Danau Taman Hidup</h3>
      <p>Danau alami dengan suasana tenang dan kabut tipis di pagi hari.</p>
    </div>

    <div class="dest">
      <img src="img/cikasur.jpg" alt="Sabana Cikasur">
      <h3>Sabana Cikasur</h3>
      <p>Sabana luas di bekas landasan Belanda, tempat favorit berkemah.</p>
    </div>

    <div class="dest">
      <img src="img/rengganis.jpg" alt="Puncak Rengganis">
      <h3>Puncak Rengganis</h3>
      <p>Puncak legendaris yang dipercaya sebagai tempat bersemayam Dewi Rengganis.</p>
    </div>
  </div>
</section>

<section class="review-section">
  <h2 style="text-align:center; color:#A0C878; font-size:2rem; font-weight:bold;">Ulasan Pendaki</h2>

  <div class="review-container">
    <?php
    $result = pg_query($conn, "SELECT * FROM ulasan_pendaki");
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            echo '
            <div class="review-card">
                <img src="' . $row['foto'] . '" alt="' . $row['nama'] . '">
                <p>"' . $row['ulasan'] . '"</p>
                <p><strong>– ' . $row['nama'] . ', ' . $row['asal'] . '</strong></p>
            </div>';
        }
    } else {
        echo "<p>Tidak ada data ulasan pendaki.</p>";
    }
    ?>
  </div>
</section>

<div id="footer-container"></div>
<script src="js/footer.js"></script>

<?php
pg_close($conn);
?>
</body>
</html>
