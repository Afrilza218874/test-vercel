<?php
// Soal 4: Menampilkan data nama peminjam, judul buku, penulis, dan tanggal pinjam berdasarkan tahun terbit
header("Content-Type: application/json");
include __DIR__ . '/koneksi.php';

$data = array();

$query = mysqli_query($conn, "
    SELECT 
        p.nama_peminjam, 
        b.judul_buku, 
        b.penulis, 
        p.tanggal_pinjam,
        b.tahun_terbit
    FROM peminjaman p 
    JOIN buku b ON p.buku_id = b.id
    ORDER BY b.tahun_terbit ASC
");

while($row = mysqli_fetch_assoc($query)){
    $data[] = $row;
}

echo json_encode($data, JSON_PRETTY_PRINT);
?>
