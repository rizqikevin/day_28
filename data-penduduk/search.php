<?php
session_start();
require 'data.php';

$query = $_GET['query'] ?? '';
$residents = getResidents();
$filteredResidents = array_filter($residents, function($resident) use ($query) {
    return strpos(strtolower($resident['name']), strtolower($query)) !== false;
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian</title>
</head>
<body>
    <h1>Hasil Pencarian untuk "<?= htmlspecialchars($query); ?>"</h1>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Usia</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
        </tr>
        <?php foreach ($filteredResidents as $resident): ?>
            <tr>
                <td><?= htmlspecialchars($resident['name']); ?></td>
                <td><?= htmlspecialchars($resident['age']); ?></td>
                <td><?= htmlspecialchars($resident['address']); ?></td>
                <td><?= htmlspecialchars($resident['job']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php">Kembali</a>
</body>
</html>
