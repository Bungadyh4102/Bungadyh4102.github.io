<!DOCTYPE html>
<html>
<head>
    <title>Form Update Data Tari</title>
    <style>
        body {
            background-color: #f0f8ff; /* Latar belakang halaman */
            font-family: 'Arial', sans-serif; /* Jenis font */
        }

        .container {
            max-width: 600px; /* Lebar maksimum container */
            margin: 50px auto; /* Margin untuk menempatkan container di tengah */
            padding: 20px; /* Padding dalam container */
            background-color: #ffffff; /* Latar belakang container */
            border-radius: 8px; /* Sudut membulat pada container */
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1); /* Bayangan pada container */
            animation: fadeIn 0.5s ease; /* Animasi muncul */
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        h2 {
            text-align: center; /* Teks di tengah */
            margin-bottom: 20px; /* Jarak bawah pada judul */
            color: #333; /* Warna teks judul */
        }

        label {
            font-weight: bold; /* Teks label tebal */
            color: #555; /* Warna teks label */
        }

        .form-control {
            border-radius: 5px; /* Sudut membulat pada input */
            padding: 10px; /* Padding dalam input */
            border: 1px solid #ccc; /* Garis border pada input */
            width: 100%; /* Lebar input penuh */
            box-sizing: border-box; /* Menghitung padding dan border dalam lebar */
            transition: border-color 0.3s ease, box-shadow 0.3s ease; /* Efek transisi saat fokus */
        }

        .form-control:focus {
            border-color: #6c757d; /* Warna border saat fokus */
            box-shadow: 0 0 5px rgba(108, 117, 125, 0.5); /* Efek bayangan saat fokus */
            outline: none; /* Menghilangkan outline default */
        }

        .btn-primary {
            width: 100%; /* Lebar tombol penuh */
            padding: 10px; /* Padding dalam tombol */
            background-color: #343a40; /* Warna hitam untuk tombol */
            border: none; /* Tanpa border */
            border-radius: 5px; /* Sudut membulat pada tombol */
            transition: background-color 0.3s ease, transform 0.2s; /* Efek transisi saat hover */
            color: white; /* Warna teks tombol putih */
            cursor: pointer; /* Menampilkan pointer saat hover */
        }

        .btn-primary:hover {
            background-color: #212529; /* Warna tombol saat hover */
            transform: scale(1.05); /* Efek memperbesar saat hover */
        }

        .form-group {
            margin-bottom: 15px; /* Jarak bawah pada grup form */
        }

        .alert {
            margin-top: 20px; /* Jarak atas pada alert */
            color: #e74c3c; /* Warna teks alert merah */
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    // Include file koneksi untuk menghubungkan ke database
    include "koneksi.php";

    // Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Cek apakah ada nilai yang dikirim menggunakan method GET dengan nama id_tari
    if (isset($_GET['id_tari'])) {
        $id_tari = input($_GET["id_tari"]);

        // Query select untuk mendapatkan data yang akan di-update
        $sql = "SELECT * FROM tari WHERE id_tari=$id_tari";
        $hasil = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    // Cek apakah ada kiriman form dari method POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_tari = htmlspecialchars($_POST["id_tari"]);
        $nama_tari = input($_POST["nama_tari"]);
        $asal = input($_POST["asal"]);
        $deskripsi = input($_POST["deskripsi"]);

        // Query update data pada tabel tari
        $sql = "UPDATE tari SET nama_tari='$nama_tari', asal='$asal', deskripsi='$deskripsi' WHERE id_tari=$id_tari";

        // Mengeksekusi query
        $hasil = mysqli_query($conn, $sql);

        // Kondisi apakah berhasil atau tidak dalam mengeksekusi query
        if ($hasil) {
            header("Location: index.php");
        } else {
            echo "<div class='alert'>Data Gagal disimpan.</div>";
        }
    }
    ?>
    <h2>Update Data Tari</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama Tari:</label>
            <input type="text" name="nama_tari" class="form-control" placeholder="Masukan Nama Tari" value="<?php echo $data['nama_tari']; ?>" required />
        </div>
        
        <div class="form-group">
            <label>Asal:</label>
            <input type="text" name="asal" class="form-control" placeholder="Masukan Nama Asal" value="<?php echo $data['asal']; ?>" required/>
        </div>
        
        <div class="form-group">
            <label>Deskripsi :</label>
            <input type="text" name="deskripsi" class="form-control" placeholder="Masukan Deskripsi" value="<?php echo $data['deskripsi']; ?>" required/>
        </div>
        
        <input type="hidden" name="id_tari" value="<?php echo $data['id_tari']; ?>" />
        
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
