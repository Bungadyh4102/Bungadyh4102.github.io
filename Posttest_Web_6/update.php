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

if (isset($_GET['id_tari'])) {
    $id_tari = htmlspecialchars($_GET["id_tari"]);
    $sql = "SELECT * FROM tari WHERE id_tari='$id_tari'";
    $hasil = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($hasil);
}

if (isset($_POST['submit'])) {
    $id_tari = htmlspecialchars($_POST['id_tari']);
    $nama_tari = htmlspecialchars($_POST['nama_tari']);
    $asal = htmlspecialchars($_POST['asal']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);

    if ($_FILES['file_tari']['name']) {
        $file_tmp = $_FILES['file_tari']['tmp_name'];
        $file_ext = pathinfo($_FILES['file_tari']['name'], PATHINFO_EXTENSION);

        $timestamp = date('Y-m-d H.i.s');
        $file_name = $timestamp . '.' . $file_ext;
        $target_dir = "uploads/";
        $target_file = $target_dir . $file_name;

        if (move_uploaded_file($file_tmp, $target_file)) {
            $sql = "UPDATE tari SET nama_tari='$nama_tari', asal='$asal', deskripsi='$deskripsi', file_tari='$file_name' WHERE id_tari='$id_tari'";
        } else {
            echo "<div class='alert alert-danger'> File gagal diupload.</div>";
        }
    } else {
        $sql = "UPDATE tari SET nama_tari='$nama_tari', asal='$asal', deskripsi='$deskripsi' WHERE id_tari='$id_tari'";
    }

    $hasil = mysqli_query($conn, $sql);

    if ($hasil) {
        header("Location: index.php");
    } else {
        echo "<div class='alert alert-danger'> Data gagal diupdate.</div>";
    }
}
?>

<h2>Update Data Tari Tradisional</h2>

<form action="<?php echo $_SERVER["PHP_SELF"] . '?id_tari=' . $data['id_tari']; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_tari" value="<?php echo $data['id_tari']; ?>" />
    
    <div class="form-group">
        <label>Nama Tari:</label>
        <input type="text" name="nama_tari" class="form-control" value="<?php echo $data['nama_tari']; ?>" required />
    </div>
    
    <div class="form-group">
        <label>Asal:</label>
        <input type="text" name="asal" class="form-control" value="<?php echo $data['asal']; ?>" required />
    </div>

    <div class="form-group">
        <label>Deskripsi:</label>
        <input type="text" name="deskripsi" class="form-control" value="<?php echo $data['deskripsi']; ?>" required />
    </div>

    <div class="form-group">
        <label>File:</label>
        <input type="file" name="file_tari" class="form-control" />
    </div>
    
    <button type="submit" name="submit" class="btn btn-primary">Update Data</button>
</form>
</div>
</body>
</html>
