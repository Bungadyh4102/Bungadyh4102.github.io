<!DOCTYPE html>
<html>
<head>
    <title>From Create Data Tari</title>  
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
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_tari = input($_POST["nama_tari"]);
    $asal = input($_POST["asal"]);
    $deskripsi = input($_POST["deskripsi"]);

    $target_dir = "uploads/";

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true); 
    }

    $file_name = basename($_FILES["file_tari"]["name"]);
    $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_file_name = date('Y-m-d H.i.s') . '.' . $file_extension;
    $target_file = $target_dir . $new_file_name;

    if (move_uploaded_file($_FILES["file_tari"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO tari (nama_tari, asal, deskripsi, file_tari) VALUES ('$nama_tari', '$asal', '$deskripsi', '$new_file_name')";
        $hasil = mysqli_query($conn, $sql);

        if ($hasil) {
            header("Location: index.php");
        } else {
            echo "<div class='alert alert-danger'>Data Gagal disimpan.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>File gagal diupload.</div>";
    }
}
?>

    <h2>Input Data Tari Tradisional</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama Tari:</label>
            <input type="text" name="nama_tari" class="form-control" placeholder="Masukan Nama Tari" required />
        </div>
        
        <div class="form-group">
            <label>Asal:</label>
            <input type="text" name="asal" class="form-control" placeholder="Masukan Asal Daerah" required/>
        </div>

        <div class="form-group">
            <label>Deskripsi:</label>
            <input type="text" name="deskripsi" class="form-control" placeholder="Masukan Deskripsi Tari" required/>
        </div>

        <div class="form-group">
            <label>File:</label>
            <input type="file" name="file_tari" class="form-control" required />
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
