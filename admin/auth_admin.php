<?php
session_start();
require_once '../koneksi.php';
$conn = get_pg_connection();

$username = $_POST['username'];
$password = $_POST['password'];

// Ambil data admin berdasarkan username
$query = "SELECT * FROM admin WHERE username = $1";
$result = pg_query_params($conn, $query, [$username]);
$admin = pg_fetch_assoc($result);

if ($admin && md5($password) === $admin['password']) {
    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['admin_name'] = $admin['username'];
    header('Location: dashboard.php');
    exit;
} else {
    header('Location: login.php?error=Username atau password salah');
    exit;
}
