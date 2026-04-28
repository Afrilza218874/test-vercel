<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        body{
            font-family: Arial;
            background:#f4f4f4;
            padding:20px;
        }

        table{
            width:100%;
            border-collapse: collapse;
            background:white;
        }

        th, td{
            padding:10px;
            border:1px solid #ddd;
            text-align:left;
        }

        th{
            background:#007bff;
            color:white;
        }

        h2{
            color:#333;
        }
    </style>
</head>
<body>

<h2>Data Mahasiswa</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
        </tr>
    </thead>
    <tbody id="hasil"></tbody>
</table>

<script>
fetch('api_mahasiswa.php')
.then(response => response.json())
.then(data => {
    let output = "";

    data.forEach(item => {
        output += `
            <tr>
                <td>${item.id}</td>
                <td>${item.nama}</td>
                <td>${item.nim}</td>
                <td>${item.jurusan}</td>
            </tr>
        `;
    });

    document.getElementById("hasil").innerHTML = output;
});
</script>

</body>
</html>
