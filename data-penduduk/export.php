<?php
require 'vendor/autoload.php';
session_start();
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Mendapatkan data penduduk
$residents = $_SESSION['residents'] ?? [];

// Buat Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set header kolom
$sheet->setCellValue('A1', 'Nama');
$sheet->setCellValue('B1', 'Usia');
$sheet->setCellValue('C1', 'Alamat');
$sheet->setCellValue('D1', 'Pekerjaan');

// Tambahkan data penduduk ke lembar kerja
$row = 2;
foreach ($residents as $resident) {
    $sheet->setCellValue('A' . $row, $resident['name']);
    $sheet->setCellValue('B' . $row, $resident['age']);
    $sheet->setCellValue('C' . $row, $resident['address']);
    $sheet->setCellValue('D' . $row, $resident['job']);
    $row++;
}

// Simpan ke file CSV
$writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);
$writer->save('data_penduduk.csv');

// Simpan ke file XLSX
$writerXlsx = new Xlsx($spreadsheet);
$writerXlsx->save('data_penduduk.xlsx');

echo "Data penduduk telah diekspor ke data_penduduk.csv dan data_penduduk.xlsx.";
