<?php
// Soal 1: Menampilkan semua data buku
header("Content-Type: application/json");
include __DIR__ . '/koneksi.php';

$data = array();

$query = mysqli_query($conn, "SELECT * FROM buku");

while($row = mysqli_fetch_assoc($query)){
    $data[] = $row;
}

echo json_encode($data, JSON_PRETTY_PRINT);
?>
