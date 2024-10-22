<?php
require 'data.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penduduk</title>
</head>
<body>
    <h1>Data Penduduk</h1>

    <form method="POST" action="data.php">
        <input type="text" name="name" placeholder="Nama" required>
        <input type="number" name="age" placeholder="Usia" required>
        <input type="text" name="address" placeholder="Alamat" required>
        <input type="text" name="job" placeholder="Pekerjaan" required>
        <button type="submit">Tambah Penduduk</button>
    </form>

    <h2>Daftar Penduduk</h2>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Usia</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
        </tr>
        <?php foreach (getResidents() as $resident): ?>
            <tr>
                <td><?= htmlspecialchars($resident['name']); ?></td>
                <td><?= htmlspecialchars($resident['age']); ?></td>
                <td><?= htmlspecialchars($resident['address']); ?></td>
                <td><?= htmlspecialchars($resident['job']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <form method="GET" action="search.php">
        <input type="text" name="query" placeholder="Cari penduduk...">
        <button type="submit">Cari</button>
    </form>

    <h2>Ekspor Data</h2>
    <a href="export.php">Ekspor ke CSV</a>
</body>
</html>
