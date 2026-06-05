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
            margin: 0;
            font-size: 22px;
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
        .loading {
            text-align: center;
            padding: 40px;
            color: #888;
            font-size: 15px;
        }
        .error {
            text-align: center;
            padding: 40px;
            color: #dc3545;
            font-size: 15px;
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
            <tbody id="tabel-body">
                <tr>
                    <td colspan="5" class="loading">⏳ Memuat data dari API...</td>
                </tr>
            </tbody>
        </table>
        <div class="footer" id="footer">
            Memuat...
        </div>
    </div>

    <script>
        const API_URL = "https://test-vercel-six-tau.vercel.app/wisuda/api_mahasiswa.php";

        fetch(API_URL)
            .then(response => response.json())
            .then(data => {
                const tbody = document.getElementById("tabel-body");
                const footer = document.getElementById("footer");

                if (data.status === "success" && data.data.length > 0) {
                    let html = "";
                    data.data.forEach((mhs, index) => {
                        html += `<tr>
                            <td>${index + 1}</td>
                            <td>${mhs.nim}</td>
                            <td>${mhs.nama_mahasiswa}</td>
                            <td>${mhs.prodi}</td>
                            <td><span class="badge-ipk">${mhs.ipk}</span></td>
                        </tr>`;
                    });
                    tbody.innerHTML = html;
                    footer.textContent = `Total: ${data.jumlah} mahasiswa`;
                } else {
                    tbody.innerHTML = `<tr><td colspan="5" class="loading">Belum ada data mahasiswa</td></tr>`;
                    footer.textContent = "Total: 0 mahasiswa";
                }
            })
            .catch(error => {
                document.getElementById("tabel-body").innerHTML =
                    `<tr><td colspan="5" class="error">❌ Gagal memuat data: ${error.message}</td></tr>`;
                document.getElementById("footer").textContent = "Error";
            });
    </script>
</body>
</html>
