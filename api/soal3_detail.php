<?php
// Soal 3: Menampilkan semua data nama peminjam, judul buku, penulis, dan tanggal pinjam
header("Content-Type: application/json");
include __DIR__ . '/koneksi.php';

$data = array();

$query = mysqli_query($conn, "
    SELECT 
        p.nama_peminjam, 
        b.judul_buku, 
        b.penulis, 
        p.tanggal_pinjam 
    FROM peminjaman p 
    JOIN buku b ON p.buku_id = b.id
");

while($row = mysqli_fetch_assoc($query)){
    $data[] = $row;
}

echo json_encode($data, JSON_PRETTY_PRINT);
?>
