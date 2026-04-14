<?php
include __DIR__ . '/koneksi.php';

// Header HTML agar tampilan lebih rapi
echo "<!DOCTYPE html>";
echo "<html lang='id'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Data Mahasiswa</title>";
echo "<style>";
echo "body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 20px; background: #f5f5f5; }";
echo "h1 { color: #333; border-bottom: 2px solid #4CAF50; padding-bottom: 10px; }";
echo "table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-radius: 8px; overflow: hidden; }";
echo "th { background: #4CAF50; color: white; padding: 12px 15px; text-align: left; }";
echo "td { padding: 10px 15px; border-bottom: 1px solid #eee; }";
echo "tr:hover { background: #f0f0f0; }";
echo ".empty { text-align: center; padding: 40px; color: #999; }";
echo "</style>";
echo "</head>";
echo "<body>";
echo "<h1>📋 Data Mahasiswa</h1>";

$query = mysqli_query($conn, "SELECT * FROM mahasiswa");

if ($query && mysqli_num_rows($query) > 0) {
    echo "<table>";
    echo "<tr><th>No</th><th>Nama</th><th>NIM</th><th>Jurusan</th></tr>";
    $no = 1;
    while ($data = mysqli_fetch_array($query)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . htmlspecialchars($data['nama']) . "</td>";
        echo "<td>" . htmlspecialchars($data['nim']) . "</td>";
        echo "<td>" . htmlspecialchars($data['jurusan']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<div class='empty'>Belum ada data mahasiswa.</div>";
}

echo "</body></html>";

mysqli_close($conn);
?>
