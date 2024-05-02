<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <style>
        /* Style untuk body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        /* Style untuk container */
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Style untuk heading */
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Style untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Style untuk tombol tambah */
        .add-button {
            display: inline-block;
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .add-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Buku</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tanggal Terbit</th>
                    <th>Sinopsis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Sambungkan ke database
                include 'koneksi.php';

                // Query untuk mengambil data dari database
                $query = "SELECT * FROM buku";
                $result = mysqli_query($koneksi, $query);

                // Periksa apakah ada data yang ditemukan
                if(mysqli_num_rows($result) > 0) {
                    // Loop melalui setiap baris hasil
                    while($row = mysqli_fetch_assoc($result)) {
                        // Tampilkan data dalam tabel
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['judul']."</td>";
                        echo "<td>".$row['penulis']."</td>";
                        echo "<td>".$row['penerbit']."</td>";
                        echo "<td>".$row['tgl_terbit']."</td>";
                        echo "<td>".$row['sinopsis']."</td>";
                        echo "<td><a href='update.php?id=".$row['id']."'>Edit</a> | <a href='Delete.php?id=".$row['id']."' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a></td>";
                        echo "</tr>";
                    }
                } else {
                    // Jika tidak ada data ditemukan
                    echo "<tr><td colspan='7'>Tidak ada data ditemukan</td></tr>";
                }

                // Tutup koneksi ke database
                mysqli_close($koneksi);
                ?>
            </tbody>
        </table>
        <a href="index.html" class="add-button">Tambah Data</a>
    </div>
</body>
</html>
