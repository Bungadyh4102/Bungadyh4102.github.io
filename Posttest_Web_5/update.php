<!DOCTYPE html>
<html>
<head>
    <title>Form Update Data Tari</title>
    <style>
        body {
            background-color: #f0f8ff;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #6c757d;
            box-shadow: 0 0 5px rgba(108, 117, 125, 0.5);
            outline: none;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
            background-color: #343a40;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s;
            color: white;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #212529;
            transform: scale(1.05);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .alert {
            margin-top: 20px;
            color: #e74c3c;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    include "koneksi.php";

    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_GET['id_tari'])) {
        $id_tari = input($_GET["id_tari"]);

        $sql = "SELECT * FROM tari WHERE id_tari=$id_tari";
        $hasil = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_tari = htmlspecialchars($_POST["id_tari"]);
        $nama_tari = input($_POST["nama_tari"]);
        $asal = input($_POST["asal"]);
        $deskripsi = input($_POST["deskripsi"]);

        $sql = "UPDATE tari SET nama_tari='$nama_tari', asal='$asal', deskripsi='$deskripsi' WHERE id_tari=$id_tari";

        $hasil = mysqli_query($conn, $sql);

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
