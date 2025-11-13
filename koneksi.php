<?php
// koneksi.php
// Pastikan ekstensi pgsql aktif di php.ini

function get_pg_connection(): PgSql\Connection {
    static $conn = null;
    if ($conn instanceof PgSql\Connection) {
        return $conn;
    }

    // 🔧 Ubah sesuai database kamu
    $connStr = "host=localhost port=5432 dbname=argopuro user=postgres password=bakmi1 options='--client_encoding=UTF8'";
    $conn = @pg_connect($connStr);

    if (!$conn) {
        // Jangan panggil pg_last_error() kalau koneksi gagal
        throw new RuntimeException("Koneksi PostgreSQL gagal. Periksa host, port, nama database, user, dan password di koneksi.php");
    }

    return $conn;
}

/** Helper sederhana untuk aman menjalankan query dengan parameter */
function qparams(string $sql, array $params) {
    $conn = get_pg_connection();
    $res = @pg_query_params($conn, $sql, $params);
    if ($res === false) {
        throw new RuntimeException("Query gagal: " . pg_last_error($conn));
    }
    return $res;
}

function q(string $sql) {
    $conn = get_pg_connection();
    $res = @pg_query($conn, $sql);
    if ($res === false) {
        throw new RuntimeException("Query gagal: " . pg_last_error($conn));
    }
    return $res;
}
