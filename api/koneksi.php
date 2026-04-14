<?php
// Gunakan environment variables dari Vercel Dashboard
$host = getenv('DB_HOST') ?: "localhost";
$user = getenv('DB_USER') ?: "root";
$pass = getenv('DB_PASS') ?: "";
$db   = getenv('DB_NAME') ?: "mahasiswa_db";
$port = getenv('DB_PORT') ?: 4000;

// TiDB Cloud membutuhkan koneksi SSL
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);
mysqli_real_connect($conn, $host, $user, $pass, $db, $port, NULL, MYSQLI_CLIENT_SSL | MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
