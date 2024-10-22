<?php
session_start();

// Simpan data penduduk
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $job = $_POST['job'];

    $newResident = [
        'name' => $name,
        'age' => $age,
        'address' => $address,
        'job' => $job,
    ];

    // Simpan ke session
    $_SESSION['residents'][] = $newResident;
}

// Fungsi untuk mendapatkan semua penduduk
function getResidents()
{
    return $_SESSION['residents'] ?? [];
}
?>
