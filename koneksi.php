<?php
$host = "localhost"; 
$username = "root";
$password = "";
$database = "perpustakaan";

$koneksi = mysqli_connect($host, $username, $password, $database);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
