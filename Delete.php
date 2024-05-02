<?php
// koneksi database
include'koneksi.php';

// Cek koneksi
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$id = $_GET['id'];

// Hapus data buku
$query = "DELETE FROM buku WHERE id = $id";
mysqli_query($koneksi, $query);

header("Location: read.php");
exit();

// Close
mysqli_close($koneksi);
?>
