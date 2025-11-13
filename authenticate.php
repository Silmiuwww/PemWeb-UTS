<?php
session_start();
require_once 'koneksi.php';
$conn = get_pg_connection();

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username = $1";
$result = pg_query_params($conn, $query, [$username]);
$user = pg_fetch_assoc($result);

if ($user && password_verify($password, $user['password_hash'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header('Location: destinasi.php');
    exit;
} else {
    header('Location: login.php?error=Username atau password salah');
    exit;
}
