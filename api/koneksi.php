<?php
// Gunakan environment variables dari Vercel Dashboard
$host = getenv('DB_HOST') ?: "gateway01.ap-southeast-1.prod.aws.tidbcloud.com
";
$user = getenv('DB_USER') ?: "3R2XTKo8EgjMuvP.root
";
$pass = getenv('DB_PASS') ?: "g8Qy6ZoVrtbE72bI
";
$db   = getenv('DB_NAME') ?: "test";
$port = getenv('DB_PORT') ?: 4000;

// TiDB Cloud membutuhkan koneksi SSL
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);
mysqli_real_connect($conn, $host, $user, $pass, $db, $port, NULL, MYSQLI_CLIENT_SSL | MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
