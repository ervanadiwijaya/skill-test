<?php

include 'koneksi.php';

$jumlah = mysqli_query($host, "SELECT SUM(quantity) AS tot_quantity FROM transaksi");
$resultJumlah = mysqli_fetch_assoc($jumlah);
$dataJumlah = $resultJumlah['tot_quantity'];

$laporan = mysqli_query($host, "SELECT * FROM laporan WHERE total_quantity=$dataJumlah") or die(mysqli_error($host));
$resultLaporan = mysqli_fetch_assoc($laporan);


$transaksi = mysqli_query($host, "SELECT * FROM transaksi");
$total_biaya = 0;

while ($item = mysqli_fetch_assoc($transaksi)) {
    $total_biaya = $resultLaporan['omset'] / $resultLaporan['total_quantity'] * $item['quantity'];
    $nama = $item['nama_pelanggan'];
    $date = $resultLaporan['tanggal'];
    $query = mysqli_query($host, "INSERT INTO total_belanja(nama_pelanggan, tanggal, total_belanja) VALUES ('$nama', '$date', $total_biaya)") or die(mysqli_error($host));
}

header("location:index.php");
