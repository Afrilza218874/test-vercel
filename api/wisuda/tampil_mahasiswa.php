<?php
require_once __DIR__ . '/koneksi.php';

$sql = "SELECT * FROM tabel_mahasiswa ORDER BY id_mahasiswa ASC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa - Wisuda</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            padding: 30px;
            color: #333;
        }
        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #1a1a2e;
            font-size: 24px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            padding: 20px 25px;
        }
        .header h1 {
            color: #fff;
            margin: 0;
            font-size: 22px;
            text-align: left;
        }
        .header p {
            margin-top: 5px;
            opacity: 0.85;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        thead th {
            background: #f8f9fa;
            padding: 12px 15px;
            text-align: left;
            font-weight: 600;
            color: #555;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e9ecef;
        }
        tbody td {
            padding: 12px 15px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 14px;
        }
        tbody tr:hover {
            background: #f8f9ff;
        }
        tbody tr:last-child td {
            border-bottom: none;
        }
        .badge-ipk {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 13px;
            background: #d4edda;
            color: #155724;
        }
        .footer {
            padding: 15px 25px;
            background: #f8f9fa;
            text-align: center;
            font-size: 13px;
            color: #888;
            border-top: 1px solid #e9ecef;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📋 Data Mahasiswa</h1>
            <p>Sistem Pendaftaran Wisuda</p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Program Studi</th>
                    <th>IPK</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$no}</td>";
                        echo "<td>{$row['nim']}</td>";
                        echo "<td>{$row['nama_mahasiswa']}</td>";
                        echo "<td>{$row['prodi']}</td>";
                        echo "<td><span class='badge-ipk'>{$row['ipk']}</span></td>";
                        echo "</tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='5' style='text-align:center; padding:30px; color:#888;'>Belum ada data mahasiswa</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="footer">
            Total: <?php echo $result ? mysqli_num_rows($result) : 0; ?> mahasiswa
        </div>
    </div>
</body>
</html>
<?php mysqli_close($conn); ?>
