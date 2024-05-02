<?php
// Include koneksi ke database
include 'koneksi.php';

// Inisialisasi variabel untuk menyimpan pesan error
$error = '';

// Proses form jika ada pengiriman data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tgl_terbit = $_POST['tgl_terbit'];
    $sinopsis = $_POST['sinopsis'];

    // Validasi data (bisa ditambahkan sesuai kebutuhan)
    if (empty($judul) || empty($penulis) || empty($penerbit) || empty($tgl_terbit) || empty($sinopsis)) {
        $error = "Semua kolom harus diisi";
    } else {
        // Query untuk menyimpan data ke database
        $query = "INSERT INTO buku (judul, penulis, penerbit, tgl_terbit, sinopsis) VALUES ('$judul', '$penulis', '$penerbit', '$tgl_terbit', '$sinopsis')";
        $result = mysqli_query($koneksi, $query);

        // Redirect ke halaman daftar data setelah penyimpanan data berhasil
        if ($result) {
            header("Location: read.php");
            exit();
        } else {
            $error = "Gagal menyimpan data. Silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Data Buku</title>
    <link rel="stylesheet" type="text/css" href="c:\xampp\htdocs\Perpustakaan\style.css">

</head>
<body>
    <h2>Input Data Buku</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label>Judul:</label>
        <input type="text" name="judul"><br>
        <label>Penulis:</label>
        <input type="text" name="penulis"><br>
        <label>Penerbit:</label>
        <input type="text" name="penerbit"><br>
        <label>Tanggal Terbit:</label>
        <input type="date" name="tgl_terbit"><br>
        <label>Sinopsis:</label>
        <textarea name="sinopsis"></textarea><br>
        <input type="submit" value="Submit">
    </form>
    <?php echo $error; ?>
</body>
</html>

<?php
// Tutup koneksi ke database
mysqli_close($koneksi);
?>
