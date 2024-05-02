<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Buku</title>
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
            max-width: 600px;
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

        /* Style untuk label */
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        /* Style untuk input text dan textarea */
        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Untuk menghindari padding yang menambah lebar elemen */
        }

        /* Style untuk tombol submit */
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Buku</h2>
        <?php
        // Sambungkan ke database
        include 'koneksi.php';

        // Periksa apakah parameter id telah diteruskan melalui URL
        if(isset($_GET['id'])) {
            $id = $_GET['id'];

            // Query untuk mengambil data buku dengan id yang diberikan
            $query = "SELECT * FROM buku WHERE id = '$id'";
            $result = mysqli_query($koneksi, $query);

            // Periksa apakah data ditemukan
            if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
        ?>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div>
                <label for="judul">Judul:</label>
                <input type="text" id="judul" name="judul" value="<?php echo $row['judul']; ?>" required>
            </div>
            <div>
                <label for="penulis">Penulis:</label>
                <input type="text" id="penulis" name="penulis" value="<?php echo $row['penulis']; ?>" required>
            </div>
            <div>
                <label for="penerbit">Penerbit:</label>
                <input type="text" id="penerbit" name="penerbit" value="<?php echo $row['penerbit']; ?>" required>
            </div>
            <div>
                <label for="tgl_terbit">Tanggal Terbit:</label>
                <input type="date" id="tgl_terbit" name="tgl_terbit" value="<?php echo $row['tgl_terbit']; ?>" required>
            </div>
            <div>
                <label for="sinopsis">Sinopsis:</label>
                <textarea id="sinopsis" name="sinopsis" required><?php echo $row['sinopsis']; ?></textarea>
            </div>
            <button type="submit">Update</button>
        </form>
        <?php
            } else {
                echo "Data tidak ditemukan.";
            }
        } else {
            echo "ID buku tidak diberikan.";
        }

        // Tutup koneksi ke database
        mysqli_close($koneksi);
        ?>
    </div>
</body>
</html>
