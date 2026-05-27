<?php
// Soal 4: Menampilkan data nama peminjam, judul buku, penulis, dan tanggal pinjam berdasarkan tahun terbit
header("Content-Type: application/json");
include __DIR__ . '/koneksi.php';

$data = array();

// Ambil parameter 'tahun' jika ada
$tahun = isset($_GET['tahun']) ? mysqli_real_escape_string($conn, $_GET['tahun']) : '';

if (!empty($tahun)) {
    // Jika parameter tahun ditentukan, ambil data spesifik untuk tahun tersebut
    $query = mysqli_query($conn, "
        SELECT 
            p.nama_peminjam, 
            b.judul_buku, 
            b.penulis, 
            p.tanggal_pinjam,
            b.tahun_terbit
        FROM peminjaman p 
        JOIN buku b ON p.buku_id = b.id
        WHERE b.tahun_terbit = '$tahun'
        ORDER BY p.tanggal_pinjam ASC
    ");
    
    while($row = mysqli_fetch_assoc($query)){
        $data[] = $row;
    }
} else {
    // Jika parameter tahun tidak ditentukan, kelompokkan seluruh data berdasarkan tahun terbit
    $query = mysqli_query($conn, "
        SELECT 
            p.nama_peminjam, 
            b.judul_buku, 
            b.penulis, 
            p.tanggal_pinjam,
            b.tahun_terbit
        FROM peminjaman p 
        JOIN buku b ON p.buku_id = b.id
        ORDER BY b.tahun_terbit ASC, p.tanggal_pinjam ASC
    ");
    
    while($row = mysqli_fetch_assoc($query)){
        $tahun_buku = $row['tahun_terbit'];
        $data[$tahun_buku][] = array(
            'nama_peminjam' => $row['nama_peminjam'],
            'judul_buku' => $row['judul_buku'],
            'penulis' => $row['penulis'],
            'tanggal_pinjam' => $row['tanggal_pinjam']
        );
    }
}

echo json_encode($data, JSON_PRETTY_PRINT);
?>