<?php
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM mahasiswa");

while ($data = mysqli_fetch_array($query)) {
    echo $data['nama'] . " - " . $data['nim'] . "<br>";
}
?>
