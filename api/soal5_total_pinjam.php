<?php
// Soal 5: Menampilkan total jumlah setiap judul buku yang dipinjam dari tanggal 01-07 Mei 2026
header("Content-Type: application/json");
include __DIR__ . '/koneksi.php';

$data = array();

$query = mysqli_query($conn, "
    SELECT 
        b.judul_buku, 
        COUNT(p.id) AS total_dipinjam
    FROM peminjaman p 
    JOIN buku b ON p.buku_id = b.id
    WHERE p.tanggal_pinjam BETWEEN '2026-05-01' AND '2026-05-07'
    GROUP BY b.judul_buku
");

while($row = mysqli_fetch_assoc($query)){
    $data[] = $row;
}

echo json_encode($data, JSON_PRETTY_PRINT);
?>
